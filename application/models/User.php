<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model 
{
	
// account insert
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
	public function profile_retrive($id)
	{
		// i forgot the syntex
		$this->db->where('id', $id);
		$sql = $this->db->get('auth');
		return $sql->result();
	}

	public function profile_delete($id)
	{
		$this->db->where('id',$id);
		$sql =$this->db->delete('auth');
		return $sql;

	}
// for update
	public function profile_id($id)
    {
        $this->db->where('id', $id);
        $sql = $this->db->get('auth');
        return $sql->result();
    }

    public function update_profile($data, $id)
    {
        $this->db->where('id', $id);
        $sql = $this->db->update('auth', $data);
        return $sql;
    }

	// product ordered by user

	public function buy_ins($data)
	{
		$query = $this->db->insert('buy',$data);
		return $query;
	}

	
	
}
