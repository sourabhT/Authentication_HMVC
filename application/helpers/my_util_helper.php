<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Author : Sourabh Turkar
 * Date : 10-14-2016
 */
/* 1
 * checkAuthenticationModule() Pass user id and check module access from permission table module id mapping
 */

function checkAuthenticationModule($userId) {
    if ($userId != 1) {
        $CI = & get_instance();
        $query = $CI->db->query("select p.*,m.module_name,m.module_title from permissions as p JOIN modules m ON "
                . "p.module_id=m.module_id where role_id IN (select role_id from users where user_id='$userId')"
                . "group by module_id");
        $resultCount = $query->num_rows();
        if (!$resultCount && $userId != 1) {
            $CI->load->view('siteadmin/errorPage');
            echo $CI->output->get_output();
            exit;
        }
    }
}

/* 2
 * checkAuthenticationModuleAction() Pass user id and check module action access from permission table module and module action id mapping
 */

function checkAuthenticationModuleAction($moduleName, $actionName, $userId) {
    if ($userId != 1) {
        $CI = & get_instance();
        $query = $CI->db->query("select p.permission_id from permissions as p "
                . "where p.role_id IN (select role_id from users where user_id='$userId') and "
                . "p.action_id IN (select action_id from module_action where action_name='$actionName') and "
                . "p.module_id IN (select module_id from modules where module_name='$moduleName')");
        $resultCount = $query->num_rows();
        //print_r($resultCount);
        if (!$resultCount && $userId != 1) {
            $CI->load->view('siteadmin/errorPage');
            echo $CI->output->get_output();
            exit;
        }
    }
}

/* 3
 * topaccess($id) By this funcation we will get top portion action if user will authenticate for that.
 * We need to pass in that function user id and module name and that module name and user id mapping chaeck by permission table with module action.
 */

function topaccess($user_id = '', $moduleName = '') {
    $CI = & get_instance();
    //echo "select p.*,m.module_name,m.module_title,ma.action_name,ma.action_title,ma.action_type from permissions as p JOIN modules m ON p.module_id=m.module_id JOIN module_action ma ON p.action_id = ma.action_id where role_id IN (select role_id from users where user_id='".$user_id."') AND module_name='".$moduleName."' AND action_type='NO' OR action_type='AO'";
    if ($user_id == 1) {
        $query = $CI->db->query("select m.module_name,m.module_title,ma.action_name,ma.action_title,ma.action_type from modules m JOIN module_action ma ON ma.module_id = m.module_id where m.module_name='" . $moduleName . "'");
    } else {
        $query = $CI->db->query("select p.*,m.module_name,m.module_title,ma.action_name,ma.action_title,ma.action_type from permissions as p JOIN modules m ON p.module_id=m.module_id JOIN module_action ma ON p.action_id = ma.action_id where role_id IN (select role_id from users where user_id='" . $user_id . "') AND module_name='" . $moduleName . "' AND action_type='NO' AND ma.status = 'Y' UNION "
                . "select p.*,m.module_name,m.module_title,ma.action_name,ma.action_title,ma.action_type from permissions as p JOIN modules m ON p.module_id=m.module_id JOIN module_action ma ON p.action_id = ma.action_id where role_id IN (select role_id from users where user_id='" . $user_id . "') AND module_name='" . $moduleName . "' AND action_type='AO' AND ma.status = 'Y'");
    }

    $resultModuleAction = $query->result();

    for ($i = 0; $i < count($resultModuleAction); $i++) {
        if ($resultModuleAction[$i]->action_type == 'NO') {
            ?>
            <a class="btn btn-warning"  href="<?php echo MODULE_PATH . $resultModuleAction[$i]->module_name . "/" . $resultModuleAction[$i]->action_name; ?>"><?php echo $resultModuleAction[$i]->action_title; ?></a>
            <?php
        } else if ($resultModuleAction[$i]->action_type == 'AO') {
            ?>
            <a class="btn btn-warning" onclick="changeStatus('<?php echo $resultModuleAction[$i]->module_name; ?>', '<?php echo $resultModuleAction[$i]->action_name; ?>');" href="#"><?php echo $resultModuleAction[$i]->action_title; ?></a>
            <?php
        }
    }
}

/* 4
 * topaccess($id) By this funcation we will get top portion action if user will authenticate for that.
 * We need to pass in that function user id and module name and that module name and user id mapping chaeck by permission table with module action.
 */

