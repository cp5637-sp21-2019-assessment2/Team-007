
<?php if(get_post_meta($post->ID, 'progression_studios_secondary_post_layout', true) == 'portfolio-secondary-layout-single-pro'): ?>
	<?php if ( !post_password_required() ) : ?>
	<div id="progression-portfolio-secondary-post-layout" class="<?php if( get_post_meta($post->ID, 'progression_studios_disable_post_title', true) ): ?> hide-featured-portfolio-title<?php endif; ?><?php if( get_post_meta($post->ID, 'progression_studios_disable_post_meta', true) ): ?> hide-featured-portfolio-meta<?php endif; ?><?php if( get_post_meta($post->ID, 'progression_studios_disable_post_image', true) ): ?> hide-featured-portfolio-image<?php endif; ?>">
		
		<div id="post-secondary-page-title-pro">
			<div class="width-container-pro">
				<div id="progression-studios-page-title-container">
					<?php if(  get_post_meta($post->ID, 'progression_studios_date_post', true)  ): ?><div class="portfolio-single-secondary-date"><?php echo esc_attr(get_post_meta($post->ID, 'progression_studios_date_post', true)); ?></div><?php endif; ?>
					<h1 class="portfolio-secondary-single-title"><?php the_title(); ?></h1>
					<?php 
						$terms = get_the_terms( $post->ID , 'portfolio-category' ); 
						if ( !empty( $terms ) ) :
							echo '<ul class="portfolio-secondary-single-meta">';
						foreach ( $terms as $term ) {
							$term_link = get_term_link( $term, 'portfolio-category' );
							if( is_wp_error( $term_link ) )
								continue;
							echo '<li><a href="' . $term_link . '">' . $term->name . '</a></li>';
						} 
						echo '</ul>';
					endif;
					?>
					<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios">'; bcn_display_list(); echo '</ul>'; }?>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
			<?php if(has_post_thumbnail()): ?><div id="secondary-image-post-overlay-image" <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-image-single'); ?>style="background-image:url('<?php echo esc_attr($image[0]);?>')"></div><?php endif; ?>
		</div><!-- #page-title-pro -->
		<?php endif; ?>
<?php endif; ?>


