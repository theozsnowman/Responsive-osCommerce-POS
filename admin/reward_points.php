<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2016 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  
 $action = (isset($_GET['action']) ? $_GET['action'] : '');

  if (tep_not_null($action)) {
    switch ($action) {
      case 'update':
    $reward_id = 1;
    $reward_cashout = tep_db_prepare_input($_POST['reward_cashout']);
    $reward_amount = tep_db_prepare_input($_POST['reward_amount']);
    $redeem_categories_status = tep_db_prepare_input($_POST['redeem_categories_status']);
    $redeem_categories_id = (!empty($_POST['redeem_categories']) ? implode(',',tep_db_prepare_input($_POST['redeem_categories'])) : '');
    $purchase_categories_status = tep_db_prepare_input($_POST['purchase_categories_status']);
    $purchase_categories_id = (!empty($_POST['purchase_categories']) ? implode(',',tep_db_prepare_input($_POST['purchase_categories'])) : '');
    $reward_shipping_status = tep_db_prepare_input($_POST['reward_shipping_status']);
    $reward_shipping_allowed = (!empty($_POST['shipping_allowed']) ? implode(',',tep_db_prepare_input($_POST['shipping_allowed'])) : '');
    
    $point1_attributes_id = (!empty($_POST['point1_attributes']) ? implode(',',tep_db_prepare_input($_POST['point1_attributes'])) : '');
    $point2_attributes_id = (!empty($_POST['point2_attributes']) ? implode(',',tep_db_prepare_input($_POST['point2_attributes'])) : '');
    
    $sql_data_array = array('reward_cashout' => (int)$reward_cashout,
                            'reward_amount' => tep_db_input($reward_amount),
                            'redeem_categories_status' => (int)$redeem_categories_status,
                            'redeem_categories_id' => tep_db_input($redeem_categories_id),
                            'purchase_categories_status' => (int)$purchase_categories_status,
                            'purchase_categories_id' => tep_db_input($purchase_categories_id),
                            'reward_shipping_status' => (int)$reward_shipping_status,
                            'reward_shipping_allowed' => tep_db_input($reward_shipping_allowed),
                            'point1_attributes_id' => tep_db_input($point1_attributes_id),
                            'point2_attributes_id' => tep_db_input($point2_attributes_id));  
  
    tep_db_perform(TABLE_REWARD_POINTS, $sql_data_array, 'update', "reward_id = '" . (int)$reward_id . "'");

        tep_redirect(tep_href_link('reward_points.php'));
        break;
    }
  } 
  
$rewards_query = tep_db_query("select * from " . TABLE_REWARD_POINTS . "");
$rewards = tep_db_fetch_array($rewards_query);
  
$category_query = tep_db_query("select c.categories_id, cd.categories_name from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by c.parent_id, cd.categories_name");
while ($category = tep_db_fetch_array($category_query)) {
$cat_array[] = array('id' => $category['categories_id'], 'name' => $category['categories_name']);                     
}


$att_query = tep_db_query("select products_options_values_id, products_options_values_name from " . TABLE_PRODUCTS_OPTIONS_VALUES . " where language_id = '" . (int)$languages_id . "' order by products_options_values_name");
while ($att = tep_db_fetch_array($att_query)) {
if($att['products_options_values_name'] != '') {
$att_array[] = array('id' => $att['products_options_values_id'], 'name' => $att['products_options_values_name']);
}                     
}       

$cat_redeem_array = explode(',', $rewards['redeem_categories_id']);                  
$cat_purchase_array = explode(',', $rewards['purchase_categories_id']);
$shp_allowed_array  = explode(',', $rewards['reward_shipping_allowed']); 

$shipping_array = explode(';', MODULE_SHIPPING_INSTALLED);
foreach($shipping_array as $sa) {
$shp_array[] = array('id' => substr($sa, 0, -4), 'name' => $sa);     
}

$att1_array  = explode(',', $rewards['point1_attributes_id']); 
$att2_array  = explode(',', $rewards['point2_attributes_id']); 

if($rewards['redeem_categories_status'] > 0) {
$redcat_select = true; $redcat_all = false;   
} else {
$redcat_select = false; $redcat_all = true;   
}
if($rewards['purchase_categories_status'] > 0) {
$purcat_select = true; $purcat_all = false;  
} else {
$purcat_select = false; $purcat_all = true;   
}
if($rewards['reward_shipping_status'] > 0) {
$shp_select = true; $shp_all = false;    
} else {
$shp_select = false; $shp_all = true;    
}

//print_r($cat_purchase_array);
  require(DIR_WS_INCLUDES . 'template_top.php');
