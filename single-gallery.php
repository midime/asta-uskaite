
<?php
$args = array( 'posts_per_page' => 99, 'category' => '12', 'order'=> 'ASC', 'orderby' => 'date' );

$postslist = get_posts( $args );

if (count($postslist) > 0) {
    $i = 0;
    foreach ( $postslist as $post ) :
        $i++;
        setup_postdata( $post ); ?>
        <div style=" height: 200px; width: 600px; background-image: url('<?php echo get_field("accessory-pic"); ?>');">
            <span style="padding-right: 20px;"><?php echo get_the_TITLE(); ?></span>

            <?php
                global $wpdb;
                $catID = get_field("accessory_category", get_the_ID());


                $results = $wpdb->get_results( "SELECT * FROM as_postmeta INNER JOIN as_posts ON as_posts.post_parent = post_id WHERE meta_value = ".$catID." and meta_key = 'accessory_category' LIMIT 0, 1", OBJECT );
            ?>

            <a href="?p=<?php echo $results[0]->post_id; ?>"">Ziureti galerija</a>
        </div>
    <?php
    endforeach;
    wp_reset_postdata();
}
?>
