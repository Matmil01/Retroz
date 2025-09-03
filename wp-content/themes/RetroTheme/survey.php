<?php
// Template Name: Survey Page
?>

<?php get_header() ?>

<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
    <input type="hidden" name="action" value="surveyFunction">

    <label for="firstName"><?php pll_e("First name") ?></label>
    <input type="text" id="firstName" name="first_name" required>

    <label for="lastName"><?php pll_e("Last name") ?></label>
    <input type="text" id="lastName" name="last_name" required>

    <label for="email"><?php pll_e("Email") ?></label>
    <input type="email" id="email" name="email" required>

    <label for="question1">1.<?php pll_e("Whats your age group?") ?></label>
    <input type="text" id="question1" name="question1" required>

    <label for="question2">2.<?php pll_e("Which retro gaming platforms do you enjoy the most?") ?></label>
    <input type="text" id="question2" name="question2" required>

    <label for="question3">3.<?php pll_e("What are your top 3 favorite retro video games of all time?") ?></label>
    <input type="text" id="question3" name="question3" required>

    <label for="question4">4.<?php pll_e("Which game genres do you enjoy the most?") ?></label>
    <input type="text" id="question4" name="question4" required>

    <label for="question5">5.<?php pll_e("Do you prefer original cartridges/discs, digital copies, or reproductions? Please explain why.") ?></label>
    <input type="text" id="question5" name="question5" required>

    <label for="question6">6.<?php pll_e("How important is owning the original box/manual to you?") ?></label>
    <input type="text" id="question6" name="question6" required>

    <label for="question7">7.<?php pll_e("How often do you usually purchase retro games?") ?></label>
    <input type="text" id="question7" name="question7" required>

    <label for="question8">8.<?php pll_e("Whats your typical budget range when buying retro games?") ?></label>
    <input type="text" id="question8" name="question8" required>

    <label for="question9">9.<?php pll_e("Where do you usually buy your retro games?") ?></label>
    <input type="text" id="question9" name="question9" required>

    <label for="question10">10.<?php pll_e("What retro games would you love to see available in our webshop?") ?></label>
    <input type="text" id="question10" name="question10" required>

    <input type="submit" value="send">
</form>

<?php get_footer() ?>