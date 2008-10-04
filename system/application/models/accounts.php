<?php

class Accounts extends Model {

    
	function Accounts()
    {
        // Call the Model constructor
        parent::Model();
    }

	function create($un,$pw)
	{
		# FIRST CHECK TO SEE IF THE USER THAT IS BEING SUBMITTED EXISTS
		$q = $this->db->query('SELECT username FROM users WHERE username = "'.$un.'"');
		if($q->num_rows() > 0)
		{
			return FALSE;
		} else {
			$data = array(
				'username' => $un,
				'password' => $pw
			);
			$this->db->insert('users', $data);
			$id = mysql_insert_id();
			return $id;
		}
	}
    
	function getAccountInfo($userid,$account)
	{
		$q = $this->db->query('SELECT * FROM accounts WHERE twitter_name = "'.$account.'" AND uid = '.$userid.'');
		if($q->num_rows() > 0)
		{
			$x = $q->row();
			$up = $x->twitter_name.":".$x->password;
			return $up;
		} else {
			return FALSE;
		}
	}

	function getAccountDropdown($userid)
	{
		//$q = $this->db->get_where('accounts',array('uid' => $userid));
		$q = $this->db->query('SELECT * FROM accounts WHERE uid = '.$userid.' ORDER BY id ASC');
		if($q->num_rows() > 0)
		{
			$data = "<dl class='accounts'>";
			foreach($q->result() as $x)
			{
				$data .= '<dd id="'.$x->id.'" class="checkbox"><input type="checkbox" name="account[]" value="'.$x->twitter_name.'" />'.$x->twitter_name.' <a href="http://twitter.com/'.$x->twitter_name.'">Go there &raquo;</a> <a class="remove" href="#" onclick="removeAccount(\''.$x->id.'\',\''.$x->uid.'\',\''.addslashes($x->twitter_name).'\'); return false;">remove</a></dd>';
			}
			$data .= "</dl>";
			return $data;
		} else {
			return FALSE;
		}
	}

	function addAccount($uid,$ac,$pw)
	{
		$data = array(
		               'uid' => $uid,
		               'password' => $pw,
		               'twitter_name' => $ac
		            );

		$this->db->insert('accounts', $data);
		$id = mysql_insert_id();
		$data = '<dd id="'.$id.'" class="checkbox yellow"><input type="checkbox" name="account[]" value="'.$ac.'" />'.$ac.' <a href="http://twitter.com/'.$ac.'">Go there &raquo;</a> <a href="#" class="remove" onclick="removeAccount(\''.$id.'\',\''.$uid.'\',\''.addslashes($ac).'\'); return false;">remove</a></dd>';
	 	echo $data;
	}
	
	function sendMessage($userid,$account,$message)
	{
		$userpass = $this->getAccountInfo($userid,$account);
		if($userpass != FALSE)
		{
			$url = 'http://twitter.com/statuses/update.json';
			$curl_handle = curl_init();
			curl_setopt($curl_handle, CURLOPT_URL, "$url");
			curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_handle, CURLOPT_POST, 1);
			curl_setopt($curl_handle, CURLOPT_POSTFIELDS, "source=twitterpus&status=$message");
			curl_setopt($curl_handle, CURLOPT_USERPWD, $userpass);
			$buffer = curl_exec($curl_handle);
			curl_close($curl_handle);
			if (empty($buffer)) {
			    return $buffer;
			} else {
				$this->log_post_activity($userid);
			    return TRUE;
			}			
		}

	}
	
	function log_post_activity($userid)
	{
		$data = array('uid' => $userid);
		$this->db->insert('post_activity', $data);	
	}
	
	function verifyAccount($account,$password)
	{
		# and which twitter profile they want to post to

		// The message you want to send
		# $message = stripslashes($_POST['status']);
		// The twitter API address
		$url = 'http://twitter.com/account/verify_credentials';
		// Alternative JSON version
		// $url = 'http://twitter.com/statuses/update.json';
		// Set up and execute the curl process
		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, "$url");
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_POST, 1);
		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, "status=$message");
		curl_setopt($curl_handle, CURLOPT_USERPWD, "$account:$password");
		$buffer = curl_exec($curl_handle);
		curl_close($curl_handle);
		# CHECK TO SEE IF THIS ACCOUNT IS ALREADY IN THE SYSTEM
		//$isValid = $this->validateAgainstDuplicateAccount($account);
		//if($isValid == TRUE)
		//{
			# DOES THIS ACCOUNT VALIDATE IN TWITTER?
			if ($buffer == 'Authorized') 
			{
			    return TRUE;
			} else {
			    return FALSE;
			}			
			
		//} else {
		//	return FALSE;
		//}
	}	

	function validateAgainstDuplicateAccount($account)
	{
		# FIRST CHECK TO SEE IF THE USER THAT IS BEING SUBMITTED EXISTS
		$q = $this->db->query('SELECT twitter_name FROM accounts WHERE twitter_name = "'.$account.'"');
		if($q->num_rows() > 0)
		{
			return FALSE;
		} else {
			return TRUE;
		}
	}
	

}

?>