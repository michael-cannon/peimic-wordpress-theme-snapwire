<?php
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 50, 50, true); // Normal Post Thumbnails

if(get_option('of_wpmumode') == 'false') {
	add_image_size( 'gab_featured', 700, 9999 ); /* Featured Big Image (this is the source image to be resized with timthumb */
} else {
	/* Theme thumbnail sizes for WordPress multi user
	 * network installations. The image sizes below will  
	 * be used only when WPMU mode is activated on 
	 * theme options -> under General settings tab
	 */
	if(get_option('of_wpmumode') == 'true') {
		set_post_thumbnail_size( 50, 50, true); // Normal Post Thumbnails
		add_image_size( 'snpw-fea', 650, 366, true ); // Featured Big Image
		add_image_size( 'snpw-fea_thumb', 85, 45, true ); // Featured small thumbs
		add_image_size( 'snpw-pri_top', 228, 135, true ); // Below Featured
		add_image_size( 'snpw-pri_bot', 80, 60, true ); // The section right above photo slider
		add_image_size( 'snpw-med_slide', 130, 120, true ); // Photo Slider on Mainpage
		add_image_size( 'snpw-archive', 80, 60, true ); // Thumbs for archive pages
	}
}