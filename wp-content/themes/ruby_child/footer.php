<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ruby
 */

?>
			</div><!-- .row -->
		</div><!-- .container -->
		<?php if ( is_front_page() || is_home() ) {
			get_sidebar( 'home' );
		} ?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer test-footer"  role="contentinfo">

		<?php ruby_call_for_action( 'footer' ); ?>

		<?php get_sidebar( 'footer' ); ?>

        <!-- <?php 
foreach((get_the_category()) as $cat) { 
echo $cat->cat_name . ' '; 
} ?>  -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 under-footer"></div>
                
                <div class="col-sm-4 under-footer">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <?php ruby_scroll_to_top(); ?>

                </div>

            </div>
        </div>

	</footer><!-- #colophon -->
	<?php $site_layout = get_theme_mod( 'ruby_default_site_layout', 'wide-layout' ); ?>
	<?php if ( 'boxed-layout' === $site_layout ) { ?>
		</div><!-- .row -->
	<?php } ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>