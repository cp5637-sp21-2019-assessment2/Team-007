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