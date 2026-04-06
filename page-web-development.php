<?php
/**
 * Template Name: Service - Web Development
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$content = factor_2_get_web_content();

get_header();
?>

<main id="main" class="site-main web-development-page">
	
	<!-- Hero Banner Wrapper -->
	<div class="hero-banner">
		<!-- Hero Section -->
		<section class="hero hero--service" <?php echo ! empty( $content['hero_bg'] ) ? 'style="background-image: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), url(' . esc_url( $content['hero_bg'] ) . '); background-size: cover; background-position: center;"' : ''; ?>>
			<div class="hero__copy">
				<p class="eyebrow"><?php echo esc_html( $content['hero_badge'] ); ?></p>
				<h1><?php echo esc_html( $content['hero_title'] ); ?></h1>
				
				<!-- Text Rotator - Swipe/Slide Style -->
				<div class="hero__rotator" style="margin: 3rem 0 3.5rem; display: flex; justify-content: center; align-items: baseline; gap: 0.4em; opacity: 0.9;">
					<span><?php echo esc_html( $content['hero_copy'] ); ?></span> 
					<?php 
					$phrases = array_map('trim', explode(',', $content['rotating_phrases']));
					?>
					<span class="text-rotator" id="service-rotator">
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
					<a class="button-link button-link--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a free consult', 'factor-2' ); ?></a>
				</div>
			</div>
		</section>
	</div>

	<!-- Intro Section (Web Engineering Highlights) -->
	<section class="section" id="web-intro" style="padding: 6rem 0;">
		<div class="container text-center">
			<div style="max-width: 900px; margin: 0 auto;">
				<p class="section-kicker"><?php echo esc_html( $content['intro_kicker'] ); ?></p>
				<p class="hero__lede" style="color: var(--text-secondary); line-height: 1.8;">
					<?php echo esc_html( $content['intro_copy'] ); ?>
				</p>
			</div>
		</div>
	</section>

	<!-- Web Development Services (Alternating Rows) -->
	<section class="section" id="web-services">
		<div class="container">
			<div class="service-stack">
				<?php foreach ( $content['services'] as $index => $service ) : ?>
					<article class="service-row<?php echo 1 === $index % 2 ? ' service-row--reverse' : ''; ?>">
						<div class="service-row__media">
							<?php if ( ! empty( $service['image'] ) ) : ?>
								<img src="<?php echo esc_url( $service['image'] ); ?>" alt="<?php echo esc_attr( $service['title'] ); ?>" class="service-row__image">
							<?php else : ?>
								<div class="service-row__image-placeholder"></div>
							<?php endif; ?>
						</div>
						<div class="service-row__content">
							<h2><?php echo esc_html( $service['title'] ); ?></h2>
							<div class="service-row__copy">
								<?php echo wp_kses_post( wpautop( $service['copy'] ) ); ?>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Development Process Section -->
	<section class="section" id="process" style="padding: 6rem 0; background-color: #f7ffe8;">
		<div class="container">
			<div class="section-heading text-center" style="margin-bottom: 4rem;">
				<p class="eyebrow" style="color: var(--accent-primary);"><?php esc_html_e( 'Web Engineering Approach', 'factor-2' ); ?></p>
				<h2><?php esc_html_e( 'A framework for high-performance delivery.', 'factor-2' ); ?></h2>
			</div>

			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 3rem;">
				<?php foreach ( $content['process'] as $index => $step ) : ?>
					<div class="process-step">
						<span style="font-family: 'DM Serif Display', serif; font-size: 3rem; color: var(--accent-primary); opacity: 0.3; display: block; margin-bottom: 1rem;">0<?php echo $index + 1; ?></span>
						<h3 style="font-size: 1.5rem; margin-bottom: 1rem;"><?php echo esc_html( $step['title'] ); ?></h3>
						<p style="line-height: 1.7; color: var(--text-secondary);"><?php echo esc_html( $step['copy'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Consultation Banner -->
	<div class="container">
		<div class="consult-banner">
			<p class="section-kicker"><?php esc_html_e( 'Consultation', 'factor-2' ); ?></p>
			<h2><?php echo esc_html( $content['consult_title'] ); ?></h2>
			<p><?php echo esc_html( $content['consult_copy'] ); ?></p>
			
			<div class="consult-banner__actions">
				<a class="button-link button-link--consult" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html( $content['consult_btn'] ); ?></a>
			</div>
		</div>
	</div>

</main>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const rotator = document.querySelector('#service-rotator .text-rotator__list');
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

		if (window.serviceRotatorInterval) clearInterval(window.serviceRotatorInterval);
		window.serviceRotatorInterval = setInterval(rotate, 3000);
	});
</script>

<?php
get_footer();
