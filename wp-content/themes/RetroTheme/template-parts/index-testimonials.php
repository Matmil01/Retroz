<?php
            $arguments = array(
                "post_type" => "testimonial",
                "posts_per_page" => -1,
            );

            $loop = new WP_Query($arguments);
            ?>

            <?php if($loop->have_posts()): ?>
            <div class="testimonials-list">
                <?php while($loop->have_posts()): $loop->the_post() ?>


<?php
    $testimonialImg = get_field('profilbillede');
    $testimonialName = get_the_title();
    $testimonialText = get_field('brodtekst');
?>

<section class="testimonial">
    <img src="<?php echo esc_url($testimonialImg['url']); ?>" alt="">
    <h1><?php echo esc_html($testimonialName); ?></h1>
    <p><?php echo esc_html($testimonialText); ?></p>
</section>

<?php endwhile ?>
            </div>
<?php endif ?>