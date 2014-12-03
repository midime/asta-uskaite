<div id="contact-map"></div>
<div class="overlay"></div>
<div class="page-frame page-content page-contact">
    <h1><?php echo do_shortcode(get_the_title(get_the_ID())); ?></h1>
    <form action="" method="post">
        <div style="text-align: center">
            <div><span>Tel. nr.</span><span><?php echo get_field('phone_con', 16); ?></span></div>
            <div><span><a href="" class="js-contact">Adresas</a></span><span><?php echo get_field('address_con', 16); ?></span></div>
            <div><span>Facebook</span><span><?php echo get_field('facebook_con', 16); ?></span></div>
        </div>
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
        <div class="field-wrapper">
            <button type="submit" class="btn dark">Siųsti užklausimą</button>
        </div>
    </form>

</div>


