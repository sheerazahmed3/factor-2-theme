<?php
/**
 * Custom Post Types: Services, Testimonials, Portfolio
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ============================================================
// 1. Register Custom Post Types
// ============================================================

function factor_2_register_cpts() {

	// --- Services ---
	register_post_type( 'f2_service', array(
		'labels' => array(
			'name'               => __( 'Services', 'factor-2' ),
			'singular_name'      => __( 'Service', 'factor-2' ),
			'add_new'            => __( 'Add New Service', 'factor-2' ),
			'add_new_item'       => __( 'Add New Service', 'factor-2' ),
			'edit_item'          => __( 'Edit Service', 'factor-2' ),
			'all_items'          => __( 'All Services', 'factor-2' ),
			'search_items'       => __( 'Search Services', 'factor-2' ),
			'not_found'          => __( 'No services found.', 'factor-2' ),
			'not_found_in_trash' => __( 'No services found in Trash.', 'factor-2' ),
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'menu_icon'    => 'dashicons-admin-tools',
		'supports'     => array( 'title', 'page-attributes' ),
		'has_archive'  => false,
		'rewrite'      => false,
	) );

	// --- Testimonials ---
	register_post_type( 'f2_testimonial', array(
		'labels' => array(
			'name'               => __( 'Testimonials', 'factor-2' ),
			'singular_name'      => __( 'Testimonial', 'factor-2' ),
			'add_new'            => __( 'Add New Testimonial', 'factor-2' ),
			'add_new_item'       => __( 'Add New Testimonial', 'factor-2' ),
			'edit_item'          => __( 'Edit Testimonial', 'factor-2' ),
			'all_items'          => __( 'All Testimonials', 'factor-2' ),
			'search_items'       => __( 'Search Testimonials', 'factor-2' ),
			'not_found'          => __( 'No testimonials found.', 'factor-2' ),
			'not_found_in_trash' => __( 'No testimonials found in Trash.', 'factor-2' ),
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'menu_icon'    => 'dashicons-format-quote',
		'supports'     => array( 'title', 'page-attributes' ),
		'has_archive'  => false,
		'rewrite'      => false,
	) );

	// --- Portfolio ---
	register_post_type( 'f2_portfolio', array(
		'labels' => array(
			'name'               => __( 'Portfolio', 'factor-2' ),
			'singular_name'      => __( 'Project', 'factor-2' ),
			'add_new'            => __( 'Add New Project', 'factor-2' ),
			'add_new_item'       => __( 'Add New Project', 'factor-2' ),
			'edit_item'          => __( 'Edit Project', 'factor-2' ),
			'all_items'          => __( 'All Projects', 'factor-2' ),
			'search_items'       => __( 'Search Projects', 'factor-2' ),
			'not_found'          => __( 'No projects found.', 'factor-2' ),
			'not_found_in_trash' => __( 'No projects found in Trash.', 'factor-2' ),
		),
		'public'       => true,
		'publicly_queryable' => true,
		'show_ui'      => true,
		'show_in_menu' => true,
		'menu_icon'    => 'dashicons-portfolio',
		'supports'     => array( 'title', 'thumbnail', 'excerpt', 'page-attributes' ),
		'has_archive'  => true,
		'rewrite'      => array( 'slug' => 'portfolio-item' ),
	) );
}
add_action( 'init', 'factor_2_register_cpts' );


// ============================================================
// 2. Meta Boxes
// ============================================================

function factor_2_add_meta_boxes() {

	// Service meta box
	add_meta_box(
		'f2_service_details',
		__( 'Service Details', 'factor-2' ),
		'factor_2_service_meta_box_html',
		'f2_service',
		'normal',
		'high'
	);

	// Testimonial meta box
	add_meta_box(
		'f2_testimonial_details',
		__( 'Testimonial Details', 'factor-2' ),
		'factor_2_testimonial_meta_box_html',
		'f2_testimonial',
		'normal',
		'high'
	);

	// Portfolio meta box
	add_meta_box(
		'f2_portfolio_details',
		__( 'Project Details', 'factor-2' ),
		'factor_2_portfolio_meta_box_html',
		'f2_portfolio',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'factor_2_add_meta_boxes' );


// --- Service Meta Box HTML ---
function factor_2_service_meta_box_html( $post ) {
	wp_nonce_field( 'f2_service_save', 'f2_service_nonce' );
	$eyebrow = get_post_meta( $post->ID, '_f2_service_eyebrow', true );
	$desc    = get_post_meta( $post->ID, '_f2_service_description', true );
	$url     = get_post_meta( $post->ID, '_f2_service_url', true );
	?>
	<table class="form-table">
		<tr>
			<th><label for="f2_service_eyebrow"><?php esc_html_e( 'Eyebrow / Category', 'factor-2' ); ?></label></th>
			<td><input type="text" id="f2_service_eyebrow" name="f2_service_eyebrow" class="regular-text" value="<?php echo esc_attr( $eyebrow ); ?>" placeholder="e.g. Consulting & Strategy, App Design"></td>
		</tr>
		<tr>
			<th><label for="f2_service_description"><?php esc_html_e( 'Description', 'factor-2' ); ?></label></th>
			<td><textarea id="f2_service_description" name="f2_service_description" rows="4" class="large-text"><?php echo esc_textarea( $desc ); ?></textarea></td>
		</tr>
		<tr>
			<th><label for="f2_service_url"><?php esc_html_e( 'Link URL', 'factor-2' ); ?></label></th>
			<td><input type="url" id="f2_service_url" name="f2_service_url" class="regular-text" value="<?php echo esc_url( $url ); ?>" placeholder="https://"></td>
		</tr>
	</table>
	<p class="description"><?php esc_html_e( 'Use the post Title as the service name. Use Menu Order (in Page Attributes) to control display order.', 'factor-2' ); ?></p>
	<?php
}

// --- Testimonial Meta Box HTML ---
function factor_2_testimonial_meta_box_html( $post ) {
	wp_nonce_field( 'f2_testimonial_save', 'f2_testimonial_nonce' );
	$quote = get_post_meta( $post->ID, '_f2_testimonial_quote', true );
	$name  = get_post_meta( $post->ID, '_f2_testimonial_name', true );
	$role  = get_post_meta( $post->ID, '_f2_testimonial_role', true );
	?>
	<table class="form-table">
		<tr>
			<th><label for="f2_testimonial_quote"><?php esc_html_e( 'Quote', 'factor-2' ); ?></label></th>
			<td><textarea id="f2_testimonial_quote" name="f2_testimonial_quote" rows="4" class="large-text"><?php echo esc_textarea( $quote ); ?></textarea></td>
		</tr>
		<tr>
			<th><label for="f2_testimonial_name"><?php esc_html_e( 'Author Name', 'factor-2' ); ?></label></th>
			<td><input type="text" id="f2_testimonial_name" name="f2_testimonial_name" class="regular-text" value="<?php echo esc_attr( $name ); ?>"></td>
		</tr>
		<tr>
			<th><label for="f2_testimonial_role"><?php esc_html_e( 'Author Role / Company', 'factor-2' ); ?></label></th>
			<td><input type="text" id="f2_testimonial_role" name="f2_testimonial_role" class="regular-text" value="<?php echo esc_attr( $role ); ?>" placeholder="e.g. CEO, Example Corp"></td>
		</tr>
	</table>
	<p class="description"><?php esc_html_e( 'The post Title is used internally only. Use Menu Order to control display order.', 'factor-2' ); ?></p>
	<?php
}

// --- Portfolio Meta Box HTML ---
function factor_2_portfolio_meta_box_html( $post ) {
	wp_nonce_field( 'f2_portfolio_save', 'f2_portfolio_nonce' );
	$client = get_post_meta( $post->ID, '_f2_portfolio_client', true );
	$type   = get_post_meta( $post->ID, '_f2_portfolio_type', true );
	?>
	<table class="form-table">
		<tr>
			<th><label for="f2_portfolio_client"><?php esc_html_e( 'Client Name', 'factor-2' ); ?></label></th>
			<td><input type="text" id="f2_portfolio_client" name="f2_portfolio_client" class="regular-text" value="<?php echo esc_attr( $client ); ?>"></td>
		</tr>
		<tr>
			<th><label for="f2_portfolio_type"><?php esc_html_e( 'Project Type', 'factor-2' ); ?></label></th>
			<td><input type="text" id="f2_portfolio_type" name="f2_portfolio_type" class="regular-text" value="<?php echo esc_attr( $type ); ?>" placeholder="e.g. Patient monitoring platform"></td>
		</tr>
	</table>
	<p class="description"><?php esc_html_e( 'Use the post Title as the project name. Set a Featured Image for the project thumbnail. Use Menu Order to control display order.', 'factor-2' ); ?></p>
	<?php
}


// ============================================================
// 3. Save Meta Box Data
// ============================================================

function factor_2_save_service_meta( $post_id ) {
	if ( ! isset( $_POST['f2_service_nonce'] ) || ! wp_verify_nonce( $_POST['f2_service_nonce'], 'f2_service_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['f2_service_eyebrow'] ) ) {
		update_post_meta( $post_id, '_f2_service_eyebrow', sanitize_text_field( $_POST['f2_service_eyebrow'] ) );
	}
	if ( isset( $_POST['f2_service_description'] ) ) {
		update_post_meta( $post_id, '_f2_service_description', sanitize_textarea_field( $_POST['f2_service_description'] ) );
	}
	if ( isset( $_POST['f2_service_url'] ) ) {
		update_post_meta( $post_id, '_f2_service_url', esc_url_raw( $_POST['f2_service_url'] ) );
	}
}
add_action( 'save_post_f2_service', 'factor_2_save_service_meta' );

function factor_2_save_testimonial_meta( $post_id ) {
	if ( ! isset( $_POST['f2_testimonial_nonce'] ) || ! wp_verify_nonce( $_POST['f2_testimonial_nonce'], 'f2_testimonial_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['f2_testimonial_quote'] ) ) {
		update_post_meta( $post_id, '_f2_testimonial_quote', sanitize_textarea_field( $_POST['f2_testimonial_quote'] ) );
	}
	if ( isset( $_POST['f2_testimonial_name'] ) ) {
		update_post_meta( $post_id, '_f2_testimonial_name', sanitize_text_field( $_POST['f2_testimonial_name'] ) );
	}
	if ( isset( $_POST['f2_testimonial_role'] ) ) {
		update_post_meta( $post_id, '_f2_testimonial_role', sanitize_text_field( $_POST['f2_testimonial_role'] ) );
	}
}
add_action( 'save_post_f2_testimonial', 'factor_2_save_testimonial_meta' );

function factor_2_save_portfolio_meta( $post_id ) {
	if ( ! isset( $_POST['f2_portfolio_nonce'] ) || ! wp_verify_nonce( $_POST['f2_portfolio_nonce'], 'f2_portfolio_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['f2_portfolio_client'] ) ) {
		update_post_meta( $post_id, '_f2_portfolio_client', sanitize_text_field( $_POST['f2_portfolio_client'] ) );
	}
	if ( isset( $_POST['f2_portfolio_type'] ) ) {
		update_post_meta( $post_id, '_f2_portfolio_type', sanitize_text_field( $_POST['f2_portfolio_type'] ) );
	}
}
add_action( 'save_post_f2_portfolio', 'factor_2_save_portfolio_meta' );


// ============================================================
// 4. Query Helpers — pull CPT data for templates
// ============================================================

/**
 * Get all published services sorted by menu order.
 */
