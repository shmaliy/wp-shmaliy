<?php
/**
 * @package Hatch
 * @subpackage Functions
 * @version 0.2.6
 * @author Galin Simeonov
 * @link http://alienwp.com
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

/* Load the core theme framework. */
require_once( trailingslashit( TEMPLATEPATH ) . 'library/hybrid.php' );
$theme = new Hybrid();

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'hatch_theme_setup' );

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme
 * actions and filters.
 *
 */
function hatch_theme_setup() {

	/* Get action/filter hook prefix. */
	$prefix = hybrid_get_prefix();

	/* Add theme support for core framework features. */
	add_theme_support( 'hybrid-core-menus', array( 'primary' ) );
	add_theme_support( 'hybrid-core-sidebars', array( 'primary', 'subsidiary', 'after-singular' ) );
	add_theme_support( 'hybrid-core-widgets' );
	add_theme_support( 'hybrid-core-theme-settings', array( 'about', 'footer' ) );
	add_theme_support( 'hybrid-core-meta-box-footer' );
	add_theme_support( 'hybrid-core-shortcodes' );
	add_theme_support( 'hybrid-core-drop-downs' );
	add_theme_support( 'hybrid-core-template-hierarchy' );

	/* Add theme support for framework extensions. */
	add_theme_support( 'loop-pagination' );
	add_theme_support( 'get-the-image' );
	add_theme_support( 'cleaner-gallery' );

	/* Add theme support for WordPress features. */
	add_theme_support( 'automatic-feed-links' );

	/* Embed width/height defaults. */
	add_filter( 'embed_defaults', 'hatch_embed_defaults' );

	/* Filter the sidebar widgets. */
	add_filter( 'sidebars_widgets', 'hatch_disable_sidebars' );
        
	/* Image sizes */
	add_action( 'init', 'hatch_image_sizes' );

	/* Excerpt ending */
	add_filter( 'excerpt_more', 'hatch_excerpt_more' );
 
	/* Custom excerpt length */
	add_filter( 'excerpt_length', 'hatch_excerpt_length' );    
        
	/* Filter the pagination trail arguments. */
	add_filter( 'loop_pagination_args', 'hatch_pagination_args' );
	
	/* Filter the comments arguments */
	add_filter( "{$prefix}_list_comments_args", 'hatch_comments_args' );	
	
	/* Filter the commentform arguments */
	add_filter( 'comment_form_defaults', 'hatch_commentform_args', 11, 1 );
	
	/* Enqueue scripts (and related stylesheets) */
	add_action( 'wp_enqueue_scripts', 'hatch_scripts' );
	
	/* Enqueue Google fonts */
	add_action( 'wp_enqueue_scripts', 'hatch_google_fonts' );
	
	/* Style settings */
	add_action( 'wp_head', 'hatch_style_settings' );	
	
	/* Add support for custom backgrounds */
	add_theme_support( 'custom-background' );
	
	/* Add theme settings */
	if ( is_admin() )
	    require_once( trailingslashit( TEMPLATEPATH ) . 'admin/functions-admin.php' );
	    
	/* Default footer settings */
	add_filter( "{$prefix}_default_theme_settings", 'hatch_default_footer_settings' );
	
	/* Add support for custom headers. */
	$args = array(
		'width'         => 640,
		'height'        => 360,
		'header-text'   => false,
		'default-image' => trailingslashit( get_stylesheet_directory_uri() ).'images/header_default.png',
		'uploads'       => true,
	);
	add_theme_support( 'custom-header', $args );
	
}

/**
 * Disables sidebars if viewing a one-column page.
 *
 */
function hatch_disable_sidebars( $sidebars_widgets ) {
	
	if ( !is_admin() ) {
		
		if ( !is_page() || is_page_template( 'page-template-fullwidth.php' ) ) {
			$sidebars_widgets['primary'] = false;
		}
	
	}

	return $sidebars_widgets;
}

/**
 * Overwrites the default widths for embeds.  This is especially useful for making sure videos properly
 * expand the full width on video pages.  This function overwrites what the $content_width variable handles
 * with context-based widths.
 *
 */
