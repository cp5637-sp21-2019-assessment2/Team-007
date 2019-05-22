<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>

<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( 'SKU:', 'zaser-progression' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'zaser-progression' ); ?></span></span>

	<?php endif; ?>

	<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'zaser-progression' ) . ' ', '</span>' ); ?>

	<?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'zaser-progression' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>

<?php if (get_theme_mod( 'progression_studios_shop_post_sharing', 'on') == 'on') : ?>
					<div id="progression-studios-store-sharing-title"><?php echo esc_html__( 'Share:', 'zaser-progression' ); ?></div>
					<ul class="single-shop-social-sharing noselect">

						<?php if (get_theme_mod( 'progression_single_shop_sharing_facebook', '1')) : ?><li><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(the_permalink()); ?>&t=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Facebook', 'zaser-progression' ); ?>" class="facebook-share" target="_blank"><i class="fa fa-facebook-official"></i></a></li><?php endif; ?>

						<?php if (get_theme_mod( 'progression_single_shop_sharing_twitter', '1')) : ?><li><a href="https://twitter.com/share?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Twitter', 'zaser-progression' ); ?>" class="twitter-share" target="_blank"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
		
						<?php if (get_theme_mod( 'progression_single_shop_sharing_pinterest', '1')) : ?><li><a href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;//assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());" title="<?php esc_html_e( 'Share on Pinterest', 'zaser-progression' ); ?>" class="pinterest-share"><i class="fa fa-pinterest-p"></i></a></li><?php endif; ?>

	
						<?php if (get_theme_mod( 'progression_single_shop_sharing_vk' )) : ?><li><a href="http://vkontakte.ru/share.php?url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on VK', 'zaser-progression' ); ?>" class="vk-share" target="_blank"><i class="fa fa-vk"></i></a></li><?php endif; ?>
	
						<?php if (get_theme_mod( 'progression_single_shop_sharing_google', '1')) : ?><li><a href="https://plus.google.com/share?url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on Google+', 'zaser-progression' ); ?>" class="google-share" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>


						<?php if (get_theme_mod( 'progression_single_shop_sharing_reddit')) : ?><li><a href="http://reddit.com/submit?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Reddit', 'zaser-progression' ); ?>" class="reddit-share" target="_blank"><i class="fa fa-reddit-alien"></i></a></li><?php endif; ?>

						<?php if (get_theme_mod( 'progression_single_shop_sharing_linkedin')) : ?><li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on LinkedIn', 'zaser-progression' ); ?>" class="linkedin-share" target="_blank"><i class="fa fa-linkedin-square"></i></a></li><?php endif; ?>

						<?php if (get_theme_mod( 'progression_single_shop_sharing_tumblr')) : ?><li><a href="http://www.tumblr.com/share/link?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Tumblr', 'zaser-progression' ); ?>" class="tumblr-share" target="_blank"><i class="fa fa-tumblr"></i></a></li><?php endif; ?>


						<?php if (get_theme_mod( 'progression_single_shop_sharing_stumble')) : ?><li><a href="http://www.stumbleupon.com/submit?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on StumbleUpon', 'zaser-progression' ); ?>" class="stumble-share" target="_blank"><i class="fa fa-stumbleupon"></i></a></li><?php endif; ?>
	
						<?php if (get_theme_mod( 'progression_single_shop_sharing_mail', '1')) : ?><li><a href="mailto:?subject=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;body=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on E-mail', 'zaser-progression' ); ?>" class="mail-share" ><i class="fa fa-envelope"></i></a></li><?php endif; ?>
						
					</ul>
					<div class="clearfix-pro"></div>

<?php endif; ?>