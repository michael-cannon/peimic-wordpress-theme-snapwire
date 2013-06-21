<?php get_header(); ?> 

<?php if (intval(get_option('of_sn_fea_nr')) > 0 ) { ?>
<div id="featured_wrapper">
	
	
	<div class="wrapper">
	
		<div id="featured-slider" class="sliderwrapper">
			<?php 
			$count = 1;
						
			if ( get_option('of_sn_fea_recent') == 'true' ) {
				$args = array(
			   'posts_per_page' => '6'
			);
			} else {
				if ( get_option('of_sn_fea_tag') <> "" ) {
					$args = array(
					  'posts_per_page' => '6', 
					  'tag' => get_option('of_sn_fea_tag')
					);
				} else {
					$args = array(
					  'posts_per_page' => '6', 
					  'cat' => get_option('of_sn_fea_cat')
					);				
				}
			}
						
			$gab_query = new WP_Query();$gab_query->query($args); 
			while ($gab_query->have_posts()) : $gab_query->the_post();
			?>
				<div class="contentdiv" id="post-<?php the_ID(); ?>">
					<div class="sliderPostPhoto">
						<?php 
						gab_media(array(
							'name' => 'snpw-fea', 
							'enable_video' => 'true', 
							'catch_image' => get_option('of_sn_catch_img'),
							'video_id' => 'featured', 
							'enable_thumb' => 'true', 
							'catch_image' => 'true',
							'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
							'media_width' => '650', 
							'media_height' => '366', 
							'thumb_align' => '', 
							'enable_default' => get_option('of_sn_end1'),
							'default_name' => 'featured.jpg'	
						)); 										
						?>
										
						<?php if (($gab_flv == '') and ($gab_video == '') and ($gab_iframe == '') ) { ?>
							<div class="sliderPostInfo">
								<h2 class="featuredTitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a></h2>
								<p><?php print string_limit_words(get_the_excerpt(), 16); ?>&hellip;</p>
								<span class="postmeta">
									<?php echo get_the_date(''); ?> / 
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e('Read More','snapwire'); ?></a><?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
								</span>
							</div>
						<?php } ?>							
					</div><!-- end of sliderphoto/video -->
				</div><!-- end of contentdiv -->
			<?php $count++; endwhile; wp_reset_query(); ?>
						
			<div id="paginate-featured-slider">
				<ul>
					<?php 
					$count = 1;
					// the value for $args is defined above
					$gab_query = new WP_Query();$gab_query->query($args); 
					while ($gab_query->have_posts()) : $gab_query->the_post();
					?>
						<li id="feapost-<?php the_ID(); ?>">
							<a href="<?php if(get_option('show_fea_reveal') == 'On Click') { echo '#'; } else { the_permalink(); } ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" class="toc<?php if ($count == 6) { echo " last"; } ?>" rel="bookmark">
								<?php 
									gab_media(array(
										'name' => 'snpw-fea_thumb',
										'enable_video' => 'false',
										'catch_image' => get_option('of_sn_catch_img'),
										'enable_thumb' => 'true',
										'resize_type' => 'c', 
										'media_width' => '85', 
										'media_height' => '45', 
										'thumb_align' => 'featured_thumb', 
										'enable_default' => get_option('of_sn_end2'),
										'default_name' => 'featured_thumb.jpg'
									));
								?>
								<span class="fea_thumb_title"><?php the_title(); ?></span>	
							</a>
						</li>
					<?php $count++; endwhile; wp_reset_query(); ?>
				</ul>
			</div>
		</div><!-- end of sliderwrapper -->
					
		<script type="text/javascript">
			featuredcontentslider.init({
				id: "featured-slider", //id of main slider DIV
				contentsource: ["inline", ""], //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
				toc: "markup", //Valid values: "#increment", "markup", ["label1", "label2", etc]
				nextprev: ["", ""], //labels for "prev" and "next" links. Set to "" to hide.
				revealtype: "<?php if(get_option('of_sn_fea_reveal') == 'OnClick') { echo 'click'; } else { echo 'mouseover'; } ?>", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
				enablefade: [true, 0.4], //[true/false, fadedegree]
				autorotate: [<?php if(get_option('of_sn_fea_rotate') == 'true') { echo 'true'; } else { echo 'false'; } ?>, <?php if ( get_option('of_sn_fea_pause') <> "" ) { echo get_option('of_sn_fea_pause').'000'; } else { echo '5000'; } ?>], //[true/false, pausetime]
				onChange: function(previndex, curindex){ //event handler fired whenever script changes slide
					//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
					//curindex holds index of currently nwspn slide (1=1st slide, 2nd=2nd etc)
				}
			})
		</script>
		<!-- End of featured slider -->					
					
	</div><!-- /wrapper -->
	
	
	
</div><!-- /featured wrapper -->
<?php } ?>
			
