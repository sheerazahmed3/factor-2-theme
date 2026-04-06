<?php
/**
 * Template Name: Services Overview
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Fetch services from CPT (same as homepage)
$services = factor_2_get_services();
if ( empty( $services ) ) {
	$services = array(
		array( 'eyebrow' => 'Consulting & Strategy', 'title' => 'Product Consulting & Strategy', 'copy' => 'We align business objectives with technical feasibility to roadmap your product for success.', 'url' => '#' ),
		array( 'eyebrow' => 'App Design', 'title' => 'UI/UX Design & Prototyping', 'copy' => 'Creating intuitive, engaging, and accessible interfaces that users love.', 'url' => '#' ),
		array( 'eyebrow' => 'App Development', 'title' => 'iOS, Android & Web Engineering', 'copy' => 'Robust, scalable development using modern frameworks and best practices.', 'url' => '#' ),
		array( 'eyebrow' => 'AI Solutions', 'title' => 'AI Development', 'copy' => 'Integrating AI capabilities to automate processes and unlock new value for your business.', 'url' => site_url( '/ai-development/' ) ),
		array( 'eyebrow' => 'Support', 'title' => 'Maintenance & Evolution', 'copy' => 'Long-term partnership ensuring your app stays secure, up-to-date, and competitive.', 'url' => '#' ),
		array( 'eyebrow' => 'Staffing', 'title' => 'Tech Staff Outsourcing', 'copy' => 'Extend your team with experienced developers, designers, and strategists on demand.', 'url' => '#' ),
	);
}

get_header();
?>

<main class="site-main">

	<!-- Page Hero -->
	<section class="section" style="padding-top: 4rem; padding-bottom: 2rem; background: var(--bg-secondary);">
		<div class="container">
			<div class="section-heading">
				<p class="section-kicker">What We Do</p>
				<h1>Our Services</h1>
				<p style="max-width: 640px;">From product strategy to long-term maintenance, we provide all the capabilities needed to turn your idea into a successful digital product.</p>
				<div style="margin-top: 2rem;">
					<a class="button-link button-link--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Start a project &rarr;</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Services Grid -->
	<section class="section bg-secondary">
		<div class="container">
			<div class="service-grid">
				<?php foreach ( $services as $service ) : ?>
					<article class="service-card">
						<p class="section-kicker"><?php echo esc_html( $service['eyebrow'] ); ?></p>
						<h2 style="font-size: 1.4rem;"><?php echo esc_html( $service['title'] ); ?></h2>
						<p><?php echo esc_html( $service['copy'] ); ?></p>
						<?php if ( ! empty( $service['url'] ) && '#' !== $service['url'] ) : ?>
							<a href="<?php echo esc_url( $service['url'] ); ?>" class="button-link button-link--ghost" target="_blank" rel="noreferrer noopener">
								Learn more
							</a>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- CTA Banner -->
	<section class="section" style="padding-bottom: 3rem;">
		<div class="container">
			<div class="consult-banner">
				<p class="section-kicker">Get Started</p>
				<h2>Ready to build something great?</h2>
				<p>Tell us about your project and we will get back to you within 24 hours.</p>
				<div class="consult-banner__actions">
					<a class="button-link button-link--consult" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Request a free consultation</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
