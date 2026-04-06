<?php
/**
 * Main fallback template.
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main class="site-main">
	<section class="content-shell content-shell--wide">
		<div class="section-heading">
			<div>
				<p class="section-kicker"><?php esc_html_e( 'Journal', 'factor-2' ); ?></p>
				<h1><?php esc_html_e( 'Latest notes on product, design, and digital delivery.', 'factor-2' ); ?></h1>
			</div>
			<p><?php esc_html_e( 'This fallback template keeps archive and blog views aligned with the front-page design instead of dropping back to a generic layout.', 'factor-2' ); ?></p>
		</div>

		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'post-card' ); ?>>
						<p class="section-kicker"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></p>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php echo esc_html( wp_trim_words( wp_strip_all_tags( get_the_excerpt() ? get_the_excerpt() : get_the_content() ), 28, '...' ) ); ?></p>
						<a class="button-link button-link--minimal" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read article', 'factor-2' ); ?></a>
					</article>
				<?php endwhile; ?>
			</div>

			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<div class="content-card content-card--empty">
				<h2><?php esc_html_e( 'No posts published yet.', 'factor-2' ); ?></h2>
				<p><?php esc_html_e( 'The archive area is ready. Add articles in WordPress and they will automatically appear here and on the homepage insights section.', 'factor-2' ); ?></p>
			</div>
		<?php endif; ?>
	</section>
</main>
<?php
get_footer();
