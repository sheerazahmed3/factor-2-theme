<?php
/**
 * Factor Labs Theme Customizer — all editable text fields
 *
 * @package Factor_2
 */

function factor_2_customize_register($wp_customize)
{

	// ==============================================================
	// HOMEPAGE SECTION
	// ==============================================================
	$wp_customize->add_section('factor_2_home_section', array(
		'title' => __('Homepage Content', 'factor-2'),
		'description' => __('Edit the main text blocks on the homepage.', 'factor-2'),
		'priority' => 30,
	));

	// Hero Headline
	$wp_customize->add_setting('f2_home_hero_title', array(
		'default' => "Software Development for\nBusinesses & Startups",
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_home_hero_title', array(
		'label' => __('Hero Headline (one line per line break)', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'textarea',
	));

	// Hero Lede
	$wp_customize->add_setting('f2_home_hero_lede', array(
		'default' => 'A leading app, web development, and AI solutions company delivering powerful, scalable digital products for businesses and startups.',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_home_hero_lede', array(
		'label' => __('Hero Subheadline', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'textarea',
	));

	// Hero CTA Button Text
	$wp_customize->add_setting('f2_hero_cta_text', array(
		'default' => 'Book a free consult →',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_hero_cta_text', array(
		'label' => __('Hero Button Text', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'text',
	));

	// Services "Learn More" Button Text
	$wp_customize->add_setting('f2_services_btn_text', array(
		'default' => 'Learn more',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_services_btn_text', array(
		'label' => __('Services Card Button Text', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'text',
	));

	// Intro Title
	$wp_customize->add_setting('f2_home_intro_title', array(
		'default' => 'A top-tier web & mobile app development company based in your city.',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_home_intro_title', array(
		'label' => __('Intro Title', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'text',
	));

	// Intro Copy
	$wp_customize->add_setting('f2_home_intro_copy', array(
		'default' => 'We specialize in transforming complex business challenges into sleek, high-performing digital products safely and securely, giving you an edge in the modern market.',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_home_intro_copy', array(
		'label' => __('Intro Description', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'textarea',
	));

	// Experience Intro
	$wp_customize->add_setting('f2_home_experience_intro', array(
		'default' => 'A proven track record delivering mobile and web projects across healthcare, fast-moving consumer goods, logistics, and internal operations.',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_home_experience_intro', array(
		'label' => __('Experience Section Intro', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'textarea',
	));

	// Audience Buttons
	$wp_customize->add_setting('f2_home_audiences', array(
		'default' => "Business|https://example.com\nStartup|https://example.com",
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_home_audiences', array(
		'label' => __('Audience Buttons (Label|URL per line)', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'textarea',
		'description' => __('Format: Label|URL, one per line.', 'factor-2'),
	));

	// --- Intro Section Kicker ---
	$wp_customize->add_setting('f2_home_intro_kicker', array(
		'default' => 'Intro',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_home_intro_kicker', array(
		'label' => __('Intro Section Kicker', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'text',
	));

	// ==============================================================
	// SERVICES SECTION HEADINGS
	// ==============================================================
	$wp_customize->add_setting('f2_services_kicker', array(
		'default' => 'Our Services',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_services_kicker', array(
		'label' => __('Services Section Kicker', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_services_heading', array(
		'default' => 'End-to-End Digital Product Delivery.',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_services_heading', array(
		'label' => __('Services Section Heading', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_services_description', array(
		'default' => 'We provide all the capabilities needed to take a complex business idea and turn it into a secure, scalable application.',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_services_description', array(
		'label' => __('Services Section Description', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'textarea',
	));

	// ==============================================================
	// EXPERIENCE SECTION HEADINGS
	// ==============================================================
	$wp_customize->add_setting('f2_experience_kicker', array(
		'default' => 'Our Experience',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_experience_kicker', array(
		'label' => __('Experience Section Kicker', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_experience_heading', array(
		'default' => 'Proven success across industries.',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_experience_heading', array(
		'label' => __('Experience Section Heading', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'text',
	));

	// ==============================================================
	// CONSULTATION SECTION
	// ==============================================================
	$wp_customize->add_setting('f2_consult_kicker', array(
		'default' => 'Consultation',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_consult_kicker', array(
		'label' => __('Consultation Section Kicker', 'factor-2'),
		'section' => 'factor_2_contact_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_consult_heading', array(
		'default' => 'Speak with our team about your app idea or your next product release.',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_consult_heading', array(
		'label' => __('Consultation Section Heading', 'factor-2'),
		'section' => 'factor_2_contact_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_consult_btn_text', array(
		'default' => 'Request a call',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_consult_btn_text', array(
		'label' => __('Consultation Button Text', 'factor-2'),
		'section' => 'factor_2_contact_section',
		'type' => 'text',
	));

	// ==============================================================
	// CLIENT REVIEWS SECTION
	// ==============================================================
	$wp_customize->add_setting('f2_reviews_kicker', array(
		'default' => 'Client Reviews',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_reviews_kicker', array(
		'label' => __('Reviews Section Kicker', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_reviews_heading', array(
		'default' => 'Trusted by founders and enterprise leaders.',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_reviews_heading', array(
		'label' => __('Reviews Section Heading', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'text',
	));

	// ==============================================================
	// WHY CHOOSE US
	// ==============================================================
	$wp_customize->add_section('factor_2_reasons_section', array(
		'title' => __('Why Choose Us', 'factor-2'),
		'priority' => 31,
	));

	$wp_customize->add_setting('f2_reasons_kicker', array(
		'default' => 'Why Choose Us',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_reasons_kicker', array(
		'label' => __('Why Choose Us Kicker', 'factor-2'),
		'section' => 'factor_2_reasons_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_reasons_heading', array(
		'default' => 'A framework for reliable delivery.',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_reasons_heading', array(
		'label' => __('Why Choose Us Heading', 'factor-2'),
		'section' => 'factor_2_reasons_section',
		'type' => 'text',
	));

	for ($i = 1; $i <= 6; $i++) {
		$wp_customize->add_setting("f2_reason_{$i}_title", array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control("f2_reason_{$i}_title", array(
			'label' => sprintf(__('Reason %d Title', 'factor-2'), $i),
			'section' => 'factor_2_reasons_section',
			'type' => 'text',
		));

		$wp_customize->add_setting("f2_reason_{$i}_copy", array(
			'default' => '',
			'sanitize_callback' => 'sanitize_textarea_field',
		));
		$wp_customize->add_control("f2_reason_{$i}_copy", array(
			'label' => sprintf(__('Reason %d Description', 'factor-2'), $i),
			'section' => 'factor_2_reasons_section',
			'type' => 'textarea',
		));
	}

	// ==============================================================
	// CLIENT LOGOS
	// ==============================================================
	$wp_customize->add_setting('f2_client_logos', array(
		'default' => "Enterprise Client A\nGovernment Dept B\nStartup Unicorn C\nGlobal Retailer D\nHealthcare Provider E\nLogistics Company F\nEducation Partner G\nTech Giant H",
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_client_logos', array(
		'label' => __('Client / Partner Names', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'textarea',
		'description' => __('One name per line. These appear in the "Our Clients & Partners" strip.', 'factor-2'),
	));

	$wp_customize->add_setting('f2_clients_kicker', array(
		'default' => 'Our Clients & Partners',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_clients_kicker', array(
		'label' => __('Clients Section Kicker', 'factor-2'),
		'section' => 'factor_2_home_section',
		'type' => 'text',
	));

	// ==============================================================
	// STARTUP PAGE SECTION
	// ==============================================================
	$wp_customize->add_section('factor_2_startup_section', array(
		'title' => __('Startup Page Content', 'factor-2'),
		'description' => __('Edit all text on the Startup page template.', 'factor-2'),
		'priority' => 32,
	));

	$wp_customize->add_setting('f2_startup_hero_title', array(
		'default' => 'Take your app startup further, faster',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_startup_hero_title', array(
		'label' => __('Startup Hero Headline', 'factor-2'),
		'section' => 'factor_2_startup_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_startup_hero_copy_1', array(
		'default' => 'With extensive experience helping founders drive innovation through web and mobile apps, Factor Labs understands the unique challenges of building a new venture from scratch.',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_startup_hero_copy_1', array(
		'label' => __('Startup Hero Paragraph 1', 'factor-2'),
		'section' => 'factor_2_startup_section',
		'type' => 'textarea',
	));

	$wp_customize->add_setting('f2_startup_hero_copy_2', array(
		'default' => "Our agile, dedicated team cares about your product well beyond launch. We'll help you translate your potential into a scalable application that responds to a real human need.",
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_startup_hero_copy_2', array(
		'label' => __('Startup Hero Paragraph 2', 'factor-2'),
		'section' => 'factor_2_startup_section',
		'type' => 'textarea',
	));

	// Impact cards as textarea (Title|Description per line)
	$wp_customize->add_setting('f2_startup_impact_cards', array(
		'default' => "HealthConnect|Pushing for better accessible healthcare\nEduLearn Share|Making education information accessible globally\nMindful Habit|Supporting mental wellness and daily habits",
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_startup_impact_cards', array(
		'label' => __('Impact Cards (Title|Description per line)', 'factor-2'),
		'section' => 'factor_2_startup_section',
		'type' => 'textarea',
		'description' => __('Format: Title|Description, one per line.', 'factor-2'),
	));

	// Sectors (Title|Description per line)
	$wp_customize->add_setting('f2_startup_sectors', array(
		'default' => "Health and Wellness|Healthcare systems are intricate and resistant to shortcuts. We design products from the inside out.\nNon-Profit and Social Enterprise|We help founders turn purpose into action, balancing ambition with funding realities.\nEducation, Fintech, Logistics and Beyond|We bring the same depth to every build, from financial tools to operational systems.",
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_startup_sectors', array(
		'label' => __('Sectors (Title|Description per line)', 'factor-2'),
		'section' => 'factor_2_startup_section',
		'type' => 'textarea',
		'description' => __('Format: Title|Description, one per line.', 'factor-2'),
	));

	for ($i = 1; $i <= 9; $i++) {
		$defaults = array(
			1 => array('title' => 'Strategic Discovery', 'copy' => 'We help founders define their core value proposition and build high-impact MVPs that get to market faster.'),
			2 => array('title' => 'MVP Development', 'copy' => 'From initial concept to a functional product, we build the core features needed to validate your idea with real users.'),
			3 => array('title' => 'Product Design', 'copy' => 'Creating intuitive user experiences and striking interfaces that resonate with your target audience and investors.'),
			4 => array('title' => 'Scaling & Growth', 'copy' => 'Architecture and features designed to scale seamlessly as your user base grows and your business evolves.'),
			5 => array('title' => 'Market Entry Strategy', 'copy' => 'Comprehensive analysis and execution plans to help your startup penetrate the market and achieve traction.'),
			6 => array('title' => 'Investor Readiness', 'copy' => 'Prepare your pitch deck, financials, and technical architecture for seed and Series A funding rounds.'),
			7 => array('title' => 'Technical Audit', 'copy' => 'Deep-dive assessment of your existing codebase and infrastructure to identify bottlenecks and security risks.'),
			8 => array('title' => 'Post-Launch Support', 'copy' => 'Ongoing maintenance, feature updates, and performance optimization to keep your startup competitive.'),
			9 => array('title' => 'Venture Support', 'copy' => 'Specialized technical guidance and resource allocation for venture-backed and high-growth startup teams.'),
		);
		$d = isset($defaults[$i]) ? $defaults[$i] : array('title' => '', 'copy' => '');

		// Title
		$wp_customize->add_setting("f2_startup_v2_service_{$i}_title", array(
			'default'           => $d['title'],
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control("f2_startup_v2_service_{$i}_title", array(
			'label'    => sprintf(__('Service %d Title', 'factor-2'), $i),
			'section'  => 'factor_2_startup_section',
			'type'     => 'text',
		));

		// Copy
		$wp_customize->add_setting("f2_startup_v2_service_{$i}_copy", array(
			'default'           => $d['copy'],
			'sanitize_callback' => 'sanitize_textarea_field',
		));
		$wp_customize->add_control("f2_startup_v2_service_{$i}_copy", array(
			'label'    => sprintf(__('Service %d Description', 'factor-2'), $i),
			'section'  => 'factor_2_startup_section',
			'type'     => 'textarea',
		));

		// Image
		$wp_customize->add_setting("f2_startup_v2_service_{$i}_img", array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "f2_startup_v2_service_{$i}_img", array(
			'label'    => sprintf(__('Service %d Image', 'factor-2'), $i),
			'section'  => 'factor_2_startup_section',
		)));
	}

	// Our Offerings Section
	$wp_customize->add_setting('f2_startup_offering_title', array(
		'default'           => 'Our Offerings',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_startup_offering_title', array(
		'label'    => __('Offerings Section Title', 'factor-2'),
		'section'  => 'factor_2_startup_section',
		'type'     => 'text',
	));

	for ($i = 1; $i <= 10; $i++) {
		$defaults = array(
			1 => array('label' => 'Strategic Discovery', 'title' => 'Strategic Discovery', 'desc' => 'We help founders define their core value proposition and build high-impact MVPs that get to market faster.', 'url' => '/contact/', 'text' => 'Startup Strategy Services'),
			2 => array('label' => 'MVP Development', 'title' => 'MVP Development', 'desc' => 'From initial concept to a functional product, we build the core features needed to validate your idea with real users.', 'url' => '/contact/', 'text' => 'MVP Development Services'),
			3 => array('label' => 'Product Design', 'title' => 'Product Design', 'desc' => 'Creating intuitive user experiences and striking interfaces that resonate with your target audience and investors.', 'url' => '/contact/', 'text' => 'Startup Design Services'),
			4 => array('label' => 'Scaling & Growth', 'title' => 'Scaling & Growth', 'desc' => 'Architecture and features designed to scale seamlessly as your user base grows and your business evolves.', 'url' => '/contact/', 'text' => 'Scaling Support'),
			5 => array('label' => 'Equity & Partnerships', 'title' => 'Equity & Partnerships', 'desc' => 'Flexible engagement models including specialized support for venture-backed startups and high-growth teams.', 'url' => '/contact/', 'text' => 'Partner with Us'),
			6 => array('label' => 'Market Entry Strategy', 'title' => 'Market Entry Strategy', 'desc' => 'Comprehensive analysis and execution plans to help your startup penetrate the market and achieve traction.', 'url' => '/contact/', 'text' => 'Market Entry Services'),
			7 => array('label' => 'Investor Readiness', 'title' => 'Investor Readiness', 'desc' => 'Prepare your deck, financials, and technical architecture for seed and Series A funding rounds.', 'url' => '/contact/', 'text' => 'Investor Readiness Services'),
			8 => array('label' => 'Technical Audit', 'title' => 'Technical Audit', 'desc' => 'Deep-dive assessment of your existing codebase and infrastructure to identify bottlenecks and security risks.', 'url' => '/contact/', 'text' => 'Technical Audit Services'),
			9 => array('label' => 'Post-Launch Support', 'title' => 'Post-Launch Support', 'desc' => 'Ongoing maintenance, feature updates, and performance optimization to keep your startup competitive.', 'url' => '/contact/', 'text' => 'Post-Launch Support'),
		);
		$d = isset($defaults[$i]) ? $defaults[$i] : array('label' => '', 'title' => '', 'desc' => '', 'url' => '', 'text' => '');


		// Label
		$wp_customize->add_setting("f2_startup_offering_{$i}_label", array(
			'default'           => $d['label'],
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control("f2_startup_offering_{$i}_label", array(
			'label'    => sprintf(__('Offering %d Label (Service List)', 'factor-2'), $i),
			'section'  => 'factor_2_startup_section',
			'type'     => 'text',
		));

		// Title
		$wp_customize->add_setting("f2_startup_offering_{$i}_title", array(
			'default'           => $d['title'],
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control("f2_startup_offering_{$i}_title", array(
			'label'    => sprintf(__('Offering %d Content Title', 'factor-2'), $i),
			'section'  => 'factor_2_startup_section',
			'type'     => 'text',
		));

		// Description
		$wp_customize->add_setting("f2_startup_offering_{$i}_desc", array(
			'default'           => $d['desc'],
			'sanitize_callback' => 'sanitize_textarea_field',
		));
		$wp_customize->add_control("f2_startup_offering_{$i}_desc", array(
			'label'    => sprintf(__('Offering %d Description', 'factor-2'), $i),
			'section'  => 'factor_2_startup_section',
			'type'     => 'textarea',
		));

		// URL
		$wp_customize->add_setting("f2_startup_offering_{$i}_url", array(
			'default'           => $d['url'],
			'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control("f2_startup_offering_{$i}_url", array(
			'label'    => sprintf(__('Offering %d Link URL', 'factor-2'), $i),
			'section'  => 'factor_2_startup_section',
			'type'     => 'text',
		));

		// Link Text
		$wp_customize->add_setting("f2_startup_offering_{$i}_text", array(
			'default'           => $d['text'],
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control("f2_startup_offering_{$i}_text", array(
			'label'    => sprintf(__('Offering %d Link Text', 'factor-2'), $i),
			'section'  => 'factor_2_startup_section',
			'type'     => 'text',
		));

		// Image
		$wp_customize->add_setting("f2_startup_offering_{$i}_img", array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "f2_startup_offering_{$i}_img", array(
			'label'    => sprintf(__('Offering %d Image/Icon', 'factor-2'), $i),
			'section'  => 'factor_2_startup_section',
		)));
	}

	// ==============================================================
	// TECH STACK SECTION
	// ==============================================================
	$wp_customize->add_section('factor_2_tech_stack_section', array(
		'title' => __('Tech Stack', 'factor-2'),
		'description' => __('Manage technology stacks for different pages.', 'factor-2'),
		'priority' => 31,
	));

	// Tech Stack Global/Default Header
	$wp_customize->add_setting( 'f2_app_tech_kicker', array(
		'default'           => 'core tech',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'f2_app_tech_kicker', array(
		'label'    => __( 'App Tech Stack Kicker', 'factor-2' ),
		'section'  => 'factor_2_tech_stack_section',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'f2_app_tech_title', array(
		'default'           => 'tech stack',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'f2_app_tech_title', array(
		'label'    => __( 'App Tech Stack Title', 'factor-2' ),
		'section'  => 'factor_2_tech_stack_section',
		'type'     => 'text',
	) );

	// App Dev Tech Items (1-10)
	for ($i = 1; $i <= 10; $i++) {
		$wp_customize->add_setting("f2_tech_app_img_{$i}", array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "f2_tech_app_img_{$i}", array(
			'label' => sprintf(__('APP DEV image %d', 'factor-2'), $i),
			'section' => 'factor_2_tech_stack_section',
		)));

		$wp_customize->add_setting("f2_tech_app_text_{$i}", array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control("f2_tech_app_text_{$i}", array(
			'label' => sprintf(__('APP DEV text %d', 'factor-2'), $i),
			'section' => 'factor_2_tech_stack_section',
			'type' => 'text',
		));
	}

	// ==============================================================
	// APP DEVELOPMENT PAGE SECTION
	// ==============================================================
	$wp_customize->add_section('factor_2_app_section', array(
		'title' => __('App Development Page Content', 'factor-2'),
		'description' => __('Edit all text on the App Development page template.', 'factor-2'),
		'priority' => 32,
	));

	// Hero Badge
	$wp_customize->add_setting('f2_app_hero_badge', array(
		'default' => 'Mobile Solutions',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_app_hero_badge', array(
		'label' => __('Hero Badge (Eyebrow)', 'factor-2'),
		'section' => 'factor_2_app_section',
		'type' => 'text',
	));

	// Hero Background
	$wp_customize->add_setting('f2_app_hero_bg', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'f2_app_hero_bg', array(
		'label' => __('Hero Background Image', 'factor-2'),
		'section' => 'factor_2_app_section',
	)));

	$wp_customize->add_setting('f2_app_hero_title', array(
		'default' => 'High-Performance Mobile App Development',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_app_hero_title', array(
		'label' => __('Hero Headline', 'factor-2'),
		'section' => 'factor_2_app_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_app_hero_copy', array(
		'default' => 'Transforming complex business challenges into powerful, scalable mobile experiences for startups and enterprise leaders.',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_app_hero_copy', array(
		'label' => __('Hero Paragraph (Prefix for rotator)', 'factor-2'),
		'section' => 'factor_2_app_section',
		'type' => 'textarea',
	));

	// App Rotating Phrases
	$wp_customize->add_setting('f2_app_rotating_phrases', array(
		'default' => 'CONVERT BETTER,EXCEED EXPECTATIONS,DELIGHT CUSTOMERS',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_app_rotating_phrases', array(
		'label' => __('Rotating Phrases (comma separated)', 'factor-2'),
		'section' => 'factor_2_app_section',
		'type' => 'textarea',
	));

	// App Development Services (Alternating Rows)
	$wp_customize->add_setting( 'f2_app_services_raw', array(
		'default'           => "Native iPhone & iPad Development|Factor Labs specializes in crafting premium iOS experiences. Since the early days of the App Store, we've been at the forefront of Apple's ecosystem, delivering intuitive and powerful applications for iPhone and iPad using Swift and SwiftUI.\nScalable Android Solutions|We develop robust mobile and tablet applications for the Android ecosystem. Leveraging the latest Kotlin and Jetpack Compose technologies, we ensure your app is optimized for performance across the vast array of Android devices.\nCross-Platform Excellence|For faster time-to-market, we utilize modern frameworks like React Native and Flutter. This allows us to maintain a single codebase while delivering native-level performance on both iOS and Android platforms.\nEmerging Tech Integration|Stay ahead of the competition by integrating cutting-edge technologies. From AI-driven features and machine learning to IoT and AR/VR, we help you leverage the tech of tomorrow, today.",
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'f2_app_services_raw', array(
		'label'       => __( 'App Development Highlights (Title|Description per line)', 'factor-2' ),
		'section'     => 'factor_2_app_section',
		'type'        => 'textarea',
		'description' => __( 'Format: Title|Description, one per line.', 'factor-2' ),
	) );

	// App Images
	for ( $i = 1; $i <= 4; $i++ ) {
		// New: Individual Title and Copy fields for App Services
		$wp_customize->add_setting( "f2_app_service_{$i}_title", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "f2_app_service_{$i}_title", array(
			'label'    => sprintf( __( 'Service %d Title', 'factor-2' ), $i ),
			'section'  => 'factor_2_app_section',
			'type'     => 'text',
		) );

		$wp_customize->add_setting( "f2_app_service_{$i}_copy", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_textarea_field',
		) );
		$wp_customize->add_control( "f2_app_service_{$i}_copy", array(
			'label'    => sprintf( __( 'Service %d Description', 'factor-2' ), $i ),
			'section'  => 'factor_2_app_section',
			'type'     => 'textarea',
		) );

		$wp_customize->add_setting( "f2_app_service_{$i}_img", array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "f2_app_service_{$i}_img", array(
			'label'    => sprintf( __( 'Service %d Image', 'factor-2' ), $i ),
			'section'  => 'factor_2_app_section',
		) ) );
	}

	// ==============================================================
	// WEB DEVELOPMENT PAGE SECTION
	// ==============================================================
	$wp_customize->add_section('factor_2_web_section', array(
		'title' => __('Web Development Page Content', 'factor-2'),
		'description' => __('Edit all text on the Web Development page template.', 'factor-2'),
		'priority' => 32,
	));

	// Hero Badge
	$wp_customize->add_setting('f2_web_hero_badge', array(
		'default' => 'Web Solutions',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_web_hero_badge', array(
		'label' => __('Hero Badge (Eyebrow)', 'factor-2'),
		'section' => 'factor_2_web_section',
		'type' => 'text',
	));

	// Hero Background
	$wp_customize->add_setting('f2_web_hero_bg', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'f2_web_hero_bg', array(
		'label' => __('Hero Background Image', 'factor-2'),
		'section' => 'factor_2_web_section',
	)));

	$wp_customize->add_setting('f2_web_hero_title', array(
		'default' => 'Web Development',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_web_hero_title', array(
		'label' => __('Hero Headline', 'factor-2'),
		'section' => 'factor_2_web_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_web_hero_copy', array(
		'default' => 'Specializing in premium web applications and platforms that drive business growth.',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_web_hero_copy', array(
		'label' => __('Hero Paragraph (Prefix for rotator)', 'factor-2'),
		'section' => 'factor_2_web_section',
		'type' => 'textarea',
	));

	// Web Rotating Phrases
	$wp_customize->add_setting('f2_web_rotating_phrases', array(
		'default' => 'CONVERT BETTER,EXCEED EXPECTATIONS,DELIGHT CUSTOMERS',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_web_rotating_phrases', array(
		'label' => __('Rotating Phrases (comma separated)', 'factor-2'),
		'section' => 'factor_2_web_section',
		'type' => 'textarea',
	));

	// Customizer edits in inc/customizer.php
	$wp_customize->add_setting('f2_web_intro_kicker', array(
		'default' => __('Web Engineering', 'factor-2'),
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_web_intro_kicker', array(
		'label' => __('Web Development Highlights (Kicker)', 'factor-2'),
		'section' => 'factor_2_web_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_web_intro_copy', array(
		'default' => __('From modern websites to complex platforms, we deliver high-performance solutions tailored to your business needs. Our services also include cloud architecture, API integrations, hosting, and ongoing maintenance to keep your platform secure and ready to scale.', 'factor-2'),
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_web_intro_copy', array(
		'label' => __('Web Development Highlights (Description)', 'factor-2'),
		'section' => 'factor_2_web_section',
		'type' => 'textarea',
	));

	// Web Development Services (Alternating Rows)
	$wp_customize->add_setting( 'f2_web_services_raw', array(
		'default'           => "Frontend App Development|We build powerful web applications using modern frontend technologies like React and Vue.\nBackend App Development|Robust and scalable backend systems to power your web applications.\nE-commerce Solutions|Custom e-commerce platforms designed to convert and scale.",
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'f2_web_services_raw', array(
		'label'       => __( 'Service Rows Fallback (Title|Description per line)', 'factor-2' ),
		'section'     => 'factor_2_web_section',
		'type'        => 'textarea',
		'description' => __( 'Only used if individual Service fields below are empty.', 'factor-2' ),
	) );

	// Web Images
	for ( $i = 1; $i <= 6; $i++ ) {
		// New: Individual Title and Copy fields for Web Services
		$wp_customize->add_setting( "f2_web_service_{$i}_title", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "f2_web_service_{$i}_title", array(
			'label'    => sprintf( __( 'Service %d Title', 'factor-2' ), $i ),
			'section'  => 'factor_2_web_section',
			'type'     => 'text',
		) );

		$wp_customize->add_setting( "f2_web_service_{$i}_copy", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_textarea_field',
		) );
		$wp_customize->add_control( "f2_web_service_{$i}_copy", array(
			'label'    => sprintf( __( 'Service %d Description', 'factor-2' ), $i ),
			'section'  => 'factor_2_web_section',
			'type'     => 'textarea',
		) );

		$wp_customize->add_setting( "f2_web_service_{$i}_img", array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "f2_web_service_{$i}_img", array(
			'label'    => sprintf( __( 'Service %d Image', 'factor-2' ), $i ),
			'section'  => 'factor_2_web_section',
		) ) );
	}

	// Shared Process Steps (Move to a shared config if possible, or keep in App for now)
	$wp_customize->add_setting( 'f2_app_process_raw', array(
		'default'           => "Strategic Discovery|We begin by aligning your business goals with technical feasibility, identifying key user needs and market opportunities to define a winning roadmap.\nUser-Centric Design|Our design team focuses on creating intuitive, engaging interfaces that prioritize the user journey, ensuring your app is as beautiful as it is functional.\nAgile Engineering|Following modern agile practices, we build your application in iterative sprints. You'll have full visibility into progress with frequent feedback loops.\nLaunch & Evolution|Beyond the initial launch, we provide ongoing support and data-driven updates to ensure your application continues to scale and respond to user needs.",
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'f2_app_process_raw', array(
		'label'       => __( 'App Development Process (Title|Description per line)', 'factor-2' ),
		'section'     => 'factor_2_app_section',
		'type'        => 'textarea',
		'description' => __( 'Format: Title|Description, one per line.', 'factor-2' ),
	) );


	// Web Development Process Steps
	$wp_customize->add_setting( 'f2_web_process_raw', array(
		'default'           => "Architecture Planning|Defining the technology stack and system architecture to ensure long-term scalability and performance.\nUI/UX Engineering|Crafting seamless web experiences that work perfectly across all devices and browsers.\nModern Web Development|Building high-performance web applications using the latest frontend and backend frameworks.\nDeployment & Optimization|Ensuring smooth deployment and continuous performance tuning to keep your web presence fast and reliable.",
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'f2_web_process_raw', array(
		'label'       => __( 'Web Development Process (Title|Description per line)', 'factor-2' ),
		'section'     => 'factor_2_web_section',
		'type'        => 'textarea',
		'description' => __( 'Format: Title|Description, one per line.', 'factor-2' ),
	) );

	// Web Development Consultation Banner
	$wp_customize->add_setting('f2_web_consult_title', array(
		'default' => 'Ready to launch your platform?',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_web_consult_title', array(
		'label' => __('Consultation Banner Headline (Web)', 'factor-2'),
		'section' => 'factor_2_web_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_web_consult_copy', array(
		'default' => 'Book a FREE 30-minute consultation with our Managing Director to discuss your web product, technical requirements, and the development process.',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_web_consult_copy', array(
		'label' => __('Consultation Banner Description (Web)', 'factor-2'),
		'section' => 'factor_2_web_section',
		'type' => 'textarea',
	));

	$wp_customize->add_setting('f2_web_consult_btn', array(
		'default' => 'Book now',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_web_consult_btn', array(
		'label' => __('Consultation Banner Button Label (Web)', 'factor-2'),
		'section' => 'factor_2_web_section',
		'type' => 'text',
	));


	// ==============================================================
	// TECH STAFF OUTSOURCING PAGE SECTION
	// ==============================================================

	$wp_customize->add_section('factor_2_outsourcing_section', array(
		'title' => __('Outsourcing Page Content', 'factor-2'),
		'priority' => 32,
	));

	// Outsourcing Hero
	$wp_customize->add_setting('f2_outsourcing_hero_badge', array(
		'default' => 'Staff Augmentation',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_outsourcing_hero_badge', array(
		'label' => __('Hero Badge (Outsourcing)', 'factor-2'),
		'section' => 'factor_2_outsourcing_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_outsourcing_hero_title', array(
		'default' => 'Scale your engineering team with elite talent.',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_outsourcing_hero_title', array(
		'label' => __('Hero Title (Outsourcing)', 'factor-2'),
		'section' => 'factor_2_outsourcing_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_outsourcing_hero_copy', array(
		'default' => 'Access a global pool of pre-vetted senior developers and engineers. We provide the technical expertise you need to accelerate delivery.',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_outsourcing_hero_copy', array(
		'label' => __('Hero Copy (Outsourcing)', 'factor-2'),
		'section' => 'factor_2_outsourcing_section',
		'type' => 'textarea',
	));

	$wp_customize->add_setting('f2_outsourcing_hero_bg', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'f2_outsourcing_hero_bg', array(
		'label' => __('Hero Background Image (Outsourcing)', 'factor-2'),
		'section' => 'factor_2_outsourcing_section',
	)));

	// Outsourcing Roles (Showcase)
	$wp_customize->add_setting('f2_outsourcing_roles', array(
		'default' => "Frontend Developers|React, Vue, Angular|Build pixel-perfect, responsive interfaces.\nBackend Engineers|Node.js, Python, Go|Scalable architecture and robust APIs.\nMobile Experts|Swift, Kotlin, Flutter|High-performance native and cross-platform apps.\nDevOps Professionals|AWS, Azure, Docker|Accelerate deployment and cloud infrastructure.",
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_outsourcing_roles', array(
		'label' => __('Roles Showcase (Outsourcing)', 'factor-2'),
		'section' => 'factor_2_outsourcing_section',
		'type' => 'textarea',
		'description' => __('Format: Role Title|Tech Stack|Description, one per line.', 'factor-2'),
	));

	// Outsourcing Benefits
	$wp_customize->add_setting('f2_outsourcing_benefits', array(
		'default' => "Rapid Scaling|Reduce time-to-hire from months to days.\nCost Efficiency|Lower overhead with specialized global talent.\nHigh Retention|Our developers stay integrated with your team for the long term.",
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_outsourcing_benefits', array(
		'label' => __('Key Benefits (Outsourcing)', 'factor-2'),
		'section' => 'factor_2_outsourcing_section',
		'type' => 'textarea',
		'description' => __('Format: Title|Copy, one per line.', 'factor-2'),
	));

	// Outsourcing Banner
	$wp_customize->add_setting('f2_outsourcing_consult_title', array(
		'default' => 'Ready to augment your team?',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_outsourcing_consult_title', array(
		'label' => __('Consultation Banner Headline (Outsourcing)', 'factor-2'),
		'section' => 'factor_2_outsourcing_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_outsourcing_consult_btn', array(
		'default' => 'Hire talent',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_outsourcing_consult_btn', array(
		'label' => __('Consultation Banner Button Label (Outsourcing)', 'factor-2'),
		'section' => 'factor_2_outsourcing_section',
		'type' => 'text',
	));


	// ==============================================================
	// CONTACT & CTA SECTION
	// ==============================================================
	$wp_customize->add_section('factor_2_contact_section', array(
		'title' => __('Contact & CTA Banner', 'factor-2'),
		'description' => __('Edit contact details and consultation banner texts.', 'factor-2'),
		'priority' => 33,
	));

	$wp_customize->add_setting('f2_consult_copy', array(
		'default' => 'Book a FREE 30-minute consultation with our Managing Director to discuss your app idea, commercialization options, and the development process.',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_consult_copy', array(
		'label' => __('Consultation Banner Copy', 'factor-2'),
		'section' => 'factor_2_contact_section',
		'type' => 'textarea',
	));

	$wp_customize->add_setting('f2_contact_phone', array(
		'default' => '123456789',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_contact_phone', array(
		'label' => __('Phone Number', 'factor-2'),
		'section' => 'factor_2_contact_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_contact_email', array(
		'default' => 'hello@example.com',
		'sanitize_callback' => 'sanitize_email',
	));
	$wp_customize->add_control('f2_contact_email', array(
		'label' => __('Email Address', 'factor-2'),
		'section' => 'factor_2_contact_section',
		'type' => 'email',
	));

	// Contact Page Specific Text
	$wp_customize->add_setting('f2_contact_title', array(
		'default' => "Ready to build something\namazing?",
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_contact_title', array(
		'label' => __('Contact Page Title', 'factor-2'),
		'section' => 'factor_2_contact_section',
		'type' => 'textarea',
	));

	$wp_customize->add_setting('f2_contact_subtitle', array(
		'default' => "Whether you're a Business or Startup, we'd love to hear from you.",
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_contact_subtitle', array(
		'label' => __('Contact Page Subtitle', 'factor-2'),
		'section' => 'factor_2_contact_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('f2_contact_description', array(
		'default' => "Send us an email or simply send us a few details.\nWe're here to answer your questions →",
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_contact_description', array(
		'label' => __('Contact Page Description', 'factor-2'),
		'section' => 'factor_2_contact_section',
		'type' => 'textarea',
	));

	// ==============================================================
	// TYPOGRAPHY SECTION
	// ==============================================================
	$wp_customize->add_section('factor_2_typography_section', array(
		'title' => __('Typography', 'factor-2'),
		'priority' => 33,
	));

	// Body Font Size
	$wp_customize->add_setting('f2_font_size_body', array(
		'default' => '16',
		'sanitize_callback' => 'absint',
	));
	$wp_customize->add_control('f2_font_size_body', array(
		'label' => __('Base Body Font Size (px)', 'factor-2'),
		'section' => 'factor_2_typography_section',
		'type' => 'number',
		'input_attrs' => array('min' => 10, 'max' => 24, 'step' => 1),
	));

	// H1 Font Size
	$wp_customize->add_setting('f2_font_size_h1', array(
		'default' => '64',
		'sanitize_callback' => 'absint',
	));
	$wp_customize->add_control('f2_font_size_h1', array(
		'label' => __('H1 Font Size (px)', 'factor-2'),
		'section' => 'factor_2_typography_section',
		'type' => 'number',
		'input_attrs' => array('min' => 24, 'max' => 120, 'step' => 1),
	));

	// H2 Font Size
	$wp_customize->add_setting('f2_font_size_h2', array(
		'default' => '40',
		'sanitize_callback' => 'absint',
	));
	$wp_customize->add_control('f2_font_size_h2', array(
		'label' => __('H2 Font Size (px)', 'factor-2'),
		'section' => 'factor_2_typography_section',
		'type' => 'number',
		'input_attrs' => array('min' => 20, 'max' => 80, 'step' => 1),
	));

	// Kicker Font Size
	$wp_customize->add_setting('f2_font_size_kicker', array(
		'default' => '14',
		'sanitize_callback' => 'absint',
	));
	$wp_customize->add_control('f2_font_size_kicker', array(
		'label' => __('Kicker Font Size (px)', 'factor-2'),
		'section' => 'factor_2_typography_section',
		'type' => 'number',
		'input_attrs' => array('min' => 10, 'max' => 24, 'step' => 1),
	));

	// ==============================================================
	// BUTTON COLORS SECTION
	// ==============================================================
	$wp_customize->add_section('factor_2_button_colors_section', array(
		'title' => __('Button Colors', 'factor-2'),
		'priority' => 34,
	));

	// Primary Button Background
	$wp_customize->add_setting('f2_btn_primary_bg', array(
		'default' => '#91c73d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'f2_btn_primary_bg', array(
		'label' => __('Primary Button Background', 'factor-2'),
		'section' => 'factor_2_button_colors_section',
	)));

	// Consultation Button Background
	$wp_customize->add_setting('f2_btn_consult_bg', array(
		'default' => '#444444',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'f2_btn_consult_bg', array(
		'label' => __('Consultation Button Background', 'factor-2'),
		'section' => 'factor_2_button_colors_section',
	)));

	// Consultation Button Text Color
	$wp_customize->add_setting('f2_btn_consult_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'f2_btn_consult_color', array(
		'label' => __('Consultation Button Text Color', 'factor-2'),
		'section' => 'factor_2_button_colors_section',
	)));

	// Banner Background Color
	$wp_customize->add_setting('f2_banner_bg', array(
		'default' => '#f7ffe8',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'f2_banner_bg', array(
		'label' => __('Banner Background Color', 'factor-2'),
		'section' => 'factor_2_button_colors_section',
	)));

	// Hero Banner Background Color
	$wp_customize->add_setting('f2_hero_banner_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'f2_hero_banner_bg', array(
		'label' => __('Hero Banner Background Color', 'factor-2'),
		'section' => 'factor_2_button_colors_section',
	)));

	// Rotating Phrases
	$wp_customize->add_setting('f2_rotating_phrases', array(
		'default' => 'CONVERT BETTER,EXCEED EXPECTATIONS,DELIGHT CUSTOMERS',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_rotating_phrases', array(
		'label' => __('Rotating Phrases (comma separated)', 'factor-2'),
		'section' => 'factor_2_button_colors_section',
		'type' => 'textarea',
	));

	// Rotating Text Color
	$wp_customize->add_setting('f2_rotator_text_color', array(
		'default' => '#92C83D',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'f2_rotator_text_color', array(
		'label' => __('Rotating Text Color', 'factor-2'),
		'section' => 'factor_2_button_colors_section',
	)));

	// Rotating Text Supporting Prefix Size
	$wp_customize->add_setting('f2_rotator_prefix_size', array(
		'default' => '1.2',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_rotator_prefix_size', array(
		'label' => __('Supporting Text Font Size (rem)', 'factor-2'),
		'section' => 'factor_2_button_colors_section',
		'type' => 'text',
	));

	// Rotating Text Font Size
	$wp_customize->add_setting('f2_rotator_text_size', array(
		'default' => '1.2',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_rotator_text_size', array(
		'label' => __('Rotating Text Font Size (rem)', 'factor-2'),
		'section' => 'factor_2_button_colors_section',
		'type' => 'text',
	));

	// ==============================================================
	// FOOTER SECTION
	// ==============================================================
	$wp_customize->add_section('factor_2_footer_section', array(
		'title' => __('Footer Settings', 'factor-2'),
		'description' => __('Edit footer content: offices, social links, quick links.', 'factor-2'),
		'priority' => 34,
	));

	// Offices
	$wp_customize->add_setting('f2_footer_offices', array(
		'default' => "App Studio Melbourne 123 Example Street, North District VIC 3000\nApp Studio Sydney Level 1, 456 Placeholder Avenue, Central NSW 2000",
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_footer_offices', array(
		'label' => __('Office Addresses', 'factor-2'),
		'section' => 'factor_2_footer_section',
		'type' => 'textarea',
		'description' => __('One address per line.', 'factor-2'),
	));

	// Social Links
	for ($i = 1; $i <= 5; $i++) {
		$wp_customize->add_setting("f2_social_{$i}_label", array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control("f2_social_{$i}_label", array(
			'label' => sprintf(__('Social Link %d Label', 'factor-2'), $i),
			'section' => 'factor_2_footer_section',
			'type' => 'text',
		));

		$wp_customize->add_setting("f2_social_{$i}_url", array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control("f2_social_{$i}_url", array(
			'label' => sprintf(__('Social Link %d URL', 'factor-2'), $i),
			'section' => 'factor_2_footer_section',
			'type' => 'url',
		));
	}

	// Quick Links
	$wp_customize->add_setting('f2_footer_quick_links', array(
		'default' => "Mobile App Development\niPhone App Development\nAndroid App Development\nWeb App Development\nApp Design\nApps for Startups",
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('f2_footer_quick_links', array(
		'label' => __('Quick Links', 'factor-2'),
		'section' => 'factor_2_footer_section',
		'type' => 'textarea',
		'description' => __('One link label per line.', 'factor-2'),
	));
	// ==============================================================
	// TECH STAFF OUTSOURCING SECTION
	// ==============================================================
	// --- Tech Staff Outsourcing Sections ---
	$wp_customize->add_section('factor_2_testing_section', array(
		'title'    => __('Tech Staff Outsourcing: General', 'factor-2'),
		'priority' => 35,
	));

	$wp_customize->add_section('factor_2_testing_bench_section', array(
		'title'    => __('Tech Staff Outsourcing: Expert Bench Slider', 'factor-2'),
		'priority' => 36,
	));

	$wp_customize->add_section('factor_2_testing_contact_section', array(
		'title'    => __('Tech Staff Outsourcing: Contact', 'factor-2'),
		'priority' => 37,
	));

	// ==============================================================
	// AI DEVELOPMENT SECTION
	// ==============================================================
	$wp_customize->add_section('factor_2_ai_section', array(
		'title'    => __('AI Development: General', 'factor-2'),
		'priority' => 38,
	));

	$wp_customize->add_section('factor_2_ai_bench_section', array(
		'title'    => __('AI Development: Expert Bench Slider', 'factor-2'),
		'priority' => 39,
	));

	$wp_customize->add_section('factor_2_ai_contact_section', array(
		'title'    => __('AI Development: Contact', 'factor-2'),
		'priority' => 40,
	));

	// ==============================================================
	// STARTUP V2 SECTION (Cloned from App Dev)
	// ==============================================================
	$wp_customize->add_section('factor_2_startup_v2_section', array(
		'title'    => __('Startup Page (V2)', 'factor-2'),
		'description' => __('Clone of App Development layout for Startups.', 'factor-2'),
		'priority' => 41,
	));

	// Hero settings
	$wp_customize->add_setting('f2_startup_v2_hero_badge', array('default' => 'Startup Solutions', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_startup_v2_hero_badge', array('label' => __('Hero Badge (Eyebrow)', 'factor-2'), 'section' => 'factor_2_startup_v2_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_startup_v2_hero_title', array('default' => 'Build Your Startup with Experts', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_startup_v2_hero_title', array('label' => __('Hero Headline', 'factor-2'), 'section' => 'factor_2_startup_v2_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_startup_v2_hero_copy', array('default' => 'We partner with founders to transform ideas into scalable, successful digital products.', 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_startup_v2_hero_copy', array('label' => __('Hero Paragraph (Prefix for rotator)', 'factor-2'), 'section' => 'factor_2_startup_v2_section', 'type' => 'textarea'));

	$wp_customize->add_setting('f2_startup_v2_rotating_phrases', array('default' => 'LAUNCH FASTER,SCALE SMARTER,ENGAGE USERS', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_startup_v2_rotating_phrases', array('label' => __('Rotating Phrases (comma separated)', 'factor-2'), 'section' => 'factor_2_startup_v2_section', 'type' => 'textarea'));

	$wp_customize->add_setting('f2_startup_v2_hero_bg', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'f2_startup_v2_hero_bg', array('label' => __('Hero Background Image', 'factor-2'), 'section' => 'factor_2_startup_v2_section')));


	// Tech Stack
	$wp_customize->add_setting('f2_startup_v2_tech_kicker', array('default' => 'startup tech', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_startup_v2_tech_kicker', array('label' => __('Tech Stack Kicker', 'factor-2'), 'section' => 'factor_2_startup_v2_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_startup_v2_tech_title', array('default' => 'modern stack', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_startup_v2_tech_title', array('label' => __('Tech Stack Title', 'factor-2'), 'section' => 'factor_2_startup_v2_section', 'type' => 'text'));

	for ($i = 1; $i <= 10; $i++) {
		$wp_customize->add_setting("f2_tech_startup_v2_img_{$i}", array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "f2_tech_startup_v2_img_{$i}", array('label' => sprintf(__('Tech Item %d Image', 'factor-2'), $i), 'section' => 'factor_2_startup_v2_section')));

		$wp_customize->add_setting("f2_tech_startup_v2_text_{$i}", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
		$wp_customize->add_control("f2_tech_startup_v2_text_{$i}", array('label' => sprintf(__('Tech Item %d Text', 'factor-2'), $i), 'section' => 'factor_2_startup_v2_section', 'type' => 'text'));
	}

	// Process
	$wp_customize->add_setting('f2_startup_v2_process_raw', array('default' => "Discovery|Defining the startup vision.\nDesign|Prototyping the experience.\nBuild|Agile development of the MVP.\nLaunch|Deploying and iterating.", 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_startup_v2_process_raw', array('label' => __('Process Steps (Title|Copy per line)', 'factor-2'), 'section' => 'factor_2_startup_v2_section', 'type' => 'textarea'));


	// 1. AI Hero
	$wp_customize->add_setting('f2_ai_hero_title', array('default' => 'AI Development Service', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_ai_hero_title', array('label' => __('Hero Title', 'factor-2'), 'section' => 'factor_2_ai_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_ai_hero_subtitle', array('default' => 'Innovate with Intelligence', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_ai_hero_subtitle', array('label' => __('Hero Subtitle', 'factor-2'), 'section' => 'factor_2_ai_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_ai_hero_desc', array('default' => 'Leverage the power of Artificial Intelligence to transform your business processes, enhance user experiences, and drive innovation.', 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_ai_hero_desc', array('label' => __('Hero Description', 'factor-2'), 'section' => 'factor_2_ai_section', 'type' => 'textarea'));

	$wp_customize->add_setting('f2_ai_hero_cta', array('default' => 'Start Your AI Journey →', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_ai_hero_cta', array('label' => __('Hero CTA Text', 'factor-2'), 'section' => 'factor_2_ai_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_ai_hero_badge', array(
		'default' => __('AI Solutions', 'factor-2'),
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_ai_hero_badge', array(
		'label' => __('Hero Badge (Eyebrow)', 'factor-2'),
		'section' => 'factor_2_ai_section',
		'type' => 'text',
	));

	// Hero Background
	$wp_customize->add_setting('f2_ai_hero_bg', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'f2_ai_hero_bg', array(
		'label' => __('Hero Background Image', 'factor-2'),
		'section' => 'factor_2_ai_section',
	)));

	$wp_customize->add_setting('f2_ai_trust_badge_2', array('default' => 'Data-Driven Insights', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_ai_trust_badge_2', array('label' => __('Trust Badge 2', 'factor-2'), 'section' => 'factor_2_ai_section', 'type' => 'text'));

	// AI Rotating Phrases
	$wp_customize->add_setting('f2_ai_rotating_phrases', array(
		'default' => 'OPTIMIZE PROCESSES,ENHANCE EXPERIENCES,DRIVE INNOVATION',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_ai_rotating_phrases', array(
		'label' => __('Rotating Phrases (comma separated)', 'factor-2'),
		'section' => 'factor_2_ai_section',
		'type' => 'textarea',
	));

	// 2. AI Value Proposition
	$wp_customize->add_setting('f2_ai_value_title', array('default' => 'Why Choose Our AI Development?', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_ai_value_title', array('label' => __('Value Prop Title', 'factor-2'), 'section' => 'factor_2_ai_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_ai_value_desc', array('default' => 'We combine cutting-edge AI technology with deep industry expertise to deliver solutions that are not only intelligent but also practical and scalable.', 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_ai_value_desc', array('label' => __('Value Prop Description', 'factor-2'), 'section' => 'factor_2_ai_section', 'type' => 'textarea'));

	$wp_customize->add_setting('f2_ai_value_img', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'f2_ai_value_img', array(
		'label' => __('Value Prop Image', 'factor-2'),
		'section' => 'factor_2_ai_section',
	)));

	$wp_customize->add_setting('f2_ai_value_items', array(
		'default' => "Machine Learning|Custom models built to solve your unique business challenges.\nNatural Language Processing|Interact with users more naturally through advanced chatbots and sentiment analysis.\nComputer Vision|Automate visual inspection and analysis with high-accuracy image recognition.\nPredictive Analytics|Anticipate trends and behaviors to stay ahead of the competition.",
		'sanitize_callback' => 'sanitize_textarea_field'
	));
	$wp_customize->add_control('f2_ai_value_items', array(
		'label' => __('Value Prop Items (Title|Copy)', 'factor-2'),
		'section' => 'factor_2_ai_section',
		'type' => 'textarea',
		'description' => __('One item per line. format: Title|Copy', 'factor-2')
	));

	// 2b. AI Offerings
	$wp_customize->add_setting('f2_ai_offerings_title', array(
		'default'           => 'Our Offerings',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('f2_ai_offerings_title', array(
		'label'   => __('Offerings Section Title', 'factor-2'),
		'section' => 'factor_2_ai_section',
		'type'    => 'text',
	));

	// Individual Offering Fields (1-10)
	$default_data = array(
		1 => array('label' => 'AI Integration', 'title' => 'AI Integration', 'desc' => 'Connect AI to your existing systems and workflows (CRM, ERP, support, analytics) so it can automate tasks and surface answers where teams already work.', 'url' => '/contact/', 'text' => 'AI Integration Services'),
		2 => array('label' => 'AI Product Development', 'title' => 'AI Product Development', 'desc' => 'Design and build AI-powered products end to end—from discovery and prototypes to production launch—focused on measurable user and business value.', 'url' => '/contact/', 'text' => 'AI Product Development Services'),
		3 => array('label' => 'AI Strategy Consulting', 'title' => 'AI Strategy Consulting', 'desc' => 'Define where AI fits in your business, prioritize use cases, and create a practical roadmap covering data, tech, risks, and rollout.', 'url' => '/contact/', 'text' => 'AI Strategy Consulting'),
		4 => array('label' => 'Data Strategy Consulting', 'title' => 'Data Strategy Consulting', 'desc' => 'Assess how your data is collected, stored, governed, and used, then build a plan to make it reliable and ready for analytics and AI.', 'url' => '/contact/', 'text' => 'Data Strategy Consulting'),
		5 => array('label' => 'Consumer Data Intelligence', 'title' => 'Consumer Data Intelligence', 'desc' => 'Turn customer and behavioral data into insights you can act on—segmentation, journey analysis, and predictive signals to improve acquisition, retention, and CX.', 'url' => '/contact/', 'text' => 'Consumer Data Intelligence'),
		6 => array('label' => 'Generative AI Consulting', 'title' => 'Generative AI Consulting', 'desc' => 'Identify high-impact GenAI use cases and architect solutions (RAG, copilots, content workflows) with the right guardrails for quality, privacy, and security.', 'url' => '/contact/', 'text' => 'Generative AI Consulting'),
		7 => array('label' => 'NLP Consulting', 'title' => 'NLP Consulting', 'desc' => 'Build language solutions that understand and extract meaning from text—classification, entity extraction, search relevance, and document automation.', 'url' => '/contact/', 'text' => 'NLP Consulting'),
		8 => array('label' => 'AI Software Development', 'title' => 'AI Software Development', 'desc' => 'Develop custom AI applications and services—models, pipelines, APIs, and user experiences—built to integrate cleanly and scale in production.', 'url' => '/contact/', 'text' => 'AI Software Development'),
		9 => array('label' => 'Managed AI Services', 'title' => 'Managed AI Services', 'desc' => 'Keep AI systems healthy after launch with monitoring, retraining, performance tuning, and cost control—so quality stays stable over time.', 'url' => '/contact/', 'text' => 'Managed AI Services'),
		10 => array('label' => 'AI Chatbot Development', 'title' => 'AI Chatbot Development', 'desc' => 'Create support and internal chatbots that answer questions and complete tasks using your knowledge base and systems, with clear escalation paths to humans.', 'url' => '/contact/', 'text' => 'AI Chatbot Development'),
	);

	for ($i = 1; $i <= 10; $i++) {
		$d = isset($default_data[$i]) ? $default_data[$i] : array('label' => '', 'title' => '', 'desc' => '', 'url' => '', 'text' => '');
		
		// Priority Grouping
		$p = 100 + ($i * 5);

		$wp_customize->add_setting("f2_ai_offering_{$i}_label", array('default' => $d['label'], 'sanitize_callback' => 'sanitize_text_field'));
		$wp_customize->add_control("f2_ai_offering_{$i}_label", array('label' => sprintf(__('Offering %d: Sidebar Label', 'factor-2'), $i), 'section' => 'factor_2_ai_section', 'type' => 'text', 'priority' => $p));

		$wp_customize->add_setting("f2_ai_offering_{$i}_title", array('default' => $d['title'], 'sanitize_callback' => 'sanitize_text_field'));
		$wp_customize->add_control("f2_ai_offering_{$i}_title", array('label' => sprintf(__('Offering %d: Content Title', 'factor-2'), $i), 'section' => 'factor_2_ai_section', 'type' => 'text', 'priority' => $p + 1));

		$wp_customize->add_setting("f2_ai_offering_{$i}_desc", array('default' => $d['desc'], 'sanitize_callback' => 'sanitize_textarea_field'));
		$wp_customize->add_control("f2_ai_offering_{$i}_desc", array('label' => sprintf(__('Offering %d: Description', 'factor-2'), $i), 'section' => 'factor_2_ai_section', 'type' => 'textarea', 'priority' => $p + 2));

		$wp_customize->add_setting("f2_ai_offering_{$i}_url", array('default' => $d['url'], 'sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control("f2_ai_offering_{$i}_url", array('label' => sprintf(__('Offering %d: Link URL', 'factor-2'), $i), 'section' => 'factor_2_ai_section', 'type' => 'text', 'priority' => $p + 3));

		$wp_customize->add_setting("f2_ai_offering_{$i}_text", array('default' => $d['text'], 'sanitize_callback' => 'sanitize_text_field'));
		$wp_customize->add_control("f2_ai_offering_{$i}_text", array('label' => sprintf(__('Offering %d: Link Text', 'factor-2'), $i), 'section' => 'factor_2_ai_section', 'type' => 'text', 'priority' => $p + 4));

		$wp_customize->add_setting("f2_ai_offering_{$i}_img", array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "f2_ai_offering_{$i}_img", array('label' => sprintf(__('Offering %d: Image', 'factor-2'), $i), 'section' => 'factor_2_ai_section', 'priority' => $p + 5)));
	}

	// 3. AI Contact Section
	$wp_customize->add_setting('f2_ai_contact_title', array('default' => "Ready to build something\namazing?", 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_ai_contact_title', array('label' => __('Contact Headline', 'factor-2'), 'section' => 'factor_2_ai_contact_section', 'type' => 'textarea'));

	$wp_customize->add_setting('f2_ai_contact_subtitle', array('default' => "Whether you're a startup or a business, we'd love to hear from you.", 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_ai_contact_subtitle', array('label' => __('Contact Subtitle', 'factor-2'), 'section' => 'factor_2_ai_contact_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_ai_contact_desc', array('default' => "Send us an email or simply fill out the form.\nWe're here to answer your questions →", 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_ai_contact_desc', array('label' => __('Contact Description', 'factor-2'), 'section' => 'factor_2_ai_contact_section', 'type' => 'textarea'));

	$wp_customize->add_setting('f2_ai_contact_email', array('default' => 'hello@factorlabs.com', 'sanitize_callback' => 'sanitize_email'));
	$wp_customize->add_control('f2_ai_contact_email', array('label' => __('Contact Email', 'factor-2'), 'section' => 'factor_2_ai_contact_section', 'type' => 'email'));

	$wp_customize->add_setting('f2_ai_contact_phone', array('default' => '+1 (555) 000-0000', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_ai_contact_phone', array('label' => __('Contact Phone', 'factor-2'), 'section' => 'factor_2_ai_contact_section', 'type' => 'text'));

	// 1. Hero
	$wp_customize->add_setting('f2_test_hero_title', array('default' => 'IT Staff Augmentation Service', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_test_hero_title', array('label' => __('Hero Title', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_test_hero_subtitle', array('default' => 'Build a dream-team in no time', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_test_hero_subtitle', array('label' => __('Hero Subtitle', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_test_hero_desc', array('default' => 'Hire talented software engineers that work closely with your internal team...', 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_test_hero_desc', array('label' => __('Hero Description', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'textarea'));

	$wp_customize->add_setting('f2_test_hero_cta', array('default' => 'Schedule a Consultation →', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_test_hero_cta', array('label' => __('Hero CTA Text', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_test_trust_badge_1', array('default' => 'Hassle-free recruitment', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_test_trust_badge_1', array('label' => __('Trust Badge 1', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_test_trust_badge_2', array('default' => '5k+ pool of top 1% tech talent', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_test_trust_badge_2', array('label' => __('Trust Badge 2', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'text'));

	// 4. Value Proposition
	$wp_customize->add_setting('f2_test_value_title', array('default' => 'Save Recruitment Time and Costs with Hassle-Free Staff Augmentation', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_test_value_title', array('label' => __('Value Prop Title', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_test_value_desc', array('default' => 'If you don’t have the man-power to complete a project by its deadline...', 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_test_value_desc', array('label' => __('Value Prop Description', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'textarea'));

	for ($i = 1; $i <= 4; $i++) {
		$wp_customize->add_setting("f2_test_value_item_{$i}_title", array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control("f2_test_value_item_{$i}_title", array(
			'label' => sprintf(__('Value Prop Item %d Title', 'factor-2'), $i),
			'section' => 'factor_2_testing_section',
			'type' => 'text',
		));

		$wp_customize->add_setting("f2_test_value_item_{$i}_copy", array(
			'default' => '',
			'sanitize_callback' => 'sanitize_textarea_field',
		));
		$wp_customize->add_control("f2_test_value_item_{$i}_copy", array(
			'label' => sprintf(__('Value Prop Item %d Description', 'factor-2'), $i),
			'section' => 'factor_2_testing_section',
			'type' => 'textarea',
		));
	}

	// 5. Why Choose Us (Pillars)
	$wp_customize->add_setting('f2_test_why_title', array('default' => 'HIRE BEST-IN-CLASS DEVELOPERS FROM OUR 5K+ TALENT POOL', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_test_why_title', array('label' => __('Why Choose Us Title', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_test_why_desc', array('default' => 'Hire expert resources and bring diversity to your projects.', 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_test_why_desc', array('label' => __('Why Choose Us Sub-desc', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'textarea'));

	$wp_customize->add_setting('f2_test_why_pillars', array('default' => "Exceptional Employee Retention Rate|Meaning the people you hire won’t abandon your project mid-cycle.\nConvenient Time-Zone Overlap|So you can comfortably collaborate with your extended team.\nClear & Responsive Communication|A manager ensures the people you hire are responsive, clear, and proactive.\nSuperior Support|We stand by our work and provide maintenance even after project delivery.", 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_test_why_pillars', array('label' => __('Why Choose Us Pillars (Title|Copy per line)', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'textarea'));

	// 6. Raving Reviews
	$wp_customize->add_setting('f2_test_reviews_title', array('default' => "We've Received Raving Reviews", 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_test_reviews_title', array('label' => __('Reviews Title', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'text'));
	$wp_customize->add_setting('f2_test_reviews', array('default' => "\"Exceptional professionalism...\"|Client A|CTO, Tech Startup\n\"Highly skilled developers...\"|Client B|Founder, eCommerce Brand\n\"Great transparency...\"|Client C|Product Manager, Enterprise", 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_test_reviews', array('label' => __('Review Grid (Quote|Name|Role per line)', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'textarea'));

	// 7. Skillsets
	$wp_customize->add_setting('f2_test_skillsets_title', array('default' => "Specific Skill-Sets You Can Hire", 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_test_skillsets_title', array('label' => __('Skillsets Title', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'text'));
	$wp_customize->add_setting('f2_test_skillsets', array('default' => "eCommerce|WooCommerce, BigCommerce, Shopify\nJS Frameworks|React, Vue, Node.js\nPHP|Laravel, Symfony\nMobile Apps|React Native, Flutter, Swift\nDesign|UI/UX Design\nQuality Assurance|QA/Testing\nAdvanced Tech|Python, AI, ML\nCMS|WordPress", 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_test_skillsets', array('label' => __('Skillsets (Category|List per line)', 'factor-2'), 'section' => 'factor_2_testing_section', 'type' => 'textarea'));

	// 8. Contact (Something Amazing)
	$wp_customize->add_setting('f2_test_contact_title', array('default' => "Ready to build something\namazing?", 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_test_contact_title', array('label' => __('Headline (Something Amazing)', 'factor-2'), 'section' => 'factor_2_testing_contact_section', 'type' => 'textarea'));

	$wp_customize->add_setting('f2_test_contact_subtitle', array('default' => "Whether you're a startup or a business, we'd love to hear from you.", 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_test_contact_subtitle', array('label' => __('Subtitle', 'factor-2'), 'section' => 'factor_2_testing_contact_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_test_contact_desc', array('default' => "Send us an email or simply fill out the form.\nWe're here to answer your questions →", 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_test_contact_desc', array('label' => __('Description', 'factor-2'), 'section' => 'factor_2_testing_contact_section', 'type' => 'textarea'));

	$wp_customize->add_setting('f2_test_contact_email', array('default' => 'hello@factorlabs.com', 'sanitize_callback' => 'sanitize_email'));
	$wp_customize->add_control('f2_test_contact_email', array('label' => __('Contact Email', 'factor-2'), 'section' => 'factor_2_testing_contact_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_test_contact_phone', array('default' => '+1 (555) 000-0000', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_test_contact_phone', array('label' => __('Contact Phone', 'factor-2'), 'section' => 'factor_2_testing_contact_section', 'type' => 'text'));

	// 9. Expert Bench Slider
	$wp_customize->add_setting('f2_test_bench_title', array('default' => 'Hire From Our Bench Of Experts', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_test_bench_title', array('label' => __('Bench Section Title', 'factor-2'), 'section' => 'factor_2_testing_bench_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_test_bench_desc', array('default' => 'We have a pool of highly skilled techies available to work for you on a contract basis, enabling you to focus on growing your business without being tied down to long-term commitments.', 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_test_bench_desc', array('label' => __('Bench Section Description', 'factor-2'), 'section' => 'factor_2_testing_bench_section', 'type' => 'textarea'));

	for ($i = 1; $i <= 9; $i++) {
		// Image
		$wp_customize->add_setting("f2_test_bench_item_{$i}_img", array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "f2_test_bench_item_{$i}_img", array(
			'label' => sprintf(__('Expert %d: Image', 'factor-2'), $i),
			'section' => 'factor_2_testing_bench_section',
		)));

		// Tag/Badge
		$wp_customize->add_setting("f2_test_bench_item_{$i}_tag", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
		$wp_customize->add_control("f2_test_bench_item_{$i}_tag", array(
			'label' => sprintf(__('Expert %d: Tag', 'factor-2'), $i),
			'section' => 'factor_2_testing_bench_section',
			'type' => 'text',
		));

		// Role/Title
		$wp_customize->add_setting("f2_test_bench_item_{$i}_role", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
		$wp_customize->add_control("f2_test_bench_item_{$i}_role", array(
			'label' => sprintf(__('Expert %d: Role Title', 'factor-2'), $i),
			'section' => 'factor_2_testing_bench_section',
			'type' => 'text',
		));

		// Description
		$wp_customize->add_setting("f2_test_bench_item_{$i}_desc", array('default' => '', 'sanitize_callback' => 'sanitize_textarea_field'));
		$wp_customize->add_control("f2_test_bench_item_{$i}_desc", array(
			'label' => sprintf(__('Expert %d: Description', 'factor-2'), $i),
			'section' => 'factor_2_testing_bench_section',
			'type' => 'textarea',
		));
	}

	// 10. AI Expert Bench Slider
	$wp_customize->add_section('factor_2_ai_bench_section', array(
		'title'    => __('AI Development: Expert Bench Slider', 'factor-2'),
		'priority' => 39,
	));

	$wp_customize->add_setting('f2_ai_bench_title', array('default' => 'Our AI Experts & Data Scientists', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_ai_bench_title', array('label' => __('AI Bench Title', 'factor-2'), 'section' => 'factor_2_ai_bench_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_ai_bench_desc', array('default' => 'Our team consists of world-class AI researchers and machine learning engineers ready to solve your most complex data challenges.', 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_ai_bench_desc', array('label' => __('AI Bench Description', 'factor-2'), 'section' => 'factor_2_ai_bench_section', 'type' => 'textarea'));

	for ($i = 1; $i <= 9; $i++) {
		// Image
		$wp_customize->add_setting("f2_ai_bench_item_{$i}_img", array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "f2_ai_bench_item_{$i}_img", array(
			'label' => sprintf(__('Expert %d: Image', 'factor-2'), $i),
			'section' => 'factor_2_ai_bench_section',
		)));

		// Tag/Badge
		$wp_customize->add_setting("f2_ai_bench_item_{$i}_tag", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
		$wp_customize->add_control("f2_ai_bench_item_{$i}_tag", array(
			'label' => sprintf(__('Expert %d: Tag', 'factor-2'), $i),
			'section' => 'factor_2_ai_bench_section',
			'type' => 'text',
		));

		// Role/Title
		$wp_customize->add_setting("f2_ai_bench_item_{$i}_role", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
		$wp_customize->add_control("f2_ai_bench_item_{$i}_role", array(
			'label' => sprintf(__('Expert %d: Role Title', 'factor-2'), $i),
			'section' => 'factor_2_ai_bench_section',
			'type' => 'text',
		));

		// Description
		$wp_customize->add_setting("f2_ai_bench_item_{$i}_desc", array('default' => '', 'sanitize_callback' => 'sanitize_textarea_field'));
		$wp_customize->add_control("f2_ai_bench_item_{$i}_desc", array(
			'label' => sprintf(__('Expert %d: Description', 'factor-2'), $i),
			'section' => 'factor_2_ai_bench_section',
			'type' => 'textarea',
		));
	}

	// ==============================================================
	// CONSULTING & STRATEGY SECTION
	// ==============================================================
	$wp_customize->add_section('factor_2_consulting_section', array(
		'title'    => __('Consulting & Strategy', 'factor-2'),
		'priority' => 40,
	));

	// 1. Hero
	$wp_customize->add_setting('f2_consulting_hero_badge', array('default' => 'Strategic Excellence', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_consulting_hero_badge', array('label' => __('Hero Badge', 'factor-2'), 'section' => 'factor_2_consulting_section', 'type' => 'text'));

	$wp_customize->add_setting('f2_consulting_hero_title', array('default' => "Architecting the Future of\nYour Business", 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_consulting_hero_title', array('label' => __('Hero Title', 'factor-2'), 'section' => 'factor_2_consulting_section', 'type' => 'textarea'));

	$wp_customize->add_setting('f2_consulting_hero_desc', array('default' => 'We help visionary leaders navigate complexity, unlock hidden value, and build resilient organizations through data-driven strategy.', 'sanitize_callback' => 'sanitize_textarea_field'));
	$wp_customize->add_control('f2_consulting_hero_desc', array('label' => __('Hero Description', 'factor-2'), 'section' => 'factor_2_consulting_section', 'type' => 'textarea'));

	$wp_customize->add_setting('f2_consulting_hero_cta_text', array('default' => 'Let\'s Talk →', 'sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control('f2_consulting_hero_cta_text', array('label' => __('Hero CTA Text', 'factor-2'), 'section' => 'factor_2_consulting_section', 'type' => 'text'));

	// Rotating Phrases
	$wp_customize->add_setting('f2_consulting_rotating_phrases', array(
		'default' => 'DRIVE GROWTH,OPTIMIZE OPERATIONS,DELIVER VALUE',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('f2_consulting_rotating_phrases', array(
		'label' => __('Rotating Phrases (comma separated)', 'factor-2'),
		'section' => 'factor_2_consulting_section',
		'type' => 'textarea'
	));

	// Hero Background Video
	$wp_customize->add_setting('f2_consulting_hero_video', array(
		'default' => '',
		'sanitize_callback' => 'absint'
	));
	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'f2_consulting_hero_video', array(
		'label' => __('Hero Background Video', 'factor-2'),
		'section' => 'factor_2_consulting_section',
		'mime_type' => 'video'
	)));

	// 2. Strategic Statistics (3)
	for ($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting("f2_consulting_stat_{$i}_num", array('default' => '0', 'sanitize_callback' => 'sanitize_text_field'));
		$wp_customize->add_control("f2_consulting_stat_{$i}_num", array('label' => sprintf(__('Stat %d: Number', 'factor-2'), $i), 'section' => 'factor_2_consulting_section', 'type' => 'text'));

		$wp_customize->add_setting("f2_consulting_stat_{$i}_label", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
		$wp_customize->add_control("f2_consulting_stat_{$i}_label", array('label' => sprintf(__('Stat %d: Label', 'factor-2'), $i), 'section' => 'factor_2_consulting_section', 'type' => 'text'));
	}

	// 3. Capabilities Mosaic (6 items)
	for ($i = 1; $i <= 6; $i++) {
		$wp_customize->add_setting("f2_consulting_cap_{$i}_title", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
		$wp_customize->add_control("f2_consulting_cap_{$i}_title", array('label' => sprintf(__('Capability %d: Title', 'factor-2'), $i), 'section' => 'factor_2_consulting_section', 'type' => 'text'));

		$wp_customize->add_setting("f2_consulting_cap_{$i}_desc", array('default' => '', 'sanitize_callback' => 'sanitize_textarea_field'));
		$wp_customize->add_control("f2_consulting_cap_{$i}_desc", array('label' => sprintf(__('Capability %d: Description', 'factor-2'), $i), 'section' => 'factor_2_consulting_section', 'type' => 'textarea'));

		$wp_customize->add_setting("f2_consulting_cap_{$i}_img", array('default' => '', 'sanitize_callback' => 'absint'));
		$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "f2_consulting_cap_{$i}_img", array(
			'label' => sprintf(__('Capability %d: Image', 'factor-2'), $i),
			'section' => 'factor_2_consulting_section',
			'mime_type' => 'image',
		)));
	}

	// 4. Strategic Process (Blueprint - 4 steps)
	$step_defaults = array(
		1 => array('title' => 'Discovery', 'desc' => 'We audit your current state, data, and culture to identify the root challenges.'),
		2 => array('title' => 'Synthesis', 'desc' => 'Converting raw data into a coherent strategic narrative and actionable roadmap.'),
		3 => array('title' => 'Execution', 'desc' => 'Working side-by-side with your teams to pilot, pivot, and implement at speed.'),
		4 => array('title' => 'Evolution', 'desc' => 'Continuous optimization and feedback loops to ensure long-term strategic resilience.'),
	);

	for ($i = 1; $i <= 4; $i++) {
		$wp_customize->add_setting("f2_consulting_step_{$i}_title", array('default' => $step_defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field'));
		$wp_customize->add_control("f2_consulting_step_{$i}_title", array('label' => sprintf(__('Step %d: Title', 'factor-2'), $i), 'section' => 'factor_2_consulting_section', 'type' => 'text'));

		$wp_customize->add_setting("f2_consulting_step_{$i}_desc", array('default' => $step_defaults[$i]['desc'], 'sanitize_callback' => 'sanitize_textarea_field'));
		$wp_customize->add_control("f2_consulting_step_{$i}_desc", array('label' => sprintf(__('Step %d: Description', 'factor-2'), $i), 'section' => 'factor_2_consulting_section', 'type' => 'textarea'));
	}
}
add_action('customize_register', 'factor_2_customize_register');