function singleoperationaccess($user_id = '', $moduleName = '') {
    $arrayActionLink = array();
    $arrayActionTitle = array();
    $arrayActionType = array();
    $arrayAction = array();
    $CI = & get_instance();
    $query = $CI->db->query("select p.*,m.module_name,m.module_title,ma.action_name,ma.action_title,ma.action_type from permissions as p JOIN modules m ON p.module_id=m.module_id JOIN module_action ma ON p.action_id = ma.action_id where role_id IN (select role_id from users where user_id='" . $user_id . "') AND module_name='" . $moduleName . "' AND action_type='EO' AND ma.status = 'Y' UNION "
            . ""
            . "select p.*,m.module_name,m.module_title,ma.action_name,ma.action_title,ma.action_type from permissions as p JOIN modules m ON p.module_id=m.module_id JOIN module_action ma ON p.action_id = ma.action_id where role_id IN (select role_id from users where user_id='" . $user_id . "') AND module_name='" . $moduleName . "' AND action_type='AO' AND ma.status = 'Y'");
    //echo $this->db->last_query();
    $resultModuleAction = $query->result();
    for ($i = 0; $i < count($resultModuleAction); $i++) {
        $arrayActionLink[] = $resultModuleAction[$i]->module_name . "/" . $resultModuleAction[$i]->action_name;
        $arrayActionTitle[] = $resultModuleAction[$i]->action_title;
        $arrayActionType[] = $resultModuleAction[$i]->action_type;
    }
    $arrayAction['link'] = $arrayActionLink;
    $arrayAction['title'] = $arrayActionTitle;
    $arrayAction['type'] = $arrayActionType;
    return $arrayAction;
}

/* 5
 * getRole($id=0) This funcation use with or without Pass role id if we will pass role id then that role id automatically selected in dropdown
 */

function getRole($id = 0) {
    $srting = "<option value=''>--Select Role--</option>";
    $CI = & get_instance();
    $query = $CI->db->select("role_id,role_name")->from("roles")->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $data) {
            if ($data->role_id == $id) {
                $srting .="<option value=" . $data->role_id . " selected>" . $data->role_name . "</option>";
                //$items[$data->$name] = $data->$value;
            } else {
                $srting .="<option value=" . $data->role_id . ">" . $data->role_name . "</option>";
            }
        }
    }
    echo $srting;
}

/* 6
 * getRoleParent($id) By this funcation we will get parent roles of roles
 */

function getRoleParent($id = 0) {
    $srting = "<option value=''>--Select Role--</option>";
    $srting .= "<option value='0'>No Parent</option>";
    $CI = & get_instance();
    $query = $CI->db->select("role_id,role_name")->from("roles")->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $data) {
            if ($data->role_id == $id) {
                $srting .="<option value=" . $data->role_id . " selected>" . $data->role_name . "</option>";
                //$items[$data->$name] = $data->$value;
            } else {
                $srting .="<option value=" . $data->role_id . ">" . $data->role_name . "</option>";
            }
        }
    }
    echo $srting;
}

/* 7
 * getAllGroups($id) By this funcation we will get groups
 */

function getAllGroups($id = 0) {
    $srting = "<option>--Select Module Group--</option>";
    $CI = & get_instance();
    $CI->load->model('modules_action_model');
    $result = $CI->load->modules_action_model->getAllGroups();

    foreach ($result as $data) {
        if ($data->group_id == $id) {
            $srting .="<option value=" . $data->group_id . " selected>" . $data->group_title . "</option>";
            //$items[$data->$name] = $data->$value;
        } else {
            $srting .="<option value=" . $data->group_id . ">" . $data->group_title . "</option>";
        }
    }

    echo $srting;
}

/* 10.1
 * getStatusFullForm($status) This funcation return fullform of lead status while we pass status code from db.
 */

function getStatusFullForm($status) {
    if ($status == 'Y') {
        return 'Active';
    } else if ($status == 'N') {

        return 'Inactive';
    } else if ($status == 'D') {

        return 'Deleted';
    }
}

/* 12
 * getTopLevelUsers($roleId,$userId) By this function we can get results of super users according to role not a same level role.
 */

