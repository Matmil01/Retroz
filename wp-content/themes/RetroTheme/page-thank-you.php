<?php get_header() ?>

	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post() ?>
			
			<?php
			$title = get_the_title();
			$content = get_the_content();
			?>

			<h1><?php echo esc_html($title) ?></h1>
			<p><?php echo esc_html($content) ?></p>

		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer() ?>