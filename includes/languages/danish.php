<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2013 osCommerce

  Released under the GNU General Public License
*/

// look in your $PATH_LOCALE/locale directory for available locales
// or type locale -a on the server.
// Examples:
// on RedHat try 'en_US'
// on FreeBSD try 'en_US.ISO_8859-1'
// on Windows try 'en', or 'English'
//@setlocale(LC_TIME, 'da_DK.ISO_8859-1');
@setlocale(LC_TIME, 'da_DK.UTF-8');

define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // this is used for strftime()
define('DATE_FORMAT', 'd/m/Y'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');
define('JQUERY_DATEPICKER_I18N_CODE', ''); // leave empty for en_US; see http://jqueryui.com/demos/datepicker/#localization
define('JQUERY_DATEPICKER_FORMAT', 'dd/mm/yy'); // see http://docs.jquery.com/UI/Datepicker/formatDate

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

// if USE_DEFAULT_LANGUAGE_CURRENCY is true, use the following currency, instead of the applications default currency (used when changing language)
define('LANGUAGE_CURRENCY', 'DKK');

// Global entries for the <html> tag
define('HTML_PARAMS','dir="LTR" lang="dk"');

// charset for web pages and emails
define('CHARSET', 'UTF-8');
//define('CHARSET', 'da_DK.ISO_8859-1');

// page title
define('TITLE', STORE_NAME);

// header text in includes/header.php
define('HEADER_TITLE_CREATE_ACCOUNT', 'Opret Konto');
define('HEADER_TITLE_MY_ACCOUNT', 'Min Konto');
define('HEADER_TITLE_CART_CONTENTS', 'Indkøbskurv');
define('HEADER_TITLE_CHECKOUT', 'Til Kassen');
define('HEADER_TITLE_TOP', 'Forside');
define('HEADER_TITLE_CATALOG', 'Butik');
define('HEADER_TITLE_LOGOFF', 'Log Af');
define('HEADER_TITLE_LOGIN', 'Log På');

// text for gender
define('MALE', 'Mand');
define('FEMALE', 'Kvinde');
define('MALE_ADDRESS', 'Hr.');
define('FEMALE_ADDRESS', 'Fru');

// text for date of birth example
define('DOB_FORMAT_STRING', 'dd/mm/yyyy');

// checkout procedure text
define('CHECKOUT_BAR_DELIVERY', 'Forsendelses Information');
define('CHECKOUT_BAR_PAYMENT', 'Betalings Information');
define('CHECKOUT_BAR_CONFIRMATION', 'Bekræft');
define('CHECKOUT_BAR_FINISHED', 'Færdig!');

// pull down default text
define('PULL_DOWN_DEFAULT', 'Vælg');
define('TYPE_BELOW', 'Indtast nedenfor');

// javascript messages
define('JS_ERROR', 'Der er opstået en fejl under behandlingen af din formular!\nRet venligst følgende:\n\n');

define('JS_REVIEW_TEXT', '*  \'Anmeldelsen\' skal mindst havet ' . REVIEW_TEXT_MIN_LENGTH . ' tegn.\n');
define('JS_REVIEW_RATING', '* Du skal give din anmeldelse en karakter.\n');

define('JS_ERROR_NO_PAYMENT_MODULE_SELECTED', '* Vælg venligst en betalings-metode for din ordre.\n');

define('JS_ERROR_SUBMITTED', 'Denne form er allerede afsendt. Klik på Ok og vent på at processen afslutter.');

define('ERROR_NO_PAYMENT_MODULE_SELECTED', 'Du har ikke valgt betalings måde!.');

define('CATEGORY_COMPANY', '<b>[ Firma ]</b]');
define('CATEGORY_PERSONAL', '<b>[ Personlig ]</b>');
define('CATEGORY_ADDRESS', '<b>[ Adresse ]</b>');
define('CATEGORY_CONTACT', '<b>[ Kontakt ]</b>');
define('CATEGORY_OPTIONS', '<b>[ Mulige tilvalg ]</b>');
define('CATEGORY_PASSWORD', '<b>[ Password ]</b>');

define('ENTRY_COMPANY', 'Firma:');

define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Køn:');
define('ENTRY_GENDER_ERROR', 'Vælg venligst køn.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', 'Fornavn:');
define('ENTRY_FIRST_NAME_ERROR', 'Fornavn skal være min ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' tegn.');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Efternavn:');
define('ENTRY_LAST_NAME_ERROR', 'Efternavn skal være min ' . ENTRY_LAST_NAME_MIN_LENGTH . ' tegn.');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Fødselsdag:');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'Din fødselsdato skal være efter formatet DD.MM.ÅÅÅÅ (Fx 21.05.1970)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (Fx 21/05/1970)');
define('ENTRY_EMAIL_ADDRESS', 'E-Mail Adresse:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'E-mail adressee skal være min ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' tegn');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'Din email adresse ser ikke ud til at være korrekt!');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'E-mail adressen eksistere allerede! Log venligst ind med E-mail adressen, eller opret kontoen med en anden E-mail adresse');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', 'Gade:');
define('ENTRY_STREET_ADDRESS_ERROR', 'Adresse skal være min ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' tegn');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', 'Bydel:');

