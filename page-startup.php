<?php
/**
 * Template Name: Startup Page
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$content = factor_2_get_startup_v2_content();

get_header();
?>

<main id="main" class="site-main startup-page app-development-page">
	
	<!-- Hero Banner Wrapper -->
	<div class="hero-banner">
		<!-- Hero Section -->
		<section class="hero hero--service" <?php echo ! empty( $content['hero_bg'] ) ? 'style="background-image: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), url(' . esc_url( $content['hero_bg'] ) . '); background-size: cover; background-position: center;"' : ''; ?>>
			<div class="hero__copy" style="max-width: 1200px; text-align: center;">
				<div style="display: inline-block; text-align: center; max-width: 100%;">
					<h1 style="margin-bottom: 2rem;"><?php echo esc_html( $content['hero_title'] ); ?></h1>
					
					<!-- Text Rotator - Left Aligned with Title, Centered Block -->
					<div class="hero__rotator" style="margin: 3rem 0 3.5rem; display: flex; justify-content: center; align-items: center; gap: 0.5em; opacity: 0.9; width: 100%; white-space: nowrap; flex-wrap: nowrap !important;">
						<span style="font-size: var(--rotator-prefix-size);"><?php echo esc_html( $content['hero_copy'] ); ?></span> 
						<?php 
						$phrases = array_map('trim', explode(',', $content['rotating_phrases']));
						?>
						<span class="text-rotator" id="startup-service-rotator" style="display: inline-flex;">
							<span class="text-rotator__list">
								<?php foreach ($phrases as $phrase): ?>
									<span class="text-rotator__item" style="justify-content: flex-start;"><?php echo esc_html($phrase); ?></span>
								<?php endforeach; ?>
								<!-- Duplicate first item for infinite loop -->
								<span class="text-rotator__item" style="justify-content: flex-start;"><?php echo esc_html($phrases[0]); ?></span>
							</span>
						</span>
					</div>
				</div>

				<div class="hero__actions">
					<a class="button-link button-link--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a free consult', 'factor-2' ); ?></a>
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

	
	<!-- Development Process Section -->

	<!-- Development Process Section -->
	<section class="section" id="process" style="padding: 6rem 0; background-color: #f7ffe8;">
		<div class="container">
			<div class="section-heading text-center" style="margin-bottom: 4rem;">
				<p class="eyebrow" style="color: var(--accent-primary);"><?php esc_html_e( 'Our Approach', 'factor-2' ); ?></p>
				<h2><?php esc_html_e( 'A framework for reliable delivery.', 'factor-2' ); ?></h2>
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
			<h2><?php esc_html_e( 'Ready to build your startup?', 'factor-2' ); ?></h2>
			<p><?php echo esc_html( $content['consult_copy'] ); ?></p>
			
			<div class="consult-banner__actions">
				<a class="button-link button-link--consult" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a free consult', 'factor-2' ); ?></a>
			</div>
		</div>
	</div>

</main>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const rotator = document.querySelector('#startup-service-rotator .text-rotator__list');
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

		if (window.startupServiceRotatorInterval) clearInterval(window.startupServiceRotatorInterval);
		window.startupServiceRotatorInterval = setInterval(rotate, 3000);
	});
</script>

<?php
get_footer();
