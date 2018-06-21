<div id="menu" class="hidden-print hidden-xs">
    <div class="sidebar sidebar-inverse">
        <div class="sidebarMenuWrapper" style="top:0px !important;">
            <ul class="list-unstyled">
                <li><a href="index.php"><i class=" icon-projector-screen-line"></i><span>Dashboard</span></a></li>
                <!--                <li class="hasSubmenu">
                                    <a href="#" data-target="#menu-style" data-toggle="collapse"><i class="icon-compose"></i><span>Menu &amp; Navbar</span></a>
                                    <ul class="collapse" id="menu-style">
                                        <li><a href=""><span class="pull-right badge badge-primary"><i class="fa fa-check"></i></span>Sidebar Menu Dark</a></li>
                                        <li><a href="">Sidebar Menu Light</a></li>
                                        <li><a href="">Top Menu Dark</a></li>
                                        <li><a href="">Top Menu Light</a></li>
                                        <li><a href=""><span class="pull-right badge badge-primary"><i class="fa fa-check"></i></span>Top Menu Primary</a></li>
                                    </ul>
                                </li>-->

                <li><a href="setting.php"><i class="icon-cogs"></i><span> Setting</span></a></li>

                <?php
//                $sqlpage = $obj->FlyQuery("SELECT * FROM page_info ORDER BY page_name ASC");
//                if (!empty($sqlpage))
//                    foreach ($sqlpage as $page):
//                        ?>
                        <!--<li><a href="<?php //echo $page->page_name; ?>"><i class="fa fa-folder-o"></i><span> <?php //echo $page->menu_name; ?></span></a></li>-->
                        <?php
//                    endforeach;
//                ?>
                        
                        <li><a href="./site_basic_info.php"><i class="fa fa-cogs"></i><span> Site Setting</span></a></li> 
                        <li><a href="./about_us.php"><i class=" fa fa-hand-o-right"></i><span> About Us</span></a></li> 
                <li class="hasSubmenu">
                    <a href="#" data-target="#account" data-toggle="collapse"><i class="icon-compose"></i>Product</a>
                    <ul class="collapse" id="account">
                        <li><a href="./brand_name.php"><i class="fa fa-caret-right"></i>Brand Name</a></li>
                        <li><a href="./product_category_name.php"><i class="fa fa-caret-right"></i>Product Category Name</a></li>
                        <li><a href="./product.php"><i class="fa fa-caret-right"></i>Add Product</a></li>
                    </ul>
                </li>
                <li><a href="./our_services.php"><i class="fa fa-hand-o-right"></i><span> Our Service</span></a></li>
                <li><a href="./slider.php"><i class="fa fa-hand-o-right"></i><span> Add Slider</span></a></li>
                <li><a href="./ads.php"><i class="fa fa-hand-o-right"></i><span> Add Ads</span></a></li>
            </ul>
        </div>
    </div>
</div>