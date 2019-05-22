<?php

/**
 * Search 
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form role="search" method="get" id="bbp-search-form" class="search-form" action="<?php bbp_search_url(); ?>">
	<div>
		<label class="screen-reader-text hidden" for="bbp_search"><?php _e( 'Search for:', 'zaser-progression' ); ?></label>
		<input type="hidden" name="action" value="bbp-search-request" />
		<input tabindex="<?php bbp_tab_index(); ?>"  placeholder="<?php echo esc_attr_x( 'Enter keyword and hit enter...', 'placeholder', 'zaser-progression' ); ?>" type="text" value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" name="bbp_search" id="bbp_search" class="search-field" />
		<input tabindex="<?php bbp_tab_index(); ?>" class="button search-submit" type="submit" id="bbp_search_submit" value="<?php esc_attr_e( 'Search', 'zaser-progression' ); ?>" />
	</div>
</form>
