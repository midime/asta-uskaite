<?php get_header(); ?>

<section class="page-section promo" id="promo">
    <div id="promo-slide">
        <div class="slide brooches">
            <div class="page-frame">
                <div class="slide-content">
                    <h2><?php getQVertimas('cat_brooches'); ?></h2>
                    <a href="<?php echo getLanguageLink('/sages/'); ?>" class="btn"><?php getQVertimas('view_gallery'); ?></a>
                </div>
            </div>
        </div>
        <div class="slide necklaces">
            <div class="page-frame">
                <div class="slide-content">
                    <h2><?php getQVertimas('cat_necklaces'); ?></h2>
                    <a href="<?php echo getLanguageLink('/kaklo-papuosalai/'); ?>" class="btn"><?php getQVertimas('view_gallery'); ?></a>
                </div>
            </div>
        </div>
        <div class="slide earrings">
            <div class="page-frame">
                <div class="slide-content">
                    <h2><?php getQVertimas('cat_earrings'); ?></h2>
                    <a href="<?php echo getLanguageLink('/auskarai/'); ?>" class="btn"><?php getQVertimas('view_gallery'); ?></a>
                </div>
            </div>
        </div>
        <div class="slide bracelets">
            <div class="page-frame">
                <div class="slide-content">
                    <h2><?php getQVertimas('cat_bracelets'); ?></h2>
                    <a href="<?php echo getLanguageLink('/apyrankes/'); ?>" class="btn"><?php getQVertimas('view_gallery'); ?></a>
                </div>
            </div>
        </div>
        <div class="slide accessories">
            <div class="page-frame">
                <div class="slide-content">
                    <h2><?php getQVertimas('cat_head_accessories'); ?></h2>
                    <a href="<?php echo getLanguageLink('/galvos-aksesuarai/'); ?>" class="btn"><?php getQVertimas('view_gallery'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section about" id="about">

    <div class="page-frame clearfix">
        <h1>
            <?php
                echo __(get_the_title(39));
            ?>
        </h1>

        <?php
            $post_about_me = get_post(39);
            echo __($post_about_me->post_content);
        ?>

    </div>

</section>

<?php include("html-footer.php"); ?>
<?php get_footer(); ?>
