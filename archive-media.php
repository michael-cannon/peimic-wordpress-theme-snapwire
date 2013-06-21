		<?php
		$count = 1;
		if (have_posts()) : while (have_posts()) : the_post();			
		$gab_thumb = get_post_meta($post->ID, 'thumbnail', true);
		$gab_video = get_post_meta($post->ID, 'video', true);
		$gab_flv = get_post_meta($post->ID, 'videoflv', true);
		$ad_flv = get_post_meta($post->ID, 'adflv', true);
		$gab_iframe = get_post_meta($post->ID, 'iframe', true);		
		?>
		<div id="post-<?php the_ID(); ?>" class="media<?php if($count % 2 == 0) { echo ' last'; } ?>">
				
			<h2 class="media_posttitle"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
			<?php 
			if (($gab_flv == '') and ($gab_video == '') and ($gab_iframe == '') ) 
			{
				echo '<a href="'; the_permalink();
				echo '" rel="bookmark" title="';
				printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) );
				echo '">';
			} 
				gab_media(array(
					'name' => 'line-arc_media',
					'enable_video' => 'true',
					'enable_thumb' => 'true',
					'catch_image' => get_option('show_catch_img'),
					'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
					'media_width' => '291', 
					'media_height' => '178', 
					'thumb_align' => 'media_holder', 
					'enable_default' => get_option('of_sn_end8'),
					'default_name' => 'archive_media.jpg'
					)); 
			
			if (($gab_flv == '') and ($gab_video == '') and ($gab_iframe == '') ) 
			{
				echo '</a>';
			}
			?>			
				
			<span class="mediadate"><?php echo get_the_date(''); ?></span>
			
			<span class="mediacomment"><?php comments_popup_link(__('No Comment','snapwire'), __('1 Comment','snapwire'), __('% Comments','snapwire'));?></span>
		</div>
			
		<?php if($count % 2 == 0) { echo '<div class="clear"></div>'; } ?>
		<?php $count++; endwhile; endif; ?>
		
		<div class="clear"></div>