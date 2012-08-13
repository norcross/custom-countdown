<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php bloginfo('name') ?></title>
        
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
        
        
    <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/lib/css/ie.css" />
    <![endif]-->
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<div id="wrapper">
<header>
    <h1 class="logo"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name') ?>" /></h1>
</header>

