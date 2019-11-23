<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Others extends CI_Controller {
	
	/**
	 * Index method. It loads Homepage
	 */
	public function shirt()
	{	
		$data['title']='Buy Shirt';
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('category/shirt');
		$this->load->view('include/footer');
	}
	public function panjabi()
	{	
		$data['title']='Buy Panjabi';
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('category/panjabi');
		$this->load->view('include/footer');
	}
	public function t_shirt()
	{	
		$data['title']='Buy T-shirt';
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('category/t-shirt');
		$this->load->view('include/footer');
	}
	public function shows()
	{	
		$data['title']='Buy Shows';
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('category/shows');
		$this->load->view('include/footer');
	}
	public function watch()
	{	
		$data['title']='Buy Watch';
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('category/watch');
		$this->load->view('include/footer');
	}

	public function cart()
	{	
		$data['title']='Add to cart';
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('cart');
		$this->load->view('include/footer');
	}
		
}
