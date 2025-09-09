<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php function_exists('wp_body_open') && wp_body_open(); ?>

<header class="w-full">
    <div class="max-w-6xl mx-auto flex items-center px-6 h-20 gap-10 font-main">

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 font-main">
            <?php
            // Memory Karl
            echo file_get_contents(get_template_directory() . '/icons/MemoryKarl.svg');
            ?>
            <span class="font-headline text-xl font-bold">
                <?php echo esc_html( get_bloginfo('name') ); ?>
            </span>
        </a>

        <nav class="flex font-main" aria-label="<?php esc_attr_e('Primary menu','retro'); ?>">
            <?php
            if ( has_nav_menu('primary') ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex gap-8 list-none m-0 p-0 font-main',
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'fallback_cb'    => false,
                    'link_before'    => '<span class="uppercase tracking-wide font-main">',
                    'link_after'     => '</span>',
                ) );
            } else {
                echo '<ul class="flex gap-8 list-none m-0 p-0 font-main">';
                wp_list_pages( array( 'title_li' => '' ) );
                echo '</ul>';
            }
            ?>
        </nav>

        <ul class="flex items-center gap-4 ml-auto font-main">
            <?php if ( function_exists('pll_the_languages') ) {
                pll_the_languages( array(
                    'show_flags'    => 0,
                    'show_names'    => 1,
                    'hide_if_empty' => 0
                ) );
            } ?>
        </ul>

    </div>
</header>

<main id="site-content" class="max-w-6xl mx-auto px-6 py-10">