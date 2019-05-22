<?php
/**
 * The template for displaying all single posts.
 *
 * @package pro
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	

	
	<?php if ( get_theme_mod( 'progression_studios_header_transparent_global') =='transparent' && get_post_meta($post->ID, 'progression_studios_secondary_post_layout', true) != 'portfolio-secondary-layout-single-pro') : ?>
	<div id="page-title-pro">
		<div class="width-container-pro">
			<div id="progression-studios-page-title-container">
				<h1 class="page-title"><?php esc_html_e( 'Portfolio', 'zaser-progression' ); ?></h1>
				<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios">'; bcn_display_list(); echo '</ul>'; }?>
			</div><!-- #progression-studios-page-title-container -->
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #page-title-pro -->
	<?php endif; ?>
	
	
	<?php get_template_part( 'template-parts/content-single-portfolio', 'secondary' ); ?>
	
	<div id="content-pro" class="site-content disable-sidebar-post-progression <?php if( get_post_meta($post->ID, 'progression_studios_disable_post_title', true) ): ?> hide-featured-portfolio-title<?php endif; ?><?php if( get_post_meta($post->ID, 'progression_studios_disable_post_meta', true) ): ?> hide-featured-portfolio-meta<?php endif; ?><?php if( get_post_meta($post->ID, 'progression_studios_disable_post_image', true) ): ?> hide-featured-portfolio-image<?php endif; ?>">

		<div class="width-container-pro <?php if ( get_theme_mod( 'progression_studios_blog_post_sidebar') == 'left') : ?> left-sidebar-pro<?php endif; ?>">
				
				<?php if ( get_theme_mod( 'progression_studios_blog_post_sidebar', 'right') == 'right' || get_theme_mod( 'progression_studios_blog_post_sidebar', 'right') == 'left') : ?><div id="main-container-pro"><?php endif; ?>
					
					<?php get_template_part( 'template-parts/content', 'single-portfolio' ); ?>
					
				<?php if ( get_theme_mod( 'progression_studios_blog_post_sidebar', 'right') =='right' || get_theme_mod( 'progression_studios_blog_post_sidebar', 'right') =='left') : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?>

				
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
		

	</div><!-- #content-pro -->
	
	<?php if ( !post_password_required() ) : ?>
	<?php if ( get_theme_mod( 'progression_studios_portfolio_post_navigation', 'on') =='on') : ?>
	<div id="portfolio-single-navigation">
		<?php previous_post_link( '%link', '<div class="progression-studios-previous"><i class="fa fa-angle-left" aria-hidden="true"></i><span class="meta-nav">' . esc_html__('Previous', 'zaser-progression') . '</span></div>' ); ?>
		<?php next_post_link( '%link', '<div class="progression-studios-next"><span class="meta-nav">' . esc_html__('Next', 'zaser-progression') . '</span><i class="fa fa-angle-right" aria-hidden="true"></i></div>' ); ?>
		<div class="clearfix-pro"></div>
	</div>
	<?php endif; ?>
	
		
	<?php if(get_post_meta($post->ID, 'progression_studios_secondary_post_layout', true) == 'portfolio-secondary-layout-single-pro'): ?></div><?php endif; ?>
		
	<?php endif; ?>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>