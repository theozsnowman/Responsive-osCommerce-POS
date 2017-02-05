<div class="panel panel-default">
  <div class="panel-heading"><a href="<?php echo tep_href_link('shopping_cart.php'); ?>"><?php echo MODULE_BOXES_SHOPPING_CART_BOX_TITLE; ?></a></div>
  <div class="panel-body">
    <ul class="list-unstyled">
      <?php echo $cart_contents_string; ?>
    </ul>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading"><?php echo MODULE_BOXES_SHOPPING_CART_BOX_COMMENT; ?></div>
  <div class="panel-body">
<?php echo tep_draw_form('cartcom', tep_href_link(basename($_SERVER['SCRIPT_NAME']), '', 'SSL'), 'post', 'id="cartcom"'); ?>
    <?php echo tep_draw_textarea_field('cartcomments', 'soft', 10, 5, $cartcomments, 'id="cartComments"'); ?>
</form>
  </div>
</div>
<?php  if ($cart->count_contents() > 0 && (substr(basename($_SERVER['SCRIPT_FILENAME']), 0, 8) != 'checkout')) { ?>
<div class="sidebtn"><?php echo tep_draw_button(IMAGE_BUTTON_CHECKOUT, 'glyphicon glyphicon-chevron-right', tep_href_link('checkout_shipping.php', '', 'SSL'), 'primary', NULL, 'btn-success'); ?></div>
<?php } ?>
<?php  if (basename($_SERVER['SCRIPT_FILENAME']) != 'categories.php') { ?>
<div class="sidebtn"><?php echo tep_draw_button(IMAGE_BACK_CATEGORY, 'glyphicon glyphicon-chevron-left', tep_href_link('categories.php'), 'primary', NULL, 'btn-success'); ?></div>
<?php } ?>
<script>
$( function() {
$( "#cartComments" ).change(function() {
$.post("savecomment.php", $("#cartcom").serialize() );    
});
} );
</script>