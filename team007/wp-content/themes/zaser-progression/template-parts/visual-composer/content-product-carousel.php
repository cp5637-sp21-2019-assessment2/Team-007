<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php 
$classes = array(
		'item',
);
	
post_class($classes); ?>>
	
	<div class="progression-studios-store-product-image-container <?php echo esc_attr( get_theme_mod('progression_studios_shop_index_transition', 'progression-studios-shop-image-no-effect') ); ?>">
		
		<a href="<?php the_permalink(); ?>" class="progression-studios-store-image-index">
			<?php if( get_post_meta($post->ID, 'progression_studios_new_shop_item', true) ): ?><span class="progression-studios-new-banner"><?php echo esc_html__( 'New!', 'zaser-progression' ); ?></span><?php endif; ?>
				
			<?php if(get_post_meta($post->ID, 'progression_studios_shop_secondary_image', true)): ?>
				<div class="progression-studios-woocommerce-secondary-image" style="background-image:url(<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_shop_secondary_image', true) );?>)"></div>
			<?php endif; ?>
				
			<?php do_action( 'woocommerce_before_shop_loop_item' ); ?><!-- start of a href -->
			<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?><!-- image -->
		</a>
		
		<?php if( !$product->is_in_stock() ): ?>
			<div class="progression-studios-outofstock"><span><?php echo esc_html__( 'Out of stock', 'zaser-progression' ); ?></span></div>
		<?php endif; ?>
		
		<div class="progression-studios-shop-overlay-buttons">
			<a href="<?php the_permalink(); ?>" class="progression-shop-overlay-more"><i class="fa fa-eye" aria-hidden="true"></i></a>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?><!--  add to cart -->
		</div><!-- close .progression-studios-shop-overlay-buttons -->
		
	</div><!-- close .progression-studios-store-product-image-container -->


	<div class="progression-studios-shop-index-text">
		<a href="<?php the_permalink(); ?>" class="progression-studios-view-permalink">
			<h3 <?php if($shop_heading_size) : ?>style="font-size:<?php echo esc_attr($shop_heading_size) ?>;"<?php endif; ?>><?php the_title(); ?></h3>
			<?php if ( $shop_price_display == 'true' ) : ?><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?><!-- rating and price --><?php endif; ?>
		</a>
	
	</div>
	
</li>