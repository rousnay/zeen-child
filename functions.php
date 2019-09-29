<?php
/**
 * Zeen Child Theme functions and definitions.
 */
function zeen_child_enqueue_styles() {
wp_enqueue_style( 'zeen-child-style' , get_stylesheet_directory_uri() . '/style.css', array( 'zeen-style' ) );
}
add_action(  'wp_enqueue_scripts', 'zeen_child_enqueue_styles' );



	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'entrance-block-thumb', 1000, 600, true );