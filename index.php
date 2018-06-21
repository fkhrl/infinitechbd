<?php
include './include/config.php';
$obj = new db_class();
$site_basic_info = $obj->FlyQuery("SELECT * FROM site_basic_info order by id limit 1 ");
?>
<!--http://velikorodnov.com/html/flatastic/classic/index.html-->
<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
    <head>
        <title><?php echo $site_basic_info[0]->site_name; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!--meta info-->
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="description" content="">
<!--        <link rel="icon" type="image/ico" href="images/fav.ico">-->
        <!--stylesheet include-->
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/camera.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/owl.transitions.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/jquery.custom-scrollbar.css">
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
            <!--slider-->
            <div class="camera_wrap m_bottom_0">
                <?php
                $slider_image = $obj->FlyQuery("SELECT * FROM slider order by id desc limit 6");
                if (!empty($slider_image)) {
                    foreach ($slider_image as $slider):
                        ?>
                        <div style="width:100%; height:400px !important;" data-src="cms-admin/upload/<?php echo $slider->photo; ?>" data-custom-thumb="cms-admin/upload/<?php echo $slider->photo; ?>" ></div>
                        <?php
                    endforeach;
                }
                ?>
            </div>
            <!--content-->
            <div class="page_content_offset">
                <div class="container">
                    <h2 class="tt_uppercase m_bottom_20 color_dark heading1 animate_ftr">All Products</h2>
                    <!--filter navigation of products-->
                    <ul class="horizontal_list clearfix tt_uppercase isotope_menu f_size_ex_large">
                        <li class="active m_right_5 m_bottom_10 m_xs_bottom_5 animate_ftr"><button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter="*">All</button></li>
                        <?php
                        $brand_name = $obj->SelectAll("brand_name");
                        //print_r($brand_name);
                        if (!empty($brand_name)) {
                            foreach ($brand_name as $brand):
                                ?>
                                <li class="m_right_5 m_bottom_10 m_xs_bottom_5 animate_ftr">
                                    <button class="button_type_2 bg_light_color_1 r_corners tr_delay_hover tt_uppercase box_s_none" data-filter="#new<?php echo $brand->id; ?>"><?php echo $brand->name; ?></button></li>
                                <?php
                            endforeach;
                        }
                        ?>
                    </ul>
                    <!--products-->
                    <section class="products_container clearfix m_bottom_25 m_sm_bottom_15">
                        <!--product item-->
                        <style>
                            .product { display: block; clear: both}
                            .product img{width: 230px;  height: 150px;}
                            .name{width: 200px;}
                        </style>
                        <script>

                        </script>
                        <?php
                        $product_name = $obj->FlyQuery("SELECT * FROM product order by id DESC limit 12");
                        //print_r($brand_name);
                        if (!empty($product_name)) {
                            foreach ($product_name as $product):
                                ?>
                                <div class="product_item" id="new<?php echo $product->product_category_id; ?>">
                                    <figure class="r_corners photoframe shadow relative hit animate_ftb long">
                                        <!--product preview-->
                                        <a href="#" class="d_block relative pp_wrap product">
                                            <!--hot product-->
                                            <!--<span class="hot_stripe"><img src="images/hot_product.png" alt=""></span>-->
                                            <img src="cms-admin/upload/<?php echo $product->photo_thumble; ?>" class="tr_all_hover" alt="">
                                            <span data-popup="#quick_view_details<?php echo $product->id; ?>" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                                        </a>
                                        <!--description and price of product-->
                                        <figcaption>
                                            <h5 class="m_bottom_10 name"><a href="#" class="color_dark"><?php echo $obj->limit_text(($product->name), 6); ?></a></h5>
                                            <div class="clearfix">
                                                <p class="scheme_color f_left f_size_large m_bottom_15">Price : BDT. <?php echo $product->sell_price; ?></p>
                                                <!--rating-->
                                                <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
                                                    <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                    </li>
                                                    <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                    </li>
                                                    <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                    </li>
                                                    <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                    </li>
                                                </ul>
                                            </div>

                                        </figcaption>
                                    </figure>
                                </div>
                                <?php
                            endforeach;
                        }
                        ?>
                    </section>
                    <!--banners-->
                    <section class="row clearfix m_bottom_45 m_sm_bottom_35">
                        <div class="col-lg-6 col-md-6 col-sm-6 animate_half_tc">
                            <a href="#" class="d_block banner wrapper r_corners relative m_xs_bottom_30">
                                <img src="images/banner_img_1.png" alt="">
                                <span class="banner_caption d_block vc_child t_align_c w_sm_auto">
                                    <span class="d_inline_middle">
                                        <span class="d_block color_dark tt_uppercase m_bottom_5 let_s">New Collection!</span>
                                        <span class="d_block divider_type_2 centered_db m_bottom_5"></span>
                                        <span class="d_block color_light tt_uppercase m_bottom_25 m_xs_bottom_10 banner_title"><b>Colored Fashion</b></span>
                                        <span class="button_type_6 bg_scheme_color tt_uppercase r_corners color_light d_inline_b tr_all_hover box_s_none f_size_ex_large">Shop Now!</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 animate_half_tc">
                            <a href="#" class="d_block banner wrapper r_corners type_2 relative">
                                <img src="images/banner_img_2.png" alt="">
                                <span class="banner_caption d_block vc_child t_align_c w_sm_auto">
                                    <span class="d_inline_middle">
                                        <span class="d_block scheme_color banner_title type_2 m_bottom_5 m_mxs_bottom_5"><b>-50%</b></span>
                                        <span class="d_block divider_type_2 centered_db m_bottom_5 d_sm_none"></span>
                                        <span class="d_block color_light tt_uppercase m_bottom_15 banner_title_3 m_md_bottom_5 d_mxs_none">On All<br><b>Sunglasses</b></span>
                                        <span class="button_type_6 bg_dark_color tt_uppercase r_corners color_light d_inline_b tr_all_hover box_s_none f_size_ex_large">Shop Now!</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </section>
                    <!--product brands-->
                    <div class="clearfix m_bottom_25 m_sm_bottom_20">
                        <h2 class="tt_uppercase color_dark f_left heading2 animate_fade f_mxs_none m_mxs_bottom_15">Product Brands</h2>
                        <div class="f_right clearfix nav_buttons_wrap animate_fade f_mxs_none">
                            <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners pb_prev"><i class="fa fa-angle-left"></i></button>
                            <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners pb_next"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </div>
                    <!--product brands carousel-->
                    <div class="product_brands m_bottom_45 m_sm_bottom_35">
                        <?php
                        $brand_name = $obj->SelectAll("brand_name");
                        //print_r($brand_name);
                        if (!empty($brand_name)) {
                            foreach ($brand_name as $brand):
                                ?>
                                <a href="brand.php?filter=<?php echo $brand->id; ?>" class="d_block t_align_c animate_fade"><img src="cms-admin/upload/<?php echo $brand->photo; ?>" alt=""></a>
                                <?php
                            endforeach;
                        }
                        ?>
                    </div>
                    <!--banners-->
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a href="#" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners red t_align_c tt_uppercase vc_child n_sm_vc_child">
                                <span class="d_inline_middle">
                                    <img class="d_inline_middle m_md_bottom_5" src="images/banner_img_3.png" alt="">
                                    <span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
                                        <b>100% Satisfaction</b><br><span class="color_dark">Guaranteed</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a href="#" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners green t_align_c tt_uppercase vc_child n_sm_vc_child">
                                <span class="d_inline_middle">
                                    <img class="d_inline_middle m_md_bottom_5" src="images/banner_img_4.png" alt="">
                                    <span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
                                        <b>Free Shipping</b><br><span class="color_dark">On All Items</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a href="#" class="d_block animate_ftb h_md_auto banner_type_2 r_corners orange t_align_c tt_uppercase vc_child n_sm_vc_child">
                                <span class="d_inline_middle">
                                    <img class="d_inline_middle m_md_bottom_5" src="images/banner_img_5.png" alt="">
                                    <span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
                                        <b>Great Daily Deals</b><br><span class="color_dark">Shop Now!</span>
                                    </span>
                                </span>
                            </a>
                        </div>
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
        <!--custom popup-->
        <?php
        $product_name = $obj->FlyQuery("SELECT * FROM product order by id DESC limit 12");
        //print_r($brand_name);
        if (!empty($product_name)) {
            foreach ($product_name as $product):
                ?>
                <div class="popup_wrap d_none" id="quick_view_details<?php echo $product->id; ?>">
                    <section class="popup r_corners shadow">
                        <button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i class="fa fa-times"></i></button>
                        <div class="clearfix">
                            <div class="custom_scrollbar">
                                <!--left popup column-->
                                <div class="f_left half_column">

                                    <div class="relative d_inline_b m_bottom_10 qv_preview">
                                        <!--<span class="hot_stripe"><img src="images/sale_product.png" alt=""></span>-->
                                        <img src="cms-admin/upload/<?php echo $product->photo_thumble; ?>" class="tr_all_hover" alt="">
                                    </div>

                                    <!--carousel-->
                                    <div class="relative qv_carousel_wrap m_bottom_20">
                                        <button class="button_type_11 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_prev">
                                            <i class="fa fa-angle-left "></i>
                                        </button>
                                        <ul class="qv_carousel d_inline_middle">
                                            <li data-src="cms-admin/upload/<?php echo $product->photo_1; ?>"><img src="cms-admin/upload/<?php echo $product->photo_1; ?>" alt=""></li>
                                            <li data-src="cms-admin/upload/<?php echo $product->photo_2; ?>"><img src="cms-admin/upload/<?php echo $product->photo_2; ?>" alt=""></li>
                                            <li data-src="cms-admin/upload/<?php echo $product->photo_3; ?>"><img src="cms-admin/upload/<?php echo $product->photo_3; ?>" alt=""></li>
                                            <li data-src="cms-admin/upload/<?php echo $product->photo_4; ?>"><img src="cms-admin/upload/<?php echo $product->photo_4; ?>" alt=""></li>
                                        </ul>
                                        <button class="button_type_11 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_next">
                                            <i class="fa fa-angle-right "></i>
                                        </button>
                                    </div>
                                    <div class="d_inline_middle">Share this:</div>
                                    <div class="d_inline_middle m_left_5">
                                        <!-- AddThis Button BEGIN -->
                                        <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                                            <a class="addthis_button_preferred_1"></a>
                                            <a class="addthis_button_preferred_2"></a>
                                            <a class="addthis_button_preferred_3"></a>
                                            <a class="addthis_button_preferred_4"></a>
                                            <a class="addthis_button_compact"></a>
                                            <a class="addthis_counter addthis_bubble_style"></a>
                                        </div>
                                        <!-- AddThis Button END -->
                                    </div>
                                </div>
                                <!--right popup column-->
                                <div class="f_right half_column">
                                    <!--description-->
                                    <h2 class="m_bottom_10"><a href="#" class="color_dark fw_medium"><?php echo $product->name; ?></a></h2>
                                    <div class="m_bottom_10">
                                        <!--rating-->
                                        <ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
                                            <li class="active">
                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                <i class="fa fa-star active tr_all_hover"></i>
                                            </li>
                                            <li class="active">
                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                <i class="fa fa-star active tr_all_hover"></i>
                                            </li>
                                            <li class="active">
                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                <i class="fa fa-star active tr_all_hover"></i>
                                            </li>
                                            <li class="active">
                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                <i class="fa fa-star active tr_all_hover"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                <i class="fa fa-star active tr_all_hover"></i>
                                            </li>
                                        </ul>
                                        <!--<a href="#" class="d_inline_middle default_t_color f_size_small m_left_5">1 Review(s) </a>-->
                                    </div>
                                    <hr class="m_bottom_10 divider_type_3">
                                    <table class="description_table m_bottom_10">
                                        <tr>
                                            <td>Manufacturer:</td>
                                            <td><a href="#" class="color_dark"><?php echo $product->manufacturer; ?></a></td>
                                        </tr>
                                        <tr>
                                            <td>Availability:</td>
                                            <td><span class="color_green">in stock</span> <?php echo $product->quantity; ?> item(s)</td>
                                        </tr>
                                        <tr>
                                            <td>Product Code:</td>
                                            <td><?php echo $product->product_code; ?></td>
                                        </tr>
                                    </table>
                                    <!--<h5 class="fw_medium m_bottom_10">Product Dimensions and Weight</h5>-->
<!--                                    <table class="description_table m_bottom_5">
                                        <tr>
                                            <td>Product Length:</td>
                                            <td><span class="color_dark">10.0000M</span></td>
                                        </tr>
                                        <tr>
                                            <td>Product Weight:</td>
                                            <td>10.0000KG</td>
                                        </tr>
                                    </table>-->
                                    <hr class="divider_type_3 m_bottom_10">
                                    <p class="m_bottom_10"><?php echo html_entity_decode($product->details); ?></p>
                                    <hr class="divider_type_3 m_bottom_15">
                                    <div class="m_bottom_15">
                                        <!--<s class="v_align_b f_size_ex_large">$152.00</s>-->
                                        <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium">Price : BDT. <?php echo $product->sell_price; ?></span>
                                    </div>
<!--                                    <table class="description_table type_2 m_bottom_15">
                                        <tr>
                                            <td class="v_align_m">Size:</td>
                                            <td class="v_align_m">
                                                <div class="custom_select f_size_medium relative d_inline_middle">
                                                    <div class="select_title r_corners relative color_dark">s</div>
                                                    <ul class="select_list d_none"></ul>
                                                    <select name="product_name">
                                                        <option value="s">s</option>
                                                        <option value="m">m</option>
                                                        <option value="l">l</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v_align_m">Quantity:</td>
                                            <td class="v_align_m">
                                                <div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark">
                                                    <button class="bg_tr d_block f_left" data-direction="down">-</button>
                                                    <input type="text" name="" readonly value="1" class="f_left">
                                                    <button class="bg_tr d_block f_left" data-direction="up">+</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="clearfix m_bottom_15">
                                        <button class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover f_left f_size_large">Add to Cart</button>
                                        <button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0"><i class="fa fa-heart-o f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Wishlist</span></button>
                                        <button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0"><i class="fa fa-files-o f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Compare</span></button>
                                        <button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0 relative"><i class="fa fa-question-circle f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Ask a Question</span></button>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php
            endforeach;
        }
        ?>
        <button class="t_align_c r_corners tr_all_hover animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>
        <!--scripts include-->
        <script src="js/jquery-2.1.0.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/retina.js"></script>
        <script src="js/camera.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.tweet.min.js"></script>
        <script src="js/jquery.custom-scrollbar.js"></script>
        <script src="js/scripts.js"></script>
<!--        <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5306f8f674bfda4c"></script>-->
    </body>
</html>