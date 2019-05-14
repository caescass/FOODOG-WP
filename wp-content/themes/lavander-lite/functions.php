<?php
add_action( 'after_setup_theme', 'lavander_theme_setup' );
function lavander_theme_setup() {
	/*woocommerce support*/
	add_theme_support( 'post-formats', array( 'link', 'gallery', 'video' , 'audio', 'quote') );
	/*feed support*/
	add_theme_support( 'automatic-feed-links' );
	/*post thumb support*/
	add_theme_support( 'post-thumbnails' ); // this enable thumbnails and stuffs
	/*title*/
	add_theme_support( 'title-tag' );
	/*lang*/
	load_theme_textdomain( 'lavander', get_template_directory() . '/lang' );
	/*setting thumb size*/
	add_image_size( 'lavander-gallery', 120,80, true ); 
	add_image_size( 'lavander-widget', 255,170, true );
	add_image_size( 'lavander-postBlock', 1160, 770, true );
	add_image_size( 'lavander-related', 345,230, true );
	add_image_size( 'lavander-postGridBlock', 590,390, true );
	add_image_size( 'lavander-postGridBlock-2', 590,437, true );	


	register_nav_menus(array(
	
			'lavander_mainmenu' => esc_html__('Main Menu','lavander'),
			'lavander_respmenu' => esc_html__('Responsive Menu','lavander'),	
			'lavander_scrollmenu' => esc_html__('Scroll Menu','lavander'),	
			
	));	
		
		
    register_sidebar(array(
        'id' => 'lavander_sidebar',
        'name' => esc_html__('Sidebar main','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	

    register_sidebar(array(
        'id' => 'dremscape-sidebar-under-header-left',
        'name' => esc_html__('Sidebar under header left','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
		
    register_sidebar(array(
        'id' => 'lavander-sidebar-under-header-right',
        'name' => esc_html__('Sidebar under header right','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
    register_sidebar(array(
        'id' => 'lavander-sidebar-under-header-fullwidth',
        'name' => esc_html__('Sidebar under header full width','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
	
	
    register_sidebar(array(
        'id' => 'lavander-sidebar-footer-fullwidth',
        'name' => esc_html__('Sidebar above footer full width','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
    register_sidebar(array(
        'id' => 'lavander-sidebar-footer-left',
        'name' => esc_html__('Sidebar above footer left','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
		
    register_sidebar(array(
        'id' => 'lavander-sidebar-footer-right',
        'name' => esc_html__('Sidebar above footer right','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));			

    register_sidebar(array(
        'id' => 'lavander_sidebar-top-left',
        'name' => esc_html__('Top sidebar left','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));		  

    register_sidebar(array(
        'id' => 'lavander_sidebar-top-right',
        'name' => esc_html__('Top sidebar right','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));		
		
 
    register_sidebar(array(
        'id' => 'lavander_sidebar-logo',
        'name' => esc_html__('Sidebar for advert in logo area','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));		
		
    register_sidebar(array(
        'id' => 'lavander_footer1',
        'name' => esc_html__('Footer sidebar 1','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'id' => 'lavander_footer2',
        'name' => esc_html__('Footer sidebar 2','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
	
    
    register_sidebar(array(
        'id' => 'lavander_footer3',
        'name' => esc_html__('Footer sidebar 3','lavander'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
	
	
	// Responsive walker menu
	class lavander_Walker_Responsive_Menu extends Walker_Nav_Menu {
		
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
			global $wp_query;		
			$item_output = $attributes = $prepend ='';
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = join( ' ', apply_filters( '', array_filter( $classes ), $item ) );			
			$class_names = ' class="'. esc_attr( $class_names ) . '"';			   
			// Create a visual indent in the list if we have a child item.
			$visual_indent = ( $depth ) ? str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle"></i>', $depth) : '';
			// Load the item URL
			$attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url ) .'"' : '';
			// If we have hierarchy for the item, add the indent, if not, leave it out.
			// Loop through and output each menu item as this.
			if($depth != 0) {
				$item_output .= '<a '. $class_names . $attributes .'>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle"></i>' . $item->title. '</a><br>';
			} else {
				$item_output .= '<a ' . $class_names . $attributes .'><strong>'.$prepend.$item->title.'</strong></a><br>';
			}
			// Make the output happen.
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	
	
	// Main walker menu	
	class lavander_Walker_Main_Menu extends Walker_Nav_Menu
	{		
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		   $this->curItem = $item;
		   global $wp_query;
		   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		   $class_names = $value = '';
		   $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		   $class_names = ' class="'. esc_attr( $class_names ) . '"';
		   $image  = ! empty( $item->custom )     ? ' <img src="'.esc_attr($item->custom).'">' : '';
		   $output .= $indent . '<li id="menu-item-'.rand(0,9999).'-'. $item->ID . '"' . $value . $class_names .'>';
		   $attributes_title  = ! empty( $item->attr_title ) ? ' <i class="fa '  . esc_attr( $item->attr_title ) .'"></i>' : '';
		   $attributes  = ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		   $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		   $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		   $prepend = '';
		   $append = '';
		   if($depth != 0)
		   {
				$append = $prepend = '';
		   }
			$item_output = $args->before;
			$item_output .= '<a '. $attributes .'>';
			$item_output .= $attributes_title.$args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
			$item_output .= $args->link_after;
			$item_output .= '</a>';	
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	
	

}

define('BOX_PATH', get_template_directory() . '/includes/boxes/');
define('OPTIONS', 'of_options_pmc'); // Name of the database row where your options are stored
/*theme options*/
require( get_template_directory()  . '/option-tree/assets/theme-mode/functions.php' );

require_once (get_template_directory() . '/option-tree/import/plugins/options-importer.php');   // Options panel settings and custom settings
add_option('IMPORT_LAVANDER_OPTION_4', 'false');
add_option('IMPORT_OLD_OPTIONS', 'false');


if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//Call action that sets
	if(get_option('IMPORT_LAVANDER_OPTION_4') == 'false'){
		import(get_template_directory() . '/option-tree/import/options.json');
		lavander_options('default-layout-sidebar');
		update_option('IMPORT_LAVANDER_OPTION_4', 'true');
		update_option('IMPORT_OLD_OPTIONS', 'true' );
		wp_redirect(  esc_url_raw(admin_url( 'themes.php?page=ot-theme-options#section_import' )) );
	}
	else{
		wp_redirect(  esc_url_raw(admin_url( 'themes.php?page=ot-theme-options' )) );
	}
}

// Build Options

$includes =  get_template_directory() . '/includes/';
$widget_includes =  get_template_directory() . '/includes/widgets/';
/* include custom widgets */
require_once ($widget_includes . 'recent_post_widget.php'); 
require_once ($widget_includes . 'popular_post_widget.php');
require_once ($widget_includes . 'social_widget.php');
require_once ($widget_includes . 'post_widget.php');
require_once ($widget_includes . 'post_slider_widget.php');
require_once ($widget_includes . 'video_widget.php');
/* include scripts */
function lavander_scripts() {
	/*scripts*/
	wp_enqueue_script('fitvideos', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'),true,false);	
	wp_enqueue_script('retinaimages', get_template_directory_uri() . '/js/retina.min.js', array('jquery'),true,true);	
	wp_enqueue_script('scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.js', array('jquery'),true,true);	
	wp_enqueue_script('lavander_customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'),true,true);  	     
	wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'),true,true);
	wp_enqueue_script('cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array('jquery'),true,true);		
	wp_register_script('news', get_template_directory_uri() . '/js/jquery.li-scroller.1.0.js', array('jquery'),true,true);  
	wp_enqueue_script('gistfile', get_template_directory_uri() . '/js/gistfile_pmc.js', array('jquery') ,true,true);  
	wp_enqueue_script('bxSlider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery') ,true,false);  	
	wp_enqueue_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery') ,true,true);  
	wp_enqueue_script('infinity', get_template_directory_uri() . '/js/pmc_infinity.js', array('jquery') ,true,false);  	
	$share_options = ot_get_option( 'single_display_share_select' );
	if(!empty($share_options[0])){	
		wp_enqueue_script('addthis', 'https://s7.addthis.com/js/300/addthis_widget.js', array('jquery') ,true,false); 
	}
	if ( is_singular() && get_option( 'thread_comments' ) ) {wp_enqueue_script( 'comment-reply' ); }
	wp_enqueue_script('jquery-ui-tabs');
	/*style*/
	
	wp_enqueue_style( 'lavander-style', get_template_directory_uri() . '/style.css' );

	$css_dir = get_template_directory() . '/css/'; // Shorten code, save 1 call
	ob_start(); // Capture all output (output buffering)
	require($css_dir . 'style_options.php'); // Generate CSS
	$css = ob_get_clean(); // Get generated CSS (output buffering)
    wp_add_inline_style( 'lavander-style', $css );

	wp_enqueue_script('font-awesome_pms', 'https://use.fontawesome.com/30ede005b9.js' , '',null);				
}
add_action( 'wp_enqueue_scripts', 'lavander_scripts' );
require_once ($includes . 'class-tgm-plugin-activation.php');

/*shorcode to excerpt*/
remove_filter( 'get_the_excerpt', 'wp_trim_excerpt'  ); //Remove the filter we don't want
add_filter( 'get_the_excerpt', 'lavander_wp_trim_excerpt' ); //Add the modified filter
add_filter( 'the_excerpt', 'do_shortcode' ); //Make sure shortcodes get processed


function lavander_wp_trim_excerpt($text = '') {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
		//$text = strip_shortcodes( $text ); //Comment out the part we don't want
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$excerpt_length = apply_filters('excerpt_length', 900);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}

/*add boxed to body class*/

add_filter('body_class','lavander_body_class');

function lavander_body_class($classes) {
	$lavander_data = get_option(OPTIONS);
	$class = '';
	if(!empty($lavander_data['use_boxed'])){
		$classes[] = 'lavander_boxed';
	}
	return $classes;
}

/* custom breadcrumb */
function lavander_breadcrumb($title = false) {
	$lavander_data = get_option(OPTIONS);
	$breadcrumb = '';
	if (!is_home()) {
		if($title == false){
			$breadcrumb .= '<a href="';
			$breadcrumb .=  esc_url(home_url('/'));
			$breadcrumb .=  '">';
			$breadcrumb .= esc_html__('Home', 'lavander');
			$breadcrumb .=  "</a> &#187; ";
		}
		if (is_single()) {
			if (is_single()) {
				$name = '';
				if($title == false){
					$breadcrumb .= $name .' &#187; <span>'. get_the_title().'</span>';
				}
				else{
					$breadcrumb .= get_the_title();
				}
			}	
		} elseif (is_page()) {
			$breadcrumb .=  '<span>'.get_the_title().'</span>';
		}
		else if(is_tag()){
			$tag = get_query_var('tag');
			$tag = str_replace('-',' ',$tag);
			$breadcrumb .=  '<span>'.$tag.'</span>';
		}
		else if(is_search()){
			$breadcrumb .= esc_html__('Search results for ', 'lavander') .'"<span>'.get_search_query().'</span>"';			
		} 
		else if(is_category()){
			$cat = get_query_var('cat');
			$cat = get_category($cat);
			$breadcrumb .=  '<span>'.$cat->name.'</span>';
		}
		else if(is_archive()){
			$breadcrumb .=  '<span>'.esc_html__('Archive','lavander').'</span>';
		}	
		else{
			$breadcrumb .=  esc_html__('Home','lavander');
		}

	}
	return $breadcrumb ;
}
/* social share links */
function lavander_socialLinkSingle($link,$title) {
	$social = '';
	$social  .= '<div class="addthis_toolbox">';
	$social .= '<div class="custom_images">';
	$share_options = ot_get_option( 'single_display_share_select' );
	if(!empty($share_options[0])){
	$social .= '<a class="addthis_button_facebook" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'" ><i class="fa fa-facebook"></i></a>';
	}
	if(!empty($share_options[1])){
	$social .= '<a class="addthis_button_twitter" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-twitter"></i></a>';  
	}
	if(!empty($share_options[2])){
	$social .= '<a class="addthis_button_pinterest_share" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-pinterest"></i></a>'; 
	}
	if(!empty($share_options[3])){
	$social .= '<a class="addthis_button_google_plusone_share" addthis:url="'.esc_url($link).'" g:plusone:count="false" addthis:title="'.esc_attr($title).'"><i class="fa fa-google-plus"></i></a>'; 	
	}
	if(!empty($share_options[4])){
	$social .= '<a class="addthis_button_stumbleupon" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-stumbleupon"></i></a>';
	}
	if(!empty($share_options[5])){
	$social .= '<a class="addthis_button_vk" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-vk"></i></a>';
	}	
	if(!empty($share_options[6])){
	$social .= '<a class="addthis_button_whatsapp" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-whatsapp"></i></a>';
	}	
	$social .='</div>';	
	$social .= '</div>'; 
	echo $social;
	
	
}
/* links to social profile */
function lavander_socialLink() {
	$social = '';
	$lavander_data = get_option(OPTIONS); 
	$icons = $lavander_data['socialicons'];
	if(is_array($icons)){
		foreach ($icons as $icon){
			$social .= '<a target="_blank"  href="'.esc_url($icon['link']).'" title="'.esc_attr($icon['title']).'"><i class="fa '.esc_attr($icon['url']).'"></i></a>';	
		}
	}
	echo $social;
}

/* remove double // char */
function lavander_stripText($string) 
{ 
    return str_replace("\\",'',$string);
} 
	
/* custom post types */	
add_action('save_post', 'lavander_update_post_type');
add_action("admin_init", "lavander_add_meta_box");



function lavander_add_meta_box(){
	add_meta_box("lavander_post_type", "Lavander options", "lavander_post_type", "post", "normal", "high");	
	
}	



function lavander_post_type(){
	global $post;
	$lavander_data = get_post_custom(get_the_id());

	if (isset($lavander_data["video_post_url"][0])){
		$video_post_url = $lavander_data["video_post_url"][0];
	}else{
		$video_post_url = "";
	}	
	
	if (isset($lavander_data["link_post_url"][0])){
		$link_post_url = $lavander_data["link_post_url"][0];
	}else{
		$link_post_url = "";
	}	
	
	if (isset($lavander_data["audio_post_url"][0])){
		$audio_post_url = $lavander_data["audio_post_url"][0];
	}else{
		$audio_post_url = "";
	}


?>
    <div id="portfolio-category-options">
        <table cellpadding="15" cellspacing="15">		
            <tr class="videoonly">
            	<td><label><?php esc_attr_e('Video URL(*required) - add if you select video post:','lavander'); ?> </label><br><input name="video_post_url" value="<?php echo esc_attr($video_post_url); ?>" /> </td>	
			</tr>		
            <tr class="linkonly" >
            	<td><label><?php esc_attr_e('Link URL - add if you select link post:','lavander'); ?> </label><br><input name="link_post_url"  value="<?php echo esc_attr($link_post_url); ?>" /></td>
            </tr>				
            <tr class="audioonly">
            	<td><label><?php esc_attr_e('Audio URL - add if you select audio post:','lavander'); ?></label><br><input name="audio_post_url"  value="<?php echo esc_attr($audio_post_url); ?>" /></td>
            </tr>	
            <tr class="nooptions">
            	<td><?php esc_attr_e('No options for this post type.','lavander'); ?></td>
            </tr>				
        </table>
    </div>
      
<?php
	
}


function lavander_update_post_type(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){

		if( isset($_POST["video_post_url"]) ) {
			update_post_meta($post->ID, "video_post_url", $_POST["video_post_url"]);
		}		
		if( isset($_POST["link_post_url"]) ) {
			update_post_meta($post->ID, "link_post_url", $_POST["link_post_url"]);
		}	
		if( isset($_POST["audio_post_url"]) ) {
			update_post_meta($post->ID, "audio_post_url", $_POST["audio_post_url"]);
		}							
		
	}
	
	
	
}
if( !function_exists( 'lavander_fallback_menu' ) )
{

	function lavander_fallback_menu()
	{
		$current = "";
		if (is_front_page()){$current = "class='current-menu-item'";} 
		echo "<div class='fallback_menu'>";
		echo "<ul class='Lavander_fallback menu'>";
		echo "<li $current><a href='".esc_url(esc_url(home_url('/')))."'>".esc_attr__('Home','lavander')."</a></li>";
		wp_list_pages('title_li=&sort_column=menu_order');
		echo "</ul></div>";
	}
}

add_filter( 'the_category', 'lavander_add_nofollow_cat' );  

function lavander_add_nofollow_cat( $text ) { 
	$text = str_replace('rel="category tag"', "", $text); 
	return $text; 
}

/* get image from post */
function lavander_getImage($id, $image){
	$return = '';
	if ( has_post_thumbnail($id) ){
		$return = get_the_post_thumbnail($id,$image);
		}
	else
		$return = '';
	
	return 	$return;
}

if ( ! isset( $content_width ) ) $content_width = 800;


function lavander_add_this_script_footer(){ 

	$lavander_script = '	
		"use strict"; 
		jQuery(document).ready(function($){	
			jQuery(".searchform #s").attr("value","'. esc_html__("Search and hit enter...","lavander").'");	
			jQuery(".searchform #s").focus(function() {
				jQuery(".searchform #s").val("");
			});
			
			jQuery(".searchform #s").focusout(function() {
				if(jQuery(".searchform #s").attr("value") == "")
					jQuery(".searchform #s").attr("value","'. esc_html__("Search and hit enter...","lavander") .'");
			});		
				
		});	
		
		';
	wp_add_inline_script( 'lavander_customjs', $lavander_script );
}

add_action( 'wp_enqueue_scripts', 'lavander_add_this_script_footer' );

function lavander_security($string){
	echo stripslashes(wp_kses(stripslashes($string),array('img' => array('src' => array(),'alt'=>array()),'a' => array('href' => array()),'span' => array(),'div' => array('class' => array()),'b' => array(),'strong' => array(),'br' => array(),'p' => array()))); 

}

/* SEARCH FORM */
function lavander_search_form( $form ) {
	$form = '<form method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<input type="text" value="' . get_search_query() . '" name="s" id="s" />
	<i class="fa fa-search search-desktop"></i>
	</form>';

	return $form;
}
add_filter( 'get_search_form', 'lavander_search_form' );



	add_action('save_post', 'lavander_update_post_rev');
	add_action("admin_init", "lavander_add_rev");
	
	function lavander_add_rev(){
	
	$screens = array( 'page' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			"lavander_post_content", esc_html('Lavander Options','lavander'), "lavander_post_content",
			$screen,'side','high'
		);
	}	
		
		
	}	
	


	
	function lavander_post_content(){	
		global $post;	
		$lavander_data = get_post_custom(get_the_id());
		if (isset($lavander_data["custom_post_rev"][0])){		
			$custom_post_rev = $lavander_data["custom_post_rev"][0];	
		}else{		
			$custom_post_rev = "";	
		}		
		?>	
         <table cellpadding="15" cellspacing="0">	

			<tr>
			<td><label><?php esc_html__('Select custom revolution slider:','lavander'); ?> </label>				
			<br>	
				<?php if(shortcode_exists( 'rev_slider')) {  ?>
				<select id="custom_post_rev"  name="custom_post_rev">	
				<option value="empty" <?php if($custom_post_rev == 'empty') echo 'selected'; ?>>Empty</option>	
				<?php 				
				$slider = new RevSlider();				
				$arrSliders = $slider->getArrSliders();				
				if(!empty($arrSliders)){ 	
					$revSliderArray = array();					
					foreach($arrSliders as $sliders){ ?>
						<option value="<?php echo esc_attr($sliders->getAlias()); ?>" <?php if($sliders->getAlias() == $custom_post_rev) echo 'selected'; ?>>
						<?php echo esc_attr($sliders->getShowTitle()) ?>
						</option>						
					<?php
					} 						
				}																
				?>

				<?php } ?>
			</td>            
			</tr>		
		</table>  
		
	<?php	
	}
	
	function lavander_update_post_rev()
	{
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){

		if( isset($_POST["custom_post_rev"]) ) {
			update_post_meta($post->ID, "custom_post_rev", $_POST["custom_post_rev"]);
		}		
	}
	}

function lavander_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'lavander_excerpt_more' );


add_filter( 'the_content_more_link', 'lavander_modify_read_more_link' );
function lavander_modify_read_more_link() {
	return '<div class="lavander-read-more"><a class="more-link" href="' . get_permalink() . '">'.esc_html__('Continue reading','lavander').'</a></div>';
}
/*set excerpt lenght for grid layout*/
if(!function_exists('lavander_custom_excerpt_length')){
	function lavander_custom_excerpt_length( $length ) {
		return 999;
	}
	add_filter( 'excerpt_length', 'lavander_custom_excerpt_length', 999 );
}

add_filter('dynamic_sidebar_params','lavander_blog_widgets');
 
/* Register our callback function */
function lavander_blog_widgets($params) {	 
 
     global $blog_widget_num; //Our widget counter variable
 
     //Check if we are displaying "Footer Sidebar"
      if(isset($params[0]['id']) && $params[0]['id'] == 'sidebar-delas-blog'){
         $blog_widget_num++;
		$divider = 2; //This is number of widgets that should fit in one row		
 
         //If it's third widget, add last class to it
         if($blog_widget_num % $divider == 0){
	    $class = 'class="last '; 
	    $params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']);
	 }
 
	}
 
      return $params;
}

/*reading time*/
function lavander_estimated_reading_time( $id) {
	$post = get_post($id);
    $words = str_word_count( strip_tags( $post-> post_content ) );
    $minutes = floor( $words / 200 );
	if($minutes < 1) $minutes = 1;
	wp_reset_postdata(); 
    return $minutes;
}

/*post options*/
function lavander_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function lavander_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    lavander_set_post_views($post_id);
}
add_action( 'wp_head', 'lavander_track_post_views');

function lavander_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/*globals*/

function lavander_globals($var){
	$lavander_data = get_option(OPTIONS);
	if(!empty($lavander_data[$var])){
		return true;
	}
	else{
		return false;
	}

}

function lavander_data($data){
	$lavander_data = get_option(OPTIONS);
	if(isset($lavander_data[$data])){
		return $lavander_data[$data];	
	} else {
		return '';	
	}
}

function lavander_block_one(){
$lavander_data = get_option(OPTIONS);
$categories = $lavander_data['featured_categories']; ?>
<div class="block1"> 
<?php
	foreach ($categories as $key => $category) {
		?>
		<a <?php if( ($key-1) % 3 == 0) echo 'class="last"';?>href="<?php echo esc_url($category['link']) ?>" title="Image">
		
			<div class="block1_img">
				<img src="<?php echo esc_url($category['image']) ?>" alt="<?php echo esc_html($category['title']) ?>">
			</div>
			
			<div class="block1_all_text">
				<div class="block1_text">
					<p><?php echo esc_html($category['title']) ?></p>
				</div>
				<div class="block1_lower_text">
					<p><?php echo esc_html($category['lower_title']) ?></p>
				</div>
			</div>									
		</a>						
	<?php
	} ?>
</div>
<?php
}


function lavander_block_two(){
$lavander_data = get_option(OPTIONS);
?>
	<div class="block2">
		<div class="block2_content">
					
			<div class="block2_img">
				<img class="block2_img_big" src="<?php echo esc_url($lavander_data['block2_img']) ?>" alt="Image">
			</div>						
			
			<div class="block2_text">
				<p><?php lavander_security($lavander_data['block2_text']) ?></p>
			</div>
		</div>								
	</div>
<?php
}

function lavander_logo(){?>
	<div class="logo-inner">
		<div id="logo" class="<?php if(is_active_sidebar( 'lavander_sidebar-logo' )) { echo 'logo-sidebar'; } ?>">
			<?php $logo = esc_url(lavander_data('logo')); ?>
			<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php if (!empty($logo)) {?>
			<?php echo esc_url($logo); ?><?php } else {?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php }?>" data-rjs="3" alt="<?php esc_html(bloginfo('name')); ?> - <?php esc_html(bloginfo('description')) ?>" /></a>
		</div>
		<?php if(is_active_sidebar( 'lavander_sidebar-logo' )) { ?> 
			<div class="logo-advertise">
				<?php if(is_active_sidebar( 'lavander_sidebar-logo' )) { ?>
					<?php dynamic_sidebar( 'lavander_sidebar-logo' ); ?>
				<?php } ?>
			</div>
		<?php } ?>									
	</div>	
<?php
}

/*import plugins*/

add_action( 'tgmpa_register', 'lavander_required_plugins' );

function lavander_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
			
		array(
				'name'      => esc_html__('Shortcode Ultimate','lavander'),
				'slug'      => 'shortcodes-ultimate',
				'required'  => false,
			),		
		array(
				'name'      => esc_html__('Contact Form 7','lavander'),
				'slug'      => 'contact-form-7',
				'required'  => false,
			),			
		array(
				'name'      => esc_html__('Facebook Page Plugin','lavander'),
				'slug'      => 'facebook-page-feed-graph-api',
				'required'  => false,
			),			
		array(
				'name'      => esc_html__('MailPoet Newsletters','lavander'),
				'slug'      => 'wysija-newsletters',
				'required'  => false,
			),			
		array(
				'name'      => esc_html__('Instagram Feed','lavander'),
				'slug'      => 'instagram-feed',
				'required'  => false,
			),			
		array(
				'name'      => esc_html__('SoundCloud Shortcode','lavander'),
				'slug'      => 'instagram-feed',
				'required'  => false,
			),	
			
			
			
				
    );

    $config = array(
        'id'           => 'lavander',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => get_template_directory() . '/includes/plugins/',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'lavander' ),
            'menu_title'                      => __( 'Install Plugins', 'lavander' ),
            'installing'                      => __( 'Installing Plugin: %s', 'lavander' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'lavander' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'lavander' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'lavander' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'lavander' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'lavander' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'lavander' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'lavander' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'lavander' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'lavander' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'lavander' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'lavander' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'lavander' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'lavander' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'lavander' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}
?>