<?php
/**
 * The template for displaying all single posts.
 *
 * @package pro
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	
	
	<?php get_template_part( 'template-parts/content-single', 'secondary' ); ?>
	
	
	<?php if ( get_theme_mod( 'progression_studios_blog_post_hide_title', 'on') =='on' ) : ?>
	<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
		
		<?php if(!get_post_meta($cover_page->ID, 'progression_studios_disable_page_title', true)): ?>
		<div id="page-title-pro">
			<div class="width-container-pro">
				<div id="progression-studios-page-title-container">
					<h1 class="page-title"><?php echo get_the_title($cover_page); ?></h1>
					<?php if(get_post_meta($cover_page->ID, 'progression_studios_sub_title', true)): ?><h4 class="progression-sub-title"><?php echo wp_kses( get_post_meta($cover_page->ID, 'progression_studios_sub_title', true) , true); ?></h4><?php endif; ?>
					<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios">'; bcn_display_list(); echo '</ul>'; }?>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
		</div><!-- #page-title-pro -->
		<?php endif; ?>
		
	<?php else: ?>
		<div id="page-title-pro">
			<div id="progression-studios-page-title-spacer"></div>
			<div class="width-container-pro">
				<div id="progression-studios-page-title-container">
					<h1 class="page-title"><?php esc_html_e( 'Latest News', 'zaser-progression' ); ?></h1>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
		</div><!-- #page-title-pro -->
	<?php endif; ?>
	<?php endif; ?>
	
	<div id="content-pro" class="site-content <?php if(get_post_meta($post->ID, 'progression_studios_disable_sidebar_post', true)): ?>disable-sidebar-post-progression<?php endif; ?>">

		<div class="width-container-pro <?php if ( get_theme_mod( 'progression_studios_blog_post_sidebar') == 'left') : ?> left-sidebar-pro<?php endif; ?>">
				
				<?php if ( get_theme_mod( 'progression_studios_blog_post_sidebar', 'right') == 'right' || get_theme_mod( 'progression_studios_blog_post_sidebar', 'right') == 'left') : ?><div id="main-container-pro"><?php endif; ?>
					
					<?php get_template_part( 'template-parts/content', 'single' ); ?>
					
				<?php if ( get_theme_mod( 'progression_studios_blog_post_sidebar', 'right') =='right' || get_theme_mod( 'progression_studios_blog_post_sidebar', 'right') =='left') : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?>

				
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
		
		
	</div><!-- #content-pro -->
	<?php if(get_post_meta($post->ID, 'progression_studios_display_secondary_layout', true)): ?></div><?php endif; ?>
		
		<?php if ( get_theme_mod( 'progression_studios_blog_post_navigation', 'on') =='on') : ?>
		<div id="blog-single-navigation">
			
			<?php previous_post_link( '%link', '<div class="progression-studios-previous"><i class="fa fa-angle-left" aria-hidden="true"></i><span class="meta-nav">' . esc_html__('Previous', 'zaser-progression') . '</span></div>' ); ?>
			<?php next_post_link( '%link', '<div class="progression-studios-next"><span class="meta-nav">' . esc_html__('Next', 'zaser-progression') . '</span><i class="fa fa-angle-right" aria-hidden="true"></i></div>' ); ?>
			
			<div class="clearfix-pro"></div>
		</div>
		<?php endif; ?>
		
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>