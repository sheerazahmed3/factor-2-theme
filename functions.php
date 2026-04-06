<?php
/**
 * Theme setup, assets, and homepage helpers.
 *
 * @package Factor_2
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Register theme supports and menus.
 */
function factor_2_setup()
{
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('align-wide');
	add_theme_support(
		'custom-logo',
		array(
		'height' => 80,
		'width' => 80,
		'flex-height' => true,
		'flex-width' => true,
	)
	);
	add_theme_support(
		'html5',
		array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'search-form',
		'script',
		'style',
	)
	);

	register_nav_menus(
		array(
		'primary' => __('Primary Menu', 'factor-2'),
	)
	);
}
add_action('after_setup_theme', 'factor_2_setup');

/**
 * Auto-create essential pages if they do not exist (runs once).
 */

function factor_2_create_essential_pages()
{
	$pages_to_create = array(
			array('title' => 'Contact', 'template' => 'page-contact.php'),
			array('title' => 'Startup', 'template' => 'page-startup.php'),
			array('title' => 'AI Development', 'template' => 'page-ai-development.php'),
			array('title' => 'Consulting & Strategy', 'template' => 'page-consulting-strategy.php'),
			array('title' => 'Tech Staff Outsourcing', 'template' => 'page-tech-staff-outsourcing.php'),
			array('title' => 'App Development', 'template' => 'page-app-development.php'),
			array('title' => 'Web Development', 'template' => 'page-web-development.php'),
			array('title' => 'Testing', 'template' => 'page-testing.php'),
			array('title' => 'Portfolio', 'template' => 'page-portfolio.php'),
	);

	foreach ($pages_to_create as $page_data) {
		// Try to find the page by title exactly
		$existing_page = get_page_by_title($page_data['title']);

		if ($existing_page) {
			// Ensure it has the correct template assigned
			update_post_meta($existing_page->ID, '_wp_page_template', $page_data['template']);
		}
		else {
			// Check if "Strategy" page exists and rename it
			if ('Consulting & Strategy' === $page_data['title']) {
				$old_page = get_page_by_title('Strategy');
				if ($old_page) {
					wp_update_post(array(
						'ID' => $old_page->ID,
						'post_title' => 'Consulting & Strategy',
						'post_name' => 'consulting-strategy',
					));
					update_post_meta($old_page->ID, '_wp_page_template', $page_data['template']);
					continue;
				}
			}

			// Create it if it doesn't exist
			$new_page_id = wp_insert_post(array(
				'post_title' => $page_data['title'],
				'post_status' => 'publish',
				'post_type' => 'page',
			));
			if (!is_wp_error($new_page_id)) {
				update_post_meta($new_page_id, '_wp_page_template', $page_data['template']);
			}
		}
	}

	// Force update menu items titled "Strategy" to "Consulting & Strategy"
	$menus = wp_get_nav_menus();
	foreach ($menus as $menu) {
		$items = wp_get_nav_menu_items($menu->term_id);
		if (!empty($items)) {
			foreach ($items as $item) {
				if ('Strategy' === $item->title) {
					wp_update_nav_menu_item($menu->term_id, $item->ID, array(
						'menu-item-title' => 'Consulting & Strategy',
					));
				}
			}
		}
	}
}
add_action('init', 'factor_2_create_essential_pages');

/**
 * Enqueue fonts, stylesheet, and navigation script.
 */
function factor_2_enqueue_assets()
{
	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_style(
		'factor-2-fonts',
		'https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Manrope:wght@400;500;600;700;800&family=Noto+Sans:wght@600;900&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'factor-2-style',
		get_stylesheet_uri(),
		array('factor-2-fonts'),
		$theme_version
	);

	wp_enqueue_script(
		'factor-2-script',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$theme_version,
		true
	);
}
add_action('wp_enqueue_scripts', 'factor_2_enqueue_assets');

/**
 * Parse a pipe-delimited textarea value into an array of arrays.
 * Format: "Label|Value" per line → array( array( 'label' => ..., 'value' => ... ) )
 */
function factor_2_parse_pipe_textarea($raw, $keys = array('label', 'value'))
{
	$lines = array_filter(array_map('trim', explode("\n", $raw)));
	$items = array();
	foreach ($lines as $line) {
		$parts = array_map('trim', explode('|', $line, count($keys)));
		$item = array();
		foreach ($keys as $i => $key) {
			$item[$key] = isset($parts[$i]) ? $parts[$i] : '';
		}
		$items[] = $item;
	}
	return $items;
}

/**
 * Parse a simple textarea into a flat array (one item per line).
 */
function factor_2_parse_lines($raw)
{
	return array_filter(array_map('trim', explode("\n", $raw)));
}

/**
 * Default anchor navigation for the landing page (fallback only).
 *
 * @return array
 */
function factor_2_get_primary_nav_items()
{
	return array(
			array(
			'label' => __('Services', 'factor-2'),
			'url' => '#',
			'children' => array(
					array('label' => __('App Development', 'factor-2'), 'url' => site_url('/app-development/')),
					array('label' => __('Web Development', 'factor-2'), 'url' => site_url('/web-development/')),
					array('label' => __('AI Development', 'factor-2'), 'url' => site_url('/ai-development/')),
					array('label' => __('Consulting & Strategy', 'factor-2'), 'url' => site_url('/consulting-strategy/')),
					array('label' => __('Startup', 'factor-2'), 'url' => site_url('/startup/')),
					array('label' => __('Tech Staff Outsourcing', 'factor-2'), 'url' => site_url('/tech-staff-outsourcing/')),
			),
		),
			array(
			'label' => __('Startups', 'factor-2'),
			'url' => site_url('/startup/'),
		),
			array(
			'label' => __('Portfolio', 'factor-2'),
			'url' => site_url('/portfolio/'),
		),
			array(
			'label' => __('About', 'factor-2'),
			'url' => home_url('/#about'),
		),
			array(
			'label' => __('Blog', 'factor-2'),
			'url' => home_url('/#blog'),
		),
			array(
			'label' => __('Contact', 'factor-2'),
			'url' => site_url('/contact/'),
			'is_cta' => true,
		),
	);
}

/**
 * Homepage content — pulls from Customizer + CPTs.
 *
 * @return array
 */
