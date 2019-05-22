<?php

/**
 * Single View Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( is_active_sidebar( 'progression-studios-bbpress-sidebar' ) ) { ?><div id="main-container-pro"><?php } ?>

<div id="bbpress-forums">

	<?php bbp_breadcrumb(); ?>

	<?php bbp_set_query_name( bbp_get_view_rewrite_id() ); ?>

	<?php if ( bbp_view_query() ) : ?>

		<?php bbp_get_template_part( 'pagination', 'topics'    ); ?>

		<?php bbp_get_template_part( 'loop',       'topics'    ); ?>

		<?php bbp_get_template_part( 'pagination', 'topics'    ); ?>

	<?php else : ?>

		<?php bbp_get_template_part( 'feedback',   'no-topics' ); ?>

	<?php endif; ?>

	<?php bbp_reset_query_name(); ?>

</div>

<?php if ( is_active_sidebar( 'progression-studios-bbpress-sidebar' ) ) { ?>
	</div><!-- close #main-container-pro -->
	<div class="sidebar">
		<?php if ( ! dynamic_sidebar( 'progression-studios-bbpress-sidebar' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div><!-- close #sidebar -->
	<div class="clearfix-pro"></div>
<?php } ?>