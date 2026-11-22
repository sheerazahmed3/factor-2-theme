<?php
/**
 * Front page template.
 *
 * @package Appexeon3
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
	<div class="hero-banner hero-banner--split">
		<!-- Hero Section -->
		<section class="hero hero--split" id="top">
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
				<!-- Hero image tiles: add mockup-1.png, mockup-2.png, mockup-4.png in assets/images/hero/ -->
				<?php $hero_img = get_template_directory_uri() . '/assets/images/hero/'; ?>
				<div class="hero__media">
					<div class="hero__col">
						<figure class="hero__tile hero__tile--blue">
							<img src="<?php echo esc_url( $hero_img . 'mockup-1.png' ); ?>" alt="<?php esc_attr_e( 'Pharmacy app on a phone', 'factor-2' ); ?>" width="800" height="818" decoding="async">
						</figure>
						<figure class="hero__tile hero__tile--orange">
							<img src="<?php echo esc_url( $hero_img . 'mockup-3.png' ); ?>" alt="<?php esc_attr_e( 'Retail dashboard on a laptop', 'factor-2' ); ?>" width="831" height="564" decoding="async">
						</figure>
					</div>
					<div class="hero__col hero__col--offset">
						<figure class="hero__tile hero__tile--purple">
							<img src="<?php echo esc_url( $hero_img . 'mockup-2.png' ); ?>" alt="<?php esc_attr_e( 'Inventory dashboard on a tablet', 'factor-2' ); ?>" width="906" height="585" decoding="async">
						</figure>
						<figure class="hero__tile hero__tile--red">
							<img src="<?php echo esc_url( $hero_img . 'mockup-4.png' ); ?>" alt="<?php esc_attr_e( 'Restaurant management app on a phone', 'factor-2' ); ?>" width="792" height="645" decoding="async">
						</figure>
					</div>
				</div>
		</section>
	</div>

	<!-- Value Strip -->
	<section class="home-value-strip" aria-label="Why work with Appexeon">
		<div class="container home-value-strip__inner">
			<div class="home-value-strip__item">
				<span class="home-value-strip__number">01</span>
				<div>
					<h2>Strategy-led</h2>
					<p>Every build starts with a clear business goal.</p>
				</div>
			</div>
			<div class="home-value-strip__item">
				<span class="home-value-strip__number">02</span>
				<div>
					<h2>Built to scale</h2>
					<p>Reliable foundations that grow with your team.</p>
				</div>
			</div>
			<div class="home-value-strip__item">
				<span class="home-value-strip__number">03</span>
				<div>
					<h2>Human support</h2>
					<p>Practical guidance from first idea to next release.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Sliding Client Logos Strip ("Sliding Patti") with White Background & Spacing -->
	<?php
	$default_svg_map = array(
		'sukkur'       => 'logo-iba-sukkur.svg',
		'iba sukkur'   => 'logo-iba-sukkur.svg',
		'sibau'        => 'logo-iba-sukkur.svg',
		'karachi'      => 'logo-iba-karachi.svg',
		'iba karachi'  => 'logo-iba-karachi.svg',
		'iba'          => 'logo-iba-karachi.svg',
		'nic'          => 'logo-nic-karachi.svg',
		'nic karachi'  => 'logo-nic-karachi.svg',
		'incubation'   => 'logo-nic-karachi.svg',
	);

	$slider_items = array();
	$logos_source = ! empty( $content['client_logos'] ) ? $content['client_logos'] : array(
		array('name' => 'Sukkur IBA University', 'image' => 'logo-iba-sukkur.svg'),
		array('name' => 'IBA Karachi', 'image' => 'logo-iba-karachi.svg'),
		array('name' => 'NIC Karachi', 'image' => 'logo-nic-karachi.svg'),
	);

	foreach ( $logos_source as $item ) {
		$name  = trim( isset( $item['name'] ) ? $item['name'] : ( is_string( $item ) ? $item : '' ) );
		$image = trim( isset( $item['image'] ) ? $item['image'] : '' );
		$img_src = '';

		if ( ! empty( $image ) ) {
			if ( preg_match( '#^(https?:)?//#i', $image ) || strpos( $image, '/' ) === 0 ) {
				$img_src = $image;
			} else {
				$img_src = get_template_directory_uri() . '/assets/images/clients/' . $image;
			}
		} else {
			$lower = strtolower( $name );
			// Check specific multi-word keys first
			if ( strpos( $lower, 'sukkur' ) !== false ) {
				$img_src = get_template_directory_uri() . '/assets/images/clients/logo-iba-sukkur.svg';
			} elseif ( strpos( $lower, 'nic' ) !== false ) {
				$img_src = get_template_directory_uri() . '/assets/images/clients/logo-nic-karachi.svg';
			} elseif ( strpos( $lower, 'iba' ) !== false || strpos( $lower, 'karachi' ) !== false ) {
				$img_src = get_template_directory_uri() . '/assets/images/clients/logo-iba-karachi.svg';
			} else {
				foreach ( $default_svg_map as $key => $file ) {
					if ( strpos( $lower, $key ) !== false ) {
						$img_src = get_template_directory_uri() . '/assets/images/clients/' . $file;
						break;
					}
				}
			}
		}

		if ( ! empty( $name ) || ! empty( $img_src ) ) {
			$slider_items[] = array(
				'name'    => $name,
				'img_src' => $img_src,
			);
		}
	}

	// Repeat items to fill space and guarantee rich infinite loop
	if ( ! empty( $slider_items ) && count( $slider_items ) < 9 ) {
		$repeated = array();
		while ( count( $repeated ) < 9 ) {
			foreach ( $slider_items as $s_item ) {
				$repeated[] = $s_item;
				if ( count( $repeated ) >= 9 ) {
					break;
				}
			}
		}
		$slider_items = $repeated;
	}
	?>
	<?php if ( ! empty( $content['show_client_logos'] ) && ! empty( $slider_items ) ) : ?>
	<section class="logo-sliding-strip" aria-label="<?php esc_attr_e( 'Clients and Partners', 'appexeon3' ); ?>">
		<div class="logo-sliding-strip__marquee">
			<div class="logo-sliding-strip__track">
				<div class="logo-sliding-strip__group">
					<?php foreach ( $slider_items as $client ) : ?>
						<div class="logo-sliding-badge" title="<?php echo esc_attr( $client['name'] ); ?>">
							<?php if ( ! empty( $client['img_src'] ) ) : ?>
								<img src="<?php echo esc_url( $client['img_src'] ); ?>" alt="<?php echo esc_attr( $client['name'] ); ?>" loading="lazy">
							<?php else : ?>
								<span class="logo-sliding-badge__text"><?php echo esc_html( $client['name'] ); ?></span>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<!-- Duplicate set for seamless infinite scroll -->
				<div class="logo-sliding-strip__group" aria-hidden="true">
					<?php foreach ( $slider_items as $client ) : ?>
						<div class="logo-sliding-badge" title="<?php echo esc_attr( $client['name'] ); ?>">
							<?php if ( ! empty( $client['img_src'] ) ) : ?>
								<img src="<?php echo esc_url( $client['img_src'] ); ?>" alt="<?php echo esc_attr( $client['name'] ); ?>" loading="lazy">
							<?php else : ?>
								<span class="logo-sliding-badge__text"><?php echo esc_html( $client['name'] ); ?></span>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- Intro/Audience Section -->
	<section class="section section--intro" id="startups">
		<div class="container">
			<div class="section-heading text-center intro-statement">
				<p class="intro-statement__copy">
					Appexeon builds scalable <strong>apps, websites, and custom software</strong>, including <strong>ERP, POS, and AI solutions</strong> for businesses and startups.
				</p>
			</div>
			
			<div class="intro-statement__actions">
				<a class="button-link intro-statement__button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">I am a Business</a>
				<a class="button-link intro-statement__button" href="<?php echo esc_url( home_url( '/startup/' ) ); ?>">I have a Startup idea</a>
			</div>
		</div>
	</section>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const rotator = document.querySelector('#home-rotator .text-rotator__list');
			if (!rotator) return;

			const items = rotator.querySelectorAll('.text-rotator__item');
			const count = items.length - 1; // Number of unique phrases
			let index = 0;
			const itemHeight = items[0] ? items[0].getBoundingClientRect().height : 0;

			function rotate() {
				index++;
				rotator.style.transition = 'transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
				rotator.style.transform = `translateY(-${index * itemHeight}px)`;

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
		<section class="section bg-secondary home-services-section" id="services">
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
								<?php echo factor_2_service_icon( $service['eyebrow'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
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

</main>
<?php
get_footer();
