
<!-- main content start -->
<div class="mainwrap blog <?php if(is_front_page()) echo 'home' ?> <?php if(!lavander_globals('use_fullwidth')) echo 'sidebar' ?> default">
	<div class="main clearfix">
		<div class="pad"></div>			
		<div class="content blog">
			<?php if (have_posts()) : ?>
			<?php 
			add_filter( 'shortcode_atts_gallery', 'lavander_gallery_C' );
			function lavander_gallery_c( $out )
			{
				remove_filter( current_filter(), __FUNCTION__ );
				$out['size'] = 'lavander-news';
				return $out;
			}
						
			?>
			<?php while (have_posts()) : the_post(); ?>
			<?php if(is_sticky(get_the_id())) { ?>
			<div class="lavander_sticky">
			<?php } ?>
			<?php
			$postmeta = get_post_custom(get_the_id()); ?>
				
			
			<?php
			if ( has_post_format( 'gallery' , get_the_id())) { 
			?>
			<div class="slider-category">
				
				<div class="blogpostcategory">
					<div class="topBlog">	
						<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( '•', 'lavander' ) ) . '</em>'; ?> </div>
						<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','lavander')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</div>				
					<?php
						$attachments = '';
						$attachments =  get_post_gallery_images( $post->ID);
						if ($attachments) {		
							?>
							<div class="category-slider" value="slider-category-<?php echo esc_attr($post->ID) ?>">
								<div id="slider-category" class="slider-category">
									<ul id="slider" class="slider-category-<?php echo esc_attr($post->ID) ?>">
										<?php 
											foreach ($attachments as  $image_url) { ?>	
												<li>
													<img src="<?php echo esc_url( $image_url) ?>" alt="<?php ?>"/>	
												</li>
												<?php } ?>
									</ul>
									<div class="bx-controls bx-has-pager bx-has-controls-direction">
										<div class="bx-pager bx-custom-pager">
											<?php
											foreach ($attachments as  $key=>$image_url) { ?>	
												<div class="bx-pager-item">
												<a data-slide-index="<?php echo esc_attr($key) ?>" href=""><img src="<?php echo esc_url( $image_url) ?>" alt="<?php ?>"/></a>
												</div>
												<?php 
											} ?>	
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if(lavander_globals('display_post_meta')) { ?>
						<div class = "post-meta">
							<?php 
							$day = get_the_time('d');
							$month= get_the_time('m');
							$year= get_the_time('Y');
							?>
							<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_date() ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','lavander'); echo get_the_author(); ?></a> <a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>				
						</div>
						<?php } ?> <!-- end of post meta -->						
				<?php get_template_part('includes/boxes/loopBlog','single'); ?>
				</div>
			</div>
			<?php } 
			if ( has_post_format( 'video' , get_the_id())) { ?>
			<div class="slider-category">
			
				<div class="blogpostcategory">
					<div class="topBlog">	
						<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( '•', 'lavander' ) ) . '</em>'; ?> </div>
						<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','lavander')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</div>				
					<?php
					
					if(!empty($postmeta["video_post_url"][0])) {
						$embed_code = wp_oembed_get(esc_url($postmeta["video_post_url"][0]));
						echo $embed_code ;
					} ?>
					<?php if(lavander_globals('display_post_meta')) { ?>
					<div class = "post-meta">
						<?php 
						$day = get_the_time('d');
						$month= get_the_time('m');
						$year= get_the_time('Y');
						?>
						<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_date() ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','lavander'); echo get_the_author(); ?></a> <a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>				
					</div>
					<?php } ?> <!-- end of post meta -->					
					<?php get_template_part('includes/boxes/loopBlog','single'); ?>
				</div>
				
			</div>
			<?php } 
			if ( has_post_format( 'link' , get_the_id())) {
			$postmeta = get_post_custom(get_the_id()); 
			if(isset($postmeta["link_post_url"][0])){
				$link = esc_url($postmeta["link_post_url"][0]);
			} else {
				$link = "#";
			}			
			?>
			<div class="link-category">
				<div class="blogpostcategory">
					<div class="topBlog">	
						<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( '•', 'lavander' ) ) . '</em>'; ?> </div>
						<h2 class="title"><a href="<?php $link ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','lavander')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<?php if(lavander_globals('display_post_meta')) { ?>
						<div class = "post-meta">
							<?php 
							$day = get_the_time('d');
							$month= get_the_time('m');
							$year= get_the_time('Y');
							?>
							<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_date() ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','lavander'); echo get_the_author(); ?></a> <a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>				
						</div>
						<?php } ?> <!-- end of post meta -->
					</div>			
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
			<div class="quote-category">
				<div class="blogpostcategory">				
					<?php get_template_part('includes/boxes/loopBlogQuote','single'); ?>								
				</div>
			</div>
			
			<?php 
			} 			
			?>
			<?php if ( has_post_format( 'audio' , get_the_id())) {?>
			<div class="blogpostcategory">
				<div class="topBlog">	
					<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( '•', 'lavander' ) ) . '</em>'; ?> </div>
					<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','lavander')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				</div>			
				<div class="audioPlayerWrap">
					<div class="audioPlayer">
						<?php 
						if(isset($postmeta["audio_post_url"][0]))
							echo do_shortcode('[soundcloud  params="auto_play=false&hide_related=false&visual=true" width="100%" height="150"]'. esc_url($postmeta["audio_post_url"][0]) .'[/soundcloud]') ?>
					</div>
				</div>
				<?php if(lavander_globals('display_post_meta')) { ?>
				<div class = "post-meta">
					<?php 
					$day = get_the_time('d');
					$month= get_the_time('m');
					$year= get_the_time('Y');
					?>
					<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_date() ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','lavander'); echo get_the_author(); ?></a> <a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>				
				</div>
				<?php } ?> <!-- end of post meta -->				
				<?php get_template_part('includes/boxes/loopBlog','single'); ?>		
			</div>	
			<?php
			}
			?>					
			
			
			<?php if ( !get_post_format() ) {?>
		

			<div class="blogpostcategory">
				<div class="topBlog">	
					<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( '•', 'lavander' ) ) . '</em>'; ?> </div>
					<h2 class="title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','lavander')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					<?php if(get_the_title() == ''){ ?>
						<a href="<?php the_permalink() ?>" <?php the_title_attribute(); ?>"><?php esc_html_e('Link to article','lavander'); ?></a>				
					<?php } ?>
					</h2>
				</div>					
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
					<?php if(lavander_globals('display_post_meta')) { ?>
					<div class = "post-meta">
						<?php 
						$day = get_the_time('d');
						$month= get_the_time('m');
						$year= get_the_time('Y');
						?>
						<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_date() ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','lavander'); echo get_the_author(); ?></a> <a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>				
					</div>
					<?php } ?> <!-- end of post meta -->					
					<?php get_template_part('includes/boxes/loopBlog','single'); ?>
			</div>
			
			<?php } ?>		
			<?php if(is_sticky()) { ?>
				</div>
			<?php } ?>
			
				<?php endwhile; ?>
				
					<?php
					
						get_template_part('includes/wp-pagenavi','navigation');
						if(function_exists('lavander_wp_pagenavi')) { lavander_wp_pagenavi(); }
					?>
					
					<?php else : ?>
					
						<div class="postcontent">
							<?php $lavander_data = get_option(OPTIONS); ?>
							<h1><?php lavander_security($lavander_data['errorpagetitle']) ?></h1>
							<div class="posttext">
								<?php lavander_security($lavander_data['errorpage']) ?>
							</div>
						</div>
						
					<?php endif; ?>
				
		</div>
		<!-- sidebar -->
		<?php if(!lavander_globals('use_fullwidth')) { ?>
			<?php if(is_active_sidebar( 'lavander_sidebar' )) { ?>
				<div class="sidebar">	
					<?php dynamic_sidebar( 'lavander_sidebar' ); ?>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
	
</div>											
