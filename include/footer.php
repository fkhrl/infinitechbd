<?php
$home = $obj->FlyQuery("SELECT * FROM site_basic_info order by id limit 1 ");
?>
<div class="footer_top_part">
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
                <h3 class="color_light_2 m_bottom_20">About Us</h3>
                <p class="m_bottom_25">To provide highly customized, groundbreaking technology solutions that further our customers' business goals and objectives. To be elemental in the "Idea Cycle" – from Vision, to Design, to Development, to Implementation.</p>
                <!--social icons-->
                <ul class="clearfix horizontal_list social_icons">
                    <li class="facebook m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Facebook</span>
                        <a href="<?php echo $home[0]->facebook_link; ?>" target="_blank" class="r_corners t_align_c tr_delay_hover f_size_ex_large">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="twitter m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Twitter</span>
                        <a href="<?php echo $home[0]->twitter_link; ?>" target="_blank" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="google_plus m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Google Plus</span>
                        <a href="<?php echo $home[0]->google_plus_link; ?>" target="_blank" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </li>
                    <li class="youtube m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Youtube</span>
                        <a href="<?php echo $home[0]->youtube_link; ?>" target="_blank" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-youtube-play"></i>
                        </a>
                    </li>
                    <li class="envelope m_left_5 m_bottom_5 relative">
                        <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Contact Us</span>
                        <a href="config.php" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
                            <i class="fa fa-envelope-o"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
                <h3 class="color_light_2 m_bottom_20">Product Category</h3>
                <ul class="vertical_list">
                    <?php
                    $product_category_name = $obj->FlyQuery("SELECT * FROM product_category_name order by id desc");
                    if (!empty($product_category_name)) {
                        foreach ($product_category_name as $product_category):
                            ?>
                            <li><a class="color_light tr_delay_hover" href="#"><?php echo $product_category->name; ?><i class="fa fa-angle-right"></i></a></li>
                            <?php
                        endforeach;
                    }
                    ?>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
                <h3 class="color_light_2 m_bottom_20">Brand Name</h3>
                <ul class="vertical_list">

                    <?php
                    $brand_name = $obj->FlyQuery("SELECT * FROM brand_name order by id desc");
                    if (!empty($brand_name)) {
                        foreach ($brand_name as $brand):
                            ?>
                            <li><a class="color_light tr_delay_hover" href="#"><?php echo $brand->name; ?><i class="fa fa-angle-right"></i></a></li>
                            <?php
                        endforeach;
                    }
                    ?>

                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h3 class="color_light_2 m_bottom_20">Newsletter</h3>
                <p class="f_size_medium m_bottom_15">Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                <form id="newsletter">
                    <input type="email" placeholder="Your email address" class="m_bottom_20 r_corners f_size_medium full_width" name="newsletter-email">
                    <button type="submit" class="button_type_8 r_corners bg_scheme_color color_light tr_all_hover">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--copyright part-->
<div class="footer_bottom_part">
    <div class="container clearfix t_mxs_align_c">
        <p class="f_left f_mxs_none m_mxs_bottom_10">&copy; <?php echo date('Y') ?> <span class="color_light">amsoftltd</span>. All Rights Reserved.</p>
        <ul class="f_right horizontal_list clearfix f_mxs_none d_mxs_inline_b">
            <li><img src="images/payment_img_1.png" alt=""></li>
            <li class="m_left_5"><img src="images/payment_img_2.png" alt=""></li>
            <li class="m_left_5"><img src="images/payment_img_3.png" alt=""></li>
            <li class="m_left_5"><img src="images/payment_img_4.png" alt=""></li>
            <li class="m_left_5"><img src="images/payment_img_5.png" alt=""></li>
        </ul>
    </div>
</div>
