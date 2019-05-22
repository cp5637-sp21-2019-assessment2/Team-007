<?php if(get_post_meta($post->ID, 'progression_studios_display_secondary_layout', true)): ?>
	
	<div id="progression-blog-secondary-post-layout">
		
		<div id="post-secondary-page-title-pro">
			<div class="width-container-pro">
				<div id="progression-studios-page-title-container">
					<div class="secondary-progresion-meta-date"><?php the_time(get_option('date_format')); ?></div>
					<h1 class="secondary-progression-blog-title"><?php the_title(); ?></h1>
					<div class="seconary-progression-single-meta">
						<?php echo esc_html__( 'By ', 'zaser-progression' )?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
						<span class="blog-meta-category-list"><?php echo esc_html__( 'In ', 'zaser-progression' )?> <?php the_category(', '); ?></span>
						<span class="blog-meta-comments"><?php echo esc_html__( 'with ', 'zaser-progression' )?> <?php comments_popup_link( '' . wp_kses( __( 'No comments', 'zaser-progression' ), true ) . '', wp_kses( __( '1 comment', 'zaser-progression' ), true), wp_kses( __( '% comments', 'zaser-progression' ), true ) ); ?></span>
					</div>
					<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios">'; bcn_display_list(); echo '</ul>'; }?>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
			<?php if(has_post_thumbnail()): ?><div id="secondary-image-post-overlay-image" <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-image-single'); ?>style="background-image:url('<?php echo esc_attr($image[0]);?>')"></div><?php endif; ?>
		</div><!-- #page-title-pro -->
		
<?php endif; ?>


