<?php
// Template Name: Sustainability Initiatives Page
?>
<?php get_header(); ?>

<?php
            $title = get_the_title();
            $content = get_the_content();
            ?>

    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <h1 class="text-8xl font-bold mb-6 text-white font-headline"><?php echo esc_html($title); ?></h1>

            <div class="rounded-lg overflow-hidden" style="background-color: #D6D6D6;">
                <?php if (has_post_thumbnail()): ?>
                    <div class="w-full not-prose">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
                    </div>
                    <?php endif; ?>
                <article class="prose max-w-none p-8 text-black">
                    <div class="text-black">
                        <?php echo apply_filters('the_content', $content); ?>
                    </div>
                    <div class="w-full flex justify-center mt-8">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/QBsjGOhNypg?si=NJNqx-U64LdoXO01" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </article>
        <?php endwhile; ?>
    <?php endif; ?>


<?php get_footer(); ?>