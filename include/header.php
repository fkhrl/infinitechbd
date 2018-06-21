<?php
$home = $obj->FlyQuery("SELECT * FROM site_basic_info order by id limit 1 ");
$photo = $obj->FlyQuery("SELECT * FROM product order by id limit 1 ");
?>
<section class="h_bot_part container">
    <div class="clearfix row">
        <div class="col-lg-8 col-md-8 col-sm-6 t_xs_align_c">
            <a href="index.php" class="logo m_xs_bottom_15 d_xs_inline_b">
                <img src="cms-admin/upload/<?php echo $home[0]->photo; ?>" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 t_align_r t_xs_align_c">
            <div class="typewriter " style="margin-top:10%; ">
                <h3> <span>Hotline: <?php echo $home[0]->hotline_number; ?></span></h3>
            </div>
        </div>
    </div>
</section>
<!--main menu container-->
<section class="menu_wrap relative">
    <div class="container clearfix">
        <!--button for responsive menu-->
        <button id="menu_button" class="r_corners centered_db d_none tr_all_hover d_xs_block m_bottom_10">
            <span class="centered_db r_corners"></span>
            <span class="centered_db r_corners"></span>
            <span class="centered_db r_corners"></span>
        </button>
        <!--main menu-->
        <nav role="navigation" class="f_left f_xs_none d_xs_none">	
            <ul class="horizontal_list main_menu clearfix">
                <li class="relative f_xs_none m_xs_bottom_5"><a href="index.php" class="tr_delay_hover color_light tt_uppercase"><b>Home</b></a></li>
                <li class="relative f_xs_none m_xs_bottom_5"><a href="about_us.php" class="tr_delay_hover color_light tt_uppercase"><b>About Us</b></a></li>
                <li class="relative f_xs_none m_xs_bottom_5"><a href="" class="tr_delay_hover color_light tt_uppercase"><b>Product</b></a>
                    <!--                                    sub menu-->
                    <div class="sub_menu_wrap top_arrow d_xs_none tr_all_hover clearfix r_corners w_xs_auto">
                        <div class="f_left f_xs_none">
                            <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Product category</b>
                            <ul class="sub_menu first">
                                <?php
                                $product_category_name = $obj->FlyQuery("SELECT * FROM product_category_name order by id desc");
                                if (!empty($product_category_name)) {
                                    foreach ($product_category_name as $product_category):
                                        ?>
                                <li><a class="color_dark tr_delay_hover" href="category.php?filter=<?php echo $product_category->id; ?>"><?php echo $product_category->name; ?></a></li>
                                        <?php
                                    endforeach;
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="f_left m_left_10 m_xs_left_0 f_xs_none">
                            <b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Brand Name</b>
                            <ul class="sub_menu">
                                <?php
                                $brand_name = $obj->FlyQuery("SELECT * FROM brand_name order by id desc");
                                if (!empty($brand_name)) {
                                    foreach ($brand_name as $brand):
                                        ?>
                                        <li><a class="color_dark tr_delay_hover" href="brand.php?filter=<?php echo $brand->id; ?>"><?php echo $brand->name; ?></a></li>
                                        <?php
                                    endforeach;
                                }
                                ?>
                            </ul>
                        </div>
                        
                        <img src="cms-admin/upload/<?php echo $photo[0]->photo_thumble; ?>" class="d_sm_none f_right m_bottom_10" alt="" style="width: 300px;">
                    </div>
                </li>

                <li class="relative f_xs_none m_xs_bottom_5"><a href="contact.php" class="tr_delay_hover color_light tt_uppercase"><b>Contact</b></a></li>
            </ul>
        </nav>
        <button class="f_right search_button tr_all_hover f_xs_none d_xs_none">
            <i class="fa fa-search"></i>
        </button>
    </div>
    <!--search form-->
    <div class="searchform_wrap tf_xs_none tr_all_hover">
        <div class="container vc_child h_inherit relative">
            <form role="search" class="d_inline_middle full_width">
                <input type="text" name="search" placeholder="Type text and hit enter" class="f_size_large">
            </form>
            <button class="close_search_form tr_all_hover d_xs_none color_dark">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
</section>
<?php
    $page = $obj->filename();
?>
<script>
    $(document).ready(function () {
        $("li a[href='<?php echo $page; ?>']").parent("li").attr("class", "current");
    });
</script>
