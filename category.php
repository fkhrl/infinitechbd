<?php
include './include/config.php';
$obj = new db_class();
$filter = $_GET['filter'];
//print_r($filter);
$product = $obj->FlyQuery("SELECT 
                                    p.id,
                                    p.name,
                                    bn.name as brand_name,
                                    pcn.name as Product_category_name,
                                    p.`photo_thumble`,
                                    p.`photo_1`,
                                    p.`photo_2`,
                                    p.`photo_3`,
                                    p.`photo_4`,
                                    p.`purchase_price`,
                                    p.`sell_price`,
                                    p.`quantity`,
                                    p.`details`,
                                    p.`product_code`,
                                    p.`manufacturer`
                                    FROM `product` as p
                                    Left Join brand_Name as bn ON bn.id = p.`brand_id`
                                    Left Join product_category_name as pcn ON pcn.id = p.`product_category_id`
                                    Where  p.`product_category_id`='$filter' ");
?>
<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
    <head>
        <title><?php echo $product[0]->Product_category_name; ?></title>
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
        <!--wide layout-->
        <div class="wide_layout relative">
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
                        <li><a href="#" class="default_t_color"><?php echo $product[0]->Product_category_name; ?><i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
                    </ul>
                </div>
            </section>
            <!--content-->
            <div class="page_content_offset">
                <div class="container">
                    <div class="row clearfix">
                        <!--left content column-->
                        <section class="col-lg-9 col-md-9 col-sm-9">
                            <!--products-->
                            <section class="products_container category_grid clearfix m_bottom_15">
                                <!--product item-->
                                <style>
                                    .product { display: block; clear: both}
                                    .product img{width: 230px;  height: 150px;}
                                    .name{width: 200px;}
                                </style>
                                <?php 
                                    if(!empty($product)){
                                        foreach ($product as $product_name):
                                ?>
                                <div class="product_item hit w_xs_full">
                                    <figure class="r_corners photoframe type_2 t_align_c tr_all_hover shadow relative">
                                        <!--product preview-->
                                        <a href="#" class="d_block relative wrapper pp_wrap m_bottom_15 product">
                                            <img src="cms-admin/upload/<?php echo $product_name->photo_thumble; ?>" class="tr_all_hover" alt="">
                                            <span role="button" data-popup="#quick_view_details<?php echo $product_name->id; ?>" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                                        </a>
                                        <!--description and price of product-->
                                        <figcaption>
                                            <h5 class="m_bottom_10"><a href="#" class="color_dark"><?php echo $obj->limit_text($product_name->name,7); ?></a></h5>
                                            <!--rating-->
                                            <ul class="horizontal_list d_inline_b m_bottom_10 clearfix rating_list type_2 tr_all_hover">
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
                                            <p class="scheme_color f_size_large m_bottom_15">Price : BDT. <?php echo $product_name->sell_price; ?></p>	
                                            
                                        </figcaption>
                                    </figure>
                                </div>
                                <?php
                            endforeach;
                                    }
                                ?>
                                
                            </section>               
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
                            <!--Bestsellers-->
                            <figure class="widget shadow r_corners wrapper m_bottom_30">
                                <figcaption>
                                    <h3 class="color_light">Bestsellers</h3>
                                </figcaption>
                                <div class="widget_content">
                                    <div class="clearfix m_bottom_15">
                                        <img src="images/bestsellers_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block bt_link">Ut tellus dolor dapibus</a>
                                        <!--rating-->
                                        <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
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
                                        <p class="scheme_color">$61.00</p>
                                    </div>
                                    <hr class="m_bottom_15">
                                    <div class="clearfix m_bottom_15">
                                        <img src="images/bestsellers_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block bt_link">Elementum vel</a>
                                        <!--rating-->
                                        <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
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
                                        <p class="scheme_color">$57.00</p>
                                    </div>
                                    <hr class="m_bottom_15">
                                    <div class="clearfix m_bottom_5">
                                        <img src="images/bestsellers_img_3.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block bt_link">Crsus eleifend elit</a>
                                        <!--rating-->
                                        <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
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
                                        <p class="scheme_color">$24.00</p>
                                    </div>
                                </div>
                            </figure>
                            <!--tags-->
                            <figure class="widget shadow r_corners wrapper m_bottom_30">
                                <figcaption>
                                    <h3 class="color_light">Tags</h3>
                                </figcaption>
                                <div class="widget_content">
                                    <div class="tags_list">
                                        <a href="#" class="color_dark d_inline_b v_align_b">accessories,</a>
                                        <a href="#" class="color_dark d_inline_b f_size_ex_large v_align_b">bestseller,</a>
                                        <a href="#" class="color_dark d_inline_b v_align_b">clothes,</a>
                                        <a href="#" class="color_dark d_inline_b f_size_big v_align_b">dresses,</a>
                                        <a href="#" class="color_dark d_inline_b v_align_b">fashion,</a>
                                        <a href="#" class="color_dark d_inline_b f_size_large v_align_b">men,</a>
                                        <a href="#" class="color_dark d_inline_b v_align_b">pants,</a>
                                        <a href="#" class="color_dark d_inline_b v_align_b">sale,</a>
                                        <a href="#" class="color_dark d_inline_b v_align_b">short,</a>
                                        <a href="#" class="color_dark d_inline_b f_size_ex_large v_align_b">skirt,</a>
                                        <a href="#" class="color_dark d_inline_b v_align_b">top,</a>
                                        <a href="#" class="color_dark d_inline_b f_size_big v_align_b">women</a>
                                    </div>
                                </div>
                            </figure>
                        </aside>
                    </div>
                </div>
            </div>
            <!--markup footer-->
            <footer id="footer">
                <?php include './include/footer.php';?>
            </footer>
        </div>
        <!--social widgets-->
        <?php include './include/social_widgets.php';?>
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
        <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5306f8f674bfda4c"></script>
    </body>
</html>