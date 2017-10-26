<style>
    .btn-group-lg>.btn, .btn-lg {
        padding: 23px 20px;
        font-size: 18px;
        line-height: 1.3333333;
        border-radius: 6px;
    </style>
    <div class="container">
        <?php $this->load->view('inasiteadmin/flash_messages'); ?>
        <div class="row">
            <?php
            $cssItems = array('success', 'primary', 'warning', 'danger', 'info');
            ?>
            <div id="center">
                <?php
                $role_id = $this->session->userdata('role_id');
                if ($role_id == 1) {
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "users/index"; ?>">Users</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "reports/index"; ?>">Reports</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "categories/index"; ?>">Categories</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "articles/index"; ?>">Articles</a>
                            </div>
                        </div>		
                    </div>	
                    <br><br><br>
                    <div class="row">
                        <div class="col-lg-12">		
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/index"; ?>">Leads</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "order_details/index"; ?>">Order Details</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "promocodes/index"; ?>">Promocodes</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "custom_reports/index"; ?>">Custom Reports Links</a>
                            </div>
                        </div>
                    </div>	
                    <br><br><br>
                    <div class="row">
                        <div class="col-lg-12">		
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/index"; ?>">Leads</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/index?lead_type=N"; ?>">Active Leads</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/download_leads"; ?>">Download Leads</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/search_leads"; ?>">Search Leads</a>
                            </div>
                        </div>
                    </div>	
                    <br><br><br>
                    <div class="row">
                        <div class="col-lg-12">		
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "emailblockers/index"; ?>">Email Blocker</a>
                            </div>
                        </div>
                    </div>	
<?php } else if ($role_id == 2 || $role_id == 3 || $role_id == 4) { ?>	
                    <div class="row">
                        <div class="col-lg-12">		
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/index"; ?>">Leads</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "custom_reports/index"; ?>">Custom Reports Links</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/download_leads"; ?>">Download Leads</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/search_leads"; ?>">Search Leads</a>
                            </div>
                        </div>
                    </div>	
                    <br><br><br>
                    <div class="row">
                        <div class="col-lg-12">		
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/index?lead_type=N"; ?>">Active Leads</a>
                            </div>
                        </div>
                    </div>	
                    <br><br><br>
<?php } else if ($role_id == 2 || $role_id == 3 || $role_id == 4) { ?>	
                    <div class="row">
                        <div class="col-lg-12">		
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/index"; ?>">Leads</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "custom_reports/index"; ?>">Custom Reports Links</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/download_leads"; ?>">Download Leads</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/search_leads"; ?>">Search Leads</a>
                            </div>
                        </div>
                    </div>	
                    <br><br><br>
                    <div class="row">
                        <div class="col-lg-12">		
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "leads/index?lead_type=N"; ?>">Active Leads</a>
                            </div>
                        </div>
                    </div>	
                    <br><br><br>
<?php } else if ($role_id == 5) { ?>	
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "reports/index"; ?>">Reports</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "categories/index"; ?>">Categories</a>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-block btn-lg btn-<?php echo $cssItems[array_rand($cssItems)]; ?>" href="<?php echo MODULE_PATH . "articles/index"; ?>">Articles</a>
                            </div>
                        </div>		
                    </div>	
                    <br><br><br>
<?php } ?>
            </div><!-- Center ID-->
        </div>
    </div>