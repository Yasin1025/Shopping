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
		$this->load->model('User');

		// catch id from session, and put into a variable
		$user_id = $this->session->userdata('id');
		//pass id as a parameter on retrive function, as you only need one user's information
		$data['result']=$this->User->retrive($user_id);
		
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('profile');
		$this->load->view('include/footer');
	}	
}
