<div style="margin: 20px;">
    <?php

    $nav_sec_menu_params = array(
        'container' => '',
        'items_wrap' => '<nav class="page-nav">%3$s</nav>',
        'walker'=> new ik_walker(),
        'depth' => 0,
        'theme_location' => 'gallery-menu',

    );

    wp_nav_menu($nav_sec_menu_params);

    ?>
</div>