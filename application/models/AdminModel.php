<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model 
{
	// product insert

	public function product_ins($data)
	{
		$query = $this->db->insert('add_product',$data);
		return $query;
	}
	// product retrive
	public function p_retrive()
	{
		$sql = $this->db->get('add_product');
		return $sql->result();
	}
	// product delete
	public function product_delete($id)
	{
		$this->db->where('id',$id);
		$sql =$this->db->delete('add_product');
		return $sql;

	}
	// id catch
	 public function singledata($id)
        {
            $this->db->where('id', $id);
            $sql = $this->db->get('add_product');
            return $sql->result();
        }
        // product update
        public function updatedata($data, $id)
        {
            $this->db->where('id', $id);
            $sql = $this->db->update('add_product', $data);
            return $sql;
        }
        // order show
	public function order_retrive()
	{
		$sql = $this->db->get('buy');
		return $sql->result();
	}
	// delete order
	public function order_delete($id)
	{
		$this->db->where('id',$id);
		$sql =$this->db->delete('buy');
		return $sql;

	}
	// product picture move
	public function ret_pic($id)
	{
		$this->db->where('id',$id);
		$sql =$this->db->get('add_product');
		return $sql->result();
	}
	// search
	public function search_result($k)
	{
		$this->db->where('productCategory',$k);
		$sql = $this->db->get('add_product');
		return $sql->result();
	}

}