?>

    <table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
          </tr>
        </table></td>
      </tr>
       <?php echo tep_draw_form('new_product', 'reward_points.php', 'action=update', 'post', 'enctype="multipart/form-data"'); ?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td class="main"><?php echo ENTRY_REWARD_CASHOUT; ?>&nbsp;</td>
            <td class="main"><?php echo tep_draw_input_field('reward_cashout', $rewards['reward_cashout']); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_REWARD_AMOUNT; ?>&nbsp;</td>
            <td class="main"><?php echo tep_draw_input_field('reward_amount', $rewards['reward_amount']); ?></td>
          </tr>
           <tr>
            <td class="main"><?php echo ENTRY_REWARD_PURCHASE_CATEGORIES_STATUS; ?></td>
            <td class="main"><?php echo tep_draw_radio_field('purchase_categories_status', '1', $purcat_select) . '&nbsp;' . TEXT_ONLY_SELECTED . '&nbsp;' . tep_draw_radio_field('purchase_categories_status', '0', $purcat_all) . '&nbsp;' . TEXT_ALL; ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_REWARD_PURCHASE_CATEGORIES; ?>&nbsp;</td>
            <td class="main">
              <select name="purchase_categories[]" style="width:300px;" multiple>
            <?php foreach($cat_array as $ca) { 
                 echo '<option value="' . $ca['id'] . '"' . (in_array($ca['id'], $cat_purchase_array) ? ' selected' : '') . '>' . $ca['name'] . '</option>' . "\n";   
                }
                ?>
            </select>
            </td>
          </tr>
               <tr>
            <td class="main"><?php echo ENTRY_REWARD_REDEEM_CATEGORIES_STATUS; ?></td>
            <td class="main"><?php echo tep_draw_radio_field('redeem_categories_status', '1', $redcat_select) . '&nbsp;' . TEXT_ONLY_SELECTED . '&nbsp;' . tep_draw_radio_field('redeem_categories_status', '0', $redcat_all) . '&nbsp;' . TEXT_ALL; ?></td>
          </tr>
            <tr>
            <td class="main"><?php echo ENTRY_REWARD_REDEEM_CATEGORIES; ?>&nbsp;</td>
            <td class="main">
            <select name="redeem_categories[]" style="width:300px;" multiple>
            <?php foreach($cat_array as $ca) { 
            echo '<option value="' . $ca['id'] . '"' . (in_array($ca['id'], $cat_redeem_array) ? ' selected' : '') . '>' . $ca['name'] . '</option>' . "\n";   
                }
                ?>
            </select>
            </td>
            </tr>
  <tr>
            <td class="main"><?php echo ENTRY_REWARD_SHIPPING_ALLOWED_STATUS; ?></td>
            <td class="main"><?php echo tep_draw_radio_field('reward_shipping_status', '1', $shp_select) . '&nbsp;' . TEXT_ONLY_SELECTED . '&nbsp;' . tep_draw_radio_field('reward_shipping_status', '0', $shp_all) . '&nbsp;' . TEXT_ALL; ?></td>
          </tr>
      <tr>
            <td class="main"><?php echo ENTRY_REWARD_SHIPPING_ALLOWED; ?>&nbsp;</td>
            <td class="main">
            <select name="shipping_allowed[]" style="width:300px;" multiple>
            <?php foreach($shp_array as $sa) { 
            echo '<option value="' . $sa['id'] . '"' . (in_array($sa['id'], $shp_allowed_array) ? ' selected' : '') . '>' . $sa['name'] . '</option>' . "\n";   
                }
                ?>
            </select>
            </td>
            </tr>
            
            <tr>
            <td class="main"><?php echo ENTRY_REWARD_ATTRIBUTES1; ?>&nbsp;</td>
            <td class="main">
              <select name="point1_attributes[]" style="width:300px;" multiple>
            <?php foreach($att_array as $aa) { 
                 echo '<option value="' . $aa['id'] . '"' . (in_array($aa['id'], $att1_array) ? ' selected' : '') . '>' . $aa['name'] . '</option>' . "\n";   
                }
                ?>
            </select>
            </td>
          </tr>
          
          <tr>
            <td class="main"><?php echo ENTRY_REWARD_ATTRIBUTES2; ?>&nbsp;</td>
            <td class="main">
              <select name="point2_attributes[]" style="width:300px;" multiple>
          <?php foreach($att_array as $aa) { 
                 echo '<option value="' . $aa['id'] . '"' . (in_array($aa['id'], $att2_array) ? ' selected' : '') . '>' . $aa['name'] . '</option>' . "\n";   
                }
                ?>
            </select>
            </td>
          </tr>
          
        </table></td>
      </tr>
       <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td><?php echo tep_draw_button(IMAGE_SAVE, 'disk', null, 'primary'); ?></td>
          </tr>
        </table></td>
      </tr>
      
       </form>
    </table>
    <script>
    $( document ).ready(function() {
     $('select[name=purchase_categories]').on('mousedown','option',function(ev) {
     ev.preventDefault();
     $(this).prop('selected', !$(this).is(':selected') );
});
 $('select[name=redeem_categories]').on('mousedown','option',function(ev) {
     ev.preventDefault();
     $(this).prop('selected', !$(this).is(':selected') );
});
 $('select[name=shipping_allowed]').on('mousedown','option',function(ev) {
     ev.preventDefault();
     $(this).prop('selected', !$(this).is(':selected') );
});
 $('select[name=point1_attributes]').on('mousedown','option',function(ev) {
     ev.preventDefault();
     $(this).prop('selected', !$(this).is(':selected') );
});
 $('select[name=point2_attributes]').on('mousedown','option',function(ev) {
     ev.preventDefault();
     $(this).prop('selected', !$(this).is(':selected') );
});
});
    </script>

<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>