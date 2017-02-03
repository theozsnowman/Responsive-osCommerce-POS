<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

// look in your $PATH_LOCALE/locale directory for available locales..
// Array examples which should work on all servers:
// 'en_US.UTF-8', 'en_US.UTF8', 'enu_usa'
// 'en_GB.UTF-8', 'en_GB.UTF8', 'eng_gb'
// 'en_AU.UTF-8', 'en_AU.UTF8', 'ena_au'
setlocale(LC_ALL, array('en_US.UTF-8', 'en_US.UTF8', 'enu_usa'));
define('DATE_FORMAT_SHORT', '%m/%d/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // this is used for strftime()
define('DATE_FORMAT', 'm/d/Y'); // this is used for date()
define('PHP_DATE_TIME_FORMAT', 'm/d/Y H:i:s'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');
define('JQUERY_DATEPICKER_I18N_CODE', ''); // leave empty for en_US; see http://jqueryui.com/demos/datepicker/#localization
define('JQUERY_DATEPICKER_FORMAT', 'mm/dd/yy'); // see http://docs.jquery.com/UI/Datepicker/formatDate

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 3, 2) . substr($date, 0, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 0, 2) . substr($date, 3, 2);
  }
}

// Global entries for the <html> tag
define('HTML_PARAMS','dir="ltr" lang="dk"');

// charset for web pages and emails
define('CHARSET', 'utf-8');

// page title
define('TITLE', 'osCommerce Administration');

// header text in includes/header.php
define('HEADER_TITLE_TOP', 'Administration');
define('HEADER_TITLE_SUPPORT_SITE', 'Support Side');
define('HEADER_TITLE_ONLINE_CATALOG', 'Online Katalog');
define('HEADER_TITLE_ADMINISTRATION', 'Administration');

// text for gender
define('MALE', 'Mand');
define('FEMALE', 'Kvinde');

// text for date of birth example
define('DOB_FORMAT_STRING', 'dd/mm/yyyy');

// configuration box text in includes/boxes/configuration.php
define('BOX_HEADING_CONFIGURATION', 'Konfiguration');
define('BOX_CONFIGURATION_MYSTORE', 'Min butik');
define('BOX_CONFIGURATION_LOGGING', 'Logging');
define('BOX_CONFIGURATION_CACHE', 'Cache');
define('BOX_CONFIGURATION_ADMINISTRATORS', 'Administratorer');
define('BOX_CONFIGURATION_STORE_LOGO', 'Store Logo');
define('BOX_CONFIGURATION_REWARD_POINTS', 'Stempel System');

// modules box text in includes/boxes/modules.php
define('BOX_HEADING_MODULES', 'Moduler');

// categories box text in includes/boxes/catalog.php
define('BOX_HEADING_CATALOG', 'Katalog');
define('BOX_CATALOG_CATEGORIES_PRODUCTS', 'Kategorier og produkter');
define('BOX_CATALOG_CATEGORIES_PRODUCTS_ATTRIBUTES', 'Produkt attributter');
define('BOX_CATALOG_MANUFACTURERS', 'Producenter');
define('BOX_CATALOG_REVIEWS', 'Anmeldelser');
define('BOX_CATALOG_SPECIALS', 'Tilbud');
define('BOX_CATALOG_PRODUCTS_EXPECTED', 'Forventede produkter');

// customers box text in includes/boxes/customers.php
define('BOX_HEADING_CUSTOMERS', 'Kunder');
define('BOX_CUSTOMERS_CUSTOMERS', 'Kunder');

// orders box text in includes/boxes/orders.php
define('BOX_HEADING_ORDERS', 'Ordrer');
define('BOX_ORDERS_ORDERS', 'Ordrer');

// taxes box text in includes/boxes/taxes.php
define('BOX_HEADING_LOCATION_AND_TAXES', 'Lokalitioner og afgifter (moms)');
define('BOX_TAXES_COUNTRIES', 'Lande');
define('BOX_TAXES_ZONES', 'Zoner');
define('BOX_TAXES_GEO_ZONES', 'Afgift Zoner');
define('BOX_TAXES_TAX_CLASSES', 'Afgift klasser');
define('BOX_TAXES_TAX_RATES', 'Afgift satser');

// reports box text in includes/boxes/reports.php
define('BOX_HEADING_REPORTS', 'Rapporter');
define('BOX_REPORTS_PRODUCTS_VIEWED', 'Produkter vist');
define('BOX_REPORTS_PRODUCTS_PURCHASED', 'Produkter købt');
define('BOX_REPORTS_ORDERS_TOTAL', 'Kunder ordre total');