function factor_2_get_homepage_content()
{

	// --- Services from CPT (fallback to defaults) ---
	$services = factor_2_get_services();
	if (empty($services)) {
		$services = array(
				array('eyebrow' => 'Consulting & Strategy', 'title' => 'Product Consulting & Strategy', 'copy' => 'We align business objectives with technical feasibility.', 'url' => '#'),
				array('eyebrow' => 'App Design', 'title' => 'UI/UX Design & Prototyping', 'copy' => 'Creating intuitive, engaging, and accessible interfaces.', 'url' => '#'),
				array('eyebrow' => 'App Development', 'title' => 'iOS, Android & Web Engineering', 'copy' => 'Robust, scalable development using modern frameworks.', 'url' => '#'),
				array('eyebrow' => 'Support', 'title' => 'Maintenance & Evolution', 'copy' => 'Long-term partnership ensuring your app stays up-to-date.', 'url' => '#'),
		);
	}

	// --- Testimonials from CPT ---
	$testimonials = factor_2_get_testimonials();
	if (empty($testimonials)) {
		$testimonials = array();
	}

	// --- Portfolio from CPT ---
	$showcase = factor_2_get_portfolio();
	if (empty($showcase)) {
		$showcase = array();
	}

	// --- Audiences from Customizer ---
	$audiences_raw = get_theme_mod('f2_home_audiences', "Business|https://example.com\nStartup|https://example.com");
	$audiences = factor_2_parse_pipe_textarea($audiences_raw, array('label', 'url'));

	// --- Reasons from Customizer ---
	$reasons = array();
	for ($i = 1; $i <= 6; $i++) {
		$title = get_theme_mod("f2_reason_{$i}_title", '');
		$copy = get_theme_mod("f2_reason_{$i}_copy", '');
		if (!empty($title)) {
			$reasons[] = array('title' => $title, 'copy' => $copy);
		}
	}
	if (empty($reasons)) {
		$reasons = array();
	}

	// --- Client logos from Customizer ---
	$client_logos = factor_2_parse_lines(get_theme_mod('f2_client_logos', "Enterprise Client A\nGovernment Dept B\nStartup Unicorn C\nGlobal Retailer D"));

	// --- Footer: Offices, Social, Quick Links ---
	$offices = factor_2_parse_lines(get_theme_mod('f2_footer_offices', "App Studio Melbourne\nApp Studio Sydney"));

	$social_links = array();
	for ($i = 1; $i <= 5; $i++) {
		$label = get_theme_mod("f2_social_{$i}_label", '');
		$url = get_theme_mod("f2_social_{$i}_url", '');
		if (!empty($label) && !empty($url)) {
			$social_links[] = array('label' => $label, 'url' => $url);
		}
	}
	if (empty($social_links)) {
		$social_links = array(
				array('label' => 'LinkedIn', 'url' => 'https://example.com'),
				array('label' => 'Instagram', 'url' => 'https://example.com'),
				array('label' => 'Facebook', 'url' => 'https://example.com'),
		);
	}

	$quick_links = factor_2_parse_lines(get_theme_mod('f2_footer_quick_links', "Mobile App Development\nWeb App Development\nApp Design"));

	return array(
		'hero_lines' => explode("\n", get_theme_mod('f2_home_hero_title', "Software Development for\nBusinesses & Startups")),
		'hero_copy' => get_theme_mod('f2_home_hero_lede', 'A leading app, web development, and AI solutions company delivering powerful, scalable digital products for businesses and startups.'),
		'hero_cta_text' => get_theme_mod('f2_hero_cta_text', 'Book a free consult →'),
		'intro_kicker' => get_theme_mod('f2_home_intro_kicker', 'Intro'),
		'intro_title' => get_theme_mod('f2_home_intro_title', 'A top-tier web & mobile app development company based in your city.'),
		'intro_copy' => get_theme_mod('f2_home_intro_copy', 'We specialize in transforming complex business challenges into sleek, high-performing digital products.'),
		'audiences' => $audiences,
		'services_kicker' => get_theme_mod('f2_services_kicker', 'Our Services'),
		'services_heading' => get_theme_mod('f2_services_heading', 'End-to-End Digital Product Delivery.'),
		'services_description' => get_theme_mod('f2_services_description', 'We provide all the capabilities needed to take a complex business idea and turn it into a secure, scalable application.'),
		'services_btn_text' => get_theme_mod('f2_services_btn_text', 'Learn more'),
		'experience_kicker' => get_theme_mod('f2_experience_kicker', 'Our Experience'),
		'experience_heading' => get_theme_mod('f2_experience_heading', 'Proven success across industries.'),
		'experience_intro' => get_theme_mod('f2_home_experience_intro', 'A proven track record delivering mobile and web projects across healthcare, logistics, and operations.'),
		'showcase_cards' => $showcase,
		'consult_kicker' => get_theme_mod('f2_consult_kicker', 'Consultation'),
		'consult_heading' => get_theme_mod('f2_consult_heading', 'Speak with our team about your app idea or your next product release.'),
		'consult_copy' => get_theme_mod('f2_consult_copy', 'Book a FREE 30-minute consultation to discuss your app idea.'),
		'consult_btn_text' => get_theme_mod('f2_consult_btn_text', 'Request a call'),
		'reviews_kicker' => get_theme_mod('f2_reviews_kicker', 'Client Reviews'),
		'reviews_heading' => get_theme_mod('f2_reviews_heading', 'Trusted by founders and enterprise leaders.'),
		'testimonials' => $testimonials,
		'reasons_kicker' => get_theme_mod('f2_reasons_kicker', 'Why Choose Us'),
		'reasons_heading' => get_theme_mod('f2_reasons_heading', 'A framework for reliable delivery.'),
		'client_logos' => $client_logos,
		'clients_kicker' => get_theme_mod('f2_clients_kicker', 'Our Clients & Partners'),
		'reasons' => $reasons,
		'services' => $services,
		'offices' => $offices,
		'social_links' => $social_links,
		'quick_links' => $quick_links,
	);
}

/**
 * Retrieve recent post cards for the insights section with a fallback.
 *
 * @param int $count Number of items to return.
 * @return array<int, array<string, string>>
 */
