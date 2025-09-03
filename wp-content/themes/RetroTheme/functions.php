<?php
function demo_load_stylesheet() {
	wp_enqueue_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css");
	wp_enqueue_style("main", get_template_directory_uri() . "/style.css");
}
add_action("wp_enqueue_scripts", "demo_load_stylesheet");
add_filter('use_block_editor_for_post', '__return_false', 10);
function demo_theme_setup() {
	// Title tag function
	add_theme_support( 'title-tag' );

	// Add nav menu
	register_nav_menu("primary", __("Primary Menu", "mmd-demo"));
}
add_action("after_setup_theme", "demo_theme_setup");

function demo_review_form_handler() {
	$name = $_REQUEST["name"];
	$stars = $_REQUEST["stars"];
	$comment = $_REQUEST["comment"];
	$movie = $_REQUEST["movie"];

	$review = wp_insert_post(array(
		"post_type" => "review",
		"post_status" => "publish",
		"post_title" => "Review of " . get_the_title($movie)
	));
	
	update_field("movie", $movie, $review);
	update_field("name", $name, $review);
	update_field("stars", $stars, $review);
	update_field("comment", $comment, $review);
	
	wp_redirect($_SERVER["HTTP_REFERER"]);
	exit;
}
add_action("admin_post_review_form", "demo_review_form_handler");
add_action("admin_post_nopriv_review_form", "demo_review_form_handler");

function demo_change_password_handler() {
	if (!wp_verify_nonce($_POST['change_password_field'], 'change_password_action')) {
		wp_die("Security check failed");
	}
	$newPassword = $_REQUEST["new_password"];

	wp_set_password($newPassword, get_current_user_id());

	wp_redirect("/change-password/");
	exit;
}
add_action("admin_post_change_password", "demo_change_password_handler");
add_action("admin_post_nopriv_change_password", "demo_change_password_handler");


function surveyFunction() {

	$firstName = $_REQUEST["first_name"];
	$lastName = $_REQUEST["last_name"];
	$email = $_REQUEST["email"];
	$question1 = $_REQUEST["question1"];
	$question2 = $_REQUEST["question2"];
	$question3 = $_REQUEST["question3"];
	$question4 = $_REQUEST["question4"];
	$question5 = $_REQUEST["question5"];
	$question6 = $_REQUEST["question6"];
	$question7 = $_REQUEST["question7"];
	$question8 = $_REQUEST["question8"];
	$question9 = $_REQUEST["question9"];
	$question10 = $_REQUEST["question10"];


	$subject = "Thank you for taking our survey!";
	$message = "
	Hi " . $firstName . ",\n\n
	Thank you for taking our survey.
	 We're excited to spam you with emails ♫ all night long ♫.
	 \n\nBest regards,\nRetroz";

	$surveytaker = wp_insert_post(array(
		"post_type" => "survey-taker",
		"post_status" => "publish",
		"post_title" => $firstName . " " . $lastName
	));

	update_field("first_name", $firstName, $surveytaker);
	update_field("last_name", $lastName, $surveytaker);
	update_field("email", $email, $surveytaker);
	update_field("question1", $question1, $surveytaker);
	update_field("question2", $question2, $surveytaker);
	update_field("question3", $question3, $surveytaker);
	update_field("question4", $question4, $surveytaker);
	update_field("question5", $question5, $surveytaker);
	update_field("question6", $question6, $surveytaker);
	update_field("question7", $question7, $surveytaker);
	update_field("question8", $question8, $surveytaker);
	update_field("question9", $question9, $surveytaker);
	update_field("question10", $question10, $surveytaker);
	
	
	wp_mail($email, $subject, $message);
	wp_redirect(get_permalink(get_page_by_path("thank-you")));
	exit;
}
add_action("admin_post_surveyFunction", "surveyFunction");
add_action("admin_post_nopriv_surveyFunction", "surveyFunction");

