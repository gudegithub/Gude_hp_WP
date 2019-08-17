<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<?php if(have_posts()): while(have_posts()): the_post(); ?>

			<?php the_content(); ?>

			<?php endwhile; endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
