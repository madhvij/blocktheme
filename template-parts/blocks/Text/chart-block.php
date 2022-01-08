<section id="our-services-pie-chart">
  <?php
  $our_service_heading = get_field( 'our_full_menu_heading', 'options' );
  $our_service_pie_chart = get_field( 'pie_chart_image', 'options' );
  $mob_image = get_field( 'mob_pie_chart_image', 'options' );

  $mob_dig_heading = get_field( 'digital_marketing_heading', 'options' );
  $dig_text = get_field( 'digital_marketing_text', 'options' );

  $mob_graphic_heading = get_field( 'graphic_design_heading', 'options' );
  $graphic_text = get_field( 'graphic_design_text', 'options' );

  $mob_social_media_heading = get_field( 'social_media_heading', 'options' );
  $social_media_text = get_field( 'social_media_text', 'options' );

  $mob_search_engine_heading = get_field( 'search_engine_optimization_heading', 'options' );
  $search_engine_text = get_field( 'search_engine_optimization_text', 'options' );

  $mob_website_heading = get_field( 'website_design_&_enhancement_heading', 'options' );
  $website_design_text = get_field( 'website_design_&_enhancement_text' , 'options');
  ?>
  <div class="wrap heading-full-services-wrap">
    <h2 class="h3 heading-full-services">
      <?php the_field('our_full_menu_heading', 'options');?>
    </h2>
  </div>
  <div class="offer-our-services wrap">
    <div class="offer-our-services-image">
      <div class="desktop-image">
        <?php zaplus_retina_img( $our_service_pie_chart );?>
      </div>
      <div class="mobile-image"><img src="<?php echo $mob_image['url'];?>"/></div>
      <div class="offer-heading digital-marketin-heading">
        <h4><?php echo $mob_dig_heading;?></h4>
      </div>
      <div class="offer-heading graphic-design-heading">
        <h4><?php echo $mob_graphic_heading;?></h4>
      </div>
      <div class="offer-heading social-media-heading">
        <h4><?php echo $mob_social_media_heading;?></h4>
      </div>
      <div class="offer-heading search-engine-heading">
        <h4><?php echo $mob_search_engine_heading;?></h4>
      </div>
      <div class="offer-heading website-desgin-heading">
        <h4><?php echo $mob_website_heading;?></h4>
      </div>
    </div>
    <div class="our-digital-services-contents">
      <div class="offer-digital-marketing">
        <div class="mob-offer-heading mob-digital-marketin-heading">
			<h4><?php echo $mob_dig_heading;?></h4>
        </div>
        <div class="offer-content digital-marketing-content"><?php echo $dig_text;?></div>
      </div>
      <div class="offer-graphic-design">
        <div class="mob-offer-heading mob-graphic-design-heading">
          <h4><?php echo $mob_graphic_heading;?></h4>
        </div>
        <div class="offer-content graphic-design-content"><?php echo $graphic_text;?></div>
      </div>
      <div class="offer-social-media">
        <div class="mob-offer-heading mob-social-media-heading">
          <h4><?php echo $mob_social_media_heading;?></h4>
        </div>
        <div class="offer-content social-media-content"><?php echo $social_media_text;?></div>
      </div>
      <div class="offer-search-engine">
        <div class="mob-offer-heading mob-search-engine-heading">
          <h4><?php echo $mob_search_engine_heading;?></h4>
        </div>
        <div class="offer-content search-engine-content"><?php echo $search_engine_text;?></div>
      </div>
      <div class="offer-website-design">
        <div class="mob-offer-heading mob-website-desgin-heading">
          <h4><?php echo $mob_website_heading;?></h4>
        </div>
        <div class="offer-content website-design-content"><?php echo $website_design_text;?></div>
      </div>
    </div>
  </div>
</section>