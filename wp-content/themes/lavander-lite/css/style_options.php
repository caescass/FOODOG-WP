<?php
$lavander_data = get_option(OPTIONS); 
$use_bg = ''; $background = ''; $custom_bg = ''; $body_face = ''; $use_bg_full = ''; $bg_img = ''; $bg_prop = '';

function lavander_google($string){
	$ot_google_fonts      = get_theme_mod( 'ot_google_fonts', array() );
	if(!empty($ot_google_fonts[$string]['family'])){
	return  $ot_google_fonts[$string]['family'];
	} else {return '';};
}

if(!empty($lavander_data['image_background'])) {
	$use_bg_full = $lavander_data['image_background'];
	
}

if(!empty($lavander_data['use_boxed'])){
	$use_boxed = $lavander_data['use_boxed'];
}
else{
	$use_boxed = 0;
}



	$font_menu = lavander_google($lavander_data['menu_font']['face']);
	$font_quote = lavander_google($lavander_data['qoute_typography_settings']['face']);
	$font_heading = lavander_google($lavander_data['heading_font']['face']);
    $font_body = lavander_google($lavander_data['body_font']['face']);


?>


.block_footer_text, .quote-category .blogpostcategory, .quote-widget p, .quote-widget {font-family: <?php echo esc_attr($font_quote); ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}
body {	 
	background:<?php echo esc_attr($lavander_data['body_background_color']).' '.$background ?>  !important;
	color:<?php echo esc_attr($lavander_data['body_font']['color']); ?>;
	font-family: <?php echo esc_attr($font_body); ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;
	font-size: <?php echo esc_attr($lavander_data['body_font']['size']); ?>;
	font-weight: normal;
}
.minimal-light .esg-filterbutton, .minimal-light .esg-navigationbutton, .minimal-light .esg-sortbutton, .minimal-light .esg-cartbutton a {font-family: <?php echo esc_attr($font_body); ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}


.su-dropcap {color:<?php echo esc_attr($lavander_data['body_font']['color']); ?>;}

