<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php echo ( is_home() || is_front_page() ) ? bloginfo('name') : wp_title('| ', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-45276685-4', 'auto');
      ga('send', 'pageview');

    </script>
</head>

<body <?php body_class(); ?>>

<?php 
	if( get_option('use_preloader', '1') )
		get_template_part('inc/content','preloader'); 
?>

<div class="body-wrapper">

  <div class="navbar basic default">
    <div class="navbar-header">
    
    <?php 
    	if(!( get_option('header_layout','basic') == 'basic' ))
    		get_template_part('inc/content','sub-header'); 
    ?>
    
      <div class="container">
      
        <div class="basic-wrapper"> 
        
        	<a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse">
        		<i class='icon-menu-1'></i>
        	</a> 
        	
        	<a class="navbar-brand" href="<?php echo home_url(); ?>">
        		<?php if( get_option('custom_logo') ) : ?>
        			<img src="<?php echo get_option('custom_logo'); ?>" alt="<?php echo get_option('custom_logo_alt_text'); ?>" class="retina" />
        		<?php else : ?>
        			<span><?php echo bloginfo('name'); ?></span>
        		<?php endif; ?>
        	</a> 
        	
        </div>
        
        <div class="collapse navbar-collapse pull-right">
			<?php
				if ( has_nav_menu( 'primary' ) ){
				    wp_nav_menu( 
				    	array(
					        'theme_location'    => 'primary',
					        'depth'             => 3,
					        'container'         => false,
					        'container_class'   => false,
					        'menu_class'        => 'nav navbar-nav',
					        'menu_id'           => 'menu-standard-navigation',
					        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					        'walker'            => new ebor_bootstrap_navwalker()
				        )
				    );
					    
				} else {
					echo '<a href="'. admin_url('nav-menus.php') .'">Set up a navigation menu now</a>';
				}
			?>
        </div>
        
      </div>
    </div>
  </div>
  <div class="offset"></div>