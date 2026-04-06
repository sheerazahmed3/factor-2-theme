<?php
/**
 * Single post template.
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
					<p class="section-kicker"><?php esc_html_e( 'Article', 'factor-2' ); ?></p>
					<h1><?php the_title(); ?></h1>
					<div class="entry-meta">
						<span><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
						<span><?php echo esc_html( get_the_author() ); ?></span>
					</div>
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
