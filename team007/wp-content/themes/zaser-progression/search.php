<?php
/**
 * The template for displaying search results pages.
 *
 * @package pro
 */

get_header(); ?>
	
	
	<div id="page-title-pro">
		<div class="width-container-pro">
			<div id="progression-studios-page-title-container">
				<h1 class="page-title"><?php printf( esc_html__( 'Search results for: %s', 'zaser-progression' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios">'; bcn_display_list(); echo '</ul>'; }?>
			</div><!-- #progression-studios-page-title-container -->
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #page-title-pro -->
	

	<div id="content-pro" class="site-content">
		<div class="width-container-pro<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?><?php endif; ?>">
				
				<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?><?php endif; ?>
				
				
				
					<?php if ( have_posts() ) : ?>
					
						<div class="progression-studios-blog-index">
							<div class="progression-masonry-margins" style="margin-top:-<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '3')); ?>px; margin-left:-<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '3')); ?>px; margin-right:-<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '3')); ?>px;">
								<div class="progression-masonry">
									<?php while ( have_posts() ) : the_post(); ?>
										<div class="progression-masonry-item progression-masonry-col-<?php echo esc_attr(get_theme_mod( 'progression_studios_blog_columns', '1')); ?>">
											<div class="progression-masonry-padding-blog" style="padding:<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '3')); ?>px;"><div class="progression-studios-isotope-animation"><?php get_template_part( 'template-parts/content', get_post_format() ); ?></div></div>
										</div>
									<?php endwhile; ?>
									<div class="clearfix-pro"></div>
								</div><!-- close .progression-masonry -->
							</div><!-- close .progression-masonry-margins -->
						</div><!-- close .progression-studios-blog-index -->

						<?php if (get_theme_mod( 'progression_blog_pagination', 'progression_default_pagination' ) == 'progression_default_pagination') : ?>
							<?php progression_studios_show_pagination_links_pro(); ?>
						<?php endif; ?>
					
						<?php if (get_theme_mod( 'progression_blog_pagination') == 'progression_load_pagination') : ?>
							<div id="progression-load-more-manual"><?php progression_studios_infinite_content_nav_pro( 'nav-below' ); ?></div>
						<?php endif; ?>
					
						<?php if (get_theme_mod( 'progression_blog_pagination') == 'progression_infinite_pagination') : ?>
							<?php progression_studios_infinite_content_nav_pro( 'nav-below' ); ?>
						<?php endif; ?>
					
						<div class="clearfix-pro"></div>
					
					<?php else : ?>
					
						<div class="progression-studios-blog-index">
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						</div><!-- close .progression-masonry-margins -->
					
					<?php endif; ?>
				

				<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?><?php endif; ?>
				
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
<?php get_footer(); ?>