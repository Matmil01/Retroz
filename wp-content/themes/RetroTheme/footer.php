</main> <!-- Close the main content area that was opened in header.php -->

<footer class="w-full py-8">
    <div class="max-w-6xl mx-auto px-6 flex items-center justify-between font-main text-white">
        <p>© <?php echo date('Y'); ?> Team Skærebært</p>
        <a href="http://thememorycard.matmil.dk/wp-content/uploads/2025/10/infograf-password.pdf" class="text-white">Password Helper</a>
        <div class="flex items-center gap-10">
            <a href="https://theuselessweb.com" target="_blank" rel="noopener" class="w-5 h-5 cursor-pointer" alt="The Useless Web">
                <span>
                    <?php echo file_get_contents(get_template_directory() . '/icons/instagram.svg'); ?>
                </span>
            </a>
            <a href="https://theuselessweb.com" target="_blank" rel="noopener" class="w-5 h-5 cursor-pointer" alt="The Useless Web">
                <span>
                    <?php echo file_get_contents(get_template_directory() . '/icons/tiktok.svg'); ?>
                </span>
            </a>
            <a href="https://theuselessweb.com" target="_blank" rel="noopener" class="w-5 h-5 cursor-pointer" alt="The Useless Web">
                <span>
                    <?php echo file_get_contents(get_template_directory() . '/icons/youtube.svg'); ?>
                </span>
            </a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>