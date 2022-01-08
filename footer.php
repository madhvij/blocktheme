</div>
<?php
	$footer_shape = get_field('footer_shape', 'options');
?>
<footer id="footer" role="contentinfo">
	  <div class="footer-column">
		  <div class="footer-shape-image">
		  	<img src="<?php echo $footer_shape['url'];?>" alt="<?php echo $footer_shape['alt'];?>"/>
		  </div>
		  <div class="footer-logo-and-social wrap">
			  <div class="footer-logo">
			  <?php
				  $footer_logo = get_field( 'footer_logo', 'option' )['id'];
				 
				  ?>
				  <div id="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo wp_get_attachment_image($footer_logo,array(97,98)); ?></a></div>
				    <div class="copyright"><?php echo get_field('copyright','option');?></div>
			  </div>
			  <div class="footer-social"><?php get_template_part('pieces/social-media-links');?></div>
		  </div>		
	  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body></html>
