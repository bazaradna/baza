<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newspotrika
 */

$control_footer_widgets = get_theme_mod( 'control_footer_widgets' );
$control_footer_text = get_theme_mod( 'control_footer_text' );

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
				
		<?php if ($control_footer_widgets == true): ?>
			<?php if (is_active_sidebar( 'footer' )): ?>
				<div class="footer-widgets">
					<div class="container">
						<div class="row">
						<?php dynamic_sidebar('footer'); ?>
						</div>
					</div>
					<div class="copyright-bar">
					    

						<p class="footer_text" style="   margin-left:170px; 
    font-size: 12px;
    margin-right: 11%;">
						<?php
		        		if( $control_footer_text ) {
							echo esc_html( $control_footer_text);
						} else {
							esc_html_e('Copyright', 'newspotrika'); ?> &copy; <?php echo date("Y").' '.get_bloginfo('name');  esc_html_e(' All Rights Reserved.', 'newspotrika' );
						}
						?>
						</p>
			
					</div>
				</div>
			<?php endif ?>
		<?php endif ?>
 
		

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>