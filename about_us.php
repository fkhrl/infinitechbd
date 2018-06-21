<?php
include './include/config.php';
$obj = new db_class();
$about_us = $obj->FlyQuery("SELECT * FROM about_us order by id limit 1 ");
?>
<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
    <head>
        <title><?php echo $about_us[0]->page_title; ?> </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!--meta info-->
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <link rel="icon" type="image/ico" href="images/fav.ico">
        <!--stylesheet include-->
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/style.css">
        <!--font include-->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <script src="js/modernizr.js"></script>
    </head>
    <body>
        <!--boxed layout-->
        <div class="boxed_layout relative w_xs_auto">
            <!--[if (lt IE 9) | IE 9]>
                    <div style="background:#fff;padding:8px 0 10px;">
                    <div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>
            <![endif]-->
            <!--markup header-->
            <header role="banner">

                <!--header bottom part-->
                <?php include'./include/header.php' ?>
            </header>
            <!--breadcrumbs-->
            <section class="breadcrumbs">
                <div class="container">
                    <ul class="horizontal_list clearfix bc_list f_size_medium">
                        <li class="m_right_10 current"><a href="./" class="default_t_color">Home<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
                        <li><a href="" class="default_t_color"><?php echo $about_us[0]->page_title; ?></a></li>
                    </ul>
                </div>
            </section>
            <!--content-->
            <div class="page_content_offset">
                <div class="container">
                    <div class="about_us_content">
                        <p><?php echo html_entity_decode($about_us[0]->details); ?></p>
                    </div>
                </div>
            </div>
            <!--markup footer-->
            <footer id="footer">
                <?php include './include/footer.php'; ?>
            </footer>
        </div>
        <!--social widgets-->
        <?php include './include/social_widgets.php';?>
        <button class="t_align_c r_corners tr_all_hover type_2 animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>
        <!--scripts include-->
        <script src="js/jquery-2.1.0.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/retina.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.tweet.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>