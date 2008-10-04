<?php

class Login_model extends Model {

    function Login_model()
    {
        // Call the Model constructor
        parent::Model();
    }
    
    function authenticate($un,$pw)
    {
    	$query = $this->db->query('SELECT * FROM `users` WHERE `username` = "'.$un.'" AND `password` = "'.$pw.'"'); 
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			if($row->username == $un && $row->password == $pw){
				$newdata = array( 
									'legit' => TRUE,
									'username' => $row->username,
									'id' => $row->id,
								);
				$this->session->set_userdata($newdata);	
				$this->log_login_activity($row->id);	
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
	
	function log_login_activity($userid)
	{
		$data = array('uid' => $userid);
		$this->db->insert('login_activity', $data);	
	}
	
			
}

?>