<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2009 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Administratorer');

define('TABLE_HEADING_ADMINISTRATORS', 'Administratorer');
define('TABLE_HEADING_HTPASSWD', 'Sikret med htpasswd');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_INFO_INSERT_INTRO', 'Indtast den nye administrator med de relevante oplysninger');
define('TEXT_INFO_EDIT_INTRO', 'Lav de nødvendige ændringer');
define('TEXT_INFO_DELETE_INTRO', 'Er du sikker på at du vil slette denne administrator?');
define('TEXT_INFO_HEADING_NEW_ADMINISTRATOR', 'Ny Administrator');
define('TEXT_INFO_USERNAME', 'Brugernavn:');
define('TEXT_INFO_NEW_PASSWORD', 'Nyt Password:');
define('TEXT_INFO_PASSWORD', 'Password:');
define('TEXT_INFO_PROTECT_WITH_HTPASSWD', 'Beskyt Med htaccess/htpasswd');

define('ERROR_ADMINISTRATOR_EXISTS', 'FEJL: Administrator findes allerede.');

define('HTPASSWD_INFO', '<strong>Ekstra beskyttelse med htaccess/htpasswd</str
ong><p>Denne osCommerce Online Merchant Administration Tool installationen er ikke derudover sikret gennem htaccess / htpasswd midler. </ P> Aktivering af htaccess / htpasswd sikkerhedslag gemmer automatisk administrator brugernavn og adgangskoder i en htpasswd fil, når du opdaterer administratoradgangskode optegnelser.</p><p><strong>Bemærk</strong>, hvis denne yderligere sikkerhedslag er aktiveret, og du ikke længere kan få adgang til Administration Tool, skal du foretage følgende ændringer og konsultere din udbyder for at aktivere htaccess / htpasswd beskyttelse:</p><p><u><strong>1. Rediger denne fil:</strong></u><br /><br />' . DIR_FS_ADMIN . '.htaccess</p><p>Fjerne følgende linjer, hvis de findes:</p><p><i>%s</i></p><p><u><strong>2. Slet denne fil:</strong></u><br /><br />' . DIR_FS_ADMIN . '.htpasswd_oscommerce</p>');

define('HTPASSWD_SECURED', '<strong> Ekstra beskyttelse med htaccess / htpasswd </strong> <p> osCommerce Online Merchant Administration Tool installationen er desuden sikret gennem htaccess / htpasswd midler. </p>');

define('HTPASSWD_PERMISSIONS', ' <strong> Ekstra beskyttelse med htaccess / htpasswd </ strong> <p> osCommerce Online Merchant Administration Tool installationen er ikke derudover sikret gennem htaccess / htpasswd midler. </ p> Følgende filer skal være skrivbare af den web server for at aktivere htaccess / htpasswd sikkerhedslag:</p><ul><li>' . DIR_FS_ADMIN . '.htaccess</li><li>' . DIR_FS_ADMIN . '.htpasswd_oscommerce</li></ul><p>Genindlæs denne side at bekræfte, hvis de korrekte filrettigheder er blevet indstillet.Genindlæs denne side at bekræfte, hvis de korrekte filrettigheder er blevet indstillet.</p>');
?>