function factor_2_get_insight_cards($count = 3)
{
	$posts = get_posts(
		array(
		'numberposts' => $count,
		'post_status' => 'publish',
	)
	);

	if (empty($posts)) {
		return array(
				array(
				'eyebrow' => __('Playbook', 'factor-2'),
				'title' => __('How to scope a digital product without inflating the first release.', 'factor-2'),
				'excerpt' => __('A clear framework for splitting must-have functionality from expensive assumptions before delivery starts.', 'factor-2'),
				'date' => __('Placeholder article', 'factor-2'),
				'url' => 'https://example.com',
			),
				array(
				'eyebrow' => __('Guide', 'factor-2'),
				'title' => __('What founders should prepare before bringing in a senior product squad.', 'factor-2'),
				'excerpt' => __('From business goals to technical unknowns, the quality of your starting context shapes the speed of the next quarter.', 'factor-2'),
				'date' => __('Placeholder article', 'factor-2'),
				'url' => 'https://example.com',
			),
				array(
				'eyebrow' => __('Notes', 'factor-2'),
				'title' => __('The difference between a polished interface and a genuinely reliable product system.', 'factor-2'),
				'excerpt' => __('Good product work joins design decisions, operational realities, and engineering resilience instead of treating them separately.', 'factor-2'),
				'date' => __('Placeholder article', 'factor-2'),
				'url' => 'https://example.com',
			),
		);
	}

	$cards = array();

	foreach ($posts as $post) {
		$post_id = $post->ID;
		$terms = get_the_terms($post_id, 'category');
		$term_label = __('Article', 'factor-2');
		$excerpt = has_excerpt($post_id) ? get_the_excerpt($post_id) : wp_trim_words(wp_strip_all_tags(get_post_field('post_content', $post_id)), 24, '...');

		if (!empty($terms) && !is_wp_error($terms)) {
			$term_label = $terms[0]->name;
		}

		$cards[] = array(
			'eyebrow' => $term_label,
			'title' => get_the_title($post_id),
			'excerpt' => $excerpt,
			'date' => get_the_date('M j, Y', $post_id),
			'url' => get_permalink($post_id),
		);
	}

	return $cards;
}

/**
 * Startup page content — pulls from Customizer.
 *
 * @return array
 */
function factor_2_get_startup_content()
{

	// Impact cards from Customizer
	$impact_raw = get_theme_mod('f2_startup_impact_cards', "HealthConnect|Pushing for better accessible healthcare\nEduLearn Share|Making education information accessible globally\nMindful Habit|Supporting mental wellness and daily habits");
	$impact_cards = factor_2_parse_pipe_textarea($impact_raw, array('title', 'copy'));

	// Sectors from Customizer
	$sectors_raw = get_theme_mod('f2_startup_sectors', "Health and Wellness|Healthcare systems are intricate.\nNon-Profit and Social Enterprise|We help founders turn purpose into action.\nEducation, Fintech, Logistics|We bring the same depth to every build.");
	$sectors = factor_2_parse_pipe_textarea($sectors_raw, array('title', 'copy'));

	// Startup services from Customizer
	$services_raw = get_theme_mod('f2_startup_services', "Consulting & Strategy|Launch your product in the right direction.\nPrototypes and proof-of-concepts|Derisk your app idea with an interactive prototype.\nMVP app development|Accelerate your path to market.\nCommercialisation support|Turn your idea into a commercially viable product.");
	$startup_services = factor_2_parse_pipe_textarea($services_raw, array('title', 'copy'));

	return array(
		'hero_title' => get_theme_mod('f2_startup_hero_title', 'Take your app startup further, faster'),
		'hero_copy' => get_theme_mod('f2_startup_hero_copy_1', 'With extensive experience helping founders drive innovation through web and mobile apps, Factor Labs understands the unique challenges of building a new venture from scratch.'),
		'hero_copy_2' => get_theme_mod('f2_startup_hero_copy_2', "Our agile, dedicated team cares about your product well beyond launch."),
		'impact_title' => 'PRODUCTS DESIGNED FOR IMPACT',
		'impact_cards' => $impact_cards,
		'sectors' => $sectors,
		'services' => $startup_services,
		'consult_copy' => get_theme_mod('f2_consult_copy', 'Talk to our team to explore your product direction.'),
	);
}

/**
 * App Development page content — pulls from Customizer.
 *
 * @return array
 */
