<?php

$lavanderpop = new WP_Query( array( 'posts_per_page' => 8, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC' , 'post_type' => 'post'  ) );
?>
		
			<?php if ($lavanderpop->have_posts()) : ?>
			<?php $do_not_duplicate = array(); $i = 0;?>
			<?php $j = 0; ?>
			<?php while ($lavanderpop->have_posts()) : $lavanderpop->the_post(); 
			$j++;
			if ( in_array( get_the_id(), $do_not_duplicate ) ) { continue; }
			$do_not_duplicate[$i++] = get_the_id();

			?>
			<?php if(is_sticky(get_the_id())) { ?>
			<div class="lavander_sticky">
			<?php } ?>
			<?php
			$postmeta = get_post_custom(get_the_id()); ?>
			<?php  
			if ( has_post_format( 'video' , get_the_id())) { ?>
			<div class="slider-category <?php if( ($j) % 2 == 0) echo 'last';?>">
			
				<div class="blogpostcategory">			
					<?php
					
					if(!empty($postmeta["video_post_url"][0])) {
					$embed_code = wp_oembed_get(esc_url($postmeta["video_post_url"][0]),array('width'=>300,'height'=>200));
					echo $embed_code ;
					} ?>
					<?php get_template_part('includes/boxes/loopBlogGrid','single'); ?>
				</div>
				
			</div>
			<?php } 
			if ( has_post_format( 'link' , get_the_id())) {
			$postmeta = get_post_custom(get_the_id()); 
			if(isset($postmeta["link_post_url"][0])){
				$link = $postmeta["link_post_url"][0];
			} else {
				$link = "#";
			}			
			?>
			<div class="link-category <?php if( ($j) % 2 == 0) echo 'last';?>">
				<div class="blogpostcategory">	
					<?php if(lavander_getImage(get_the_id(), 'lavander-postBlock') != '') { ?>	

					<a class="overdefultlink" href="<?php echo esc_url($link) ?>">
					<div class="overdefult">
					</div>
					</a>

					<div class="blogimage">	
						<div class="loading"></div>		
						<a href="<?php echo esc_url($link) ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','lavander')?> <?php the_title_attribute(); ?>"><?php echo lavander_getImage(get_the_id(), 'lavander-postBlock'); ?></a>
					</div>
					<?php } ?>					
					<?php get_template_part('includes/boxes/loopBlogLink','single'); ?>								
				</div>
			</div>
			
			<?php 
			} 	
			if ( has_post_format( 'quote' , get_the_id())) {?>
			<div class="quote-category <?php if( ($j) % 2 == 0) echo 'last';?>">
				<div class="blogpostcategory">				
					<?php get_template_part('includes/boxes/loopBlogQuote','single'); ?>								
				</div>
			</div>
			
			<?php 
			} 			
			?>
			<?php if ( has_post_format( 'audio' , get_the_id())) {?>
			<div class="blogpostcategory <?php if( ($j-1) % 2 == 0) echo 'last';?>">		
				<div class="audioPlayerWrap">
					<div class="audioPlayer">
						<?php 
						if(isset($postmeta["audio_post_url"][0]))
							echo do_shortcode('[soundcloud  params="auto_play=false&hide_related=false&visual=true" width="100%" height="150"]'. esc_url($postmeta["audio_post_url"][0]) .'[/soundcloud]') ?>
					</div>
				</div>
				<?php get_template_part('includes/boxes/loopBlogGrid','single'); ?>		
			</div>	
			<?php
			}
			?>					
			
			
			<?php if ( !get_post_format() || has_post_format( 'gallery' , get_the_id())) {?>
		

			<div class="blogpostcategory <?php if( ($j) % 2 == 0) echo 'last';?>">					
				<?php if(lavander_getImage(get_the_id(), 'lavander-postBlock') != '') { ?>	

					<a class="overdefultlink" href="<?php the_permalink() ?>">
					<div class="overdefult">
					</div>
					</a>

					<div class="blogimage">	
						<div class="loading"></div>		
						<a href="<?php the_permalink() ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','lavander')?> <?php the_title_attribute(); ?>"><?php echo lavander_getImage(get_the_id(), 'lavander-postBlock'); ?></a>
					</div>
					<?php } ?>
					<?php get_template_part('includes/boxes/loopBlogGrid','single'); ?>
			</div>
			
			<?php } ?>		
			<?php if(is_sticky()) { ?>
				</div>
			<?php } ?>
			
				<?php endwhile; ?>
						
			<?php endif; ?>
				
	<?php wp_reset_postdata(); ?>	