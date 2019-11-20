<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	/**
	 * Index method. It loads Homepage
	 */
	public function index()
	{	
		$data['title']='NewsPaper | We provide News';
		$this->load->model('User');
		$data['result'] = $this->User->retrive();

		$this->load->view('include/h_header', $data);
		$this->load->view('include/navbar');
		$this->load->view('home');
		$this->load->view('include/footer');
	}


	public function search()
	{
		$key = $this->input->post('search');
		$this->load->model('user');
		$data['search_result']=$this->user->search_result($key);
		$data['title']='NewsPaper | We provide News';
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('home');
		$this->load->view('include/footer');
	}

		
}
