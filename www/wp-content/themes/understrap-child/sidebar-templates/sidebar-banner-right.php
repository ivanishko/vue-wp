<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package understrap
 */

defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'right-sidebar-banner' ) ) {
	return;
}
?>
<?php dynamic_sidebar( 'right-sidebar-banner' ); ?>


