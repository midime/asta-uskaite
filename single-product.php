<?php
    $cPost = get_post(get_the_ID());

    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM as_postmeta WHERE post_id = ".get_the_ID()." and meta_key = '_easy_image_gallery' LIMIT 0, 1", OBJECT );

    $attachments = get_posts( array(
        'post__in' => explode(',', $results[0]->meta_value),
        'post_type' => 'attachment',
        'posts_per_page' => 1
    ) );

    if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
            $productTitle = apply_filters( 'the_title', $attachment->post_title );
            $productImage = wp_get_attachment_image_src( $attachment->ID, 'full' );
        }
    }

    $postCat = get_the_category();
    $postCatDetails = $wpdb->get_results( "SELECT * FROM as_postmeta INNER JOIN as_posts ON as_posts.post_parent = post_id WHERE meta_value = ".$postCat[0]->cat_ID." and meta_key = 'accessory_category' LIMIT 0, 1", OBJECT );

    $productsPrevNext = getPrevNextProduct(get_the_ID(), $postCat[0]->cat_ID);
?>

<div class="drawer js-drawer">
    <a href="" class="icn-close js-drawer-close"><span>Close</span></a>
    <div class="inner">
        <!-- Drawer Content -->
        <h3><?php getQVertimas('if_order_1'); ?>: <strong><?php echo __(get_field('phone_con', 44)); ?></strong> <?php getQVertimas('if_order_2'); ?>:</h3>
                        <?php
        $ct_shortcode = translate_phrases_of_forms(do_shortcode('[contact-form-7 id="77" title="Be pavadinimo"]'));
        echo $ct_shortcode;
        ?>
<?php /*
        <form action="" method="post">
            <label for="name1">Vardas:</label>
            <div class="field-wrapper">
                <input type="text" id="name1" name="name" class="field-text required" value="">
            </div>
            <label for="name2">Pavardė:</label>
            <div class="field-wrapper">
                <input type="text" id="name2" name="fname" class="field-text required" value="">
            </div>
            <label for="email">El. paštas:</label>
            <div class="field-wrapper">
                <input type="email" id="email" name="email" class="field-text required" value="">
            </div>
            <label for="tel">Telefonas:</label>
            <div class="field-wrapper">
                <input type="text" id="tel" name="tel" class="field-text required" value="">
            </div>
            <label for="message">Pastabos:</label>
            <div class="field-wrapper">
                <textarea id="message" name="message" class="text-area"></textarea>
            </div>
            <div class="field-wrapper">
                <button type="submit" class="btn dark">Siųsti užklausimą</button>
            </div>
        </form>
 */?>
        <!-- Drawer Content End -->
    </div>
</div>

<div class="page-frame page-content">
    <!-- +++ Content Start +++ -->
    <div class="clearfix product">
        <div class="prod-nav">
            <?php if ($productsPrevNext['prev'] ) { ?>
                <a href="<?php echo get_permalink($productsPrevNext['prev']); ?>">prev</a>
            <?php } else { ?>
                <a style="display: none;">prev</a>
            <?php } ?>
            <?php
                 if ($productsPrevNext['next']) {
            ?>
                <a href="<?php echo get_permalink($productsPrevNext['next']); ?>">next</a>
            <?php } ?>
        </div>
        <figure class="product-image">
            <div class="inner">
                <img src="<?php echo $productImage[0]; ?>" alt="<?php echo $productTitle; ?>">
            </div>
        </figure>
        <div class="product-info">
            <div class="inner">
                <h1><?php echo get_the_TITLE(); ?>></h1>
                <?php
                    echo __($cPost->post_content);
                ?>
                <p>
                    <a href="<?php echo get_permalink($postCatDetails[0]->post_id); ?>"><?php echo __($postCatDetails[0]->post_title); ?></a>
                </p>
                <div class="product-price clearfix">
                    <h4><span>€</span><?php echo get_field('price', get_the_ID()); ?></h4>
                    <a href="#nolink" class="btn dark js-show-form"><?php getQVertimas('order'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- +++ Content End +++ -->
</div>