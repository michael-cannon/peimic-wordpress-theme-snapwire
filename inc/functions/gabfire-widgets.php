<?php
/*
 * TEXT WIDGET
 */
class text_widget extends WP_Widget {
	function text_widget() {
		$widget_ops = array( 'classname' => 'text_widget', 'description' => 'Display text widget with an icon' );
		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'text_widget' );
		$this->WP_Widget( 'text_widget', 'Gabfire Widget : Text', $widget_ops, $control_ops);	
	}
	
	function widget($args, $instance) {
		extract( $args );
		$title	= $instance['title'];
		$icon	= $instance['icon'];
		$text	= $instance['a_text'];
		$link 	= $instance['a_link'];
		$anchor	= $instance['a_anchor'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title;
					echo '<span style="background: url('; bloginfo('template_url'); echo '/images/framework/24x/' . $icon . '.png) no-repeat left center;padding:3px 0 3px 30px;">';
						echo $title;
					echo '</span>';
				echo $after_title;
			}
						
			echo '<p>' . nl2br($text) . '</p>';
				
			if($link) {
				echo '<span class="about_more"><a href="' . get_permalink($link) . '">'. $anchor . '</a></span>';
			}
			
		echo $after_widget; 
	}
	
	function update($new_instance, $old_instance) {  
		$instance['title']		= strip_tags($new_instance['title']);
		$instance['icon']		= strip_tags($new_instance['icon']);
		$instance['a_text'] 	= strip_tags($new_instance['a_text']);
		$instance['a_link'] 	= strip_tags($new_instance['a_link']);
		$instance['a_anchor'] 	= strip_tags($new_instance['a_anchor']); 
		return $new_instance;
	}
 
	function form($instance) {
		$defaults	= array( 'title' => 'About', 'icon' => 'world', 'a_text' => '', 'a_link' => '', 'a_anchor' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id( 'icon' ); ?>">Icon</label> 
		<select id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>">
			
			<option value="appearance" <?php if ( 'appearance' == $instance['icon'] ) echo 'selected="selected"'; ?>>Appearance</option>
			<option value="arrow-right" <?php  if ( 'arrow-right' == $instance['icon'] ) echo 'selected="selected"'; ?>>Arrow Right</option>
			<option value="checkmark" <?php  if ( 'checkmark' == $instance['icon'] ) echo 'selected="selected"'; ?>>Checkmark</option>
			<option value="comment" <?php  if ( 'comment' == $instance['icon'] ) echo 'selected="selected"'; ?>>Comment</option>
			<option value="contact" <?php  if ( 'contact' == $instance['icon'] ) echo 'selected="selected"'; ?>>Contact</option>
			<option value="excellent" <?php  if ( 'excellent' == $instance['icon'] ) echo 'selected="selected"'; ?>>Excellent</option>
			<option value="home" <?php  if ( 'home' == $instance['icon'] ) echo 'selected="selected"'; ?>>Home</option>
			<option value="info" <?php  if ( 'info' == $instance['icon'] ) echo 'selected="selected"'; ?>>Info</option>
			<option value="gear" <?php  if ( 'gear' == $instance['icon'] ) echo 'selected="selected"'; ?>>Gear</option>
			<option value="magnifier" <?php  if ( 'magnifier' == $instance['icon'] ) echo 'selected="selected"'; ?>>Magnifier</option>
			<option value="rss" <?php  if ( 'rss' == $instance['icon'] ) echo 'selected="selected"'; ?>>RSS</option>
			<option value="star" <?php  if ( 'star' == $instance['icon'] ) echo 'selected="selected"'; ?>>Star</option>
			<option value="support" <?php  if ( 'support' == $instance['icon'] ) echo 'selected="selected"'; ?>>Support</option>
			<option value="question" <?php if ( 'question' == $instance['icon'] ) echo 'selected="selected"'; ?>>Question Mark</option>
			<option value="tools" <?php  if ( 'tools' == $instance['icon'] ) echo 'selected="selected"'; ?>>Tools</option>
			<option value="twitter" <?php  if ( 'twitter' == $instance['icon'] ) echo 'selected="selected"'; ?>>Twitter</option>
			<option value="weather" <?php  if ( 'weather' == $instance['icon'] ) echo 'selected="selected"'; ?>>Weather</option>
			<option value="world" <?php  if ( 'world' == $instance['icon'] ) echo 'selected="selected"'; ?>>World</option>
		</select>
	</p>	
		
	<p>
		<label for="<?php echo $this->get_field_id('a_text'); ?>">About Text</label>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('a_text'); ?>" name="<?php echo $this->get_field_name('a_text'); ?>"><?php echo esc_attr($instance['a_text']); ?></textarea>
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('a_link'); ?>">Post or Page ID for link</label>
		<input id="<?php echo $this->get_field_id('a_link'); ?>" name="<?php echo $this->get_field_name('a_link'); ?>" type="text" value="<?php echo esc_attr( $instance['a_link'] ); ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('a_anchor'); ?>">Link label</label>
		<input class="widefat" id="<?php echo $this->get_field_id('a_anchor'); ?>" name="<?php echo $this->get_field_name('a_anchor'); ?>" type="text" value="<?php echo esc_attr($instance['a_anchor']); ?>" />
	</p>
<?php
	}
}
register_widget('text_widget');


/*
 * TEXT 2 WIDGET
 */
