<?php
class Logout extends CI_Controller {
    public $moduleName = 'logout';
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
       $this->session->sess_destroy();
       redirect(site_url().'siteadmin/login');
        
    }
   
}

