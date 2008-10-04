<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
		$this->load->model('head');
		$this->load->model('accounts');
	}
	
	function index()
	{
		if($_POST)
		{
			$un = $this->input->post('username');
			$pw = $this->input->post('password');
			$user = $this->accounts->create($un,$pw);
			if($user == FALSE)
			{
				$data['error'] = TRUE;
				$this->load->view('welcome_page',$data);	
			} else {
				$newdata = array( 
							'legit' => TRUE,
							'username' => $un,
							'id' => $user,
						);
				$this->session->set_userdata($newdata);
				redirect('/account');
			}
			
		} else {
			//$this->load->view('welcome_page');
			$this->load->view('holding_page');	
		}
	}

	function beta()
	{
		$this->load->view('welcome_page');
	}
	
	function register()
	{
		$this->load->view('welcome_page_new');		
	}

}
?>