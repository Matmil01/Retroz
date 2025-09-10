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
            
            <h1 class="text-8xl font-bold mb-6 text-white font-headline"><?php echo esc_html($title); ?></h1>

            <div class="rounded-lg overflow-hidden" style="background-color: #D6D6D6;">
                <?php if (has_post_thumbnail()): ?>
                    <div class="w-full not-prose">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
                    </div>
                <?php endif; ?>

                <article class="prose max-w-none p-8 text-black">
                    <p class="text-gray-600 mb-6">
                        <?php echo esc_html($date); ?> | <?php echo esc_html($author); ?> | Category: 
                        <?php if($categories): ?>
                            <?php foreach($categories as $category): ?>
                                <a href="<?php echo get_category_link($category->term_id); ?>" class="text-black font-semibold"><?php echo $category->name; ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </p>
                    <div class="text-black">
                        <?php echo $content; ?>
                        <div class="mt-6">
                            <?php if($tags): ?>
                                <?php foreach($tags as $tag): ?>
                                    <a href="<?php echo get_tag_link($tag->term_id); ?>" class="inline-block text-white text-xs px-3 py-1 rounded-full mr-2 mb-2" style="background-color: #2563EB;">
                                        <?php echo $tag->name; ?>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            </div>

            <?php if(comments_open() || get_comments_number()): ?>
                <div class="mt-8">
                    <?php comments_template(); ?>
                </div>
            <?php endif; ?>
        
        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer() ?>