<?php
// Global variables define
define('CLOUDPRESS_DARK_PARENT_TEMPLATE_DIR_URI', get_template_directory_uri());
define('CLOUDPRESS_DARK_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());
define('CLOUDPRESS_DARK_TEMPLATE_DIR', trailingslashit(get_stylesheet_directory()));

if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }

}

// Enqueue Script
add_action('wp_enqueue_scripts', 'cloudpress_dark_enqueue_styles',999);

function cloudpress_dark_enqueue_styles() {

    wp_enqueue_style('cloudpress-dark-parent-style', CLOUDPRESS_DARK_PARENT_TEMPLATE_DIR_URI . '/style.css', array('bootstrap'));

    if (get_theme_mod('custom_color_enable') == true) {
        cloudpress_dark_custom_light();
    }
    else {
        wp_enqueue_style('cloudpress-dark-default-style', CLOUDPRESS_DARK_TEMPLATE_DIR_URI . '/assets/css/default.css');
    }
    wp_enqueue_style('cloudpress-dark-css', CLOUDPRESS_DARK_TEMPLATE_DIR_URI . '/assets/css/dark.css');

}

//Setup theme
add_action('after_setup_theme', 'cloudpress_dark_setup');

function cloudpress_dark_setup() {
    load_theme_textdomain('cloudpress-dark', CLOUDPRESS_DARK_TEMPLATE_DIR . '/languages');

    require(CLOUDPRESS_DARK_TEMPLATE_DIR . '/inc/customizer/footer-options.php');
    require(CLOUDPRESS_DARK_TEMPLATE_DIR . '/inc/customizer/customizer_theme_style.php');

    //About Theme
    $theme = wp_get_theme(); // gets the current theme
    if ('CloudPress Dark' == $theme->name) {
        if (is_admin()) {
            require CLOUDPRESS_DARK_TEMPLATE_DIR . '/admin/admin-init.php';
        }
    }
}

// Add footer hook
add_action('cloudpress_dark_footer_section_hook', 'cloudpress_dark_footer_section_hook');