// tools text in includes/boxes/tools.php
define('BOX_HEADING_TOOLS', 'Værktøjer');
define('BOX_TOOLS_ACTION_RECORDER', 'Action Recorder');
define('BOX_TOOLS_BACKUP', 'Database Backup');
define('BOX_TOOLS_BANNER_MANAGER', 'Banner Manager');
define('BOX_TOOLS_CACHE', 'Cache Kontrol');
define('BOX_TOOLS_DEFINE_LANGUAGE', 'Rediger sprogfiler');
define('BOX_TOOLS_DEFINE_LANGUAGE_ADMIN', 'Rediger sprogfiler Admin');
define('BOX_TOOLS_MAIL', 'Send Email');
define('BOX_TOOLS_NEWSLETTER_MANAGER', 'Nyhedsbrev Manager');
define('BOX_TOOLS_SEC_DIR_PERMISSIONS', 'Mappe Sikkerheds Indstillinger');
define('BOX_TOOLS_SERVER_INFO', 'Server Info');
define('BOX_TOOLS_VERSION_CHECK', 'Version Checker');
define('BOX_TOOLS_WHOS_ONLINE', 'Hvem er online?');

// localizaion box text in includes/boxes/localization.php
define('BOX_HEADING_LOCALIZATION', 'Lokalitioner');
define('BOX_LOCALIZATION_CURRENCIES', 'Valuta');
define('BOX_LOCALIZATION_LANGUAGES', 'Lande');
define('BOX_LOCALIZATION_ORDERS_STATUS', 'Ordrestatus');

// javascript messages
define('JS_ERROR', 'Der skete en fejl!\nlav venligst følgende rettelser:\n\n');

define('JS_OPTIONS_VALUE_PRICE', '* Angiv venligst en pris for produktet\n');
define('JS_OPTIONS_VALUE_PRICE_PREFIX', '* Den nye produkt atribute skal have en pris prefix\n');

define('JS_PRODUCTS_NAME', '* Produktet mangler et navn\n');
define('JS_PRODUCTS_DESCRIPTION', '* Produktet mangler en beskrivelse\n');
define('JS_PRODUCTS_PRICE', '* Produktet mangler en pris\n');
define('JS_PRODUCTS_WEIGHT', '* Produktet mangler en vægt\n');
define('JS_PRODUCTS_QUANTITY', '* Produktet mangler en mængde\n');
define('JS_PRODUCTS_MODEL', '* Produktet mangler et varenummer\n');
define('JS_PRODUCTS_IMAGE', '* Det nye produkt mangler et billede\n');

define('JS_SPECIALS_PRODUCTS_PRICE', '* Sæt venligst en ny pris for dette produkt\n');

