<?php get_header() ?>
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post() ?>
		
			<?php if(is_user_logged_in()): ?>
				<form action="<?php echo esc_url(admin_url("admin-post.php") ); ?>" method="POST">
					<input type="hidden" name="action" value="change_password">
					
					<label for="name">New password:</label>
					<input type="password" name="new_password" required>
					
					<input type="submit" value="Change password">
				</form>
			<?php else: ?>
				<p>Please login and then return to this page to change your password.</p>
			<?php endif; ?>
		
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer() ?>