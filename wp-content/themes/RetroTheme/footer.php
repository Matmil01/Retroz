<footer class="w-full border-t border-black">
    <?php if ( is_active_sidebar( 'footer-a' ) || is_active_sidebar( 'footer-b' ) ) : ?>
        <div class="footer-widgets group flex flex-row flex-wrap gap-10 items-start">
            <?php if ( is_active_sidebar( 'footer-a' ) ) : ?>
                <div class="column column-1 left flex-1 min-w-[240px]">
                    <?php dynamic_sidebar( 'footer-a' ); ?>
                </div>
            <?php endif; ?>
            <?php if ( is_active_sidebar( 'footer-b' ) ) : ?>
                <div class="column column-2 left flex-1 min-w-[240px]">
                    <?php dynamic_sidebar( 'footer-b' ); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="credits flex flex-row flex-wrap items-center gap-6 mt-8">
        <p class="credits-left m-0">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></p>
        <p class="credits-right m-0 flex items-center gap-2">
            <span><?php printf( __( 'Theme by %s', 'wilson'), '<a href="https://andersnoren.se">Anders Nor&eacute;n</a>' ); ?></span>
            <a class="tothetop uppercase tracking-wide text-xs" href="#site-header"><?php _e( 'Up', 'wilson' ); ?> &uarr;</a>
        </p>
    </div>
</footer>

</main>
</div>
<?php wp_footer(); ?>
</body>
</html>