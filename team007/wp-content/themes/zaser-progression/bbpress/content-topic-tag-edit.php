<?php

/**
 * Topic Tag Edit Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( is_active_sidebar( 'progression-studios-bbpress-sidebar' ) ) { ?><div id="main-container-pro"><?php } ?>


<div id="bbpress-forums">

	<?php bbp_breadcrumb(); ?>

	<?php bbp_topic_tag_description(); ?>

	<?php do_action( 'bbp_template_before_topic_tag_edit' ); ?>

	<?php bbp_get_template_part( 'form', 'topic-tag' ); ?>

	<?php do_action( 'bbp_template_after_topic_tag_edit' ); ?>

</div>


<?php if ( is_active_sidebar( 'progression-studios-bbpress-sidebar' ) ) { ?>
	</div><!-- close #main-container-pro -->
	<div class="sidebar">
		<?php if ( ! dynamic_sidebar( 'progression-studios-bbpress-sidebar' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div><!-- close #sidebar -->
	<div class="clearfix-pro"></div>
<?php } ?>