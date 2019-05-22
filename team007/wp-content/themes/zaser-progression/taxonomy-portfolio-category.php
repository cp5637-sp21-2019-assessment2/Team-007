<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pro
 */

get_header(); ?>

	<div id="page-title-pro">
		<div class="width-container-pro">
			<div id="progression-studios-page-title-container">
				<h1 class="page-title"><?php if (is_tax('portfolio-category')) {
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					$tax_term_breadcrumb_taxonomy_slug = $term->taxonomy;
					echo '' . $term->name . '';
				}
				?></h1>
				<?php the_archive_description( '<h4 class="progression-sub-title">', '</h4>' ); ?>
				<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios">'; bcn_display_list(); echo '</ul>'; }?>
			</div><!-- #progression-studios-page-title-container -->
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #page-title-pro -->

	
	<div id="content-pro" class="site-content">
		<div class="width-container-pro">
				
					<?php if ( have_posts() ) : ?>
					
						<div class="progression-studios-portfolio-index">
							<div class="progression-masonry-margins" style="margin-top:-<?php echo esc_attr(get_theme_mod('progression_studios_portfolio_index_gap', '0')); ?>px; margin-left:-<?php echo esc_attr(get_theme_mod('progression_studios_portfolio_index_gap', '0')); ?>px; margin-right:-<?php echo esc_attr(get_theme_mod('progression_studios_portfolio_index_gap', '0')); ?>px;">
								<div class="progression-portfolio-masonry">
									<?php while ( have_posts() ) : the_post(); ?>
										<div class="progression-masonry-item progression-masonry-col-<?php echo esc_attr(get_theme_mod( 'progression_studios_portfolio_columns', '3')); ?>">
											<div class="progression-masonry-padding-portfolio"  style="padding:<?php echo esc_attr(get_theme_mod('progression_studios_portfolio_index_gap', '0')); ?>px;">
												<div class="progression-studios-isotope-animation">
												<?php if (get_theme_mod( 'progression_studios_portfolio_layout', 'progression-studios-portfolio-overlay-styles' ) == 'progression-studios-portfolio-overlay-styles') : ?>
													<?php get_template_part( 'template-parts/content', 'portfolio' ); ?>
												<?php else : ?>
													<?php get_template_part( 'template-parts/content-portfolio', 'secondary' ); ?>
												<?php endif; ?>
											</div>
											</div>
										</div>
									<?php endwhile; ?>
									<div class="clearfix-pro"></div>
								</div><!-- close .progression-portfolio-masonry -->
							</div><!-- close .progression-masonry-margins -->
						</div><!-- close .progression-studios-portfolio-index -->

						<?php if (get_theme_mod( 'progression_portfolio_pagination', 'progression_default_pagination' ) == 'progression_default_pagination') : ?>
							<?php progression_studios_show_pagination_links_pro(); ?>
						<?php endif; ?>
					
						<?php if (get_theme_mod( 'progression_portfolio_pagination') == 'progression_load_pagination') : ?>
							<div id="progression-load-more-manual"><?php progression_studios_infinite_content_nav_pro( 'nav-below' ); ?></div>
						<?php endif; ?>
					
						<?php if (get_theme_mod( 'progression_portfolio_pagination') == 'progression_infinite_pagination') : ?>
							<?php progression_studios_infinite_content_nav_pro( 'nav-below' ); ?>
						<?php endif; ?>
						
						<div class="clearfix-pro"></div>
					
					<?php else : ?>
					
						<div class="progression-studios-portfolio-index">
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						</div><!-- close .progression-masonry-margins -->
					
					<?php endif; ?>

		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
<?php get_footer(); ?>