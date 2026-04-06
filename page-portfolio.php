<?php
/**
 * Template Name: Portfolio Overview
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Fetch portfolio items from CPT
$portfolio_items = factor_2_get_portfolio();

get_header();
?>

<main class="site-main">

	<!-- Page Hero -->
	<section class="section section--portfolio-hero">
		<div class="container">
			<div class="section-heading text-center">
				<p class="section-kicker">Witness the Impact</p>
				<h1 class="hero-title">Our Portfolio</h1>
				<p class="hero-lede">A showcase of our latest digital products, mobile applications, and web platforms built for businesses and startups worldwide.</p>
				<div class="hero-actions">
					<a class="button-link button-link--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Start your project &rarr;</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Portfolio Grid -->
	<section class="section bg-secondary">
		<div class="container">
			<?php if ( ! empty( $portfolio_items ) ) : ?>
				<div class="portfolio-grid portfolio-grid--premium">
					<?php foreach ( $portfolio_items as $item ) : ?>
						<article class="portfolio-card portfolio-card--premium">
							<a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="portfolio-card__link-wrapper">
								<div class="portfolio-card__media">
									<?php if ( $item['thumbnail'] ) : ?>
										<img src="<?php echo esc_url( $item['thumbnail'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" class="portfolio-card__image">
									<?php else : ?>
										<div class="portfolio-card__image-placeholder"></div>
									<?php endif; ?>
								</div>
								
								<div class="portfolio-card__body">
									<p class="section-kicker"><?php echo esc_html( $item['type'] ); ?></p>
									<h3><?php echo esc_html( $item['title'] ); ?></h3>
									<p class="portfolio-card__excerpt"><?php echo esc_html( $item['excerpt'] ); ?></p>
									<div class="portfolio-card__footer">
										<span class="view-case-study">View Case Study <span class="arrow">&rarr;</span></span>
									</div>
								</div>
							</a>
						</article>
					<?php endforeach; ?>
				</div>
			<?php else : ?>
				<div class="text-center" style="padding: 4rem 0;">
					<p>No portfolio items found. Please add some from the WordPress dashboard.</p>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- CTA Banner -->
	<section class="section" style="padding-bottom: 3rem;">
		<div class="container">
			<div class="consult-banner">
				<p class="section-kicker">Next Steps</p>
				<h2>Ready to become our next success story?</h2>
				<p>We're ready to help you build, launch, and scale your digital product.</p>
				<div class="consult-banner__actions">
					<a class="button-link button-link--consult" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Request a free consultation</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
