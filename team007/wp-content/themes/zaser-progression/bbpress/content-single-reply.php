<?php

/**
 * Single Reply Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( is_active_sidebar( 'progression-studios-bbpress-sidebar' ) ) { ?><div id="main-container-pro"><?php } ?>

<div id="bbpress-forums">

	<?php bbp_breadcrumb(); ?>

	<?php do_action( 'bbp_template_before_single_reply' ); ?>

	<?php if ( post_password_required() ) : ?>

		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>

		<?php bbp_get_template_part( 'loop', 'single-reply' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_single_reply' ); ?>

</div>

<?php if ( is_active_sidebar( 'progression-studios-bbpress-sidebar' ) ) { ?>
	</div><!-- close #main-container-pro -->
	<div class="sidebar">
		<?php if ( ! dynamic_sidebar( 'progression-studios-bbpress-sidebar' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div><!-- close #sidebar -->
	<div class="clearfix-pro"></div>
<?php } ?>