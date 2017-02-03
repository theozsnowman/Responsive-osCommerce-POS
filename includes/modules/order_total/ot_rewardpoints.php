<?php

  class ot_rewardpoints {
    var $title, $output;

    function __construct() {
      $this->code = 'ot_rewardpoints';
      $this->title = MODULE_ORDER_TOTAL_REWARDPOINTS_TITLE;
      $this->description = MODULE_ORDER_TOTAL_REWARDPOINTS_DESCRIPTION;
      $this->enabled = ((MODULE_ORDER_TOTAL_REWARDPOINTS_STATUS == 'true') ? true : false);
      $this->sort_order = MODULE_ORDER_TOTAL_REWARDPOINTS_SORT_ORDER;
      $this->output = array();
    }

    function process() {
	    global $order, $currencies, $ot_subtotal, $customer_id, $languages_id, $shipping;
	   
	    if (tep_session_is_registered('customer_id')) {
	       //new points
           $reward_points_info_query = tep_db_query("select * from " . TABLE_REWARD_POINTS . " LIMIT 1");
$reward_points_info = tep_db_fetch_array($reward_points_info_query);
$purchase_cats = explode(',', $reward_points_info['purchase_categories_id']);             
$allshp = false;
if($reward_points_info['reward_shipping_status'] != 0) {
$shm = explode('_',$shipping['id']);
$shipping_module = $shm[0];
$allowed_shipping = explode(',', $reward_points_info['reward_shipping_allowed']);     
if (in_array($shipping_module, $allowed_shipping, true)) {
$allshp = true;
}    
}

if ($reward_points_info['point1_attributes_id'] != '') {
$att1_array = '';
$att1_query = tep_db_query("select products_options_values_name from " . TABLE_PRODUCTS_OPTIONS_VALUES . " where products_options_values_id in (" . tep_db_input($reward_points_info['point1_attributes_id']) . ") and language_id = '" . (int)$languages_id . "'");
while($att1 = tep_db_fetch_array($att1_query)) {   
$att1_array[] = $this->aebiz_cleanmatch($att1['products_options_values_name']);
}
} else {
$att1_array  = '';    
}

if ($reward_points_info['point2_attributes_id'] != '') {
$att2_array = '';
$att2_query = tep_db_query("select products_options_values_name from " . TABLE_PRODUCTS_OPTIONS_VALUES . " where products_options_values_id in (" . tep_db_input($reward_points_info['point2_attributes_id']) . ") and language_id = '" . (int)$languages_id . "'");
while($att2 = tep_db_fetch_array($att2_query)) {   
$att2_array[] = $this->aebiz_cleanmatch($att2['products_options_values_name']);
}
} else {
$att2_array  = '';    
}


$reward_points_check = array();
if(isset($order)) {
$pro_id = '';
foreach($order->products as $op) {
$pro_id = (int)$op['id']; 
 
if ($reward_points_info['purchase_categories_status'] != 0) {    
$category_check_query = tep_db_query("select categories_id from " . TABLE_PRODUCTS_TO_CATEGORIES . " where products_id = '" . (int)$pro_id . "'");
while($category_check = tep_db_fetch_array($category_check_query)) {
if (in_array($category_check['categories_id'], $purchase_cats, true)) {
//att check
 if (isset($op[attributes])) {
 foreach($op[attributes] as $ap) {
$attval = $this->aebiz_cleanmatch($ap['value']);
if (is_array($att1_array) && in_array($attval, $att1_array, true)) {
$reward_points_check[$pro_id . '_' . $ap['option_id'] . '_' . $ap['value_id']] = $op['qty'];    
} else if (is_array($att2_array) && in_array($attval, $att2_array, true)) {
$reward_points_check[$pro_id . '_' . $ap['option_id'] . '_' . $ap['value_id']] = $op['qty']*2;    
} else {
$reward_points_check[$pro_id] = $op['qty'];        
}          
        
 }
} else {
$reward_points_check[$pro_id] = $op['qty'];         
}
}
}
} else {
//att check

 if (isset($op[attributes])) {
 foreach($op[attributes] as $ap) {
$attval = $this->aebiz_cleanmatch($ap['value']);
if (is_array($att1_array) && in_array($attval, $att1_array, true)) {
$reward_points_check[$pro_id . '_' . $ap['option_id'] . '_' . $ap['value_id']] = $op['qty'];    
} else if (is_array($att2_array) && in_array($attval, $att2_array, true)) {
$reward_points_check[$pro_id . '_' . $ap['option_id'] . '_' . $ap['value_id']] = $op['qty']*2;    
} else {
$reward_points_check[$pro_id] = $op['qty'];        
}          
        
 }
} else {
$reward_points_check[$pro_id] = $op['qty'];         
}
}
}
}

$creward_points = 0; 
$pre_reward_points = 0;
if(!empty($reward_points_check)) {      
foreach($reward_points_check as $rp) {
$pre_reward_points += $rp;    
}
}       

           //existing points
	    $customer_credit_query = tep_db_query("select customers_reward_points from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
        $customer_credit = tep_db_fetch_array($customer_credit_query);
        
        $reward_points_query = tep_db_query("select * from " . TABLE_REWARD_POINTS . " LIMIT 1");
        $reward_points = tep_db_fetch_array($reward_points_query);
        
if($pre_reward_points > 0 && $allshp == true) {
$creward_points = $customer_credit['customers_reward_points'] + $pre_reward_points;
} else {
$creward_points = $customer_credit['customers_reward_points'];   
}
 
        if($creward_points >= $reward_points['reward_cashout'] && $allshp == true) {
        
      $acats = false;
        if ($reward_points['redeem_categories_status'] != 0) {
        $approved_cats = explode(',', $reward_points['redeem_categories_id']);   
        foreach($order->products as $op) {
        $category_check_query =tep_db_query("select categories_id from " . TABLE_PRODUCTS_TO_CATEGORIES . " where products_id = '" . (int)$op['id'] . "'");
        while($category_check = tep_db_fetch_array($category_check_query)) {
        if (in_array($category_check['categories_id'], $approved_cats, true)) {
       $acats = true;    
        }    
        }
        }
        }
        
        if ($reward_points['reward_amount'] >= $order->info['total']) {
        $customer_reward = $order->info['total'];
	    } else {
       $customer_reward = $reward_points['reward_amount'];
       }         
     
            if($acats != false) {

            $order->info['total'] = $order->info['total'] - $customer_reward;
	        $order->info['payment_method'] = ( $order->info['total'] > 0) ? $order->info['payment_method'] . '+' . str_replace(':', '', MODULE_ORDER_TOTAL_REWARDPOINTS_REWARD) : str_replace(':', '', MODULE_ORDER_TOTAL_REWARDPOINTS_REWARD);
	      
	        $this->output[] = array('title' =>''. MODULE_ORDER_TOTAL_REWARDPOINTS_TEXT . ':',
                                    'text' => '<font color="red">-' . $currencies->format($customer_reward).'</font>',
                                    'value' => $customer_reward);
         }
       
       }
       }
    }


  function check() {
      if (!isset($this->check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_ORDER_TOTAL_REWARDPOINTS_STATUS'");
        $this->check = tep_db_num_rows($check_query);
      }
      return $this->check;
    }

    function keys() {
      return array('MODULE_ORDER_TOTAL_REWARDPOINTS_STATUS', 'MODULE_ORDER_TOTAL_REWARDPOINTS_SORT_ORDER');
    }

function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values 
    ('Activate Account Balance', 'MODULE_ORDER_TOTAL_REWARDPOINTS_STATUS', 'true', 'Do you want to enable the Account Balance module?', '6', '1','tep_cfg_select_option(array(\'true\', \'false\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values 
    ('Sort Order', 'MODULE_ORDER_TOTAL_REWARDPOINTS_SORT_ORDER', '2', 'Sort order of display.', '6', '2', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }
    
    function aebiz_cleanmatch($str) {
$str = trim($str);
$str = preg_replace('/[^a-zA-Z]+/', '', $str);
return $str;   
}
  }
?>