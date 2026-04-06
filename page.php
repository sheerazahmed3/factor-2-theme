<?php
/**
 * Page template.
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main class="site-main">
	<section class="content-shell">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class( 'content-card' ); ?>>
				<header class="entry-header">
					<p class="section-kicker"><?php esc_html_e( 'Page', 'factor-2' ); ?></p>
					<h1><?php the_title(); ?></h1>
					<?php if ( has_excerpt() ) : ?>
						<p class="entry-summary"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
				</header>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</section>
</main>
<?php
get_footer();
