<?php
function diver_minifier_main_css(){
  //オリジナルのcss(絶対パス)
  $origin_file      = get_template_directory() . '/style.css';
  //minify後のcss(絶対パス)
  $minify_file      = get_template_directory() . '/style.min.css';
  //オリジナルのcssファイル(URI)
  $origin_file_uri  = get_template_directory_uri() . '/style.css';
  //minify後のcssファイル(URI)
  $minify_file_uri  = get_template_directory_uri() . '/style.min.css';
  //cssの中身を入れる変数
  $css              = '';
  //オリジナルファイルの日付を入れる変数
  $origin_file_date = '';
  //minifyファイルの日付を入れる変数
  $minify_file_date = '';
  //minifyしたファイルの中身を上書きするかどうかの判断に用いる
  $flag = false;

  if( WP_Filesystem() ){
    //$wp_filesystemオブジェクトの呼び出し
    global $wp_filesystem;

    //minify用のファイルがなければ生成
    if ( !file_exists($minify_file) ){
      $wp_filesystem->touch($minify_file);
      $flag = true;
    }

    //オリジナルファイルの日付を取得
    $origin_file_date = filemtime($origin_file);
    //minifyファイルの日付を取得
    $minify_file_date = filemtime($minify_file);

    if( $minify_file_date < $origin_file_date){
      //オリジナルの方がminifyよりも新しい場合
      $flag = true;
    }

    if($flag){
      //オリジナルの中身を取得
      $css = $wp_filesystem->get_contents($origin_file);
      //minifyを取得し、読み込んだライブラリ(php-html-css-js-minifier.php)でminifyする
      $css = minify_css($css);
      $wp_filesystem->put_contents($minify_file, $css);
    }

    if( file_exists($minify_file) ){
      //圧縮したファイルがあれば圧縮ファイルのURLを代入
      $file = $minify_file_uri;
    } else {
      //圧縮したファイルがなければオリジナルのファイルのURLを代入
      $file = $origin_file_uri;
    }
  }

  wp_enqueue_style( 'diver-main-style', $file );

}

function diver_minifier_main_js(){
  //オリジナルのcss(絶対パス)
  $origin_file      = get_template_directory() . '/lib/assets/diver.js';
  //minify後のcss(絶対パス)
  $minify_file      = get_template_directory() . '/lib/assets/diver.min.js';
  //オリジナルのcssファイル(URI)
  $origin_file_uri  = get_template_directory_uri() . '/lib/assets/diver.js';
  //minify後のcssファイル(URI)
  $minify_file_uri  = get_template_directory_uri() . '/lib/assets/diver.min.js';
  //cssの中身を入れる変数
  $css              = '';
  //オリジナルファイルの日付を入れる変数
  $origin_file_date = '';
  //minifyファイルの日付を入れる変数
  $minify_file_date = '';
  //minifyしたファイルの中身を上書きするかどうかの判断に用いる
  $flag = false;

  if( WP_Filesystem() ){
    //$wp_filesystemオブジェクトの呼び出し
    global $wp_filesystem;

    //minify用のファイルがなければ生成
    if ( !file_exists($minify_file) ){
      $wp_filesystem->touch($minify_file);
      $flag = true;
    }

    //オリジナルファイルの日付を取得
    $origin_file_date = filemtime($origin_file);
    //minifyファイルの日付を取得
    $minify_file_date = filemtime($minify_file);

    if( $minify_file_date < $origin_file_date){
      //オリジナルの方がminifyよりも新しい場合
      $flag = true;
    }

    if($flag){
      //オリジナルの中身を取得
      $js = $wp_filesystem->get_contents($origin_file);
      //minifyを取得し、読み込んだライブラリ(php-html-css-js-minifier.php)でminifyする
      $js = minify_js($js);
      $wp_filesystem->put_contents($minify_file, $js);
    }

    if( file_exists($minify_file) ){
      //圧縮したファイルがあれば圧縮ファイルのURLを代入
      $file = $minify_file_uri;
    } else {
      //圧縮したファイルがなければオリジナルのファイルのURLを代入
      $file = $origin_file_uri;
    }
  }

  wp_enqueue_script('diver-main-js',$file, array(), false, true);
}

function diver_minifier_amp_css(){
  //オリジナルのcss(絶対パス)
  $origin_file      = get_template_directory() . '/lib/amp/css/style.css';
  //minify後のcss(絶対パス)
  $origin_file_uri  = get_template_directory_uri() . '/lib/amp/css/style.css';
  //cssの中身を入れる変数
  $css              = '';

  //minifyしたファイルの中身を上書きするかどうかの判断に用いる
  $flag = false;

  if( WP_Filesystem() ){
    //$wp_filesystemオブジェクトの呼び出し
    global $wp_filesystem;


      //オリジナルの中身を取得
    $css = $wp_filesystem->get_contents($origin_file);
    //minifyを取得し、読み込んだライブラリ(php-html-css-js-minifier.php)でminifyする
    $css = minify_css($css);
    
    return $css;

  }

}

