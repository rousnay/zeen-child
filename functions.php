<?php
/**
 * Zeen Child Theme functions and definitions.
 */
function zeen_child_enqueue_styles() {
wp_enqueue_style( 'zeen-child-style' , get_stylesheet_directory_uri() . '/style.css', array( 'zeen-style' ) );
}
add_action(  'wp_enqueue_scripts', 'zeen_child_enqueue_styles' );