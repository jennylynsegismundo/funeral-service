<?php

class User_Model extends CI_Model
{
	public function getUserData($username) {
  	$this->db->select('user_id, username, role'); // Add more columns if needed
    $this->db->where('username', $username);
    $query = $this->db->get('users_tbl');

    if ($query->num_rows() > 0) {
    	return $query->row(); // Return user data
    }

    return false; // User not found
  }
	public function getCustomerAccount()
	{
		$this->db->where('role', 'customer');
		$query = $this->db->get('users_tbl');
		return $query->result();
	}
	// DELETE CUSTOMER ACCOUNT
  public function DeleteCustomerAcc($user_id)
	{
		return $this->db->delete('users_tbl', array('user_id' => $user_id));
	}
	// TO EDIT THE CUSTOMER ACCOUNT
  public function EditCustomerAcc($user_id)
  {
    $query = $this->db->get_where('users_tbl', array('user_id' => $user_id));
	  return $query->row();
  }
	// UPDATE CUSTOMER ACCOUNT
  public function UpdateCustomerAcc($data, $user_id)
  {
    return $this->db->update('users_tbl', $data, array('user_id' => $user_id));
  }
	// ARCHIVE CASKET
	public function ArchiveCustomerAcc($user_id)
	{
	  $data = array('is_archived' => 1);
	  return $this->db->update('users_tbl', $data, array('user_id' => $user_id));
	}
  // UNARCHIVE CASKET
	public function UnarchiveCustomerAcc($user_id)
	{
	  $data = array('is_archived' => 0);
	  return $this->db->update('users_tbl', $data, array('user_id' => $user_id));
	}
  // TO SHOW THE WHICH CASKET ARE SELECTED AS ARCHIVE
	public function getArchivedCustomerAcc()
	{
	  $this->db->where('is_archived', 1); // Filter archived caskets
	  $query = $this->db->get('users_tbl');
	  return $query->result();
	}
	//insert data for database
	function insert_user($data)
	{
		$this->db->insert('users_tbl', $data);
	}

	//for checklogin account
	function checkLoginAcc($password, $username)
	{
		$query = $this->db->query("SELECT * FROM users_tbl WHERE password='$password' AND username='$username' AND status='1'");
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function getUserRole($username)
	{
		$query = $this->db->query("SELECT role FROM users_tbl WHERE username='$username'");
		if ($query->num_rows()==1)
		{
			return $query->row()->role;
		}
		return null;
	}
}
