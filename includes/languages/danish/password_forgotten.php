<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2013 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Login');
define('NAVBAR_TITLE_2', 'Glemt Password');

define('HEADING_TITLE', 'Jeg har glemt mit password!');

define('TEXT_MAIN', 'Hvis du har glemt dit password, så indtast din e-mail-adresse nedenfor, og vi vil sende dig instruktioner om, hvordan man sikkert ændre din adgangskode.');

define('TEXT_PASSWORD_RESET_INITIATED', 'Du tjekke din e-mail for at få instruktioner om, hvordan du ændrer din adgangskode. Vejledningen indeholder et link, der kun er gyldigt i 24 timer, eller indtil dit password er blevet opdateret.');

define('TEXT_NO_EMAIL_ADDRESS_FOUND', 'Fejl: E-mail adresse blev ikke fundet i vores optegnelser, prøv igen. ');

define('EMAIL_PASSWORD_RESET_SUBJECT', STORE_NAME . ' - Ny Adgangskode');
define('EMAIL_PASSWORD_RESET_BODY', 'Et nyt kodeord er anmodet om din konto på ' . STORE_NAME . '.' . "\n\n" . 'Følg venligst denne personlige link til sikkert ændre din adgangskode:' . "\n\n" . '%s' . "\n\n" . 'Dette link vil automatisk blive kasseret efter 24 timer eller efter din adgangskode er blevet ændret.' . "\n\n" . 'For hjælp med nogen af vores online-tjenester, kan du kontakte butikken-ejer: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");

define('ERROR_ACTION_RECORDER', 'Fejl: En nulstilling af adgangskode link er allerede blevet sendt. Prøv igen om% s minutter.');
?>
