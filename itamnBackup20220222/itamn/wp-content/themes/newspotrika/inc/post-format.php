<?php 
function newspotrika_get_gallery_images( $attachments ) {

    $output = array();
    $count = count($attachments) - 1;

    for ($i = 0; $i <= $count; ++$i){

        $active = ($i == 0 ? ' active' : '');

	    $n = ($i == $count ? 0 : $i + 1);
	    $nextImg = wp_get_attachment_thumb_url($attachments[$n]->ID);
	    $p = ($i == 0 ? $count : $i - 1);
	    $prevImg = wp_get_attachment_thumb_url($attachments[$p]->ID);

	    $output[$i] = array(
	        'class' => $active,
	        'url' => wp_get_attachment_url($attachments[$i]->ID),
	        'next_img' => $nextImg,
	        'prev_img' => $prevImg,
	        'caption' => $attachments[$i]->post_excerpt,
	    );
    }

    return $output;
}

function newspotrika_get_attachment( $num = 1 ) {
    $output = '';
    if (has_post_thumbnail() && $num == 1):
        $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); else:
        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'posts_per_page' => $num,
            'post_parent' => get_the_ID(),
        ));
    if ($attachments && $num == 1):
            foreach ($attachments as $attachment):
                $output = wp_get_attachment_url($attachment->ID);
    endforeach; elseif ($attachments && $num > 1):
            $output = $attachments;
    endif;

    wp_reset_postdata();

    endif;

    return $output;
}