<?php
if (!isset($_GET['catPage']) || !isset($_GET['catId'])) {
    exit;
}

$categoryID = $_GET['catId'];
$page = $_GET['catPage'];
$offset = 3*$page;

$args = array( 'posts_per_page' => 3, 'category' => $categoryID, 'offset' => $offset, 'order'=> 'DESC', 'orderby' => 'date' );
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

            <img src="<?php echo $productImage['image']; ?>" alt="<?php echo _($productImage['title']); ?>">

        </figure>

        <figcaption><?php echo get_field('price', $post->ID); ?></figcaption>

    </a>
<?php
}
?>