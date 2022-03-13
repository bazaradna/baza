<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package newspotrika
 */

get_header();
?>
<div class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center error-404 not-found">
				<a href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e( 'Таны хайсан хуудас олдсонгүй', '.' ) ?></a>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
