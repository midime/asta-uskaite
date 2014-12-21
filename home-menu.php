<?php

?>

        <?php
        	if (is_home()) {
            	$postURL = '';
        	} else {
        		$postURL = str_replace(home_url() . '/', '', get_post_permalink(get_the_ID()));
        	}
        ?>
<a class="icn-nav-menu js-nav-toggler"></a>
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


            <a href="/<?php echo WEBFOLDER; ?>/<?php echo $postURL; ?>">LT</a>

            <a href="/<?php echo WEBFOLDER; ?>/en/<?php echo $postURL; ?>">ENG</a>

        </span>

</nav>