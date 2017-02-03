<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com 

  Copyright (c) 2016 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_NAVBAR_SHOPPING_CART_TITLE', 'Indkøbskurv');
  define('MODULE_NAVBAR_SHOPPING_CART_DESCRIPTION', 'Vis indkøbskurv i Navbar');
  
  define('MODULE_NAVBAR_SHOPPING_CART_CONTENTS', '<i class="fa fa-shopping-cart"></i> %s ting <span class="caret"></span>');
  define('MODULE_NAVBAR_SHOPPING_CART_NO_CONTENTS', '<i class="fa fa-shopping-cart"></i> 0 ting');
  define('MODULE_NAVBAR_SHOPPING_CART_HAS_CONTENTS', '%s ting, %s');
  define('MODULE_NAVBAR_SHOPPING_CART_VIEW_CART', 'Vis kurv');
  define('MODULE_NAVBAR_SHOPPING_CART_CHECKOUT', '<i class="fa fa-angle-right"></i> til kassen');
  
  define('MODULE_NAVBAR_SHOPPING_CART_PRODUCT', '<a href="' . tep_href_link('product_info.php', 'products_id=%s') . '">%s x %s</a>');
  