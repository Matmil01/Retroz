<?php get_header(); ?>

<h1>Tag: <?php single_term_title(); ?></h1>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p><?php the_excerpt(); ?></p>
<?php endwhile; else: ?>
    <p>No posts found with this tag.</p>
<?php endif; ?>

<?php get_footer(); ?>