define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Postnr:');
define('ENTRY_POST_CODE_ERROR', 'Postnr. skal være min ' . ENTRY_POSTCODE_MIN_LENGTH . ' tegn');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', 'By:');
define('ENTRY_CITY_ERROR', 'Bynavn skal være min ' . ENTRY_CITY_MIN_LENGTH . ' tegn');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', 'Stat:');
define('ENTRY_STATE_ERROR', 'Stat skal bestå af minimum ' . ENTRY_STATE_MIN_LENGTH . ' bogstaver/tegn.');
define('ENTRY_STATE_ERROR_SELECT', 'Vælg venligst en stat fra rullened-menuen.');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', 'Land:');
define('ENTRY_COUNTRY_ERROR', 'Du skal vælge et land fra rullened-menuen.');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', 'Telefon nummer:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Telefonnr. skal være min ' . ENTRY_TELEPHONE_MIN_LENGTH . ' cifre');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', 'Fax nummer:');

define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Nyhedsbrev:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Tilmeldt');
define('ENTRY_NEWSLETTER_NO', 'Frameldt');
define('ENTRY_PASSWORD', 'Password:');
define('ENTRY_PASSWORD_ERROR', 'Password skal være min ' . ENTRY_PASSWORD_MIN_LENGTH . ' tegn');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'Password bekræftelsen skal være den samme som dit password.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Password Bekræft:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Nuværende Password:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Dit password skal bestå af minimum ' . ENTRY_PASSWORD_MIN_LENGTH . ' bogstaver/tegn.');
define('ENTRY_PASSWORD_NEW', 'Nyt Password:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'Dit nye password skal bestå af minimum ' . ENTRY_PASSWORD_MIN_LENGTH . ' bogstaver/tegn.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'Password bekræftigelsen skal være det samme som dit nye password.');
define('PASSWORD_HIDDEN', '--SKJULT--');

// constants for use in tep_prev_next_display function
define('TEXT_RESULT_PAGE', 'Søgningen fandt:');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> produkter)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> ordre)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> anmeldelser)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> nye varer)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Viser <b>%d</b> til <b>%d</b> (af <b>%d</b> tilbud)');

