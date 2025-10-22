<?php
function demo_load_stylesheet() {
	wp_enqueue_style("main", get_template_directory_uri() . "/style.css");
}
add_action("wp_enqueue_scripts", "demo_load_stylesheet");
add_filter('use_block_editor_for_post', '__return_false', 10);
function demo_theme_setup() {
	// Title tag function
	add_theme_support( 'title-tag' );

	// Add support for featured images (thumbnails)
	add_theme_support( 'post-thumbnails' );

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
	$topics = isset($_REQUEST["topics"]) ? array_map('intval', $_REQUEST["topics"]) : [];


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
	update_field("topics", $topics, $surveytaker); 
	
	wp_mail($email, $subject, $message);
	wp_redirect(get_permalink(get_page_by_path("thank-you")));
	exit;
}
add_action("admin_post_surveyFunction", "surveyFunction");
add_action("admin_post_nopriv_surveyFunction", "surveyFunction");

function pll_register_strings() {
    pll_register_string("Polylang survey","First name");
	pll_register_string("Polylang survey","Last name");
	pll_register_string("Polylang survey","Email");
	pll_register_string("Polylang survey","Whats your age group?");
	pll_register_string("Polylang survey","Which retro gaming platforms do you enjoy the most?");
	pll_register_string("Polylang survey","What are your top 3 favorite retro video games of all time?");
	pll_register_string("Polylang survey","Which game genres do you enjoy the most?");
	pll_register_string("Polylang survey","Do you prefer original cartridges/discs, digital copies, or reproductions? Please explain why.");
	pll_register_string("Polylang survey","How important is owning the original box/manual to you?");
	pll_register_string("Polylang survey","How often do you usually purchase retro games?");
	pll_register_string("Polylang survey","Whats your typical budget range when buying retro games?");
	pll_register_string("Polylang survey","Where do you usually buy your retro games?");
	pll_register_string("Polylang survey","What retro games would you love to see available in our webshop?");
	pll_register_string("Polylang","Text");
	pll_register_string("Polylang","Profile Picture");
	pll_register_string("Polylang","Topics");

	    // Register topic titles for translation
    $topics = get_posts(['post_type' => 'topic', 'numberposts' => -1]);
    foreach ($topics as $topic) {
        pll_register_string("Topics", $topic->post_title);
    }

}

add_action("init", "pll_register_strings");

// Handle testimonial submissions from the frontend
add_action( 'admin_post_testimonialsFunction', 'retro_handle_testimonial_submission' );
add_action( 'admin_post_nopriv_testimonialsFunction', 'retro_handle_testimonial_submission_nopriv' );

function retro_handle_testimonial_submission_nopriv() {
	// Guests are not allowed to submit — stop here per requirement
	wp_die( sprintf(
		/* translators: %s: registration url */
		__( 'You must be logged in to submit a testimonial. <a href="%s">Register here</a>.' ),
		esc_url( wp_registration_url() )
	) );
}

function retro_handle_testimonial_submission() {
	if ( ! is_user_logged_in() ) {
		// double-check on server side
		wp_die( sprintf(
			__( 'You must be logged in to submit a testimonial. <a href="%s">Register here</a>.' ),
			esc_url( wp_registration_url() )
		) );
	}

	// Verify nonce
	if ( empty( $_POST['testimonial_nonce'] ) || ! wp_verify_nonce( $_POST['testimonial_nonce'], 'submit_testimonial' ) ) {
		wp_die( 'Security check failed. Please go back and try again.' );
	}

	$current_user_id = get_current_user_id();

	$first = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
	$last  = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
	$content = isset( $_POST['brodtekst'] ) ? sanitize_textarea_field( wp_unslash( $_POST['brodtekst'] ) ) : '';

	$title = trim( $first . ' ' . $last );
	if ( empty( $title ) ) {
		$title = 'Testimonial from user #' . $current_user_id;
	}

	$post_data = array(
		'post_title'   => $title,
		'post_content' => $content,
		'post_status'  => 'pending',
		'post_author'  => $current_user_id,
		'post_type'    => 'testimonial',
	);

	$post_id = wp_insert_post( $post_data );

	if ( is_wp_error( $post_id ) || ! $post_id ) {
		wp_die( 'There was an error saving your testimonial. Please try again.' );
	}

	// Save submitted values into post meta so they show in WP (and also update ACF if present)
	update_post_meta( $post_id, 'first_name', $first );
	update_post_meta( $post_id, 'last_name', $last );
	update_post_meta( $post_id, 'brodtekst', $content );

	if ( function_exists( 'update_field' ) ) {
		// Use ACF's update_field when available (field name or key)
		update_field( 'first_name', $first, $post_id );
		update_field( 'last_name', $last, $post_id );
		update_field( 'brodtekst', $content, $post_id );
	}

	// Handle file upload (profilbillede)
	if ( ! empty( $_FILES['profilbillede']['name'] ) ) {
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/media.php';
		require_once ABSPATH . 'wp-admin/includes/image.php';

		// Allow upload even if form did not submit from admin (test_form => false)
		$overrides = array( 'test_form' => false );

		$uploaded_file = wp_handle_upload( $_FILES['profilbillede'], $overrides );

		if ( isset( $uploaded_file['file'] ) ) {
			$filename = $uploaded_file['file'];
			$filetype = wp_check_filetype( basename( $filename ), null );

			$attachment = array(
				'post_mime_type' => $filetype['type'],
				'post_title'     => sanitize_file_name( basename( $filename ) ),
				'post_content'   => '',
				'post_status'    => 'inherit'
			);

			$attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
			if ( ! is_wp_error( $attach_id ) ) {
				$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
				wp_update_attachment_metadata( $attach_id, $attach_data );

				// Set as featured image if supported
				if ( function_exists( 'set_post_thumbnail' ) ) {
					set_post_thumbnail( $post_id, $attach_id );
				}

				// Save attachment ID to post meta and ACF image field (if used)
				update_post_meta( $post_id, 'profilbillede', $attach_id );
				if ( function_exists( 'update_field' ) ) {
					update_field( 'profilbillede', $attach_id, $post_id );
				}
			}
		}
	}

	// Redirect back to referrer (or home) with a query var indicating success
	$redirect = wp_get_referer() ? wp_get_referer() : home_url();
	$redirect = add_query_arg( 'testimonial_submitted', '1', $redirect );
	wp_safe_redirect( $redirect );
	exit;
}

function retro_enable_woo() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'retro_enable_woo' );