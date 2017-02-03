<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2013 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Opret Konto');

define('HEADING_TITLE', 'Information om min konto');

define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>BEMÆRK:</b></font></small> Hvis du allerede har en konto hos os, skal du logge ind på <a href="' . tep_href_link('login.php', 'origin=checkout_address&connection=' . $HTTP_GET_VARS['connection'], 'NONSSL') . '"><u>login siden</u></a>.');

define('EMAIL_SUBJECT', 'Velkommen til ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Kære Hr. %s,' . "\n\n");
define('EMAIL_GREET_MS', 'Kære Fr. %s,' . "\n\n");
define('EMAIL_GREET_NONE', 'Kære %s' . "\n\n");
define('EMAIL_WELCOME', 'Vi er glade for at kunne byde dig velkommen som kunde her hos <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Du kan nu deltage i de <b>forskellige services</b> vi har at tilbyde dig. Nogle af disse services omfatter:' . "\n\n" . '<li><b>Permanent indkøbskurv</b> - alle produkter du tilføjer din indkøbskurv bliver der, indtil du sletter dem, eller afgiver en ordre.' . "\n" . '<li><b>Adressebog</b> - Vi sender gerne dine køb til en anden adresse! Vi gør det derved nemt f.eks. at få fødselsdagsgaverne frem til fødselaren.' . "\n" . '<li><b>Tidligere ordrer</b> - Se hvad du tidligere har købt hos os.' . "\n" . '<li><b>Produkt anmeldelser</b> - Del dine meninger om vore produkter med vore andre kunder.' . "\n\n");
define('EMAIL_CONTACT', 'Har du brug for hjælp til vore online services, eller andre spørgsmål, så mail til os på: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Bemærk:</b> Denne e-mail blev givet til os, af en af vore kunder. Hvis du ikke har valgt at blive medlem, så send venligst en mail til ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n" . 'Med venlig hilsen' . "\n\n" . STORE_NAME . "\n");
?>
