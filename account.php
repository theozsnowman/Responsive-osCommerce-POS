<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link('login.php', '', 'SSL'));
  }

  require('includes/languages/' . $language . '/account.php');

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link('account.php', '', 'SSL'));

  require('includes/template_top.php');
?>

<div class="page-header">
  <h1><?php echo HEADING_TITLE; ?></h1>
</div>

<?php
  if ($messageStack->size('account') > 0) {
    echo $messageStack->output('account');
  }
?>

<div class="contentContainer">
  <div class="row">

    <?php
    echo $oscTemplate->getContent('account');
    ?>
  
  </div>
<?php
$reward_points_query = tep_db_query("select customers_reward_points from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "' LIMIT 1");
$reward_points = tep_db_fetch_array($reward_points_query);
?>
<div class="row">
<div class="col-sm-12">
<h2><?php echo TEXT_POINTS_HEADER; ?></h2>
<div class="contentText">
<ul class="accountLinkList">
<li>
<i class="glyphicon glyphicon-gift"></i>
<?php echo TEXT_POINTS . ' ' . ($reward_points['customers_reward_points'] > 0 ? $reward_points['customers_reward_points'] : 0); ?></li>
</ul>
</div>
</div>
</div>
 
</div>
<?php
  require('includes/template_bottom.php');
  require('includes/application_bottom.php');
?>
