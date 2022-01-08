<div class="site-social">
	<?php if( have_rows('social_media','option') ){ ?>
		<ul class="links flex align-center">
			<?php 
				while( have_rows('social_media','option') )
				{
					the_row(); 
					$url = get_sub_field('url','option');
					$fontawesome_icon=get_sub_field('icon','option');
				?>
			<li class="social_link">
				<?php if( $url ){ ?>
				<a href="<?php echo $url; ?>" class="sm_link flex align-center justify-center" target="_blank" ><i class="fab fa-<?php echo $fontawesome_icon;?>"></i></a>
				<?php } ?>
			</li>
				<?php }  ?>
		</ul>
		<?php } ?>
	</div>