function hatch_embed_defaults( $args ) {
	
	$args['width'] = 940;
	
	if ( is_page() && !is_page_template( 'page-template-fullwidth.php' ) )
		$args['width'] = 640;
		
	return $args;
}

/**
 * Excerpt ending 
 *
 */
function hatch_excerpt_more( $more ) {	
	return '...';
}

/**
 *  Custom excerpt lengths 
 *
 */
function hatch_excerpt_length( $length ) {
	return 15;
}

/**
 * Enqueue scripts (and related stylesheets)
 *
 */
function hatch_scripts() {
	
	if ( !is_admin() ) {
		
		/* Enqueue Scripts */
		
		wp_register_script( 'hatch_fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.pack.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'hatch_fancybox' );
		
		wp_register_script( 'hatch_fitvids', get_template_directory_uri() . '/js/fitvids/jquery.fitvids.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'hatch_fitvids' );
		
		wp_register_script( 'hatch_footer-scripts', get_template_directory_uri() . '/js/footer-scripts.js', array( 'jquery', 'hatch_fitvids', 'hatch_fancybox' ), '1.0', true );
		wp_enqueue_script( 'hatch_footer-scripts' );	

		/* Enqueue Styles */
		wp_enqueue_style( 'hatch_fancybox-stylesheet', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.css', false, 1.0, 'screen' );		
	}
}

/**
 * Pagination args 
 *
 */
function hatch_pagination_args( $args ) {
	
	$args['prev_text'] = __( '&larr; Previous', 'hatch' );
	$args['next_text'] = __( 'Next &rarr;', 'hatch' );

	return $args;
}

/**
 *  Image sizes
 *
 */
function hatch_image_sizes() {
	
	add_image_size( 'archive-thumbnail', 220, 150, true );
	add_image_size( 'single-thumbnail', 640, 360, true );
}

/**
 *  Unregister Hybrid widgets
 *
 */
function hatch_unregister_widgets() {
	
	unregister_widget( 'Hybrid_Widget_Search' );
	register_widget( 'WP_Widget_Search' );	
}

/**
 * Custom comments arguments
 * 
 */
function hatch_comments_args( $args ) {
	
	$args['avatar_size'] = 50;
	return $args;
}

/**
 *  Custom comment form arguments
 * 
 */
function hatch_commentform_args( $args ) {
	
	global $user_identity;

	/* Get the current commenter. */
	$commenter = wp_get_current_commenter();

	/* Create the required <span> and <input> element class. */
	$req = ( ( get_option( 'require_name_email' ) ) ? ' <span class="required">' . __( '*', 'hatch' ) . '</span> ' : '' );
	$input_class = ( ( get_option( 'require_name_email' ) ) ? ' req' : '' );
	
	
	$fields = array(
		'author' => '<p class="form-author' . $input_class . '"><input type="text" class="text-input" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="40" /><label for="author">' . __( 'Name', 'hatch' ) . $req . '</label></p>',
		'email' => '<p class="form-email' . $input_class . '"><input type="text" class="text-input" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="40" /><label for="email">' . __( 'Email', 'hatch' ) . $req . '</label></p>',
		'url' => '<p class="form-url"><input type="text" class="text-input" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="40" /><label for="url">' . __( 'Website', 'hatch' ) . '</label></p>'
	);
	
	$args = array(
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field' => '<p class="form-textarea req"><!--<label for="comment">' . __( 'Comment', 'hatch' ) . '</label>--><textarea name="comment" id="comment" cols="60" rows="10"></textarea></p>',
		'must_log_in' => '<p class="alert">' . sprintf( __( 'You must be <a href="%1$s" title="Log in">logged in</a> to post a comment.', 'hatch' ), wp_login_url( get_permalink() ) ) . '</p><!-- .alert -->',
		'logged_in_as' => '<p class="log-in-out">' . sprintf( __( 'Logged in as <a href="%1$s" title="%2$s">%2$s</a>.', 'hatch' ), admin_url( 'profile.php' ), esc_attr( $user_identity ) ) . ' <a href="' . wp_logout_url( get_permalink() ) . '" title="' . esc_attr__( 'Log out of this account', 'hatch' ) . '">' . __( 'Log out &rarr;', 'hatch' ) . '</a></p><!-- .log-in-out -->',
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'id_form' => 'commentform',
		'id_submit' => 'submit',
		'title_reply' => __( 'Leave a Reply', 'hatch' ),
		'title_reply_to' => __( 'Leave a Reply to %s', 'hatch' ),
		'cancel_reply_link' => __( 'Click here to cancel reply.', 'hatch' ),
		'label_submit' => __( 'Post Comment &rarr;', 'hatch' ),
	);
	
	return $args;
}

/**
 * Default footer settings
 *
 */
function hatch_default_footer_settings( $settings ) {
    
    $settings['footer_insert'] = '<p class="copyright">' . __( 'Copyright &#169; [the-year] [site-link]', 'hatch' ) . '</p>' . "\n\n" . '<p class="credit">' . __( 'Powered by [wp-link] and [theme-link]', 'hatch' ) . '</p>';
    
    return $settings;
}


/**
 * Styles the header image and text displayed on the blog
 *
 */
function hatch_header_style() {
	/* We don't need to set anything here - everything is in style.css */
}

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 */
function hatch_admin_header_style() { ?>

	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#admin-header-image img {
		height: auto;
		max-width: 100%;
	}
	</style>
	
<?php }

/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 */
function hatch_admin_header_image() { ?>

	<div id="admin-header-image" role="banner">
		<?php $header_image = get_header_image();
		if ( !empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
	
<?php }

/**
 * Google fonts
 *
 */
function hatch_google_fonts() {
	
	if ( hybrid_get_setting( 'hatch_font_family' ) ) {
		
		switch ( hybrid_get_setting( 'hatch_font_family' ) ) {
			case 'Droid Serif':
				wp_enqueue_style( 'font-droid-serif', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic', false, 1.0, 'screen' );
				break;			
			case 'Istok Web':
				wp_enqueue_style( 'font-istok-web', 'http://fonts.googleapis.com/css?family=Istok+Web', false, 1.0, 'screen' );
				break;
			case 'Droid Sans':
				wp_enqueue_style( 'font-droid-sans', 'http://fonts.googleapis.com/css?family=Droid+Sans', false, 1.0, 'screen' );
				break;				
			case 'Bitter':
				wp_enqueue_style( 'font-bitter', 'http://fonts.googleapis.com/css?family=Bitter', false, 1.0, 'screen' );
				break;
		}
	}	
}

/**
 * Style settings
 *
 */
function hatch_style_settings() {
	
	echo "\n<!-- Style settings -->\n";
	echo "<style type=\"text/css\" media=\"all\">\n";
	
	if ( hybrid_get_setting( 'hatch_font_size' ) )
		echo 'html { font-size: ' . hybrid_get_setting( 'hatch_font_size' ) . "px; }\n";
	
	if ( hybrid_get_setting( 'hatch_font_family' ) )
		echo 'body { font-family: ' . hybrid_get_setting( 'hatch_font_family' ) . ", serif; }\n";
	
	if ( hybrid_get_setting( 'hatch_link_color' ) ) {
		echo 'a, a:visited, #footer a:hover, .entry-title a:hover { color: ' . hybrid_get_setting( 'hatch_link_color' ) . "; }\n";
		echo "a:hover, a:focus { color: #ccc; }\n";
	}	
	if ( hybrid_get_setting( 'hatch_custom_css' ) )
		echo hybrid_get_setting( 'hatch_custom_css' ) . "\n";
	
	echo "</style>\n";
}

/**
 * Hatch site title.
 * 
 */
function hatch_site_title() {
	
	if ( hybrid_get_setting( 'hatch_logo_url' ) ) {	
	
		$tag = ( is_front_page() ) ? 'h1' : 'div';	
			
		echo '<' . $tag . ' id="site-title">' . "\n";
			echo '<a href="' . get_home_url() . '" title="' . get_bloginfo( 'name' ) . '" rel="Home">' . "\n";
				echo '<img class="logo" src="' . esc_url( hybrid_get_setting( 'hatch_logo_url' ) ) . '" alt="' . get_bloginfo( 'name' ) . '" />' . "\n";
			echo '</a>' . "\n";
		echo '</' . $tag . '>' . "\n";
	
	} else {
	
		hybrid_site_title();
	
	}
}

?>