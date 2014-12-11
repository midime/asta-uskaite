<?php $accessoryPageId = get_the_ID(); ?>
<div class="page-frame page-content">

    <h1><?php getQVertimas('gallery_title'); ?></h1>

    <?php
        include("product-nav.php");
    ?>

    <div class="clearfix gallery">

        <?php
            $args = array( 'posts_per_page' => 3, 'category' => get_field('accessory_category', $accessoryPageId), 'order'=> 'DESC', 'orderby' => 'date' );
            $postList = get_posts( $args );

            foreach ( $postList as $post ) {
                $productImage = getProductImageObject($post->ID);
        ?>
                <a href="<?php echo get_permalink($post->ID); ?>" class="tile">
                    <figure>
                        <div class="thumb-wrapper">
                            <div class="thumb-inner">
                                <img src="<?php echo $productImage['image']; ?>" alt="<?php echo __($productImage['title']); ?>">
                            </div>
                        </div>
                    </figure>
                    <figcaption><span>€</span><?php echo get_field('price', $post->ID); ?></figcaption>
                </a>
        <?php
            }

            wp_reset_postdata();
        ?>

    </div>

    <p class="centered">
        <a href="#nolink" class="btn js-load-more"><span><?php getQVertimas('show_more'); ?></span></a>
    </p>

</div>
<div class="accessory-page-data" style="display: none;" data-category="<?php echo get_field('accessory_category', $accessoryPageId); ?>"></div>