<?php 
	/**
	 * The template for displaying Search form.
	 *
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package newspotrika
	 */

?>
	<div class="search-form">
		<form id="search" action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">
			<input type="text"  name="s"  placeholder="<?php echo esc_attr_x( 'Хайх үгээ оруулна уу', 'placeholder', 'newspotrika' ); ?>" />
			<button type="submit"><i class="fa fa-fw fa-lg fa-search"></i></button>
		</form>
	</div>
