<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2013 osCommerce

  Released under the GNU General Public License
*/

define('WARNING_SESSION_DIRECTORY_NON_EXISTENT', 'Sessions mappen eksisterer ikke: ' . tep_session_save_path() . '. Sessions fungerer ikke, før denne mappe er oprettet.');
define('WARNING_SESSION_DIRECTORY_NOT_WRITEABLE', 'Jeg er ikke i stand til at skrive til sessions mappen: ' . tep_session_save_path() . '. Sessions fungerer ikke, før de korrekte brugerrettigheder er indstillet.');
?>
