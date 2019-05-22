<?php
/**
 * @package pro
 */
?>
<div class="progression-studios-portfolio-content-layout <?php if (get_theme_mod( 'progression_studios_portfolio_vertical_hover_effect') == 'on') : ?> progression-studios-hover-move<?php endif; ?> <?php echo esc_attr( get_theme_mod('progression_studios_portfolio_index_transition', 'progression-studios-portfolio-image-scale') ); ?>">
		<div class="progression-studios-portfolio-image">
		<?php if(has_post_thumbnail()): ?>
			
			<?php progression_studios_blog_link(); ?>
			<?php if (get_theme_mod( 'progression_studios_portfolio_image_size') == 'progression-studios-blog-size-default') : ?><?php the_post_thumbnail('progression-studios-image'); ?><?php endif; ?>
			<?php if (get_theme_mod( 'progression_studios_portfolio_image_size', 'progression-studios-blog-size-tall') == 'progression-studios-blog-size-tall') : ?><?php the_post_thumbnail('progression-studios-image-tall'); ?><?php endif; ?>
			<?php if (get_theme_mod( 'progression_studios_portfolio_image_size') == 'progression-studios-blog-size-uncropped') : ?><?php the_post_thumbnail('progression-studios-image-uncropped'); ?><?php endif; ?>
			</a>
			
		<?php else: ?>
				
				
				<?php if(has_post_format( 'video' ) && get_post_meta($post->ID, 'progression_studios_video_post', true) || has_post_format( 'audio' ) && get_post_meta($post->ID, 'progression_studios_video_post', true)  ): ?><div class="portfolio-secondary-video-layout"><?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_studios_video_post', true)); ?></div><?php endif; ?><!-- close video -->	
					
				<?php if( has_post_format( 'gallery' ) && get_post_meta($post->ID, 'progression_studios_gallery', true)  ): ?>
						<div class="flexslider progression-studios-gallery">
					      <ul class="slides">
								<?php $files = get_post_meta( get_the_ID(),'progression_studios_gallery', 1 ); ?>
								<?php foreach ( (array) $files as $attachment_id => $attachment_url ) : ?>
								<?php $lightbox_pro = wp_get_attachment_image_src($attachment_id, 'large'); ?>
								<li>
									<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_lightbox'): ?>
									<a href="<?php echo esc_attr($lightbox_pro[0]);?>" data-rel="prettyPhoto[gallery-<?php the_ID(); ?>]" <?php $get_description = get_post($attachment_id)->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
									<?php else: ?>
									<a <?php echo progression_studios_blog_index_gallery(); ?> <?php $get_description = get_post($attachment_id)->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
									<?php endif; ?>
									
									<?php if (get_theme_mod( 'progression_studios_portfolio_image_size') == 'progression-studios-blog-size-default') : ?><?php echo wp_get_attachment_image( $attachment_id, 'progression-studios-image' ); ?><?php endif; ?>
			<?php if (get_theme_mod( 'progression_studios_portfolio_image_size', 'progression-studios-blog-size-tall') == 'progression-studios-blog-size-tall') : ?><?php echo wp_get_attachment_image( $attachment_id, 'progression-studios-image-tall' ); ?><?php endif; ?>
			<?php if (get_theme_mod( 'progression_studios_portfolio_image_size') == 'progression-studios-blog-size-uncropped') : ?><?php echo wp_get_attachment_image( $attachment_id, 'progression-studios-image-uncropped' ); ?><?php endif; ?>
									</a></li>
								<?php endforeach;  ?>
							</ul>
						</div><!-- close .flexslider -->
				<?php endif; ?><!-- close featured thumbnail -->
					
		<?php endif; ?><!-- close featured thumbnail -->
		</div><!-- close .progression-studios-portfolio-image -->
		
		<div class="progression-portfolio-secondary-content <?php if (get_theme_mod( 'progression_studios_index_overlay_margin', 'on') == 'on') : ?>progression-portfolio-overlay-margin-display<?php endif; ?>">
				<?php 
					$terms = get_the_terms( $post->ID , 'portfolio-category' ); 
					if ( !empty( $terms ) ) :
						echo '<ul class="portfolio-secondary-tax-progression">';
					foreach ( $terms as $term ) {
						$term_link = get_term_link( $term, 'portfolio-category' );
						if( is_wp_error( $term_link ) )
							continue;
						echo '<li><a href="' . $term_link . '">' . $term->name . '</a></li>';
					} 
					echo '</ul>';
					endif;
				?>
				<h2 class="progression-portfolio-secondary-title"><?php progression_studios_blog_post_title(); ?><?php the_title(); ?></a></h2>
				<?php if(has_excerpt() ): ?><div class="portfolio-secondary-layout-excerpt"><?php the_excerpt(); ?></div><?php endif; ?>
		</div>

<div class="clearfix-pro"></div>
</div><!-- close .progression-studios-portfolio-content-layout -->