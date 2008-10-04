<?php

class User extends Model {

    function User()
    {
        parent::Model();
    }

	function create($email,$password)
	{
		# FIRST CHECK TO SEE IF THE USER THAT IS BEING SUBMITTED EXISTS
		$q = $this->db->query('SELECT email FROM users WHERE email = "'.$email.'"');
		if($q->num_rows() > 0)
		{
			return FALSE;
		} else {
			$data = array(
				'email' => $email,
				'password' => $password
			);
			$this->db->insert('users', $data);
			$id = mysql_insert_id();
			return $id;
		}
	}

}
?>