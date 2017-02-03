<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Valuta');

define('TABLE_HEADING_CURRENCY_NAME', 'Valuta');
define('TABLE_HEADING_CURRENCY_CODES', 'Kode');
define('TABLE_HEADING_CURRENCY_VALUE', 'Værdi');
define('TABLE_HEADING_ACTION', 'Mulighed');

define('TEXT_INFO_EDIT_INTRO', 'Udfør venligst de nødvendige ændringer');
define('TEXT_INFO_COMMON_CURRENCIES', '-- Gængse Valutaer --');
define('TEXT_INFO_CURRENCY_TITLE', 'Titel:');
define('TEXT_INFO_CURRENCY_CODE', 'Kode:');
define('TEXT_INFO_CURRENCY_SYMBOL_LEFT', 'Symbol Venstre:');
define('TEXT_INFO_CURRENCY_SYMBOL_RIGHT', 'Symbol Højre:');
define('TEXT_INFO_CURRENCY_DECIMAL_POINT', 'Decimal tegn:');
define('TEXT_INFO_CURRENCY_THOUSANDS_POINT', 'Tusind tegn:');
define('TEXT_INFO_CURRENCY_DECIMAL_PLACES', 'Antal decimaler:');
define('TEXT_INFO_CURRENCY_LAST_UPDATED', 'Sidst Opdateret:');
define('TEXT_INFO_CURRENCY_VALUE', 'Værdi:');
define('TEXT_INFO_CURRENCY_EXAMPLE', 'Eksempel:');
define('TEXT_INFO_INSERT_INTRO', 'Indtast den nye valuta med dens relaterede data');
define('TEXT_INFO_DELETE_INTRO', 'Er du sikker på du vil slette denne valuta?');
define('TEXT_INFO_HEADING_NEW_CURRENCY', 'Ny valuta');
define('TEXT_INFO_HEADING_EDIT_CURRENCY', 'Ret valuta');
define('TEXT_INFO_HEADING_DELETE_CURRENCY', 'Slet valuta');
define('TEXT_INFO_SET_AS_DEFAULT', TEXT_SET_DEFAULT . ' (kræver manuel opdatering af valuta værdier)');
define('TEXT_INFO_CURRENCY_UPDATED', 'Kursen for %s (%s) blev opdateret via %s.');

define('ERROR_REMOVE_DEFAULT_CURRENCY', 'Fejl: Standard valuta kan ikke slettes. Vælg en anden som standard og prøv igen.');
define('ERROR_CURRENCY_INVALID', 'Fejl: Kursen for %s (%s) blev ikke opdateret via %s. Er det en gyldig valuta kode?');
define('WARNING_PRIMARY_SERVER_FAILED', 'Advarsel: Den primære kurs server (%s) fejlede for %s (%s) - prøver den sekundære server.');?>
