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
    <span class="logo-icon w-17 h-17 inline-flex items-center justify-center mt-2">
        <?php
        // Memory Karl
        echo file_get_contents(get_template_directory() . '/icons/MemoryKarl.svg');
        ?>
    </span>
    <h1 class="logo-text font-headline text-4xl text-white">
        <?php echo esc_html( get_bloginfo('name') ); ?>
    </h1> 
</a>

        <!-- Hamburger menu button (mobile only) -->
        <button id="nav-toggle" class="lg:hidden flex items-center px-2 py-1 border rounded text-white ml-auto" aria-label="Toggle menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <nav class="hidden lg:flex font-main text-white" aria-label="<?php esc_attr_e('Primary menu','retro'); ?>">
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
            <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="inline-flex items-center justify-center w-8 h-8">
                <img src="<?php echo get_template_directory_uri(); ?>/icons/pixel-account.svg" alt="My Account" class="w-8 h-8" />
            </a>
            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="inline-flex items-center justify-center w-8 h-8">
                <img src="<?php echo get_template_directory_uri(); ?>/icons/pixel-cart.svg" alt="Cart" class="w-8 h-8" />
            </a>

            <!-- Midlertidig spacer -->
            <span style="width:2rem;display:inline-block;"></span>

            <?php if ( function_exists('pll_the_languages') ) {
                $languages = pll_the_languages(array(
                    'show_flags'    => 0,
                    'show_names'    => 1,
                    'hide_if_empty' => 0,
                    'raw'           => 1
                ));
                
                if ($languages) {
                    foreach ($languages as $code => $language) {
                        $svg_file = $code === 'en' ? 'toggle_eng.svg' : 'toggle_dk.svg';
                        echo '<a href="' . esc_url($language['url']) . '" class="cursor-pointer">';
                        echo '<img src="' . get_template_directory_uri() . '/icons/' . $svg_file . '" alt="' . esc_attr($language['name']) . ' language" class="w-7 h-7">';
                        echo '</a>';
                    }
                }
            } ?>
        </div>

    </div>

    <!-- Mobile dropdown menu (outside the flex row, under navbar) -->
    <nav id="nav-menu" class="lg:hidden w-full bg-[#4D4284] text-white font-main hidden">
        <?php
        if ( has_nav_menu('primary') ) {
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'flex flex-col gap-4 list-none m-0 p-0 font-main text-white',
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                'fallback_cb'    => false,
                'link_before'    => '<span class="tracking-wide font-main text-white">',
                'link_after'     => '</span>',
            ) );
        } else {
            echo '<ul class="flex flex-col gap-4 list-none m-0 p-0 font-main text-white">';
            wp_list_pages( array( 'title_li' => '' ) );
            echo '</ul>';
        }
        ?>
    </nav>
</header>
<main id="site-content" class="max-w-7xl mx-auto px-6 py-10 text-white">

<script>
document.addEventListener('DOMContentLoaded', function() {
    var navToggle = document.getElementById('nav-toggle');
    var navMenu = document.getElementById('nav-menu');
    navToggle.addEventListener('click', function() {
        navMenu.classList.toggle('hidden');
    });
});
</script>
