<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model 
{
	public function account_ins($data)
	{
		$query = $this->db->insert('auth',$data);
		return $query;
	}
	public function login_val($u)
	{
		$this->db->where('auth_username', $u);
		$sql = $this->db->get('auth');
		return $sql->result();
	}

	public function search_result($k)
	{
		$this->db->where('category', $k);
		$sql = $this->db->get('news');
		return $sql->result();
	}
	public function news_ins($data)
	{
		$query = $this->db->insert('news',$data);
		return $query;
	}
	public function retrive()
	{
		$sql = $this->db->get('news');
		return $sql->result();
	}

	
}
