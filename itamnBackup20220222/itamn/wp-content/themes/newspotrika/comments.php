<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newspotrika
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h4 class="comments-title">
			Сэтгэгдэл
		</h4><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<div class="post-comments">
			<div class="comment-list">
	            <?php
					wp_list_comments( array(
						'callback' => 'newspotrika_comments_list',
					) );
				?>
			</div><!-- .comment-list -->
		</div>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Энэ нийтлэлд сэтгэгдэл бичих боломжгүй.', 'newspotrika' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	?>

	<div class="comment-box">

	<?php
	$fields = array(
		'author' =>
	    '<div class="row"><div class="col-sm-6">
		        <input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" placeholder="'.esc_attr__( 'Нэр', 'newspotrika' ).'" required>
		    </div>',

		);
	//Comment field
	comment_form(array(
		'id_form'       => 'commentform',
		'class_form'    => 'comment-form',
		'name_submit'   => 'submit',
		'title_reply'   => NULL,
		'title_reply_to'=> NULL,
		'comment_notes_before'=> NULL,
		'class_submit'  => 'comment_submit_button',
		'label_submit'  => esc_html__( 'Хадгалах', 'newspotrika' ),
		'fields' 		=> apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field' => '<div class="row"><div class="col-sm-12"><textarea class="form-control" id="comment" name="comment" placeholder="'.esc_attr__( 'Сэтгэгдэл үлдээх', 'newspotrika' ).'" required></textarea></div></div>' ,
		));
	?>

	</div>
</div><!-- #comments -->