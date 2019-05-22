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
				<?php the_archive_title( '<h1 class="page-title">', '</h1>'  ); ?>
				<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios">'; bcn_display_list(); echo '</ul>'; }?>
			</div><!-- #progression-studios-page-title-container -->
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #page-title-pro -->
	
	<div id="content-pro" class="site-content">
		<div class="width-container-pro<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?><?php endif; ?>">
				
				
				
				<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?><?php endif; ?>
			
					
					<div class="clearfix-pro"></div>
					<div class="progression-author-container">
	
						<div class="progression-author-image">
							<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), $size = '150'); ?></a></span>
							<h5 class="author-heading"><?php the_author_posts_link(); ?></h5>
							<?php if(get_the_author_meta('progression_user_sub_headline')) : ?><h6 class="sub-author-heading"><?php echo get_the_author_meta('progression_user_sub_headline'); ?></h6><?php endif; ?>
						</div>
	
						<div class="progression-studios-auth-description-main">
		
							<?php echo the_author_meta('description'); ?>	
		
							<div class="progression-studios-author-icons">
								<?php if(get_the_author_meta('progression_authorurl')) : ?><a href="<?php echo get_the_author_meta('progression_authorurl'); ?>" target="_blank" class="author-pro"><i class="fa fa-wpforms"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_facebookurl')) : ?><a href="<?php echo get_the_author_meta('progression_facebookurl'); ?>" target="_blank" class="facebook-pro"><i class="fa fa-facebook-official"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_twitterurl')) : ?><a href="<?php echo get_the_author_meta('progression_twitterurl'); ?>" target="_blank" class="twitter-pro"><i class="fa fa-twitter"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_dribbbleurl')) : ?><a href="<?php echo get_the_author_meta('progression_dribbbleurl'); ?>" target="_blank" class="dribbble-pro"><i class="fa fa-dribbble"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_linkedinurl')) : ?><a href="<?php echo get_the_author_meta('progression_linkedinurl'); ?>" target="_blank" class="linkedin-pro"><i class="fa fa-linkedin"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_pinteresturl')) : ?><a href="<?php echo get_the_author_meta('progression_pinteresturl'); ?>" target="_blank" class="pinterest-pro"><i class="fa fa-pinterest"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_googleplusurl')) : ?><a href="<?php echo get_the_author_meta('progression_googleplusurl'); ?>" target="_blank" class="google-pro"><i class="fa fa-google-plus"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_instagramurl')) : ?><a href="<?php echo get_the_author_meta('progression_instagramurl'); ?>" target="_blank" class="instagram-pro"><i class="fa fa-instagram"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_tumblrurl')) : ?><a href="<?php echo get_the_author_meta('progression_tumblrurl'); ?>" target="_blank" class="tumblr-pro"><i class="fa fa-tumblr"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_youtubeurl')) : ?><a href="<?php echo get_the_author_meta('progression_youtubeurl'); ?>" target="_blank" class="youtube-pro"><i class="fa fa-youtube"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_dropboxurl')) : ?><a href="<?php echo get_the_author_meta('progression_dropboxurl'); ?>" target="_blank" class="dropbox-pro"><i class="fa fa-dropbox"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_flickrurl')) : ?><a href="<?php echo get_the_author_meta('progression_flickrurl'); ?>" target="_blank" class="flickr-pro"><i class="fa fa-flickr"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_vimeourl')) : ?><a href="<?php echo get_the_author_meta('progression_vimeourl'); ?>" target="_blank" class="vimeo-pro"><i class="fa fa-vimeo"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_soundcloudurl')) : ?><a href="<?php echo get_the_author_meta('progression_soundcloudurl'); ?>" target="_blank" class="soundcloud-pro"><i class="fa fa-soundcloud"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_houzzurl')) : ?><a href="<?php echo get_the_author_meta('progression_houzzurl'); ?>" target="_blank" class="houzz-pro"><i class="fa fa-houzz"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_wordpressurl')) : ?><a href="<?php echo get_the_author_meta('progression_wordpressurl'); ?>" target="_blank" class="wordpress-pro"><i class="fa fa-wordpress"></i></a><?php endif; ?>
								<?php if(get_the_author_meta('progression_emailmailto')) : ?><a href="mailto:<?php echo get_the_author_meta('progression_emailmailto'); ?>" class="mail-pro"><i class="fa fa-envelope"></i></a><?php endif; ?>
							</div>
							<div class="clearfix-pro"></div>
			
						</div><!-- close .progression-studios-auth-description-main -->
	
						<div class="clearfix-pro"></div>
					</div>
					
					
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