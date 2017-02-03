<?php
/*
  Copyright (c) 2015, G Burton www.clubosc.com
  All rights reserved.

  Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

  1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

  2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

  3. Neither the name of the copyright holder nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

  class distance {
    var $code, $title, $description, $icon, $enabled;

// class constructor
    function __construct() {
      global $order;

      $this->code = 'distance';
      $this->title = MODULE_SHIPPING_DISTANCE_TEXT_TITLE;
      $this->description = MODULE_SHIPPING_DISTANCE_TEXT_DESCRIPTION;
      $this->sort_order = MODULE_SHIPPING_DISTANCE_SORT_ORDER;
      $this->icon = '';
      $this->tax_class = MODULE_SHIPPING_DISTANCE_TAX_CLASS;
      $this->enabled = ((MODULE_SHIPPING_DISTANCE_STATUS == 'True') ? true : false);

      if ( ($this->enabled == true) && ((int)MODULE_SHIPPING_DISTANCE_ZONE > 0) ) {
        $check_flag = false;
        $check_query = tep_db_query("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_SHIPPING_DISTANCE_ZONE . "' and zone_country_id = '" . $order->delivery['country']['id'] . "' order by zone_id");
        while ($check = tep_db_fetch_array($check_query)) {
          if ($check['zone_id'] < 1) {
            $check_flag = true;
            break;
          } elseif ($check['zone_id'] == $order->delivery['zone_id']) {
            $check_flag = true;
            break;
          }
        }

        if ($check_flag == false) {
          $this->enabled = false;
        }
      }
    }

// class methods
    function quote($method = '') {
      global $order;
      
      // get destination
      $geo_address = NULL;
      $geo_address .= rawurlencode($order->delivery['street_address']) . '+';
      $geo_address .= rawurlencode($order->delivery['city']) . '+';
      $geo_address .= rawurlencode($order->delivery['postcode']) . '+';
      $geo_address .= rawurlencode($order->delivery['state']) . '+';
      $geo_address .= rawurlencode($order->delivery['country']['title']);
     
      $url = 'http://maps.googleapis.com/maps/api/geocode/xml?address=' . $geo_address . '&sensor=false';      
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $data = curl_exec($ch); curl_close($ch);
      $geocode = simplexml_load_string($data, null, LIBXML_NOCDATA);
      
      $destination = $geocode->result->geometry->location->lat . ',' . $geocode->result->geometry->location->lng;
      
      // work out DISTANCE UNITS
      $url = 'http://maps.googleapis.com/maps/api/directions/xml?origin=' . MODULE_SHIPPING_DISTANCE_ORIGIN . '&destination=' . $destination . '&units=' . MODULE_SHIPPING_DISTANCE_UNITS . '&alternatives=true';




      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $data = curl_exec($ch); curl_close($ch);

$xml = new SimpleXMLElement($data);

$result = $xml->xpath('/DirectionsResponse/route/leg/distance/value');




      
      $actual_distance = min($result);
      $finaldistance = min($result);
      $miles = $actual_distance/1609.34;
      $km = $actual_distance/1000;
      
      // work out cost
      $distance = (MODULE_SHIPPING_DISTANCE_UNITS == 'metric') ? $km : $miles;  

      $distance_cost = preg_split("/[:,]/" , MODULE_SHIPPING_DISTANCE_COST);
      $size = sizeof($distance_cost);
      for ($i=0, $n=$size; $i<$n; $i+=2) {
        if ($distance <= $distance_cost[$i]) {
          $shipping = $distance_cost[$i+1];
          break;
        }
      }      
      //$cost = round(($distance * MODULE_SHIPPING_DISTANCE_COST), 2);

      $this->quotes = array('id' => $this->code,
                            'module' => MODULE_SHIPPING_DISTANCE_TEXT_TITLE,
                            'methods' => array(array('id' => $this->code,
                                                     'title' =>  MODULE_SHIPPING_DISTANCE_TEXT_WAY . ' ' . $finaldistance/1000 . ' km', 
                                                     'cost' => $shipping + MODULE_SHIPPING_DISTANCE_HANDLING)));

      if ($this->tax_class > 0) {
        $this->quotes['tax'] = tep_get_tax_rate($this->tax_class, $order->delivery['country']['id'], $order->delivery['zone_id']);
      }

      if (tep_not_null($this->icon)) $this->quotes['icon'] = tep_image($this->icon, $this->title);

      return $this->quotes;
    }

    function check() {
      if (!isset($this->_check)) {
        $check_query = tep_db_query("select configuration_value from configuration where configuration_key = 'MODULE_SHIPPING_DISTANCE_STATUS'");
        $this->_check = tep_db_num_rows($check_query);
      }
      return $this->_check;
    }

    function install() {
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Distance Based Shipping', 'MODULE_SHIPPING_DISTANCE_STATUS', 'True', 'Do you want to offer distance based shipping?', '6', '0', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Distance Units', 'MODULE_SHIPPING_DISTANCE_UNITS', 'imperial', 'Choose Imperial (Mile) or Metric (KM) for working out cost of shipping.', '6', '0', 'tep_cfg_select_option(array(\'imperial\', \'metric\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Shipping Table', 'MODULE_SHIPPING_DISTANCE_COST', '10:1.99,20:2.99,100:0', 'The shipping cost is based on the Calculated Imperial/Metric Distance. Example: 10:1.99,20:2.99,etc.. Up to 10 charge 1.99, from there to 20 charge 2.99, etc', '6', '0', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Handling Fee', 'MODULE_SHIPPING_DISTANCE_HANDLING', '0', 'Handling fee for this shipping method.', '6', '0', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Origin Location', 'MODULE_SHIPPING_DISTANCE_ORIGIN', '51.503327,-0.119377', 'Your EXACT location using Latitude and Longitude.', '6', '0', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Tax Class', 'MODULE_SHIPPING_DISTANCE_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', '6', '0', 'tep_get_tax_class_title', 'tep_cfg_pull_down_tax_classes(', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Shipping Zone', 'MODULE_SHIPPING_DISTANCE_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', '6', '0', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_SHIPPING_DISTANCE_SORT_ORDER', '0', 'Sort order of display.', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from configuration where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_SHIPPING_DISTANCE_STATUS', 'MODULE_SHIPPING_DISTANCE_UNITS', 'MODULE_SHIPPING_DISTANCE_COST', 'MODULE_SHIPPING_DISTANCE_HANDLING', 'MODULE_SHIPPING_DISTANCE_ORIGIN', 'MODULE_SHIPPING_DISTANCE_TAX_CLASS', 'MODULE_SHIPPING_DISTANCE_ZONE', 'MODULE_SHIPPING_DISTANCE_SORT_ORDER');
    }
  }
