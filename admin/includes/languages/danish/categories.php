<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Kategorier / Produkter');
define('HEADING_TITLE_SEARCH', 'Søg:');
define('HEADING_TITLE_GOTO', 'Gå Til:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_CATEGORIES_PRODUCTS', 'Kategorier / Produkter');
define('TABLE_HEADING_ACTION', 'Mulighed');
define('TABLE_HEADING_STATUS', 'Status');

define('TEXT_NEW_PRODUCT', 'Nyt Produkt i &quot;%s&quot;');
define('TEXT_CATEGORIES', 'Kategorier:');
define('TEXT_SUBCATEGORIES', 'Subkategorier:');
define('TEXT_PRODUCTS', 'Produkter:');
define('TEXT_PRODUCTS_PRICE_INFO', 'Pris:');
define('TEXT_PRODUCTS_TAX_CLASS', 'Skatte klasse:');
define('TEXT_PRODUCTS_AVERAGE_RATING', 'Gennemsnitlig vurdering:');
define('TEXT_PRODUCTS_QUANTITY_INFO', 'Mængde');
define('TEXT_DATE_ADDED', 'Tilføjet d.:');
define('TEXT_DATE_AVAILABLE', 'Leveres fra d.:');
define('TEXT_LAST_MODIFIED', 'Sidst ændret:');
define('TEXT_IMAGE_NONEXISTENT', 'BILLEDE FINDES IKKE');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', 'Opret venligst ny kategori eller nyt produkt i<br>&nbsp;<br><b>%s</b>');
define('TEXT_PRODUCT_MORE_INFORMATION', 'For mere information, besøg venligst dette produkts<a href="http://%s" target="blank"><u>hjemmeside</u></a>.');
define('TEXT_PRODUCT_DATE_ADDED', 'Dette produkt blev tilføjet vores katalog d. %s.');
define('TEXT_PRODUCT_DATE_AVAILABLE', 'Dette produkt er på lager d. %s.');

define('TEXT_EDIT_INTRO', 'Udfør venligst de nødvendige ændringer');
define('TEXT_EDIT_CATEGORIES_ID', 'Kategori ID:');
define('TEXT_EDIT_CATEGORIES_NAME', 'Kategori Navn:');
define('TEXT_EDIT_CATEGORIES_IMAGE', 'Kategori Billede:');
define('TEXT_EDIT_SORT_ORDER', 'Sorterings Orden:');

define('TEXT_INFO_COPY_TO_INTRO', 'Vælg venligst en ny kategori du vil kopiere dette produkt til');
define('TEXT_INFO_CURRENT_CATEGORIES', 'Aktuelle kategorier:');

define('TEXT_INFO_HEADING_NEW_CATEGORY', 'Ny Kategori');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', 'Rediger Kategori');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', 'Slet kategori');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', 'Flyt kategori');
define('TEXT_INFO_HEADING_DELETE_PRODUCT', 'Slet produkt');
define('TEXT_INFO_HEADING_MOVE_PRODUCT', 'Fjern Produkt');
define('TEXT_INFO_HEADING_COPY_TO', 'Kopier til');

define('TEXT_DELETE_CATEGORY_INTRO', 'Vil du virkelig slette denne kategori ?');
define('TEXT_DELETE_PRODUCT_INTRO', 'Vil du virkelig slette dette produkt helt ?');

define('TEXT_DELETE_WARNING_CHILDS', '<b>ADVARSEL:</b> Der er stadig %s (under-)kategorier linket til denne kategori!');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>ADVARSEL:</b> Der er stadig %s produkter linket til denne kategori!');

define('TEXT_MOVE_PRODUCTS_INTRO', 'Vælg venligst hvilken kategori du ønsker <b>%s</b> at være i');
define('TEXT_MOVE_CATEGORIES_INTRO', 'Vælg venligst hvilken kategori du ønsker <b>%s</b> at være i');
define('TEXT_MOVE', 'Flyt <b>%s</b> til:');

define('TEXT_NEW_CATEGORY_INTRO', 'Udfyld venligst følgende information for den nye kategori');
define('TEXT_CATEGORIES_NAME', 'Kategori Navn:');
define('TEXT_CATEGORIES_IMAGE', 'Kategori Billede:');
define('TEXT_SORT_ORDER', 'Sorterings Orden:');

