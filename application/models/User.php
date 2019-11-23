<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model 
{
	

	public function account_ins($data)
	{
		$query = $this->db->insert('auth',$data);
		return $query;
	}
	public function nav_val($u)
	{
		$this->db->where('username', $u);
		$sql = $this->db->get('auth');
		return $sql->result();
	}
	public function retrive($id)
	{
		// you forgot the syntax, check query builder on codeigniter docs
		$this->db->where('id', $id);
		$sql = $this->db->get('auth');
		return $sql->result();
	}
	
}
