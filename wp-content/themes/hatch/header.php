<?php
/**
 * Header Template
 *
 * The header template is generally used on every page of your site. Nearly all other templates call it 
 * somewhere near the top of the file. It is used mostly as an opening wrapper, which is closed with the 
 * footer.php file. It also executes key functions needed by the theme, child themes, and plugins. 
 *
 * @package Hatch
 * @subpackage Template
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
<!-- Mobile viewport optimized -->
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="google-site-verification" content="zxQd8fNzl4tO7A5cRrcaulY-4ARmGRZNPkHM9CR2oJE" />
<?php if ( hybrid_get_setting( 'hatch_favicon_url' ) ) { ?>
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo esc_url( hybrid_get_setting( 'hatch_favicon_url' ) ); ?>" />
<?php } ?>

<!-- Title -->
<title>
	<?php if ($_SERVER['REQUEST_URI'] !== '/') : ?>
	<?php hybrid_document_title(); ?> 
	<?php endif;?>
	<?php echo get_bloginfo('name');?>
</title>
<!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="//vk.com/js/api/openapi.js?87"></script>
<script type="text/javascript" src="http://vk.com/js/api/share.js?" charset="windows-1251"></script>
<script type="text/javascript">
  VK.init({apiId: 2191711, onlyWidgets: true});
</script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>


<!-- Stylesheet -->	
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- WP Head -->
<?php wp_head(); ?>
</head>

<body class="<?php hybrid_body_class(); ?>">

	<?php do_atomic( 'open_body' ); // hatch_open_body ?>
	<div id="container">
		<div id="header">
			<?php do_atomic( 'open_header' ); // hatch_open_header ?>
				<div id="branding">
					<?php hatch_site_title(); ?>
					<?php hybrid_site_description(); ?>
				</div><!-- #branding -->
				<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>				
				<?php do_atomic( 'header' ); // hatch_header ?>
			<?php do_atomic( 'close_header' ); // hatch_close_header ?>
		</div><!-- #header -->
	
		<div class="wrap">
			<?php do_atomic( 'before_header' ); // hatch_before_header ?>
			<?php do_atomic( 'after_header' ); // hatch_after_header ?>
			<?php do_atomic( 'before_main' ); // hatch_before_main ?>
			<div id="main">
				<?php do_atomic( 'open_main' ); // hatch_open_main ?>