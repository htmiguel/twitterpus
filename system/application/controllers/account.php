<?php

class Account extends Controller {
		
	function Account()
	{
		parent::Controller();	
		$this->load->model('Login_model','login',TRUE);
		$this->load->model('head');
		$this->load->model('accounts');
		/* USER AUTHENTICATION */
		if($this->session->userdata('legit') != TRUE){ redirect('/login'); exit;}
	}
	
	function index()
	{
		if($_POST)
		{
			if($_POST['status'] != '' && $_POST['account'] != '')
			{
				foreach($this->input->post('account') as $x)
				{
					$this->accounts->sendMessage($this->session->userdata('id'),$x,$this->input->post('status'));
				}
				$data['message_status'] = "<span id='success-message'>Success!</span>";
			} else {
				$data['message_status'] = "Boo. Errors suck.";
			}
		}
		
		$this->session->userdata('email');
		$this->session->userdata('legit');
		$data['username'] = $this->session->userdata('username');
		$dropdown = $this->accounts->getAccountDropdown($this->session->userdata('id'));
		if($dropdown == FALSE)
		{
			$data['welcome'] = "
									<div id='addNewAccount'>
										<span id='flash-notice-no-account'>Before you can Tweet, you'll need to add a Twitter account</span>
										<span class='account-info'>Enter your Twitter username &amp; password:</span>
										<form method='post' action='#' onsubmit='addNewAccount(); return false;'>
											<input type='hidden' name='id' value='".$this->session->userdata('id')."'>
											<input class='input' type='text' id='account' name='twitter_name'' value='' /> 
											<input class='input' type='password' id='password' name='password' value='' />
											<input class='input' type='submit' style='display: none;' value='add account' onclick='addNewAccount(); return false;' /><br />
											<a id='save' href='' onclick='addNewAccount(); return false;'>SAVE</a> 
											<span id='fail'></span>
										</form>
									</div>
									<div id='addAccount'>
										<span class='account-info'>Enter your Twitter username &amp; password:</span>
										<form method='post' action='#' onsubmit='addAccount(); return false;'>
										<input type='hidden' name='id' value='<?php echo $id; ?>'>
										<input class='input' type='text' id='account' name='twitter_name' value='' /> 
										<input class='input' type='password' id='password' name='password' value='' />
										<input class='input' type='submit' style='display: none;' value='add account' onclick='addAccount(); return false;' /><br />
										<a id='save' href='' onclick='addAccount(); return false;'>SAVE</a> <a href='' id='cancel' onclick='cancel(); return false;'>CANCEL</a> <span id='fail'></span>
										</form>
									</div>
									";
		} else {
			$data['dropdown'] = $dropdown;
			$data['submit'] = "<p><a class='add-account' id='addAccount-link' href='#' onclick='show_hide(\"addAccount\"); return false;'>+ Add another account</a></p>
									<input type='submit' value='update' id='update-submit'  class='update-button' />";
									
			$data['welcome'] = "
									<div id='addAccount'>
										<span class='account-info'>Enter your Twitter username &amp; password:</span>
										<form method='post' action='#' onsubmit='addAccount(); return false;'>
										<input type='hidden' name='id' value='<?php echo $id; ?>'>
										<input class='input' type='text' id='account' name='twitter_name' value='' /> 
										<input class='input' type='password' id='password' name='password' value='' />
										<input class='input' type='submit' style='display: none;' value='add account' onclick='addAccount(); return false;' /><br />
										<a id='save' href='' onclick='addAccount(); return false;'>SAVE</a> <a href='' id='cancel' onclick='cancel(); return false;'>CANCEL</a> <span id='fail'></span>
										</form>
									</div>";
			
			
			
			
		}
		$this->load->view('account_home',$data);
	}
	
	function new_account()
	{
		if($_POST)
		{
			$ac = $this->input->post('account');
			$pw = $this->input->post('password');
			$validation = $this->accounts->verifyAccount($ac,$pw);
			if($validation == TRUE)
			{
				$this->accounts->addAccount($this->session->userdata('id'),$ac,$pw);
			} else {
				return FALSE;
			}
		}
	}
	
	function message()
	{
		$data['username'] = $this->session->userdata('username');
		if($this->input->post('status') != '')
		{
			foreach($this->input->post('account') as $x)
			{
				$this->accounts->sendMessage($this->session->userdata('id'),$x,$this->input->post('status'));
			}
			$data['status'] = $this->input->post('status');
			$this->load->view('success',$data);
		} else {
			$data['error'] = TRUE;
			$this->load->view('fail',$data);
		}	
	}
	
	function success()
	{
		$data['username'] = $this->session->userdata('username');
		$this->load->view('success',$data);
	}
	
	function fail()
	{
		$data['username'] = $this->session->userdata('username');
		$this->load->view('fail',$data);
	}
	
	function remove()
	{
		$account_id = $this->input->post('a');
		$this->db->delete('accounts', array('id' => $account_id));
		//redirect('/account');
	}

}

?>