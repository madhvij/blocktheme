<?php
$position = get_field( 'position' );
if ( $position == 'left' ) {
	$form_block = 'left-side-form';
	$green_shape = get_field( 'green_shape_left_side', 'option' );
	
} else {
  $form_block = 'right-side-form';
$green_shape = get_field( 'green_shape_right_side', 'option' );
}
$background_color = get_field( 'background_color' );
?>
<section class="form-block  <?php echo $form_block;?>">
	<div class="background-shape <?php echo $background_color;?>">
		<img src="<?php echo $green_shape['url'];?>" alt="<?php echo $green_shape['alt'];?>"/>
	</div>
  <div class="wrap">
    <div class="form-inner-block">
      <div class="contact-heading">
        <h2>
          <?php the_field( 'heading' );?>
        </h2>
      </div>
      <div class="contact-content defalut-font-size">
        <?php the_field( 'text' );?>
      </div>
      <div class="form-section">
        <?php
        $form_id = get_field( 'form_id' );
        gravity_form( $form_id, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = true, $tabindex = null, $echo = true );
        ?>
      </div>
    </div>
  </div>
</section>
