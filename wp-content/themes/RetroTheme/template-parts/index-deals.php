<!-- insert those fucking deals and shit here -->

<h2 class="text-3xl font-headline text-white mb-8 text-left"><?php pll_e('Latest Deals'); ?></h2>

<?php
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 4,
    'meta_query'     => array(
        array(
            'key'     => '_sale_price',
            'value'   => 0,
            'compare' => '>',
            'type'    => 'NUMERIC'
        )
    ),
    'orderby'        => 'date',
    'order'          => 'DESC'
); 

$deals = new WP_Query($args);

if ($deals->have_posts()): ?>
    <div class="deals-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php while ($deals->have_posts()): $deals->the_post(); global $product; ?>
            <div class="deal-card bg-[#D9D9D9] rounded-xl p-6">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('medium', [
                            'class' => 'w-full h-[220px] object-contain rounded-lg shadow'
                        ]); ?>
                    <?php endif; ?>
                    <h2 class="font-headline text-[1.5rem] text-[#4D4284] mb-2"><?php the_title(); ?></h2>
                </a>
                <div class="text-[#E53935] font-bold mt-0 mb-2 text-sm [&_del]:text-[#888]">
                    <?php echo $product->get_price_html(); ?>
                </div>
                <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="button block mx-auto mt-4 bg-[#6C619E] text-white rounded-lg px-6 py-2 font-main font-bold transition hover:bg-[#4D4284] text-center">
                    <?php echo esc_html($product->add_to_cart_text()); ?>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata(); ?>