function factor_2_get_app_content()
{
	// 1. Try to build services from individual fields first
	$app_services = array();
	for ($i = 1; $i <= 4; $i++) {
		$title = get_theme_mod("f2_app_service_{$i}_title");
		$copy = get_theme_mod("f2_app_service_{$i}_copy");
		$image = get_theme_mod("f2_app_service_{$i}_img");

		if (!empty($title) || !empty($copy)) {
			$app_services[] = array(
				'title' => $title,
				'copy' => $copy,
				'image' => $image,
			);
		}
	}

	// 2. Fallback to old pipe-delimited textarea if no individual fields are set
	if (empty($app_services)) {
		$app_raw = get_theme_mod('f2_app_services_raw', "Native iPhone & iPad Development|Factor Labs specializes in crafting premium iOS experiences. Since the early days of the App Store, we've been at the forefront of Apple's ecosystem, delivering intuitive and powerful applications for iPhone and iPad using Swift and SwiftUI.\nScalable Android Solutions|We develop robust mobile and tablet applications for the Android ecosystem. Leveraging the latest Kotlin and Jetpack Compose technologies, we ensure your app is optimized for performance across the vast array of Android devices.\nCross-Platform Excellence|For faster time-to-market, we utilize modern frameworks like React Native and Flutter. This allows us to maintain a single codebase while delivering native-level performance on both iOS and Android platforms.\nEmerging Tech Integration|Stay ahead of the competition by integrating cutting-edge technologies. From AI-driven features and machine learning to IoT and AR/VR, we help you leverage the tech of tomorrow, today.");
		$app_services = factor_2_parse_pipe_textarea($app_raw, array('title', 'copy'));

		// Attach Images
		foreach ($app_services as $index => &$service) {
			$img_num = $index + 1;
			$service['image'] = get_theme_mod("f2_app_service_{$img_num}_img");
		}
	}

	// Process steps from Customizer
	$process_raw = get_theme_mod('f2_app_process_raw', "Strategic Discovery|We begin by aligning your business goals with technical feasibility, identifying key user needs and market opportunities to define a winning roadmap.\nUser-Centric Design|Our design team focuses on creating intuitive, engaging interfaces that prioritize the user journey, ensuring your app is as beautiful as it is functional.\nAgile Engineering|Following modern agile practices, we build your application in iterative sprints. You'll have full visibility into progress with frequent feedback loops.\nLaunch & Evolution|Beyond the initial launch, we provide ongoing support and data-driven updates to ensure your application continues to scale and respond to user needs.");
	$process_steps = factor_2_parse_pipe_textarea($process_raw, array('title', 'copy'));

	// Tech Stack from individual fields
	$tech_items = array();
	for ($i = 1; $i <= 10; $i++) {
		$img = get_theme_mod("f2_tech_app_img_{$i}");
		$name = get_theme_mod("f2_tech_app_text_{$i}");
		if ($img || $name) {
			$tech_items[] = array(
				'name' => $name,
				'logo' => $img,
				'is_url' => true
			);
		}
	}

	// Fallback to defaults if no custom items are set
	if (empty($tech_items)) {
		$default_items = array(
			'Swift' => 'swift.png',
			'SwiftUI' => 'swiftui.png',
			'Kotlin' => 'kotlin.png',
			'Jetpack Compose' => 'jetpack-compose.png',
			'Flutter' => 'flutter.png',
			'React Native' => 'react-native.png',
			'Kotlin Multiplatform' => 'kotlin-multiplatform.png'
		);
		foreach ($default_items as $name => $logo) {
			$tech_items[] = array(
				'name' => $name,
				'logo' => $logo,
				'is_url' => false
			);
		}
	}

	return array(
		'hero_badge' => get_theme_mod('f2_app_hero_badge', 'Mobile Solutions'),
		'hero_title' => get_theme_mod('f2_app_hero_title', 'High-Performance Mobile App Development'),
		'hero_copy' => get_theme_mod('f2_app_hero_copy', 'Transforming complex business challenges into powerful, scalable mobile experiences for startups and enterprise leaders.'),
		'hero_bg' => get_theme_mod('f2_app_hero_bg'),
		'rotating_phrases' => get_theme_mod('f2_app_rotating_phrases', 'CONVERT BETTER,EXCEED EXPECTATIONS,DELIGHT CUSTOMERS'),
		'services' => $app_services,
		'process' => $process_steps,
		'tech_stack' => array(
			'kicker' => get_theme_mod('f2_app_tech_kicker', 'core tech'),
			'title'  => get_theme_mod('f2_app_tech_title', 'tech stack'),
			'items'  => $tech_items,
		),
		'consult_copy' => get_theme_mod('f2_consult_copy', 'Book a FREE 30-minute consultation with our team to discuss your app idea.'),
	);
}

/**
 * Web Development page content — pulls from Customizer.
 *
 * @return array
 */
function factor_2_get_web_content()
{
	// Individual Service Details (up to 6)
	$web_services = array();
	for ($i = 1; $i <= 6; $i++) {
		$title = get_theme_mod("f2_web_service_{$i}_title");
		$copy = get_theme_mod("f2_web_service_{$i}_copy");
		$image = get_theme_mod("f2_web_service_{$i}_img");

		if (!empty($title)) {
			$web_services[] = array(
				'title' => $title,
				'copy' => $copy,
				'image' => $image,
			);
		}
	}

	// Fallback to old pipe-delimited textarea if no individual fields are set
	if (empty($web_services)) {
		$web_raw = get_theme_mod('f2_web_services_raw', "Frontend App Development|We build powerful web applications using modern frontend technologies like React and Vue.\nBackend App Development|Robust and scalable backend systems to power your web applications.\nE-commerce Solutions|Custom e-commerce platforms designed to convert and scale.");
		$web_services = factor_2_parse_pipe_textarea($web_raw, array('title', 'copy'));
	}

	// Process steps from Customizer
	$process_raw = get_theme_mod('f2_web_process_raw', "Architecture Planning|Defining the technology stack and system architecture to ensure long-term scalability and performance.\nUI/UX Engineering|Crafting seamless web experiences that work perfectly across all devices and browsers.\nModern Web Development|Building high-performance web applications using the latest frontend and backend frameworks.\nDeployment & Optimization|Ensuring smooth deployment and continuous performance tuning to keep your web presence fast and reliable.");
	$process_steps = factor_2_parse_pipe_textarea($process_raw, array('title', 'copy'));

	return array(
		'hero_badge' => get_theme_mod('f2_web_hero_badge', 'Web Solutions'),
		'hero_title' => get_theme_mod('f2_web_hero_title', 'Quality Web Development Services for Forward-Thinking Companies & Startups'),
		'hero_copy' => get_theme_mod('f2_web_hero_copy', 'Experts at building scalable and quality solutions that'),
		'rotating_phrases' => get_theme_mod('f2_web_rotating_phrases', 'CONVERT BETTER,EXCEED EXPECTATIONS,DELIGHT CUSTOMERS'),
		'hero_bg' => get_theme_mod('f2_web_hero_bg'),
		'intro_kicker' => get_theme_mod('f2_web_intro_kicker', 'Web Engineering'),
		'intro_copy' => get_theme_mod('f2_web_intro_copy', 'From modern websites to complex platforms, we deliver high-performance solutions tailored to your business needs. Our services also include cloud architecture, API integrations, hosting, and ongoing maintenance to keep your platform secure and ready to scale.'),
		'services' => $web_services,
		'process' => $process_steps,
		'consult_title' => get_theme_mod('f2_web_consult_title', 'Ready to launch your platform?'),
		'consult_copy' => get_theme_mod('f2_web_consult_copy', 'Book a FREE 30-minute consultation with our Managing Director to discuss your web product, technical requirements, and the development process.'),
		'consult_btn' => get_theme_mod('f2_web_consult_btn', 'Book now'),
	);
}

/**
 * Get content for AI Development page
 */
