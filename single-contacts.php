<div id="contact-map"></div>

<div class="overlay"></div>
<div class="page-frame page-content page-contact">

    <div class="js-product-form">
        <h1><?php echo do_shortcode(get_the_title(get_the_ID())); ?></h1>
        <div class="contacts centered">
            <?php getQVertimas('contact_message'); ?>
        </div>
        <div class="contact-form-messages">
            <div class="ferror" style="display: none"><?php getQVertimas('contact_form_error_message'); ?></div>
        </div>
        <?php
            //$ct_shortcode = translate_phrases_of_forms(do_shortcode('[contact-form-7 id="77" title="Be pavadinimo"]'));
            $ct_shortcode = translate_phrases_of_forms(do_shortcode('[contact-form-7 id="81" title="Be pavadinimo"]'));
            echo $ct_shortcode;
        ?>
    </div>
    <div class="contact-form-messages">
        <div class="fsuccess" style="display: none"><?php getQVertimas('contact_form_success_message'); ?></div>
    </div>

</div>


