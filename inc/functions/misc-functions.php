<?php
// Add feed links to header
add_theme_support('automatic-feed-links');

// Add custom menu support
add_theme_support( 'menus' );

// Add post thumbnail support
add_theme_support('post-thumbnails');

// Add custom background support
add_custom_background();

// Add custom navigation support
register_nav_menus(array(
	'primary-navigation' => 'Primary',
	'secondary-navigation' => '(if available) Secondary',
	'masthead' => '(if available) Masthead',
));

/* Define the location of Widget
 * and display the name of widget to site admin
 */
function gab_dynamic_sidebar($widgetname)
{
  dynamic_sidebar($widgetname);  
  if((get_option('of_widget') == 'true') and is_user_logged_in() ) { 
    echo '<span class="widgetname">'.$widgetname.'</span>'; 
  }  
}

//do not display "no categories" string
function bm_dont_display_it($dont_display) {
  if (!empty($dont_display)) {
    $dont_display = str_ireplace('<li>' .__( "No categories" ). '</li>', "", $dont_display);
  }
  return $dont_display;
}
add_filter('wp_list_categories','bm_dont_display_it');

/* ***************************** */
/* GABFIRE TITLE */
/* ***************************** */
function gab_title() {
	global $page, $paged;
	if ( is_home() ) { bloginfo('name'); echo ' | '; bloginfo('description'); } 
	elseif ( is_search() ) { bloginfo('name'); echo ' | '; _e('Search Results', 'source');  }  
	elseif ( is_author() ) { bloginfo('name'); echo ' | '; _e('Author Archives', 'source');  }
	elseif ( is_page() ) {  bloginfo('name'); echo ' | '; wp_title('');  }
	elseif ( is_single() ) { wp_title(''); echo ' | '; bloginfo('name');  }
	elseif ( is_category() ) { bloginfo('name'); echo ' | '; _e('Archive', 'source'); echo ' | '; single_cat_title();  } 
	elseif ( is_month() ) { bloginfo('name'); echo ' | '; _e('Archive', 'source'); echo ' | '; the_time('F');  }	
	elseif ( is_tag() ) {  bloginfo('name'); echo ' | '; _e('Tag Archive', 'source'); echo ' | ';  single_tag_title("", true); }     
	else { wp_title(''); echo ' | '; bloginfo('name');  }	

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __('%s'), max( $paged, $page ) );	
}

/* ***************************** */
/* CATCH FIRST IMAGE */
/* ***************************** */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  return $first_img;
}

/* ***************************** */
/* GET CURRENT CATEGORY ID */
/* ***************************** */
function current_catID() {
	global $wp_query,  $cat_obj, $currentcat;

	if (is_category()) {	
		$cat_obj = $wp_query->get_queried_object();
		$currentcat = $cat_obj->term_id;
	} 
	elseif (is_single()) {
		$category = get_the_category();
		$currentcat = $category[0]->cat_ID;
	}
	
	return $currentcat;
}

/* GALLERY CATEGORY LINKS */
function gab_gallery_nav() {
	if (!is_home()) {
		if((is_tax('gallery-cat') or is_post_type_archive('gab_gallery')) ) { ?>
			<ul id="subpagelinks" class="dropdown">
				<?php wp_list_categories('taxonomy=gallery-cat&hide_empty=0&title_li='); ?>
			</ul>	
			<div class="clear"></div>
		<?php }
	}
}

/* ***************************** */
/* LIMIT POST EXCERPT */
/* ***************************** */
function string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/* ***************************** */
/* GENERATE POST META */
/* ***************************** */
function gab_permalink() { /* We first create a function to get the post permalink with read more anchor */
	echo ' / <a href="'; the_permalink(); echo '" title="'; printf( esc_attr__( 'Permalink to %s', 'source' ), the_title_attribute( 'echo=0' ) ); echo'" rel="bookmark">'; esc_attr_e('Read More', 'source'); echo '</a>';
}
// execute post meta
function gab_postmeta($date = true,$comment = true,$permalink = true,$edit  = true) {
	echo '<span class="postmeta">';
		echo (true === $date) ? get_the_date() . ' / ' : "";
		(true === $comment) ? comments_popup_link(__('No Comment','source'), __('1 Comment','source'), __('% Comments','source')) : "";
		echo (true === $permalink) ?  gab_permalink() : "";
		(true === $edit) ? edit_post_link(__('#','source'),' ','') : "";
	echo '</span>';
}

/* ***************************** */
/* PAGINATION - http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin */
/* ***************************** */
function pagination($pages = "", $range = 2)
{
     $showitems = ($range * 2)+1; 
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == "")
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
 
     if(1 != $pages)
     {
         echo '<div class="numbered-pagination"><span>'; _e('Page','source'); echo ' ' . $paged . ' '; _e('of','source'); echo ' ' . $pages.'</span>';
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
			echo '<a class="pagi-first" href="'.get_pagenum_link(1).'">&laquo; '; _e('First', 'source'); echo '</a>';
		}
         if($paged > 1 && $showitems < $pages) {
			echo '<a class="pagi-prev" href="'.get_pagenum_link($paged - 1).'">&lsaquo; '; _e('Previous', 'source'); echo '</a>';
		}
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? '<span class=\'current\'>'.$i.'</span>':'<a href="'.get_pagenum_link($i).'" class=\'inactive\'>'.$i.'</a>';
             }
         }
 
         if ($paged < $pages && $showitems < $pages) { 
			echo '<a class="pagi-next" href=\''.get_pagenum_link($paged + 1).'\'>'; _e('Next', 'source'); echo ' &rsaquo;</a>'; 
		}
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) {
			echo '<a class="pagi-last" href="'.get_pagenum_link($pages).'">'; _e('Last', 'source'); echo ' &raquo;</a>'; 
		}
         echo '<div class="clear"></div></div>';
     }
}