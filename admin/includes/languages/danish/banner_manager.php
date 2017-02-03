<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Banner Manager');

define('TABLE_HEADING_BANNERS', 'Bannere');
define('TABLE_HEADING_GROUPS', 'Gruppe');
define('TABLE_HEADING_STATISTICS', 'Visninger / Antal klik');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_ACTION', 'Mulighed');

define('TEXT_BANNERS_TITLE', 'Banner Navn:');
define('TEXT_BANNERS_URL', 'Banner URL:');
define('TEXT_BANNERS_GROUP', 'Banner Gruppe:');
define('TEXT_BANNERS_NEW_GROUP', ', eller opret ny bannergruppe herunder');
define('TEXT_BANNERS_IMAGE', 'Billede:');
define('TEXT_BANNERS_IMAGE_LOCAL', ', eller henvis til fil herunder');
define('TEXT_BANNERS_IMAGE_TARGET', 'Billedsti (Gem som):');
define('TEXT_BANNERS_HTML_TEXT', 'HTML Tekst:');
define('TEXT_BANNERS_EXPIRES_ON', 'Udløber den:');
define('TEXT_BANNERS_OR_AT', ', eller');
define('TEXT_BANNERS_IMPRESSIONS', 'Antal visninger.');
define('TEXT_BANNERS_SCHEDULED_AT', 'Opstart den:');
define('TEXT_BANNERS_BANNER_NOTE', '<b>Banner Note:</b><ul><li>Brug HTML tekst i stedet for banner - Ikke begge.</li></ul>');
define('TEXT_BANNERS_INSERT_NOTE', '<b>Billede Note:</b><ul><li>Vælg "gennemse" for at finde et billede på din computer</li></ul>');
define('TEXT_BANNERS_EXPIRCY_NOTE', '<b>Udløbs Noter:</b><ul><li>Kun en af felterne skal være udfyldt</li><li>Lad felterne være blanke, hvis banneret ikke skal udløbe</li></ul>');
define('TEXT_BANNERS_SCHEDULE_NOTE', '<b>Opstarts Note:</b><ul><li>Hvis der er opstartsdato på banneret vil det først starte på den givende dato</li></ul>');

define('TEXT_BANNERS_DATE_ADDED', 'Dato oprettet:');
define('TEXT_BANNERS_SCHEDULED_AT_DATE', 'Opstart den: <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_DATE', 'Udløber den: <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_IMPRESSIONS', 'Udløber efter: <b>%s</b> visninger');
define('TEXT_BANNERS_STATUS_CHANGE', 'Status skift: %s');

define('TEXT_BANNERS_DATA', 'D<br>A<br>T<br>A');
define('TEXT_BANNERS_LAST_3_DAYS', 'Sidste 3 dage');
define('TEXT_BANNERS_BANNER_VIEWS', 'Banner visninger');
define('TEXT_BANNERS_BANNER_CLICKS', 'Banner kliks');

define('TEXT_INFO_DELETE_INTRO', 'Er du sikker på at du vil slette dette banner?');
define('TEXT_INFO_DELETE_IMAGE', 'Slet banner billede');

define('SUCCESS_BANNER_INSERTED', 'Success: Banneret er oprettet.');
define('SUCCESS_BANNER_UPDATED', 'Success: Banneret er opdateret');
define('SUCCESS_BANNER_REMOVED', 'Success: Banneret er slettet');
define('SUCCESS_BANNER_STATUS_UPDATED', 'Success: Banner status opdateret');

define('ERROR_BANNER_TITLE_REQUIRED', 'Error: Banner title required.');
define('ERROR_BANNER_GROUP_REQUIRED', 'Error: Banner group required.');
define('ERROR_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Error: Mappen eksistere ikke: %s');
define('ERROR_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Error: Kan ikke skrive til mappen: %s');
define('ERROR_IMAGE_DOES_NOT_EXIST', 'Error: Billede eksistere ikke');
define('ERROR_IMAGE_IS_NOT_WRITEABLE', 'Error: Kan ikke slette billede');
define('ERROR_UNKNOWN_STATUS_FLAG', 'Error: Ukendt status');

define('ERROR_GRAPHS_DIRECTORY_DOES_NOT_EXIST', 'Fejl: Mappen til grafer eksisterer ikke. Venligst opret mappen \'graphs\' som en undermappe til \'images\'.');
define('ERROR_GRAPHS_DIRECTORY_NOT_WRITEABLE', 'Fejl: Der kan ikke skrives til mappen for grafer.');
?>
