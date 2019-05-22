<?php

/**
 * Team Shortcode
 */



// [pro_progression_team location_columns_pro="" etc...]
add_shortcode( 'pro_progression_team', 'pro_progression_team_func' );
function pro_progression_team_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
	   'team_image' => '',
	   'team_name_title' => 'John Doe',
	   'team_name_sub_title' => 'Web Developer',
	   'image_bg_color' => '#292935',
		'team_name_text' => '',
		
	   'team_title_font' => '',
	   'team_sub_title_font' => '',
		
	   'team_facebook' => 'http://facebook.com',
	   'team_twitter' => 'http://twitter.com',
	   'team_email' => 'noreply@e-mail.com',

	   'team_instagram' => '',
	   'team_spotify' => '',
	   'team_youtube' => '',
	   'team_vimeo' => '',
	   'team_google' => '',
	   'team_pinterest' => '',
	   'team_soundcloud' => '',
	   'team_linkedin' => '',
	   'team_snapchat' => '',
	   'team_tumblr' => '',
	   'team_flickr' => '',
	   'team_dribbble' => '',
	   'team_vk' => '',
	   'team_wordpress' => '',
	   'team_houzz' => '',
	   'team_behance' => '',
	   'team_github' => '',
	   'team_lastfm' => '',
	   'team_medium' => '',
	   'team_tripadvisor' => '',
	   'team_twitch' => '',
	   'team_yelp' => '',
	   'team_link' => '',
		

	
   ), $atts ) );
   
	
	$output_pro = '';
	
	STATIC $idpro = 0;
	$idpro++;
	
	ob_start();
	?>
		
	<div class="progression-studios-team-element <?php if($image_bg_color): ?>hover-team-image<?php endif ?>">
		
		<?php if($team_image): ?>
			<?php $image = wp_get_attachment_image_src($team_image, 'large'); ?>
			<div class="progression-studios-team-image" <?php if($image_bg_color): ?>style="background:<?php echo esc_attr($image_bg_color) ?>;"<?php endif ?>>
				<?php if($team_link): ?><a href="<?php echo esc_attr($team_link) ?>"><?php endif ?><img src="<?php echo esc_attr($image[0]);?>" alt="<?php echo esc_attr($team_name_title) ?>"><?php if($team_link): ?></a><?php endif ?>
				<div class="progression-studios-team-overlay-icons">
					<?php if($team_facebook): ?>
						<a href="<?php echo esc_attr($team_facebook) ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
					<?php endif ?>
					<?php if($team_twitter): ?>
						<a href="<?php echo esc_attr($team_twitter) ?>" target="_blank"><i class="fa fa-twitter"></i></a>
					<?php endif ?>
					<?php if($team_email): ?>
						<a href="mailto:<?php echo esc_attr($team_email) ?>"><i class="fa fa-envelope"></i></a>
					<?php endif ?>
					
					<?php if($team_instagram): ?>
						<a href="<?php echo esc_attr($team_instagram) ?>" target="_blank"><i class="fa fa-instagram"></i></a>
					<?php endif ?>
					<?php if($team_spotify): ?>
						<a href="<?php echo esc_attr($team_spotify) ?>" target="_blank"><i class="fa fa-spotify"></i></a>
					<?php endif ?>
					<?php if($team_youtube): ?>
						<a href="<?php echo esc_attr($team_youtube) ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
					<?php endif ?>
					<?php if($team_vimeo): ?>
						<a href="<?php echo esc_attr($team_vimeo) ?>" target="_blank"><i class="fa fa-vimeo"></i></a>
					<?php endif ?>
					<?php if($team_google): ?>
						<a href="<?php echo esc_attr($team_google) ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
					<?php endif ?>
					<?php if($team_pinterest): ?>
						<a href="<?php echo esc_attr($team_pinterest) ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
					<?php endif ?>
					<?php if($team_soundcloud): ?>
						<a href="<?php echo esc_attr($team_soundcloud) ?>" target="_blank"><i class="fa fa-soundcloud"></i></a>
					<?php endif ?>
					<?php if($team_linkedin): ?>
						<a href="<?php echo esc_attr($team_linkedin) ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
					<?php endif ?>
					<?php if($team_snapchat): ?>
						<a href="<?php echo esc_attr($team_snapchat) ?>" target="_blank"><i class="fa fa-snapchat-ghost"></i></a>
					<?php endif ?>
					<?php if($team_tumblr): ?>
						<a href="<?php echo esc_attr($team_tumblr) ?>" target="_blank"><i class="fa fa-tumblr"></i></a>
					<?php endif ?>
					<?php if($team_flickr): ?>
						<a href="<?php echo esc_attr($team_flickr) ?>" target="_blank"><i class="fa fa-flickr"></i></a>
					<?php endif ?>
					<?php if($team_dribbble): ?>
						<a href="<?php echo esc_attr($team_dribbble) ?>" target="_blank"><i class="fa fa-dribbble"></i></a>
					<?php endif ?>
					<?php if($team_vk): ?>
						<a href="<?php echo esc_attr($team_vk) ?>" target="_blank"><i class="fa fa-vk"></i></a>
					<?php endif ?>
					<?php if($team_wordpress): ?>
						<a href="<?php echo esc_attr($team_wordpress) ?>" target="_blank"><i class="fa fa-wordpress"></i></a>
					<?php endif ?>
					<?php if($team_houzz): ?>
						<a href="<?php echo esc_attr($team_houzz) ?>" target="_blank"><i class="fa fa-houzz"></i></a>
					<?php endif ?>
					<?php if($team_behance): ?>
						<a href="<?php echo esc_attr($team_behance) ?>" target="_blank"><i class="fa fa-behance"></i></a>
					<?php endif ?>
					<?php if($team_github): ?>
						<a href="<?php echo esc_attr($team_github) ?>" target="_blank"><i class="fa fa-github"></i></a>
					<?php endif ?>
					<?php if($team_lastfm): ?>
						<a href="<?php echo esc_attr($team_lastfm) ?>" target="_blank"><i class="fa fa-lastfm"></i></a>
					<?php endif ?>
					<?php if($team_medium): ?>
						<a href="<?php echo esc_attr($team_medium) ?>" target="_blank"><i class="fa fa-medium"></i></a>
					<?php endif ?>
					<?php if($team_tripadvisor): ?>
						<a href="<?php echo esc_attr($team_tripadvisor) ?>" target="_blank"><i class="fa fa-tripadvisor"></i></a>
					<?php endif ?>
					<?php if($team_twitch): ?>
						<a href="<?php echo esc_attr($team_twitch) ?>" target="_blank"><i class="fa fa-twitch"></i></a>
					<?php endif ?>
					<?php if($team_yelp): ?>
						<a href="<?php echo esc_attr($team_yelp) ?>" target="_blank"><i class="fa fa-yelp"></i></a>
					<?php endif ?>

				</div>
			</div>
		<?php endif ?>
		
		
		<?php if($team_name_title): ?>
			<h2 <?php if ($team_title_font ) : ?> style="font-size:<?php echo esc_attr($team_title_font) ?>;"<?php endif; ?>><?php if($team_link): ?><a href="<?php echo esc_attr($team_link) ?>"><?php endif ?><?php echo esc_attr($team_name_title) ?><?php if($team_link): ?></a><?php endif ?></h2>
		<?php endif ?>
		
		<?php if($team_name_sub_title): ?>
			<h6 <?php if ($team_sub_title_font ) : ?> style="font-size:<?php echo esc_attr($team_sub_title_font) ?>;"<?php endif; ?>><?php echo esc_attr($team_name_sub_title) ?></h6>
		<?php endif ?>
	
	</div>
	
	
	
    <?php
	
   	return $output_pro. ob_get_clean();
	
}


