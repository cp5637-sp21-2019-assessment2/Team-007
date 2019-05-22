<?php




add_action( 'cmb2_admin_init', 'progression_studios_page_meta_box' );
function progression_studios_page_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page_settings',
		'title'         => esc_html__('Page Settings', 'zaser-progression'),
		'object_types'  => array( 'page' ), // Post type,
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Sub-title', 'zaser-progression'),
		'id'         => $prefix . 'sub_title',
		'type'       => 'text',
	) );

	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Sidebar Display', 'zaser-progression'),
		'id'         => $prefix . 'page_sidebar',
		'type'       => 'select',
		'options'     => array(
			'hidden-sidebar'   => esc_html__( 'Hide Sidebar', 'zaser-progression' ),
			'right-sidebar'    => esc_html__( 'Right Sidebar', 'zaser-progression' ),
			'left-sidebar'    => esc_html__( 'Left Sidebar', 'zaser-progression' ),
		),
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Page Title Background Image', 'zaser-progression'),
		'id'         => $prefix . 'header_image',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Page Title', 'zaser-progression'),
		'id'         => $prefix . 'disable_page_title',
		'type'       => 'checkbox',
	) );
	
}



add_action( 'cmb2_admin_init', 'progression_studios_page_header_meta_box' );
function progression_studios_page_header_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page_header',
		'title'         => esc_html__('Header Settings', 'zaser-progression'),
		'object_types'  => array( 'page' ), // Post type,
	) );

	
	

	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Navigation Text Color', 'zaser-progression'),
		'id'         => $prefix . 'custom_page_nav_color',
		'type'       => 'select',
		'options'     => array(
			'progression_studios_default_navigation_color'    => esc_html__( 'Default Color', 'zaser-progression' ),
			'progression_studios_force_dark_navigation_color'    => esc_html__( 'Force Text Black', 'zaser-progression' ),
			'progression_studios_force_light_navigation_color'   => esc_html__( 'Force Text White', 'zaser-progression' ), 
		),
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Force Transparent Header', 'zaser-progression'),
		'id'         => $prefix . 'header_transparent_float',
		'type'       => 'checkbox',
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Custom logo for page', 'zaser-progression'),
		'desc' => esc_html__('Must be same size as the main logo.', 'zaser-progression'),
		'id'         => $prefix . 'custom_page_logo',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Header', 'zaser-progression'),
		'id'         => $prefix . 'header_disabled',
		'type'       => 'checkbox',
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Footer', 'zaser-progression'),
		'id'         => $prefix . 'disable_footer_per_page',
		'type'       => 'checkbox',
	) );


	
}




add_action( 'cmb2_admin_init', 'progression_studios_post_meta_box' );
function progression_studios_post_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_post',
		'title'         => esc_html__('Post Settings', 'zaser-progression'),
		'object_types'  => array( 'post' ), // Post type
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Display Post in Secondary Layout', 'zaser-progression'),
		'id'         => $prefix . 'display_secondary_layout',
		'type'       => 'checkbox',
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Image Gallery', 'zaser-progression'),
		'desc' => esc_html__('Add-in images to display a gallery.', 'zaser-progression'),
		'id'         => $prefix . 'gallery',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Audio/Video Embed', 'zaser-progression'),
		'desc'       => esc_html__('Paste in your video url or embed code', 'zaser-progression'),
		'id'         => $prefix . 'video_post',
		'type'       => 'text',
	) );
	
	

	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Featured Image Link', 'zaser-progression'),
		'id'         => $prefix . 'blog_featured_image_link',
		'type'       => 'select',
		'options'     => array(
			'progression_link_default'   => esc_html__( 'Default link to post', 'zaser-progression' ), // {#} gets replaced by row number
			'progression_link_lightbox'    => esc_html__( 'Link to image in lightbox pop-up', 'zaser-progression' ),
			'progression_link_url'    => esc_html__( 'Link to URL', 'zaser-progression' ),
			'progression_link_url_new_window'    => esc_html__( 'Link to URL (New Window)', 'zaser-progression' ),
			'progression_lightbox_video'    => esc_html__( 'Link to video (Youtube/Vimeo/.MOV)', 'zaser-progression' ),
		),

	) );
	

	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Optional Link', 'zaser-progression'),
		'desc' => esc_html__('Make your post link to another page or video pop-up.', 'zaser-progression'),
		'id'         => $prefix . 'external_link',
		'type'       => 'text',
	) );
	
	
	
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Featured Image on Post Page', 'zaser-progression'),
		'id'         => $prefix . 'disable_featured_image',
		'type'       => 'checkbox',
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Sidebar on Post Page', 'zaser-progression'),
		'id'         => $prefix . 'disable_sidebar_post',
		'type'       => 'checkbox',
	) );
	

}






