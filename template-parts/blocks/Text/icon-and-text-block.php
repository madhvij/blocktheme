<?php
$icon = get_field( 'image' );
$heading = get_field( 'heading' );
$content = get_field( 'content' );
?>
<section class="icon-and-text-section">
  <div class="wrap">
    <div class="flex-icon-and-text">
      <div class="icon-col"> <img src="<?php echo $icon['url'];?>" alt="<?php echo $icon['alt'];?>"/> </div>
      <div class="text-col">
        <div class="text-col-heading">
          <h2><?php echo $heading;?></h2>
        </div>
        <div class="text-col-content"><?php echo $content;?></div>
      </div>
    </div>
  </div>
</section>
