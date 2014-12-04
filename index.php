<?php get_header(); ?>

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

<section class="page-section gallery" id="gallery">

    <div class="page-frame">


        <h1>
            <?php
                echo __(get_the_title(41));
            ?>
        </h1>

        <div class="catalog-list">

            <div class="catalog papuosalai">

                <h3>Kaklo papuošalai</h3>

                <img src="http://lorempixel.com/960/275/nature/" alt="">

                <a href="/gallery.html"><?php getQVertimas('view_gallery'); ?></a>

            </div>

            <div class="catalog sages dir-right">

                <h3>Sagės</h3>

                <img src="http://lorempixel.com/960/275/nature/" alt="">

                <a href="/gallery.html"><?php getQVertimas('view_gallery'); ?></a>

            </div>

            <div class="catalog apyrankes">

                <h3>Apyrankės</h3>

                <img src="http://lorempixel.com/960/275/nature/" alt="">

                <a href="/gallery.html"><?php getQVertimas('view_gallery'); ?></a>

            </div>

            <div class="catalog auskarai dir-right">

                <h3>Auskarai</h3>

                <img src="http://lorempixel.com/960/275/nature/" alt="">

                <a href="/gallery.html"><?php getQVertimas('view_gallery'); ?></a>

            </div>

            <div class="catalog aksesuarai">

                <h3>Galvos aksesuarai</h3>

                <img src="http://lorempixel.com/960/275/nature/" alt="">

                <a href="/gallery.html"><?php getQVertimas('view_gallery'); ?></a>

            </div>

        </div>



    </div>

</section>

<section class="page-section contact" id="contact">

    <div id="contact-map"></div>

    <div class="page-frame">

        <div class="contact-box">

            <div class="contact-header">

                <dl>

                    <dt><img src="<?php echo get_template_start(); ?>content/images/icn-phone.png" alt=""><?php getQVertimas('main_form_phone'); ?>:</dt>

                    <dd><?php echo __(get_field('phone_con', 44)); ?></dd>

                    <dt><img src="<?php echo get_template_start(); ?>content/images/icn-address.png" alt=""><?php getQVertimas('main_address'); ?>:</dt>

                    <dd><?php echo __(get_field('address_con', 44)); ?></dd>

                    <dt><img src="<?php echo get_template_start(); ?>content/images/icn-facebook.png" alt=""><?php getQVertimas('main_facebook'); ?>:</dt>

                    <dd><?php echo __(get_field('facebook_con', 44)); ?></dd>

                </dl>

            </div>

            <div class="contact-form">

                <a class="link-toggle js-toggle">&ndash;</a>

                <?php
                    $ct_shortcode = translate_phrases_of_forms(do_shortcode('[contact-form-7 id="76" title="Be pavadinimo"]'))    ;
                    echo $ct_shortcode;
                ?>
                <?php /*
                <form method="post" action="" class="js-contactform">

                    <div class="two-columns clearfix">

                        <div class="form-row">

                            <label for="fname">vardas</label>

                            <input type="text" id="fname" name="fname" class="textfield required js-field" placeholder="vardas" title="&nbsp;">

                        </div>

                        <div class="form-row">

                            <label for="lname">pavardė</label>

                            <input type="text" id="lname" name="lname" class="textfield js-field" placeholder="pavardė" title="&nbsp;">

                        </div>

                    </div>
                    <div class="two-columns clearfix">

                        <div class="form-row">

                            <label for="email">el. paštas</label>

                            <input type="email" id="email" name="email" class="textfield required js-field" placeholder="el. paštas" title="&nbsp;">

                        </div>

                        <div class="form-row">

                            <label for="phone">telefonas</label>

                            <input type="text" id="phone" name="phone" class="textfield required js-field" placeholder="telefonas" title="&nbsp;">

                        </div>

                    </div>
                    <div class="form-row textarea-row">

                        <label for="textarea">žinutė</label>

                        <textarea id="textarea" class="textarea required js-field" name="zinute" placeholder="žinutė" title="&nbsp;"></textarea>

                    </div>
                    <div class="form-row">

                        <button class="btn">siųsti žinutę</button>

                    </div>

                </form>
 */ ?>

            </div>

        </div>

    </div>

</section>


<?php get_footer(); ?>
