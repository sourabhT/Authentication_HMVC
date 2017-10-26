      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>
            <!--logo start-->
            <a href="<?php echo WEBSITE_URL; ?>siteadmin/dashboard/" class="logo">Recipe<span class="lite">Admin</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <i class="icon_profile"></i>
<!--                                <img alt="" src="../../ina/themes/backend/img/avatar1_small.jpg">-->
                            </span>
                            <span class="username"><?php echo $this->session->userdata('fullname'); ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="<?php echo WEBSITE_URL; ?>siteadmin/users/change_password"><i class="icon_profile"></i> Change Password</a>
                            </li>
                            <li>
                                <a href="<?php echo WEBSITE_URL; ?>siteadmin/logout"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->