class text2_widget extends WP_Widget {
	function text2_widget() {
		$widget_ops = array( 'classname' => 'text2_widget', 'description' => 'Display widget with a big icon' );
		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'text2_widget' );
		$this->WP_Widget( 'text2_widget', 'Gabfire Widget : Text 2', $widget_ops, $control_ops);	
	}
	
	function widget($args, $instance) {
		extract( $args );
		$title	= $instance['title'];
		$icon	= $instance['icon'];
		$text	= $instance['a_text'];
		$link 	= $instance['a_link'];
		$anchor	= $instance['a_anchor'];

		echo $before_widget;
			echo '<div style="background: url('; bloginfo('template_url'); echo '/images/framework/40x/' . $icon . '.png) no-repeat left 7px;padding:3px 0 3px 50px;">';
				if ( $title ) {
					echo $before_title . $title . $after_title;
				}
							
				echo '<p>' . nl2br($text) . '</p>';
					
				if($link) {
					echo '<span class="about_more"><a href="' . get_permalink($link) . '">'. $anchor . '</a></span>';
				}
			echo '</div>';
		echo $after_widget; 
	}
	
	function update($new_instance, $old_instance) {  
		$instance['title']		= strip_tags($new_instance['title']);
		$instance['icon']		= strip_tags($new_instance['icon']);
		$instance['a_text'] 	= strip_tags($new_instance['a_text']);
		$instance['a_link'] 	= strip_tags($new_instance['a_link']);
		$instance['a_anchor'] 	= strip_tags($new_instance['a_anchor']); 
		return $new_instance;
	}
 
	function form($instance) {
		$defaults	= array( 'title' => 'About', 'icon' => 'world', 'a_text' => '', 'a_link' => '', 'a_anchor' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id( 'icon' ); ?>">Icon</label> 
		<select id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>">
			<option value="appearance" <?php if ( 'appearance' == $instance['icon'] ) echo 'selected="selected"'; ?>>Appearance</option>
			<option value="arrow-right" <?php  if ( 'arrow-right' == $instance['icon'] ) echo 'selected="selected"'; ?>>Arrow Right</option>
			<option value="checkmark" <?php  if ( 'checkmark' == $instance['icon'] ) echo 'selected="selected"'; ?>>Checkmark</option>
			<option value="comment" <?php  if ( 'comment' == $instance['icon'] ) echo 'selected="selected"'; ?>>Comment</option>
			<option value="contact" <?php  if ( 'contact' == $instance['icon'] ) echo 'selected="selected"'; ?>>Contact</option>
			<option value="download" <?php  if ( 'download' == $instance['icon'] ) echo 'selected="selected"'; ?>>Download</option>
			<option value="home" <?php  if ( 'home' == $instance['icon'] ) echo 'selected="selected"'; ?>>Home</option>
			<option value="info" <?php  if ( 'info' == $instance['icon'] ) echo 'selected="selected"'; ?>>Info</option>
			<option value="galleries" <?php  if ( 'galleries' == $instance['icon'] ) echo 'selected="selected"'; ?>>Galleries</option>
			<option value="gear" <?php  if ( 'gear' == $instance['icon'] ) echo 'selected="selected"'; ?>>Gear</option>
			<option value="magnifier" <?php  if ( 'magnifier' == $instance['icon'] ) echo 'selected="selected"'; ?>>Magnifier</option>
			<option value="rss" <?php  if ( 'rss' == $instance['icon'] ) echo 'selected="selected"'; ?>>RSS</option>
			<option value="star" <?php  if ( 'star' == $instance['icon'] ) echo 'selected="selected"'; ?>>Star</option>
			<option value="support" <?php  if ( 'support' == $instance['icon'] ) echo 'selected="selected"'; ?>>Support</option>
			<option value="question" <?php if ( 'question' == $instance['icon'] ) echo 'selected="selected"'; ?>>Question Mark</option>
			<option value="trash" <?php  if ( 'trash' == $instance['icon'] ) echo 'selected="selected"'; ?>>Trash</option>
			<option value="tools" <?php  if ( 'tools' == $instance['icon'] ) echo 'selected="selected"'; ?>>Tools</option>
			<option value="twitter" <?php  if ( 'twitter' == $instance['icon'] ) echo 'selected="selected"'; ?>>Twitter</option>
			<option value="weather" <?php  if ( 'weather' == $instance['icon'] ) echo 'selected="selected"'; ?>>Weather</option>
			<option value="world" <?php  if ( 'world' == $instance['icon'] ) echo 'selected="selected"'; ?>>World</option>
		</select>
	</p>	
		
	<p>
		<label for="<?php echo $this->get_field_id('a_text'); ?>">About Text</label>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('a_text'); ?>" name="<?php echo $this->get_field_name('a_text'); ?>"><?php echo esc_attr($instance['a_text']); ?></textarea>
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('a_link'); ?>">Post or Page ID for link</label>
		<input id="<?php echo $this->get_field_id('a_link'); ?>" name="<?php echo $this->get_field_name('a_link'); ?>" type="text" value="<?php echo esc_attr( $instance['a_link'] ); ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('a_anchor'); ?>">Link label</label>
		<input class="widefat" id="<?php echo $this->get_field_id('a_anchor'); ?>" name="<?php echo $this->get_field_name('a_anchor'); ?>" type="text" value="<?php echo esc_attr($instance['a_anchor']); ?>" />
	</p>
<?php
	}
}
register_widget('text2_widget');

class widget_flickr extends WP_Widget {

	function widget_flickr() {
		$widget_ops = array( 'classname' => 'flickr_widget', 'description' => 'Display flickr photos on your site' );
		$control_ops = array( 'width' => 330, 'height' => 350, 'id_base' => 'flickr-widget' );
		$this->WP_Widget( 'flickr-widget', 'Gabfire Widget : Flickr', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title 			= apply_filters('widget_title', $instance['title'] );
		$photo_source 	= $instance['photo_source'];
		$flickr_id 		= $instance['flickr_id'];
		$flickr_tag 	= $instance['flickr_tag'];
		$display 		= $instance['display'];
		$size 			= $instance['size'];
		$photo_number 	= $instance['photo_number'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			echo '
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='; 
				if ( $photo_number ) {
					printf( '%1$s', esc_attr( $photo_number ) ); echo '&amp;display=';
				}
				if ( $display )  {
					printf( '%1$s', esc_attr( $display ) ); echo '&amp;layout=x&amp;';
				}
				
				if ( $instance['photo_source'] == 'user' ) { 
					printf( 'source=user&amp;user=%1$s', esc_attr( $flickr_id ) );
				}
				elseif ( $instance['photo_source'] == 'group' ) {
					printf( 'source=group&amp;group=%1$s', esc_attr( $flickr_id ) );
				}
				if  ( $instance['photo_source'] == 'all_tag' ) {
					printf( 'source=all_tag&amp;tag=%1$s', esc_attr( $flickr_tag ) ); 
				}

				echo '&amp;size=';

				if ( $size )  {
					printf( '%1$s', esc_attr( $size ) ); echo '"></script>';
				}
				
			echo '<div class="clear"></div>';
			
		echo $after_widget; 
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags( $new_instance['title'] );
		$instance['photo_source'] 	= $new_instance['photo_source'];
		$instance['flickr_id'] 		= strip_tags( $new_instance['flickr_id'] );
		$instance['flickr_tag'] 	= strip_tags( $new_instance['flickr_tag'] );
		$instance['group_id'] 		= strip_tags( $new_instance['group_id'] );
		$instance['display'] 		= $new_instance['display'];
		$instance['size'] 			= $new_instance['size'];
		$instance['photo_number'] 	= (int)$new_instance['photo_number'];

		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => 'Flickr Photo Stream', 'flickr_id' => '', 'photo_source' => 'all_tag', 'display' => 'latest', 'photo_number' => '6', 'size' => 's', 'flickr_tag' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		$items  = (int) $items;
		if ( $items < 1 || 10 < $items )
		$items  = 10;
		?>
		
		<div class="controlpanel">
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'photo_source' ); ?>">Image Source</label> 
				<select id="<?php echo $this->get_field_id( 'photo_source' ); ?>" name="<?php echo $this->get_field_name( 'photo_source' ); ?>">
					<option value="user" <?php if ( 'user' == $instance['photo_source'] ) echo 'selected="selected"'; ?>>User</option>
					<option value="group" <?php if ( 'group' == $instance['photo_source'] ) echo 'selected="selected"'; ?>>Group</option>
					<option value="all_tag" <?php  if ( 'all_tag' == $instance['photo_source'] ) echo 'selected="selected"'; ?>>All Users Photos (based on tags)</option>			
				</select>
			</p>
			
			<div rel="flickr_id">
				<p>
					<label for="<?php echo $this->get_field_id( 'flickr_id' ); ?>">User or Group ID <a href="http://idgettr.com/">Get your Flickr ID</a></label>
					<input id="<?php echo $this->get_field_id( 'flickr_id' ); ?>" name="<?php echo $this->get_field_name( 'flickr_id' ); ?>" value="<?php echo esc_attr( $instance['flickr_id'] ); ?>" class="widefat" />
				</p>
			</div>
			
			<div rel="flickr_tag">
				<p>
					<label for="<?php echo $this->get_field_id( 'flickr_tag' ); ?>">Tags (separate with comma) (only if "All Users Photos" selected)</label>
					<input id="<?php echo $this->get_field_id( 'flickr_tag' ); ?>" name="<?php echo $this->get_field_name( 'flickr_tag' ); ?>" value="<?php echo esc_attr( $instance['flickr_tag'] ); ?>" class="widefat" />
				</p>
			</div>

			<p>
				<label for="<?php echo $this->get_field_id( 'display' ); ?>">Display Latest or Random Photos</label> 
				<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>">
					<option value="latest" <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>>Latest</option>
					<option value="random" <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>>Random</option>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_name( 'photo_number' ); ?>">How many items would you like to display?</label>
				<select id="<?php echo $this->get_field_id( 'photo_number' ); ?>" name="<?php echo $this->get_field_name( 'photo_number' ); ?>">			
				<?php
					for ( $i = 1; $i <= 10; ++$i )
					echo "<option value='$i' " . ( $instance['photo_number'] == $i ? "selected='selected'" : '' ) . ">$i</option>";
				?>
				</select>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'size' ); ?>">Photo Size</label> 
				<select id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>">
					<option value="s" <?php if ( 's' == $instance['size'] ) echo 'selected="selected"'; ?>>Small</option>
					<option value="t" <?php if ( 't' == $instance['size'] ) echo 'selected="selected"'; ?>>Thumbnail</option>
					<option value="m" <?php  if ( 'm' == $instance['size'] ) echo 'selected="selected"'; ?>>Medium</option>
				</select>
			</p>
		</div>
		
	<?php
	}
}
register_widget('widget_flickr');

