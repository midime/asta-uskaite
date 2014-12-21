<div class="page-frame page-content">
<h1><?php echo __(get_the_title()); ?></h1>

<?php include("product-nav.php"); ?>

<div class="clearfix gallery">

    <?php
    $args = array( 'posts_per_page' => 12, 'category' => 4, 'order'=> 'DESC', 'orderby' => 'date' );
    $postList = get_posts( $args );

    $noLoadMore = false;
    if (count($postList) < 12) {
        $noLoadMore = true;
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

</div>

<p class="centered">

    <a href="#nolink" class="btn js-load-more" <?php if ($noLoadMore) { echo 'style="display: none;"'; } ?>><span>Rodyti daugiau</span></a>

</p>
</div>
<div class="accessory-page-data" style="display: none;" data-category="<?php echo get_field('accessory_category', 46); ?>"></div>
