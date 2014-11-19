<?php include("wp-content/themes/asta/gallery-menu.php"); ?>

<?php

global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM as_postmeta WHERE post_id = ".get_the_ID()." and meta_key = '_easy_image_gallery' LIMIT 0, 1", OBJECT );

$attachments = get_posts( array(
    'post__in' => explode(',', $results[0]->meta_value),
    'post_type' => 'attachment',
    'posts_per_page' => 1
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
<?php $post_cat = get_the_category();
      $results = $wpdb->get_results( "SELECT * FROM as_postmeta INNER JOIN as_posts ON as_posts.post_parent = post_id WHERE meta_value = ".$post_cat[0]->cat_ID." and meta_key = 'accessory_category' LIMIT 0, 1", OBJECT );
?>
<a href="?p=<?php echo $results[0]->post_id; ?>"><?php echo $post_cat[0]->name; ?></a>
<div><?php echo get_field('price', $objectPostID); ?></div>
<a>Uzsakyti</a>
<div style="width: 400px; height: 300px;">
    Uzsakyti Forma
</div>
<?php include("wp-content/themes/asta/contacts-small.php"); ?>