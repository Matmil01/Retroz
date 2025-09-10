<?php get_header() ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post() ?>
        
            <?php
            $title = get_the_title();
            $date = get_the_date();
            $author = get_the_author();
            $content = get_the_content();
            $categories = get_the_category();
            $tags = get_the_tags();
            ?>

            <article class="prose w-full">
                <h1 class="text-3xl font-bold mb-2"><?php echo esc_html($title); ?></h1>
                <p class="text-gray-600 mb-6">
                    <?php echo esc_html($date); ?> | <?php echo esc_html($author); ?> | Category: 
                    <?php if($categories): ?>
                        <?php foreach($categories as $category): ?>
                            <a href="<?php echo get_category_link($category->term_id); ?>" class="text-blue-600 hover:underline"><?php echo $category->name; ?></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </p>
                <div>
                    <?php echo $content; ?>
                    <div class="mt-6">
                        <?php if($tags): ?>
                            <?php foreach($tags as $tag): ?>
                                <a href="<?php echo get_tag_link($tag->term_id); ?>" class="inline-block bg-blue-500 text-white text-sm px-3 py-1 rounded-full mr-2 mb-2"><?php echo $tag->name; ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </article>

            <?php if(comments_open() || get_comments_number()): ?>
                <?php comments_template(); ?>
            <?php endif; ?>
        
        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer() ?>