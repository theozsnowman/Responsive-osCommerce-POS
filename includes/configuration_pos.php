<?php
$disabled_array = array('MODULE_CONTENT_LOGIN_FORM_STATUS', 'MODULE_BOXES_INFORMATION_STATUS', 'MODULE_BOXES_CARD_ACCEPTANCE_STATUS', 'MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_STATUS', 'MODULE_BOXES_WHATS_NEW_STATUS', 'MODULE_BOXES_KATALOG_STATUS', 'MODULE_BOXES_SMILEY_STATUS', 'MODULE_CONTENT_NAVBAR_STATUS', 'MODULE_BOXES_CATEGORIES_STATUS', 'MODULE_BOXES_ORDER_HISTORY_STATUS','MODULE_PAYMENT_QUICKPAY_ADVANCED_STATUS');
$enabled_array = array( '');
  $configuration_query = tep_db_query('select configuration_key as cfgKey, configuration_value as cfgValue from ' . TABLE_CONFIGURATION);
  while ($configuration = tep_db_fetch_array($configuration_query)) {
  if (in_array($configuration['cfgKey'], $disabled_array, true)) {
  define($configuration['cfgKey'], 'False');
  } else if (in_array($configuration['cfgKey'], $enabled_array, true)) {
  define($configuration['cfgKey'], 'True');   
  } else { 
  define($configuration['cfgKey'], $configuration['cfgValue']);
  }
  }
?>