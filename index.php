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

<header class="page-header js-header">

    <div class="page-frame clearfix">

        <a href="#" class="logo">

            <img src="<?php echo get_template_start(); ?>content/images/logo-black.png" alt="Asta Uskaite">

        </a>

        <?php include("home-menu.php"); ?>

    </div>

</header>

<section class="page-section about" id="about">

    <div class="page-frame clearfix">



        <h1>About</h1>

        <p>Fusce in pretium dui, non interdum diam. Aenean venenatis mattis dignissim. Cras et laoreet eros. Nullam ligula sem, volutpat sed vulputate in, consequat quis magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ante turpis, blandit et laoreet nec, accumsan id odio. Suspendisse sit amet bibendum sem. Vestibulum eget mauris in neque adipiscing porta eget quis dolor. Nunc nec lacinia elit. Integer sodales vel dui eu adipiscing. Pellentesque ac odio libero. </p>

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



        <h1>Galerija</h1>

        <div class="catalog-list">

            <div class="catalog papuosalai">

                <h3>Kaklo papuošalai</h3>

                <img src="http://lorempixel.com/960/275/nature/" alt="">

                <a href="/gallery.html">žiūreti galerija</a>

            </div>

            <div class="catalog sages dir-right">

                <h3>Sagės</h3>

                <img src="http://lorempixel.com/960/275/nature/" alt="">

                <a href="/gallery.html">žiūreti galerija</a>

            </div>

            <div class="catalog apyrankes">

                <h3>Apyrankės</h3>

                <img src="http://lorempixel.com/960/275/nature/" alt="">

                <a href="/gallery.html">žiūreti galerija</a>

            </div>

            <div class="catalog auskarai dir-right">

                <h3>Auskarai</h3>

                <img src="http://lorempixel.com/960/275/nature/" alt="">

                <a href="/gallery.html">žiūreti galerija</a>

            </div>

            <div class="catalog aksesuarai">

                <h3>Galvos aksesuarai</h3>

                <img src="http://lorempixel.com/960/275/nature/" alt="">

                <a href="/gallery.html">žiūreti galerija</a>

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

                    <dt><img src="<?php echo get_template_start(); ?>content/images/icn-phone.png" alt="">tel.:</dt>

                    <dd>+ 370 612 32789</dd>

                    <dt><img src="<?php echo get_template_start(); ?>content/images/icn-address.png" alt="">adresas:</dt>

                    <dd>vilniaus g. 12-1d., kaunas</dd>

                    <dt><img src="<?php echo get_template_start(); ?>content/images/icn-facebook.png" alt="">facebook:</dt>

                    <dd>asta.uskaite.3</dd>

                </dl>

            </div>

            <div class="contact-form">

                <a class="link-toggle js-toggle">&ndash;</a>

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



            </div>

        </div>

    </div>

</section>


<?php get_footer(); ?>
