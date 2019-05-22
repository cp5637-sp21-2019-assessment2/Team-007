<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}
$custom_products_per_page = esc_attr( get_theme_mod('progression_studios_shop_related_columns', '4'));


$related = $product->get_related( $custom_products_per_page );

	
if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $custom_products_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $custom_products_per_page;

if ( $products->have_posts() ) : ?>

<?php if (get_theme_mod( 'progression_studios_shop_post_related_display', 'on' ) == 'on') : ?>
	
	<div class="related products">

		<h2 class="related-product-heading"><?php esc_html_e( 'Related Products', 'zaser-progression' ); ?></h2>
		
		<div class="woocommerce columns-<?php echo esc_attr( get_theme_mod('progression_studios_shop_related_columns', '4') ); ?>">
		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>
		</div>
	</div>
	
<?php endif; ?>

<?php endif;

wp_reset_postdata();