function factor_2_get_ai_content()
{
	// Parse value prop items
	$value_raw = get_theme_mod('f2_ai_value_items', "Machine Learning|Custom models built to solve your unique business challenges.\nNatural Language Processing|Interact with users more naturally through advanced chatbots and sentiment analysis.\nComputer Vision|Automate visual inspection and analysis with high-accuracy image recognition.\nPredictive Analytics|Anticipate trends and behaviors to stay ahead of the competition.");
	$value_items = factor_2_parse_pipe_textarea($value_raw, array('title', 'copy'));

	// Expert bench slider data
	$bench_items = array();
	for ($i = 1; $i <= 9; $i++) {
		$img = get_theme_mod("f2_ai_bench_item_{$i}_img");
		$role = get_theme_mod("f2_ai_bench_item_{$i}_role");
		if (!empty($img) || !empty($role)) {
			$bench_items[] = array(
				'img' => $img,
				'tag' => get_theme_mod("f2_ai_bench_item_{$i}_tag"),
				'role' => $role,
				'desc' => get_theme_mod("f2_ai_bench_item_{$i}_desc"),
			);
		}
	}

	return array(
		'hero_badge' => get_theme_mod('f2_ai_hero_badge', 'AI Solutions'),
		'hero_title' => get_theme_mod('f2_ai_hero_title', 'AI Development Services'),
		'hero_subtitle' => get_theme_mod('f2_ai_hero_subtitle', 'Innovate with Intelligence'),
		'hero_copy' => get_theme_mod('f2_ai_hero_desc', 'We build secure, scalable, and intelligent AI solutions tailored for businesses and startups.'),
		'rotating_phrases' => get_theme_mod('f2_ai_rotating_phrases', 'OPTIMIZE PROCESSES,ENHANCE EXPERIENCES,DRIVE INNOVATION'),
		'hero_bg' => get_theme_mod('f2_ai_hero_bg'),
		'hero_cta' => get_theme_mod('f2_ai_hero_cta', 'Book a free consult'),
		'trust_badge_1' => get_theme_mod('f2_ai_trust_badge_1', 'Expert AI Architects'),
		'trust_badge_2' => get_theme_mod('f2_ai_trust_badge_2', 'Data-Driven Insights'),
		'value_title' => get_theme_mod('f2_ai_value_title', 'Why Choose Our AI Development?'),
		'value_desc' => get_theme_mod('f2_ai_value_desc', 'We combine cutting-edge AI technology with deep industry expertise to deliver solutions that are not only intelligent but also practical and scalable.'),
		'value_img' => get_theme_mod('f2_ai_value_img'),
		'value_items' => $value_items,
		'offerings_title' => get_theme_mod('f2_ai_offerings_title', 'Our Offerings'),
		'offerings_items' => (function() {
			$items = array();
			$defaults = array(
				1 => array('label' => 'AI Integration', 'title' => 'AI Integration', 'desc' => 'Connect AI to your existing systems and workflows (CRM, ERP, support, analytics) so it can automate tasks and surface answers where teams already work.', 'url' => '/contact/', 'link_text' => 'AI Integration Services'),
				2 => array('label' => 'AI Product Development', 'title' => 'AI Product Development', 'desc' => 'Design and build AI-powered products end to end—from discovery and prototypes to production launch—focused on measurable user and business value.', 'url' => '/contact/', 'link_text' => 'AI Product Development Services'),
				3 => array('label' => 'AI Strategy Consulting', 'title' => 'AI Strategy Consulting', 'desc' => 'Define where AI fits in your business, prioritize use cases, and create a practical roadmap covering data, tech, risks, and rollout.', 'url' => '/contact/', 'link_text' => 'AI Strategy Consulting'),
				4 => array('label' => 'Data Strategy Consulting', 'title' => 'Data Strategy Consulting', 'desc' => 'Assess how your data is collected, stored, governed, and used, then build a plan to make it reliable and ready for analytics and AI.', 'url' => '/contact/', 'link_text' => 'Data Strategy Consulting'),
				5 => array('label' => 'Consumer Data Intelligence', 'title' => 'Consumer Data Intelligence', 'desc' => 'Turn customer and behavioral data into insights you can act on—segmentation, journey analysis, and predictive signals to improve acquisition, retention, and CX.', 'url' => '/contact/', 'link_text' => 'Consumer Data Intelligence'),
				6 => array('label' => 'Generative AI Consulting', 'title' => 'Generative AI Consulting', 'desc' => 'Identify high-impact GenAI use cases and architect solutions (RAG, copilots, content workflows) with the right guardrails for quality, privacy, and security.', 'url' => '/contact/', 'link_text' => 'Generative AI Consulting'),
				7 => array('label' => 'NLP Consulting', 'title' => 'NLP Consulting', 'desc' => 'Build language solutions that understand and extract meaning from text—classification, entity extraction, search relevance, and document automation.', 'url' => '/contact/', 'link_text' => 'NLP Consulting'),
				8 => array('label' => 'AI Software Development', 'title' => 'AI Software Development', 'desc' => 'Develop custom AI applications and services—models, pipelines, APIs, and user experiences—built to integrate cleanly and scale in production.', 'url' => '/contact/', 'link_text' => 'AI Software Development'),
				9 => array('label' => 'Managed AI Services', 'title' => 'Managed AI Services', 'desc' => 'Keep AI systems healthy after launch with monitoring, retraining, performance tuning, and cost control—so quality stays stable over time.', 'url' => '/contact/', 'link_text' => 'Managed AI Services'),
				10 => array('label' => 'AI Chatbot Development', 'title' => 'AI Chatbot Development', 'desc' => 'Create support and internal chatbots that answer questions and complete tasks using your knowledge base and systems, with clear escalation paths to humans.', 'url' => '/contact/', 'link_text' => 'AI Chatbot Development'),
			);

			for ($i = 1; $i <= 10; $i++) {
				$d = isset($defaults[$i]) ? $defaults[$i] : array('label' => '', 'title' => '', 'desc' => '', 'url' => '', 'link_text' => '');
				$label = get_theme_mod("f2_ai_offering_{$i}_label", $d['label']);
				$title = get_theme_mod("f2_ai_offering_{$i}_title", $d['title']);
				if (!empty($label) || !empty($title)) {
					$items[] = array(
						'label'     => $label,
						'title'     => $title,
						'desc'      => get_theme_mod("f2_ai_offering_{$i}_desc", $d['desc']),
						'url'       => get_theme_mod("f2_ai_offering_{$i}_url", $d['url']),
						'link_text' => get_theme_mod("f2_ai_offering_{$i}_text", $d['link_text']),
						'image'     => get_theme_mod("f2_ai_offering_{$i}_img", ''),
					);
				}
			}
			return $items;
		})(),
		'bench_title' => get_theme_mod('f2_ai_bench_title', 'Our AI Experts & Data Scientists'),
		'bench_desc' => get_theme_mod('f2_ai_bench_desc', 'Our team consists of world-class AI researchers and machine learning engineers ready to solve your most complex data challenges.'),
		'bench_items' => $bench_items,
		'contact_title' => get_theme_mod('f2_ai_contact_title', "Ready to design your AI\nfuture?"),
		'contact_subtitle' => get_theme_mod('f2_ai_contact_subtitle', "Whether you're a startup or an enterprise, we'd love to partner with you."),
		'contact_desc' => get_theme_mod('f2_ai_contact_desc', "Send us an email or simply fill out the form.\nWe're here to answer your questions →"),
		'contact_email' => get_theme_mod('f2_ai_contact_email', 'hello@factorlabs.com'),
		'contact_phone' => get_theme_mod('f2_ai_contact_phone', '+1 (555) 000-0000'),
	);
}

