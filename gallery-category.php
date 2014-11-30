<?php

global $wpdb;
global $galleryID;

$results = $wpdb->get_results( "SELECT * FROM as_postmeta INNER JOIN as_term_relationships ON term_taxonomy_id = " . $galleryID . " WHERE post_id = as_term_relationships . object_id and meta_key = '_easy_image_gallery'", OBJECT );

foreach($results as $result) {
    $attachments = get_posts( array(
        'post__in' => explode(',', $result->meta_value),
        'post_type' => 'attachment',
        'posts_per_page' => 50
    ) );
    $objectPostID = $result->post_id;
    if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
            $title = apply_filters( 'the_title', $attachment->post_title );
            $img = wp_get_attachment_image_src( $attachment->ID , 'thumbnail');

            ?>
            <a href="<?php echo '?p=' . $objectPostID; ?>">
                <figure>
                    <img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>px" height="<?php echo $img[2]; ?>px" alt="<?php echo $title; ?>">
                </figure>
                <p class="price"><?php echo get_field('price', $objectPostID); ?></p>
            </a>
        <?php
        }
    }
}
?>

<div>Rodyti Daugiau</div>