function getTopLevelUsers($roleId, $userId) {
    $CI = & get_instance();
    $queryRole = $CI->db->select("role_id,parent_id")->from("roles")->where('role_id', $roleId)->get();
    $resultRole = $queryRole->row();
    if ($resultRole->parent_id > 0) {
        $query = $CI->db->select("userid,firstname")->from("users")->where('role_id', $resultRole->parent_id)->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                if ($data->userid == $userId) {
                    ?>
                    <option value="<?php echo $data->userid; ?>" selected><?php echo $data->firstname; ?></option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo $data->userid; ?>" ><?php echo $data->firstname; ?></option>
                    <?php
                }
            }
        }
    }
}

/* 15
 * getNameById($fieldName="",$tableName="",$fieldIdName="",$idValue="") 
 * By this function we can get name of any table whatever you will pass by ID  
 * column name / table name / column name for where condition / column value for pass in where condition
 */

function getNameById($fieldName = "", $tableName = "", $fieldIdName = "", $idValue = "") {
    if ($idValue > 0 || $idValue != '') {
        $CI = & get_instance();
        $queryTable = $CI->db->select($fieldName)->from($tableName)->where($fieldIdName, $idValue)->get();
        $resultTable = $queryTable->row();
        if (isset($resultTable->$fieldName) && !empty($resultTable->$fieldName)) {
            return $resultTable->$fieldName;
        } else {
            return "N/A";
        }
    } else {
        return "N/A";
    }
}

function getCategory($id = 0) {
    $CI = & get_instance();
    $queryCategories = $CI->db->select('categoryId,categoryName')->from('category')->where('status', 'Y')->get();
    $resultTable = $queryCategories->result();
    echo '<option value="">Select Category</option>';
    for ($i = 0; $i < count($resultTable); $i++) {
        if ($resultTable[$i]->categoryId==$id) {
            ?>
            <option value="<?php echo $resultTable[$i]->categoryId; ?>" selected=""><?php echo $resultTable[$i]->categoryName; ?></option>
        <?php } else { ?>
            <option value="<?php echo $resultTable[$i]->categoryId; ?>"><?php echo $resultTable[$i]->categoryName; ?></option>
            <?php
        }
    }
}

function getCategoryMultiple($id = array()) {
    $CI = & get_instance();
    $recipeId = $id;
    $queryCategories = $CI->db->select('categoryId,categoryName')->from('category')->where('status', 'Y')->get();
    $resultTable = $queryCategories->result();
    echo '<option value="">Select Category</option>';
    for ($i = 0; $i < count($resultTable); $i++) {
        if (in_array($resultTable[$i]->categoryId, $recipeId)) {
            ?>
            <option value="<?php echo $resultTable[$i]->categoryId; ?>" selected=""><?php echo $resultTable[$i]->categoryName; ?></option>
        <?php } else { ?>
            <option value="<?php echo $resultTable[$i]->categoryId; ?>"><?php echo $resultTable[$i]->categoryName; ?></option>
            <?php
        }
    }
}

function displayMultipleCategory($id = array()) {
    $CI = & get_instance();
    $recipeId = $id;
    $string = "";
    $queryCategories = $CI->db->select('categoryId,categoryName')->from('category')->where('status', 'Y')->get();
    $resultTable = $queryCategories->result();
    //echo '<option value="">Select Category</option>';
    for ($i = 0; $i < count($resultTable); $i++) {
        if (in_array($resultTable[$i]->categoryId, $recipeId)) {
             $string .= $resultTable[$i]->categoryName."/ "; 
        } 
    }
    echo $string;
}


function getYesNo($status = '') {
    $CI = & get_instance();
    //echo '<option value="">Select Option</option>';
    if ($status == 'N') {
        ?>
        <option value="N" selected="">No</option>
    <?php } else { ?>
        <option value="N">NO</option>
        <?php
    }
    if ($status == 'Y') {
        ?>
        <option value="Y" selected="">Yes</option>
    <?php } else { ?>
        <option value="Y">Yes</option>
        <?php
    }
    
}


function getRecipeType($status = '') {
    $CI = & get_instance();
    //echo '<option value="">Select Option</option>';
    if ($status == 'VEG') {
        ?>
        <option value="VEG" selected="">VEG</option>
    <?php } else { ?>
        <option value="VEG">VEG</option>
        <?php
    }
    if ($status == 'NON-VEG') {
        ?>
        <option value="NON-VEG" selected="">NON-VEG</option>
    <?php } else { ?>
        <option value="NON-VEG">NON-VEG</option>
        <?php
    }
    if ($status == 'DRINK') {
        ?>
        <option value="DRINK" selected="">DRINK</option>
    <?php } else { ?>
        <option value="DRINK">DRINK</option>
        <?php
    }
    
}