/**
 * Get content for Startups V2 page (Cloned from App Dev)
 */
function factor_2_get_startup_v2_content()
{
	// 1. Try to build services from individual fields first
	$app_services = array();
	for ($i = 1; $i <= 9; $i++) {
		$title = get_theme_mod("f2_startup_v2_service_{$i}_title");
		$copy = get_theme_mod("f2_startup_v2_service_{$i}_copy");
		$image = get_theme_mod("f2_startup_v2_service_{$i}_img");

		if (!empty($title) || !empty($copy)) {
			$app_services[] = array(
				'title' => $title,
				'copy' => $copy,
				'image' => $image,
			);
		}
	}

	// 2. Fallback to default copy if no individual fields are set
	if (empty($app_services)) {
		$app_services = array(
			array('title' => 'Strategic Discovery', 'copy' => 'We help founders define their core value proposition and build high-impact MVPs that get to market faster.', 'image' => ''),
			array('title' => 'MVP Development', 'copy' => 'From initial concept to a functional product, we build the core features needed to validate your idea with real users.', 'image' => ''),
			array('title' => 'Product Design', 'copy' => 'Creating intuitive user experiences and striking interfaces that resonate with your target audience and investors.', 'image' => ''),
			array('title' => 'Scaling & Growth', 'copy' => 'Architecture and features designed to scale seamlessly as your user base grows and your business evolves.', 'image' => ''),
			array('title' => 'Market Entry Strategy', 'copy' => 'Comprehensive analysis and execution plans to help your startup penetrate the market and achieve traction.', 'image' => ''),
			array('title' => 'Investor Readiness', 'copy' => 'Prepare your pitch deck, financials, and technical architecture for seed and Series A funding rounds.', 'image' => ''),
			array('title' => 'Technical Audit', 'copy' => 'Deep-dive assessment of your existing codebase and infrastructure to identify bottlenecks and security risks.', 'image' => ''),
			array('title' => 'Post-Launch Support', 'copy' => 'Ongoing maintenance, feature updates, and performance optimization to keep your startup competitive.', 'image' => ''),
			array('title' => 'Venture Support', 'copy' => 'Specialized technical guidance and resource allocation for venture-backed and high-growth startup teams.', 'image' => ''),
		);
	}

	// Process steps from Customizer
	$process_raw = get_theme_mod('f2_startup_v2_process_raw', "Discovery|Defining the startup vision.\nDesign|Prototyping the experience.\nBuild|Agile development of the MVP.\nLaunch|Deploying and iterating.");
	$process_steps = factor_2_parse_pipe_textarea($process_raw, array('title', 'copy'));


	// Hero badge and phrases

	return array(
		'hero_badge' => get_theme_mod('f2_startup_v2_hero_badge', 'Startup Solutions'),
		'hero_title' => get_theme_mod('f2_startup_v2_hero_title', 'Build Your Startup with Experts'),
		'hero_copy' => get_theme_mod('f2_startup_v2_hero_copy', 'We partner with founders to transform ideas into scalable, successful digital products.'),
		'hero_bg' => get_theme_mod('f2_startup_v2_hero_bg'),
		'rotating_phrases' => get_theme_mod('f2_startup_v2_rotating_phrases', 'LAUNCH FASTER,SCALE SMARTER,ENGAGE USERS'),
		'services' => $app_services,
		'process' => $process_steps,
		'offerings_title' => get_theme_mod('f2_startup_offering_title', 'Our Offerings'),
		'offerings_items' => (function() {
			$items = array();
			$defaults = array(
				1 => array('label' => 'Strategic Discovery', 'title' => 'Strategic Discovery', 'desc' => 'We help founders define their core value proposition and build high-impact MVPs that get to market faster.', 'url' => '/contact/', 'link_text' => 'Startup Strategy Services'),
				2 => array('label' => 'MVP Development', 'title' => 'MVP Development', 'desc' => 'From initial concept to a functional product, we build the core features needed to validate your idea with real users.', 'url' => '/contact/', 'link_text' => 'MVP Development Services'),
				3 => array('label' => 'Product Design', 'title' => 'Product Design', 'desc' => 'Creating intuitive user experiences and striking interfaces that resonate with your target audience and investors.', 'url' => '/contact/', 'link_text' => 'Startup Design Services'),
				4 => array('label' => 'Scaling & Growth', 'title' => 'Scaling & Growth', 'desc' => 'Architecture and features designed to scale seamlessly as your user base grows and your business evolves.', 'url' => '/contact/', 'link_text' => 'Scaling Support'),
				5 => array('label' => 'Equity & Partnerships', 'title' => 'Equity & Partnerships', 'desc' => 'Flexible engagement models including specialized support for venture-backed startups and high-growth teams.', 'url' => '/contact/', 'link_text' => 'Partner with Us'),
				6 => array('label' => 'Market Entry Strategy', 'title' => 'Market Entry Strategy', 'desc' => 'Comprehensive analysis and execution plans to help your startup penetrate the market and achieve traction.', 'url' => '/contact/', 'link_text' => 'Market Entry Services'),
				7 => array('label' => 'Investor Readiness', 'title' => 'Investor Readiness', 'desc' => 'Prepare your deck, financials, and technical architecture for seed and Series A funding rounds.', 'url' => '/contact/', 'link_text' => 'Investor Readiness Services'),
				8 => array('label' => 'Technical Audit', 'title' => 'Technical Audit', 'desc' => 'Deep-dive assessment of your existing codebase and infrastructure to identify bottlenecks and security risks.', 'url' => '/contact/', 'link_text' => 'Technical Audit Services'),
				9 => array('label' => 'Post-Launch Support', 'title' => 'Post-Launch Support', 'desc' => 'Ongoing maintenance, feature updates, and performance optimization to keep your startup competitive.', 'url' => '/contact/', 'link_text' => 'Post-Launch Support'),
			);

			for ($i = 1; $i <= 10; $i++) {
				$d = isset($defaults[$i]) ? $defaults[$i] : array('label' => '', 'title' => '', 'desc' => '', 'url' => '', 'link_text' => '');
				$label = get_theme_mod("f2_startup_offering_{$i}_label", $d['label']);
				$title = get_theme_mod("f2_startup_offering_{$i}_title", $d['title']);
				if (!empty($label) || !empty($title)) {
					$items[] = array(
						'label'     => $label,
						'title'     => $title,
						'desc'      => get_theme_mod("f2_startup_offering_{$i}_desc", $d['desc']),
						'url'       => get_theme_mod("f2_startup_offering_{$i}_url", $d['url']),
						'link_text' => get_theme_mod("f2_startup_offering_{$i}_text", $d['link_text']),
						'image'     => get_theme_mod("f2_startup_offering_{$i}_img", ''),
					);
				}
			}
			return $items;
		})(),
		'consult_copy' => get_theme_mod('f2_consult_copy', 'Book a FREE 30-minute consultation with our team to discuss your startup idea.'),
	);
}

