<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2013 osCommerce

  Released under the GNU General Public License
*/

//define('HEADING_TITLE', 'Velkommen til ' . STORE_NAME);
define('HEADING_TITLE', '<center>' . '<img src="/images/store_logo.png">' . '</center>');

define('TABLE_HEADING_NEW_PRODUCTS', 'Nye produkter i %s');

define('TEXT_NO_PRODUCTS', 'Der er ikke nogen produkter i denne kategori.');
define('TEXT_NUMBER_OF_PRODUCTS', 'Antal produkter: ');
define('TEXT_SHOW', '<b>Vis:</b>');
define('TEXT_BUY', 'Køb 1 \'');
define('TEXT_NOW', '\' nu');
define('TEXT_ALL_CATEGORIES', 'Alle kategorier');
define('TEXT_ALL_MANUFACTURERS', 'Alle producenter');


// seo
if ( ($category_depth == 'top') && (!isset($HTTP_GET_VARS['manufacturers_id'])) ) {
  define('META_SEO_TITLE', 'Index Page Title');
  define('META_SEO_DESCRIPTION', 'Dette er beskrivelsen af din side der bliver brugt i META beskrivelse elementet');
  /*
  keywords are USELESS unless you are selling into China and want to be listed in Baidu Search Engine
  */
  define('META_SEO_KEYWORDS', 'disse, er, de, komma, sepererede, nøgleord, som bruges i META nøgleords elementet');
}





