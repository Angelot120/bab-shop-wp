<?php
/**
 * General Settings Customizer
 *
 * @package cloudpress
 */
function cloudpress_general_settings_customizer ( $wp_customize )
{
	$wp_customize->add_panel('cloudpress_general_settings',
		array(
			'priority' => 110,
			'capability' => 'edit_theme_options',
			'title' => esc_html__('General Settings','cloudpress')
		)
	);
	// add section to manage breadcrumb settings
	$wp_customize->add_section(
        'breadcrumb_setting_section',
        array(
            'title' =>__('Breadcrumb settings','cloudpress'),
			'panel'  => 'cloudpress_general_settings',
			'priority'   => 3,
			
			)
    );
	//Dropdown button or html option
	$wp_customize->add_setting(
    'cloudpress_breadcrumb_type',
    array(
        'default'           =>  'default',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'cloudpress_sanitize_select',
    ));
	$wp_customize->add_control('cloudpress_breadcrumb_type', array(
		'label' => esc_html__('Breadcrumb type','cloudpress'),
		'description' => esc_html__( 'If you use other than "default" one you will need to install and activate respective plugins Breadcrumb NavXT, Yoast SEO and Rank Math SEO', 'cloudpress' ),
        'section' => 'breadcrumb_setting_section',
		'setting' => 'cloudpress_breadcrumb_type',
		'type'    =>  'select',
		'choices' =>  array(
			'default' => __( 'Default(Blank)', 'cloudpress' ),
            'yoast'  => __( 'Yoast SEO', 'cloudpress' ),
            'rankmath'  => __( 'Rank Math', 'cloudpress' ),
			'navxt'  => __( 'NavXT', 'cloudpress' ),
			)
	));
	}
add_action( 'customize_register', 'cloudpress_general_settings_customizer' );
?>