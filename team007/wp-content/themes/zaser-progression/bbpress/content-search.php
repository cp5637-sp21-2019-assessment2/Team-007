<?php

/**
 * Search Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( is_active_sidebar( 'progression-studios-bbpress-sidebar' ) ) { ?><div id="main-container-pro"><?php } ?>

<div id="bbpress-forums">

	<?php bbp_breadcrumb(); ?>

	<?php bbp_set_query_name( bbp_get_search_rewrite_id() ); ?>

	<?php do_action( 'bbp_template_before_search' ); ?>

	<?php if ( bbp_has_search_results() ) : ?>

		 <?php bbp_get_template_part( 'pagination', 'search' ); ?>

		 <?php bbp_get_template_part( 'loop',       'search' ); ?>

		 <?php bbp_get_template_part( 'pagination', 'search' ); ?>

	<?php elseif ( bbp_get_search_terms() ) : ?>

		 <?php bbp_get_template_part( 'feedback',   'no-search' ); ?>

	<?php else : ?>

		<?php bbp_get_template_part( 'form', 'search' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_search_results' ); ?>

</div>

<?php if ( is_active_sidebar( 'progression-studios-bbpress-sidebar' ) ) { ?>
	</div><!-- close #main-container-pro -->
	<div class="sidebar">
		<?php if ( ! dynamic_sidebar( 'progression-studios-bbpress-sidebar' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div><!-- close #sidebar -->
	<div class="clearfix-pro"></div>
<?php } ?>