::selection { background: #000; color:#fff; text-shadow: none; }

h1, h2, h3, h4, h5, h6, .block1 p, .prev-post-title, .next-post-title{font-family: <?php echo esc_attr($font_heading); ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}
h1 { 	
	color:<?php echo esc_attr($lavander_data['heading_font_h1']['color']); ?>;
	font-size: <?php echo esc_attr($lavander_data['heading_font_h1']['size']); ?> ;
	}
	
h2, .term-description p { 	
	color:<?php echo esc_attr($lavander_data['heading_font_h2']['color']); ?>;
	font-size: <?php echo esc_attr($lavander_data['heading_font_h2']['size']); ?>  ;
	}

h3 { 	
	color:<?php echo esc_attr($lavander_data['heading_font_h3']['color']); ?>;
	font-size: <?php echo esc_attr($lavander_data['heading_font_h3']['size']); ?>  ;
	}

h4 { 	
	color:<?php echo esc_attr($lavander_data['heading_font_h4']['color']); ?>;
	font-size: <?php echo esc_attr($lavander_data['heading_font_h4']['size']); ?>  ;
	}	
	
h5 { 	
	color:<?php echo esc_attr($lavander_data['heading_font_h5']['color']); ?>;
	font-size: <?php echo esc_attr($lavander_data['heading_font_h5']['size']); ?>  ;
	}	

h6 { 	
	color:<?php echo esc_attr($lavander_data['heading_font_h6']['color']); ?>;
	font-size: <?php echo esc_attr($lavander_data['heading_font_h6']['size']); ?>  ;
	}	

.pagenav a {font-family: <?php echo  esc_attr($font_menu); ?> !important;
			  font-size: <?php echo esc_attr($lavander_data['menu_font']['size']); ?>;
			  font-weight:<?php echo esc_attr($lavander_data['menu_font']['style']); ?>;
			  color:<?php echo esc_attr($lavander_data['menu_font']['color']); ?>;
}



.pagenav li.has-sub-menu > a:after, .menu > li.has-sub-menu li.menu-item-has-children > a:before  {color:<?php echo esc_attr($lavander_data['menu_font']['color']); ?>;}
.block1_lower_text p,.widget_wysija_cont .updated, .widget_wysija_cont .login .message, p.edd-logged-in, #edd_login_form, #edd_login_form p, .esg-grid  {font-family: <?php echo esc_attr($font_body); ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif !important;color:<?php echo esc_attr($lavander_data['body_font']['color']); ?>;font-size:14px;}

a, select, input, textarea, button{ color:<?php echo esc_attr($lavander_data['body_link_coler']); ?>;}
h3#reply-title, select, input, textarea, button, .link-category .title a{font-family: <?php echo esc_attr($font_body); ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}



/* ***********************
--------------------------------------
------------MAIN COLOR----------
--------------------------------------
*********************** */

a:hover, span, .current-menu-item a, .blogmore, .pagenav.fixedmenu li a:hover, .widget ul li a:hover,.pagenav.fixedmenu li.current-menu-item > a,.block2_text a,
.blogcontent a, .sentry a, .post-meta a:hover, .sidebar .social_icons i:hover,.blog_social .addthis_toolbox a:hover, .addthis_toolbox a:hover, .content.blog .single-date,
 .pmc-main-menu li.colored a, #footer .widget ul li a:hover, .sidebar .widget ul li a:hover, #footer a:hover, li.current-menu-item a,  #footer .social_icons a:hover i, 
 #footerb a, .blog-category a:hover 


{
	color:<?php echo esc_attr($lavander_data['mainColor']); ?>;
}
 li.current-menu-item a {color:<?php echo esc_attr($lavander_data['mainColor']); ?> !important;}
.su-quote-style-default  {border-left:5px solid <?php echo esc_attr($lavander_data['mainColor']); ?>;}
.addthis_toolbox a i:hover {color:<?php echo esc_attr($lavander_data['mainColor']); ?> !important;}
.resp_menu_button {color:<?php echo esc_attr($lavander_data['hamburger_menu_color']); ?> ;}
 
/* ***********************
--------------------------------------
------------BACKGROUND MAIN COLOR----------
--------------------------------------
*********************** */

.top-cart, .widget_tag_cloud a:hover, .sidebar .widget_search #searchsubmit,
.specificComment .comment-reply-link:hover, #submit:hover,  .wpcf7-submit:hover, #submit:hover,
.link-title-previous:hover, .link-title-next:hover, .specificComment .comment-edit-link:hover, .specificComment .comment-reply-link:hover, h3#reply-title small a:hover, .pagenav li a:after,
.widget_wysija_cont .wysija-submit,.widget ul li:before, #footer .widget_search #searchsubmit, .lavander-read-more a, .blogpost .tags a:hover,
.mainwrap.single-default.sidebar .link-title-next:hover, .mainwrap.single-default.sidebar .link-title-previous:hover, .lavander-home-deals-more a:hover, .top-search-form i:hover, .edd-submit.button.blue:hover,
ul#menu-top-menu, a.catlink:hover, .mainwrap.single-default .link-title-next:hover, .mainwrap.single-default .link-title-previous:hover, #footer input.wysija-submit, #commentform #submit:hover, input[type="submit"]:hover, #submit:hover,
.sidebar-buy-button a:hover, .wp-pagenavi .current, .wp-pagenavi a:hover, .sidebar .widget h3:before 
  {
	background:<?php echo esc_attr($lavander_data['mainColor']); ?> ;
}

.minimal-light .esg-navigationbutton:hover, .minimal-light .esg-filterbutton:hover, .minimal-light .esg-sortbutton:hover, .minimal-light .esg-sortbutton-order:hover, .minimal-light .esg-cartbutton a:hover, .minimal-light .esg-filterbutton.selected{
	background:<?php echo esc_attr($lavander_data['mainColor']); ?> !important;
	
}

.pagenav  li li a:hover {background:none;}
.edd-submit.button.blue:hover, .cart_item.edd_checkout a:hover {background:<?php echo esc_attr($lavander_data['mainColor']); ?> !important;}
.link-title-previous:hover, .link-title-next:hover {color:#fff;}
#headerwrap {background:<?php echo esc_attr($lavander_data['header_background_color']); ?>;}
.pagenav {background:<?php echo esc_attr($lavander_data['menu_background_color']); ?>;}

.blogpostcategory, .content .blogpost, .postcontent.singledefult .share-post, .commentlist, .postcontent.singlepage, .content.singlepage, .block2_img, .block2_text, .sidebar .widget,
.relatedPosts, #commentform, .sidebars-wrap .widget
 {background:<?php echo esc_attr($lavander_data['sidebar_post_background_color']); ?> ;}
 
 .esg-grid {background:<?php echo esc_attr($lavander_data['body_background_color']).' '.$background ?>  !important;}
 
.block1_text, .block1_all_text, .block1_lower_text {background:<?php echo esc_attr($lavander_data['featured_background']); ?> ;}
.blog_time_read, .blog_social, .socialsingle, .blog_social i {color:<?php echo esc_attr($lavander_data['blog_meta_color']); ?>;}
.widget_tag_cloud a, .blogpost .tags a {color:<?php echo esc_attr($lavander_data['blog_meta_color']); ?>;border-color:<?php echo esc_attr($lavander_data['main_border_color']); ?> ;}
#commentform textarea, .singlepage textarea, .singlepage input {background:<?php echo esc_attr($lavander_data['main_border_color']); ?> ;}
input[type="submit"] {background:#aaa;}

#lavander-slider-wrapper, .lavander-rev-slider {padding-top:<?php echo esc_attr($lavander_data['rev_slider_margin']); ?>px;}

.block1_lower_text p:before {background:<?php echo esc_attr($lavander_data['main_border_color']); ?> ;}
.recent_posts .widgett, .category_posts .widgett, .widget.widget_categories ul li, .widget.widget_archive ul li, .relatedPosts, .specificComment, ol.commentlist
{border-color:<?php echo esc_attr($lavander_data['main_border_color']); ?> ;}



/* BUTTONS */

 .lavander-read-more a:hover {background:<?php echo esc_attr($lavander_data['mainColor']); ?> ;}

 .top-wrapper .social_icons a i:hover {color:<?php echo esc_attr($lavander_data['mainColor']); ?> !important;}

 /* ***********************
--------------------------------------
------------BOXED---------------------
-----------------------------------*/
<?php if($use_boxed == 0 &&  isset($lavander_data['use_background']) && $lavander_data['use_background'] == 1){ ?>
	body, .cf, .mainwrap, .post-full-width, .titleborderh2, .sidebar, div#lavander-slider-wrapper, .block1 a, .block2   {
	background:<?php echo esc_attr($lavander_data['body_background_color']).' '.$background ?>  !important; 
	}
	
<?php	} ?>
 <?php if(isset($lavander_data['use_boxed']) &&  $use_boxed == 1){ ?>
header,.outerpagewrap{background:none !important;}
header,.outerpagewrap,.mainwrap, div#lavander-slider-wrapper, .block1 a, .block2, .custom-layout,.sidebars-wrap,#footer, .lavander_boxed .block1, #sb_instagram{background-color:<?php echo esc_attr($lavander_data['body_background_color']); ?> ;}
@media screen and (min-width:1220px){
body {width:1220px !important;margin:0 auto !important;}
.top-nav ul{margin-right: -21px !important;}
.mainwrap.shop {float:none;}
.pagenav.fixedmenu { width: 1220px !important;}
.bottom-support-tab,.totop{right:5px;}
<?php if($use_bg_full){ ?>
	body {
	background:<?php echo esc_attr($lavander_data['body_background_color']).' url("'.$use_bg_full ?>")  !important; 
	background-attachment:fixed !important;
	background-size:cover !important; 
	-webkit-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
-moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
	}	
<?php	} ?>
 <?php if(!$use_bg_full){ ?>
	body {
	background:<?php echo esc_attr($lavander_data['body_background_color']); ?>  !important; 
	
	}
	
<?php	} ?>	
}
<?php } ?>
 
  <?php if(!empty($lavander_data['image_background_header'])){ ?>
	header {
	background:<?php echo esc_attr($lavander_data['body_background_color']).' url('. esc_attr($lavander_data['image_background_header']) .')'; ?>  !important; 
	background-attachment:fixed !important;
	width:100%;
	-webkit-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
	box-shadow:	0px 0px 5px 1px rgba(0,0,0,0.2);
	float:left;
	}	
	.top-wrapper ,.logo-wrapper , div#logo{background:none;}
<?php	} ?>
 <?php if(empty($lavander_data['use_menu_back']) && !empty($lavander_data['image_background_header'])){ ?>
	#headerwrap {background:none;}
<?php	} ?>
<?php if(is_active_sidebar( 'dremscape-sidebar-under-header-left') || is_active_sidebar( 'lavander-sidebar-under-header-fullwidth' )) {?>
	.sidebars-wrap.top {padding-top:30px}
<?php } ?>
 <?php if(is_active_sidebar( 'lavander-sidebar-footer-fullwidth' ) || is_active_sidebar( 'lavander-sidebar-footer-left' )){ ?>
	.sidebars-wrap.bottom {padding:0px 0}
<?php } ?>

.top-wrapper {background:<?php echo esc_attr($lavander_data['top_menu_background_color']); ?>; color:<?php echo esc_attr($lavander_data['upper_bar_color']); ?>}
.top-wrapper i, .top-wrapper a, .top-wrapper div, .top-wrapper form input, .top-wrapper form i{color:<?php echo esc_attr($lavander_data['upper_bar_color']); ?> !important}

.pagenav {background:<?php echo esc_attr($lavander_data['menu_background_color']); ?>;border-top:<?php echo esc_attr($lavander_data['menu_top_border']); ?>px solid #000;border-bottom:<?php echo esc_attr($lavander_data['menu_bottom_border']); ?>px solid #000;}

/*hide header*/
<?php if(!empty($lavander_data['display_header'])) { ?>
	.home #headerwrap, .home .top-wrapper {display:none;}
<?php } ?>

/*footer style option*/
#footer, .block3, #footerbwrap {background: <?php echo esc_attr($lavander_data['footer_background_color']); ?>}
#footer p, #footer div, #footer a, #footer input, #footer, #footer h1, #footer h2, #footer h3 , #footer h4 , #footer i{color:<?php echo esc_attr($lavander_data['footer_text_color']); ?>} 


/* ***********************
--------------------------------------
------------CUSTOM CSS----------
--------------------------------------
*********************** */

<?php echo esc_attr(lavander_stripText($lavander_data['custom_style'])); ?>
