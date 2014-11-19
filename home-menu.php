<div style="margin: 20px;">
    <?php

    $nav_sec_menu_params = array(
        'container' => '',
        'items_wrap' => '<nav class="page-nav">%3$s</nav>',
        'walker'=> new ik_walker(),
        'depth' => 0,
        'theme_location' => 'home-menu',

    );

    wp_nav_menu($nav_sec_menu_params);

    ?>

    <div class="lang">
        <a href="/staging/">Non SEO Home | </a>
        <a href="?p=39">Non SEO About me | </a>
        <a href="?p=41">Non SEO Gallery | </a>
        <a href="?p=44">Non SEO Contacts</a>

    </div>

    <div class="lang">
        <a href="/">LT</a>
        <a href="/en/">EN</a>
    </div>
</div>