define('PREVNEXT_TITLE_FIRST_PAGE', 'Første side');
define('PREVNEXT_TITLE_PREVIOUS_PAGE', 'Forrige side');
define('PREVNEXT_TITLE_NEXT_PAGE', 'Næste side');
define('PREVNEXT_TITLE_LAST_PAGE', 'Sidste side');
define('PREVNEXT_TITLE_PAGE_NO', 'Side %d');
define('PREVNEXT_TITLE_PREV_SET_OF_NO_PAGE', 'Forrige del af %d Sider');
define('PREVNEXT_TITLE_NEXT_SET_OF_NO_PAGE', 'Næste del af %d sider');
define('PREVNEXT_BUTTON_FIRST', '<<Første');
define('PREVNEXT_BUTTON_PREV', '[<< Forrige]');
define('PREVNEXT_BUTTON_NEXT', '[Næste >>]');
define('PREVNEXT_BUTTON_LAST', 'Sidste>>');

define('IMAGE_BUTTON_ADD_ADDRESS', 'Tilføj adresse');
define('IMAGE_BUTTON_ADDRESS_BOOK', 'Adressebog');
define('IMAGE_BUTTON_BACK', 'Tilbage');
define('IMAGE_BUTTON_BUY_NOW', 'Køb Nu');
define('IMAGE_BUTTON_CHANGE_ADDRESS', 'Ret adresse');
define('IMAGE_BUTTON_CHECKOUT', 'Til Kassen');
define('IMAGE_BUTTON_CONFIRM_ORDER', 'Bekræft ordre');
define('IMAGE_BUTTON_CONTINUE', 'Fortsæt');
define('IMAGE_BUTTON_CONTINUE_SHOPPING', 'Lad mig shoppe lidt mere');
define('IMAGE_BUTTON_DELETE', 'Slet');
define('IMAGE_BUTTON_EDIT_ACCOUNT', 'Ret medlemskonto');
define('IMAGE_BUTTON_HISTORY', 'Tidligere ordrer');
define('IMAGE_BUTTON_LOGIN', 'Log på');
define('IMAGE_BUTTON_IN_CART', 'I indkøbskurven');
define('IMAGE_BUTTON_NOTIFICATIONS', 'Adviséringer');
define('IMAGE_BUTTON_QUICK_FIND', 'Hurtig tilføj');
define('IMAGE_BUTTON_REMOVE_NOTIFICATIONS', 'Slet advisering');
define('IMAGE_BUTTON_REVIEWS', 'Anmeldelser');
define('IMAGE_BUTTON_SEARCH', 'Søg');
define('IMAGE_BUTTON_SHIPPING_OPTIONS', 'Forsendelses valg');
define('IMAGE_BUTTON_TELL_A_FRIEND', 'Anbefal en ven');
define('IMAGE_BUTTON_UPDATE', 'Opdatér');
define('IMAGE_BUTTON_UPDATE_CART', 'Opdatér indkøbskurv');
define('IMAGE_BUTTON_WRITE_REVIEW', 'Skriv anmeldelse');
//define('IMAGE_BUTTON_REQUEST', 'Anmodning');

define('SMALL_IMAGE_BUTTON_DELETE', 'Slet');
define('SMALL_IMAGE_BUTTON_EDIT', 'Ret');
define('SMALL_IMAGE_BUTTON_VIEW', 'Vis');
define('SMALL_IMAGE_BUTTON_BUY', 'Køb');

define('ICON_ARROW_RIGHT', 'mere');
define('ICON_CART', 'I indkøbskurv');
define('ICON_ERROR', 'Fejl!');
define('ICON_SUCCESS', 'Success');
define('ICON_WARNING', 'Advarsel');

define('TEXT_GREETING_PERSONAL', 'Hej <span class="greetUser">%s!</span><br>Kunne du tænke dig at se <a href="%s"><u> de seneste nyheder</u></a>?<br>');
define('TEXT_GREETING_PERSONAL_RELOGON', '<small>Jeg er ikke %s, så jeg <a href="%s"><u>logger lige på</u></a> med mine egne konto oplysninger.</small>');
define('TEXT_GREETING_GUEST', 'Velkommen kære <span class="greetUser">gæst!</span>');