function cloudpress_dark_footer_section_hook() {?>
 <footer class="site-footer">
 <?php
    if(is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-2') || is_active_sidebar('footer-sidebar-3') || is_active_sidebar('footer-sidebar-4')): ?>
        <div class="row footer-sidebar">
            <!--Footer Widgets-->
            <div class="container">
              <div class="row">
                <?php get_template_part('sidebar','footer');?>
              </div>
            </div>
            <!--/Footer Widgets-->
        </div>
    <?php endif;?>
    <!--Site Info-->
    <?php if(get_theme_mod('footer_enable',true)===true):?>
            <div class="site-info">
                <div class="site-branding">
                 <?php $cloudpress_dark_footer_copyright = get_theme_mod('footer_copyright','<p>'.__( 'Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://spicethemes.com/cloudpress-dark-wordpress-theme/" rel="nofollow">CloudPress Dark</a> by <a href="https://spicethemes.com" rel="nofollow">SpiceThemes</a>', 'cloudpress-dark' ).'</p>'); ?>
                <?php echo wp_kses_post($cloudpress_dark_footer_copyright);?>
            </div>
        </div>
    <?php endif;?>
    <!--/Site Info-->
 </footer>
<?php
}

//Add custom color function
function cloudpress_dark_custom_light() {
    $cloudpress_dark_link_color = get_theme_mod('link_color','#E84B63');
    list($r, $g, $b) = sscanf($cloudpress_dark_link_color, "#%02x%02x%02x");
    $r = $r - 232;
    $g = $g - 75;
    $b = $b - 99;

    if ($cloudpress_dark_link_color != '#ff0000') :?>
    <style type="text/css">
        /* ====== Site title ===== */
        .site-title a:hover{
          color: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
        /* ====== Menus Section ===== */
        .navbar5.navbar-custom .search-box-outer a:hover, .dropdown-item.active, .dropdown-item:active, .dropdown-item:hover, .woocommerce-loop-product__title:hover {
          color: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
         body.dark .navbar5.navbar-custom .nav li.active a,  
         body.dark .navbar5.navbar-custom .nav li.active a:hover,  
         body.dark .navbar5.navbar-custom .nav li.active a:focus,  
         body.dark .navbar5.navbar-custom .nav li a:hover,  
         body.dark .navbar5.navbar .nav .nav-item:hover .nav-link,  
         body.dark .navbar5.navbar .nav .nav-item .nav-link:focus, 
         body.dark .navbar5.navbar .nav .nav-item.active .nav-link {
            background-color: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
        @media (max-width: 991px) {
        	.navbar5.navbar-custom .nav li.active a, .navbar5.navbar-custom .nav li.active a:hover, .navbar5.navbar-custom .nav li.active a:focus, .navbar5.navbar-custom .nav li a:hover {
        	    background-color: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        	}
        }
        /* ====== Button ===== */
        .navbar5 .search-form input[type="submit"] {
            background: <?php echo esc_attr($cloudpress_dark_link_color); ?> none repeat scroll 0 0 !important;
            border: 1px solid <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
       
        /* ====== WooCommerce ===== */
        .cart-header > a .cart-total {
              background: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
        .woocommerce #review_form #respond .form-submit input, .woocommerce-message a.button, .woocommerce .return-to-shop a.button {
            background-color: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
        .woocommerce [type=submit], .woocommerce button {
            border: 1px solid <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
        .woocommerce-message::before {
          color: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
        /* ====== Top Header ===== */
        .header-sidebar {
            background-color: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
        .widget .head-contact-info li a:hover {
            color: #fff !important;
        }
        /* ====== Service ===== */
        .services4 .post-thumbnail i.fa {
            background: <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        .services4 .post-thumbnail i.fa, .services4 .post:hover {
            background: <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        .services4 .post:hover .post-thumbnail i.fa {
            color:<?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        /* ====== Testimonial ===== */
        .dark .testmonial-block .name > a:hover {
            color: <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        .dark .entry-header .entry-title a:hover {
            color: <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        .dark .widget a:hover,.dark .widget a:focus{
          color: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
        .navbar a.bg-light:hover, .dropdown-item:hover {
            background-color: transparent !important;
            color: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
        body.dark .navbar5.navbar .nav .nav-item.active .nav-link {
            color: #ffffff;
            background-color: <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        body.dark .navbar .search-box-outer .dropdown-menu {
            border-top: solid 1px <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        .navbar .nav .nav-item:hover .nav-link, .navbar .nav .nav-item.active .nav-link, .dropdown-menu > li.active > a, .navbar .nav .nav-item.current_page_parent .nav-link {
            color: <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        blockquote {
            border-left: 3px solid <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        .cart-header > a .cart-total {
            background: <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        .dark .pagination a:hover, .dark .pagination a.active {
            background-color: <?php echo esc_attr($cloudpress_dark_link_color); ?>;
            border: 1px solid <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        .dropdown-item:focus, .dropdown-item:hover {
            color: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
        body.dark a:hover,body.dark a:active,body.dark a:focus {
            color: <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }       
        body.dark .woocommerce .widget .tagcloud a:hover {
            background-color: <?php echo esc_attr($cloudpress_dark_link_color); ?>;
            border: 1px solid <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        body.dark .woocommerce #respond .form-submit input[type="submit"], body.dark .woocommerce a.button, body.dark .woocommerce button.button, body.dark .woocommerce input.button {
            background-color: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }body.dark .row.section-module.Blogs-detail .blog .post .entry-content a:hover {
            color: <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
       .cart-header .cart-total {
            background: <?php echo esc_attr($cloudpress_dark_link_color); ?>;
        }
        body.dark .widget.widget_block .tag-cloud-link:hover,.dark .widget .tagcloud a:hover {
            color: <?php echo esc_attr($cloudpress_dark_link_color); ?> !important;
        }
    </style>
<?php
endif;
}


function cloudpress_dark_custom_color_css() {
  $theme = wp_get_theme();
  if ('CloudPress Dark' == $theme->name) {
    if (get_theme_mod('custom_color_enable') == true) { ?>
        <style>
          .navbar5 button {
              background-color: transparent !important;
          }
          @media (min-width: 992px) {
            .navbar5 .search-box-outer .dropdown-menu {
                top: 30px !important;
            }
          }
        </style>
    <?php } ?>
    <style type="text/css">
      .cart-header a .cart-total span { display: none; }
    </style>
  <?php }
}
add_action('wp_head','cloudpress_dark_custom_color_css');

function cloudpress_dark_search_style() {
  if ( class_exists( 'WooCommerce' ) ) { ?>
    <style type="text/css">
      .dark .nav-search { border-right: 1px solid rgb(255, 255, 255, 0.40); }
    </style>
  <?php }
}
add_action('wp_head','cloudpress_dark_search_style');