<?php gab_dynamic_sidebar( 'Featured' ); ?>	

<div class="wrapper">
	<div id="container">
		<div id="main">
			<div class="holder margin_bottom_25">
				<div id="secondary_top" class="border_bottom_30">
					<div class="col_narrow border_right_15">
						<?php 
						gab_dynamic_sidebar( 'Se_Top_Left1' );  
							include_once(TEMPLATEPATH . '/ads/home_120x600.php');					
						gab_dynamic_sidebar( 'Se_Top_Left2' ); 
						?>
					</div>
					
					<div class="col_wide border_right_15">
						<?php gab_dynamic_sidebar( 'Se_Top_Mid1' ); ?>
						
						<?php if (intval(get_option('of_sn_nr2')) > 0 ) { ?>
						
							<span class="catname">
								<a href="<?php echo get_category_link(get_option('of_sn_cat2'));?>"><?php echo get_cat_name(get_option('of_sn_cat2')); ?></a>
							</span>
						
							<?php 
							$count = 1;
							$args = array(
							  'posts_per_page' => get_option('of_sn_nr2'), 
							  'cat' => get_option('of_sn_cat2')
							);	
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							?>
							
							<div class="featuredPost<?php if ($count == get_option('of_sn_nr2')) { echo " lastPost"; } ?>">
								<?php
									echo '<a title="';
									echo get_the_title();
									echo '" href="';
									echo get_permalink();
									echo '" rel="bookmark">';
								?>
								<?php 
									gab_media(array(
										'name' => 'snpw-pri_top',
										'enable_video' => 'false',
										'catch_image' => get_option('of_sn_catch_img'),
										'enable_thumb' => 'true',
										'resize_type' => 'c', 
										'media_width' => '293',
										'media_height' => '175', 
										'thumb_align' => 'alignnone', 
										'enable_default' => get_option('of_sn_end3'),
										'default_name' => 'primary_top1.jpg'									
									)); 
								?>						
								<?php
									echo '</a>';
								?>
								
								<h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

								<p><?php echo string_limit_words(get_the_excerpt(), 22); ?>&hellip;</p>
								
								<span class="postmeta<?php if ($count == get_option('of_sn_nr2')) { echo " lastPost"; } ?>">
									<?php echo get_the_date(''); ?> / 
									<?php comments_popup_link(__('No Comment','snapwire'), __('1 Comment','snapwire'), __('% Comments','snapwire')); ?> / 
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e('Read More','snapwire'); ?></a>
									<?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
								</span>

							</div>
							<?php $count++; endwhile; wp_reset_query(); ?>
						
						<?php } ?>
						
						<?php gab_dynamic_sidebar( 'Se_Top_Mid2' ); ?>
					</div>

					<div class="col_wide last">
						<?php gab_dynamic_sidebar( 'Se_Top_Right1' ); ?>
				
						<?php if (intval(get_option('of_sn_nr3')) > 0 ) { ?>
						
							<span class="catname">
								<a href="<?php echo get_category_link(get_option('of_sn_cat3'));?>"><?php echo get_cat_name(get_option('of_sn_cat3')); ?></a>
							</span>
							
							<?php 
							$count = 1;
							$args = array(
							  'posts_per_page' => get_option('of_sn_nr3'), 
							  'cat' => get_option('of_sn_cat3')
							);	
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							?>
							
							<div class="featuredPost<?php if ($count == get_option('of_sn_nr2')) { echo " lastPost"; } ?>">

								<?php
									echo '<a title="';
									echo get_the_title();
									echo '" href="';
									echo get_permalink();
									echo '" rel="bookmark">';
								?>
								<?php 
									gab_media(array(
										'name' => 'snpw-pri_top',
										'enable_video' => 'false',
										'catch_image' => get_option('of_sn_catch_img'),
										'enable_thumb' => 'true',
										'resize_type' => 'c', 
										'media_width' => '293', 
										'media_height' => '175', 
										'thumb_align' => 'alignnone', 
										'enable_default' => get_option('of_sn_end4'),
										'default_name' => 'primary_top2.jpg'									
									)); 
								?>	
								<?php
									echo '</a>';
								?>
								
								<h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

								<p><?php echo string_limit_words(get_the_excerpt(), 22); ?>&hellip;</p>
								
								<span class="postmeta<?php if ($count == get_option('of_sn_nr2')) { echo " lastPost"; } ?>">
									<?php echo get_the_date(''); ?> / 
									<?php comments_popup_link(__('No Comment','snapwire'), __('1 Comment','snapwire'), __('% Comments','snapwire')); ?> / 
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e('Read More','snapwire'); ?></a>
									<?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
								</span>

							</div>
							<?php $count++; endwhile; wp_reset_query(); ?>
							
						<?php } ?>
						
						<?php gab_dynamic_sidebar( 'Se_Top_Right2' );?>
					</div>
					
					<div class="clear"></div>				
				</div>
				
				<?php gab_dynamic_sidebar( 'Secondary1' ); ?>
				
				<div id="secondary_bottom" class="border_bottom_30">
					
					<div class="col_left border_right_20">
						<?php gab_dynamic_sidebar( 'Se_Bot_Left1' ); ?>
						
						<?php if (intval(get_option('of_sn_nr4')) > 0 ) { ?>
						
							<span class="catname">
								<a href="<?php echo get_category_link(get_option('of_sn_cat4'));?>"><?php echo get_cat_name(get_option('of_sn_cat4')); ?></a>
							</span>
						
							<?php 
							$count = 1;
							$args = array(
							  
							  'posts_per_page' => get_option('of_sn_nr4'), 
							  'cat' => get_option('of_sn_cat4')
							);	
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							?>
							
							<div class="featuredPost<?php if ($count == get_option('of_sn_nr4')) { echo " lastPost"; } ?>">				
								
								<h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

								<?php
									echo '<a title="';
									echo get_the_title();
									echo '" href="';
									echo get_permalink();
									echo '" rel="bookmark">';
								?>
								<?php 
									gab_media(array(
										'name' => 'snpw-pri_bot',
										'enable_video' => 'false',
										'catch_image' => get_option('of_sn_catch_img'),
										'enable_thumb' => 'true',
										'resize_type' => 'c', 
										'media_width' => '100', 
										'media_height' => '75', 
										'thumb_align' => 'alignleft', 
										'enable_default' => get_option('of_sn_end5'),
										'default_name' => 'primary_bot1.jpg'									
									)); 
								?>							
								<?php
									echo '</a>';
								?>
								
								<p><?php echo string_limit_words(get_the_excerpt(), 18); ?>&hellip;</p>
								
								<span class="postmeta<?php if ($count == get_option('of_sn_nr4')) { echo " lastPost"; } ?>">
									<?php echo get_the_date(''); ?> / 
									<?php comments_popup_link(__('No Comment','snapwire'), __('1 Comment','snapwire'), __('% Comments','snapwire')); ?> / 
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e('Read More','snapwire'); ?></a>
									<?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
								</span>

							</div>
							<?php $count++; endwhile; wp_reset_query(); ?>
						
						<?php } ?>
						
						<?php gab_dynamic_sidebar( 'Se_Bot_Left2' ); ?>
					</div>

					<div class="col_right last">
						<?php gab_dynamic_sidebar( 'Se_Bot_Right1' );  ?>
						
						<?php if (intval(get_option('of_sn_nr5')) > 0 ) { ?>
						
						<span class="catname">
							<a href="<?php echo get_category_link(get_option('of_sn_cat5'));?>"><?php echo get_cat_name(get_option('of_sn_cat5')); ?></a>
						</span>			
					
						<?php 
						$count = 1;
						$args = array(
						  'posts_per_page' => get_option('of_sn_nr5'), 
						  'cat' => get_option('of_sn_cat5')
						);	
						$gab_query = new WP_Query();$gab_query->query($args); 
						while ($gab_query->have_posts()) : $gab_query->the_post();						
						?>
						
						<div class="featuredPost<?php if ($count == get_option('of_sn_nr5')) { echo " lastPost"; } ?>">

						<h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						
							<?php
								echo '<a title="';
								echo get_the_title();
								echo '" href="';
								echo get_permalink();
								echo '" rel="bookmark">';
							?>
							<?php 
								gab_media(array(
									'name' => 'snpw-pri_bot',
									'enable_video' => 'false',
									'catch_image' => get_option('of_sn_catch_img'),
									'enable_thumb' => 'true',
									'resize_type' => 'c', 
									'media_width' => '100', 
									'media_height' => '75', 
									'thumb_align' => 'alignleft', 
									'enable_default' => get_option('of_sn_end6'),
									'default_name' => 'primary_bot2.jpg'									
								)); 
							?>	
							<?php
								echo '</a>';
							?>
							
							<p><?php echo string_limit_words(get_the_excerpt(), 18); ?>&hellip;</p>
							
							<span class="postmeta<?php if ($count == get_option('of_sn_nr5')) { echo " lastPost"; } ?>">
								<?php echo get_the_date(''); ?> / 
								<?php comments_popup_link(__('No Comment','snapwire'), __('1 Comment','snapwire'), __('% Comments','snapwire')); ?> / 
								<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e('Read More','snapwire'); ?></a>
								<?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
							</span>

						</div>
						<?php $count++; endwhile; wp_reset_query(); ?>
							
						<?php } ?>
						
						<?php gab_dynamic_sidebar( 'Se_Bot_Right2' ); ?>
					</div>
					<div class="clear"></div>				
				</div>			
				
				<?php gab_dynamic_sidebar( 'Secondary2' ); ?>
				
				<?php if (intval(get_option('of_sn_nr6')) > 0 ) { ?>
					<div id="mediabar">
						<div id="previous_button"></div>
						<div id="next_button"></div>

						<div class="container">
							<ul>
								<?php 
								$count=1;
								$args = array(
								  'posts_per_page' => get_option('of_sn_nr6'), 
								  'cat' => get_option('of_sn_cat6')
								);						
								$gab_query = new WP_Query();$gab_query->query($args); 
								while ($gab_query->have_posts()) : $gab_query->the_post();
								?>	
								<li class="car">
									<div class="thumb">
										<?php
											echo '<a title="';
											echo get_the_title();
											echo '" href="';
											echo get_permalink();
											echo '" rel="bookmark">';
										?>
										<?php 
										gab_media(array(
											'name' => 'snpw-med_slide', 
											'enable_video' => 'true', 
											'video_id' => 'mediabar', 
											'enable_thumb' => 'true', 
											'catch_image' => 'true',
											'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
											'media_width' => '130', 
											'media_height' => '120', 
											'thumb_align' => 'mediabar_item', 
											'enable_default' => get_option('of_sn_end7'),
											'default_name' => 'p_gallery.jpg'
											)); 
										?>
										<?php
											echo '</a>';
										?>
									</div>
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
							
								</li>
								<?php $count++; endwhile; wp_reset_query(); ?>
							</ul>
						</div>
						
						<script type="text/javascript">
							(function($) { $(document).ready(function(){
								$("#mediabar .container").jCarouselLite({
									<?php if(get_option('of_sn_media_rotate') == 'true'){ ?>
										auto:<?php if ( get_option('of_sn_media_pause') <> "" ) { echo get_option('of_sn_media_pause').'000'; } else { echo '5000'; } ?>,
									<?php } ?>
									scroll: <?php if ( get_option('of_sn_media_scroll') <> "" ) { echo get_option('of_sn_media_scroll'); } else { echo '2'; } ?>,
									speed: <?php if ( get_option('of_sn_media_speed') <> "" ) { echo get_option('of_sn_media_speed').'000'; } else { echo '1000'; } ?>,	
									visible: 4,
									start: 0,
									circular: false,
									btnPrev: "#previous_button",
									btnNext: "#next_button"
								});
							})})(jQuery)	
						</script>
							
					</div><!-- end of Mediabar -->
				<?php } ?>
				
				<?php gab_dynamic_sidebar( 'Below_Mediabar' ); ?>
				
				<div id="subnews">
					<div class="col border_right_15">
						<?php gab_dynamic_sidebar( 'SubnewsLeft1' ); ?>
						
						<?php if (intval(get_option('of_sn_nr7')) > 0 ) { ?>
							<span class="catname">
								<a href="<?php echo get_category_link(get_option('of_sn_cat7'));?>"><?php echo get_cat_name(get_option('of_sn_cat7')); ?></a>
							</span>					
						
							<?php 
							$count = 1;
							$args = array(
							  'posts_per_page' => get_option('of_sn_nr7'), 
							  'cat' => get_option('of_sn_cat7')
							);	
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							?>
							
							<div class="featuredPost<?php if ($count == get_option('of_sn_nr7')) { echo " lastPost"; } ?>">
								
								<h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

								<p><?php echo string_limit_words(get_the_excerpt(), 16); ?>&hellip;</p>
								
								<span class="postmeta<?php if ($count == get_option('of_sn_nr7')) { echo " lastPost"; } ?>">
									<?php echo get_the_date(''); ?> / 
									<?php comments_popup_link(__('No Comment','snapwire'), __('1 Comment','snapwire'), __('% Comments','snapwire')); ?>
									<?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
								</span>

							</div>
							<?php $count++; endwhile; wp_reset_query(); ?>
							
						<?php } ?>
						
						<?php gab_dynamic_sidebar( 'SubnewsLeft2' ); ?>
					</div>
					
					<div class="col border_right_15">
						<?php gab_dynamic_sidebar( 'SubnewsMid1' );  ?>
						
						<?php if (intval(get_option('of_sn_nr8')) > 0 ) { ?>
							<span class="catname">
								<a href="<?php echo get_category_link(get_option('of_sn_cat8'));?>"><?php echo get_cat_name(get_option('of_sn_cat8')); ?></a>
							</span>			
						
							<?php 
							$count = 1;
							$args = array(
							  'posts_per_page' => get_option('of_sn_nr8'), 
							  'cat' => get_option('of_sn_cat8')
							);	
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							?>
							
							<div class="featuredPost<?php if ($count == get_option('of_sn_nr8')) { echo " lastPost"; } ?>">
							
								<h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

								<p><?php echo string_limit_words(get_the_excerpt(), 16); ?>&hellip;</p>
								
								<span class="postmeta<?php if ($count == get_option('of_sn_nr8')) { echo " lastPost"; } ?>">
									<?php echo get_the_date(''); ?> / 
									<?php comments_popup_link(__('No Comment','snapwire'), __('1 Comment','snapwire'), __('% Comments','snapwire')); ?>
									<?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
								</span>
							
							</div>
							<?php $count++; endwhile; wp_reset_query(); ?>
							
						<?php } ?>
						
						<?php gab_dynamic_sidebar( 'SubnewsMid2' ); ?>
					</div>

					<div class="col last">
						
						<?php gab_dynamic_sidebar( 'SubnewsRight1' ); ?>
					
						<?php if (intval(get_option('of_sn_nr9')) > 0 ) { ?>
						
							<span class="catname">
								<a href="<?php echo get_category_link(get_option('of_sn_cat9'));?>"><?php echo get_cat_name(get_option('of_sn_cat9')); ?></a>
							</span>
					
							<?php 
							$count = 1;
							$args = array(
							  'posts_per_page' => get_option('of_sn_nr9'), 
							  'cat' => get_option('of_sn_cat9')
							);	
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							?>
							
							<div class="featuredPost<?php if ($count == get_option('of_sn_nr9')) { echo " lastPost"; } ?>">
								
								<h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'snapwire' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

								<p><?php echo string_limit_words(get_the_excerpt(), 16); ?>&hellip;</p>
								
								<span class="postmeta<?php if ($count == get_option('of_sn_nr9')) { echo " lastPost"; } ?>">
									<?php echo get_the_date(''); ?> / 
									<?php comments_popup_link(__('No Comment','snapwire'), __('1 Comment','snapwire'), __('% Comments','snapwire')); ?>
									<?php edit_post_link(__('Edit','snapwire'),' / ',''); ?>
								</span>
								
							</div>
							<?php $count++; endwhile; wp_reset_query(); ?>
							
						<?php } ?>
						
						<?php gab_dynamic_sidebar( 'SubnewsRight2' ); ?>
					</div>
					<div class="clear"></div>				
				</div><!-- /border_bottom_30 -->			
				
				<?php gab_dynamic_sidebar( 'MainBottom' ); ?>
			</div><!-- /holder -->
		</div> <!-- /main -->
	
		<div id="sidebar">
			<div class="holder margin_bottom_25">
				<?php get_sidebar(); ?>
			</div><!-- /holder -->
		</div><!-- /sidebar -->
	
		<div class="clear"></div>
	</div><!-- End of container -->

<?php get_footer(); ?>
