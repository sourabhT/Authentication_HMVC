<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">                
            <li class="active">
                <a class="" href="<?php echo WEBSITE_URL; ?>">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php
            $userId = $this->session->userdata('userid');
            $roleId = $this->session->userdata('role_id');
            if($userId == 1){
            $query = $this->db->query("select gm.group_id,gm.group_name,gm.group_title from module_group gm group by gm.group_id");
            $result = $query->result();
            //print_r($result);
            for ($i = 0; $i < count($result); $i++) {
                ?>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon_document_alt"></i>
                        <span><?php echo $result[$i]->group_title ?></span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <?php
                        $query = $this->db->query("select m.module_name,m.module_title from modules m where m.group_id='" . $result[$i]->group_id . "' group by m.module_id");
                        $resultModule = $query->result();
                        for ($j = 0; $j < count($resultModule); $j++) {
                            ?>
                            <li><a class="" href="<?php echo MODULE_PATH . $resultModule[$j]->module_name; ?>"><?php echo $resultModule[$j]->module_title; ?></a></li>    
                            <?php
                        }
                        ?>
                    </ul>
                </li>     
            <?php }}else{ 
            $query = $this->db->query("select p.*,gm.group_name,gm.group_title from permissions as p JOIN module_group gm ON p.group_id=gm.group_id where role_id IN (select role_id from users where user_id='$userId') group by group_id");
            $result = $query->result();
            //print_r($result);
            for($i=0;$i<count($result);$i++)
            {
                ?>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon_document_alt"></i>
                        <span><?php echo $result[$i]->group_title ?></span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <?php
                        $query = $this->db->query("select p.*,m.module_name,m.module_title from permissions as p JOIN modules m ON p.module_id=m.module_id where m.group_id='".$result[$i]->group_id."' and role_id IN (select role_id from users where user_id='$userId') group by module_id");
                        $resultModule = $query->result();
                        for ($j = 0; $j < count($resultModule); $j++) {
                            ?>
                            <li><a class="" href="<?php echo MODULE_PATH . $resultModule[$j]->module_name; ?>"><?php echo $resultModule[$j]->module_title; ?></a></li>    
                            <?php
                        }
                        ?>
                    </ul>
                </li>  
                
            <?php }} ?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->