<?php
DEFINE( 'VER', time() );

add_action( 'after_setup_theme', 'blocktheme_setup' );

function blocktheme_setup() {
  load_theme_textdomain( 'blocktheme', get_template_directory() . '/languages' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'responsive-embeds' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'html5', array( 'search-form' ) );
  global $content_width;
  if ( !isset( $content_width ) ) {
    $content_width = 1920;
  }
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu', 'blocktheme' ),
      'footer-menu' => __( 'Footer Menu', 'blocktheme' )
    )
  );

  add_theme_support( 'editor-styles' );
  add_theme_support( 'wp-block-styles' );
  add_theme_support( 'align-wide' );
//  add_editor_style( 'assets/dist/css/editor.css' );
}
add_action( 'enqueue_block_editor_assets', function() {
    wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri() . "/assets/dist/css/editor.css", false, VER, 'all' );
} );
add_action( 'admin_notices', 'blocktheme_admin_notice' );

function blocktheme_admin_notice() {
  $user_id = get_current_user_id();
  if ( !get_user_meta( $user_id, 'blocktheme_notice_dismissed_3' ) && current_user_can( 'manage_options' ) )
    echo '<div class="notice notice-info"><p>' . __( '<big><strong>blocktheme</strong>:</big> Help keep the project alive! <a href="?notice-dismiss" class="alignright">Dismiss</a> <a href="https://calmestghost.com/donate" class="button-primary" target="_blank">Make a Donation</a>', 'blocktheme' ) . '</p></div>';
}
add_action( 'admin_init', 'blocktheme_notice_dismissed' );

function blocktheme_notice_dismissed() {
  $user_id = get_current_user_id();
  if ( isset( $_GET[ 'notice-dismiss' ] ) )
    add_user_meta( $user_id, 'blocktheme_notice_dismissed_3', 'true', true );
}
add_action( 'wp_enqueue_scripts', 'blocktheme_enqueue' );

function blocktheme_enqueue() {
  //wp_enqueue_style( 'blocktheme-style', get_stylesheet_uri(), false, VER );
  wp_enqueue_script( 'jquery' );
}
add_action( 'wp_footer', 'blocktheme_footer' );