define('TEXT_PRODUCTS_STATUS', 'Produkt Status:');
define('TEXT_PRODUCTS_DATE_AVAILABLE', 'Leveres fra:');
define('TEXT_PRODUCT_AVAILABLE', 'På lager');
define('TEXT_PRODUCT_NOT_AVAILABLE', 'Ikke på lager');
define('TEXT_PRODUCTS_MANUFACTURER', 'Producent:');
define('TEXT_PRODUCTS_NAME', 'Produkt Navn:');
define('TEXT_PRODUCTS_DESCRIPTION', 'Produkt Beskrivelse:');
define('TEXT_PRODUCTS_QUANTITY', 'Produkt Mængde:');
define('TEXT_PRODUCTS_MODEL', 'Produkt Model:');
define('TEXT_PRODUCTS_IMAGE', 'Produkt Billede:');
define('TEXT_PRODUCTS_MAIN_IMAGE', 'Hoved Billede');
define('TEXT_PRODUCTS_LARGE_IMAGE', 'Stort Billede');
define('TEXT_PRODUCTS_LARGE_IMAGE_HTML_CONTENT', 'HTML Indhold (for popup)');
define('TEXT_PRODUCTS_ADD_LARGE_IMAGE', 'Tilføj Stort Billede');
define('TEXT_PRODUCTS_LARGE_IMAGE_DELETE_TITLE', 'Slet Stor Produkt Billede?');
define('TEXT_PRODUCTS_LARGE_IMAGE_CONFIRM_DELETE', ' Bekræft venligst fjernelsen af den store produktets Billede.');
define('TEXT_PRODUCTS_URL', 'Produktets URL:');
define('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small>(uden http://)</small>');
define('TEXT_PRODUCTS_PRICE_NET', 'Products Pris (excl. moms):');
define('TEXT_PRODUCTS_PRICE_GROSS', 'Products Pris (incl. moms):');
define('TEXT_PRODUCTS_WEIGHT', 'Produktets vægt:');

define('EMPTY_CATEGORY', 'Tøm kategori');

define('TEXT_HOW_TO_COPY', 'Kopi Metode:');
define('TEXT_COPY_AS_LINK', 'Link produkt');
define('TEXT_COPY_AS_DUPLICATE', 'Dupliker produkt');

define('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', 'Fejl: Kan ikke linke produkter i samme kategori.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Error: Catalog images directory is not writeable: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Error: Catalog images directory does not exist: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT', 'Fejl: Kategorien kan ikke flyttes ind i den valgte underkategori.');

define('TEXT_CATEGORIES_DESCRIPTION', 'Category Description:<br><small>shows in category page</small>');
define('TEXT_EDIT_CATEGORIES_DESCRIPTION', 'Edit the Category Description:');

define('TEXT_CATEGORIES_SEO_DESCRIPTION', 'Category Meta Description for SEO:<br><small>Add a &lt;description&gt; Meta Element.</small>');
define('TEXT_EDIT_CATEGORIES_SEO_DESCRIPTION', 'Edit the Category Meta Description for SEO:<br><small>Changes the &lt;description&gt; Meta Element.</small>');
define('TEXT_CATEGORIES_SEO_KEYWORDS', 'Category Meta Keywords for SEO:<br><small>Add a &lt;keyword&gt; Meta Element.<br>Must be comma separated.</small>');
define('TEXT_EDIT_CATEGORIES_SEO_KEYWORDS', 'Edit the Category Meta Keywords for SEO:<br><small>Changes the &lt;keyword&gt; Meta Element.<br>Must be comma separated.</small>');
 
const TEXT_PRODUCTS_GTIN = 'Products <abbr title="GTIN must be stored as 14 Digits. Any GTIN smaller than this will be zero-padded per GTIN Specifications.">GTIN</abbr>:<br><small>1 of UPC, EAN, ISBN etc</small>';
const TEXT_PRODUCTS_SEO_DESCRIPTION = 'Product Meta Description for SEO:<br><small>Add a &lt;description&gt; Meta Element.<br>HTML is not allowed.</small>';
const TEXT_PRODUCTS_SEO_KEYWORDS = 'Product Meta Keywords for SEO:<br><small>Add a &lt;keyword&gt; Meta Element or Search Engine.<br>Must be comma separated. HTML is not allowed.</small>';
const TEXT_PRODUCTS_SEO_TITLE = 'Products Title for SEO:<br><small>Replaces the product name in the &lt;title&gt; Meta Element<br>and optionally in the Breadcrumb Trail.<br>Leave blank to default to product name.</small>';
const TEXT_CATEGORIES_SEO_TITLE = 'Category Title for SEO:<br><small>Replaces the category name in the &lt;title&gt; Meta Element.<br>Leave blank to default to category name.</small>';
const TEXT_EDIT_CATEGORIES_SEO_TITLE = 'Edit the Category Title for SEO:<br><small>Replaces the category name in the &lt;title&gt; Meta Element<br>and optionally in the Breadcrumb Trail.<br>Leave blank to default to category name.</small>';

