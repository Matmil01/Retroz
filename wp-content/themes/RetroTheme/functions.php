<?php
function demo_load_stylesheet() {
	wp_enqueue_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css");
	wp_enqueue_style("main", get_template_directory_uri() . "/style.css");
}
add_action("wp_enqueue_scripts", "demo_load_stylesheet");

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