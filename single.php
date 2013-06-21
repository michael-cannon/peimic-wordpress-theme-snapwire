<?php get_header(); ?> 

<div class="wrapper">
	<div id="container">
		<div id="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('holder margin_bottom_25'); ?>>
				<?php post_thumbnail(); ?>
				<h1 class="entry_title"><?php the_title(); ?></h1>

				<div class="metasingle">
					<span class="postdate"><?php echo get_the_date('') ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
					<span class="postcategory"><?php _e('Filed under','snapwire'); ?>: <?php the_category(',') ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
					<span class="postauthor"><?php _e('Posted by','snapwire'); ?>: <?php the_author_posts_link(); ?></span> 
				</div><!-- /metas -->
				
				<?php 
					// Theme innerpage slider
					if (get_option('of_sn_inslider') == 'Site Wide') {
						require_once (GABFIRE_INC_PATH . '/theme-gallery.php');
					} 
					elseif (
							( get_option('of_sn_inslider') == 'Tag-based' ) and (has_tag(get_option('of_sn_inslider_tag')) ) 
						or 
							( term_exists( get_option('of_sn_inslider_tag') , 'gallery-tag',  '' )) ) 
					{
						require_once (GABFIRE_INC_PATH . '/theme-gallery.php');
					}
					elseif (get_option('of_sn_inslider_tag') == 'Disable') {
						// do nothing
					}


					// Display edit post link to site admin
					edit_post_link(__('Edit This Post','snapwire'),'<p>','</p>'); 				
					
					// If there is a video, display it
					gab_media(array(
						'name' => 'fatured',
						'enable_video' => 'true',
						'video_id' => 'post',
						'catch_image' => 'false',
						'enable_thumb' => 'false',
						'media_width' => '604', 
						'media_height' => '350', 
						'thumb_align' => 'videowrapper', 
						'enable_default' => 'false',
					)); 
					
					// Display content
					the_content();
					
					// make sure any floated content gets cleared
					echo '<div class="clear"></div>';
					
					// Display pagination
					wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink= %');
					
					//If enabled -> display short url of post
					if(get_option('of_short_url') == 'true') {
						echo '<p class="small_text">';
							_e('Shortlink: ','snapwire'); 
							echo '<input type="text" class="small_text span-1" onclick="this.focus(); this.select();" value="'; wp_get_shortlink(); 
							echo '">';
						echo '</p>';
					}				
					
					//If there is a widget, display it
					gab_dynamic_sidebar('PostWidget');
				
					// Display edit post link to site admin
					edit_post_link(__('Edit This Post','snapwire'),'<p>','</p>'); 
				?>	
				
				<?php if(get_option('of_entry_meta') == 'true')  { ?>
					<div id="entryMeta">
						<?php echo get_avatar( get_the_author_email(), '27' ); ?>
						<?php _e('Posted by','snapwire'); ?>  <?php the_author_posts_link(); ?> 
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						<?php _e('on','snapwire'); ?> <?php echo get_the_date(''); ?>. <?php _e('Filed under','snapwire'); ?> <?php the_category(', ') ?>.
						<?php _e('You can follow any responses to this entry through the','snapwire'); ?> <?php comments_rss_link('RSS 2.0'); ?>.
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
						<?php _e('You can leave a response or trackback to this entry','snapwire'); ?>
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
						<?php _e('Responses are currently closed, but you can trackback from your own site.','snapwire'); ?>
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
						<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.','snapwire'); ?>
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
						<?php _e('Both comments and pings are currently closed.','snapwire'); ?>
						<?php } ?>	
						<div class="clear"></div>	
					</div>
				<?php } ?>
			
				
			</div><!-- /post -->
			<?php endwhile; else : endif; ?>
			
			<?php if ( get_option('of_sn_singlepage') <> "" ) {  ?>
			<div class="single_ad">
					<?php
						if(file_exists(TEMPLATEPATH . '/ads/single_468x60/'.current_catID().'.php') && (is_single() || is_category())) {
							include_once(TEMPLATEPATH . '/ads/single_468x60/'.current_catID().'.php');
						}
						else {
							include_once(TEMPLATEPATH . '/ads/single_468x60.php');
						}
					?>
			</div>
			<?php } ?>

			<?php comments_template(); ?>
				
			
		</div> <!-- /main -->
	
		<div id="sidebar">
			<div class="holder margin_bottom_25">
				<?php get_sidebar(); ?>
			</div><!-- /holder -->
		</div><!-- /sidebar -->
	
		<div class="clear"></div>
	</div><!-- End of container -->

<?php get_footer(); ?>
