<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
?>
<div class="images">
	
	
	<div class="progression-studios-theme-main-image flexslider <?php echo esc_attr( get_theme_mod('progression_studios_shop_post_transition', 'progression-studios-shop-image-no-effect') ); ?>">
		
		<?php if( get_post_meta($post->ID, 'progression_studios_new_shop_item', true) ): ?><span class="progression-studios-new-banner"><?php echo esc_html__( 'New!', 'zaser-progression' ); ?></span><?php endif; ?>
			
		<?php if( !$product->is_in_stock() ): ?>
			<div class="progression-studios-outofstock"><span><?php echo esc_html__( 'Out of stock', 'zaser-progression' ); ?></span></div>
		<?php endif; ?>
		
		<?php if ( $product->is_on_sale() ) : ?>
			<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'zaser-progression' ) . '</span>', $post, $product ); ?>
		<?php endif; ?>
		
		
	<ul class="slides">
	<?php
		if ( has_post_thumbnail() ) {
			$attachment_count = count( $product->get_gallery_attachment_ids() );
			$gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
			$props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
			$image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	 => $props['title'],
				'alt'    => $props['alt'],
			) );
			echo apply_filters(
				'woocommerce_single_product_image_html',
				sprintf(
					'<li><a href="%s" itemprop="image" class="progression-studios-gallery-image" title="%s" data-rel="prettyPhoto%s">%s</a></li>',
					esc_url( $props['url'] ),
					esc_attr( $props['caption'] ),
					$gallery,
					$image
				),
				$post->ID
			);
		} else {
			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'zaser-progression' ) ), $post->ID );
		}
	?>
	
	
	<?php
	$attachment_ids = $product->get_gallery_attachment_ids();

	if ( $attachment_ids ) {
		$loop 		= 0;
		$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
		?>		
			<?php

			foreach ( $attachment_ids as $attachment_id ) {
				$props       = wc_get_product_attachment_props( $attachment_id, $post );

				if ( ! $props['url'] ) {
					continue;
				}

				echo apply_filters(
					'woocommerce_single_product_image_thumbnail_html',
					sprintf(
						'<li><a href="%s" class="progression-studios-gallery-image" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a></li>',
						esc_url( $props['url'] ),
						esc_attr( $props['caption'] ),
						wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), 0, $props )
					),
					$attachment_id,
					$post->ID				);

				$loop++;
			}
		}
		?>
	</ul>
	</div><!-- close .progression-studios-theme-main-image -->
	
	
	<div class="progression-studios-theme-thumbnail-navigation flexslider">
	<ul class="slides">
	
	<?php
	$attachment_ids = $product->get_gallery_attachment_ids();

	if ( $attachment_ids ) {
		$loop 		= 0;
		$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
		?>		
		
		<?php
			if ( has_post_thumbnail() ) {
				$attachment_count = count( $product->get_gallery_attachment_ids() );
				$props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
				$image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), array(
					'title'	 => $props['title'],
					'alt'    => $props['alt'],
				) );
				echo apply_filters(
					'woocommerce_single_product_image_html',
					sprintf(
						'<li><a href="%s" itemprop="image" class="progression-studios-thumbnail-image" title="%s">%s</a></li>',
						esc_url( $props['url'] ),
						esc_attr( $props['caption'] ),
						$image
					),
					$post->ID
				);
			}
		?>
			<?php

			foreach ( $attachment_ids as $attachment_id ) {
				$props       = wc_get_product_attachment_props( $attachment_id, $post );

				if ( ! $props['url'] ) {
					continue;
				}

				echo apply_filters(
					'woocommerce_single_product_image_thumbnail_html',
					sprintf(
						'<li><a href="%s" class="progression-studios-thumbnail-image" title="%s">%s</a></li>',
						esc_url( $props['url'] ),
						esc_attr( $props['caption'] ),
						wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), 0, $props )
					),
					$attachment_id,
					$post->ID				);

				$loop++;
			}
		}
		?>
	</ul>
	</div><!-- close #progression-studios-theme-main-image -->
	
</div>
