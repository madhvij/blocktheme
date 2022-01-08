<?php
$header_img = '';
$subheading = get_field( 'subheading' );

if ( has_post_thumbnail() ) {
	$header_img_url = get_the_post_thumbnail_url( NULL, 'full' );
	$header_img = ' style="background-image: url( \'' . $header_img_url . '\' );"';
}
?>
<header class="post-header">
	<div class="post-header-titles">
		<h1 class="h2 post-header-title"><?php the_title(); ?></h1>
		<?php
			if ( $subheading ) {
				?><h2 class="ptag post-header-subtitle"><?php echo $subheading; ?></h2><?php
			}
		?>
	</div>
	<div class="post-header-image"<?php echo $header_img; ?>></div>
</header>