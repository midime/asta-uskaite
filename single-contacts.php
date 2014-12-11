<div id="contact-map"></div>

<div class="overlay"></div>
<div class="page-frame page-content page-contact">

    <h1><?php echo do_shortcode(get_the_title(get_the_ID())); ?></h1>
    <div class="contacts centered">
        <span class="tel"><?php echo get_field('phone_con', 44); ?></span>
        <span class="address"><a href="" class="js-contact"><?php echo get_field('address_con', 44); ?></a></span>
        <span class="facebook"><?php echo get_field('facebook_con', 44); ?></span>
    </div>
    <?php
        //$ct_shortcode = translate_phrases_of_forms(do_shortcode('[contact-form-7 id="77" title="Be pavadinimo"]'));
        $ct_shortcode = translate_phrases_of_forms(do_shortcode('[contact-form-7 id="81" title="Be pavadinimo"]'));
        echo $ct_shortcode;
    ?>
    <form action="" method="post">
        <div class="field-wrapper">
            <input type="text" id="name1" name="name" class="field-text required" value="" placeholder="Vardas">
        </div>
        <div class="field-wrapper">
            <input type="text" id="name2" name="fname" class="field-text required" value="" placeholder="Pavardė">
        </div>
        <div class="field-wrapper">
            <input type="email" id="email" name="email" class="field-text required" value="" placeholder="El. paštas">
        </div>
        <div class="field-wrapper">
            <input type="text" id="tel" name="tel" class="field-text required" value="" placeholder="Telefonas">
        </div>
        <div class="field-wrapper">
            <textarea id="message" name="message" class="text-area" placeholder="Pastabos"></textarea>
        </div>
        <div class="field-wrapper centered">
            <button type="submit" class="btn dark">Siųsti užklausimą</button>
        </div>
    </form>

</div>


