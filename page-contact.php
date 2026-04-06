<?php
/**
 * Template Name: Contact Page
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Handle form submission
$form_submitted = false;
$form_error     = false;

if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['factor2_contact_nonce'] ) ) {
	if ( wp_verify_nonce( $_POST['factor2_contact_nonce'], 'factor2_contact_submit' ) ) {
		$name    = sanitize_text_field( $_POST['contact_name'] ?? '' );
		$mobile  = sanitize_text_field( $_POST['contact_mobile'] ?? '' );
		$email   = sanitize_email( $_POST['contact_email'] ?? '' );
		$message = sanitize_textarea_field( $_POST['contact_message'] ?? '' );

		if ( ! empty( $name ) && ! empty( $email ) && ! empty( $message ) ) {
			$to      = get_theme_mod( 'f2_contact_email', get_option( 'admin_email' ) );
			$subject = sprintf( '[%s] New Contact: %s', get_bloginfo( 'name' ), $name );
			$body    = "Name: $name\n";
			$body   .= "Mobile: $mobile\n";
			$body   .= "Email: $email\n\n";
			$body   .= "Message:\n$message";
			$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

			$sent = wp_mail( $to, $subject, $body, $headers );
			$form_submitted = $sent;
			$form_error     = ! $sent;
		} else {
			$form_error = true;
		}
	} else {
		$form_error = true;
	}
}
?>
<main id="main" class="site-main">
	
	<!-- Contact Section -->
	<section class="section contact-section">
		<div class="container">
			<div class="contact-grid">
				
				<!-- Left Column: Copy -->
				<div class="contact-copy">
					<h1 class="contact-heading">
						<?php 
						$contact_title = get_theme_mod('f2_contact_title', "Ready to build something\namazing?");
						echo nl2br(esc_html($contact_title)); 
						?>
					</h1>
					<p class="contact-subtitle">
						<?php echo esc_html(get_theme_mod('f2_contact_subtitle', "Whether you're a Business or Startup, we'd love to hear from you.")); ?>
					</p>
					<p class="contact-description">
						<?php 
						$contact_desc = get_theme_mod('f2_contact_description', "Send us an email or simply send us a few details.\nWe're here to answer your questions →");
						echo nl2br(esc_html($contact_desc)); 
						?>
					</p>

					<div class="contact-methods">
						<div class="contact-method">
							<h4><?php esc_html_e( 'Email Us', 'factor-2' ); ?></h4>
							<?php $contact_email = get_theme_mod( 'f2_contact_email', get_option( 'admin_email' ) ); ?>
							<a href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a>
						</div>
						<div class="contact-method">
							<h4><?php esc_html_e( 'Call Us', 'factor-2' ); ?></h4>
							<a href="tel:<?php echo esc_attr( get_theme_mod( 'f2_contact_phone', '123456789' ) ); ?>"><?php echo esc_html( get_theme_mod( 'f2_contact_phone', '123456789' ) ); ?></a>
						</div>
					</div>
				</div>

				<!-- Right Column: Form -->
				<div class="contact-form-container">
					<?php if ( $form_submitted ) : ?>
						<div class="contact-form-success">
							<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
							<h3><?php esc_html_e( 'Message Sent!', 'factor-2' ); ?></h3>
							<p><?php esc_html_e( 'Thank you for reaching out. We\'ll get back to you within 24 hours.', 'factor-2' ); ?></p>
						</div>
					<?php else : ?>
						<?php if ( $form_error ) : ?>
							<div class="contact-form-error">
								<p><?php esc_html_e( 'Something went wrong. Please check your details and try again.', 'factor-2' ); ?></p>
							</div>
						<?php endif; ?>

						<form class="contact-form" action="<?php echo esc_url( get_permalink() ); ?>" method="POST">
							<?php wp_nonce_field( 'factor2_contact_submit', 'factor2_contact_nonce' ); ?>
							
							<div class="form-group">
								<label for="contact-name" class="screen-reader-text"><?php esc_html_e( 'Name', 'factor-2' ); ?></label>
								<input type="text" id="contact-name" name="contact_name" placeholder="<?php esc_attr_e( 'Name*', 'factor-2' ); ?>" required>
							</div>
							<div class="form-group">
								<label for="contact-mobile" class="screen-reader-text"><?php esc_html_e( 'Mobile', 'factor-2' ); ?></label>
								<input type="tel" id="contact-mobile" name="contact_mobile" placeholder="<?php esc_attr_e( 'Mobile', 'factor-2' ); ?>">
							</div>
							<div class="form-group">
								<label for="contact-email" class="screen-reader-text"><?php esc_html_e( 'Email', 'factor-2' ); ?></label>
								<input type="email" id="contact-email" name="contact_email" placeholder="<?php esc_attr_e( 'Email*', 'factor-2' ); ?>" required>
							</div>
							<div class="form-group">
								<label for="contact-message" class="screen-reader-text"><?php esc_html_e( 'Message', 'factor-2' ); ?></label>
								<textarea id="contact-message" name="contact_message" placeholder="<?php esc_attr_e( 'Message*', 'factor-2' ); ?>" rows="5" required></textarea>
							</div>
							
							<button type="submit" class="contact-submit-btn button-link button-link--primary">
								<?php esc_html_e( 'Submit Message', 'factor-2' ); ?>
							</button>

							<p class="form-disclaimer">
								<?php esc_html_e( 'This site is protected by reCAPTCHA and the Google', 'factor-2' ); ?> <a href="#"><?php esc_html_e( 'Privacy Policy', 'factor-2' ); ?></a> <?php esc_html_e( 'and', 'factor-2' ); ?> <a href="#"><?php esc_html_e( 'Terms of Service', 'factor-2' ); ?></a> <?php esc_html_e( 'apply.', 'factor-2' ); ?>
							</p>
						</form>
					<?php endif; ?>
				</div>

			</div>
			
		</div>
	</section>

</main>
<?php
get_footer();
