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
    <div class="form-response">
        <span class="fsuccess"><?php getQVertimas('form_success_message'); ?></span>
        <span class="ferror"><?php getQVertimas('form_error_message'); ?></span>
    </div>
</div>


