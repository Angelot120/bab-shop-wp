<?php

/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
//Load font from google api.
function cloudpress_google_font_scripts_styles() {
    wp_enqueue_style('cloudpress-font', 'https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700,800,900');
    wp_enqueue_style('cloudpress-font-Lobster', 'https://fonts.googleapis.com/css?family=Lobster+Two:400,400i,700,700i');
}
 if(get_theme_mod('cloudpress_enable_local_google_font',true) ==false){
add_action( 'wp_enqueue_scripts', 'cloudpress_google_font_scripts_styles');
 }
?>
<?php 
/**
* Enqueue theme fonts.
*/
 if(get_theme_mod('cloudpress_enable_local_google_font',true) ==true){
add_action( 'wp_enqueue_scripts', 'cloudpress_theme_fonts',1 );
add_action( 'enqueue_block_editor_assets', 'cloudpress_theme_fonts',1 );
add_action( 'customize_preview_init', 'cloudpress_theme_fonts', 1 );

function cloudpress_theme_fonts() {
    $fonts_url = cloudpress_get_fonts_url();
    // Load Fonts if necessary.
    if ( $fonts_url ) {
        require_once (get_theme_file_path( '/inc/font/wptt-webfont-loader.php' ));
        wp_enqueue_style( 'cloudpress-theme-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
    }
}
}
/**
 * Retrieve webfont URL to load fonts locally.
 */
function cloudpress_get_fonts_url() {
	  $font_families = array(
		'Work Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900',	
        'Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900',
		'Lobster Two:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900',	
		'Roboto:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900',	
		'Open Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900',	
        'Oxygen:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900',	
        'Ubuntu:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900',
        'Cantarell:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900',	
        'Fira Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900',		
    );
    $query_args = array(
        'family'  => urlencode( implode( '|', $font_families ) ),
        'subset'  => urlencode( 'latin,latin-ext' ),
        'display' => urlencode( 'swap' ),
    );
    return apply_filters( 'cloudpress_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}
?>