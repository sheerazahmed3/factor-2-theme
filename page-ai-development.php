<?php
/**
 * Template Name: Service - AI Development
 *
 * @package Factor_2
 */

$content = factor_2_get_ai_content();

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
			$to      = get_theme_mod( 'f2_ai_contact_email', 'hello@factorlabs.com' );
			$subject = sprintf( '[%s] New AI Inquiry: %s', get_bloginfo( 'name' ), $name );
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

get_header();
?>

<main class="site-main ai-development-page">
	<!-- Hero Banner Wrapper -->
	<div class="hero-banner">
		<!-- Hero Section -->
		<section class="hero hero--service" <?php echo ! empty( $content['hero_bg'] ) ? 'style="background-image: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), url(' . esc_url( $content['hero_bg'] ) . '); background-size: cover; background-position: center;"' : ''; ?>>
			<div class="hero__copy">
				<p class="eyebrow"><?php echo esc_html( $content['hero_badge'] ); ?></p>
				<h1><?php echo esc_html( $content['hero_title'] ); ?></h1>
				
				<!-- Text Rotator - Swipe/Slide Style -->
				<div class="hero__rotator" style="margin: 3rem 0 3.5rem; opacity: 0.9; text-align: center;">
					<span style="font-size: var(--rotator-prefix-size);"><?php echo esc_html( $content['hero_copy'] ); ?></span> 
					<?php 
					$phrases = array_map('trim', explode(',', $content['rotating_phrases']));
					?>
					<span class="text-rotator" id="ai-service-rotator">
						<span class="text-rotator__list">
							<?php foreach ($phrases as $phrase): ?>
								<span class="text-rotator__item"><?php echo esc_html($phrase); ?></span>
							<?php endforeach; ?>
							<!-- Duplicate first item for infinite loop -->
							<span class="text-rotator__item"><?php echo esc_html($phrases[0]); ?></span>
						</span>
					</span>
				</div>

				<div class="hero__actions">
					<a class="button-link button-link--primary" href="#contact-section"><?php echo esc_html( $content['hero_cta'] ); ?></a>
				</div>
			</div>
		</section>
	</div>

	
	<!-- Our Offerings Section -->
	<?php if ( ! empty( $content['offerings_items'] ) ) : ?>
	<?php
	$offers      = array();
	foreach ( $content['offerings_items'] as $offering ) {
		$clean = static function ( $text ) {
			return rtrim( trim( (string) $text ), " -\xE2\x80\x93\xE2\x80\x94" );
		};
		$label = $clean( ! empty( $offering['label'] ) ? $offering['label'] : $offering['title'] );
		$title = $clean( ! empty( $offering['title'] ) ? $offering['title'] : $offering['label'] );
		if ( '' === $label && '' === $title ) {
			continue;
		}
		$desc = preg_replace( '/\.{2,}$/', '.', trim( (string) $offering['desc'] ) );
		if ( '' === $desc || 0 === strcasecmp( $desc, $title ) ) {
			/* translators: %s: service name */
			$desc = sprintf( __( 'Talk to our team about %s for your business.', 'factor-2' ), $title ? $title : $label );
		}
		$link_text = $clean( ! empty( $offering['link_text'] ) ? $offering['link_text'] : '' );
		$offers[]  = array(
			'label' => $label ? $label : $title,
			'title' => $title ? $title : $label,
			'desc'  => $desc,
			'url'   => factor_2_ai_offering_url( isset( $offering['url'] ) ? $offering['url'] : '' ),
			'link'  => $link_text ? $link_text : __( 'Get in touch', 'factor-2' ),
		);
	}
	$offers_total = count( $offers );
	?>
	<section class="section offerings-section ai-offers" id="offerings">
		<div class="container">
			<div class="ai-offers__grid">

				<!-- Service list -->
				<div class="ai-offers__nav">
					<h2 class="ai-offers__title"><?php echo esc_html( $content['offerings_title'] ); ?></h2>
					<ul class="offerings-list" role="tablist" aria-label="<?php echo esc_attr( $content['offerings_title'] ); ?>">
						<?php foreach ( $offers as $index => $offer ) : ?>
							<li class="offering-item<?php echo 0 === $index ? ' active' : ''; ?>" data-index="<?php echo (int) $index; ?>" role="presentation">
								<button type="button" class="offering-link" role="tab" id="offering-tab-<?php echo (int) $index; ?>" aria-controls="offering-pane-<?php echo (int) $index; ?>" aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>">
									<span class="offering-label-text"><?php echo esc_html( $offer['label'] ); ?></span>
									<span class="offering-arrow" aria-hidden="true">&rarr;</span>
								</button>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<!-- Selected service card -->
				<div class="ai-offers__card">
					<?php foreach ( $offers as $index => $offer ) : ?>
						<div class="offering-pane<?php echo 0 === $index ? ' active' : ''; ?>" id="offering-pane-<?php echo (int) $index; ?>" role="tabpanel" aria-labelledby="offering-tab-<?php echo (int) $index; ?>">
							<div class="ai-offers__card-top">
								<span class="ai-offers__icon" aria-hidden="true"><?php echo factor_2_ai_icon_svg( $offer['title'], 24 ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
								<span class="ai-offers__count"><?php echo esc_html( sprintf( '%02d / %02d', $index + 1, $offers_total ) ); ?></span>
							</div>
							<h3><?php echo esc_html( $offer['title'] ); ?></h3>
							<p><?php echo esc_html( $offer['desc'] ); ?></p>
							<a href="<?php echo esc_url( $offer['url'] ); ?>" class="ai-offers__cta">
								<span><?php echo esc_html( $offer['link'] ); ?></span>
								<span aria-hidden="true">&rarr;</span>
							</a>
						</div>
					<?php endforeach; ?>
				</div>

			</div>
		</div>
	</section>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const items = document.querySelectorAll('.ai-offers .offering-item');
			const panes = document.querySelectorAll('.ai-offers .offering-pane');
			if (items.length === 0) return;

			function select(index) {
				items.forEach(function(i) {
					const on = i.getAttribute('data-index') === String(index);
					i.classList.toggle('active', on);
					i.querySelector('.offering-link').setAttribute('aria-selected', on ? 'true' : 'false');
				});
				panes.forEach(function(p) {
					p.classList.toggle('active', p.id === 'offering-pane-' + index);
				});
			}

			items.forEach(function(item) {
				item.querySelector('.offering-link').addEventListener('click', function() {
					select(item.getAttribute('data-index'));
					// On phones the tabs scroll sideways: keep the chosen one in view
					if (window.innerWidth <= 900) {
						item.scrollIntoView({ inline: 'center', block: 'nearest', behavior: 'smooth' });
					}
				});
			});
		});
	</script>
	<?php endif; ?>

	<!-- Contact Section -->
	<section class="section contact-section" id="contact-section">
		<div class="container">
			<div class="contact-grid">
				
				<!-- Left Column: Copy -->
				<div class="contact-copy">
					<h1 class="contact-heading">
						<?php echo nl2br( esc_html( $content['contact_title'] ) ); ?>
					</h1>
					<p class="contact-subtitle">
						<?php echo esc_html( $content['contact_subtitle'] ); ?>
					</p>
					<p class="contact-description">
						<?php echo nl2br( esc_html( $content['contact_desc'] ) ); ?>
					</p>

					<div class="contact-methods">
						<div class="contact-method">
							<h4><?php esc_html_e( 'Email Us', 'factor-2' ); ?></h4>
							<a href="mailto:<?php echo esc_attr( $content['contact_email'] ); ?>"><?php echo esc_html( $content['contact_email'] ); ?></a>
						</div>
						<div class="contact-method">
							<h4><?php esc_html_e( 'Call Us', 'factor-2' ); ?></h4>
							<a href="tel:<?php echo esc_attr( $content['contact_phone'] ); ?>"><?php echo esc_html( $content['contact_phone'] ); ?></a>
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

						<form class="contact-form" action="#contact-section" method="POST">
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

	<style>
		.contact-section .container {
			max-width: 750px !important;
		}
		.contact-section .contact-grid {
			gap: 2rem;
		}
		.contact-section .contact-heading {
			font-size: 1.65rem;
			margin-bottom: 1rem;
		}
		.contact-section .contact-subtitle {
			font-size: 0.8rem;
			margin-bottom: 1rem;
		}
		.contact-section .contact-description {
			font-size: 0.75rem;
		}
		.contact-section .contact-methods {
			margin-top: 1.5rem;
			gap: 2rem;
		}
		.contact-section .contact-method h4 {
			font-size: 0.75rem;
		}
		.contact-section .contact-method a {
			font-size: 0.75rem;
		}
		.contact-section .contact-form .form-group input,
		.contact-section .contact-form .form-group textarea {
			padding: 0.5rem 0.85rem;
			font-size: 0.75rem;
		}
		.contact-section .contact-form .form-group:nth-child(4) {
			margin-top: 0.5rem;
		}
		.contact-section .contact-submit-btn {
			padding: 0.5rem 1.15rem;
			font-size: 0.75rem;
		}
	</style>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const rotator = document.querySelector('#ai-service-rotator .text-rotator__list');
		if (!rotator) return;

		const items = rotator.querySelectorAll('.text-rotator__item');
		const count = items.length - 1; 
		let index = 0;

		function rotate() {
			index++;
			rotator.style.transition = 'transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
			rotator.style.transform = `translateY(-${index * 1.4}em)`;

			if (index === count) {
				setTimeout(() => {
					rotator.style.transition = 'none';
					rotator.style.transform = 'translateY(0)';
					index = 0;
				}, 600);
			}
		}

		if (window.aiServiceRotatorInterval) clearInterval(window.aiServiceRotatorInterval);
		window.aiServiceRotatorInterval = setInterval(rotate, 3000);
	});
</script>

<?php
get_footer();