function factor_2_get_services() {
	$posts = get_posts( array(
		'post_type'      => 'f2_service',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'post_status'    => 'publish',
	) );

	$items = array();
	foreach ( $posts as $post ) {
		$items[] = array(
			'eyebrow' => get_post_meta( $post->ID, '_f2_service_eyebrow', true ),
			'title'   => get_the_title( $post->ID ),
			'copy'    => get_post_meta( $post->ID, '_f2_service_description', true ),
			'url'     => get_post_meta( $post->ID, '_f2_service_url', true ),
		);
	}
	return $items;
}

/**
 * Get all published testimonials sorted by menu order.
 */
function factor_2_get_testimonials() {
	$posts = get_posts( array(
		'post_type'      => 'f2_testimonial',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'post_status'    => 'publish',
	) );

	$items = array();
	foreach ( $posts as $post ) {
		$items[] = array(
			'quote' => get_post_meta( $post->ID, '_f2_testimonial_quote', true ),
			'name'  => get_post_meta( $post->ID, '_f2_testimonial_name', true ),
			'role'  => get_post_meta( $post->ID, '_f2_testimonial_role', true ),
		);
	}
	return $items;
}

/**
 * Get all published portfolio items sorted by menu order.
 */
function factor_2_get_portfolio() {
	$posts = get_posts( array(
		'post_type'      => 'f2_portfolio',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'post_status'    => 'publish',
	) );

	$items = array();
	foreach ( $posts as $post ) {
		$excerpt = get_the_excerpt( $post->ID );
		if ( empty( $excerpt ) ) {
			$excerpt = wp_trim_words( $post->post_content, 20 );
		}

		$items[] = array(
			'title'     => get_the_title( $post->ID ),
			'client'    => get_post_meta( $post->ID, '_f2_portfolio_client', true ),
			'type'      => get_post_meta( $post->ID, '_f2_portfolio_type', true ),
			'excerpt'   => $excerpt,
			'thumbnail' => get_the_post_thumbnail_url( $post->ID, 'large' ),
			'url'       => get_permalink( $post->ID ),
		);
	}
	return $items;
}
