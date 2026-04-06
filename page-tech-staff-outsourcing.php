<?php
/**
 * Template Name: Service - Tech Staff Outsourcing
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Handle form submission
$form_sent = false;
$form_error = false;
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['f2_outsourcing_nonce']) ) {
	if ( wp_verify_nonce($_POST['f2_outsourcing_nonce'], 'f2_outsourcing_contact') ) {
		$name    = sanitize_text_field($_POST['contact_name'] ?? '');
		$mobile  = sanitize_text_field($_POST['contact_mobile'] ?? '');
		$email   = sanitize_email($_POST['contact_email'] ?? '');
		$message = sanitize_textarea_field($_POST['contact_message'] ?? '');

		if ( !empty($name) && !empty($email) && !empty($message) ) {
			$to = get_theme_mod('f2_test_contact_email', 'hello@factorlabs.com');
			$subject = "New Inquiry: Tech Staff Outsourcing - $name";
			$body = "Name: $name\nEmail: $email\nMobile: $mobile\n\nRequirement:\n$message";
			$headers = array('Reply-To: ' . "$name" . ' <' . $email . '>');
			
			$form_sent = wp_mail($to, $subject, $body, $headers);
			$form_error = !$form_sent;
		} else {
			$form_error = true;
		}
	}
}
?>
<?php
$content = factor_2_get_outsourcing_content();
?>

<style>
/* Responsive Grids for Outsourcing Page */
.outsourcing-value-grid {
	display: grid;
	grid-template-columns: 1.3fr 0.7fr;
	gap: 80px;
	align-items: start;
}
.outsourcing-why-grid {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 30px;
}
.outsourcing-tech-grid {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 20px;
}

@media (max-width: 991px) {
	.outsourcing-value-grid {
		grid-template-columns: 1fr;
		gap: 40px;
	}
	.outsourcing-value-grid > div:last-child {
		justify-content: center !important;
	}
	.why-outsourcing-title {
		font-size: 2rem !important;
	}
	.outsourcing-why-grid {
		grid-template-columns: 1fr;
	}
	.outsourcing-tech-grid {
		grid-template-columns: repeat(2, 1fr);
	}
}

@media (max-width: 600px) {
	.outsourcing-tech-grid {
		grid-template-columns: 1fr;
	}
	.outsourcing-hero-title {
		font-size: 2.5rem !important;
	}
}
</style>

