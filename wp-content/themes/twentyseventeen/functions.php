<?php
function twpp_enqueue_scripts() {
  wp_enqueue_script(
    'custom-script',
    get_template_directory_uri() . '/assets/js/custom.js'
  );

	wp_enqueue_script(
    'inview-script',
    get_template_directory_uri() . '/assets/js/inview.js'
  );

	wp_enqueue_script(
    'slick-script',
    get_template_directory_uri() . '/assets/js/slick.js'
  );
	
	wp_enqueue_script(
    'bg-switcher-script',
    get_template_directory_uri() . '/assets/js/bg_switcher.js'
  );
}

add_action( 'wp_enqueue_scripts', 'twpp_enqueue_scripts' );
