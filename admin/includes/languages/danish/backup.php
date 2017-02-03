<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Database Backup Manager');

define('TABLE_HEADING_TITLE', 'Titel');
define('TABLE_HEADING_FILE_DATE', 'Dato');
define('TABLE_HEADING_FILE_SIZE', 'Størrelse');
define('TABLE_HEADING_ACTION', 'Mulighed');

define('TEXT_INFO_HEADING_NEW_BACKUP', 'Ny Backup');
define('TEXT_INFO_HEADING_RESTORE_LOCAL', 'Gendan Lokal');
define('TEXT_INFO_NEW_BACKUP', 'Afbryd veller forstyr IKKE backup-processen, det kan tage et par minutter.');
define('TEXT_INFO_UNPACK', '<br><br>(efter udpakning af filen fra arkivet)');
define('TEXT_INFO_RESTORE', 'Afbryd eller forstyr ikke gendannelsesprocessen.<br><br>Jo større backup, Jo længere tid tager det!<br><br>hvis muligt, brug MySQl-klienten.<br><br>For eksempel:<br><br><b>mysql -h' . DB_SERVER . ' -u' . DB_SERVER_USERNAME . ' -p ' . DB_DATABASE . ' < %s </b> %s');
define('TEXT_INFO_RESTORE_LOCAL', 'Afbryd eller forstyr ikke gendannelsesprocessen.<br><br>Jo større backup, Jo længere tid tager det!');
define('TEXT_INFO_RESTORE_LOCAL_RAW_FILE', 'Den uploadede fil skal være en ren SQL-tekst (text) fil.');
define('TEXT_INFO_DATE', 'Dato:');
define('TEXT_INFO_SIZE', 'Størrelse:');
define('TEXT_INFO_COMPRESSION', 'Kompression:');
define('TEXT_INFO_USE_GZIP', 'Brug GZIP');
define('TEXT_INFO_USE_ZIP', 'Brug ZIP');
define('TEXT_INFO_USE_NO_COMPRESSION', 'Ingen Kompression (Ren SQL)');
define('TEXT_INFO_DOWNLOAD_ONLY', 'Kun Download (Gem ikke "server side")');
define('TEXT_INFO_BEST_THROUGH_HTTPS', 'Bedst gennem HTTPS forbindelse');
define('TEXT_DELETE_INTRO', 'Er du sikker på, at du vil slette denne backup ?');
define('TEXT_NO_EXTENSION', 'Ingen');
define('TEXT_BACKUP_DIRECTORY', 'Backup mappe:');
define('TEXT_LAST_RESTORATION', 'Sidste Gendannelse:');
define('TEXT_FORGET', '(<u>glem</u>)');

define('ERROR_BACKUP_DIRECTORY_DOES_NOT_EXIST', 'Fejl: Backup mappe findes ikke. Sæt venligst dette i configure.php.');
define('ERROR_BACKUP_DIRECTORY_NOT_WRITEABLE', 'Fejl: Backup mappe er ikke skrivbart.');
define('ERROR_DOWNLOAD_LINK_NOT_ACCEPTABLE', 'Fejl: Download-link ikke acceptabelt.');

define('SUCCESS_LAST_RESTORE_CLEARED', 'Succes: Den sidste gendannelse er blevet renset.');
define('SUCCESS_DATABASE_SAVED', 'Succes: Databasen er blevet gemt.');
define('SUCCESS_DATABASE_RESTORED', 'Succes: Databasen er blevet gendannet.');
define('SUCCESS_BACKUP_DELETED', 'Succes: Backuppen er blevet fjernet.');
?>
