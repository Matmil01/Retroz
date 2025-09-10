<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php function_exists('wp_body_open') && wp_body_open(); ?>

<header class="w-full bg-white text-black border-b border-black">
    <div class="max-w-6xl mx-auto flex items-center px-6 h-20 gap-10">

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 font-bold text-xl">
            <?php
            $logo_id  = get_theme_mod('custom_logo');
            $logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : '';
            $site_t   = get_bloginfo('name');
            if ( $logo_url ) {
                echo '<img src="'.esc_url($logo_url).'" alt="'.esc_attr($site_t).'" class="h-10 w-auto">';
            } else {
                echo esc_html( $site_t );
            }
            ?>
        </a>

        <nav class="flex" aria-label="<?php esc_attr_e('Primary menu','retro'); ?>">
            <?php
            if ( has_nav_menu('primary') ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex gap-8 list-none m-0 p-0',
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'fallback_cb'    => false,
                    'link_before'    => '<span class="uppercase tracking-wide text-sm font-semibold hover:text-rose-400 transition-colors">',
                    'link_after'     => '</span>',
                ) );
            } else {
                echo '<ul class="flex gap-8 list-none m-0 p-0">';
                wp_list_pages( array( 'title_li' => '' ) );
                echo '</ul>';
            }
            ?>
        </nav>

        <ul class="flex items-center gap-4 ml-auto">
            <?php if ( function_exists('pll_the_languages') ) {
                pll_the_languages( array(
                    'show_flags'    => 0,
                    'show_names'    => 1,
                    'hide_if_empty' => 0
                ) );
            } ?>
        </ul>

    </div>
	<main id="site-content" class="max-w-6xl mx-auto px-6 py-10">
</header>
