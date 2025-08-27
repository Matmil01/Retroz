<?php get_header() ?>
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post() ?>

			<?php
			$title = get_the_title();
			$link = get_the_permalink();
			$developer = get_field("developer");
			$publisher = get_field("publisher");
			$summary = get_field("summary");
			?>

			<div class="game">
				<h1><?php echo esc_html($title) ?></h1>
				<p>Developer: <?php echo esc_html($developer) ?></p>
				<p>Publisher: <?php echo esc_html($publisher) ?></p>
				
				<hr>
				<p><?php echo esc_html($summary) ?></p>
				<hr>
				<?php get_template_part("template-parts/game", "review-list") ?>
				<hr>
				<?php get_template_part("template-parts/game", "review-form") ?>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer() ?>