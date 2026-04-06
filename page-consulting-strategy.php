<?php
/**
 * Template Name: Service - Consulting & Strategy
 *
 * @package Factor_2
 */

get_header();
?>

<?php 
$content = factor_2_get_consulting_content();
?>

<main id="main" class="site-main consulting-strategy-page">
	
	<!-- Hero Banner Wrapper -->
	<div class="hero-banner" style="position: relative; overflow: hidden; background: #000;">
		<?php if ( ! empty( $content['hero_video'] ) ) : ?>
			<video class="hero-video-bg" autoplay muted loop playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; opacity: 0.5;">
				<source src="<?php echo esc_url( $content['hero_video'] ); ?>" type="video/mp4">
			</video>
			<div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.4); z-index: 1;"></div>
		<?php endif; ?>
		
		<!-- Hero Section -->
		<section class="hero hero--service <?php echo ! empty( $content['hero_video'] ) ? 'has-video-bg' : ''; ?>" style="position: relative; z-index: 2;">
			<div class="hero__copy" style="<?php echo ! empty( $content['hero_video'] ) ? 'text-shadow: 0 2px 20px rgba(0,0,0,0.6);' : ''; ?>">
				<p class="eyebrow" style="<?php echo ! empty( $content['hero_video'] ) ? 'color: #fff; opacity: 0.9;' : ''; ?>"><?php echo esc_html( $content['hero_badge'] ); ?></p>
				<h1 style="font-size: 3.6rem; line-height: 1.1; margin-bottom: 2rem; <?php echo ! empty( $content['hero_video'] ) ? 'color: #fff;' : ''; ?>"><?php echo esc_html( $content['hero_title'] ); ?></h1>
				
				<!-- Text Rotator - Swipe/Slide Style -->
				<div class="hero__rotator" style="margin: 3.5rem 0 4rem; display: flex; flex-direction: column; align-items: center; gap: 0.8rem; <?php echo ! empty( $content['hero_video'] ) ? 'color: #fff;' : ''; ?>">
					<span style="text-align: center; max-width: 1000px; font-size: 1.25rem; font-weight: 500; letter-spacing: 0.03em; line-height: 1.5; <?php echo ! empty( $content['hero_video'] ) ? 'color: #fff; opacity: 1;' : 'color: #222;'; ?>"><?php echo esc_html( $content['hero_desc'] ); ?></span> 					<?php 
					$phrases = array_map('trim', explode(',', $content['rotating_phrases']));
					?>
					<span class="text-rotator" id="service-rotator" style="display: block; overflow: hidden; height: 1.5em; font-size: 1.25rem; font-weight: 600; text-align: center;">
						<span class="text-rotator__list" style="display: flex; flex-direction: column; align-items: center;">
							<?php foreach ($phrases as $phrase): ?>
								<span class="text-rotator__item" style="text-align: center; display: flex; align-items: center; justify-content: center; height: 1.5em; line-height: 1.5em; width: 100%;"><?php echo esc_html($phrase); ?></span>
							<?php endforeach; ?>
							<!-- Duplicate first item for infinite loop -->
							<span class="text-rotator__item" style="text-align: center; display: flex; align-items: center; justify-content: center; height: 1.5em; line-height: 1.5em; width: 100%;"><?php echo esc_html($phrases[0]); ?></span>
						</span>
					</span>
				</div>

				<div class="hero__actions">
					<a class="button-link button-link--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html( $content['hero_cta_text'] ); ?></a>
				</div>
			</div>
		</section>
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

<?php get_footer(); ?>
