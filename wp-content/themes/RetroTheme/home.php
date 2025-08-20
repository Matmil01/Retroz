<?php get_header() ?>
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post() ?>
			<?php
			$url = get_the_permalink();
			$title = get_the_title();
			$date = get_the_date();
			$author = get_the_author();
			$excerpt = get_the_excerpt();
			$categories = get_the_category();
			$tags = get_the_tags();
			?>
			
			<div class="mx-auto">
				<div class="card mb-4">
					<div class="card-body">
						<h2 class="card-title mt-0">
							<a href="<?php echo esc_url($url); ?>" class="text-decoration-none text-dark">
								<?php echo esc_html($title); ?>
							</a>
						</h2>
						<p class="card-text text-muted mb-2">
							<?php echo esc_html($date); ?> | <?php echo esc_html($author); ?> | Category: 
							<?php if($categories): ?>
								<?php foreach($categories as $category): ?>
									<a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
								<?php endforeach; ?>
							<?php endif; ?>
						</p>
						<p class="card-text">
							<?php echo esc_html($excerpt); ?>
							<div class="tags">
								<?php if($tags): ?>
									<?php foreach($tags as $tag): ?>
										<a href="<?php echo get_tag_link($tag->term_id); ?>" class="badge rounded-pill text-bg-primary"><?php echo $tag->name; ?></a>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</p>
						<a href="<?php echo esc_url($url); ?>" class="btn btn-primary">
							Read more
						</a>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<?php echo paginate_links() ?>
	<?php endif; ?>
<?php get_footer() ?>