add_action( 'vc_before_init', 'pro_progression_team_integrateVC' );
function pro_progression_team_integrateVC() {
	

  
   vc_map( array(
      "name" => esc_html__( "Pro Team Member", "pro-elements" ),
	  "description" => esc_html__( "Display team member", "pro-elements" ),
      "base" => "pro_progression_team",
	  "weight" => 100,
      "class" => "",
      "category" => esc_html__( "Pro Elements", "pro-elements"),
	  'icon' => 'vc-icon',

	  
      "params" => array(
          
			 
          
			 
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => esc_html__( "Team Title", "pro-elements" ),
             "param_name" => "team_name_title",
             "value" => esc_html__( "John Doe", "pro-elements" ),
          ),
			 
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => esc_html__( "Team Sub-title", "pro-elements" ),
             "param_name" => "team_name_sub_title",
             "value" => esc_html__( "Web Developer", "pro-elements" ),
          ),
			 
          array(
            "type" => "textfield",
			"holder" => "div",
 			"class" => "",
             "heading" => esc_html__( "Team Text", "pro-elements" ),
             "param_name" => "team_name_text",
             "value" => ""
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Optional Team Link (Heading/Image)", "pro-elements" ),
             "param_name" => "team_link",
             "value" => "",
          ),
			 
          array(
            "type" => "attach_image",
 				"class" => "",
             "heading" => esc_html__( "Team Image", "pro-elements" ),
             "param_name" => "team_image",
             "value" => "",
          ),
			 
			 
          array(
            "type" => "colorpicker",
			"holder" => "div",
 			"class" => "",
             "heading" => esc_html__( "Image Hover Color", "pro-elements" ),
             "param_name" => "image_bg_color",
             "value" => esc_html__( "#292935", "pro-elements" ),
          ),
			 
			 
			 
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Optional Title Font Size", "pro-elements" ),
             "param_name" => "team_title_font",
             "value" => ""
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Optional Sub-title Font Size", "pro-elements" ),
             "param_name" => "team_sub_title_font",
             "value" => ""
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Facebook Social Link", "pro-elements" ),
             "param_name" => "team_facebook",
             "value" => esc_html__( "http://facebook.com", "pro-elements" ),
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Twitter Social Link", "pro-elements" ),
             "param_name" => "team_twitter",
             "value" => esc_html__( "http://twitter.com", "pro-elements" ),
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "E-mail Link", "pro-elements" ),
             "param_name" => "team_email",
             "value" => esc_html__( "noreply@e-mail.com", "pro-elements" ),
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Instagram Social Link", "pro-elements" ),
             "param_name" => "team_instagram",
             "value" => "",
          ),
			 
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Spotify Social Link", "pro-elements" ),
             "param_name" => "team_spotify",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Youtube Social Link", "pro-elements" ),
             "param_name" => "team_youtube",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Vimeo Social Link", "pro-elements" ),
             "param_name" => "team_vimeo",
             "value" => "",
          ),
			 
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Google+ Social Link", "pro-elements" ),
             "param_name" => "team_google",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Pinterest Social Link", "pro-elements" ),
             "param_name" => "team_pinterest",
             "value" => "",
          ),
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Soundcloud Social Link", "pro-elements" ),
             "param_name" => "team_soundcloud",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "LinkedIn Social Link", "pro-elements" ),
             "param_name" => "team_linkedin",
             "value" => "",
          ),
			 
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Snapchat Social Link", "pro-elements" ),
             "param_name" => "team_snapchat",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Tumblr Social Link", "pro-elements" ),
             "param_name" => "team_tumblr",
             "value" => "",
          ),
			 
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Flickr Social Link", "pro-elements" ),
             "param_name" => "team_flickr",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Dribbble Social Link", "pro-elements" ),
             "param_name" => "team_dribbble",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "VK Social Link", "pro-elements" ),
             "param_name" => "team_vk",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "WordPress Social Link", "pro-elements" ),
             "param_name" => "team_wordpress",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Houzz Social Link", "pro-elements" ),
             "param_name" => "team_houzz",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "BeHance Social Link", "pro-elements" ),
             "param_name" => "team_behance",
             "value" => "",
          ),
			 
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "GitHub Social Link", "pro-elements" ),
             "param_name" => "team_github",
             "value" => "",
          ),
			 
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "LastFM Social Link", "pro-elements" ),
             "param_name" => "team_lastfm",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Medium Social Link", "pro-elements" ),
             "param_name" => "team_medium",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Trip Advisor Social Link", "pro-elements" ),
             "param_name" => "team_tripadvisor",
             "value" => "",
          ),
			 
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Twitch Social Link", "pro-elements" ),
             "param_name" => "team_twitch",
             "value" => "",
          ),
			 
          array(
            "type" => "textfield",
 			"class" => "",
             "heading" => esc_html__( "Yelp Social Link", "pro-elements" ),
             "param_name" => "team_yelp",
             "value" => "",
          ),
			 
			 
			 
			 
			 
      )
   ) );
}