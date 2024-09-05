<?php if ( get_header_image() != ''):?>
   <div class="container-fluid">
      <div class="row">
         <div class="wp-custom-header">
            <img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>"/>
         </div>
      </div>
   </div>
<?php endif;?>
<div class="header-logo index5">
	<div class="container">
      <?php the_custom_logo(); ?>
      <?php  if ( display_header_text() ) :
         if((get_option('blogname')!='') || (get_option('blogdescription')!='')): ?>
            <div class="custom-logo-link-url">
                <?php if(get_option('blogname')!=''): ?>
                  <h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h3>
                  <?php endif;
                     $cloudpress_dark_description = get_bloginfo( 'description', 'display' );
                     if(get_option('blogdescription')!='')
                     {
                         if ( $cloudpress_dark_description || is_customize_preview() ) : ?>
                            <div class="site-description"><?php echo $cloudpress_dark_description; ?></div>
                    <?php endif; } ?>
            </div>
          <?php endif; endif;?>
	</div>
</div>
<nav class="navbar custom navbar-expand-lg navbar-dark navbar5">
    <div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation','cloudpress-dark');?>">
					<span class="navbar-toggler-icon"></span>
				</button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <div class="mr-auto">
            <?php
            $cloudpress_dark_menu_class='';
            wp_nav_menu(array(
                        'theme_location' => 'cloudpress-primary',
                        'menu_class'    => 'nav navbar-nav mr-auto '.$cloudpress_dark_menu_class.'',
                        'fallback_cb' => 'cloudpress_fallback_page_menu',
                        'walker' => new Cloudpress_nav_walker()
            ));
            ?>
          </div>
          <?php
          $cloudpress_dark_shop_button='';
		  $cloudpress_dark_shop_button .= '<div class="header-module">';
          $cloudpress_dark_shop_button .= '<div class="nav-search nav-light-search wrap">
              <div class="search-box-outer">
   		           <div class="dropdown menu-item">
                   <a href="#" title="'.esc_attr__('Search','cloudpress-dark').'" class="search-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i>
                   </a>
                   <ul class="dropdown-menu pull-right search-panel" role="group" aria-hidden="true" aria-expanded="false">
                     <li class="dropdown-item panel-outer">
                       <div class="form-container">
                         <form method="get" id="searchform" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' )).'"><label><input type="search" class="search-field" placeholder="'.esc_attr_x( 'Search', 'placeholder', 'cloudpress-dark' ).'" value="" name="s" id="s"></label><input type="submit" class="search-submit" value="'.esc_attr__('Search','cloudpress-dark').'">
                         </form>
                       </div>
                     </li>
                   </ul>
                  </div>
              </div>
		        </div>' ;
            if ( class_exists( 'WooCommerce' ) ) {
              $cloudpress_dark_shop_button .='  <div class="cart-header ">';
              global $woocommerce;
              $cloudpress_dark_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
              $cloudpress_dark_shop_button .= '<a class="cart-icon menu-item" href="'.esc_url($cloudpress_dark_link).'" >';

              if ($woocommerce->cart->cart_contents_count == 0){
                  $cloudpress_dark_shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
                }
                else
                {
                  $cloudpress_dark_shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
                }

                $cloudpress_dark_shop_button .= '</a>';

                $cloudpress_dark_shop_button .= '<span class="cart-total">' . sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'cloudpress-dark'), $woocommerce->cart->cart_contents_count) . '</span>';
                $cloudpress_dark_shop_button .='</div>';
              }
              $cloudpress_dark_shop_button .='</div>';
              if(has_nav_menu( 'cloudpress-primary')):
                 echo $cloudpress_dark_shop_button; 
              endif;?>
				    </div>
				</div>
		</div>
</nav>
		<!--/End of Custom Navbar For Desktop View-->