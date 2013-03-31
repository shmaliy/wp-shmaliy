<?php

if ( ! isset( $content_width ) ) $content_width = 700;

function photographic_sidebar() {
  register_sidebar(array(
    'name' => 'right_sidebar',
    'id' => 'right_sidebar',
  	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  	'after_widget' => '</aside>',
  	'before_title' => '<h3 class="widgettitle">',
  	'after_title' => '</h3>',
  ));
}

// hack to add a class to the body tag ifw
function photographic_has_sidebar($classes) {
	// add 'class-name' to the $classes array
	$classes[] = 'has_sidebar';
	// return the $classes array
	return $classes;
}

if (is_active_sidebar('right_sidebar')) {
  add_filter('body_class','photographic_has_sidebar');
}

//**** make password form have a class for styling
function photographic_custom_password_form($form) {
  $subs = array(
    '#<form(.*?)>#' => '<form$1 class="password-form">',
  );
  echo preg_replace(array_keys($subs), array_values($subs), $form);
}

//**** thumbnails, galleries and strange people from foreign lands
function photographic_remove_br_gallery($output) {
	return preg_replace('/(<br[^>]*>\s*){1,}/', '', $output);
}

add_theme_support('automatic-feed-links');
add_theme_support( 'custom-background');
add_action('widgets_init', 'photographic_sidebar');
add_theme_support('post-formats', array( 'image', 'gallery' ));
add_filter('the_password_form', 'photographic_custom_password_form');
add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));
add_filter('the_content', 'photographic_remove_br_gallery', 11);
add_filter('use_default_gallery_style', '__return_false');
add_theme_support('post-thumbnails');
set_post_thumbnail_size(200, 200, true ); // 50 pixels wide by 50 pixels tall, crop mode
add_image_size('large-square', 660, 660, true);
add_image_size('large', 660, 660, false);
add_image_size('medium-square', 200, 200, true);
add_image_size('medium', 200, 200, false);
add_image_size('small-square', 140, 140, true);
add_image_size('small', 120, 120, true);

?>