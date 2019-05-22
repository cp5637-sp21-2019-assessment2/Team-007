<?php
/**
 * @package pro
 */
?>



<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="progression-single-portfolio-container <?php echo esc_attr(get_post_meta($post->ID, 'progression_studios_secondary_post_layout', true)); ?>">
		
		<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios" class="progression-breadcrumb-white-background">'; bcn_display_list(); echo '</ul>'; }?>
		
		<?php if ( !post_password_required() ) : ?>
		<div class="progression-studios-image-portfolio-single-content <?php echo esc_attr( get_theme_mod('progression_studios_portfolio_single_transition', 'progression-studios-portfolio-image-scale') ); ?>">
			
			<?php if( !get_post_meta($post->ID, 'progression_studios_disable_featured_image', true) ): ?>
				<?php if(has_post_format( 'video' ) && get_post_meta($post->ID, 'progression_studios_video_post', true) || has_post_format( 'audio' ) && get_post_meta($post->ID, 'progression_studios_video_post', true)  ): ?>
		
					<div class="progression-studios-feaured-image-single-portfolio video-progression-studios-format">
						<?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_studios_video_post', true)); ?>
					</div>
		
					<?php else: ?>
			
						<?php if( has_post_format( 'gallery' ) && get_post_meta($post->ID, 'progression_studios_gallery', true)  ): ?>
							<div class="progression-studios-feaured-image-single-portfolio">
								<div class="flexslider progression-studios-gallery">
							      <ul class="slides">
										<?php $files = get_post_meta( get_the_ID(),'progression_studios_gallery', 1 ); ?>
										<?php foreach ( (array) $files as $attachment_id => $attachment_url ) : ?>
										<?php $lightbox_pro = wp_get_attachment_image_src($attachment_id, 'large'); ?>
										<li>
											<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_lightbox_video'): ?>
											<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_external_link', true) );?>" data-rel="prettyPhoto" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
											<div class="icon-overlay-blog"><i class="fa fa-file-image-o" aria-hidden="true"></i></div>
										
											<?php else: ?>
											<a href="<?php echo esc_attr($lightbox_pro[0]);?>" data-rel="prettyPhoto[gallery]" <?php $get_description = get_post($attachment_id)->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
																						
											<?php endif; ?>
											<?php echo wp_get_attachment_image( $attachment_id, 'progression-studios-image-portfolio-single' ); ?>
										</a></li>
										<?php endforeach;  ?>
									</ul>
								</div><!-- close .flexslider -->
		
							</div><!-- close .progression-studios-feaured-image-single-portfolio -->
							<?php else: ?>
					
								<?php if(has_post_thumbnail()): ?>
									<div class="progression-studios-feaured-image-single-portfolio">
										<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>	
										<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_lightbox_video'): ?>
										<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_external_link', true) );?>" data-rel="prettyPhoto" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
										<?php else: ?>
										<a href="<?php echo esc_attr($image[0]);?>" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?> data-rel="prettyPhoto">
										<?php endif; ?>				
											<?php the_post_thumbnail('progression-studios-image-portfolio-single'); ?>
										</a>
									</div><!-- close .progression-studios-feaured-image-single-portfolio -->
								<?php endif; ?><!-- close featured thumbnail -->
				
						<?php endif; ?><!-- close gallery -->
			
				<?php endif; ?><!-- close video -->
			<?php endif; ?>
			<?php endif; ?>
			
			
			<div class="progression-studios-single-portfolio-text">
				<h1 class="progression-studios-image-portfolio-single-title"><?php the_title(); ?></h1>

				<div id="progression-studios-single-excerpt">
					<?php the_content( ); ?>
				</div>
			
				<?php if ( !post_password_required() ) : ?>
				<div id="progression-single-meta-data">
					<?php 
						$terms = get_the_terms( $post->ID , 'portfolio-category' ); 
						if ( !empty( $terms ) ) :
							echo '<div id="portfolio-category-meta-single"><span>';
							echo esc_html__( 'Category', 'zaser-progression' );
							echo '</span><ul class="portfolio-single-tax-progression">';
						foreach ( $terms as $term ) {
							$term_link = get_term_link( $term, 'portfolio-category' );
							if( is_wp_error( $term_link ) )
								continue;
							echo '<li><a href="' . $term_link . '">' . $term->name . '</a></li>';
						} 
						echo '</ul>';
						echo '</div>';
						endif;
					?>
					<?php if(  get_post_meta($post->ID, 'progression_studios_date_post', true)  ): ?>
						<div id="portfolio-single-date">
							<span><?php echo esc_html__( 'Date ', 'zaser-progression' )?></span><?php echo esc_attr(get_post_meta($post->ID, 'progression_studios_date_post', true)); ?>
						</div>
					<?php endif; ?>
			
					<?php get_template_part( 'template-parts/social', 'sharing-portfolio' ); ?>
			</div><!-- close .progression-studios-single-portfolio-text -->
			
			<div class="clearfix-pro"></div>
			
			</div>
			
			<?php endif; ?>
			
		</div><!-- close .progression-studios-image-portfolio-single-content -->

	<div class="clearfix-pro"></div>
		
	</div><!-- close .progression-single-portfolio-container -->
</div><!-- #post-## -->