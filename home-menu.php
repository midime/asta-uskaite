<?php

?>

<nav class="page-nav">
        <?php
            $nav_sec_menu_params = array(
                'container' => '',
                'items_wrap' => '%3$s',
                'walker'=> new ik_walker(),
                'depth' => 0,
                'theme_location' => 'home-menu',

            );

            wp_nav_menu($nav_sec_menu_params);
        ?>

        <span class="lang-nav">

            <a href="/">LT</a>

            <a href="/en/">ENG</a>

        </span>

</nav>