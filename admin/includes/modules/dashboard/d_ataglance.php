<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce
  
  Commuity submission by Tedward of Bearclaw manufacturing

  Released under the GNU General Public License
*/

  class d_ataglance {
    var $code = 'd_ataglance';
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->title = MODULE_ADMIN_DASHBOARD_ATAGLANCE_TITLE;
      $this->description = MODULE_ADMIN_DASHBOARD_ATAGLANCE_DESCRIPTION;

      if ( defined('MODULE_ADMIN_DASHBOARD_ATAGLANCE_STATUS') ) {
        $this->sort_order = MODULE_ADMIN_DASHBOARD_ATAGLANCE_SORT_ORDER;
        $this->enabled = (MODULE_ADMIN_DASHBOARD_ATAGLANCE_STATUS == 'True');
      }
      
    }

    function getOutput() {
      global $languages_id;     

      $output = '<table border="0" width="100%" cellspacing="0" cellpadding="4">' .
                '  <tr class="dataTableHeadingRow">' .
                '    <td class="dataTableHeadingContent">' . MODULE_ADMIN_DASHBOARD_ATAGLANCE_TITLE . '</td>' .
                '    <td class="dataTableHeadingContent">' . MODULE_ADMIN_DASHBOARD_ATAGLANCE_NUMBER . '</td>' .
                '  </tr>';

      $orders_status_query = tep_db_query("select orders_status_name, orders_status_id from " . TABLE_ORDERS_STATUS . " where language_id = '" . $languages_id . "'");
      while ($orders_status = tep_db_fetch_array($orders_status_query)) {
          $orders_pending_query = tep_db_query("select count(*) as count from " . TABLE_ORDERS . " where orders_status = '" . $orders_status['orders_status_id'] . "'");
          $orders_pending = tep_db_fetch_array($orders_pending_query);
        $output .= '  <tr class="dataTableRow" onmouseover="rowOverEffect(this);" onmouseout="rowOutEffect(this);">' .
                   '    <td class="dataTableContent"><a href="' . tep_href_link('orders.php', 'selected_box=customers&status=' . $orders_status['orders_status_id']) . '">' . $orders_status['orders_status_name'] . '</a></td>' .
                   '    <td class="dataTableContent" align="left">' . $orders_pending['count'] . '</td>' .
                   '  </tr>';
      }

      $output .= '</table>';

      return $output;

  	  }

    function isEnabled() {
      return $this->enabled;
      }

    function check() {
      return defined('MODULE_ADMIN_DASHBOARD_ATAGLANCE_STATUS');
      }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Reviews Module', 'MODULE_ADMIN_DASHBOARD_ATAGLANCE_STATUS', 'True', 'Do you want to show the latest reviews on the dashboard?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_ADMIN_DASHBOARD_ATAGLANCE_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
      }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
      }

    function keys() {
      return array('MODULE_ADMIN_DASHBOARD_ATAGLANCE_STATUS', 'MODULE_ADMIN_DASHBOARD_ATAGLANCE_SORT_ORDER');
      }
    }
?>