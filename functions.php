<?php

function ct_unit_override_footer_text( $footer_text ) {

	$site_url = 'https://www.competethemes.com/morning/';
	$footer_text = '<a href="' . esc_url( $site_url ) . '">Morning WordPress Theme</a> by Compete Themes.';
	return $footer_text;
}
add_filter( 'ct_apex_footer_text', 'ct_unit_override_footer_text' );

function ct_morning_register_scripts(){

	// register Google Fonts typefaces & styles
	wp_register_style( 'ct-morning-google-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,700');

	// dequeue Apex Google Fonts
	wp_dequeue_style('ct-apex-google-fonts');

	// enqueue Google Fonts
	wp_enqueue_style('ct-morning-google-fonts');
}
add_action('wp_enqueue_scripts', 'ct_morning_register_scripts', 99 );

function ct_morning_update_customizer( $wp_customize ) {

	$wp_customize->get_setting( 'heading_font' )->default = 'Montserrat';
	$wp_customize->get_control( 'heading_font' )->description = __( 'Default font is Montserrat.', 'morning' );
	$wp_customize->get_setting( 'site_title_font' )->default = 'Montserrat';
	$wp_customize->get_control( 'site_title_font' )->description = __( 'Default font is Montserrat.', 'morning' );
}
add_action( 'customize_register', 'ct_morning_update_customizer', 90);