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

<nav class="page-nav">

    <a href="#about">Apie mane</a>

    <a href="#gallery">Galerija</a>

    <a href="#contact">Kontaktai</a>

        <span class="lang-nav">

            <a href="#nolink">LT</a>

            <a href="#nolink">ENG</a>

        </span>

</nav>