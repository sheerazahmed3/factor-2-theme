<?php
/**
 * Template Name: Service - App Development
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$content = factor_2_get_app_content();

get_header();
?>

<main id="main" class="site-main app-development-page">
	
	<!-- Hero Banner Wrapper -->
	<div class="hero-banner">
		<!-- Hero Section -->
		<section class="hero hero--service">
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

	<!-- App Development Services (Alternating Rows) -->
	<section class="section" id="app-services">
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
								<?php 
								// Support links in copy (detect lines starting with ->)
								$lines = explode( "\n", $service['copy'] );
								$main_text = array();
								$sub_links = array();
								foreach ( $lines as $line ) {
									if ( strpos( trim( $line ), '->' ) === 0 || strpos( trim( $line ), '→' ) === 0 ) {
										$sub_links[] = trim( str_replace( array( '->', '→' ), '', $line ) );
									} else {
										$main_text[] = $line;
									}
								}
								echo wp_kses_post( wpautop( implode( "\n", $main_text ) ) );

								if ( ! empty( $sub_links ) ) : ?>
									<ul class="service-row__sublinks">
										<?php foreach ( $sub_links as $link ) : ?>
											<li><?php echo esc_html( $link ); ?></li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	
	<!-- Tech Stack Section -->
	<section class="section tech-stack-section premium-design" id="tech-stack">
		<div class="container">
			<div class="tech-stack-info text-center">
				<h2 class="tech-stack-heading"><?php echo esc_html( $content['tech_stack']['title'] ); ?></h2>
			</div>

			<div class="tech-stack-grid">
				<?php foreach ( $content['tech_stack']['items'] as $tech ) : ?>
					<div class="tech-item-wrapper">
						<div class="tech-item-card">
							<div class="tech-logo">
								<?php 
								$logo_url = $tech['is_url'] ? $tech['logo'] : get_template_directory_uri() . '/assets/images/tech/' . $tech['logo'];
								?>
								<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $tech['name'] ); ?>">
							</div>
							<span class="tech-name"><?php echo esc_html( $tech['name'] ); ?></span>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="tech-stack-bg-glow"></div>
	</section>

	<!-- Development Process Section -->
	<section class="section" id="process" style="padding: 6rem 0; background-color: #f7ffe8;">
		<div class="container">
			<div class="section-heading text-center" style="margin-bottom: 4rem;">
				<p class="eyebrow" style="color: var(--accent-primary);"><?php esc_html_e( 'Our Approach', 'factor-2' ); ?></p>
				<h2><?php esc_html_e( 'A framework for reliable delivery.', 'factor-2' ); ?></h2>
				<p class="hero__lede" style="margin-top: 1rem; margin-bottom: 1.5rem; max-width: 800px; margin-left: auto; margin-right: auto;"><?php echo esc_html( $content['hero_copy'] ); ?></p>
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
			<h2><?php esc_html_e( 'Ready to build your app?', 'factor-2' ); ?></h2>
			<p><?php echo esc_html( $content['consult_copy'] ); ?></p>
			
			<div class="consult-banner__actions">
				<a class="button-link button-link--consult" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a free consult', 'factor-2' ); ?></a>
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