function diver_minifier_editor_css(){
  //オリジナルのcss(絶対パス)
  $origin_file      = get_template_directory() . '/editor-style.css';
  //minify後のcss(絶対パス)
  $minify_file      = get_template_directory() . '/editor-style.min.css';
  //オリジナルのcssファイル(URI)
  $origin_file_uri  = get_template_directory_uri() . '/editor-style.css';
  //minify後のcssファイル(URI)
  $minify_file_uri  = get_template_directory_uri() . '/editor-style.min.css';
  //cssの中身を入れる変数
  $css              = '';
  //オリジナルファイルの日付を入れる変数
  $origin_file_date = '';
  //minifyファイルの日付を入れる変数
  $minify_file_date = '';
  //minifyしたファイルの中身を上書きするかどうかの判断に用いる
  $flag = false;

  if( WP_Filesystem() ){
    //$wp_filesystemオブジェクトの呼び出し
    global $wp_filesystem;

    //minify用のファイルがなければ生成
    if ( !file_exists($minify_file) ){
      $wp_filesystem->touch($minify_file);
      $flag = true;
    }

    //オリジナルファイルの日付を取得
    $origin_file_date = filemtime($origin_file);
    //minifyファイルの日付を取得
    $minify_file_date = filemtime($minify_file);

    if( $minify_file_date < $origin_file_date){
      //オリジナルの方がminifyよりも新しい場合
      $flag = true;
    }

    if($flag){
      //オリジナルの中身を取得
      $css = $wp_filesystem->get_contents($origin_file);
      //minifyを取得し、読み込んだライブラリ(php-html-css-js-minifier.php)でminifyする
      $css = minify_css($css);
      $wp_filesystem->put_contents($minify_file, $css);
    }

    if( file_exists($minify_file) ){
      //圧縮したファイルがあれば圧縮ファイルのURLを代入
      $file = $minify_file_uri;
    } else {
      //圧縮したファイルがなければオリジナルのファイルのURLを代入
      $file = $origin_file_uri;
    }
  }
  return $file;
}


if(phpversion() < "5.6.0"){
  if (!function_exists('minify_css')){
    function minify_css($style){
        $style = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $style);
        $style = str_replace(': ', ':', $style);
        $style = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $style);
        return $style;

    }
  }
}

function diver_minifier_editor_blockcss(){
  //オリジナルのcss(絶対パス)
  $origin_file      = get_template_directory() . '/lib/functions/editor/gutenberg/blocks.css';
  //minify後のcss(絶対パス)
  $minify_file      = get_template_directory() . '/lib/functions/editor/gutenberg/blocks.min.css';
  //オリジナルのcssファイル(URI)
  $origin_file_uri  = get_template_directory_uri() . '/lib/functions/editor/gutenberg/blocks.css';
  //minify後のcssファイル(URI)
  $minify_file_uri  = get_template_directory_uri() . '/lib/functions/editor/gutenberg/blocks.min.css';
  //cssの中身を入れる変数
  $css              = '';
  //オリジナルファイルの日付を入れる変数
  $origin_file_date = '';
  //minifyファイルの日付を入れる変数
  $minify_file_date = '';
  //minifyしたファイルの中身を上書きするかどうかの判断に用いる
  $flag = false;

  if( WP_Filesystem() ){
    //$wp_filesystemオブジェクトの呼び出し
    global $wp_filesystem;

    //minify用のファイルがなければ生成
    if ( !file_exists($minify_file) ){
      $wp_filesystem->touch($minify_file);
      $flag = true;
    }

    //オリジナルファイルの日付を取得
    $origin_file_date = filemtime($origin_file);
    //minifyファイルの日付を取得
    $minify_file_date = filemtime($minify_file);

    if( $minify_file_date < $origin_file_date){
      //オリジナルの方がminifyよりも新しい場合
      $flag = true;
    }

    if($flag){
      //オリジナルの中身を取得
      $css = $wp_filesystem->get_contents($origin_file);
      //minifyを取得し、読み込んだライブラリ(php-html-css-js-minifier.php)でminifyする
      $css = minify_css($css);
      $wp_filesystem->put_contents($minify_file, $css);
    }

    if( file_exists($minify_file) ){
      //圧縮したファイルがあれば圧縮ファイルのURLを代入
      $file = $minify_file_uri;
    } else {
      //圧縮したファイルがなければオリジナルのファイルのURLを代入
      $file = $origin_file_uri;
    }
  }
  wp_enqueue_style( 'diver-block-style', $file );
}

