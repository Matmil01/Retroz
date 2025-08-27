<?php get_header() ?>
	<?php
	$loop = new WP_Query(array(
		"post_type" => "movie",
		"posts_per_page" => -1,
		"orderby" => "title",
		"order" => "ASC"
	));
	?>
	<?php if($loop->have_posts()): ?>
		<ul>
			<?php while($loop->have_posts()): $loop->the_post(); ?>

				<?php
				$title = get_the_title();
				$link = get_the_permalink();
				?>
				
			
				<li><a href="<?php echo esc_url($link) ?>"><?php echo esc_html($title) ?></a></li>

			<?php endwhile; ?>
		</ul>
<?php get_template_part("template-parts/index", "testimonials") ?>
		
		<?php wp_reset_postdata(); ?>	
	<?php endif; ?>
<?php get_footer() ?>