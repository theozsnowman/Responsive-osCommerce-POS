<?php
/*
  Copyright (c) 2015, G Burton
  All rights reserved.

  Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

  1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

  2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

  3. Neither the name of the copyright holder nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

  class cm_login_phone {
    var $code;
    var $group;
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->code = get_class($this);
      $this->group = basename(dirname(__FILE__));

      $this->title = MODULE_CONTENT_LOGIN_PHONE_TITLE;
      $this->description = MODULE_CONTENT_LOGIN_PHONE_DESCRIPTION;

      if ( defined('MODULE_CONTENT_LOGIN_PHONE_STATUS') ) {
        $this->sort_order = MODULE_CONTENT_LOGIN_PHONE_SORT_ORDER;
        $this->enabled = (MODULE_CONTENT_LOGIN_PHONE_STATUS == 'True');
      }
    }

    function execute() {
      global $HTTP_GET_VARS, $HTTP_POST_VARS, $sessiontoken, $login_customer_id, $messageStack, $oscTemplate;

      $error = false;

      if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'process') && isset($HTTP_POST_VARS['formid']) && ($HTTP_POST_VARS['formid'] == $sessiontoken)) {
        $phone = tep_db_prepare_input($HTTP_POST_VARS['phone']);
        $password = tep_db_prepare_input($HTTP_POST_VARS['password']);

// Check if email exists
        $customer_query = tep_db_query("select customers_id, customers_password from customers where customers_telephone = '" . tep_db_input($phone) . "' limit 1");
        if (!tep_db_num_rows($customer_query)) {
          $error = true;
        } else {
          $customer = tep_db_fetch_array($customer_query);

// Check that password is good
          if (!tep_validate_password($password, $customer['customers_password'])) {
            $error = true;
          } else {
// set $login_customer_id globally and perform post login code in catalog/login.php
            $login_customer_id = (int)$customer['customers_id'];
          }
        }
      }

      if ($error == true) {
        $messageStack->reset();
        $messageStack->add('login', MODULE_CONTENT_LOGIN_PHONE_LOGIN_ERROR);
      }

      ob_start();
      include(DIR_WS_MODULES . 'content/' . $this->group . '/templates/login_phone.php');
      $template = ob_get_clean();

      $oscTemplate->addContent($template, $this->group);
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_CONTENT_LOGIN_PHONE_STATUS');
    }

    function install() {
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Login By Phone Module', 'MODULE_CONTENT_LOGIN_PHONE_STATUS', 'True', 'Do you want to enable the login by phone module?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Content Width', 'MODULE_CONTENT_LOGIN_PHONE_CONTENT_WIDTH', 'Half', 'Should the content be shown in a full or half width container?', '6', '1', 'tep_cfg_select_option(array(\'Full\', \'Half\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_CONTENT_LOGIN_PHONE_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from configuration where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_CONTENT_LOGIN_PHONE_STATUS', 'MODULE_CONTENT_LOGIN_PHONE_CONTENT_WIDTH', 'MODULE_CONTENT_LOGIN_PHONE_SORT_ORDER');
    }
  }
