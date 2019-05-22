<?php
/**
 * @package pro
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="progression-studios-default-blog-index <?php if ($blog_image_animation_disable != 'true')  : ?><?php echo esc_attr( get_theme_mod('progression_studios_blog_transition', 'progression-studios-blog-image-scale') ); ?><?php endif; ?> <?php if ( $progression_studios_blog_layout == 'secondary' ) : ?>progression-studios-blog-overlay-styles<?php endif; ?>">


		<?php if(has_post_thumbnail()): ?>
			<div class="progression-studios-feaured-image">
				<?php progression_studios_blog_link(); ?>
					<?php if ($progression_studios_blog_cropping == 'default' ) : ?><?php the_post_thumbnail('progression-studios-image'); ?><?php endif; ?>
					<?php if ($progression_studios_blog_cropping == 'tall') : ?><?php the_post_thumbnail('progression-studios-image-tall'); ?><?php endif; ?>
					<?php if ($progression_studios_blog_cropping == 'uncropped') : ?><?php the_post_thumbnail('progression-studios-image-uncropped'); ?><?php endif; ?>
				</a>
			</div><!-- close .progression-studios-feaured-image -->
		<?php else: ?>
		
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
									<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_lightbox'): ?>
									<a href="<?php echo esc_attr($lightbox_pro[0]);?>" data-rel="prettyPhoto[gallery-<?php the_ID(); ?>]" <?php $get_description = get_post($attachment_id)->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
									<?php else: ?>
									<a <?php echo progression_studios_blog_index_gallery(); ?> <?php $get_description = get_post($attachment_id)->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
									<?php endif; ?> 
									
									
									<?php if ( $progression_studios_blog_cropping == 'default' ) : ?>
										<?php echo wp_get_attachment_image( $attachment_id, 'progression-studios-image' ); ?>		
									<?php endif; ?>
									<?php if ( $progression_studios_blog_cropping == 'tall') : ?>
										<?php echo wp_get_attachment_image( $attachment_id, 'progression-studios-image-tall' ); ?>	
									<?php endif; ?>
									<?php if ( $progression_studios_blog_cropping == 'uncropped' ) : ?>
										<?php echo wp_get_attachment_image( $attachment_id, 'progression-studios-image-tall' ); ?>		
									<?php endif; ?>
									
								
									</a></li>
								<?php endforeach;  ?>
							</ul>
						</div><!-- close .flexslider -->
			
					</div><!-- close .progression-studios-feaured-image -->
	
					<?php endif; ?><!-- close featured thumbnail -->
					
				<?php endif; ?><!-- close gallery -->
				
		<?php endif; ?><!-- close video -->
		
		
		<div class="progression-blog-content" <?php if ($blog_content_bg_color ) : ?>style="background:<?php echo esc_attr($blog_content_bg_color) ?>;"<?php endif; ?>>
			
			
			<?php if ( $blog_date == 'true' ) : ?>
			<div class="progresion-meta-date" <?php if ($blog_date_size ) : ?>style="font-size:<?php echo esc_attr($blog_date_size) ?>;"<?php endif; ?>><?php the_time(get_option('date_format')); ?></div>
			<?php endif; ?>
			
			<h2 class="progression-blog-title" <?php if ($blog_heading_size ) : ?>style="font-size:<?php echo esc_attr($blog_heading_size) ?>;"<?php endif; ?>><?php progression_studios_blog_post_title(); ?><?php the_title(); ?></a></h2>
			
			<?php if ( $blog_excerpt == 'true' ) : ?>
			<div class="progression-studios-blog-excerpt">
				<?php if(has_excerpt() ): ?><?php the_excerpt(); ?><?php else: ?>
					<?php if ( 'post' == get_post_type() ) : ?>
				<?php the_content( sprintf( wp_kses( __( 'Continue reading <i class="fa fa-chevron-right" aria-hidden="true"></i>', 'zaser-progression' ), array(  'i' => array( 'id' => array(),  'class' => array(),  'style' => array(),  ), 'span' => array( 'class' => array() ) ) ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) ); ?>
				<?php endif; ?>
				<?php endif; ?>
			
			
			<?php wp_link_pages( array(
				'before' => '<div class="progression-page-nav">' . esc_html__( 'Pages:', 'zaser-progression' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				) );
			?>
			</div>
			<?php endif; ?>
			
			<?php if ( $blog_post_meta == 'true' ) : ?>
				<div class="progression-author-meta" <?php if ($blog_date_size ) : ?>style="font-size:<?php echo esc_attr($blog_date_size) ?>;"<?php endif; ?>>
					<?php if ( $blog_author == 'true' ) : ?><?php echo esc_html__( 'By ', 'zaser-progression' )?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a><?php endif; ?>
					<?php if ( $blog_category == 'true' ) : ?><span class="blog-meta-category-list"><?php echo esc_html__( 'In ', 'zaser-progression' )?> <?php the_category(', '); ?></span><?php endif; ?>
					<?php if ( $blog_comments == 'true' ) : ?><span class="blog-meta-comments"><?php echo esc_html__( 'with ', 'zaser-progression' )?> <?php comments_popup_link( '' . wp_kses( __( 'No comments', 'zaser-progression' ), true ) . '', wp_kses( __( '1 comment', 'zaser-progression' ), true), wp_kses( __( '% comments', 'zaser-progression' ), true ) ); ?></span><?php endif; ?>
				</div>
			<?php endif; ?>
		</div><!-- close .progression-blog-content -->
	
		<?php if ( is_sticky() && is_home() && ! is_paged() ) { printf( '<div class="progression-studios-sticky-post">%s</div>', esc_html__( 'FEATURED', 'zaser-progression' ) ); } ?>
	
	<div class="clearfix-pro"></div>
	</div><!-- close .progression-studios-default-blog-index -->
</div><!-- #post-## -->