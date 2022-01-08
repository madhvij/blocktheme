<?php
$number = get_field( 'number' );
$text = get_field( 'text' );
?>
<section class="block-featured-number">
  <div class="featured-number-wrap wrap">
    <div class="fn-left">
      <div class="fn-number-container">
        <h2 class="biggest-number-size"><span class="fn-number rolling" data-to="<?php echo $number; ?>"> <?php echo number_format($number); ?> </span></h2>
      </div>
    </div>
    <div class="fn-right">
      <div class="fn-right-inside"> <?php echo $text;?> </div>
    </div>
  </div>
</section>
