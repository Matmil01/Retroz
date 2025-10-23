<h3>testimoz</h3>
<?php
    $arguments = array(
        "post_type" => "testimonial",
        "posts_per_page" => -1,
    );

    $loop = new WP_Query($arguments);
?>

<?php if($loop->have_posts()): ?>
<div class="testimonials-list grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php while($loop->have_posts()): $loop->the_post();

        $testimonialImg = get_field('profilbillede');
        $testimonialName = get_the_title();
        $testimonialText = get_field('brodtekst');
    ?>

    <section class="testimonial bg-[#D9D9D9] p-2 flex flex-col items-center text-center rounded-lg" style="min-width:0;">
        <img class="h-44 w-44 object-contain rounded mb-2" src="<?php echo esc_url($testimonialImg['url']); ?>" alt="<?php echo esc_attr($testimonialImg['alt']); ?>" />
        <div class="bg-[#B3B3B3] mt-2 px-2 py-2 rounded-lg w-full">
            <h3 class="text-lg font-headline text-[#4D4284] mb-1"><?php echo esc_html($testimonialName); ?></h3>
            <p class="text-sm"><?php echo esc_html($testimonialText); ?></p>
        </div>
    </section>

    <?php endwhile ?>
</div>
<?php endif ?>