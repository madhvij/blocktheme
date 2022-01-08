<?php
$heading = get_field( 'heading' );
$content = get_field( 'content' );
$bg_color = get_field( 'background_color' );
$align = get_field( 'align' );
$shape_img = get_field('gray_shape','options');

?>
<section class="text-shape-background">
  <div class="text-with-shape-block <?php echo $align;?>">
    <div class="background-shape <?php echo $background_color;?>">
		<img src="<?php echo $shape_img['url'];?>" alt="<?php echo $shape_img['alt'];?>"/>
	</div>
    <div class="text-with-shape-wrap wrap">
      <?php
      if ( $heading ) {
        ?>
      <div class="text-heading">
        <h2><?php echo $heading;?></h2>
      </div>
      <?php
      }
      if ( $content ) {
        ?>
      <div class="col-text"> <?php echo $content;?></div>
      <?php
      }
      ?>
    </div>
  </div>
</section>
