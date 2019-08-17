<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <script type='text/javascript' src='http://test.local/wp-content/themes/twentyseventeen/assets/js/html5.js?ver=5.1.1'></script>
  <script type='text/javascript' src='http://test.local/wp-content/themes/twentyseventeen/assets/js/global.js?ver=5.1.1'></script>
  <script type='text/javascript' src='http://test.local/wp-content/themes/twentyseventeen/assets/js/customize-preview.js?ver=5.1.1'></script>
  <title><?php wp_title(' | ', true, 'right'); ?></title>
  <?php wp_head(); ?>
</head>
<body>
  <!-- header -->
  <header>
    <div class="container">
      <div class="header_left">
        <h3 class="header_left_logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="http://gude.jp/wp-content/uploads/2019/08/Gude_logo.png"></a></h3>
      </div>
      <div class="header_right">
        <ul>
          <li><a href="#vision">Vision / Mission</a></li>
          <li><a href="#service">Service</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#company">Company</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href=" http://gude.jp/intern/">Intern</a></li>
        </ul>
      </div>
    </div>
  </header>
