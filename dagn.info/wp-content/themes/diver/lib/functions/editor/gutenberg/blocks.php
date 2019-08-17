<?php
add_action( 'enqueue_block_editor_assets','custom_enqueue_block_editor_assets' );

function custom_enqueue_block_editor_assets() {
  wp_enqueue_script('block-button',get_template_directory_uri().'/lib/functions/editor/gutenberg/button/block.js',array('wp-blocks', 'wp-element', 'wp-components', 'wp-editor','wp-rich-text','wp-format-library','wp-i18n','wp-compose'));
  wp_enqueue_script('block-frame',get_template_directory_uri().'/lib/functions/editor/gutenberg/frame/block.js',array('wp-blocks', 'wp-element', 'wp-components', 'wp-editor','wp-rich-text','wp-format-library','wp-i18n','wp-compose'));
  wp_enqueue_script('block-headline',get_template_directory_uri().'/lib/functions/editor/gutenberg/headline/block.js',array('wp-blocks', 'wp-element', 'wp-components', 'wp-editor','wp-rich-text','wp-format-library','wp-i18n','wp-compose'));
  wp_enqueue_script('block-voice',get_template_directory_uri().'/lib/functions/editor/gutenberg/voice/block.js',array('wp-blocks', 'wp-element', 'wp-components', 'wp-editor','wp-rich-text','wp-format-library','wp-i18n','wp-compose'));
  // wp_enqueue_script('block-balloon',get_template_directory_uri().'/lib/functions/editor/gutenberg/balloon/block.js',array('wp-blocks', 'wp-element', 'wp-components', 'wp-editor','wp-rich-text','wp-format-library','wp-i18n','wp-compose'));
  // wp_enqueue_script('block-designlist',get_template_directory_uri().'/lib/functions/editor/gutenberg/designlist/block.js',[ 'wp-blocks', 'wp-element' ]);
  wp_enqueue_script('block-icon',get_template_directory_uri().'/lib/functions/editor/gutenberg/icon/block.js',array( 'wp-blocks', 'wp-element' ));
  wp_enqueue_script('block-iconbox',get_template_directory_uri().'/lib/functions/editor/gutenberg/iconbox/block.js',array( 'wp-blocks', 'wp-element' ));
  wp_enqueue_script('block-section',get_template_directory_uri().'/lib/functions/editor/gutenberg/section/block.js',array( 'wp-blocks', 'wp-element' ));
  wp_enqueue_script('block-toggle',get_template_directory_uri().'/lib/functions/editor/gutenberg/toggle/block.js',array( 'wp-blocks', 'wp-element' ));
  wp_enqueue_style( 'my-editor-style', get_template_directory_uri().'/editor-style.css');

  $voice_icon[] = '';

    $count = 0;
    while ($count < get_option('voice_icon_count')){
        $voice_icon[] =  get_option('icon'.$count.'-uploader_img');
        $count++;
    } 
  wp_localize_script( 'block-voice', 'my_script_vars', array(
    'icon'  => $voice_icon,
    )
  );

};

add_filter( 'block_categories','_block_categories');
function _block_categories( $categories ) {
    $categories[] = array(
        'slug'  => 'auxiliary',
        'title' => '入力補助',
    );

    return $categories;
}

function mytheme_setup_theme_supported_features() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => 'light blue',
            'slug' => 'light-blue',
            'color' => '#70b8f1',
        ),
        array(
            'name' => 'light red',
            'slug' => 'light-red',
            'color' => '#ff8178',
        ),   
        array(
            'name' => 'light green',
            'slug' => 'light-green',
            'color' => '#2ac113',
        ),
        array(
            'name' => 'light yellow',
            'slug' => 'light-yellow',
            'color' => '#ffe822',
        ),
        array(
            'name' => 'light orange',
            'slug' => 'light-orange',
            'color' => '#ffa30d',
        ),
        array(
            'name' => 'blue',
            'slug' => 'blue',
            'color' => '#00f',
        ),
        array(
            'name' => 'red',
            'slug' => 'red',
            'color' => '#f00',
        ),   
        array(
            'name' => 'purple',
            'slug' => 'purple',
            'color' => '#674970',
        ),
        array(
            'name' => 'gray',
            'slug' => 'gray',
            'color' => '#ccc',
        ),
        array(
            'name' => 'black',
            'slug' => 'black',
            'color' => '#000',
        ),
        array(
            'name' => 'white',
            'slug' => 'white',
            'color' => '#fff',
        ),
    ) );

}

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );

add_theme_support( 'align-wide' );
add_theme_support( 'responsive-embeds' );
