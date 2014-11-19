<h2> <?php
    echo do_shortcode(get_the_title(get_the_ID()));
    ?>
</h2>
<div>
    <div><span>Tel. nr.</span><span><?php echo get_field('phone_con', 16); ?></span></div>
    <div><span>Adresas</span><span><?php echo get_field('address_con', 16); ?></span></div>
    <div><span>Facebook</span><span><?php echo get_field('facebook_con', 16); ?></span></div>
</div>
