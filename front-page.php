<?php
/**
 * Front page template.
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$content  = factor_2_get_homepage_content();
$insights = factor_2_get_insight_cards();

get_header();
?>
<main id="main" class="site-main">
	
	<!-- Hero Banner Wrapper -->
	<div class="hero-banner">
		<!-- Hero Section -->
		<section class="hero" id="top">
			<div class="hero__copy">
				<h1 class="hero__title">
					<?php foreach ( $content['hero_lines'] as $line ) : ?>
						<span><?php echo esc_html( $line ); ?></span>
					<?php endforeach; ?>
				</h1>

				<!-- Text Rotator - Swipe/Slide Style -->
				<div class="hero__rotator" style="margin: 3rem 0 3.5rem; opacity: 0.9; text-align: center;">
					<span>EXPERTS AT BUILDING SCALABLE AND QUALITY SOLUTIONS THAT</span> 
					<?php 
					$rotating_phrases_raw = get_theme_mod('f2_rotating_phrases', 'CONVERT BETTER,EXCEED EXPECTATIONS,DELIGHT CUSTOMERS');
					$phrases = array_map('trim', explode(',', $rotating_phrases_raw));
					?>
					<span class="text-rotator" id="home-rotator">
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
				<a class="button-link button-link--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html( $content['hero_cta_text'] ); ?></a>
				</div>
			</div>
		</section>

		<!-- Intro/Audience Section -->
		<section class="section" id="startups">
			<div class="container">
				<div class="section-heading text-center">
					<p class="section-kicker" style="font-size: 1.05rem;"><?php echo esc_html( $content['intro_kicker'] ); ?></p>
					<h2><?php echo esc_html( $content['intro_title'] ); ?></h2>
					<p class="hero__lede" style="margin-top: 1rem; margin-bottom: 1.5rem;"><?php echo esc_html( $content['hero_copy'] ); ?></p>
					<p><?php echo esc_html( $content['intro_copy'] ); ?></p>
				</div>
				
				<div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
					<?php foreach ( $content['audiences'] as $audience ) : ?>
						<a class="button-link button-link--ghost" href="<?php echo esc_url( $audience['url'] ); ?>" target="_blank" rel="noreferrer noopener">
							<?php echo esc_html( $audience['label'] ); ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const rotator = document.querySelector('#home-rotator .text-rotator__list');
			if (!rotator) return;

			const items = rotator.querySelectorAll('.text-rotator__item');
			const count = items.length - 1; // Number of unique phrases
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
					}, 600); // Reset after animation finishes
				}
			}

			// Clear previous intervals if script re-runs (Customizer)
			if (window.rotatorInterval) clearInterval(window.rotatorInterval);
			window.rotatorInterval = setInterval(rotate, 3000);
		});
	</script>

		<?php if ( ! empty( $content['services'] ) ) : ?>
		<!-- Services Section -->
		<section class="section bg-secondary" id="services">
			<div class="container">
				<div class="section-heading">
					<p class="section-kicker"><?php echo esc_html( $content['services_kicker'] ); ?></p>
					<h2><?php echo esc_html( $content['services_heading'] ); ?></h2>
					<p><?php echo esc_html( $content['services_description'] ); ?></p>
				</div>

				<div class="service-grid">
					<?php foreach ( $content['services'] as $service ) : ?>
						<a href="<?php echo esc_url( $service['url'] ); ?>" class="service-card animate-on-scroll" target="_blank" rel="noreferrer noopener">
							<article>
								<p class="section-kicker"><?php echo esc_html( $service['eyebrow'] ); ?></p>
								<h3><?php echo esc_html( $service['title'] ); ?></h3>
								<p><?php echo esc_html( $service['copy'] ); ?></p>
								<span class="service-card__link">
									<?php echo esc_html( $content['services_btn_text'] ); ?> →
								</span>
							</article>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php endif; ?>


		<!-- Consultation Banner -->
		<div class="container">
			<div class="consult-banner">
				<p class="section-kicker"><?php echo esc_html( $content['consult_kicker'] ); ?></p>
				<h2><?php echo esc_html( $content['consult_heading'] ); ?></h2>
				<p><?php echo esc_html( $content['consult_copy'] ); ?></p>
				
				<div class="consult-banner__actions">
					<a class="button-link button-link--consult" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html( $content['consult_btn_text'] ); ?></a>
				</div>
			</div>
		</div>


		<?php if ( ! empty( $content['testimonials'] ) ) : ?>
		<!-- Testimonials Section -->
		<section class="section" id="reviews">
			<div class="container">
				<div class="section-heading text-center">
					<p class="section-kicker"><?php echo esc_html( $content['reviews_kicker'] ); ?></p>
					<h2><?php echo esc_html( $content['reviews_heading'] ); ?></h2>
				</div>

				<div class="review-grid">
					<?php foreach ( $content['testimonials'] as $testimonial ) : ?>
						<article class="review-card">
							<p class="review-card__quote">"<?php echo esc_html( $testimonial['quote'] ); ?>"</p>
							<p class="review-card__author"><?php echo esc_html( $testimonial['name'] ); ?></p>
							<p class="review-card__role"><?php echo esc_html( $testimonial['role'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php endif; ?>

		<?php if ( ! empty( $content['reasons'] ) ) : ?>
		<!-- Process / Why Choose Us Section -->
		<section class="section bg-secondary" id="about">
			<div class="container">
				<div class="section-heading">
					<p class="section-kicker"><?php echo esc_html( $content['reasons_kicker'] ); ?></p>
					<h2><?php echo esc_html( $content['reasons_heading'] ); ?></h2>
				</div>

				<div class="service-grid">
					<?php foreach ( $content['reasons'] as $reason ) : ?>
						<article class="service-card">
							<h3><?php echo esc_html( $reason['title'] ); ?></h3>
							<p><?php echo esc_html( $reason['copy'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php endif; ?>

		<?php if ( ! empty( $content['client_logos'] ) ) : ?>
		<section class="section" style="padding: 2rem 0;">
			<div class="container">
				<p class="section-kicker text-center" style="display: block;"><?php echo esc_html( $content['clients_kicker'] ); ?></p>
				<div class="logo-wall">
					<?php foreach ( $content['client_logos'] as $logo ) : ?>
						<div style="font-weight: 800; font-size: 1.25rem; color: var(--text-secondary);"><?php echo esc_html( $logo ); ?></div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php endif; ?>

</main>
<?php
get_footer();