function blocktheme_footer() {
  ?>
<script>
jQuery(document).ready(function($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
}
add_filter( 'document_title_separator', 'blocktheme_document_title_separator' );

function blocktheme_document_title_separator( $sep ) {
  $sep = '|';
  return $sep;
}
add_filter( 'the_title', 'blocktheme_title' );

function blocktheme_title( $title ) {
  if ( $title == '' ) {
    return '...';
  } else {
    return $title;
  }
}
//add_filter( 'nav_menu_link_attributes', 'blocktheme_schema_url', 10 );

function blocktheme_schema_url( $atts ) {
  $atts[ 'itemprop' ] = 'url';
  return $atts;
}
if ( !function_exists( 'blocktheme_wp_body_open' ) ) {
  function blocktheme_wp_body_open() {
    do_action( 'wp_body_open' );
  }
}
add_action( 'wp_body_open', 'blocktheme_skip_link', 5 );

function blocktheme_skip_link() {
  echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'blocktheme' ) . '</a>';
}
add_filter( 'the_content_more_link', 'blocktheme_read_more_link' );

function blocktheme_read_more_link() {
  if ( !is_admin() ) {
    return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'blocktheme' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
  }
}
add_filter( 'excerpt_more', 'blocktheme_excerpt_read_more_link' );

function blocktheme_excerpt_read_more_link( $more ) {
  if ( !is_admin() ) {
    global $post;
    return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'blocktheme' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
  }
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'blocktheme_image_insert_override' );

function blocktheme_image_insert_override( $sizes ) {
  unset( $sizes[ 'medium_large' ] );
  unset( $sizes[ '1536x1536' ] );
  unset( $sizes[ '2048x2048' ] );
  return $sizes;
}

add_action( 'widgets_init', 'blocktheme_widgets_init' );

function blocktheme_widgets_init() {
  register_sidebar( array(
    'name' => esc_html__( 'Sidebar Widget Area', 'blocktheme' ),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}
add_action( 'wp_head', 'blocktheme_pingback_header' );

function blocktheme_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
}
add_action( 'comment_form_before', 'blocktheme_enqueue_comment_reply_script' );

function blocktheme_enqueue_comment_reply_script() {
  if ( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}

function blocktheme_custom_pings( $comment ) {
  ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blocktheme_comment_count', 0 );

function blocktheme_comment_count( $count ) {
  if ( !is_admin() ) {
    global $id;
    $get_comments = get_comments( 'status=approve&post_id=' . $id );
    $comments_by_type = separate_comments( $get_comments );
    return count( $comments_by_type[ 'comment' ] );
  } else {
    return $count;
  }
}

/*
add_filter( 'wp_check_filetype_and_ext', function ( $data, $file, $filename, $mimes ) {
  global $wp_version;
  if ( $wp_version !== '5.8.1' ) {
    return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
    'ext' => $filetype[ 'ext' ],
    'type' => $filetype[ 'type' ],
    'proper_filename' => $data[ 'proper_filename' ]
  ];
}, 10, 4 );

function upload_svg_files( $allowed ) {
  if ( !current_user_can( 'manage_options' ) ) {
    return $allowed;
  }
  $allowed[ 'svg' ] = 'image/svg+xml';
  return $allowed;
}
add_filter( 'upload_mimes', 'upload_svg_files' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );
*/

add_image_size('sign-banner-slide',1272,395,true);
function output_shape_svg( $shape_image_id ) {
  $shape_image_path = get_attached_file( $shape_image_id );
  echo file_get_contents( $shape_image_path );
}


add_action( 'acf/init', 'my_acf_init_block_types' );
function my_acf_init_block_types() {
  if ( function_exists( 'acf_register_block_type' ) ) { 
    acf_register_block_type( array(
      'name' => 'form-block',
      'title' => __( 'Form' ),
      'description' => __( 'A custom Form Block.' ),
      'render_template' => 'template-parts/blocks/Form/form-block.php',
      'category' => 'formatting',
      'icon' => 'admin-image',
      'align' => 'full',
      'support' => array( 'full', 'wide' )
    ) );
	  acf_register_block_type( array(
      'name' => 'icon-and-text-block',
      'title' => __( 'Icon and Text Block' ),
      'description' => __( 'A custom Icon and Text Block.' ),
      'render_template' => 'template-parts/blocks/Text/icon-and-text-block.php',
      'category' => 'formatting',
      'icon' => 'admin-image',
      'align' => 'full',
      'support' => array( 'full', 'wide' )
    ) );
	  	acf_register_block_type( array(
      'name' => 'one-third-width-text-block',
      'title' => __( 'One Third Width Text Block' ),
      'description' => __( 'A custom One Third Text Block.' ),
      'render_template' => 'template-parts/blocks/Text/one-third-text-block.php',
      'category' => 'formatting',
      'icon' => 'admin-image',
      'align' => 'full',
      'support' => array( 'full', 'wide' )
    ) );
	acf_register_block_type( array(
      'name' => 'chart-block',
      'title' => __( 'Chart Text Block' ),
      'description' => __( 'A custom One Chart Text Block.' ),
      'render_template' => 'template-parts/blocks/Text/chart-block.php',
      'category' => 'formatting',
      'icon' => 'admin-image',
      'align' => 'full',
      'support' => array( 'full', 'wide' )
    ) );
	  
	  acf_register_block_type( array(
      'name' => 'text-with-shape-block',
      'title' => __( 'Text with Shape Block' ),
      'description' => __( 'A custom Text with Shape Block.' ),
      'render_template' => 'template-parts/blocks/Text/text-with-shape-block.php',
      'category' => 'formatting',
      'icon' => 'admin-image',
      'align' => 'full',
      'support' => array( 'full', 'wide' )
    ) );
	acf_register_block_type( array(
      'name' => 'text-with-sidebar-contact-block',
      'title' => __( 'Text with Sidebar Contact Block' ),
      'description' => __( 'A custom Text with Sidebar Contact Block.' ),
      'render_template' => 'template-parts/blocks/Text/text-with-sidebar-contact-block.php',
      'category' => 'formatting',
      'icon' => 'admin-image',
      'align' => 'full',
      'support' => array( 'full', 'wide' )
    ) );
	acf_register_block_type( array(
      'name' => 'full-width-text-block',
      'title' => __( 'Full Width Text Block' ),
      'description' => __( 'A custom Full Width Text Block.' ),
      'render_template' => 'template-parts/blocks/Text/full-width-text-block.php',
      'category' => 'formatting',
      'icon' => 'admin-image',
      'align' => 'full',
      'support' => array( 'full', 'wide' )
    ) );
	  acf_register_block_type( array(
      'name' => 'number-and-text-block',
      'title' => __( 'Number and Text Block' ),
      'description' => __( 'A custom Number and Text Block.' ),
      'render_template' => 'template-parts/blocks/Text/number-and-text-block.php',
      'category' => 'formatting',
      'icon' => 'admin-image',
      'align' => 'full',
      'support' => array( 'full', 'wide' )
    ) );
	  acf_register_block_type( array(
      'name' => 'subpage-header-block',
      'title' => __( 'Subpage Header Block' ),
      'description' => __( 'A custom Subpage Header.' ),
      'render_template' => 'template-parts/blocks/Text/subpage-header-block.php',
      'category' => 'formatting',
      'icon' => 'admin-image',
      'align' => 'full',
      'support' => array( 'full', 'wide' )
    ) );
  }

}


add_filter( 'body_class','color_body_class' );
function color_body_class( $classes ) {

		$page_color = get_field('page_color');
		if($page_color == "digital") {
			$classes[] = 'digital-page';
		}
		if ( $page_color == 'fundraising' ) {
		  $classes[] = 'fundraising-page';
		} 
		if($page_color == 'marketing' ) {
		  $classes[]  = 'marketing-page';
		}
		if($page_color == 'outdoor' ) {
		  $classes[]  = 'outdoor-page';
		}
    
    return $classes;
    
}

// Dynamic CSS
add_action( 'wp_head', 'dynamic_css' );

function dynamic_css() {
	$shape = get_field('shape', 'option')['url'];
	?>
<style>
	.shape {
		background-image: url(<?php echo $shape;?>);
		background-clip: padding-box;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>
<?php
}

// ACF
if ( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page( array(
    'page_title' => 'Theme Options',
    'menu_title' => 'Theme Options',
    'menu_slug' => 'theme-options',
    'capability' => 'edit_posts',
    'redirect' => false
  ) );

  acf_add_options_sub_page( array(
    'page_title' => 'Theme Header Settings',
    'menu_title' => 'Header',
    'parent_slug' => 'theme-options',
  ) );

  acf_add_options_sub_page( array(
    'page_title' => 'Theme Footer Settings',
    'menu_title' => 'Footer',
    'parent_slug' => 'theme-options',
  ) );
}


add_action( 'wp_enqueue_scripts', 'blocktheme_load_scripts' );

function blocktheme_load_scripts() {
  wp_deregister_script( 'jquery' );
  wp_enqueue_script( 'jquery' );

  wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'sitewide', get_stylesheet_directory_uri() . '/assets/js/sitewide.js', array( 'jquery' ), VER );
  wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/assets/library-css/fontawesome/all.css' );
  wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/assets/library-css/slick.css' );
  wp_enqueue_style( 'style', get_stylesheet_uri(), NULL, VER );
  wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/assets/dist/css/main.css', NULL, VER );
}

// CPTs
add_action( 'init', 'create_post_types' );
function create_post_types() {
}


add_shortcode('blocktheme_retina_img', 'blocktheme_retina_img'); 

function blocktheme_retina_img($img, $id = null) {
	$url = $img['url'];
	
	if (strpos($url, '@2x') !== false) {
		$width = $img['width'] / 2;
	}
	else {
		$width = $img['width'];
	}
	
	if (! is_null($id)) {
		$id = ' id="' . $id . '"';
	}
	else {
		$id = '';
	}
		
	$alt = $img['alt'];
	
	?><img <?php echo $id; ?>class="retina-img" src="<?php echo $url; ?>" alt='<?php echo $alt; ?>' style="width: <?php echo $width; ?>px;" /><?php
}

add_filter( 'gform_field_content', 'zp_fieldset_to_div', 10, 5 );
function zp_fieldset_to_div( $field_content, $field, $value, $entry_id, $form_id ) {
  if ( strpos( $field->cssClass, 'fieldset-to-div' ) !== false ) {
    $field_content = '<div class="fieldset-div">' . $field_content . "</div>";
  }
  
  return $field_content;
}

