<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newspotrika
 */

$blog_excert_length = 20;

?>
		
<article id="post-<?php the_ID(); ?>" <?php post_class('excerpt-item'); ?>>
	<div class="row">
		<?php if (has_post_thumbnail()): ?>
		<div class="col-sm-4">
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail( 'newspotrika-500x360' ); ?>
			</a>
		</div>
		<?php endif ?>
		
		<div class="col-sm-<?php if( has_post_thumbnail() ){ echo'8'; } else { echo'12'; } ?>">
			<header class="entry-header">
			<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<ul class="entry-meta">
						<li class="list-inline-item">
							<i class="fa fa-user"></i> <?php echo esc_html__( 'by', 'newspotrika' ) ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author(); ?></a>
						</li>
						<li class="list-inline-item">
							<i class="fa fa-clock-o"></i><?php echo get_the_date(); ?>
						</li>
						<li class="list-inline-item">
							<a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i><?php echo esc_html(get_comments_number()) ?></a>
						</li>
					</ul><!-- .entry-meta -->
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->


		<div class="entry-content">
			<p><?php echo esc_html(newspotrika_excerpt($blog_excert_length)); ?></p>
		</div><!-- .entry-content -->

		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->