/**
 * Get content for the Consulting & Strategy page
 */
function factor_2_get_consulting_content()
{
	$stats = array();
	for ($i = 1; $i <= 3; $i++) {
		$stats[] = array(
			'num'   => get_theme_mod("f2_consulting_stat_{$i}_num", '0'),
			'label' => get_theme_mod("f2_consulting_stat_{$i}_label", ''),
		);
	}

	$capabilities = array();
	$cap_defaults = array(
		1 => array('title' => 'Growth Strategy', 'desc' => 'Scaling your business through market expansion and product innovation.'),
		2 => array('title' => 'Digital Architecture', 'desc' => 'Modernizing your tech stack to support future-ready operations.'),
		3 => array('title' => 'Data Intelligence', 'desc' => 'Unlocking the power of your data for predictive decision making.'),
		4 => array('title' => 'Operational Excellence', 'desc' => 'Optimizing processes to maximize efficiency and reduce waste.'),
		5 => array('title' => 'Brand Evolution', 'desc' => 'Redefining your market position for the modern consumer.'),
		6 => array('title' => 'Risk & Resilience', 'desc' => 'Future-proofing your organization against global volatility.'),
	);
	for ($i = 1; $i <= 6; $i++) {
		$img_id = get_theme_mod("f2_consulting_cap_{$i}_img", '');
		$capabilities[] = array(
			'title' => get_theme_mod("f2_consulting_cap_{$i}_title", $cap_defaults[$i]['title']),
			'desc'  => get_theme_mod("f2_consulting_cap_{$i}_desc", $cap_defaults[$i]['desc']),
			'img'   => $img_id ? wp_get_attachment_image_url($img_id, 'large') : '',
		);
	}

	$steps = array();
	$step_defaults = array(
		1 => array('title' => 'Discovery', 'desc' => 'We audit your current state, data, and culture to identify the root challenges.'),
		2 => array('title' => 'Synthesis', 'desc' => 'Converting raw data into a coherent strategic narrative and actionable roadmap.'),
		3 => array('title' => 'Execution', 'desc' => 'Working side-by-side with your teams to pilot, pivot, and implement at speed.'),
		4 => array('title' => 'Evolution', 'desc' => 'Continuous optimization and feedback loops to ensure long-term strategic resilience.'),
	);
	for ($i = 1; $i <= 4; $i++) {
		$steps[] = array(
			'title' => get_theme_mod("f2_consulting_step_{$i}_title", $step_defaults[$i]['title']),
			'desc' => get_theme_mod("f2_consulting_step_{$i}_desc", $step_defaults[$i]['desc']),
		);
	}

	return array(
		'hero_badge' => get_theme_mod('f2_consulting_hero_badge', 'Consulting'),
		'hero_title' => get_theme_mod('f2_consulting_hero_title', "Consulting & Strategy Services"),
		'hero_desc' => get_theme_mod('f2_consulting_hero_desc', 'WE HELP VISIONARY LEADERS NAVIGATE COMPLEXITY THAT'),
		'hero_cta_text' => get_theme_mod('f2_consulting_hero_cta_text', 'Let\'s Talk →'),
		'hero_video' => (function() {
			$vid_id = get_theme_mod('f2_consulting_hero_video');
			return $vid_id ? wp_get_attachment_url($vid_id) : '';
		})(),
		'rotating_phrases' => get_theme_mod('f2_consulting_rotating_phrases', 'DRIVE GROWTH,OPTIMIZE OPERATIONS,DELIVER VALUE'),
		'stats' => $stats,
		'capabilities' => $capabilities,
		'steps' => $steps,
	);
}

/**
 * Get content for Tech Staff Outsourcing page
 */
function factor_2_get_outsourcing_content()
{
	return factor_2_get_testing_content();
}

/**
 * Get content for the Testing page (Redesigned Staff Augmentation)
 */
