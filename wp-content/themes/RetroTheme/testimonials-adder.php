<?php

// Template Name: Testimonials Adder Page
?>

<?php get_header(); ?>

<div class="container mx-auto px-4 py-8">
	<?php if ( is_user_logged_in() ) : ?>
		<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6 max-w-lg mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
			<input type="hidden" name="action" value="testimonialsFunction">
			<?php wp_nonce_field('submit_testimonial', 'testimonial_nonce'); ?>

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
	<?php else : ?>
		<div class="max-w-lg mx-auto p-6 bg-yellow-50 rounded-lg shadow-md text-center">
			<p class="mb-4"><?php esc_html_e( 'You must be logged in to submit a testimonial.' ); ?></p>
			<p>
				<a class="inline-block px-4 py-2 bg-[#6C619E] text-white rounded" href="<?php echo esc_url( wp_registration_url() ); ?>">
					<?php esc_html_e( 'Register' ); ?>
				</a>
				<a class="inline-block px-4 py-2 ml-2 border rounded" href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>">
					<?php esc_html_e( 'Log in' ); ?>
				</a>
			</p>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>