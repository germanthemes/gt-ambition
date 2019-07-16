<?php
/**
 * License Settings
 *
 * Register License Settings
 *
 * @package GT Ambition
 */

/**
 * Adds all License settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_ambition_customize_register_license_settings( $wp_customize ) {

	// Add Section for License.
	$wp_customize->add_section( 'gt_ambition_section_license', array(
		'title'       => esc_html__( 'License', 'gt-ambition' ),
		'description' => esc_html__( 'Please enter your license key. An active license key is necessary for automatic theme updates and support.', 'gt-ambition' ),
		'priority'    => 30,
		'panel'       => 'gt_ambition_options_panel',
	) );

	// Add License Key setting.
	$wp_customize->add_setting( 'gt_ambition_theme_options[license_key]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new GT_Ambition_Customize_License_Control(
		$wp_customize, 'license_key', array(
			'label'    => esc_html__( 'License Key', 'gt-ambition' ),
			'section'  => 'gt_ambition_section_license',
			'settings' => 'gt_ambition_theme_options[license_key]',
			'priority' => 10,
		)
	) );
}
add_action( 'customize_register', 'gt_ambition_customize_register_license_settings' );
