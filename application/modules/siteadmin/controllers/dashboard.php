<?php
class Dashboard extends CI_Controller {

    public $moduleName = 'dashboard';

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('authentication_model');
        $this->load->authentication_model->checkLoggedIn();
        
    }

    //Dashboard View 
    public function index() {
        $data['include'] = 'siteadmin/dashboard/index';
        $this->load->view(CONTAINER_PATH, $data);
    }
    


}
