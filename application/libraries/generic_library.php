<?php
class  Generic_library{
/*
 * Function for Mail with template
 */
    public function __construct()
	{
		$this->CI = & get_instance();
	}
	function sendEmail($mydata,$message = NULL,$subject='Enquiry'){
		
		$this->CI->load->library('email');
		
		//$mydata = array('message' => '');
		$message = $this->CI->load->view('contact/mail', $mydata, true);        
		$config=array(
		'charset'=>'utf-8',
		'wordwrap'=> TRUE,
		'mailtype' => 'html'
		);

		$this->CI->email->initialize($config);
		//$this->CI->email->mailtype('html');
		$this->CI->email->from($mydata['emailId'], $mydata['fullname']);
		$this->CI->email->to('sales@researchmoz.us'); 

		$this->CI->email->subject($subject);
		$this->CI->email->message($message);    

		//var_dump($message);
		//exit;

		$this->CI->email->send();
	}


	function _create_captcha(){	
		
		//$this->CI->load->library('form_validation');	
		//$this->CI->load->library('session');
		
		$cap = mt_rand(100, 1000);
		$this->CI->session->set_userdata('captchaword', $cap);
		return $cap;
	}

	
	function check_captcha($string){
		//$this->CI->load->library('form_validation');	
		//$this->CI->load->library('session');
		
		if($string==$this->CI->session->userdata('captchaword')){		
			return TRUE;
		}else{			
			$this->CI->form_validation->set_message('check_captcha', 'Wrong captcha code');
			return FALSE;
		}
	}


}

?>