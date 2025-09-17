<h3>testimoz</h3>
<?php
            $arguments = array(
                "post_type" => "testimonial",
                "posts_per_page" => -1,
            );

            $loop = new WP_Query($arguments);
            ?>

            <?php if($loop->have_posts()): ?>
            <div class="testimonials-list grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while($loop->have_posts()): $loop->the_post() ?>


<?php
    $testimonialImg = get_field('profilbillede');
    $testimonialName = get_the_title();
    $testimonialText = get_field('brodtekst');
?>

<section class="testimonial bg-[#D9D9D9] p-4 flex flex-col items-center text-center rounded-lg">
    <img class="h-69" src="<?php echo esc_url($testimonialImg['url']); ?>" alt="<?php echo esc_attr($testimonialImg['alt']); ?>" />
    <div class="bg-[#B3B3B3] mt-4 px-4 rounded-lg">
        <h1 class=""><?php echo esc_html($testimonialName); ?></h1>
        <p class=""><?php echo esc_html($testimonialText); ?></p>
    </div>
</section>

<?php endwhile ?>
</div>
<?php endif ?>