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
				<div class="hero__rotator" style="margin: 3rem 0 3.5rem; display: flex; justify-content: center; align-items: baseline; gap: 0.4em; opacity: 0.9; width: fit-content; margin-left: auto; margin-right: auto; white-space: nowrap; flex-wrap: nowrap;">
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
	<section class="section offerings-section" style="background: var(--bg-secondary); padding: 10rem 0; color: #1e293b; position: relative; overflow: hidden;">
		<div class="container">
			<div class="offerings-grid" style="display: grid; grid-template-columns: 350px 1fr; gap: 8rem; align-items: start;">
				
				<!-- Sidebar Navigation -->
				<div class="offerings-nav">
					<h2 style="font-size: 3.3rem; margin-bottom: 4rem; font-weight: 800; color: #91c73d !important;"><?php echo esc_html($content['offerings_title']); ?></h2>
					<ul class="offerings-list" style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1.5rem;">
						<?php if (!empty($content['offerings_items'])): ?>
							<?php foreach ($content['offerings_items'] as $index => $offering): ?>
								<li class="offering-item <?php echo $index === 0 ? 'active' : ''; ?>" 
									data-index="<?php echo $index; ?>"
									style="cursor: pointer; position: relative; padding-right: 2rem; transition: all 0.3s ease;">
									<a href="javascript:void(0)" class="offering-link" style="font-size: 1.25rem; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.75rem; transition: all 0.3s ease;">
										<span class="offering-label-text"><?php echo esc_html($offering['label']); ?></span>
										<span class="offering-arrow" style="opacity: 0; transform: translateX(-10px); transition: all 0.3s ease;">→</span>
									</a>
								</li>
							<?php endforeach; ?>
						<?php endif; ?>
					</ul>
				</div>

				<!-- Content Area -->
				<div class="offerings-content-wrap" style="position: relative; min-height: 400px; border: 1px solid var(--border-light) !important; border-radius: 1.5rem; padding: 4rem; background: #f7ffe8 !important; box-shadow: var(--shadow-lg);">
					<!-- Decorative background element removed for consistency -->
					
					<?php if (!empty($content['offerings_items'])): ?>
						<?php foreach ($content['offerings_items'] as $index => $offering): ?>
							<div class="offering-pane <?php echo $index === 0 ? 'active' : ''; ?>" 
								 id="offering-pane-<?php echo $index; ?>"
								 style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>; animation: offeringFadeIn 0.5s ease forwards; z-index: 1; position: relative;">
								
								<div class="offering-grid-inner" style="display: grid; grid-template-columns: 1fr; gap: 4rem; align-items: center;">
									<div class="offering-text-side">
										<h3 style="font-size: 2.5rem; margin-bottom: 2rem; color: var(--text-primary); font-weight: 700;"><?php echo esc_html($offering['title']); ?></h3>
										<p style="font-size: 1.2rem; line-height: 1.8; color: var(--text-secondary); margin-bottom: 3.5rem; max-width: 800px;">
											<?php echo esc_html($offering['desc']); ?>
										</p>
										<a href="<?php echo esc_url($offering['url']); ?>" class="button-link" style="display: inline-flex; align-items: center; gap: 0.75rem; color: var(--text-primary); text-decoration: none; font-weight: 700; border: 2px solid #91C73D; padding: 1rem 2.5rem; border-radius: 100px; transition: all 0.3s ease; background: transparent;">
											<span><?php echo esc_html(!empty($offering['link_text']) ? $offering['link_text'] : 'Learn More'); ?></span>
											<span style="font-size: 1.2rem;">→</span>
										</a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</section>

	<style>
		@keyframes offeringFadeIn {
			from { opacity: 0; transform: translateY(20px); }
			to { opacity: 1; transform: translateY(0); }
		}

		.offering-item.active .offering-link {
			color: #91C73D !important;
		}
		
		.offering-item.active .offering-arrow {
			opacity: 1 !important;
			transform: translateX(0) !important;
			color: #91C73D;
		}

		.offering-item:hover .offering-link {
			color: var(--text-primary) !important;
		}

		.offering-item .offering-link {
			border-bottom: 3px solid transparent;
			padding-bottom: 0.5rem;
			display: inline-block;
			color: var(--text-secondary);
		}

		.offering-item.active .offering-link {
			color: #91C73D !important;
			border-bottom-color: #91C73D;
		}

		.offerings-section .button-link:hover {
			background: #91C73D;
			border-color: #91C73D !important;
			color: #fff !important;
		}

		@media (max-width: 1024px) {
			.offerings-grid {
				grid-template-columns: 1fr !important;
				gap: 4rem !important;
			}
			.offerings-nav h2 {
				text-align: center;
			}
			.offerings-list {
				flex-direction: row !important;
				flex-wrap: wrap;
				justify-content: center;
				gap: 1rem !important;
			}
			.offering-item {
				padding-right: 0 !important;
			}
			.offering-arrow {
				display: none !important;
			}
			.offering-grid-inner {
				grid-template-columns: 1fr !important;
				gap: 3rem !important;
				text-align: center;
			}
			.offering-text-side p {
				margin-left: auto;
				margin-right: auto;
			}
			.offering-image-side {
				order: -1;
			}
		}
	</style>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const items = document.querySelectorAll('.offering-item');
			const panes = document.querySelectorAll('.offering-pane');

			if (items.length === 0) return;

			items.forEach(item => {
				item.addEventListener('click', function() {
					const index = this.getAttribute('data-index');

					// Update active nav
					items.forEach(i => i.classList.remove('active'));
					this.classList.add('active');

					// Update active pane
					panes.forEach(p => {
						p.style.display = 'none';
						p.classList.remove('active');
					});
					
					const activePane = document.getElementById(`offering-pane-${index}`);
					if (activePane) {
						activePane.style.display = 'block';
						// Trigger animation
						activePane.style.animation = 'none';
						activePane.offsetHeight; // force reflow
						activePane.style.animation = null;
					}
				});
			});
		});
	</script>


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
