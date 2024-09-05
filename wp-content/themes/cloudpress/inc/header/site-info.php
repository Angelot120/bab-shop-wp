<?php the_custom_logo();?>
<?php  if ( display_header_text() ) : 
   if((get_option('blogname')!='') || (get_option('blogdescription')!='')):?>
<div class="custom-logo-link-url">
   <?php if(get_option('blogname')!=''):?>
   <h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h3>
   <?php endif;
      $cloudpress_description = get_bloginfo( 'description', 'display' );
      if(get_option('blogdescription')!='')
      {
          if ( $cloudpress_description || is_customize_preview() ) : ?>
   <div class="site-description"><?php echo $cloudpress_description; ?></div>
   <?php endif; }?>
</div>
<?php endif; endif;?>