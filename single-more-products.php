<?php
if (!isset($_GET['catPage']) || !isset($_GET['catId'])) {
    exit;
}

$categoryID = $_GET['catId'];
$page = $_GET['catPage'];
$offset = 12*$page;

$args = array( 'posts_per_page' => 12, 'category' => $categoryID, 'offset' => $offset, 'order'=> 'DESC', 'orderby' => 'date' );
$postList = get_posts( $args );

if (!count($postList)) {
    echo 'no result';
    exit;
}

foreach ( $postList as $post ) {
    $productImage = getProductImageObject($post->ID);
    ?>
    <a href="<?php echo get_permalink($post->ID); ?>" class="tile">

        <figure>
            <div class="thumb-wrapper">
                <div class="thumb-inner">
                    <img src="<?php echo $productImage['image']; ?>" alt="<?php echo _($productImage['title']); ?>">
                </div>
            </div>
        </figure>

        <figcaption><?php echo get_field('price', $post->ID); ?></figcaption>

    </a>
<?php
}
?>