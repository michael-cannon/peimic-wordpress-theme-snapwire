<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
<title><?php gab_title(); ?></title>

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('of_rssaddr') <> "" ) { echo get_option('of_rssaddr'); } else { echo bloginfo('rss2_url'); } ?>" />	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
		wp_head();
	?>	
	
	<?php if(file_exists(TEMPLATEPATH . '/custom.css')) { ?>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/custom.css" />
	<?php } ?>	

</head>

<body>

<div id="header">
	<div class="wrapper">
		<div id="header_top">
			<div id="logo" style="padding:<?php echo get_option('of_padding_top'); ?>px 0px <?php echo get_option('of_padding_bottom'); ?>px <?php echo get_option('of_padding_left'); ?>px;">
				<?php 
				if ( get_option('of_logo_type') == 'Image Based Logo') { ?>
					<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('description'); ?>">
						<img src="<?php echo get_option('of_logo'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/>
					</a>
				<?php } else { ?>
					<h1>
						<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
							<?php bloginfo('name'); ?>
							<span><?php bloginfo('description'); ?></span>
						</a>
					</h1>
				<?php } ?>
			</div><!-- /logo -->	

			<?php
				if(get_option('of_nav2') == 'true') { 
					wp_nav_menu( array('theme_location' => 'masthead', 'container' => false, 'menu_class' => 'mastheadnav dropdown' ));
				} else { ?>
				<ul class="mastheadnav dropdown">
					<li class="gab_home"><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','snapwire'); ?></a></li>
					
					<?php if ( get_option('of_sn_facebook') <> "" ) { ?>
						<li class="gab_facebook"><a href="<?php echo get_option('of_sn_facebook'); ?>" rel="nofollow" title="<?php esc_attr_e('Connect on facebook','snapwire'); ?>"><?php _e('Connect on Facebook','snapwire'); ?></a></li>
					<?php } ?>
					
					<?php if ( get_option('of_sn_twitter') <> "" ) { ?>
						<li class="gab_twitter"><a href="<?php echo get_option('of_sn_twitter'); ?>" rel="nofollow" title="<?php esc_attr_e('Follow on Twitter','snapwire'); ?>"><?php _e('Follow on Twitter','snapwire'); ?></a></li>
					<?php } ?>
					
					<li class="gab_rss"><a href="<?php if ( ('of_rssaddr') <> "" ) { echo get_option('of_rssaddr'); } else { echo bloginfo('rss2_url'); } ?>" rel="nofollow"><?php _e('RSS for Entries', 'snapwire'); ?></a></li>
					
					<?php if ( get_option('of_feedemail') <> "" ) { ?>
						<li class="gab_email"><a href="<?php echo get_option('of_feedemail'); ?>" rel="nofollow"><?php _e('Subscribe via Email', 'snapwire'); ?></a></li>
					<?php } ?>
					
					<?php wp_register('<li class="gab_register">','</li>',true); ?>
				</ul>
			<?php } ?>

			<div class="clear"></div>

			<div id="header_widget">
				<?php 
				if ( get_option('of_sn_ad1') <> "" ) 
				{
					if(file_exists(TEMPLATEPATH . '/ads/header_468x60/'. current_catID() .'.php') && (is_single() || is_category())) 
					{
						include_once(TEMPLATEPATH . '/ads/header_468x60/'. current_catID() .'.php');
					}
					else 
					{
						include_once(TEMPLATEPATH . '/ads/header_468x60.php');
					}
				} 
				else 
				{ 
					get_search_form(); 
				} 
				?>
			</div>
		</div>
		
		<div id="menuwrapper">
			<nav class="main_nav">
				<?php
					if(get_option('of_nav1') == 'true') { 
						wp_nav_menu( array('theme_location' => 'primary-navigation', 'container' => false, 'menu_class' => 'mainnav dropdown' ));
					} else { ?>
					<ul class="mainnav dropdown">
						<li <?php if(is_home() ) { ?>class="current-cat first"<?php } ?>><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','snapwire'); ?></a></li>
						<?php wp_list_categories('orderby='. get_option('of_order_cats') .'&order='. get_option('of_sort_cats') .'&title_li=&exclude='. get_option('of_ex_cats')); ?>
						<?php wp_list_pages('sort_column=menu_order&title_li=&exclude='. get_option('of_ex_pages')); ?>
					</ul>
				<?php } ?>
				<div class="clear"></div>
			</nav>
		</div>
		
	</div><!-- /wrapper -->
</div><!-- /header -->