<?php
/**
 * @package pro
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="progression-single-container <?php echo esc_attr( get_theme_mod('progression_studios_blog_transition', 'progression-studios-blog-image-scale') ); ?>">

		

		<?php if( !get_post_meta($post->ID, 'progression_studios_disable_featured_image', true) ): ?>
			<?php if(has_post_format( 'video' ) && get_post_meta($post->ID, 'progression_studios_video_post', true) || has_post_format( 'audio' ) && get_post_meta($post->ID, 'progression_studios_video_post', true)  ): ?>
		
				<div class="progression-studios-feaured-image video-progression-studios-format">
					<?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_studios_video_post', true)); ?>
				</div>
		
				<?php else: ?>
			
					<?php if( has_post_format( 'gallery' ) && get_post_meta($post->ID, 'progression_studios_gallery', true)  ): ?>
						<div class="progression-studios-feaured-image">
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
										<?php echo wp_get_attachment_image( $attachment_id, 'progression-studios-image-single' ); ?>
									</a></li>
									<?php endforeach;  ?>
								</ul>
							</div><!-- close .flexslider -->
		
						</div><!-- close .progression-studios-feaured-image -->
						<?php else: ?>
					
							<?php if(has_post_thumbnail()): ?>
								<div class="progression-studios-feaured-image">
									<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>	
									<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_lightbox_video'): ?>
									<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_external_link', true) );?>" data-rel="prettyPhoto" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
									<?php else: ?>
									<a href="<?php echo esc_attr($image[0]);?>" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?> data-rel="prettyPhoto">
									<?php endif; ?>				
										<?php the_post_thumbnail('progression-studios-image-single'); ?>
									</a>
								</div><!-- close .progression-studios-feaured-image -->
							<?php endif; ?><!-- close featured thumbnail -->
				
					<?php endif; ?><!-- close gallery -->
			
			<?php endif; ?><!-- close video -->
		<?php endif; ?>
		
		<div class="progression-blog-content">
			
			<div class="progresion-meta-date"><?php the_time(get_option('date_format')); ?></div>
			
			<h1 class="progression-blog-title"><?php the_title(); ?></h1>
			
			<div class="progression-single-meta">
				<?php echo esc_html__( 'By ', 'zaser-progression' )?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
				<span class="blog-meta-category-list"><?php echo esc_html__( 'In ', 'zaser-progression' )?> <?php the_category(', '); ?></span>
				<span class="blog-meta-comments"><?php echo esc_html__( 'with ', 'zaser-progression' )?> <?php comments_popup_link( '' . wp_kses( __( 'No comments', 'zaser-progression' ), true ) . '', wp_kses( __( '1 comment', 'zaser-progression' ), true), wp_kses( __( '% comments', 'zaser-progression' ), true ) ); ?></span>
			</div>

			<div class="progression-studios-blog-excerpt">
				<?php the_content( ); ?>
			
				<?php wp_link_pages( array(
					'before' => '<div class="progression-page-nav">' . esc_html__( 'Pages:', 'zaser-progression' ),
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					) );
				?>
			</div>
			
			<?php the_tags(  '<div class="progression-studios-tags"><span>' .  esc_html__( 'Tags', 'zaser-progression' ) . ':</span>', ', ', '</div><div class="clearfix-pro"></div>' ); ?> 
			
			<?php get_template_part( 'template-parts/social', 'sharing-single' ); ?>
			
			<?php if(get_the_author_meta('description')) : ?>
				<?php get_template_part( 'template-parts/author', 'info' ); ?>
			<?php endif; ?>
			
				
			<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
			
		</div><!-- close .progression-blog-content -->

	<div class="clearfix-pro"></div>
	
	
	</div><!-- close .progression-single-container -->
</div><!-- #post-## -->