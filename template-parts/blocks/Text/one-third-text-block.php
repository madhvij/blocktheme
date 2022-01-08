<?php
$heading = get_field( 'heading' );
$content = get_field( 'content' );
$shape_img = get_field('gray_shape','options');

?>
<section class="one-third-text-icon-block">
  <div class="background-shape <?php echo $background_color;?>">
		<img src="<?php echo $shape_img['url'];?>" alt="<?php echo $shape_img['alt'];?>"/>
	</div>  
  <div class="one-third-text-wrap wrap">
    <div class="one-third-text-icon">
      <div class="left-text-col-bg">
        <div class="left-text-col-content">
          <?php
          if ( $heading ) {
            ?>
          <div class="one-third-left-col-text-heading">
            <h2><?php echo $heading;?></h2>
          </div>
          <?php
          }
          if ( $content ) {
            ?>
          <div class="one-third-left-col-text"> <?php echo $content;?></div>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="right-text-icon-col">
        <?php
        $icon = get_field( 'icon' );
        $text = get_field( 'text' );
        if ( $icon ) {
          ?>
        <div class="one-third-icon"> <img src="<?php echo $icon['url'];?>" alt="<?php echo $icon['alt'];?>"/></div>
        <?php
        }
        if ( $text ) {
          ?>
        <div class="one-third-right-col-text">
          <h2><?php echo $text;?></h2>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</section>
