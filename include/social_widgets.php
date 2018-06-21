<?php
    $site_basic_info = $obj->FlyQuery("SELECT * FROM site_basic_info order by id limit 1 ");
?>
<ul class="social_widgets d_xs_none">
            <!--facebook-->
            <li class="relative">
                <button class="sw_button t_align_c facebook"><i class="fa fa-facebook"></i></button>
                <div class="sw_content">
                    <h3 class="color_dark m_bottom_20">Join Us on Facebook</h3>
                    <iframe src="<?php echo $site_basic_info[0]->facebook_link?>" style="border:none; overflow:hidden; width:235px; height:258px;"></iframe>
                </div>
            </li>
            <!--twitter feed-->
            <li class="relative">
                <button class="sw_button t_align_c twitter"><i class="fa fa-twitter"></i></button>
                <div class="sw_content">
                    <h3 class="color_dark m_bottom_20">Latest Tweets</h3>
                    <div class="twitterfeed m_bottom_25"></div>
                    <a target="_blank" role="button" class="button_type_4 d_inline_b r_corners tr_all_hover color_light tw_color" href="<?php echo $site_basic_info[0]->twitter_link; ?>">Follow on Twitter</a>
                </div>	
            </li>
            <!--contact form-->
            <li class="relative">
                <button class="sw_button t_align_c contact"><i class="fa fa-envelope-o"></i></button>
                <div class="sw_content">
                    <h3 class="color_dark m_bottom_20">Contact Us</h3>
                    
                    <form id="contactform" class="mini">
                        <input class="f_size_medium m_bottom_10 r_corners full_width" type="text" name="name" placeholder="Your name">
                        <input class="f_size_medium m_bottom_10 r_corners full_width" type="email" name="email" placeholder="Email">
                        <textarea class="f_size_medium r_corners full_width m_bottom_20" placeholder="Message" name="message"></textarea>
                        <button type="submit" class="button_type_4 r_corners mw_0 tr_all_hover color_dark bg_light_color_2">Send</button>
                    </form>
                </div>	
            </li>
            <!--contact info-->
            <li class="relative">
                <button class="sw_button t_align_c googlemap"><i class="fa fa-map-marker"></i></button>
                <div class="sw_content">
                    <h3 class="color_dark m_bottom_20">Our Location</h3>
                    <ul class="c_info_list">
                        <li class="m_bottom_10">
                            <div class="clearfix m_bottom_15">
                                <i class="fa fa-map-marker f_left color_dark"></i>
                                <p class="contact_e"><?php echo html_entity_decode($site_basic_info[0]->address); ?></p>
                            </div>
                            <iframe class="r_corners full_width" id="gmap_mini" src="<?php echo $site_basic_info[0]->map?>"></iframe>
                        </li>
                        <li class="m_bottom_10">
                            <div class="clearfix m_bottom_10">
                                <i class="fa fa-phone f_left color_dark"></i>
                                <p class="contact_e"><?php echo $site_basic_info[0]->hotline_number?></p>
                            </div>
                        </li>
                        <li class="m_bottom_10">
                            <div class="clearfix m_bottom_10">
                                <i class="fa fa-envelope f_left color_dark"></i>
                                <a class="contact_e default_t_color" href="mailto:#"><?php echo $site_basic_info[0]->email?></a>
                            </div>
                        </li>
                        
                    </ul>
                </div>	
            </li>
        </ul>