define('TEXT_SORT_PRODUCTS', 'Sortér produkterne ');
define('TEXT_DESCENDINGLY', 'Faldende');
define('TEXT_ASCENDINGLY', 'stigende');
define('TEXT_BY', ' efter ');

define('TEXT_REVIEW_BY', 'efter %s');
define('TEXT_REVIEW_WORD_COUNT', '%s ord');
define('TEXT_REVIEW_RATING', 'Rating: %s [%s]');
define('TEXT_REVIEW_DATE_ADDED', 'Tilføjet dato: %s');
define('TEXT_NO_REVIEWS', 'Der er i øjeblikket ingen anmeldelser.');
define('TEXT_NO_NEW_PRODUCTS', 'Der er i øjeblikket ingen nyheder.');

define('TEXT_UNKNOWN_TAX_RATE', 'Ukendt moms-værdi');

define('TEXT_REQUIRED', '<span class="errorText">Skal udfyldes</span>');
define('ERROR_TEP_MAIL', '<font face="Verdana, Arial" size="2" color="#ff0000"><b><small>TEP ERROR:</small> Cannot send the email through the specified SMTP server. Please check your php.ini setting and correct the SMTP server if necessary.</b></font>');

define('TEXT_CCVAL_ERROR_INVALID_DATE', 'Ugyldig udløbs-dato for kreditkortet.<br>Kontroller dato og prøv igen.');
define('TEXT_CCVAL_ERROR_INVALID_NUMBER', 'Ugyldigt kreditkortnummer.<br>Kontroller nummeret og prøv igen.');
define('TEXT_CCVAL_ERROR_UNKNOWN_CARD', 'De første 4 cifre er indtastet som: %s<br>Hvis det er korrekt, er kortet ikke en type vi modtager.<br>Er det ikke korrekt, så prøv igen.');

// category views
define('TEXT_VIEW', 'Vis: ');
define('TEXT_VIEW_LIST', ' List');
define('TEXT_VIEW_GRID', ' Felt');

// search placeholder
define('TEXT_SEARCH_PLACEHOLDER','Søg');

// message for required inputs
define('FORM_REQUIRED_INFORMATION', '<span class="glyphicon glyphicon-asterisk inputRequirement"></span> Krævet information');
define('FORM_REQUIRED_INPUT', '<span><span class="glyphicon glyphicon-asterisk form-control-feedback inputRequirement"></span></span>');

// reviews
define('REVIEWS_TEXT_RATED', 'Vuderet %s af <cite title="%s" itemprop="reviewer">%s</cite>');
define('REVIEWS_TEXT_AVERAGE', 'Gennemsnitlig vudering basseret på <span itemprop="count">%s</span> review(s) %s');
define('REVIEWS_TEXT_TITLE', 'Hvad vores kunder siger...');

// grid/list
define('TEXT_SORT_BY', 'Sorter efter ');
// moved from index
define('TABLE_HEADING_IMAGE', '');
define('TABLE_HEADING_MODEL', 'Model');
define('TABLE_HEADING_PRODUCTS', 'Produkt Navn');
define('TABLE_HEADING_MANUFACTURER', 'Fabrikant');
define('TABLE_HEADING_QUANTITY', 'Antal');
define('TABLE_HEADING_PRICE', 'Pris');
define('TABLE_HEADING_WEIGHT', 'Vægt');
define('TABLE_HEADING_BUY_NOW', 'Køb nu');
define('TABLE_HEADING_LATEST_ADDED', 'Seneste produkter');

// product notifications
define('PRODUCT_SUBSCRIBED', '%s Er blevet tilføjet til din notifikerings liste');
define('PRODUCT_UNSUBSCRIBED', '%s Er blevet fjernet fra din notifikerings liste');
define('PRODUCT_ADDED', '%s er blevet tilføjet din kurv');
define('PRODUCT_REMOVED', '%s er blevet fjernet fra din kurv');

// bootstrap helper
define('MODULE_CONTENT_BOOTSTRAP_ROW_DESCRIPTION', '');