<?php

/**
 * Single Topic Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( is_active_sidebar( 'progression-studios-bbpress-sidebar' ) ) { ?><div id="main-container-pro"><?php } ?>

<div id="bbpress-forums">

	<?php bbp_breadcrumb(); ?>

	<?php do_action( 'bbp_template_before_single_topic' ); ?>

	<?php if ( post_password_required() ) : ?>

		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>

		<?php bbp_topic_tag_list(); ?>

		<?php bbp_single_topic_description(); ?>

		<?php if ( bbp_show_lead_topic() ) : ?>

			<?php bbp_get_template_part( 'content', 'single-topic-lead' ); ?>

		<?php endif; ?>

		<?php if ( bbp_has_replies() ) : ?>

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

			<?php bbp_get_template_part( 'loop',       'replies' ); ?>

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

		<?php endif; ?>

		<?php bbp_get_template_part( 'form', 'reply' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_single_topic' ); ?>

</div>

<?php if ( is_active_sidebar( 'progression-studios-bbpress-sidebar' ) ) { ?>
	</div><!-- close #main-container-pro -->
	<div class="sidebar">
		<?php if ( ! dynamic_sidebar( 'progression-studios-bbpress-sidebar' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div><!-- close #sidebar -->
	<div class="clearfix-pro"></div>
<?php } ?>