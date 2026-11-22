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
					<span class="text-rotator" id="service-rotator" style="display: block; overflow: hidden; height: 1.4em; font-size: 1.25rem; font-weight: 600; text-align: center;">
						<span class="text-rotator__list" style="display: flex; flex-direction: column; align-items: center;">
							<?php foreach ($phrases as $phrase): ?>
								<span class="text-rotator__item" style="text-align: center; display: flex; align-items: center; justify-content: center; height: 1.4em; line-height: 1.4em; width: 100%; flex-shrink: 0;"><?php echo esc_html($phrase); ?></span>
							<?php endforeach; ?>
							<!-- Duplicate first item for infinite loop -->
							<span class="text-rotator__item" style="text-align: center; display: flex; align-items: center; justify-content: center; height: 1.4em; line-height: 1.4em; width: 100%; flex-shrink: 0;"><?php echo esc_html($phrases[0]); ?></span>
						</span>
					</span>
				</div>

				<div class="hero__actions">
					<a class="button-link button-link--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html( $content['hero_cta_text'] ); ?></a>
				</div>
			</div>
		</section>
	</div>

	<!-- Consulting Focus -->
	<section class="section bg-secondary" style="padding-top: 5rem; padding-bottom: 5rem;">
		<div class="container">
			<div class="section-heading">
				<p class="section-kicker">Where We Can Help</p>
				<h2>Clear direction for your next stage of growth</h2>
				<p style="max-width: 700px;">We turn complex business and technology questions into practical priorities, decisions, and actions your team can move on with confidence.</p>
			</div>

			<div class="service-grid">
				<?php foreach ( $content['capabilities'] as $capability ) : ?>
					<article class="service-card">
						<p class="section-kicker">Consulting &amp; Strategy</p>
						<h3><?php echo esc_html( $capability['title'] ); ?></h3>
						<p><?php echo esc_html( $capability['desc'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Engagement Process -->
	<section class="section" style="padding-top: 5rem; padding-bottom: 5rem;">
		<div class="container">
			<div class="section-heading">
				<p class="section-kicker">Our Approach</p>
				<h2>From first conversation to measurable progress</h2>
				<p style="max-width: 700px;">A focused process that keeps strategy grounded in your goals, your people, and the realities of execution.</p>
			</div>

			<div class="process-steps-list">
				<?php foreach ( $content['steps'] as $index => $step ) : ?>
					<div class="step-box">
						<div class="step-box__number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></div>
						<div class="step-box__content">
							<h3><?php echo esc_html( $step['title'] ); ?></h3>
							<p><?php echo esc_html( $step['desc'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="consult-banner" style="margin-top: 4rem;">
				<p class="section-kicker">Ready When You Are</p>
				<h2>Let’s make the next decision easier.</h2>
				<p>Bring us the challenge, the opportunity, or the idea you are weighing. We’ll help you find the clearest path forward.</p>
				<div class="consult-banner__actions">
					<a class="button-link button-link--consult" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Start a conversation</a>
				</div>
			</div>
		</div>
	</section>
</main>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const rotator = document.querySelector('#service-rotator .text-rotator__list');
		if (!rotator) return;

		const items = rotator.querySelectorAll('.text-rotator__item');
		const count = items.length - 1; 
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
				}, 600);
			}
		}

		if (window.serviceRotatorInterval) clearInterval(window.serviceRotatorInterval);
		window.serviceRotatorInterval = setInterval(rotate, 3000);
	});
</script>

<?php get_footer(); ?>
