<?php

// Template Name: Testimonials Adder Page
?>

<?php get_header(); ?>

<div class="container mx-auto px-4 py-8">
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="space-y-6 max-w-lg mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
        <input type="hidden" name="action" value="testimonialsFunction">

        <div>
            <label for="firstName" class="block text-sm font-medium text-gray-700"><?php pll_e("First name"); ?></label>
            <input type="text" id="firstName" name="first_name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="lastName" class="block text-sm font-medium text-gray-700"><?php pll_e("Last name"); ?></label>
            <input type="text" id="lastName" name="last_name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="brodtekst" class="block text-sm font-medium text-gray-700">tekst</label>
            <input type="text" id="brodtekst" name="brodtekst" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="profilbillede" class="block text-sm font-medium text-gray-700">pfp</label>
            <input type="file" id="profilbillede" name="profilbillede" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <input type="submit" value="Send" class="w-full bg-[#6C619E] text-white py-2 px-4 rounded-md shadow hover:bg-[#4D4284] focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer">
        </div>
    </form>
</div>

<?php get_footer(); ?>