<?php get_header() ?>
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post() ?>

			<?php
			$title = get_the_title();
			$link = get_the_permalink();
			$director = get_field("director");
			$summary = get_field("summary");
			?>

			<div class="movie">
				<h1><?php echo esc_html($title) ?></h1>
				<p>Director: <?php echo esc_html($director) ?></p>
				<hr>
				<p><?php echo esc_html($summary) ?></p>
				<hr>
				<?php get_template_part("template-parts/movie", "review-list") ?>
				<hr>
				<?php get_template_part("template-parts/movie", "review-form") ?>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer() ?>