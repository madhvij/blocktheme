<?php get_header(); ?>
<main id="content" role="main">
	<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
				get_template_part( 'post-header' );
				get_template_part( 'entry' );
			}
		}
	?>
</main>
<?php get_footer(); ?>