<?php

class Users extends Controller {
	
	function Users()
	{
		parent::Controller();	
		$this->load->model('user');
	}

	function create()
	{
		if($_POST['email'] && $_POST['password'])
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->user->create($email,$password);
			if($user == FALSE)
			{
				redirect('/welcome');
			} else {
				$newdata = array( 
							'legit' => TRUE,
							'email' => $email,
							'id' => $user,
						);
				$this->session->set_userdata($newdata);
				redirect('/account');
			}
			
		}
	}
}

?>