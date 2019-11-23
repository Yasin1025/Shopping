<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	/**
	 * Index method. It loads Homepage
	 */
	public function profile()
	{	
		if (!$this->session->userdata('logged_in')) 
		{
			redirect(base_url().'main/index');
		}
		$data['title']='Profile';
		$this->load->view('include/header', $data);
		$this->load->model('User');
		$data['result']=$this->User->retrive();

		$this->load->view('include/navbar');
		$this->load->view('profile');
		$this->load->view('include/footer');
	}	
}
