<?php
include './include/config.php';
$obj = new db_class();
$site_basic_info = $obj->FlyQuery("SELECT * FROM site_basic_info order by id limit 1 ");
?>
<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
    <head>
        <title>Contact Us </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!--meta info-->
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <!--<link rel="icon" type="image/ico" href="images/fav.ico">-->
        <!--stylesheet include-->
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/jquery.custom-scrollbar.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/owl.carousel.css">
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
                <?php include './include/header.php'; ?>
            </header>
            <!--breadcrumbs-->
            <section class="breadcrumbs">
                <div class="container">
                    <ul class="horizontal_list clearfix bc_list f_size_medium">
                        <li class="m_right_10 current"><a href="#" class="default_t_color">Home<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
                        <li><a href="#" class="default_t_color">Contacts</a></li>
                    </ul>
                </div>
            </section>
            <!--content-->
            <div class="page_content_offset">
                <div class="container">
                    <div class="row clearfix">
                        <!--left content column-->
                        <section class="col-lg-9 col-md-9 col-sm-9">
                            <h2 class="tt_uppercase color_dark m_bottom_25">Contacts</h2>
                            <div class="r_corners photoframe map_container shadow m_bottom_45">
                                <iframe src="<?php echo $site_basic_info[0]->map; ?>"></iframe>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30">
                                    <h2 class="tt_uppercase color_dark m_bottom_25">Contact Info</h2>
                                    <ul class="c_info_list">
                                        <li class="m_bottom_10">
                                            <div class="clearfix m_bottom_15">
                                                <i class="fa fa-map-marker f_left color_dark"></i>
                                                <p class="contact_e"> <?php echo html_entity_decode($site_basic_info[0]->address); ?></p>
                                            </div>
                                        </li>
                                        <li class="m_bottom_10">
                                            <div class="clearfix m_bottom_10">
                                                <i class="fa fa-phone f_left color_dark"></i>
                                                <p class="contact_e"><?php echo $site_basic_info[0]->office_number; ?></p>
                                            </div>
                                        </li>
                                        <li class="m_bottom_10">
                                            <div class="clearfix m_bottom_10">
                                                <i class="fa fa-mobile f_left color_dark" style="font-size: 20px;"></i>
                                                <p class="contact_e"><?php echo $site_basic_info[0]->mobile_number; ?></p>
                                            </div>
                                        </li>
                                        <li class="m_bottom_10">
                                            <div class="clearfix m_bottom_10">
                                                <i class="fa fa-envelope f_left color_dark"></i>
                                                <a class="contact_e default_t_color" href="mailto:#"><?php echo $site_basic_info[0]->email; ?></a>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 m_xs_bottom_30">
                                    <h2 class="tt_uppercase color_dark m_bottom_25">Contact Form</h2>
                                    <p class="m_bottom_10">Send an email. All fields with an <span class="scheme_color">*</span> are required.</p>
                                    <form id="contactform">
                                        <ul>
                                            <li class="clearfix m_bottom_15">
                                                <div class="f_left half_column">
                                                    <label for="cf_name" class="required d_inline_b m_bottom_5">Your Name</label>
                                                    <input type="text" id="cf_name" name="name" class="full_width r_corners">
                                                </div>
                                                <div class="f_left half_column">
                                                    <label for="cf_email" class="required d_inline_b m_bottom_5">Email</label>
                                                    <input type="email" id="cf_email" name="email" class="full_width r_corners">
                                                </div>
                                            </li>
                                            <li class="m_bottom_15">
                                                <label for="cf_subject" class="d_inline_b m_bottom_5">Subject</label>
                                                <input type="text" id="cf_subject" name="subject" class="full_width r_corners">
                                            </li>
                                            <li class="m_bottom_15">
                                                <label for="cf_message" class="d_inline_b m_bottom_5 required">Message</label>
                                                <textarea id="cf_message" name="message" class="full_width r_corners"></textarea>
                                            </li>
                                            <li>
                                                <button class="button_type_4 bg_light_color_2 r_corners mw_0 tr_all_hover color_dark">Send</button>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <!--right column-->
                        <aside class="col-lg-3 col-md-3 col-sm-3">
                            <!--widgets-->
                            <figure class="widget shadow r_corners wrapper m_bottom_30">
                                <figcaption>
                                    <h3 class="color_light">Categories</h3>
                                </figcaption>
                                <div class="widget_content">
                                    <!--Categories list-->
                                    <ul class="categories_list">
                                        <li class="active">
                                            <a href="#" class="f_size_large scheme_color d_block relative">
                                                <b>Product Category</b>
                                                <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                            </a>
                                            <ul>
                                                <?php
                                                $product_category_name = $obj->FlyQuery("SELECT * FROM product_category_name order by id desc");
                                                if (!empty($product_category_name)) {
                                                    foreach ($product_category_name as $product_category):
                                                        ?>
                                                        <li><a href="category.php?filter=<?php echo $product_category->id; ?>" class="color_dark d_block"><?php echo $product_category->name; ?></a></li>
                                                        <?php
                                                    endforeach;
                                                }
                                                ?>
                                            </ul>
                                            <!--second level-->
                                            
                                        </li>
                                        <li>
                                            <a href="#" class="f_size_large color_dark d_block relative">
                                                <b>Brand</b>
                                                <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                            </a>
                                            <ul class="d_none">
                                                <?php
                                                $brand_name = $obj->FlyQuery("SELECT * FROM brand_name order by id desc");
                                                if (!empty($brand_name)) {
                                                    foreach ($brand_name as $brand):
                                                        ?>
                                                        <li><a href="brand.php?filter=<?php echo $brand->id; ?>" class="color_dark d_block"><?php echo $brand->name; ?></a></li>
                                                        <?php
                                                    endforeach;
                                                }
                                                ?>
                                            </ul>
                                            <!--second level-->

                                        </li>

                                    </ul>
                                </div>
                            </figure>
                            <!--compare products-->
                            <figure class="widget shadow r_corners wrapper m_bottom_30">
                                <figcaption>
                                    <h3 class="color_light">Compare Products</h3>
                                </figcaption>
                                <div class="widget_content">
                                    You have no product to compare.
                                </div>
                            </figure>
                            <!--banner-->
                            <a href="#" class="d_block r_corners m_bottom_30">
                                <img src="images/banner_img_6.jpg" alt="">
                            </a>
                        </aside>
                    </div>
                </div>
            </div>
            <!--markup footer-->
            <footer id="footer">
                <?php include './include/footer.php'; ?>
            </footer>
        </div>
        <!--social widgets-->
        <?php include './include/social_widgets.php'; ?>

        <button class="t_align_c r_corners tr_all_hover type_2 animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>
        <!--scripts include-->
        <script src="js/jquery-2.1.0.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/retina.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/jquery.tweet.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.custom-scrollbar.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>