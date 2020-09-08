<?php
/**
 * Child Theme functions loads the main theme class and extra options
 *
 * @package Angle Child
 * @subpackage Child
 * @since 1.3
 *
 * @copyright (c) 2013 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.0
 */

function oxy_load_child_scripts() {
		wp_enqueue_style( THEME_SHORT . '-child-theme' , get_stylesheet_directory_uri() . '/style.css', array( THEME_SHORT . '-theme' ), false, 'all' );
		wp_enqueue_style('custom-styles', get_stylesheet_directory_uri() . '/dist/css/style.min.css', false, null);
		// wp_enqueue_script('vendor-script', get_stylesheet_directory_uri() . '/dist/js/vendor.min.js', true, null, true);
		wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/dist/js/custom.min.js', true, null, true);

		// wp_localize_script( 'my_ajax_script', 'my_ajax_url', admin_url( 'admin-ajax.php' ) );
		wp_localize_script( 'custom-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'oxy_load_child_scripts');

// Example of overriding theme shortcodes
/**
* Handles VC separator
*
* @return <hr> HTML
**/
/*
function oxy_section_vc_separator( $atts, $content ) {
    return '<hr>';
}
add_shortcode( 'vc_separator', 'oxy_section_vc_separator' ); */


// REMOVE UPDATE NOTICE FOR VISUAL COMPOSER
add_filter('site_transient_update_plugins', 'remove_update_notifications');
function remove_update_notifications($value) {
    if ( isset( $value ) && is_object( $value ) ) {
        unset($value->response[ 'js_composer_theme/js_composer.php' ]);
    }
}


add_action('wp_ajax_send_form', 'send_user_form');
add_action('wp_ajax_nopriv_send_form', 'send_user_form');

include get_theme_file_path( '/addons/send_user_form.php' );
