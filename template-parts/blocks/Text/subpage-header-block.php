<?php
$rotate_image = get_field( 'plus_image' )[ 'id' ];

?>
<section class="subpage-header">
  <div class="rotate-image-and-slider">
    <?php
    if ( $rotate_image ) {
      ?>
    <div class="rotate-plus-image"> <?php echo output_shape_svg($rotate_image);?> </div>
    <?php
    }
    $image = get_field( 'image' );
    $big_heading = get_field( 'big_heading' );
    $small_heading = get_field( 'small_heading' );;
    $big_text = get_field( 'big_text' );
    $small_text = get_field( 'small_text' );
    $layout = get_field( 'layout' );
    $background_color = get_field( 'background_color' );

    if ( $background_color == 'magenta' ) {
      $bg_class = 'magenta-bg';
    } else if ( $background_color == 'orange' ) {
      $bg_class = 'orange-bg';
    } else if ( $background_color == 'green' ) {
      $bg_class = 'green-bg';
    } else if ( $background_color == 'blue' ) {
      $bg_class = 'blue-bg';
    } else {
      $bg_class = 'gray-bg';
    }
    ?>
    <div class="shape-and-slider">
      <div class="shape-background">
        <?php
        $shape = get_field( 'slider_shape', 'options' );
        $mob_shape = get_field( 'mobile_slider_shape', 'options' );
        ?>
        <img src="<?php echo $shape['url'];?>" alt="<?php echo $shape['alt'];?>" class="desktop-shape"/> <img src="<?php echo $mob_shape['url'];?>" alt="<?php echo $mob_shape['alt'];?>" class="mobile-shape"/> </div>
      <div class="subpage-slide shape-slides <?php echo $bg_class;?>">
        <div class="slider-shape">
          <div class="slide-content">
            <?php
            if ( $image ) {
              ?>
            <div class="slide-image"><img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>"/></div>
            <?php
            }
            ?>
            <?php
            if ( $big_heading ) {
              ?>
            <h1><?php echo $big_heading;?></h1>
            <?php
            }
            if ( $small_heading ) {
              ?>
            <h2><?php echo $small_heading;?></h2>
            <?php
            }
            if ( $big_text ) {
              ?>
            <div class="slide-big-text"><?php echo $big_text;?></div>
            <?php
            }
            if ( $small_text ) {
              ?>
            <div class="slide-normal-text"><?php echo $small_text;?></div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
