<?php
$heading = get_field( 'heading' );
$left_col_text = get_field( 'content' );
$contact_info = get_field( 'contact_box' );
?>
<section class="block-text-with-sidebar-contact">
  <div class="ts-wrap wrap">
    <div class="ts-heading">
      <h2><?php echo $heading;?></h2>
    </div>
    <div class="block-text-with-sidebar-contact">
      <div class="ts-left">
        <div class="ts-text-container"> <?php echo $left_col_text;?> </div>
      </div>
      <div class="ts-right">
        <div class="ts-right-inside"> <?php echo $contact_info;?> </div>
      </div>
    </div>
  </div>
</section>
