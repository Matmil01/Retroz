<?php

// Template Name: Survey Page
?>

<?php get_header(); ?>

<div class="container mx-auto px-4 py-8">
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="space-y-6 max-w-lg mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
        <input type="hidden" name="action" value="surveyFunction">
        <?php wp_nonce_field( 'submit_survey', 'survey_nonce' ); ?>

        <div>
            <label for="firstName" class="block text-sm font-medium text-gray-700"><?php pll_e("First name"); ?></label>
            <input type="text" id="firstName" name="first_name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="lastName" class="block text-sm font-medium text-gray-700"><?php pll_e("Last name"); ?></label>
            <input type="text" id="lastName" name="last_name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700"><?php pll_e("Email"); ?></label>
            <input type="email" id="email" name="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="question1" class="block text-sm font-medium text-gray-700">1. <?php pll_e("Whats your age group?"); ?></label>
            <input type="text" id="question1" name="question1" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="question2" class="block text-sm font-medium text-gray-700">2. <?php pll_e("Which retro gaming platforms do you enjoy the most?"); ?></label>
            <input type="text" id="question2" name="question2" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="question3" class="block text-sm font-medium text-gray-700">3. <?php pll_e("What are your top 3 favorite retro video games of all time?"); ?></label>
            <input type="text" id="question3" name="question3" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="question4" class="block text-sm font-medium text-gray-700">4. <?php pll_e("Which game genres do you enjoy the most?"); ?></label>
            <input type="text" id="question4" name="question4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="question5" class="block text-sm font-medium text-gray-700">5. <?php pll_e("Do you prefer original cartridges/discs, digital copies, or reproductions? Please explain why."); ?></label>
            <input type="text" id="question5" name="question5" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="question6" class="block text-sm font-medium text-gray-700">6. <?php pll_e("How important is owning the original box/manual to you?"); ?></label>
            <input type="text" id="question6" name="question6" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>  

        <div>
            <label for="question7" class="block text-sm font-medium text-gray-700">7. <?php pll_e("How often do you usually purchase retro games?"); ?></label>
            <input type="text" id="question7" name="question7" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="question8" class="block text-sm font-medium text-gray-700">8. <?php pll_e("Whats your typical budget range when buying retro games?"); ?></label>
            <input type="text" id="question8" name="question8" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="question9" class="block text-sm font-medium text-gray-700">9. <?php pll_e("Where do you usually buy your retro games?"); ?></label>
            <input type="text" id="question9" name="question9" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="question10" class="block text-sm font-medium text-gray-700">10. <?php pll_e("What retro games would you love to see available in our webshop?"); ?></label>
            <input type="text" id="question10" name="question10" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700"><?php pll_e("Topics"); ?>:</label>
            <div class="mt-2 flex flex-wrap gap-4">
                <?php
                $topics = get_posts(['post_type' => 'topic', 'numberposts' => -1]);
                foreach ($topics as $topic) : ?>
                    <label class="inline-flex items-center text-gray-700 cursor-pointer">
                        <input type="checkbox" name="topics[]" value="<?php echo esc_attr($topic->ID); ?>" class="mr-2 cursor-pointer">
                        <?php echo esc_html($topic->post_title); ?>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div>
            <input type="submit" value="Send" class="w-full bg-[#6C619E] text-white py-2 px-4 rounded-md shadow hover:bg-[#4D4284] focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer">
        </div>
    </form>
</div>

<?php get_footer(); ?>