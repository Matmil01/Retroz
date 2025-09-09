<?php get_header(); ?>

<?php if(have_posts()): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while(have_posts()): the_post();
            $url = get_the_permalink();
            $title = get_the_title();
            $date = get_the_date();
            $author = get_the_author();
            $excerpt = get_the_excerpt();
            $categories = get_the_category();
            $tags = get_the_tags();
        ?>
            <div class="bg-slate-800 rounded-lg shadow p-6 flex flex-col justify-between font-main">
                <h2 class="text-xl font-bold mb-2">
                    <a href="<?php echo esc_url($url); ?>" class="text-white hover:text-rose-400 underline">
                        <?php echo esc_html($title); ?>
                    </a>
                </h2>
                <p class="text-xs text-gray-400 mb-2">
                    <?php echo esc_html($date); ?> | <?php echo esc_html($author); ?> | Category:
                    <?php if ($categories): ?>
                        <?php foreach ($categories as $category): ?>
                            <a href="<?php echo get_category_link($category->term_id); ?>" class="text-gray-300 hover:text-rose-400 underline"><?php echo $category->name; ?></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </p>
                <p class="mb-4 text-white">
                    <?php echo esc_html($excerpt); ?>
                </p>
                <div class="flex flex-wrap gap-2 mb-4">
                    <?php if ($tags): ?>
                        <?php foreach ($tags as $tag): ?>
                            <a href="<?php echo get_tag_link($tag->term_id); ?>" class="px-2 py-1 rounded bg-rose-700 text-white text-xs hover:bg-rose-400"><?php echo $tag->name; ?></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <a href="<?php echo esc_url($url); ?>" class="mt-4 inline-block px-4 py-2 rounded bg-white text-slate-800 font-semibold hover:bg-rose-400 hover:text-white transition">
                    Read more
                </a>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="mt-10 flex justify-center">
        <?php echo paginate_links(); ?>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
