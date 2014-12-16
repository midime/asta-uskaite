<!DOCTYPE html>

<!--[if lte IE 7]>
<html class="ie7"><![endif]-->
<!--[if IE 8]>
<html class="ie8"><![endif]-->
<!--[if IE 9]>
<html class="ie9"><![endif]-->
<!--[if !IE]><!-->
<html><!--<![endif]-->

<head>

    <meta charset="utf-8">
    <title>Title</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,700italic|Great+Vibes|Lora:400,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_start(); ?>content/styles/css/styles.css">
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_start(); ?>content/styles/css/custom.css">
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_start(); ?>scripts/html5shim.js" type="text/javascript"></script>
    <![endif]-->

    <script type="text/javascript">

        (function () {
            'use strict';
            var el, head;
            el = document.createElement('script');
            el.type = 'text/javascript';
            el.async = true;
            el.setAttribute("data-main","<?php echo get_template_start(); ?>scripts/main");
            el.src = '<?php echo get_template_start(); ?>scripts/require.js';
            head = document.getElementsByTagName('script')[0];
            head.parentNode.insertBefore(el, head);
        }());

    </script>

</head>

<body<?php if (is_front_page()) { ?> class="home"<?php } ?>>
    <header class="page-header<?php if (is_front_page()) { ?> home<?php } ?>">
        <div class="page-frame clearfix">
            <a href="/<?php echo WEBFOLDER; ?>/" class="logo">
                <?php if (is_front_page()) { ?>
                    <img src="<?php echo get_template_start(); ?>content/images/logo-white.png" alt="Asta Uskaite">
                <?php }else{ ?>
                    <img src="<?php echo get_template_start(); ?>content/images/logo-black.png" alt="Asta Uskaite">
                <?php } ?>
            </a>
            <?php include("home-menu.php"); ?>
        </div>
    </header>