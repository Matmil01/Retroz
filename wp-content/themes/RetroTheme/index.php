<?php get_header() ?>

<?php
    $heroImg = get_field("heroImg");
?>

<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
        <?php if($heroImg): ?>
            <img class="hero-img" src="<?php echo esc_url($heroImg['url']) ?>" alt="<?php echo esc_attr($heroImg['alt']) ?>" />
        <?php endif; ?>
        <div><?php the_content(); ?></div>
    <?php endwhile; ?>
<?php endif; ?>

<?php
// forside shit fucker af fra woocommerce
if (
    (!function_exists('is_cart') || !is_cart()) &&
    (!function_exists('is_checkout') || !is_checkout()) &&
    (!function_exists('is_account_page') || !is_account_page())
) {
    get_template_part("template-parts/index", "deals");
    get_template_part("template-parts/index", "categories");
    get_template_part("template-parts/index", "blogposts");
    get_template_part("template-parts/index", "testimonials");
}
?>

<?php get_footer() ?>