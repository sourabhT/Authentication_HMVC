<?php
/*
 * author : Sourabh Turkar
 * date : 4-5-2015
 * Type : Class Model[business-logic]
 * Name : Authentication Model [I write here funcation for Authentication which are as follows :
 * checkLoggedIn()
 * checkLoggedInAtLogin()
 * doLogin()
 * checkAttempt($userName)
 * 
 */
class Authentication_Model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /*
     * By This function we can check user are logged in or not 
     * If user is not logged in then by this function we can redirect from our users to login page 
     */
    public function checkLoggedIn()
    {
        $userName = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $currentIP = '127.0.0.1';
        if($currentIP == '127.0.0.1' && $userName !='' && $email !='')
        {
            $this->db->select("username");
            $this->db->from("users");
            $this->db->where("username",$userName);
            $this->db->where("status",'Y');
            $query = $this->db->get(); 
            //echo $this->db->last_query();
            //echo $query->num_rows();
            if($query->num_rows() > 0)
            {
                return TRUE;
                
            }else{
                redirect(site_url().'siteadmin/login/index');
            }
        }
        else
        {
            redirect(site_url().'siteadmin/login/index');
        }
    }
    
    /*
     * By This function we can check user are logged in or not 
     * If user is not logged in then by this function we can redirect from our users to login page 
     * If user is logged in then by this function we can redirect login to dashboard
     */
    public function checkLoggedInAtLogin()
    {
        $userName = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $currentIP = '127.0.0.1';
        if($currentIP == '127.0.0.1' && $userName !='' && $email !='')
        {
            $this->db->select("username");
            $this->db->from("users");
            $this->db->where("username",$userName);
            $this->db->where("status",'Y');
            $query = $this->db->get(); 
            //echo $this->db->last_query();
            //echo $query->num_rows();
            if($query->num_rows() > 0)
            {
                redirect(site_url().'siteadmin/dashboard/index');
                
            }else{
                redirect(site_url().'siteadmin/login/index');
            }
        }
    }
    
    /*
     * By This function we can check username and password for user access 
     * and also called checkAttempt() function for login attempt.
     */
    public function doLogin()
    {
        $userName = $this->input->post('username');
        $password = $this->input->post('password');
        
        $encrypted_password_string = base64_encode($password);

        $currentIP = '127.0.0.1';
        if($currentIP == '127.0.0.1')
        {
            $this->db->select("*");
            $this->db->from("users");
            $this->db->where("username",$userName);
            $this->db->where("password",$encrypted_password_string);
            $this->db->where("status",'Y');
            $query = $this->db->get(); 
            //exit();
            if($query->num_rows() > 0)
            {
                return $query->row();
            } 
            else if($this->checkAttempt($userName))
            {
                $this->session->unset_userdata('PrevUsername');
                $this->session->unset_userdata('CurUsername');
                $this->session->unset_userdata('loginCountAttempt');
                $this->db->where("username",$userName);
                $this->db->update('users',array('status'=>'S'));
                return FALSE;
            }
            
        }
        else
        {
            return FALSE;
        }
    }
    
     /*
      * By This function we can check user login attempt
      */
    function checkAttempt($userName)
    {
//        echo $userName;
//        exit();
        if($userName) {
            if($this->session->userdata('loginCountAttempt') < 5)
            {
            if($userName == $this->session->userdata('PrevUsername'))
            {
                $count = $this->session->userdata('loginCountAttempt');
                $total = $count+1;
                $this->session->set_userdata('loginCountAttempt',  $total);
                return false;
            }
            else
            {
                $this->session->set_userdata('loginCountAttempt',  1);
                $this->session->set_userdata('PrevUsername',  $userName);
                return false;
            }
            }
            else
            {
                return true;
            }
        }
        else{
            $this->session->set_userdata('PrevUsername',  $userName);
            $this->session->set_userdata('loginCountAttempt',  0);
            return false;
        }
    }
    
}