define('JS_GENDER', '*  \'Køn\' skal vælges.\n');
define('JS_FIRST_NAME', '* \'Fornavn\' skal have mindst ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' tegn.\n');
define('JS_LAST_NAME', '*  \'Efternavn\' skal have mindst ' . ENTRY_LAST_NAME_MIN_LENGTH . ' tegn.\n');
define('JS_DOB', '* \'Fødselsdato\' skal have følgende format: xx/xx/xxxx (dag/måned/år).\n');
define('JS_EMAIL_ADDRESS', '* \'E-Mail Adresse\' skal have mindst ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' tegn.\n');
define('JS_ADDRESS', '*  \'Gade\' skal have mindst ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' tegn.\n');
define('JS_POST_CODE', '*  \'Postnr\' skal have mindst ' . ENTRY_POSTCODE_MIN_LENGTH . ' tegn.\n');
define('JS_CITY', '*  \'By\' skal have mindst ' . ENTRY_CITY_MIN_LENGTH . ' tegn.\n');
define('JS_STATE', '*  \'State\' skal vælges.\n');
define('JS_STATE_SELECT', '-- Vælg ovenfor --');
define('JS_ZONE', '* \'State\' skal vælges fra listen med lande.');
define('JS_COUNTRY', '*  \'Land\' skal vælgesn.\n');
define('JS_TELEPHONE', '*  \'Telefon nr\' skal have mindst ' . ENTRY_TELEPHONE_MIN_LENGTH . ' cifre.\n');
define('JS_PASSWORD', '*  \'Password\' og \'Bekræft\' skal være ens og have mindst ' . ENTRY_PASSWORD_MIN_LENGTH . ' tegn.\n');

define('JS_ORDER_DOES_NOT_EXIST', 'Ordrenummer %s eksisterer ikke!');

define('CATEGORY_PERSONAL', 'Person oplysninger');
define('CATEGORY_ADDRESS', 'Adresse');
define('CATEGORY_CONTACT', 'Kontakt');
define('CATEGORY_COMPANY', 'Firma/Organisation');
define('CATEGORY_OPTIONS', 'Muligheder');

define('ENTRY_GENDER', 'Køn:');
define('ENTRY_GENDER_ERROR', '&nbsp;<span class="errorText">skal udfyldes</span>');
define('ENTRY_FIRST_NAME', 'Fornavn:');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' tegn</span>');
define('ENTRY_LAST_NAME', 'Efternavn:');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_LAST_NAME_MIN_LENGTH . ' tegn</span>');
define('ENTRY_DATE_OF_BIRTH', 'Fødselsdag:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<span class="errorText">(fx. 21/01/1970)</span>');
define('ENTRY_EMAIL_ADDRESS', 'E-Mail Adresse:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' tegn</span>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<span class="errorText">Emailadressen ser ikke ud til at være valid!</span>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<span class="errorText">Denne emailadresse eksisterer allerede!</span>');
define('ENTRY_COMPANY', 'Firma:');

define('ENTRY_STREET_ADDRESS', 'Gadenavn:');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' tegn</span>');
define('ENTRY_SUBURB', 'Bydel:');

define('ENTRY_POST_CODE', 'Postnr:');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_POSTCODE_MIN_LENGTH . ' tegn</span>');
define('ENTRY_CITY', 'By:');
define('ENTRY_CITY_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_CITY_MIN_LENGTH . ' tegn</span>');
define('ENTRY_STATE', 'Stat:');
define('ENTRY_STATE_ERROR', '&nbsp;<span class="errorText">skal udfyldes</span>');
define('ENTRY_COUNTRY', 'Land:');
define('ENTRY_COUNTRY_ERROR', 'Du skal vælge land fra menu, også selvom der kun er en mulighed');
define('ENTRY_TELEPHONE_NUMBER', 'Telefonnr:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_TELEPHONE_MIN_LENGTH . ' tegn</span>');
define('ENTRY_FAX_NUMBER', 'Faxnr:');
define('ENTRY_NEWSLETTER', 'Nyhedsbrev:');
define('ENTRY_NEWSLETTER_YES', 'Tilmeldt');
define('ENTRY_NEWSLETTER_NO', 'Frameldt');

// images
define('IMAGE_ANI_SEND_EMAIL', 'Sender E-Mail');
define('IMAGE_BACK', 'Tilbage');
define('IMAGE_BACKUP', 'Backup');
define('IMAGE_CANCEL', 'Cancel');
define('IMAGE_CONFIRM', 'Bekræft');
define('IMAGE_COPY', 'Kopier');
define('IMAGE_COPY_TO', 'Kopier Til');
define('IMAGE_DETAILS', 'Detaljer');
define('IMAGE_DELETE', 'Slet');
define('IMAGE_EDIT', 'Rediger');
define('IMAGE_EMAIL', 'Email');
define('IMAGE_EXPORT', 'Export');
define('IMAGE_ICON_STATUS_GREEN', 'Aktiv');
define('IMAGE_ICON_STATUS_GREEN_LIGHT', 'Sæt Aktiv');
define('IMAGE_ICON_STATUS_RED', 'Inaktiv');
define('IMAGE_ICON_STATUS_RED_LIGHT', 'Sæt Inaktiv');
define('IMAGE_ICON_INFO', 'Info');
define('IMAGE_INSERT', 'Insæt');
define('IMAGE_LOCK', 'Lås');
define('IMAGE_MODULE_INSTALL', 'Installer Modul');
define('IMAGE_MODULE_REMOVE', 'Slet Modul');
define('IMAGE_MOVE', 'Flyt');
define('IMAGE_NEW_BANNER', 'Ny Banner');
define('IMAGE_NEW_CATEGORY', 'Ny Kategori');
define('IMAGE_NEW_COUNTRY', 'Nyt Land');
define('IMAGE_NEW_CURRENCY', 'Ny Valuta');
define('IMAGE_NEW_FILE', 'Ny Fil');
define('IMAGE_NEW_FOLDER', 'Ny Mappe');
define('IMAGE_NEW_LANGUAGE', 'Nyt Sprog');
define('IMAGE_NEW_NEWSLETTER', 'Nyt Nyhedsbrev');
define('IMAGE_NEW_PRODUCT', 'Nyt Produkt');
define('IMAGE_NEW_TAX_CLASS', 'Ny afgiftsklasse');
define('IMAGE_NEW_TAX_RATE', 'Ny Afgift Sats');
define('IMAGE_NEW_TAX_ZONE', 'Ny Afgift Zone');
define('IMAGE_NEW_ZONE', 'Ny Zone');
define('IMAGE_ORDERS', 'Ordrer');
define('IMAGE_ORDERS_INVOICE', 'Faktura');
define('IMAGE_ORDERS_PACKINGSLIP', 'Pakkeseddel');
define('IMAGE_PREVIEW', 'Vis');
define('IMAGE_RESTORE', 'Gendan');
define('IMAGE_RESET', 'Reset');
define('IMAGE_SAVE', 'Gem');
define('IMAGE_SEARCH', 'Søg');
define('IMAGE_SELECT', 'Vælg');
define('IMAGE_SEND', 'Send');
define('IMAGE_SEND_EMAIL', 'Send Email');
define('IMAGE_UNLOCK', 'Lås op');
define('IMAGE_UPDATE', 'Opdater');
define('IMAGE_UPDATE_CURRENCIES', 'Opdater Valutakurser');
define('IMAGE_UPLOAD', 'Upload');

define('ICON_CROSS', 'Falsk');
define('ICON_CURRENT_FOLDER', 'Nuværende Mappe');
define('ICON_DELETE', 'Slet');
define('ICON_ERROR', 'Fejl');
define('ICON_FILE', 'Fil');
define('ICON_FILE_DOWNLOAD', 'Download');
define('ICON_FOLDER', 'Mappe');
define('ICON_LOCKED', 'Låst');
define('ICON_PREVIOUS_LEVEL', 'Et niveau op');
define('ICON_PREVIEW', 'Vis');
define('ICON_STATISTICS', 'Statistik');
define('ICON_SUCCESS', 'Udført');
define('ICON_TICK', 'Sandt');
define('ICON_UNLOCKED', 'Låst Op');
define('ICON_WARNING', 'Advarsel');

// constants for use in tep_prev_next_display function
define('TEXT_RESULT_PAGE', 'Side %s af %d');
define('TEXT_DISPLAY_NUMBER_OF_BANNERS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> bannere)');
define('TEXT_DISPLAY_NUMBER_OF_COUNTRIES', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> lande)');
define('TEXT_DISPLAY_NUMBER_OF_CUSTOMERS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> kunder)');
define('TEXT_DISPLAY_NUMBER_OF_CURRENCIES', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> valuta)');
define('TEXT_DISPLAY_NUMBER_OF_ENTRIES', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> poster)');
define('TEXT_DISPLAY_NUMBER_OF_LANGUAGES', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> sprog)');
define('TEXT_DISPLAY_NUMBER_OF_MANUFACTURERS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> producenter)');
define('TEXT_DISPLAY_NUMBER_OF_NEWSLETTERS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> nyhedsbreve)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> ordrer)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS_STATUS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> ordrers status)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> produkter)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_EXPECTED', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> forventede produkter)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> produkt anmeldelser)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> produkter på tilbud)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_CLASSES', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> afgift klasser)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_ZONES', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> afgift zoner)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_RATES', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> afgift satser)');
define('TEXT_DISPLAY_NUMBER_OF_ZONES', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> zoner)');

