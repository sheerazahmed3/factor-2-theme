<?php
/**
 * 404 Error page template.
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="main" class="site-main">
	<section class="section" style="min-height: 60vh; display: flex; align-items: center;">
		<div class="container" style="text-align: center; max-width: 600px;">
			<p class="section-kicker"><?php esc_html_e( '404 Error', 'factor-2' ); ?></p>
			<h1 style="font-size: 4rem; margin-bottom: 1rem;"><?php esc_html_e( 'Page not found', 'factor-2' ); ?></h1>
			<p style="font-size: 1.125rem; color: var(--text-secondary); margin-bottom: 2rem;">
				<?php esc_html_e( 'The page you\'re looking for doesn\'t exist or has been moved.', 'factor-2' ); ?>
			</p>
			<a class="button-link button-link--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'Back to Homepage', 'factor-2' ); ?>
			</a>
		</div>
	</section>
</main>
<?php
get_footer();
