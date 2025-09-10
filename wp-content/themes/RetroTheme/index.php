<?php get_header() ?>

<?php
			$heroImg = get_field("heroImg");
			?>

	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
				<?php if($heroImg): ?>
					<img class="!max-w-full" src="<?php echo esc_url($heroImg['url']) ?>" alt="">
				<?php endif; ?>
			<div><?php the_content(); ?></div>
		<?php endwhile; ?>
	<?php endif; ?>

		<?php get_template_part("template-parts/index", "deals") ?>
		
		<?php get_template_part("template-parts/index", "categories") ?>

		<?php get_template_part("template-parts/index", "testimonials") ?>

<?php get_footer() ?>