define('PREVNEXT_BUTTON_PREV', '&lt;&lt;');
define('PREVNEXT_BUTTON_NEXT', '&gt;&gt;');

define('TEXT_DEFAULT', 'Standard');
define('TEXT_SET_DEFAULT', 'Sæt som standard');
define('TEXT_FIELD_REQUIRED', '&nbsp;<span class="fieldRequired">* Skal udfyldes</span>');

define('TEXT_CACHE_CATEGORIES', 'Kategorier Boks');
define('TEXT_CACHE_MANUFACTURERS', 'Leverandører Boks');
define('TEXT_CACHE_ALSO_PURCHASED', 'Købte også modulet');

define('TEXT_NONE', '--ingen--');
define('TEXT_TOP', 'Top');

define('ERROR_DESTINATION_DOES_NOT_EXIST', 'Fejl: Destinationen eksisterer ikke.');
define('ERROR_DESTINATION_NOT_WRITEABLE', 'Fejl: Der kan ikke skrives til destinationen.');
define('ERROR_FILE_NOT_SAVED', 'Fejl: Fil upload er ikke gemt.');
define('ERROR_FILETYPE_NOT_ALLOWED', 'Fejl: Fil upload type er ikke tilladt.');
define('SUCCESS_FILE_SAVED_SUCCESSFULLY', 'Success: Fil upload er gemt.');
define('WARNING_NO_FILE_UPLOADED', 'Advarsel: Ingen fil blev uploaded.');

// bootstrap helper
define('MODULE_CONTENT_BOOTSTRAP_ROW_DESCRIPTION', '<p>Content Width can be 12 or less per column per row.</p><p>12/12 = 100% width, 6/12 = 50% width, 4/12 = 33% width.</p><p>Total of all columns in any one row must equal 12 (eg:  3 boxes of 4 columns each, 1 box of 12 columns and so on).</p>');

// seo helper
define('PLACEHOLDER_COMMA_SEPARATION', 'Skal, Være, Komma, Sepereret');