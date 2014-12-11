<nav class="nav-catalog">
    <?php
        $currentPageId = get_the_ID();

        if ($currentPageId == 41) {
            $currentPageId = 46
        }

        $args = array( 'posts_per_page' => 99, 'category' => 12, 'order'=> 'DESC', 'orderby' => 'date' );
        $postList = get_posts( $args );

        foreach ( $postList as $post ) {
    ?>
            <a href="<?php echo get_permalink($post->ID); ?>" <?php if ($currentPageId == get_the_ID()) { ?>class="active"<?php } ?>><?php echo __(get_the_title()); ?></a>
    <?php
        }
        wp_reset_postdata();
    ?>
</nav>