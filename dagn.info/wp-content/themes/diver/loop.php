<?php 
global $article_list_title;
$postcount = 1;
?>
<?php if(!empty($article_list_title)):?>
	<div class="wrap-post-title"><?php echo $article_list_title;?></div>
<?php endif; ?>
<section class="wrap-post-box">
	<?php
	// WordPress ループ
	$infeedcount = 0;
	$infeednum = get_option( 'diver_option_base_ad_infeed');
	$infeedad = get_option( 'diver_option_base_ad_infeedtag-list');
	$infeedad_mobile = get_option('diver_option_base_ad_infeedtag-mobile');

	if(have_posts()): while (have_posts()) : the_post();
	$infeedcount++; ?>
	<?php 
	if(in_array((string)$infeedcount, explode(',',$infeednum)) !== false): ?>
		<?php if(!is_mobile() && $infeedad): ?>
				<article class="post-box">
					<div class="post-box-contents clearfix">
						<?php echo $infeedad; ?>
					</div>
				</article>
		<?php elseif($infeedad_mobile): ?>
				<article class="post-box">
					<div class="post-box-contents clearfix">
						<?php echo $infeedad_mobile; ?>
					</div>
				</article>
		<?php endif; ?>
	<?php endif; ?>
			<article class="post-box post-<?php echo $postcount; ?>" role="article">
				<div class="post-box-contents clearfix" data-href="<?php the_permalink();?>">
				<figure class="post_thumbnail">
						<?php get_template_part('/lib/parts/tag','new'); ?>
						<div class="post_thumbnail_wrap">
								<?php 
								$thumbnail_size = is_mobile()?get_option('diver_option_base_main_thumbnail_sp','medium'):get_option('diver_option_base_main_thumbnail','medium');
									echo get_diver_thumb_img($thumbnail_size); 
								?>

								<?php
								$cats = get_the_category();
								$cat = ($cats)?$cats[0]:'';
								foreach ($cats as $category) {
									if($category->category_parent){
										$cat=$category;
										break;
									}
								}

								if(!get_theme_mod('post_category',1)){
									$parent_cat_id = $cat->parent;
									if($parent_cat_id != 0){
										$cat = get_category($parent_cat_id);
									}
								}
								?>
						</div>
						<?php if(is_mobile()&&!get_theme_mod('diver_archive_thumb',false)&&$cat): ?>
							<div class="post-cat" style="background:<?php echo get_theme_mod($cat->slug);?>"><a href="<?php echo get_category_link($cat->cat_ID); ?>" rel="category tag"><?php echo $cat->cat_name; ?></a></div>
						<?php endif; ?>
				</figure>
					<section class="post-meta-all">
					<?php if(!is_mobile()&&$cat||get_theme_mod('diver_archive_thumb',false)&&$cat): ?>
						<div class="post-cat" style="background:<?php echo get_theme_mod($cat->slug);?>"><a href="<?php echo get_category_link($cat->cat_ID); ?>" rel="category tag"><?php echo $cat->cat_name; ?></a></div>
					<?php endif; ?>
							<?php 
							if(get_theme_mod('post_tag',true)): 
								$posttags = get_the_tags();
								$count=0;
								$sep='';
								if ($posttags) { 
									echo '<div class="post-tag">';
								  foreach($posttags as $tag) {
								    $count++;
								    if ($count > 4) break; 
								    echo '<a href="'. get_tag_link($tag->term_id) .'" rel="tag">'. $tag->name ."</a>";
								  }
									echo '</div>';
								}
							endif; ?>
						<div class="post-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</div>
						<?php if(get_theme_mod('post_date',true)): ?>
							<time class="post-date" datetime="<?php echo (get_theme_mod('post_sort','published')=='published')?the_time('Y-m-d'):the_modified_date('Y-m-d'); ?>">
							<?php echo (get_theme_mod('post_sort','published')=='published')?get_the_date():the_modified_date('Y年m月d日'); ?>	
							</time>
						<?php endif; ?>
						<div class="post-substr">
							<?php if(get_theme_mod('post_excerpt_count',160)): ?>
								<?php if( !post_password_required( $post->ID ) ) : 
										echo get_diver_excerpt($post->ID,get_theme_mod('post_excerpt_count',160)); 
									else:
										echo apply_filters('diver_auth_excerpt','この投稿は、パスワードで保護されています。');
									endif;
								?>
							<?php endif; ?>
						</div>
						<?php if(get_theme_mod('post_author',true)): ?>
							<ul class="post-author">
								<li class="post-author-thum"><?php echo get_avatar(get_the_author_meta('ID'), 30); ?></li>
								<li class="post-author-name"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></li>
							</ul>
						<?php endif; ?>
					</section>
				</div>
			</article>
			<?php $postcount++; ?>
			<?php ($postcount==5)?dynamic_sidebar('in_loop'):'';?>
		<?php 
		endwhile;
		wp_reset_postdata();
		// loop終了
		?>
	<?php else: ?>
		<div class="notfound_message">お探しの記事は見つかりませんでした。</div>
	<?php endif; ?>
</section>
<?php if(get_theme_mod('post_author',true)||get_theme_mod('post_date',true)): ?>
	<style>
	.post-box-contents .post-meta-all {padding-bottom: 30px;}
	</style>
<?php endif; ?>

<!-- pager -->
<?php get_template_part('/lib/parts/pagenation'); ?>
<!-- /pager	 -->