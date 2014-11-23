<nav class="nav-catalog">
    <?php
    $nav_sec_menu_params = array(
        'container' => '',
        'items_wrap' => '%3$s',
        'walker'=> new ik_walker(),
        'depth' => 0,
        'theme_location' => 'gallery-menu',

    );

    wp_nav_menu($nav_sec_menu_params);
    ?>
</nav>