add_action( 'cmb2_admin_init', 'progression_studios_portfolio_meta_box' );
function progression_studios_portfolio_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_portfolio_index',
		'title'         => esc_html__('Portfolio Index Settings', 'zaser-progression'),
		'object_types'  => array( 'portfolio' ), // Post type
	) );
	

	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Image Gallery', 'zaser-progression'),
		'desc' => esc_html__('Add-in images to display a gallery.', 'zaser-progression'),
		'id'         => $prefix . 'gallery',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Video Embed', 'zaser-progression'),
		'desc'       => esc_html__('Paste in your video url', 'zaser-progression'),
		'id'         => $prefix . 'video_post',
		'type'       => 'text',
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Featured Image Link', 'zaser-progression'),
		'id'         => $prefix . 'blog_featured_image_link',
		'type'       => 'select',
		'options'     => array(
			'progression_link_default'   => esc_html__( 'Default link to post', 'zaser-progression' ), // {#} gets replaced by row number
			'progression_link_lightbox'    => esc_html__( 'Link to image in lightbox pop-up', 'zaser-progression' ),
			'progression_link_url'    => esc_html__( 'Link to URL', 'zaser-progression' ),
			'progression_link_url_new_window'    => esc_html__( 'Link to URL (New Window)', 'zaser-progression' ),
			'progression_lightbox_video'    => esc_html__( 'Link to video (Youtube/Vimeo/.MOV)', 'zaser-progression' ),
		),

	) );

	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Optional Link', 'zaser-progression'),
		'desc' => esc_html__('Make your post link to another page or video pop-up.', 'zaser-progression'),
		'id'         => $prefix . 'external_link',
		'type'       => 'text',
	) );

}



add_action( 'cmb2_admin_init', 'progression_studios_portfolio_single_meta_box' );
function progression_studios_portfolio_single_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_portfolio_second',
		'title'         => esc_html__('Portfolio Post Settings', 'zaser-progression'),
		'object_types'  => array( 'portfolio' ), // Post type
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Portfolio Post Layout', 'zaser-progression'),
		'id'         => $prefix . 'secondary_post_layout',
		'type'       => 'select',
		'options'     => array(
			'progression-single-portfolio-two-column'   => esc_html__( 'Two Column', 'zaser-progression' ),
			'progression-single-portfolio-one-column'    => esc_html__( 'Single Column', 'zaser-progression' ),
			'portfolio-secondary-layout-single-pro'    => esc_html__( 'Secondary Layout', 'zaser-progression' ),
		),
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Portfolio Post date', 'zaser-progression'),
		'id'         => $prefix . 'date_post',
		'type'       => 'text',
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Post Title', 'zaser-progression'),
		'id'         => $prefix . 'disable_post_title',
		'type'       => 'checkbox',
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Post Category & Sharing', 'zaser-progression'),
		'id'         => $prefix . 'disable_post_meta',
		'type'       => 'checkbox',
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Post Featured Image', 'zaser-progression'),
		'id'         => $prefix . 'disable_post_image',
		'type'       => 'checkbox',
	) );
	
	

}





add_action( 'cmb2_admin_init', 'progression_studios_shop_meta_box' );
function progression_studios_shop_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_shop_settings',
		'title'         => esc_html__('Shop Settings', 'zaser-progression'),
		'object_types'  => array( 'product' ), // Post type,
		 'priority'     => 'low',  //  'high', 'core', 'default' or 'low'
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Shop Hover Image', 'zaser-progression'),
		'id'         => $prefix . 'shop_secondary_image',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Mark item as New!', 'zaser-progression'),
		'id'         => $prefix . 'new_shop_item',
		'type'       => 'checkbox',
	) );
	

	
}


add_action( 'cmb2_admin_init', 'progression_user_meta_box' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function progression_user_meta_box() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'user_author_info',
		'title'         => esc_html__('Author Settings', 'zaser-progression'),
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta

	) );
	
	$progression_cmb_demo->add_field( array(
		'name'     => esc_html__( 'Author Information', 'zaser-progression' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	

	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Author Sub-headline', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'user_sub_headline',
		'type' => 'text',
	) );
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Author Website URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'authorurl',
		'type' => 'text_url',
	) );

	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Facebook URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'facebookurl',
		'type' => 'text_url',
	) );

	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Twitter URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'twitterurl',
		'type' => 'text_url',
	) );
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Dribbble URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'dribbbleurl',
		'type' => 'text_url',
	) );


	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Linkedin URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'linkedinurl',
		'type' => 'text_url',
	) );
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Pinterest URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'pinteresturl',
		'type' => 'text_url',
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Google+ URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'googleplusurl',
		'type' => 'text_url',
	) );
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Instagram URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'instagramurl',
		'type' => 'text_url',
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Tumblr URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'tumblrurl',
		'type' => 'text_url',
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Youtube URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'youtubeurl',
		'type' => 'text_url',
	) );
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Dropbox URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'dropboxurl',
		'type' => 'text_url',
	) );
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Flickr URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'flickrurl',
		'type' => 'text_url',
	) );
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Vimeo URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'vimeourl',
		'type' => 'text_url',
	) );
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Soundcloud URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'soundcloudurl',
		'type' => 'text_url',
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'Houzz URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'houzzurl',
		'type' => 'text_url',
	) );
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'WordPress URL', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'wordpressurl',
		'type' => 'text_url',
	) );
	
	
	
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__( 'E-mail Address', 'zaser-progression' ),
		'desc' => esc_html__( 'Leave blank to hide this field', 'zaser-progression' ),
		'id'   => $prefix . 'emailmailto',
		'type' => 'text',
	) );
	

}



