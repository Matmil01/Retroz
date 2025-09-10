</main> <!-- Close the main content area that was opened in header.php -->

<footer class="w-full py-8">
    <div class="max-w-6xl mx-auto px-6 flex items-center justify-between font-main text-white">
        <p>© <?php echo date('Y'); ?> Team Skærebært</p>
        <div class="flex items-center gap-8">
            <a href="https://instagram.com" target="_blank" rel="noopener" class="w-8 h-8">
                <?php echo file_get_contents(get_template_directory() . '/icons/instagram.svg'); ?>
            </a>
            <a href="https://tiktok.com" target="_blank" rel="noopener" class="w-8 h-8">
                <?php echo file_get_contents(get_template_directory() . '/icons/tiktok.svg'); ?>
            </a>
            <a href="https://youtube.com" target="_blank" rel="noopener" class="w-8 h-8">
                <?php echo file_get_contents(get_template_directory() . '/icons/youtube.svg'); ?>
            </a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>