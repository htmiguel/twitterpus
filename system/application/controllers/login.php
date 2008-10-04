<?php

class Login extends Controller {

	function Login()
	{
		parent::Controller();	
		$this->load->model('Login_model','login',TRUE);
		$this->load->model('head');
	}
		
	function index()
	{
		if($_POST)
		{
			$un = $this->input->post('username');
			$pw = $this->input->post('password');
			$auth = $this->login->authenticate($un,$pw);
			if($auth == TRUE)
			{
				redirect('/account');
			} else {
				$data['error'] = "There was an error";
				$this->load->view('login_view',$data);
			}
		} else {
			$this->load->view('login_view');				
		}
	}
	
}

?>