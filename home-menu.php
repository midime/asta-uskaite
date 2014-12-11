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

        <?php
            $postURL = str_replace(home_url() . '/', '', get_post_permalink(get_the_ID()));
        ?>

        <span class="lang-nav">


            <a href="/staging/<?php echo $postURL; ?>">LT</a>

            <a href="/staging/en/<?php echo $postURL; ?>">ENG</a>

        </span>

</nav>