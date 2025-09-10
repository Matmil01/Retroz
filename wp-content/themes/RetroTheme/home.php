<?php get_header(); ?>

<h1 class="text-4xl font-headline text-white mb-8 text-left">Blog Page</h1>

<?php if(have_posts()): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php while(have_posts()): the_post();
            $url = get_the_permalink();
            $title = get_the_title();
            $date = get_the_date();
            $author = get_the_author();
            $excerpt = get_the_excerpt();
            $categories = get_the_category();
            $tags = get_the_tags();
            
            $short_excerpt = wp_trim_words($excerpt, 40, '...');
        ?>
            <div class="rounded-lg shadow overflow-hidden flex flex-col justify-between font-main" style="background-color: #D9D9D9;">
                <?php if (has_post_thumbnail()): ?>
                    <div class="w-full aspect-[16/9]">
                        <a href="<?php echo esc_url($url); ?>">
                            <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover']); ?>
                        </a>
                    </div>
                <?php endif; ?>
                
                <div class="p-4 space-y-3">
                    <h2 class="text-lg font-bold">
                        <a href="<?php echo esc_url($url); ?>" class="text-black">
                            <?php echo esc_html($title); ?>
                        </a>
                    </h2>
                    <p class="text-xs text-gray-700">
                        <?php echo esc_html($date); ?> | <?php echo esc_html($author); ?>
                    </p>
                    
                    <div class="rounded-lg p-3 text-white text-sm" style="background-color: #B3B3B3;">
                        <?php echo esc_html($short_excerpt); ?>
                    </div>
                    
                    <div class="flex flex-wrap gap-1">
                        <?php 
                        if ($tags):
                            foreach ($tags as $tag):
                        ?>
                                <a href="<?php echo get_tag_link($tag->term_id); ?>" class="px-1.5 py-0.5 rounded text-white font-main text-xs" style="background-color: #2563EB;">
                                    <?php echo $tag->name; ?>
                                </a>
                        <?php
                            endforeach;
                        endif; 
                        ?>
                    </div>
                    <div class="flex justify-center pt-1">
                        <a href="<?php echo esc_url($url); ?>" class="inline-block px-3 py-1 rounded text-white font-main text-xs" style="background-color: #4D4284;">
                            READ MORE
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="mt-8 flex justify-center">
        <?php echo paginate_links(); ?>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
