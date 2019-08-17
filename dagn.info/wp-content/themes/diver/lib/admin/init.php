<?php
// ログイン画面
if (!function_exists('custom_login_logo')){
function custom_login_logo() { ?>
  <style>
    .login #login h1 a {
      background: url(<?php echo get_template_directory_uri(); ?>/images/logo.png) no-repeat;
      width: auto;
      background-position: center;
      background-size: contain;
    }
  </style>
<?php }
}
add_action( 'login_enqueue_scripts', 'custom_login_logo' );

if (!function_exists('custom_login_logo_url')){
  function custom_login_logo_url() {
    return 'https://tan-taka.com/diver';
  }
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );


// 投稿画面の項目を非表示にする
function remove_default_post_screen_metaboxes() {
 if (!current_user_can('level_10')) { // level10以下のユーザーの場合メニューをremoveする
 remove_meta_box( 'postcustom','post','normal' ); // カスタムフィールド
 remove_meta_box( 'postexcerpt','post','normal' ); // 抜粋
 // remove_meta_box( 'commentstatusdiv','post','normal' ); // ディスカッション
 remove_meta_box( 'commentsdiv','post','normal' ); // コメント
 remove_meta_box( 'trackbacksdiv','post','normal' ); // トラックバック
 remove_meta_box( 'authordiv','post','normal' ); // 作成者
 //remove_meta_box( 'slugdiv','post','normal' ); // スラッグ
 remove_meta_box( 'revisionsdiv','post','normal' ); // リビジョン
 }
 }
add_action('admin_menu','remove_default_post_screen_metaboxes');

add_filter('https_ssl_verify', '__return_false');
add_filter('https_local_ssl_verify', '__return_false');

//update
require get_template_directory().'/lib/assets/theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker('diver','https://tan-taka.com/wp_diver/theme-update/update-info.json');

function custom_admin_footer() {
    echo apply_filters('orig_admin_footer','<a href="https://tan-taka.com/diver/contact/">DIVER お問い合わせ</a>');
}
add_filter('admin_footer_text', 'custom_admin_footer');


add_filter('got_rewrite','__return_true');

?>