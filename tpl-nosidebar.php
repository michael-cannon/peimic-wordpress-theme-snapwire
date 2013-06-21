<?php
/*
Template Name: No-Sidebar
*/
?>
<?php get_header(); ?> 

<div class="wrapper">
	<div id="container">
		<div id="main" style="width:978px;margin:0;">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('holder margin_bottom_25'); ?>>
				<h1 class="entry_title"><?php the_title(); ?></h1>
				
				<?php 
					// Display edit post link to site admin
					edit_post_link(__('Edit This Post','snapwire'),'<p>','</p>'); 				
					
					// If there is a video, display it
					gab_media(array(
						'name' => 'fatured',
						'enable_video' => 'true',
						'video_id' => 'post',
						'catch_image' => 'false',
						'enable_thumb' => 'false',
						'media_width' => '950', 
						'media_height' => '500', 
						'thumb_align' => 'aligncenter', 
						'enable_default' => 'false',
					)); 
						
					// Display content
					the_content();
						
					// make sure any floated content gets cleared
					echo '<div class="clear"></div>';
						
					// Display pagination
					wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink= %');
								
			
					edit_post_link(__('Edit This Post','snapwire'),'<p>','</p>'); 
				?>					
				
			</div><!-- /post -->
			<?php endwhile; else : endif; ?>
		</div> <!-- /main -->
	
		<div class="clear"></div>
	</div><!-- End of container -->

<?php get_footer(); ?>
