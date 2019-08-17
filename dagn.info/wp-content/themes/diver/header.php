<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php echo diver_meta_title(); ?></title>
<?php echo_meta_description_tag(); ?>
<?php 
	if(get_option('diver_seosetting','1')){
		diver_meta_robot();
	}
	if(get_option('diver_ogpsetting','1')){
		diver_meta_ogp();
	}
 ?>
<link rel="canonical" href="<?php echo diver_canonical_url(); ?>">
<link rel="shortcut icon" href="<?php echo get_theme_mod( 'diver_favicon');?>">
<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_theme_mod( 'diver_favicon_ie'); ?>">
<![endif]-->
<link rel="apple-touch-icon" href="<?php echo get_theme_mod( 'diver_appleicon');?>" />
<?php if(is_single()&&apply_filters('diver_amp_enable_all_set',get_post_meta($post->ID, "amp_name", true))){ ?><link rel="amphtml" href="<?php echo get_permalink().'?amp=1'; ?>"><?php } ?>
<?php wp_head(); ?>


<script src="https://apis.google.com/js/platform.js" async defer></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<script>
window.___gcfg = {lang: 'ja'};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = 'https://apis.google.com/js/plusone.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>

<?php 
$gaid = get_option( 'diver_option_base_gaid',get_theme_mod( 'diver_analytics_id',''));
if($gaid): ?>
<?php if(!(get_option('diver_option_base_gaid_admin',0)==1&&(current_user_can('administrator')||current_user_can('editor')||current_user_can('author')||current_user_can('Contributor')))): ?>
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create',<?php echo json_encode($gaid); ?>,'auto');ga('send','pageview');</script>
	<?php endif; ?>
<?php endif; ?>
<?php 
$gawm = get_option( 'diver_option_base_gawm' );
if($gawm): ?>
	<meta name="google-site-verification" content="<?php echo $gawm ?>" />
<?php endif; ?>

<?php echo get_option('diver_option_base_ana_head',get_theme_mod('diver_access_tag_head')); ?>
<?php
global $post;
if($post){
	echo get_post_meta($post->ID,'head_innner_content',true); 
}
?>
</head>
<body itemscope="itemscope" itemtype="http://schema.org/WebPage" style="background-image:url('<?php echo get_theme_mod('diver_background_image'); ?>')" <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.12&appId=<?php echo get_option('diver_sns_facebook_app',get_theme_mod('facebook_app')); ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="container">
<!-- header -->
<?php if(!is_singular('lp') && !is_attachment() ): ?>
	<!-- lpページでは表示しない -->
	<div id="header" class="clearfix">
	<?php $firstView_pos = get_option('diver_option_firstview_position',get_theme_mod('headerimage_position','bottom')); ?>
		<?php if($firstView_pos == 'top'){get_template_part('/lib/parts/firstview');} ?>
		<header class="header-wrap" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<?php get_template_part('/lib/parts/miniheader'); ?>

			<div class="header-logo clearfix">
				<?php get_template_part('/lib/parts/sp','menu'); ?>

				<!-- /Navigation -->
				<div id="logo">
					<?php $diverlogo = get_theme_mod("diver_logo"); ?>
					<a href="<?php echo home_url('/'); ?>">
						<?php if(empty($diverlogo)): ?>
							<div class="logo_title"><?php bloginfo('name'); ?></div>
						<?php else: ?>
							<img src="<?php echo esc_url($diverlogo) ?>" alt="<?php bloginfo('name'); ?>">
						<?php endif; ?>
					</a>
				</div>
				<?php if(get_theme_mod('nav_style','in')=='in'): ?>
					<nav id="nav" role="navigation" itemscope="itemscope" itemtype="http://scheme.org/SiteNavigationElement">
						<?php wp_nav_menu( array ( 
							'theme_location' => 'header-navi',
							'items_wrap' => '<ul id="mainnavul" class="menu">%3$s</ul>',
							'link_before' => '',
							'link_after' => '',
							'depth' => 0,
							'fallback_cb' => ''
						)); ?>
					</nav>
				<?php else: 
					(!is_mobile())?get_template_part('/lib/parts/header-right'):'';
				endif; ?>
			</div>
		</header>
		<nav id="scrollnav" class="inline-nospace" role="navigation" itemscope="itemscope" itemtype="http://scheme.org/SiteNavigationElement">
			<?php wp_nav_menu( array ( 
				'theme_location' => 'scroll-menu',
				'items_wrap' => '<ul id="scroll-menu">%3$s</ul>',
				'link_before' => '',
				'link_after' => '',
				'depth' => 0,
				'fallback_cb' => ''
			)); ?>
		</nav>
		<?php get_template_part('/lib/parts/nav','fixed'); ?>
		<?php if($firstView_pos == 'middle'){get_template_part('/lib/parts/firstview');} ?>
		<?php if(get_theme_mod('nav_style')=='only'): ?>
			<nav id="onlynav" class="onlynav" role="navigation" itemscope="itemscope" itemtype="http://scheme.org/SiteNavigationElement">
				<?php wp_nav_menu( array ( 
					'theme_location' => 'header-navi',
					'items_wrap' => '<ul id="onlynavul" class="menu">%3$s</ul>',
					'link_before' => '',
					'link_after' => '',
					'depth' => 0,
					'fallback_cb' => ''
				)); ?>
			</nav>
		<?php endif; ?>
		<?php if($firstView_pos == 'bottom'){get_template_part('/lib/parts/firstview');} ?>
	</div>
	<div class="d_sp">
	<?php (is_mobile()&&get_option('diver_option_headerbtn_spon',1))?get_template_part('/lib/parts/header-right'):''; ?>
	</div>
	<?php get_template_part('/lib/parts/header-message'); ?>
	<?php if(is_active_sidebar( 'container-top' )): ?>
		<div class="container_top_widget">
			<div class="container_top_widget_content clearfix">
			<?php dynamic_sidebar('container-top'); ?>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>