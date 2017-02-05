<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . 'categories.php');

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link('categories.php'));
  
  $categories_list = '';
  $categories_query = tep_db_query("select c.categories_id, cd.categories_name from " . TABLE_CATEGORIES . " c left join " . TABLE_CATEGORIES_DESCRIPTION . " cd on c.categories_id = cd.categories_id where cd.language_id='" . (int)$languages_id ."' order by sort_order, cd.categories_name");
  while ($categories = tep_db_fetch_array($categories_query))  {
  $cPath_new = tep_get_path($categories['categories_id']); 
  $cClass = 'c' . $categories['categories_id']; 
  $categories_list .= '<div class="item col-md-2"><div class="catpad"><a class="cat_item ' . $cClass . '" href="' . tep_href_link('index.php', $cPath_new) . '">' . $categories['categories_name'] . '</a></div></div>'; 
    }
    
  require(DIR_WS_INCLUDES . 'template_top.php');
?>
<div class="page-header">
  <h1><?php echo HEADING_TITLE; ?></h1>
</div>
<div class="contentContainer">
<?php if (isset($categories_list) && !empty($categories_list)) { ?>
<div id="categories" class="row"><?php echo $categories_list; ?></div>
<?php } else { ?>
<div class="alert alert-info"><?php echo TEXT_NO_CATEGORIES; ?></div>
<?php } ?>
</div>

<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>