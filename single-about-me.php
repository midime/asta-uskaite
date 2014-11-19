<h2> <?php
    echo do_shortcode(get_the_title(get_the_ID()));
    ?>
</h2>
<div>
    <?php

    $post_about_me = get_post(get_the_ID());
    echo do_shortcode($post_about_me->post_content);

    ?>

    <?php

    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM as_postmeta WHERE post_id = ".get_the_ID()." and meta_key = '_easy_image_gallery' LIMIT 0, 1", OBJECT );

    $attachments = get_posts( array(
        'post__in' => explode(',', $results[0]->meta_value),
        'post_type' => 'attachment',
        'posts_per_page' => 3
    ) );

    if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
            $title = apply_filters( 'the_title', $attachment->post_title );
            $img = wp_get_attachment_image_src( $attachment->ID, 'full' );

            ?>
            <figure>

                <img src="<?php echo $img[0]; ?>" alt="<?php echo $title; ?>">

            </figure>
        <?php
        }
    }
    ?>
</div>