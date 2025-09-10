<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php function_exists('wp_body_open') && wp_body_open(); ?>

<header class="w-full text-white">
    <div class="max-w-6xl mx-auto flex items-center px-6 h-20 gap-10 font-main">

<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 font-main text-white">
    <span class="logo-icon w-20 h-20 inline-flex items-center justify-center">
        <?php
        // Memory Karl
        echo file_get_contents(get_template_directory() . '/icons/MemoryKarl.svg');
        ?>
    </span>
    <h1 class="logo-text font-headline text-4xl text-white">
        <?php echo esc_html( get_bloginfo('name') ); ?>
    </h1> 
</a>


        <nav class="flex font-main text-white" aria-label="<?php esc_attr_e('Primary menu','retro'); ?>">
            <?php
            if ( has_nav_menu('primary') ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex gap-8 list-none m-0 p-0 font-main text-white',
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'fallback_cb'    => false,
                    'link_before'    => '<span class="tracking-wide font-main text-white">',
                    'link_after'     => '</span>',
                ) );
            } else {
                echo '<ul class="flex gap-8 list-none m-0 p-0 font-main text-white">';
                wp_list_pages( array( 'title_li' => '' ) );
                echo '</ul>';
            }
            ?>
        </nav>

        <div class="flex items-center gap-4 ml-auto font-main text-white">
            <?php if ( function_exists('pll_the_languages') ) {
                $languages = pll_the_languages(array(
                    'show_flags'    => 0,
                    'show_names'    => 1,
                    'hide_if_empty' => 0,
                    'raw'           => 1
                ));
                
                if ($languages) {
                    foreach ($languages as $code => $language) {
                        $flag = $code === 'en' ? '🇬🇧' : '🇩🇰';
                        echo '<a href="' . esc_url($language['url']) . '" class="text-lg text-white">' . $flag . '</a>';
                    }
                }
            } ?>
        </div>

    </div>
</header>
<main id="site-content" class="max-w-7xl mx-auto px-6 py-10 text-white">
