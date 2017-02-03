<?php
if (tep_session_is_registered('customer_id')) {
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
$att1_array[] = aebiz_cleanmatch($att1['products_options_values_name']);
}
} else {
$att1_array  = '';    
}

if ($reward_points_info['point2_attributes_id'] != '') {
$att2_array = '';
$att2_query = tep_db_query("select products_options_values_name from " . TABLE_PRODUCTS_OPTIONS_VALUES . " where products_options_values_id in (" . tep_db_input($reward_points_info['point2_attributes_id']) . ") and language_id = '" . (int)$languages_id . "'");
while($att2 = tep_db_fetch_array($att2_query)) {   
$att2_array[] = aebiz_cleanmatch($att2['products_options_values_name']);
}
} else {
$att2_array  = '';    
}

$ordnr_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where customers_id = '" . (int)$customer_id . "' order by date_purchased desc limit 1");
$ordnr = tep_db_fetch_array($ordnr_query);
$reward_points_check = array();
if($ordnr['orders_id'] != '') {    
$ordpro_query = tep_db_query("select orders_products_id, products_id, products_quantity from " . TABLE_ORDERS_PRODUCTS . " where orders_id = '" . (int)$ordnr['orders_id'] . "'");
while($ordpro = tep_db_fetch_array($ordpro_query)) {
if ($reward_points_info['purchase_categories_status'] != 0) {    
$category_check_query = tep_db_query("select categories_id from " . TABLE_PRODUCTS_TO_CATEGORIES . " where products_id = '" . (int)$ordpro['products_id'] . "'");
while($category_check = tep_db_fetch_array($category_check_query)) {
if (in_array($category_check['categories_id'], $purchase_cats, true)) {
//att check
$att_check_query = tep_db_query("select products_options_values, orders_products_attributes_id from " . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . " where orders_id = '" . (int)$ordnr['orders_id'] . "' and orders_products_id = '" . (int)$ordpro['orders_products_id'] . "'");
while($att_check = tep_db_fetch_array($att_check_query)) {
if($att_check['products_options_values'] != '') {
$attval = aebiz_cleanmatch($att_check['products_options_values']);
if (is_array($att1_array) && in_array($attval, $att1_array, true)) {
$reward_points_check[$ordpro['products_id'] . '_' . $att_check['orders_products_attributes_id']] = $ordpro['products_quantity'];    
} else if (is_array($att2_array) && in_array($attval, $att2_array, true)) {
$reward_points_check[$ordpro['products_id'] . '_' . $att_check['orders_products_attributes_id']] = $ordpro['products_quantity']*2;    
} else {
$reward_points_check[$ordpro['products_id']] = $ordpro['products_quantity'];        
}     
} else {
$reward_points_check[$ordpro['products_id']] = $ordpro['products_quantity'];     
}
}  
}
}
} else {
//att check
$att_check_query = tep_db_query("select products_options_values, orders_products_attributes_id from " . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . " where orders_id = '" . (int)$ordnr['orders_id'] . "' and orders_products_id = '" . (int)$ordpro['orders_products_id'] . "'");
while($att_check = tep_db_fetch_array($att_check_query)) {
if($att_check['products_options_values'] != '') {
$attval = aebiz_cleanmatch($att_check['products_options_values']);
if (is_array($att1_array) && in_array($attval, $att1_array, true)) {
$reward_points_check[$ordpro['products_id'] . '_' . $att_check['orders_products_attributes_id']] = $ordpro['products_quantity'];    
} else if (is_array($att2_array) && in_array($attval, $att2_array, true)) {
$reward_points_check[$ordpro['products_id'] . '_' . $att_check['orders_products_attributes_id']] = $ordpro['products_quantity']*2;    
} else {
$reward_points_check[$ordpro['products_id']] = $ordpro['products_quantity'];        
}     
} else {
$reward_points_check[$ordpro['products_id']] = $ordpro['products_quantity'];     
}
}         
}
}
$reward_points = 0;
if(!empty($reward_points_check)) {      
foreach($reward_points_check as $rp) {
$reward_points += $rp;    
}
}       
if($reward_points > 0 && $allshp == true) {
tep_db_query("update " . TABLE_CUSTOMERS . " set customers_reward_points = customers_reward_points + " . (int)$reward_points . " where customers_id = '" . (int)$customer_id . "'");
}

$reward_check_query = tep_db_query("select value from " . TABLE_ORDERS_TOTAL . " where orders_id = '" . (int)$ordnr['orders_id'] . "' and class = 'ot_rewardpoints' limit 1");
$reward_check = tep_db_fetch_array($reward_check_query);
if ($reward_check['value'] != '') {
tep_db_query("update " . TABLE_CUSTOMERS . " set customers_reward_points = customers_reward_points - " . (int)$reward_points_info['reward_cashout'] . " where customers_id = '" . (int)$customer_id . "'");    
}
    
}
}

function aebiz_cleanmatch($str) {
$str = trim($str);
$str = preg_replace('/[^a-zA-Z]+/', '', $str);
return $str;   
}
?>