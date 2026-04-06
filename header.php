<?php
/**
 * The header template.
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description' );

if ( empty( $site_name ) || 'My WordPress' === $site_name ) {
	$site_name = __( 'AGENCY PRO', 'factor-2' );
}

if ( empty( $tagline ) || 'Just another WordPress site' === $tagline ) {
	$tagline = __( 'Premium Digital Product & App Development Studio', 'factor-2' );
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<style>
		:root {
			--base-font-size: <?php echo get_theme_mod('f2_font_size_body', 16); ?>px;
			--h1-font-size: <?php echo get_theme_mod('f2_font_size_h1', 64); ?>px;
			--h2-font-size: <?php echo get_theme_mod('f2_font_size_h2', 40); ?>px;
			--kicker-font-size: <?php echo get_theme_mod('f2_font_size_kicker', 14); ?>px;
			--btn-primary-bg: <?php echo get_theme_mod('f2_btn_primary_bg', '#91c73d'); ?>;
			--btn-consult-bg: <?php echo get_theme_mod('f2_btn_consult_bg', '#444444'); ?>;
			--btn-consult-color: <?php echo get_theme_mod('f2_btn_consult_color', '#ffffff'); ?>;
			--banner-bg: <?php echo get_theme_mod('f2_banner_bg', '#f7ffe8'); ?>;
			--hero-banner-bg: <?php echo get_theme_mod('f2_hero_banner_bg', '#ffffff'); ?>;
			--rotator-color: <?php echo get_theme_mod('f2_rotator_text_color', '#92C83D'); ?>;
			--rotator-prefix-size: <?php echo get_theme_mod('f2_rotator_prefix_size', '1.2'); ?>rem;
			--rotator-text-size: <?php echo get_theme_mod('f2_rotator_text_size', '1.2'); ?>rem;
		}
	</style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'factor-2' ); ?></a>
<div class="site-shell">
	<header class="site-header">
		<div class="site-header__inner">
			<div class="site-branding-container">
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					?>
					<a class="site-branding" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<span class="site-branding__text">
							<strong><?php echo esc_html( $site_name ); ?></strong>
						</span>
					</a>
					<?php
				}
				?>
			</div>

			<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-navigation">
				<span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'factor-2' ); ?></span>
				<span></span>
				<span></span>
				<span></span>
			</button>

			<nav id="site-navigation" class="site-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'factor-2' ); ?>">
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => false,
							'menu_class'     => 'site-navigation__list',
							'fallback_cb'    => false,
						)
					);
				} else {
					// Fallback to primary items if no menu is set
					$nav_items = factor_2_get_primary_nav_items();
					?>
					<ul class="site-navigation__list">
						<?php foreach ( $nav_items as $nav_item ) : ?>
							<?php $is_cta = ! empty( $nav_item['is_cta'] ) ? $nav_item['is_cta'] : false; ?>
							<li class="<?php echo ! empty( $nav_item['children'] ) ? 'menu-item-has-children' : ''; ?> <?php echo $is_cta ? 'menu-item-cta' : ''; ?>">
								<a href="<?php echo esc_url( $nav_item['url'] ); ?>" <?php echo $is_cta ? 'class="button-link button-link--primary" style="padding: 0.5rem 1.25rem; font-size: 0.9rem;"' : ''; ?>>
									<?php echo esc_html( $nav_item['label'] ); ?>
									<?php if ( ! empty( $nav_item['children'] ) ) : ?>
										<svg class="dropdown-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
									<?php endif; ?>
								</a>
								<?php if ( ! empty( $nav_item['children'] ) ) : ?>
									<ul class="sub-menu">
										<?php foreach ( $nav_item['children'] as $child ) : ?>
											<li>
												<a href="<?php echo esc_url( $child['url'] ); ?>"><?php echo esc_html( $child['label'] ); ?></a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php
				}
				?>
			</nav>
		</div>
	</header>
