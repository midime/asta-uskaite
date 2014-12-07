    <!DOCTYPE html>

<!--[if lte IE 7]>

<html class="ie7 page-home"><![endif]-->

<!--[if IE 8]>

<html class="ie8 page-home"><![endif]-->

<!--[if IE 9]>

<html class="ie9 page-home"><![endif]-->

<!--[if !IE]><!-->

<html class="page-home"><!--<![endif]-->

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

    <script src="/scripts/html5shim.js" type="text/javascript"></script>

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

	<body>

        <?php if (is_front_page()) { ?>
            <div class="page-header home">
                <div class="page-frame clearfix">
                    <a href="#" class="logo">
                        <img src="<?php echo get_template_start(); ?>content/images/logo.png" alt="Asta Uskaite">
                    </a>
                    <?php include("home-menu.php"); ?>
                </div>
            </div>
            <section class="page-section promo" id="promo">
                <div id="promo-slide">
                    <div class="slide s01"></div>
                    <div class="slide s02"></div>
                    <div class="slide s03"></div>
                    <div class="slide s04"></div>
                    <div class="slide s05"></div>
                </div>
            </section>
        <?php } ?>

        <header class="page-header <?php if (is_front_page()) { ?> js-header"<?php } ?>">

                <div class="page-frame clearfix">

                <a href="#" class="logo">
                    <img src="<?php echo get_template_start(); ?>content/images/logo-black.png" alt="Asta Uskaite">
                </a>
                <?php include("home-menu.php"); ?>

                </div>

        </header>