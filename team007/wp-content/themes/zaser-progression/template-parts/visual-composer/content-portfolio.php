<?php
/**
 * @package pro
 */
?>
<div class="progression-studios-default-portfolio-index <?php if ($portfolio_hover_vertical == 'true')  : ?>progression-studios-hover-move<?php endif; ?> <?php if ($portfolio_image_animation_disable != 'true')  : ?><?php echo esc_attr( get_theme_mod('progression_studios_portfolio_index_transition', 'progression-studios-portfolio-image-scale') ); ?><?php endif; ?><?php if(has_post_format( 'video' ) && get_post_meta($post->ID, 'progression_studios_video_post', true) && !has_post_thumbnail() || has_post_format( 'audio' )  && !has_post_thumbnail() && get_post_meta($post->ID, 'progression_studios_video_post', true)  ): ?> portfolio-video-post-example<?php endif; ?>">
	<a <?php progression_studios_portfolio_link(); ?> class="progression-studios-portfolio-image <?php if(has_post_format( 'video' ) && get_post_meta($post->ID, 'progression_studios_video_post', true) || has_post_format( 'audio' ) && get_post_meta($post->ID, 'progression_studios_video_post', true)  ): ?>portfolio-video-progression-studios-format<?php endif; ?>">	
		
		<?php if(has_post_thumbnail()): ?>
			
			<?php if ($progression_studios_portfolio_cropping == 'default' ) : ?><?php the_post_thumbnail('progression-studios-image'); ?><?php endif; ?>
			<?php if ($progression_studios_portfolio_cropping == 'tall') : ?><?php the_post_thumbnail('progression-studios-image-tall'); ?><?php endif; ?>
			<?php if ($progression_studios_portfolio_cropping == 'uncropped') : ?><?php the_post_thumbnail('progression-studios-image-uncropped'); ?><?php endif; ?>
				
		<?php else: ?>
			
				<?php if(has_post_format( 'video' ) && get_post_meta($post->ID, 'progression_studios_video_post', true) || has_post_format( 'audio' ) && get_post_meta($post->ID, 'progression_studios_video_post', true)  ): ?><?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_studios_video_post', true)); ?><?php endif; ?><!-- close video -->	
					
				<?php if( has_post_format( 'gallery' ) && get_post_meta($post->ID, 'progression_studios_gallery', true)  ): ?>
						<div class="flexslider progression-studios-gallery">
					      <ul class="slides">
								<?php $files = get_post_meta( get_the_ID(),'progression_studios_gallery', 1 ); ?>
								<?php foreach ( (array) $files as $attachment_id => $attachment_url ) : ?>
								<li>
									<?php if ( $progression_studios_portfolio_cropping == 'default' ) : ?>
										<?php echo wp_get_attachment_image( $attachment_id, 'progression-studios-image' ); ?>		
									<?php endif; ?>
									<?php if ( $progression_studios_portfolio_cropping == 'tall') : ?>
										<?php echo wp_get_attachment_image( $attachment_id, 'progression-studios-image-tall' ); ?>	
									<?php endif; ?>
									<?php if ( $progression_studios_portfolio_cropping == 'uncropped' ) : ?>
										<?php echo wp_get_attachment_image( $attachment_id, 'progression-studios-image-uncropped' ); ?>		
									<?php endif; ?>
								</li>
								<?php endforeach;  ?>
							</ul>
						</div><!-- close .flexslider -->
				<?php endif; ?><!-- close featured thumbnail -->
					
		<?php endif; ?><!-- close featured thumbnail -->
			

		<div class="progression-portfolio-content <?php if ($portfolio_content_margin != 'true')  : ?>progression-portfolio-overlay-margin-display<?php endif; ?>">
			<div class="progression-portfolio-content-position">
				
				<?php if ($portfolio_category_disable != 'true')  : ?>
				
				<?php if ($portfolio_category_size ) : ?>
				<?php 				
					$terms = get_the_terms( $post->ID , 'portfolio-category' ); 
					if ( !empty( $terms ) ) :
						echo '<ul class="portfolio-tax-progression" style="font-size:'. $portfolio_category_size . ';">';
					foreach ( $terms as $term ) {
						$term_link = get_term_link( $term, 'portfolio-category' );
						if( is_wp_error( $term_link ) )
							continue;
						echo '<li>' . $term->name . '</li>';
					} 
					echo '</ul>';
					endif;
				?>
				<?php else: ?>
				<?php 				
					$terms = get_the_terms( $post->ID , 'portfolio-category' ); 
					if ( !empty( $terms ) ) :
						echo '<ul class="portfolio-tax-progression">';
					foreach ( $terms as $term ) {
						$term_link = get_term_link( $term, 'portfolio-category' );
						if( is_wp_error( $term_link ) )
							continue;
						echo '<li>' . $term->name . '</li>';
					} 
					echo '</ul>';
					endif;
				?>
				<?php endif; ?>
				
				<?php endif; ?>
					
				<h2 class="progression-portfolio-title" <?php if ($portfolio_heading_size ) : ?>style="font-size:<?php echo esc_attr($portfolio_heading_size) ?>;"<?php endif; ?>><?php the_title(); ?></h2>
			</div>
		</div><!-- close .progression-portfolio-content -->
			
	</a><!-- close .progression-studios-portfolio-image -->
	
<div class="clearfix-pro"></div>
</div><!-- close .progression-studios-default-portfolio-index -->