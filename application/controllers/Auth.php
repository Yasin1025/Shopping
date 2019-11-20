<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
 {
	
	/**
	 * Login Method. Loads Login Form
	 */
	public function index()
	{
		if ($this->session->userdata('logged_in')!='') 
		{
			redirect(base_url().'dash');
		}

		$data['title']='Login | Newspaper';
		$data['error']= $this->session->flashdata('error');
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('loginform');
		$this->load->view('include/footer');
	}

	/**
	 * Validate login data
	 */
	public function login_validation()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()==false) 
		{
			$this->index();
		}
		else
		{
			$user = $this->input->post('username');
			$pass = md5($this->input->post('password'));
			$this->load->model('User');
			$result = $this->User->login_val($user);

			foreach ($result as $data) 
			{
				$password = $data->auth_password;
				$role = $data->auth_role;
			}

			if ($pass === $password) 
			{
				$data = array(
					'logged_in' => true,
					'role' => $role
				);
				$this->session->set_userdata($data);
				redirect('dash');
			}
			else 
			{
				$this->session->set_flashdata('error', 'Wrong Password');
				redirect('auth/index');
			}
		}
	}

	/**
	 * Destroy session
	 */
	public function logout()
	{
		session_destroy();
		redirect("Main/index");

	}

	public function account()
	{
		$data['title']='Add Account | Newspaper';
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('account');
		$this->load->view('include/footer');
	}

	public function ac_validation()
	{
		$this->form_validation->set_rules('new_username', 'New_username', 'required');
		$this->form_validation->set_rules('new_password', 'New_password', 'required');

		if ($this->form_validation->run()==false) 
		{
			redirect('auth/account');
		}
		else
		{
			
				$data = array(
				'auth_username' => $this->input->post('new_username'),
				'auth_password' =>md5($this->input->post('new_password'))
				);
			$this->load->model('User');
			$r = $this->User->account_ins($data);

			if ($r == true) 
			{
				redirect('Dash/index');
			}
		}
			
	}
	
}
