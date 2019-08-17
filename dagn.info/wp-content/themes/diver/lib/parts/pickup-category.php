<?php 
$pickup_cat = get_theme_mod('pickup_cat','none');
$cat_slug = get_category_by_slug($pickup_cat);
if($pickup_cat != 'none' && $cat_slug):
	$cat_id = get_category_by_slug($pickup_cat)->cat_ID;
?>
<div class="wrap-post-title"><?php echo get_cat_name($cat_id) ?><span class="wrap-post-title-inner"><a href="<?php echo get_category_link($cat_id) ?>"><?php echo apply_filters('diver_pickup_cat_morelink','<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>  もっと見る'); ?></a></span></div>
	<section class="pickup-cat-wrap">
		<?php $my_query = new WP_Query(
			array(
				'category_name' => $pickup_cat,
				'posts_per_page' => get_theme_mod('pickup_cat_num',5)
			));
		while ($my_query->have_posts()) : $my_query->the_post(); 
		?>
		<article class="pickup-cat-list hvr-fade-post clearfix">
			<a class="clearfix" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
			<figure class="pickup-cat-img">
				<?php get_template_part('/lib/parts/tag','new'); ?>
				<?php echo get_diver_thumb_img(apply_filters('diver_pickup_cat_thumb_img_size','thumbnail')); ?>
			</figure>
			<section class="meta">
				<?php if(get_theme_mod('post_date',true)): ?>
					<time datetime="<?php the_time('Y-m-d'); ?>" class="pickup-cat-dt"><?php echo get_the_date(); ?></time>
				<?php endif; ?>
				<div class="pickup-cat-title"><?php the_title(); ?></div>
				<div class="pickup-cat-excerpt"><?php echo get_diver_excerpt(get_the_ID(),80); ?></div>
			</section>
			</a>
		</article>
		<?php endwhile;?>
	</section>
<?php endif; ?>