/*
 * FEEDBURNER WIDGET
 */
class feedburner_widget extends WP_Widget {

	function feedburner_widget() {
		$widget_ops = array( 'classname' => 'feedburner_widget', 'description' => 'Feedburner Email Subscribe');
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'feedburner_widget' );
		$this->WP_Widget( 'feedburner_widget', 'Gabfire Widget : Subscribe', $widget_ops, $control_ops);
	}	
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$user	= $instance['user'];
		$text	= $instance['text'];
		$bgcol	= $instance['bgcol'];
		$bordercol	= $instance['bordercol'];
		$textcol	= $instance['textcol'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			?>
			
			<form class="feedburner_widget" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo esc_attr( $user ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
				<fieldset <?php if ( $bgcol ) { echo 'style="background:' . esc_attr( $bgcol ) .';border:1px solid ' . esc_attr( $bordercol ) .';"'; } ?>>
					<input type="text" style="width:80%;color:<?php echo esc_attr( $textcol ); ?>;<?php if ( $bgcol ) { echo 'background:' . esc_attr( $bgcol ); } ?>" class="text" name="email" value="<?php echo esc_attr( $text ); ?>" onfocus="if (this.value == '<?php echo esc_attr( $text ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo esc_attr( $text ); ?>';}" />
					<input type="hidden" value="<?php echo esc_attr( $user ); ?>" name="uri" />
					<input type="hidden" name="loc" value="<?php bloginfo('language'); ?>"/>
					<input type="image" class="feedburner_submit" src="<?php bloginfo('template_url'); ?>/images/framework/add.png" alt="Subscribe" />
				</fieldset>
			</form>
			<?php 
		echo $after_widget; 
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['user'] = strip_tags($new_instance['user']);
		$instance['text'] = strip_tags($new_instance['text']);
		$instance['bgcol'] = strip_tags($new_instance['bgcol']);
		$instance['bordercol'] = strip_tags($new_instance['bordercol']);
		$instance['textcol'] = strip_tags($new_instance['textcol']);
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => 'Subscribe by Email', 'user' => '', 'text' => 'Enter your email','bordercol' => '#cccccc','bgcol' => '#efefef','textcol' => '#555555' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input class="widefat"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('user'); ?>">Feedburner ID</label>
			<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo esc_attr($instance['user']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('bgcol'); ?>">Input field background color</label>
			<input class="widefat" id="<?php echo $this->get_field_id('bgcol'); ?>" name="<?php echo $this->get_field_name('bgcol'); ?>" type="text" value="<?php echo esc_attr($instance['bgcol']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('bordercol'); ?>">Input field border color</label>
			<input class="widefat" id="<?php echo $this->get_field_id('bordercol'); ?>" name="<?php echo $this->get_field_name('bordercol'); ?>" type="text" value="<?php echo esc_attr($instance['bordercol']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('textcol'); ?>">Input field text color</label>
			<input class="widefat" id="<?php echo $this->get_field_id('textcol'); ?>" name="<?php echo $this->get_field_name('textcol'); ?>" type="text" value="<?php echo esc_attr($instance['textcol']); ?>" />
		</p>
			
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>">Text</label>
			<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo esc_attr($instance['text']); ?>" />
		</p>
		
	<?php
	}
}
register_widget('feedburner_widget');

/*
 * TWITTER WIDGET
 */

class tweet_widget extends WP_Widget {
 
	function tweet_widget() {
		$widget_ops = array( 'classname' => 'tweet_widget', 'description' => 'Display Latest Tweets' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'tweet_widget' );
		$this->WP_Widget( 'tweet_widget', 'Gabfire Widget : Latest Tweets', $widget_ops, $control_ops);
	}
 
	function widget($args, $instance) {	  
		extract( $args );
		$title	= $instance['title'];
		$user	= $instance['user'];
		$link	= $instance['t_link'] ? '1' : '0';
		$anchor	= $instance['t_anchor'];
		$number = $instance['t_nr'];

		echo $before_widget;
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			?>
			
			<div id="twitter_div">
				<ul id="twitter_update_list" class="twitter-list"><li></li></ul>
			</div>
			<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
			<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo esc_attr( $user ); ?>.json?callback=twitterCallback2&amp;count=<?php echo esc_attr( $number ); ?>"></script>
					  
			<?php 
			if($link) {
				echo '<span class="twitter_link"><a href="http://twitter.com/'. esc_attr( $user ) . '">' . esc_attr( $anchor ) . '</a></span>';
			}
		echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['user'] 		= strip_tags($new_instance['user']);
		$instance['t_link'] 	= $new_instance['t_link'] ? '1' : '0';
		$instance['t_anchor']	= strip_tags($new_instance['t_anchor']);
		$instance['t_nr'] 		= (int) $new_instance['t_nr'];  
		return $new_instance;
	}
 
	function form($instance) {
		$defaults = array( 'title' => 'Latest Tweets', 'user' => '', 't_link' => '0', 't_anchor' => '', 't_nr' => '5' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('user'); ?>">User</label>
			<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo esc_attr($instance['user']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name( 't_nr' ); ?>">How many tweets you like to display?</label>
			<select id="<?php echo $this->get_field_id( 't_nr' ); ?>" name="<?php echo $this->get_field_name( 't_nr' ); ?>">			
			<?php
				for ( $i = 1; $i <= 15; ++$i )
				echo "<option value='$i' " . ( $instance['t_nr'] == $i ? "selected='selected'" : '' ) . ">$i</option>";
			?>
			</select>
		</p>		
		
		<p>
			<label for="<?php echo $this->get_field_id( 't_link' ); ?>">Show link to Twitter</label> 
			<select id="<?php echo $this->get_field_id( 't_link' ); ?>" name="<?php echo $this->get_field_name( 't_link' ); ?>">
				<option value="1" <?php if ( '1' == $instance['t_link'] ) echo 'selected="selected"'; ?>>Enable</option>
				<option value="0" <?php if ( '0' == $instance['t_link'] ) echo 'selected="selected"'; ?>>Disable</option>	
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('t_anchor'); ?>">Link label:
			<input class="widefat" id="<?php echo $this->get_field_id('t_anchor'); ?>" name="<?php echo $this->get_field_name('t_anchor'); ?>" type="text" value="<?php echo esc_attr($instance['t_anchor']); ?>" />
			</label>
		</p>
		
<?php
	}
}
register_widget('tweet_widget');

/*
 * SEARCH WIDGET
 */

class search_widget extends WP_Widget {
 
	function search_widget() {
		$widget_ops = array( 'classname' => 'search_widget', 'description' => 'Display Search Form' );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'search_widget' );
		$this->WP_Widget( 'search_widget', 'Gabfire Widget : Search', $widget_ops, $control_ops);
	}
 
	function widget($args, $instance) {	  
		extract( $args );
		$title	= $instance['title'];
		$label	= $instance['label'];
		$s_style	= $instance['s_style'] ? '1' : '0';
		$bgcol	= $instance['bgcol'];
		$bordercol	= $instance['bordercol'];

		echo $before_widget;
			
				if ( $title ) {
					echo $before_title . $title . $after_title;
				}
			
				if($s_style == 1) {
				
				?>
					<form class="gab_search_style1" action="<?php bloginfo('url'); ?>">
						<fieldset style="<?php if ( $bgcol ) { echo 'background:' . esc_html( $bgcol ); echo ';';} if ( $bordercol ) { echo 'border:1px solid ' . esc_html( $bordercol ); echo ';';} ?>">
							<input type="text" style="width:80%;<?php if ( $bgcol ) { echo 'background:' . esc_attr( $bgcol ); } ?>" class="text" name="s" value="<?php echo esc_attr( $label ); ?>" onfocus="if (this.value == '<?php echo esc_attr( $label ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo esc_attr( $label ); ?>';}" />
							<input type="image" class="submit_style1" src="<?php bloginfo('template_url'); ?>/images/framework/search.png" alt="<?php echo esc_attr( $label ); ?>" />
							<div class="clearfix"></div>
						</fieldset>
					</form>				
				<?php } else { ?>
					<form action="<?php bloginfo('url'); ?>" class="gab_search_style2" style="background:url(<?php bloginfo('template_url'); ?>/images/framework/bgr_search_box.png) no-repeat;">
						<fieldset>
							<p><input type="submit" value="" class="submit_style2" /></p>
							<p><input type="text" class="text" name="s" value="<?php echo esc_attr( $label ); ?>" onfocus="if (this.value == '<?php echo esc_attr( $label ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo esc_attr( $label ); ?>';}" /></p>
						</fieldset>
					</form>
				<?php 
				}
		echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['label'] 		= strip_tags($new_instance['label']);
		$instance['s_style']	= $new_instance['s_style'] ? '1' : '0';
		$instance['bgcol'] = strip_tags($new_instance['bgcol']);
		$instance['bordercol'] = strip_tags($new_instance['bordercol']);
		return $new_instance;
	}
 
	function form($instance) {
		$defaults = array( 'title' => 'Search in Site', 'label' => 'Search...', 'bgcol' => '#efefef','bordercol' => '#eee' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('label'); ?>">Search Label</label>
			<input class="widefat" id="<?php echo $this->get_field_id('label'); ?>" name="<?php echo $this->get_field_name('label'); ?>" type="text" value="<?php echo esc_attr($instance['label']); ?>" />
		</p>
		
		<p>
			<select id="<?php echo $this->get_field_id( 's_style' ); ?>" name="<?php echo $this->get_field_name( 's_style' ); ?>">
				<option value="1" <?php if ( '1' == $instance['s_style'] ) echo 'selected="selected"'; ?>>Search Style 1</option>
				<option value="0" <?php if ( '0' == $instance['s_style'] ) echo 'selected="selected"'; ?>>Search Style 2</option>	
			</select>
		</p>
		<p><small>Search style 2 requires 300px width to display correct</small></p>
		<p>
			<label for="<?php echo $this->get_field_id('bgcol'); ?>">Background color for input field</label>
			<input class="widefat" id="<?php echo $this->get_field_id('bgcol'); ?>" name="<?php echo $this->get_field_name('bgcol'); ?>" type="text" value="<?php echo esc_attr($instance['bgcol']); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('bordercol'); ?>">Border color for input field</label>
			<input class="widefat" id="<?php echo $this->get_field_id('bordercol'); ?>" name="<?php echo $this->get_field_name('bordercol'); ?>" type="text" value="<?php echo esc_attr($instance['bordercol']); ?>" />
		</p>

<?php
	}
}
register_widget('search_widget');

/*
 * ABOUT WIDGET
 */
class about_widget extends WP_Widget {
	function about_widget() {
		$widget_ops = array( 'classname' => 'about_widget', 'description' => 'Display an "about" widget' );
		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'about_widget' );
		$this->WP_Widget( 'about_widget', 'Gabfire Widget : About', $widget_ops, $control_ops);	
	}
	
	function widget($args, $instance) {
		extract( $args );
		$title	= $instance['title'];
		$avatar	= $instance['a_avatar'] ? '1' : '0';
		$text	= $instance['a_text'];
		$link 	= $instance['a_link'];
		$anchor	= $instance['a_anchor'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			
			if($avatar) {
				echo '<div class="widget_avatar">' . get_avatar(get_bloginfo('admin_email'),'50') . '</div>';
			}	
			
			echo '<p>' . nl2br($text) . '</p><div class="clear"></div>';
				
			if($link) {
				echo '<span class="about_more"><a href="' . get_permalink($link) . '">'. $anchor . '</a></span>';
			}
			
		echo $after_widget; 
	}
	
	function update($new_instance, $old_instance) {  
		$instance['title']		= strip_tags($new_instance['title']);
		$instance['a_avatar']	= $new_instance['a_avatar'] ? '1' : '0';
		$instance['a_text'] 	= strip_tags($new_instance['a_text']);
		$instance['a_link'] 	= strip_tags($new_instance['a_link']);
		$instance['a_anchor'] 	= strip_tags($new_instance['a_anchor']); 
		return $new_instance;
	}
 
	function form($instance) {
		$defaults	= array( 'title' => 'About', 'a_avatar' => '1', 'a_text' => '', 'a_link' => '', 'a_anchor' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id( 'a_avatar' ); ?>">Site Admin's Avatar</label> 
		<select id="<?php echo $this->get_field_id( 'a_avatar' ); ?>" name="<?php echo $this->get_field_name( 'a_avatar' ); ?>">
			<option value="1" <?php if ( '1' == $instance['a_avatar'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['a_avatar'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
	</p>	
		
	<p>
		<label for="<?php echo $this->get_field_id('a_text'); ?>">About Text</label>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('a_text'); ?>" name="<?php echo $this->get_field_name('a_text'); ?>"><?php echo esc_attr($instance['a_text']); ?></textarea>
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('a_link'); ?>">Post or Page ID for link</label>
		<input id="<?php echo $this->get_field_id('a_link'); ?>" name="<?php echo $this->get_field_name('a_link'); ?>" type="text" value="<?php echo esc_attr( $instance['a_link'] ); ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('a_anchor'); ?>">Link label</label>
		<input class="widefat" id="<?php echo $this->get_field_id('a_anchor'); ?>" name="<?php echo $this->get_field_name('a_anchor'); ?>" type="text" value="<?php echo esc_attr($instance['a_anchor']); ?>" />
	</p>
<?php
	}
}
register_widget('about_widget');

/*
 * SOCIALIZE WIDGET
 */
class gab_social_widget extends WP_Widget {
	function gab_social_widget() {
		$widget_ops = array( 'classname' => 'gab_social_widget', 'description' => 'Display social icons on your site' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'gab_social_widget' );
		$this->WP_Widget( 'gab_social_widget', 'Gabfire Widget : Social', $widget_ops, $control_ops);	
	}
	function widget($args, $instance) {
		extract( $args );
		$title	= $instance['title'];
		$fbook_l	= $instance['fbook_l'];
		$tweet_l	= $instance['tweet_l'];
		$feed_l 	= $instance['feed_l'];
		$mspace_l	= $instance['mspace_l'];
		$picasa_l	= $instance['picasa_l'];
		$flickr_l	= $instance['flickr_l'];
		$lastfm_l	= $instance['lastfm_l'];
		$linkin_l	= $instance['linkin_l'];
		$ytube_l	= $instance['ytube_l'];
		$vimeo_l	= $instance['vimeo_l'];
		$digg_l	= $instance['digg_l'];
		$stumb_l	= $instance['stumb_l'];
		$devia_l	= $instance['devia_l'];
		$delic_l	= $instance['delic_l'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;	
			}
			
			if($fbook_l) { 
				echo '<a href="' . $fbook_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/facebook.png"'; echo ' title="Facebook" alt="Facebook" /></a>';
			}
			if($tweet_l) {
				echo '<a href="' . $tweet_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/twitter.png"'; echo ' title="Twitter" alt="Twitter" /></a>';
			}
			if($feed_l) {
				echo '<a href="' . $feed_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/feed.png"'; echo ' title="RSS" alt="RSS" /></a>';
			}
			if($mspace_l) {
				echo '<a href="' . $mspace_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/myspace.png"'; echo ' title="MySpace" alt="MySpace" /></a>';
			}
			if($picasa_l) {
				echo '<a href="' . $picasa_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/picasa.png"'; echo ' title="Picasa" alt="Picasa" /></a>';
			}
			if($flickr_l) {
				echo '<a href="' . $flickr_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/flickr.png"'; echo ' title="Flickr" alt="Flickr" /></a>';
			}
			if($lastfm_l) {
				echo '<a href="' . $lastfm_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/lastfm.png"'; echo ' title="LastFM" alt="LastFM" /></a>';
			}
			if($linkin_l) {
				echo '<a href="' . $linkin_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/linkedin.png"'; echo ' title="LinkedIn" alt="LinkedIn" /></a>';
			}
			if($ytube_l) {
				echo '<a href="' . $ytube_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/youtube.png"'; echo ' title="Youtube" alt="Youtube" /></a>';
			}
			if($vimeo_l) {
				echo '<a href="' . $vimeo_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/vimeo.png"'; echo ' title="Vimeo" alt="Vimeo" /></a>';
			}
			if($delic_l) {
				echo '<a href="' . $delic_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/delicious.png"'; echo ' title="Delicious" alt="Delicious" /></a>';
			}
			if($stumb_l) {
				echo '<a href="' . $stumb_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/stumbleupon.png"'; echo ' title="Stumble Upon" alt="Stumble Upon" /></a>';
			}
			if($devia_l) {
				echo '<a href="' . $devia_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/deviantart.png"'; echo ' title="Deviantart" alt="Deviantart" /></a>';
			}
			if($digg_l) {
				echo '<a href="' . $digg_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/digg.png"'; echo ' title="Digg" alt="Digg" /></a>';
			}
			echo '<div class="clear"></div>';
			
		echo $after_widget; 
	}
	
	function update($new_instance, $old_instance) { 
		$instance['title']	= strip_tags($new_instance['title']);
		$instance['fbook_l'] = strip_tags($new_instance['fbook_l']);
		$instance['tweet_l'] = strip_tags($new_instance['tweet_l']);
		$instance['feed_l']  = strip_tags($new_instance['feed_l']);
		$instance['mspace_l'] = strip_tags($new_instance['mspace_l']);
		$instance['picasa_l'] = strip_tags($new_instance['picasa_l']);
		$instance['flickr_l'] = strip_tags($new_instance['flickr_l']);
		$instance['lastfm_l'] = strip_tags($new_instance['lastfm_l']);
		$instance['linkin_l'] = strip_tags($new_instance['linkin_l']);
		$instance['ytube_l'] = strip_tags($new_instance['ytube_l']);
		$instance['vimeo_l'] = strip_tags($new_instance['vimeo_l']);
		$instance['digg_l'] = strip_tags($new_instance['digg_l']);
		$instance['stumb_l'] = strip_tags($new_instance['stumb_l']);
		$instance['devia_l'] = strip_tags($new_instance['devia_l']);
		$instance['delic_l'] = strip_tags($new_instance['delic_l']);
		return $new_instance;
	}
 
	function form($instance) {
		$defaults	= array( 'title' => 'Socialize', 'fbook' => '0', 'tweet' => '0', 'feed' => '0', 'mspace' => '0', 'picasa' => '0', 'flickr' => '0', 'lastfm' => '0', 'linkin' => '0');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
	?>

	<p>To disable a social icon, leave the link field empty below</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('fbook_l'); ?>">Link to Facebook account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('fbook_l'); ?>" name="<?php echo $this->get_field_name('fbook_l'); ?>" type="text" value="<?php echo esc_attr($instance['fbook_l']); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('tweet_l'); ?>">Link to Twitter account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('tweet_l'); ?>" name="<?php echo $this->get_field_name('tweet_l'); ?>" type="text" value="<?php echo esc_attr($instance['tweet_l']); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('feed_l'); ?>">RSS Feed Link</label>
		<input class="widefat" id="<?php echo $this->get_field_id('feed_l'); ?>" name="<?php echo $this->get_field_name('feed_l'); ?>" type="text" value="<?php echo esc_attr($instance['feed_l']); ?>" />
	</p>
				
	<p>
		<label for="<?php echo $this->get_field_id('mspace_l'); ?>">Link to Myspace account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('mspace_l'); ?>" name="<?php echo $this->get_field_name('mspace_l'); ?>" type="text" value="<?php echo esc_attr($instance['mspace_l']); ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('picasa_l'); ?>">Link to Picasa account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('picasa_l'); ?>" name="<?php echo $this->get_field_name('picasa_l'); ?>" type="text" value="<?php echo esc_attr($instance['picasa_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('flickr_l'); ?>">Link to Flickr account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('flickr_l'); ?>" name="<?php echo $this->get_field_name('flickr_l'); ?>" type="text" value="<?php echo esc_attr($instance['flickr_l']); ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('lastfm_l'); ?>">Link to Last.Fm account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('lastfm_l'); ?>" name="<?php echo $this->get_field_name('lastfm_l'); ?>" type="text" value="<?php echo esc_attr($instance['lastfm_l']); ?>" />
	</p>	
		
	<p>
		<label for="<?php echo $this->get_field_id('linkin_l'); ?>">Link to LinkedIn account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkin_l'); ?>" name="<?php echo $this->get_field_name('linkin_l'); ?>" type="text" value="<?php echo esc_attr($instance['linkin_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('ytube_l'); ?>">Link to Youtube account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('ytube_l'); ?>" name="<?php echo $this->get_field_name('ytube_l'); ?>" type="text" value="<?php echo esc_attr($instance['ytube_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('vimeo_l'); ?>">Link to Vimeo account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('vimeo_l'); ?>" name="<?php echo $this->get_field_name('vimeo_l'); ?>" type="text" value="<?php echo esc_attr($instance['vimeo_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('digg_l'); ?>">Link to Digg account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('digg_l'); ?>" name="<?php echo $this->get_field_name('digg_l'); ?>" type="text" value="<?php echo esc_attr($instance['digg_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('stumb_l'); ?>">Link to Stumble Upon account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('stumb_l'); ?>" name="<?php echo $this->get_field_name('stumb_l'); ?>" type="text" value="<?php echo esc_attr($instance['stumb_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('devia_l'); ?>">Link to Deviantart account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('devia_l'); ?>" name="<?php echo $this->get_field_name('devia_l'); ?>" type="text" value="<?php echo esc_attr($instance['devia_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('delic_l'); ?>">Link to Delicious account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('delic_l'); ?>" name="<?php echo $this->get_field_name('delic_l'); ?>" type="text" value="<?php echo esc_attr($instance['delic_l']); ?>" />
	</p>
	
<?php
	}
}
register_widget('gab_social_widget');

/*
 * ARCHIVE WIDGET
 */
class archive_widget extends WP_Widget {

	function archive_widget() {
		$widget_ops = array( 'classname' => 'archive_widget', 'description' => 'Search in Archive');
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'archive_widget' );
		$this->WP_Widget( 'archive_widget', 'Gabfire Widget : Archive', $widget_ops, $control_ops);
	}	
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$date	= $instance['date'];
		$cat	= $instance['cat'];
		$month	= $instance['month'];
		$google	= $instance['google'];
		$google_df	= $instance['google_df'];
		$bgcol	= $instance['bgcol'];
		
		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			?>
				<div id="gab_archive_wrapper" style="background:<?php echo esc_attr( $bgcol ); ?>">
					<span class="archive_span"><?php echo esc_attr( $date ); ?></span>
					<form class="arc-dropdown" action="<?php esc_url(bloginfo('url')); ?>"  method="get" > 		
						<select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> 
						<option value=""><?php echo esc_attr( $month ); ?></option> 
						<?php wp_get_archives('type=monthly&format=option&nwsp_post_count=1'); ?> </select>
					</form>
					
					<span class="archive_span"><?php echo esc_attr( $cat ); ?></span>
					<form class="arc-dropdown" action="<?php esc_url(bloginfo('url')); ?>"  method="get" > 
						<?php wp_dropdown_categories('orderby=Name&hierarchical=1&nwsp_count=1'); ?>
					</form>
					
					<script type="text/javascript"><!--
						var dropdown = document.getElementById("cat");
						function onCatChange() {
							if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
								location.href = "<?php echo esc_url(get_option('home')); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
							}
						}
						dropdown.onchange = onCatChange;
					--></script>
							
					<span class="archive_span"><?php echo esc_attr( $google ); ?></span>
					<form method="get" action="http://www.google.com/search">
						<input name="q" class="google" value="<?php echo esc_attr( $google_df ); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" /> 
						<input type="hidden" name="sitesearch" value="<?php esc_url(bloginfo('url')); ?>" />
					</form>		
				</div>
			<?php 		
		echo $after_widget; 
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['date'] = strip_tags($new_instance['date']);
		$instance['month'] = strip_tags($new_instance['month']);
		$instance['cat'] = strip_tags($new_instance['cat']);
		$instance['google'] = strip_tags($new_instance['google']);
		$instance['google_df'] = strip_tags($new_instance['google_df']);
		$instance['bgcol'] = strip_tags($new_instance['bgcol']);
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => 'Search in Archive', 'date' => 'Select a date','month' => 'Select month','bgcol' => '#fff', 'cat' => 'Select a category', 'google_df' => 'Write keyword and hit return', 'google' => 'Search with Google');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input class="widefat"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('date'); ?>">Date search string</label>
			<input class="widefat" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="text" value="<?php echo esc_attr($instance['date']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('month'); ?>">Month selectbox label</label>
			<input class="widefat" id="<?php echo $this->get_field_id('month'); ?>" name="<?php echo $this->get_field_name('month'); ?>" type="text" value="<?php echo esc_attr($instance['month']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>">Category search string</label>
			<input class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="text" value="<?php echo esc_attr($instance['cat']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('google'); ?>">Google search string</label>
			<input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($instance['google']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('google_df'); ?>">Google field input string</label>
			<input class="widefat" id="<?php echo $this->get_field_id('google_df'); ?>" name="<?php echo $this->get_field_name('google_df'); ?>" type="text" value="<?php echo esc_attr($instance['google_df']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('bgcol'); ?>">Background color (eg #fff or white)</label>
			<input class="widefat" id="<?php echo $this->get_field_id('bgcol'); ?>" name="<?php echo $this->get_field_name('bgcol'); ?>" type="text" value="<?php echo esc_attr($instance['bgcol']); ?>" />
		</p>
		
	<?php
	}
}
register_widget('archive_widget');

/*
 * MOST RECENT WIDGET
 */

class gab_tabs extends WP_Widget {
 
	function gab_tabs() {
		$widget_ops = array( 'classname' => 'gab_tabs', 'description' => 'Display recent entries and comments (ajax tab supported)' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'gab_tabs' );
		$this->WP_Widget( 'gab_tabs', 'Gabfire Widget : Ajax Tabs', $widget_ops, $control_ops);
	}
 
	function widget($args, $instance) {	  
		extract( $args );
		$title	= $instance['title'];
		$post_label	= $instance['post_label'];
		$popular_label	= $instance['popular_label'];
		$post_nr	= $instance['post_nr'];
		$comment_label	= $instance['comment_label'];
		$comment_nr	= $instance['comment_nr'];
		$popular_nr	= $instance['popular_nr'];
		$color_sch	= $instance['color_sch'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			?>
			
			<div id="<?php echo esc_attr( $color_scheme ); ?>">
				<ul class="tabs">
					<li><a href="#first"><?php echo esc_attr( $post_label ); ?></a></li>
					<li><a href="#third"><?php echo esc_attr( $popular_label ); ?></a></li>
					<li><a href="#second"><?php echo esc_attr( $comment_label ); ?></a></li>
				</ul>
				
				<div class="panes">
					<div>
						<ul>
							<?php
							$count=1;
							$args = array( 'posts_per_page'=> $post_nr, );						
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();
							?>
								<li>
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'source' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="pad"><?php the_title(); ?></a>
									<span class="block"><?php _e('on','source'); ?> <?php echo get_the_date('') ?> <?php _e('by','source'); ?> <?php the_author_posts_link(); ?> - <?php comments_popup_link(__('No Comment','source'), __('1 Comment','source'), __('% Comments','source'));?></span>
								</li>
							<?php $count++; endwhile; wp_reset_query(); ?>
						</ul>
					</div>
					
					<div>
						<ul>
							<?php
							$count=1;
							$args = array( 'posts_per_page'=> $comment_nr, 'orderby' => 'comment_count');						
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();
							?>
								<li>
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'source' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="pad"><?php the_title(); ?></a>
									<span class="block"><?php _e('on','source'); ?> <?php echo get_the_date('') ?> <?php _e('by','source'); ?> <?php the_author_posts_link(); ?> - <?php comments_popup_link(__('No Comment','source'), __('1 Comment','source'), __('% Comments','source'));?></span>
								</li>
							<?php $count++; endwhile; wp_reset_query(); ?>
						</ul>
					</div>
					

					<div>
						<?php the_widget('WP_Widget_Recent_Comments','title=&number='.$comment_nr ); ?> 
					</div>
				</div>
			</div>
	
			<?php 
			
		echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['post_label'] = strip_tags($new_instance['post_label']);
		$instance['post_nr'] = (int) $new_instance['post_nr'];  
		$instance['comment_label']	= strip_tags($new_instance['comment_label']);
		$instance['popular_label']	= strip_tags($new_instance['popular_label']);
		$instance['comment_nr'] 	= (int) $new_instance['comment_nr'];  
		$instance['popular_nr'] 	= (int) $new_instance['popular_nr']; 
		return $new_instance;
	}
 
	function form($instance) {
		$defaults = array( 'title' => 'Posts', 'post_label' => 'Latest', 'comment_label' => 'Comments','popular_label' => 'Popular', 'post_nr' => '5', 'comment_nr' => '5','popular_nr' => '5' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('post_label'); ?>">Posts tab label</label>
			<input class="widefat" id="<?php echo $this->get_field_id('post_label'); ?>" name="<?php echo $this->get_field_name('post_label'); ?>" type="text" value="<?php echo esc_attr($instance['post_label']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('comment_label'); ?>">Comments tab label</label>
			<input class="widefat" id="<?php echo $this->get_field_id('comment_label'); ?>" name="<?php echo $this->get_field_name('comment_label'); ?>" type="text" value="<?php echo esc_attr($instance['comment_label']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('popular_label'); ?>">Popular tab label</label>
			<input class="widefat" id="<?php echo $this->get_field_id('popular_label'); ?>" name="<?php echo $this->get_field_name('popular_label'); ?>" type="text" value="<?php echo esc_attr($instance['popular_label']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name( 'post_nr' ); ?>">Number of posts</label>
			<select id="<?php echo $this->get_field_id( 'post_nr' ); ?>" name="<?php echo $this->get_field_name( 'post_nr' ); ?>">			
			<?php
				for ( $i = 1; $i <= 15; ++$i )
				echo "<option value='$i' " . ( $instance['post_nr'] == $i ? "selected='selected'" : '' ) . ">$i</option>";
			?>
			</select>
		</p>	
		
		<p>
			<label for="<?php echo $this->get_field_name( 'comment_nr' ); ?>">Number of Comments</label>
			<select id="<?php echo $this->get_field_id( 'comment_nr' ); ?>" name="<?php echo $this->get_field_name( 'comment_nr' ); ?>">			
			<?php
				for ( $i = 1; $i <= 15; ++$i )
				echo "<option value='$i' " . ( $instance['comment_nr'] == $i ? "selected='selected'" : '' ) . ">$i</option>";
			?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name( 'popular_nr' ); ?>">Number of Popular Posts</label>
			<select id="<?php echo $this->get_field_id( 'popular_nr' ); ?>" name="<?php echo $this->get_field_name( 'popular_nr' ); ?>">			
			<?php
				for ( $i = 1; $i <= 15; ++$i )
				echo "<option value='$i' " . ( $instance['popular_nr'] == $i ? "selected='selected'" : '' ) . ">$i</option>";
			?>
			</select>
		</p>
<?php
	}
}
register_widget('gab_tabs');

/*
 * SHARE WIDGET
 */
class gab_share_widget extends WP_Widget {
	function gab_share_widget() {
		$widget_ops = array( 'classname' => 'gab_share_widget', 'description' => 'Display share icons for entries' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'gab_share_widget' );
		$this->WP_Widget( 'gab_share_widget', 'Gabfire Widget : Share Items', $widget_ops, $control_ops);	
	}
	function widget($args, $instance) {
		extract( $args );
		$title	= $instance['title'];
		$boxtweet	= $instance['boxtweet'] ? '1' : '0';
		$boxg1	= $instance['boxg1'] ? '1' : '0';
		$boxlike	= $instance['boxlike'] ? '1' : '0';
		$fbook	= $instance['fbook'] ? '1' : '0';
		$tweet	= $instance['tweet'] ? '1' : '0';
		$email 	= $instance['email'] ? '1' : '0';
		$blogger	= $instance['blogger'] ? '1' : '0';
		$dlc	= $instance['dlc'] ? '1' : '0';
		$digg	= $instance['digg'] ? '1' : '0';
		$google	= $instance['google'] ? '1' : '0';
		$myspace	= $instance['myspace'] ? '1' : '0';
		$supon	= $instance['supon'] ? '1' : '0';
		$yahoo	= $instance['yahoo'] ? '1' : '0';
		$reddit	= $instance['reddit'] ? '1' : '0';
		$tech	= $instance['tech'] ? '1' : '0';
		$rss	= $instance['rss'] ? '1' : '0';

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;	
			}
			if($boxtweet) {
				echo '<span class="gab_share_twitter"><a href="http://twitter.com/share?url='. urlencode(wp_get_shortlink()) .'&amp;counturl='; urlencode(the_permalink()); 
				echo '" class="twitter-share-button" data-count="horizontal" data-via="<?php echo $twitteruser; ?>">';
				_e('Tweet', 'source'); 
				echo '</a></span><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
			}
			if($boxg1) {
				echo '<span class="gab_share_google1"><g:plusone size="medium"></g:plusone></span>';
			}
			if($boxlike) {
				echo '<span class="gab_share_facebook"><object data="http://www.facebook.com/plugins/like.php?href='; the_permalink(); echo  '&amp;show_faces=false&amp;action=like&amp;layout=button_count&amp;font=arial&amp;colorscheme=light" style="border:none; overflow:hidden; width:110px; height:20px;"></object></span>';
			}
			echo '<div class="share-separator"></div>';
			if($fbook) {
				echo '<a rel="nofollow" href="http://www.facebook.com/share.php?u='.wp_get_shortlink().'&t='.$gab_share_posttitle.'" title="'; _e('Share on Facebook' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/facebook.png" alt="" /></a>';			
			}
			if($tweet) {
				echo '<a rel="nofollow" href="http://twitter.com/home?status='.wp_get_shortlink().'" title="'; _e('Share on Twitter' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/twitter.png" alt="" /></a>';
			}
			if($email) {
				echo '<a rel="nofollow" href="http://www.freetellafriend.com/tell/?heading=Share+This+Article&bg=1&option=email&url='.wp_get_shortlink().'" title="'; _e('Email a Friend' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/email.png" alt="" /></a>';
			}
			if($dlc) {
				echo '<a rel="nofollow" href="http://del.icio.us/post?url='.wp_get_shortlink().'&title='.$gab_share_posttitle.'" title="'; _e('Share on Delicious' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/delicious.png" alt="" /></a>';
			}
			if($digg) {
				echo '<a rel="nofollow" href="http://digg.com/submit?url='.wp_get_shortlink().'&title='.$gab_share_posttitle.'" title="'; _e('Share on Digg' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/digg.png" alt="" /></a>';
			}
			if($google) {
				echo '<a rel="nofollow" href="http://www.google.com/bookmarks/mark?op=add&bkmk='.wp_get_shortlink().'&title='.$gab_share_posttitle.'" title="'; _e('Share on Google' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/google.png" alt="" /></a>';
			}
			if($supon) {
				echo '<a rel="nofollow" href="http://www.stumbleupon.com/submit?url='.wp_get_shortlink().'&title='.$gab_share_posttitle.'" title="'; _e('Share on StumbleUpon' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/stumbleupon.png" alt="" /></a>';
			}
			if($reddit) {
				echo '<a rel="nofollow" href="http://reddit.com/submit?url='.wp_get_shortlink().'&title='.$gab_share_posttitle.'" title="'; _e('Share on Reddit' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/reddit.png" alt="" /></a>';
			}
			if($tech) {
				echo '<a rel="nofollow" href="http://technorati.com/faves?sub=favthis&add='.wp_get_shortlink().'" title="'; _e('Share on Technorati' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/technorati.png" alt="" /></a>';
			}
			if($yahoo) {
				echo '<a rel="nofollow" href="http://buzz.yahoo.com/buzz?targetUrl='.wp_get_shortlink().'&headline='.$gab_share_posttitle.'" title="'; _e('Share on Yahoo' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/yahoo.png" alt="" /></a>';
			}
			if($blogger) {
				echo '<a rel="nofollow" href="http://www.blogger.com/blog_this.pyra?t&u='.wp_get_shortlink().'&n='.$gab_share_posttitle.'&pli=1" title="'; _e('Share on Blogger' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/blogger.png" alt="" /></a>';
			}
			if($myspace) {
				echo '<a rel="nofollow" href="http://www.myspace.com/Modules/PostTo/Pages/?u='.wp_get_shortlink().'&t='.$gab_share_posttitle.'&c='.wp_get_shortlink().'" title="'; _e('Share on Myspace' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/myspace.png" alt="" /></a>';
			}
			if($rss) {
				echo '<a rel="nofollow" href="'.get_post_comments_feed_link($post->ID) .'" title="'; _e('RSS Feed' , 'source'); echo' "><img src="'; bloginfo('template_url'); echo '/images/framework/share/rss.png"  alt="" /></a>';
			}
			echo '<div class="clear"></div>';
			
		echo $after_widget; 
	}
	
	function update($new_instance, $old_instance) { 
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['boxtweet']	= $new_instance['boxtweet'];
		$instance['boxg1']	= $new_instance['boxg1'];
		$instance['boxlike']	= $new_instance['boxlike'];
		$instance['fbook'] = $new_instance['fbook'] ? '1' : '0';
		$instance['tweet'] = $new_instance['tweet'] ? '1' : '0';
		$instance['email'] = $new_instance['email'] ? '1' : '0';
		$instance['blogger']  = $new_instance['blogger'] ? '1' : '0';
		$instance['dlc'] = $new_instance['dlc'] ? '1' : '0';
		$instance['digg'] = $new_instance['digg'] ? '1' : '0';
		$instance['google'] = $new_instance['google'] ? '1' : '0';
		$instance['myspace'] = $new_instance['myspace'] ? '1' : '0';
		$instance['supon'] = $new_instance['supon'] ? '1' : '0';
		$instance['yahoo'] = $new_instance['yahoo'] ? '1' : '0';
		$instance['reddit'] = $new_instance['reddit'] ? '1' : '0';
		$instance['tech'] = $new_instance['tech'] ? '1' : '0';
		$instance['rss'] = $new_instance['rss'] ? '1' : '0';
		return $new_instance;
	}
 
	function form($instance) {
		$defaults	= array( 'title' => 'Share This Post', 'boxtweet' => '1', 'boxg1' => '1', 'boxlike' => '1', 'fbook' => '1', 'tweet' => '1', 'email' => '1', 'blogger' => '1', 'dlc' => '1', 'digg' => '1', 'google' => '1', 'myspace' => '1', 'supon' => '1', 'yahoo' => '1', 'reddit' => '1', 'tech' => '1', 'rss' => '1');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>
	
	<p>
		<select id="<?php echo $this->get_field_id( 'boxtweet' ); ?>" name="<?php echo $this->get_field_name( 'boxtweet' ); ?>">
			<option value="1" <?php if ( '1' == $instance['boxtweet'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['boxtweet'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'boxtweet' ); ?>">Twitter Box</label> 
	</p>	
	
	<p>
		<select id="<?php echo $this->get_field_id( 'boxg1' ); ?>" name="<?php echo $this->get_field_name( 'boxg1' ); ?>">
			<option value="1" <?php if ( '1' == $instance['boxg1'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['boxg1'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'boxg1' ); ?>">Google +1 Box</label> 
	</p>	
	
	<p>
		<select id="<?php echo $this->get_field_id( 'boxlike' ); ?>" name="<?php echo $this->get_field_name( 'boxlike' ); ?>">
			<option value="1" <?php if ( '1' == $instance['boxlike'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['boxlike'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'boxlike' ); ?>">Facebook Like Box</label> 
	</p>	
	
	<p>
		<select id="<?php echo $this->get_field_id( 'fbook' ); ?>" name="<?php echo $this->get_field_name( 'fbook' ); ?>">
			<option value="1" <?php if ( '1' == $instance['fbook'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['fbook'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'fbook' ); ?>">Share on Facebook</label> 
	</p>		
	
	<p>
		<select id="<?php echo $this->get_field_id( 'tweet' ); ?>" name="<?php echo $this->get_field_name( 'tweet' ); ?>">
			<option value="1" <?php if ( '1' == $instance['tweet'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['tweet'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'tweet' ); ?>">Share on Twitter</label> 
	</p>	
	
	<p>
		<select id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>">
			<option value="1" <?php if ( '1' == $instance['email'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['email'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'email' ); ?>">Send as Email</label> 
	</p>	
	
	<p>
		<select id="<?php echo $this->get_field_id( 'dlc' ); ?>" name="<?php echo $this->get_field_name( 'dlc' ); ?>">
			<option value="1" <?php if ( '1' == $instance['dlc'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['dlc'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'dlc' ); ?>">Bookmark on Delicious</label> 
	</p>	
	
	<p>
		<select id="<?php echo $this->get_field_id( 'digg' ); ?>" name="<?php echo $this->get_field_name( 'digg' ); ?>">
			<option value="1" <?php if ( '1' == $instance['digg'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['digg'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'digg' ); ?>">Share on Digg</label> 
	</p>	
	
	<p>
		<select id="<?php echo $this->get_field_id( 'google' ); ?>" name="<?php echo $this->get_field_name( 'google' ); ?>">
			<option value="1" <?php if ( '1' == $instance['google'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['google'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'google' ); ?>">Share on Google</label> 
	</p>	
	
	<p>
		<select id="<?php echo $this->get_field_id( 'supon' ); ?>" name="<?php echo $this->get_field_name( 'supon' ); ?>">
			<option value="1" <?php if ( '1' == $instance['supon'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['supon'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'supon' ); ?>">Share on Stumbleupon</label> 
	</p>

	<p>
		<select id="<?php echo $this->get_field_id( 'reddit' ); ?>" name="<?php echo $this->get_field_name( 'reddit' ); ?>">
			<option value="1" <?php if ( '1' == $instance['reddit'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['reddit'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'reddit' ); ?>">Share on Reddit</label> 
	</p>

	<p>
		<select id="<?php echo $this->get_field_id( 'tech' ); ?>" name="<?php echo $this->get_field_name( 'tech' ); ?>">
			<option value="1" <?php if ( '1' == $instance['tech'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['tech'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'tech' ); ?>">Share on Technorati</label> 
	</p>
	
	<p>
		<select id="<?php echo $this->get_field_id( 'yahoo' ); ?>" name="<?php echo $this->get_field_name( 'yahoo' ); ?>">
			<option value="1" <?php if ( '1' == $instance['yahoo'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['yahoo'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'yahoo' ); ?>">Share on Yahoo</label> 
	</p>
	
	<p>
		<select id="<?php echo $this->get_field_id( 'blogger' ); ?>" name="<?php echo $this->get_field_name( 'blogger' ); ?>">
			<option value="1" <?php if ( '1' == $instance['blogger'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['blogger'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'blogger' ); ?>">Share on Blogger</label> 
	</p>		
	
	<p>
		<select id="<?php echo $this->get_field_id( 'myspace' ); ?>" name="<?php echo $this->get_field_name( 'myspace' ); ?>">
			<option value="1" <?php if ( '1' == $instance['myspace'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['myspace'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'myspace' ); ?>">Share on MySpace</label> 
	</p>
	<p>
		<select id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>">
			<option value="1" <?php if ( '1' == $instance['rss'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['rss'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
		<label for="<?php echo $this->get_field_id( 'rss' ); ?>">Display Comments RSS</label> 
	</p>
	
<?php
	}
}
register_widget('gab_share_widget');

add_action( 'widgets_init', 'my_unregister_widgets' );

function my_unregister_widgets() {
	unregister_widget( 'WP_Widget_Search' );
}
