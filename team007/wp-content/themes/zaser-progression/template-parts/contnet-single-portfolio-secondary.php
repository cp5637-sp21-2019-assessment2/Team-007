<?php if(get_post_meta($post->ID, 'progression_studios_secondary_post_layout', true) == 'portfolio-secondary-layout-single-pro'): ?>
	
	<div id="progression-portfolio-secondary-post-layout">
		
		<div id="post-secondary-page-title-pro">
			<div class="width-container-pro">
				<div id="progression-studios-page-title-container">
					<h1 class="secondary-progression-blog-title"><?php the_title(); ?></h1>
					<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios">'; bcn_display_list(); echo '</ul>'; }?>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
			<?php if(has_post_thumbnail()): ?><div id="secondary-image-post-overlay-image" <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-image'); ?>style="background-image:url('<?php echo esc_attr($image[0]);?>')"></div><?php endif; ?>
		</div><!-- #page-title-pro -->
		
<?php endif; ?>