function factor_2_get_testing_content()
{
	return array(
		'hero_title' => get_theme_mod('f2_test_hero_title', 'IT Staff Augmentation Service'),
		'hero_subtitle' => get_theme_mod('f2_test_hero_subtitle', 'Build a dream-team in no time'),
		'hero_desc' => get_theme_mod('f2_test_hero_desc', 'Hire talented software engineers that work closely with your internal team, fill the skill gaps, and support your project goals through to delivery.'),
		'hero_cta' => get_theme_mod('f2_test_hero_cta', 'Schedule a Consultation →'),
		'trust_badge_1' => get_theme_mod('f2_test_trust_badge_1', 'Hassle-free recruitment'),
		'trust_badge_2' => get_theme_mod('f2_test_trust_badge_2', '5k+ pool of top 1% tech talent'),
		'value_title' => get_theme_mod('f2_test_value_title', 'Save Recruitment Time and Costs with Hassle-Free Staff Augmentation'),
		'value_desc' => get_theme_mod('f2_test_value_desc', 'If you don’t have the man-power to complete a project by its deadline or if your current team lacks the required skillset to perform specific tasks, our Staff Augmentation Services may be the answer to all your woes.'),
		'value_img' => get_theme_mod('f2_test_value_img', ''),
		'value_items' => (function () {
		$items = array();
		for ($i = 1; $i <= 4; $i++) {
			$title = get_theme_mod("f2_test_value_item_{$i}_title");
			$copy = get_theme_mod("f2_test_value_item_{$i}_copy");
			if (!empty($title)) {
				$items[] = array('title' => $title, 'copy' => $copy);
			}
		}
		// Fallback to old textarea if individual fields are empty
		if (empty($items)) {
			$items = factor_2_parse_pipe_textarea(get_theme_mod('f2_test_value_items', "Extend your team|with the specific skillsets required.\nSkip the lengthy recruitment process|& get started faster.\nDodge the high overheads|of permanent staffing.\nKeep pace|with your business’s tech initiatives."), array('title', 'copy'));
		}
		return $items;
	})(),
		'why_desc' => get_theme_mod('f2_test_why_desc', ''),
		'why_title' => get_theme_mod('f2_test_why_title', ''),
		'why_pillars' => factor_2_parse_pipe_textarea(get_theme_mod('f2_test_why_pillars', ''), array('title', 'copy')),
		'reviews_title' => get_theme_mod('f2_test_reviews_title', ''),
		'reviews' => factor_2_parse_pipe_textarea(get_theme_mod('f2_test_reviews', ''), array('quote', 'name', 'role')),
		'skillsets_title' => get_theme_mod('f2_test_skillsets_title', "Specific Skill-Sets You Can Hire"),
		'skillsets' => factor_2_parse_pipe_textarea(get_theme_mod('f2_test_skillsets', "eCommerce|WooCommerce, BigCommerce, Shopify\nJS Frameworks|React, Vue, Node.js\nPHP|Laravel, Symfony\nMobile Apps|React Native, Flutter, Swift\nDesign|UI/UX Design\nQuality Assurance|QA/Testing\nAdvanced Tech|Python, AI, ML\nCMS|WordPress"), array('cat', 'list')),
		'contact_title' => get_theme_mod('f2_test_contact_title', "Ready to build something\namazing?"),
		'contact_subtitle' => get_theme_mod('f2_test_contact_subtitle', "Whether you're a startup or a business, we'd love to hear from you."),
		'contact_desc' => get_theme_mod('f2_test_contact_desc', "Send us an email or simply fill out the form.\nWe're here to answer your questions →"),
		'contact_email' => get_theme_mod('f2_test_contact_email', 'hello@factorlabs.com'),
		'contact_phone' => get_theme_mod('f2_test_contact_phone', '+1 (555) 000-0000'),
		'bench_title' => get_theme_mod('f2_test_bench_title', 'Hire From Our Bench Of Experts'),
		'bench_desc' => get_theme_mod('f2_test_bench_desc', 'We have a pool of highly skilled techies available to work for you on a contract basis, enabling you to focus on growing your business without being tied down to long-term commitments.'),
		'bench_items' => (function () {
		$items = array();
		for ($i = 1; $i <= 9; $i++) {
			$role = get_theme_mod("f2_test_bench_item_{$i}_role");
			$img = get_theme_mod("f2_test_bench_item_{$i}_img");
			if (!empty($role) || !empty($img)) {
				$items[] = array(
						'role' => $role,
						'img' => $img,
						'tag' => get_theme_mod("f2_test_bench_item_{$i}_tag"),
						'desc' => get_theme_mod("f2_test_bench_item_{$i}_desc"),
					);
			}
		}
		return $items;
	})(),
		'strengths_title' => get_theme_mod('f2_test_strengths_title', 'Strengths That Define Our Service'),
		'strengths_items' => factor_2_parse_pipe_textarea(get_theme_mod('f2_test_strengths_items', "Pricing Made Simple|Flexible models tailored to project scope and changing needs.\nThe Right Team|Skilled talent available instantly for short or long engagements.\nQuality You Can Trust|ISO-driven processes ensure reliable, high-quality outcomes.\nAligned to Your Needs|Clear documentation keeps work aligned and transitions smooth."), array('title', 'copy')),
	);
}

/**
 * Include CPTs and Customizer
 */
require get_template_directory() . '/inc/cpt.php';
require get_template_directory() . '/inc/customizer.php';

/**
 * Automatically style dynamically created "Contact" menu links as CTA buttons.
 */
function factor_2_menu_cta_classes($classes, $item, $args)
{
	if ('primary' === (property_exists($args, 'theme_location') ? $args->theme_location : '')) {
		if ('Contact' === $item->title || 'Contact Us' === $item->title) {
			$classes[] = 'menu-item-cta';
		}
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'factor_2_menu_cta_classes', 10, 3);

function factor_2_menu_cta_link_atts($atts, $item, $args)
{
	if ('primary' === (property_exists($args, 'theme_location') ? $args->theme_location : '')) {
		if ('Contact' === $item->title || 'Contact Us' === $item->title) {
			$atts['class'] = isset($atts['class']) ? $atts['class'] . ' button-link button-link--primary' : 'button-link button-link--primary';
			$atts['style'] = 'padding: 0.5rem 1.25rem; font-size: 0.9rem;';
		}
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'factor_2_menu_cta_link_atts', 10, 3);

/**
 * Inject dropdown SVG arrow into parent nav items for the WP menu.
 */
function factor_2_menu_item_dropdown_arrow($title, $item, $args, $depth)
{
	if (0 === $depth && in_array('menu-item-has-children', $item->classes, true)) {
		$svg = '<svg class="dropdown-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>';
		$title .= ' ' . $svg;
	}
	return $title;
}
add_filter('nav_menu_item_title', 'factor_2_menu_item_dropdown_arrow', 10, 4);
