	
	<div class="entry">
		<div class = "meta">		
			<div class="blogContent">
				<div class="blogcontent"><?php the_content() ?></div>
			<?php if(lavander_globals('display_post_meta')) { ?>
			
				<div class="bottomBlog">
			
					<?php if(lavander_globals('display_socials')) { ?>
					
					<div class="blog_social"> <?php esc_html_e('Share: ','lavander') . lavander_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>
					<?php } ?>
					 <!-- end of socials -->
					
					<?php if(lavander_globals('display_reading')) { ?>
					<div class="blog_time_read">
						<?php echo esc_html__('Reading time: ','lavander') . esc_attr(lavander_estimated_reading_time(get_the_ID())) . esc_html__(' min','lavander') ; ?>
					</div>
					<?php } ?>
					<!-- end of reading -->
				</div> 
		
		<?php } ?> <!-- end of bottom blog -->
			</div>
			
			
		
</div>		
	</div>
