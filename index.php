<?php get_header(); ?>

<section class="page-section promo" id="promo">
    <div id="promo-slide">
        <div class="slide s01"></div>
        <div class="slide s02"></div>
        <div class="slide s03"></div>
        <div class="slide s04"></div>
        <div class="slide s05"></div>
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

        <div class="clearfix">

            <figure class="img-frame">
                <img src="http://lorempixel.com/g/211/252/fashion/" alt="Asta Uskaite">
            </figure>

            <figure class="img-frame">
                <img src="http://lorempixel.com/g/211/252/fashion/" alt="Asta Uskaite">
            </figure>

            <figure class="img-frame">
                <img src="http://lorempixel.com/g/211/252/fashion/" alt="Asta Uskaite">
            </figure>

        </div>
    </div>

</section>

<?php get_footer(); ?>
