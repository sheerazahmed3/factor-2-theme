<?php
/**
 * The footer template.
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$nav_items = factor_2_get_primary_nav_items();
$content   = factor_2_get_homepage_content();
?>
	<footer class="site-footer">
		<div class="site-footer__grid">
			<div class="footer-col">
				<h3><?php esc_html_e( 'Offices', 'factor-2' ); ?></h3>
				<?php foreach ( $content['offices'] as $office ) : ?>
					<p><?php echo esc_html( $office ); ?></p>
				<?php endforeach; ?>
			</div>

			<div class="footer-col">
				<h3><?php esc_html_e( 'Explore', 'factor-2' ); ?></h3>
				<ul>
					<?php foreach ( $nav_items as $nav_item ) : ?>
						<li><a href="<?php echo esc_url( $nav_item['url'] ); ?>"><?php echo esc_html( $nav_item['label'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="footer-col">
				<h3><?php esc_html_e( 'Quick Links', 'factor-2' ); ?></h3>
				<ul>
					<?php foreach ( $content['quick_links'] as $link ) : ?>
						<li><a href="#"><?php echo esc_html( $link ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="footer-col">
				<h3><?php esc_html_e( 'Socials', 'factor-2' ); ?></h3>
				<ul>
					<?php foreach ( $content['social_links'] as $social ) : ?>
						<li><a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" rel="noreferrer noopener"><?php echo esc_html( $social['label'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<div class="site-footer__bottom">
			<div class="site-footer__bottom-inner">
				<p class="copyright">
					&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. <?php esc_html_e( 'All rights reserved.', 'factor-2' ); ?>
				</p>
				<p class="credits">
					<?php esc_html_e( 'Designed for scale.', 'factor-2' ); ?>
				</p>
			</div>
		</div>
	</footer>
</div> <!-- .site-shell -->
<?php wp_footer(); ?>
</body>
</html>
