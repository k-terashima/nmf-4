<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>


<div id="wc_<?php usces_page_name(); ?>">


	<div class="container">
		<section>
			<div class="row">
				<div class="col offset-s2 s8">
					<?php if (have_posts()) : usces_remove_filter(); ?>
					<h1 class="member_page_title"><?php _e('Log-in for members', 'usces'); ?></h1>
					<div class="header_explanation">
						<?php do_action('usces_action_login_page_header'); ?>
					</div>
					<div class="error_message"><?php usces_error_message(); ?></div>


					<form name="loginform" id="loginform" action="<?php echo apply_filters('usces_filter_login_form_action', USCES_MEMBER_URL); ?>" method="post">
						<div class="input-field">
							<label for="loginmail"><?php _e('e-mail adress', 'usces'); ?></label>
							<input type="text" name="loginmail" id="loginmail" class="loginmail" value="<?php echo esc_attr(usces_remembername('return')); ?>" size="20" />
						</div>
						<div class="input-field">
							<label for="loginpass"><?php _e('password', 'usces'); ?></label>
							<input class="hidden" value=" " />
							<input type="password" name="loginpass" id="loginpass" class="loginpass" size="20" autocomplete="off" />
						</div>
						<div class="input-field">
							<input name="rememberme" type="checkbox" id="rememberme" value="forever" />
							<label for="rememberme"><?php _e('memorize login information', 'usces'); ?></label>
						</div>
						<div id="button-change" class="row">
							<?php usces_login_button(); ?>
						</div>
						<?php do_action('usces_action_login_page_inform'); ?>
					</form>

					<div class="row">
						<div class="col s6">
							<a href="<?php usces_url('lostmemberpassword'); ?>" title="<?php _e('Did you forget your password?', 'usces'); ?>"><?php _e('Did you forget your password?', 'usces'); ?></a>
						</div>
						<div class="col s6">
							<?php if ( ! usces_is_login() ) : ?>
								<a href="<?php usces_url('newmember') . apply_filters('usces_filter_newmember_urlquery', NULL); ?>" title="<?php _e('New enrollment for membership.', 'usces'); ?>"><?php _e('New enrollment for membership.', 'usces'); ?></a>
							<?php endif; ?>
						</div>
					</div>

					<div class="footer_explanation">
						<?php do_action('usces_action_login_page_footer'); ?>
					</div>

					<?php else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>

				</div>
			</div>

		</section>
	</div>

	<script>
	<?php if ( usces_is_login() ) : ?>
		setTimeout( function(){ try{
		d = document.getElementById('loginpass');
		d.value = '';
		d.focus();
		} catch(e){}
		}, 200);
	<?php else : ?>
		try{document.getElementById('loginmail').focus();}catch(e){}
	<?php endif; ?>
	</script>
</div>

<?php get_footer(); ?>
