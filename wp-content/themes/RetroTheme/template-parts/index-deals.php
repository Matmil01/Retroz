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
            <div class="deal-card" style="background:#D9D9D9;border-radius:12px;padding:1rem;">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('medium', [
                            'style' => 'width:100%;height:220px;object-fit:contain;border-radius:8px;display:block;'
                        ]); ?>
                    <?php endif; ?>
                    <h3 style="font-family:var(--font-headline);color:#4D4284;margin-bottom:0.1rem;"><?php the_title(); ?></h3>
                </a>
                <div style="color:#E53935;font-weight:bold;margin-top:0;">
                    <?php echo $product->get_price_html(); ?>
                </div>
                <div style="text-align:center;">
                    <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="button" style="background:#6C619E;color:#fff;border-radius:6px;padding:0.5rem 1.5rem;font-family:var(--font-main);font-weight:bold;display:inline-block;margin-top:0.5rem;">
                        <?php echo esc_html($product->add_to_cart_text()); ?>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata(); ?>