<main id="main" class="site-main outsourcing-page" style="background: white; font-family: var(--font-body); color: var(--text-primary);">
	
	<!-- 4. VALUE PROPOSITION (White background) -->
	<section style="background-color: #f7ffe8; padding: 60px 0 100px; border-bottom: 1px solid #f1f5f9;">
		<div class="container">
			<div class="outsourcing-value-grid">
				<div>
					<h2 style="font-size: 2.75rem; line-height: 1.2; margin-bottom: 2rem; color: #1a202c; font-weight: 800;"><?php echo esc_html( $content['value_title'] ); ?></h2>
					<p style="font-size: 1.1rem; line-height: 1.7; color: #4a5568; margin-bottom: 2rem;"><?php echo esc_html( $content['value_desc'] ); ?></p>
					
					<ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 1.5rem;">
						<?php foreach ( $content['value_items'] as $item ) : ?>
						<li style="display: flex; align-items: flex-start; gap: 1.25rem;">
							<div style="flex-shrink: 0; margin-top: 4px;">
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
									<polyline points="20 6 9 17 4 12"/>
								</svg>
							</div>
							<div style="font-size: 1.1rem; line-height: 1.6; color: #1e293b;">
								<strong style="color: #0f172a; font-weight: 700;"><?php echo esc_html( $item['title'] ); ?></strong>
								<span style="color: #475569;"><?php echo esc_html( $item['copy'] ); ?></span>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div style="display: flex; align-items: flex-start; justify-content: flex-end; height: 100%;">
					<?php if ( ! empty( $content['value_img'] ) ) : ?>
						<img src="<?php echo esc_url( $content['value_img'] ); ?>" alt="Asset Illustration" style="max-width: 100%; height: auto; border-radius: 12px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); object-fit: cover; max-height: 550px;">
					<?php else : ?>
						<div style="width: 100%; aspect-ratio: 4/5; background: #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #94a3b8;">
							Asset Illustration
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- 1. HERO SECTION -->
	<section class="section hero-codup" style="background: white; padding: 120px 0 80px; border-bottom: 1px solid #f1f5f9;">
		<div class="container" style="display: flex; justify-content: center;">
			<div style="display: flex; flex-direction: column; align-items: center; text-align: center; max-width: 900px;">
				<h1 class="outsourcing-hero-title" style="font-size: 3.5rem; line-height: 1.1; margin-bottom: 1.5rem; color: #1a202c; font-weight: 800;"><?php echo esc_html( $content['hero_title'] ); ?></h1>
				<h2 style="font-size: 2rem; color: #4a5568; margin-bottom: 2rem; font-weight: 400;"><?php echo esc_html( $content['hero_subtitle'] ); ?></h2>
				<p style="font-size: 1.25rem; color: #718096; margin-bottom: 3rem; line-height: 1.6;"><?php echo esc_html( $content['hero_desc'] ); ?></p>
				
				<div style="display: flex; gap: 2rem; justify-content: center; margin-bottom: 3rem;">
					<div style="display: flex; align-items: center; gap: 0.5rem;">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
						<span style="font-weight: 600; font-size: 0.9rem;"><?php echo esc_html( $content['trust_badge_1'] ); ?></span>
					</div>
					<div style="display: flex; align-items: center; gap: 0.5rem;">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
						<span style="font-weight: 600; font-size: 0.9rem;"><?php echo esc_html( $content['trust_badge_2'] ); ?></span>
					</div>
				</div>

				<a href="#contact" class="button-link button-link--primary" style="padding: 1.25rem 3rem; font-size: 1.1rem; border-radius: 4px;"><?php echo esc_html( $content['hero_cta'] ); ?></a>
			</div>
		</div>
	</section>

	<!-- 3. STRENGTHS SECTION (Final Alignment & Style) -->
	<?php if ( ! empty( $content['strengths_items'] ) ) : ?>
	<section class="strengths-section" style="padding: 120px 0; background: #fff; border-bottom: 1px solid #f1f5f9;">
		<div class="container">
			<div class="strengths-wrapper" style="position: relative; max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 320px 1fr; gap: 40px; align-items: center;">
				
				<!-- Mobile Header -->
				<div class="strengths-mobile-header" style="text-align: center; margin-bottom: 40px; display: none;">
					<h2 style="font-size: 2.25rem; font-weight: 800; color: #1e293b;">
						<span style="color: #91c73d;">Strengths That</span> Define Us
					</h2>
				</div>

				<!-- Left Cards -->
				<div class="strengths-left-col" style="display: flex; flex-direction: column; gap: 60px;">
					<?php for ($i = 0; $i < 2; $i++) : if (isset($content['strengths_items'][$i*2])) : $item = $content['strengths_items'][$i*2]; ?>
					<div class="strength-card" style="background: #f7ffe8; padding: 35px; border-radius: 20px; border: 1px solid #e2e8f0; box-shadow: 0 8px 30px rgba(0,0,0,0.02); transition: all 0.3s ease;">
						<div style="display: flex; align-items: flex-start; gap: 15px; margin-bottom: 15px;">
							<div style="width: 24px; height: 24px; background: #fff; color: #91c73d; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
							</div>
							<h3 style="font-size: 1.35rem; font-weight: 700; color: #0f172a; margin: 0; line-height: 1.3;"><?php echo esc_html( $item['title'] ); ?></h3>
						</div>
						<p style="font-size: 1.05rem; color: #64748b; line-height: 1.7; margin: 0;"><?php echo esc_html( $item['copy'] ); ?></p>
					</div>
					<?php endif; endfor; ?>
				</div>

				<!-- Center Title -->
				<div class="strengths-center" style="position: relative; text-align: center; z-index: 10;">
					<h2 style="font-size: 3rem; font-weight: 800; line-height: 1.1; color: #1e293b; margin: 0;">
						<span style="color: #91c73d;">Strengths That</span><br>Define Us
					</h2>
					
					<!-- Desktop Arrows (Integrated with Center) -->
					<div class="strengths-desktop-arrows" style="position: absolute; top: 50%; left: 50%; width: 700px; height: 450px; transform: translate(-50%, -50%); pointer-events: none; z-index: -1;">
						<svg width="100%" height="100%" viewBox="0 0 700 450" fill="none" style="display: block;">
							<!-- Top Left -->
							<path d="M 320 185 Q 240 165 150 135" stroke="#91c73d" stroke-width="2" stroke-dasharray="8 5" opacity="0.4" />
							<path d="M 162 142 L 145 133 L 160 126" stroke="#91c73d" stroke-width="2" stroke-linecap="round" opacity="0.6" />
							
							<!-- Top Right -->
							<path d="M 380 185 Q 460 165 550 135" stroke="#91c73d" stroke-width="2" stroke-dasharray="8 5" opacity="0.4" />
							<path d="M 540 126 L 555 133 L 538 142" stroke="#91c73d" stroke-width="2" stroke-linecap="round" opacity="0.6" />

							<!-- Bottom Left -->
							<path d="M 320 265 Q 240 285 150 315" stroke="#91c73d" stroke-width="2" stroke-dasharray="8 5" opacity="0.4" />
							<path d="M 162 308 L 145 317 L 160 324" stroke="#91c73d" stroke-width="2" stroke-linecap="round" opacity="0.6" />

							<!-- Bottom Right -->
							<path d="M 380 265 Q 460 285 550 315" stroke="#91c73d" stroke-width="2" stroke-dasharray="8 5" opacity="0.4" />
							<path d="M 540 324 L 555 317 L 538 308" stroke="#91c73d" stroke-width="2" stroke-linecap="round" opacity="0.6" />
						</svg>
					</div>
				</div>

				<!-- Right Cards -->
				<div class="strengths-right-col" style="display: flex; flex-direction: column; gap: 60px;">
					<?php for ($i = 0; $i < 2; $i++) : if (isset($content['strengths_items'][$i*2+1])) : $item = $content['strengths_items'][$i*2+1]; ?>
					<div class="strength-card" style="background: #f7ffe8; padding: 35px; border-radius: 20px; border: 1px solid #e2e8f0; box-shadow: 0 8px 30px rgba(0,0,0,0.02); transition: all 0.3s ease;">
						<div style="display: flex; align-items: flex-start; gap: 15px; margin-bottom: 15px;">
							<div style="width: 24px; height: 24px; background: #fff; color: #91c73d; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
							</div>
							<h3 style="font-size: 1.35rem; font-weight: 700; color: #0f172a; margin: 0; line-height: 1.3;"><?php echo esc_html( $item['title'] ); ?></h3>
						</div>
						<p style="font-size: 1.05rem; color: #64748b; line-height: 1.7; margin: 0;"><?php echo esc_html( $item['copy'] ); ?></p>
					</div>
					<?php endif; endfor; ?>
				</div>
			</div>
		</div>

		<style>
			@media (max-width: 1100px) {
				.strengths-wrapper { grid-template-columns: 1fr 280px 1fr !important; gap: 20px !important; }
				.strengths-center h2 { font-size: 2.25rem !important; }
				.strengths-desktop-arrows { width: 400px !important; height: 350px !important; }
			}
			@media (max-width: 991px) {
				.strengths-wrapper { display: flex !important; flex-direction: column !important; gap: 30px !important; }
				.strengths-mobile-header { display: block !important; }
				.strengths-center { display: none !important; }
				.strengths-left-col, .strengths-right-col { width: 100% !important; gap: 30px !important; }
			}
			.strength-card:hover { transform: translateY(-5px); border-color: #cbed9b !important; box-shadow: 0 20px 50px rgba(0,0,0,0.08) !important; }
		</style>
	</section>
	<?php endif; ?>




	<?php if ( ! empty( $content['bench_items'] ) ) : ?>
	<!-- Expert Bench Slider Section -->
	<section class="expert-bench-section" style="padding: 100px 0; background: #fff; overflow: hidden;">
		<div class="container" style="max-width: 1280px; margin: 0 auto; padding: 0 20px;">
			<div style="text-align: center; margin-bottom: 60px;">
				<h2 style="font-size: 3rem; font-weight: 800; color: #1a202c; margin-bottom: 20px;">
					Hire From Our <span style="color: #00d4ff;">Bench Of Experts</span>
				</h2>
				<p style="font-size: 1.15rem; color: #4a5568; max-width: 800px; margin: 0 auto; line-height: 1.6;">
					<?php echo esc_html( $content['bench_desc'] ); ?>
				</p>
			</div>

			<div class="expert-slider-container" style="position: relative;">
				<div class="expert-slider-track" id="expertSlider" style="display: flex; gap: 30px; overflow-x: auto; scroll-snap-type: x mandatory; scroll-behavior: smooth; padding-bottom: 40px; scrollbar-width: none; -ms-overflow-style: none;">
					<?php foreach ( $content['bench_items'] as $index => $item ) : ?>
					<div class="expert-card" style="flex: 0 0 300px; scroll-snap-align: start; background: #fff; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; border: 1px solid #f1f5f9; transition: transform 0.3s ease;">
						<?php if ( $item['img'] ) : ?>
						<div class="expert-img" style="height: 250px; overflow: hidden;">
							<img src="<?php echo esc_url( $item['img'] ); ?>" alt="<?php echo esc_attr( $item['role'] ); ?>" style="width: 100%; height: 100%; object-fit: cover;">
						</div>
						<?php endif; ?>
						<div style="padding: 25px;">
							<?php if ( $item['tag'] ) : ?>
							<span style="display: inline-block; padding: 4px 12px; border-radius: 6px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; margin-bottom: 15px; border: 1px solid #e2e8f0; color: #64748b;">
								<?php echo esc_html( $item['tag'] ); ?>
							</span>
							<?php endif; ?>
							<h3 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 10px;">
								<?php echo esc_html( $item['role'] ); ?>
							</h3>
							<p style="font-size: 0.95rem; color: #64748b; line-height: 1.5; margin-bottom: 25px;">
								<?php echo esc_html( $item['desc'] ); ?>
							</p>
							<a href="#contact" style="display: inline-flex; align-items: center; gap: 8px; background: #0f172a; color: #fff; padding: 10px 20px; border-radius: 10px; font-weight: 600; font-size: 0.9rem; text-decoration: none; transition: background 0.3s ease;">
								Hire Now 
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
									<line x1="7" y1="17" x2="17" y2="7"></line>
									<polyline points="7 7 17 7 17 17"></polyline>
								</svg>
							</a>
						</div>
					</div>
					<?php endforeach; ?>
				</div>

				<!-- Navigation Dots -->
				<div class="slider-dots" id="sliderDots" style="display: flex; justify-content: center; gap: 10px; margin-top: 20px;">
					<?php foreach ( $content['bench_items'] as $index => $item ) : ?>
					<button data-index="<?php echo $index; ?>" style="width: 10px; height: 10px; border-radius: 50%; border: none; background: #e2e8f0; cursor: pointer; transition: all 0.3s ease;"></button>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<style>
			.expert-slider-track::-webkit-scrollbar { display: none; }
			.expert-card:hover { transform: translateY(-10px); }
			.slider-dots button.active { background: #00d4ff !important; width: 25px !important; border-radius: 10px !important; }
		</style>

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const slider = document.getElementById('expertSlider');
				const dots = document.querySelectorAll('#sliderDots button');
				
				if (!slider || dots.length === 0) return;

				const updateDots = () => {
					const scrollLeft = slider.scrollLeft;
					const itemWidth = slider.querySelector('.expert-card').offsetWidth + 30; // 30 is gap
					const activeIndex = Math.round(scrollLeft / itemWidth);
					
					dots.forEach((dot, i) => {
						if (i === activeIndex) dot.classList.add('active');
						else dot.classList.remove('active');
					});
				};

				slider.addEventListener('scroll', updateDots);
				
				dots.forEach(dot => {
					dot.addEventListener('click', () => {
						const index = dot.getAttribute('data-index');
						const itemWidth = slider.querySelector('.expert-card').offsetWidth + 30;
						slider.scrollTo({
							left: index * itemWidth,
							behavior: 'smooth'
						});
					});
				});

				// Set first dot active
				updateDots();
			});
		</script>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $content['why_pillars'] ) ) : ?>
	<!-- 5. WHY CHOOSE US -->
	<section style="padding: 100px 0; background: white;">
		<div class="container">
			<div class="text-center" style="margin-bottom: 60px;">
				<h2 class="why-outsourcing-title" style="font-size: 2.5rem; color: #1a202c; font-weight: 800; margin-bottom: 1.5rem;"><?php echo esc_html( $content['why_title'] ); ?></h2>
				<p style="font-size: 1.1rem; color: #718096;"><?php echo esc_html( $content['why_desc'] ); ?></p>
			</div>

			<div class="outsourcing-why-grid">
				<?php foreach ( $content['why_pillars'] as $pillar ) : ?>
				<div style="background: #f8fafc; padding: 40px; border-radius: 8px; border-top: 4px solid var(--accent-primary);">
					<h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #1a202c;"><?php echo esc_html( $pillar['title'] ); ?></h3>
					<p style="color: #4a5568;"><?php echo esc_html( $pillar['copy'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $content['reviews'] ) ) : ?>
	<!-- 6. RAVING REVIEWS -->
	<section style="background: #f8fafc; padding: 100px 0;">
		<div class="container">
			<h2 style="text-align: center; font-size: 2.5rem; font-weight: 800; margin-bottom: 60px;"><?php echo esc_html( $content['reviews_title'] ); ?></h2>
			<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
				<?php foreach ( $content['reviews'] as $review ) : ?>
				<div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
					<p style="font-style: italic; margin-bottom: 1.5rem;"><?php echo esc_html( $review['quote'] ); ?></p>
					<div style="font-weight: 700;"><?php echo esc_html( $review['name'] ); ?></div>
					<div style="font-size: 0.8rem; color: #a0aec0;"><?php echo esc_html( $review['role'] ); ?></div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $content['skillsets'] ) ) : ?>
	<!-- 7. TECHNICAL INVENTORY (White background) -->
	<section style="background-color: white; padding: 100px 0; border-bottom: 1px solid #f1f5f9;">
		<div class="container">
			<h2 style="text-align: center; font-size: 2.5rem; font-weight: 800; margin-bottom: 60px;"><?php echo esc_html( $content['skillsets_title'] ); ?></h2>
			<div class="outsourcing-tech-grid">
				<?php foreach ( $content['skillsets'] as $skill ) : ?>
				<div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 10px 20px rgba(0,0,0,0.02); height: 100%;">
					<h4 style="font-size: 1.1rem; margin-bottom: 1rem; color: var(--accent-primary); font-weight: 700;"><?php echo esc_html( $skill['cat'] ); ?></h4>
					<p style="font-size: 0.9rem; color: #4a5568; line-height: 1.5;"><?php echo esc_html( $skill['list'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- 8. FINAL CTA & CONTACT FORM (Aligned with Official Contact Page Style) -->
	<section id="contact" class="section contact-section" style="background-color: #f7ffe8; padding: 120px 0;">
		<div class="container">
			<div class="contact-grid">
				
				<!-- Left Column: Copy & Methods -->
				<div class="contact-copy">
					<h1 class="contact-heading" style="font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 300; line-height: 1.1; margin-bottom: 2rem; color: #1e293b; letter-spacing: -0.02em;">
						<?php 
						$title = !empty($content['contact_title']) ? $content['contact_title'] : "Ready to build something\namazing?";
						echo nl2br(esc_html($title)); 
						?>
					</h1>
					<p class="contact-subtitle" style="font-size: 1.25rem; color: #4a5568; margin-bottom: 2rem; line-height: 1.6;">
						<?php echo esc_html( !empty($content['contact_subtitle']) ? $content['contact_subtitle'] : "Whether you're a startup or a business, we'd love to hear from you." ); ?>
					</p>
					
					<p class="contact-description" style="margin-bottom: 4rem; color: #64748b; font-size: 1.1rem; line-height: 1.7;">
						<?php 
						$desc = !empty($content['contact_desc']) ? $content['contact_desc'] : "Send us an email or simply fill out the form.\nWe're here to answer your questions →";
						echo nl2br(esc_html($desc)); 
						?>
					</p>

					<div class="contact-methods" style="display: flex; gap: 60px; border-top: 1px solid rgba(0,0,0,0.08); padding-top: 40px;">
						<div class="contact-method">
							<h4 style="font-size: 1.1rem; color: #1e293b; margin-bottom: 0.75rem; font-weight: 700;"><?php esc_html_e( 'Email Us', 'factor-2' ); ?></h4>
							<a href="mailto:<?php echo esc_attr( $content['contact_email'] ); ?>" style="font-size: 1.125rem; font-weight: 600; color: var(--accent-primary);"><?php echo esc_html( $content['contact_email'] ); ?></a>
						</div>
						<div class="contact-method">
							<h4 style="font-size: 1.1rem; color: #1e293b; margin-bottom: 0.75rem; font-weight: 700;"><?php esc_html_e( 'Call Us', 'factor-2' ); ?></h4>
							<a href="tel:<?php echo esc_attr( $content['contact_phone'] ); ?>" style="font-size: 1.125rem; font-weight: 600; color: var(--accent-primary);"><?php echo esc_html( $content['contact_phone'] ); ?></a>
						</div>
					</div>
				</div>

				<!-- Right Column: Form Container -->
				<div class="contact-form-container">
					<div style="background: white; padding: 50px; border-radius: 12px; box-shadow: 0 40px 80px rgba(0,0,0,0.06); border: 1px solid #f1f5f9;">
						<?php if ( $form_sent ) : ?>
							<div style="text-align: center; padding: 40px 0;">
								<div style="width: 60px; height: 60px; background: #def7ec; color: #03543f; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
									<svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
								</div>
								<h3 style="margin-bottom: 10px;">Message Sent!</h3>
								<p style="color: #6b7280;">Thank you for reaching out. Our team will contact you shortly.</p>
							</div>
						<?php else : ?>
							<form class="contact-form" action="#contact" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
							<?php wp_nonce_field('f2_outsourcing_contact', 'f2_outsourcing_nonce'); ?>
							<div class="form-group">
								<input type="text" name="contact_name" placeholder="Name*" required style="width: 100%; padding: 18px; background: white; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
							</div>
							<div class="form-group">
								<input type="tel" name="contact_mobile" placeholder="Mobile" style="width: 100%; padding: 18px; background: white; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
							</div>
							<div class="form-group">
								<input type="email" name="contact_email" placeholder="Email*" required style="width: 100%; padding: 18px; background: white; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
							</div>
							<div class="form-group">
								<textarea name="contact_message" placeholder="Message*" rows="5" required style="width: 100%; padding: 18px; background: white; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; resize: none; box-shadow: 0 4px 6px rgba(0,0,0,0.02);"></textarea>
							</div>
							<button type="submit" class="contact-submit-btn" style="width: 100%; background: #2563eb; color: white; border: none; padding: 18px; font-weight: 700; border-radius: 9999px; cursor: pointer; transition: all 0.3s; font-size: 1.1rem; box-shadow: 0 4px 14px rgba(37, 99, 235, 0.4);">
								Submit Message
							</button>
							<p style="font-size: 0.75rem; color: #a0aec0; text-align: center; margin-top: 10px;">
								This site is protected by reCAPTCHA and the Google <a href="#" style="color: #a0aec0; text-decoration: underline;">Privacy Policy</a> and <a href="#" style="color: #a0aec0; text-decoration: underline;">Terms of Service</a> apply.
							</p>
						</form>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
