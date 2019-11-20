<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller
{
	
	public function index()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			redirect(base_url().'auth/index');
		}
		$data['title']='Dashboard | NewsPaper';
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('AddNewsForm');
		$this->load->view('include/footer');

	}	

	/**
	 * This method loads Add news form
	 */
	public function add_validation()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('details', 'Details', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');

		if ($this->form_validation->run()==false) 
		{
			$this->index();
		}
		else
		{
			
				$data = array(
				'title' => $this->input->post('title'),
				'details' =>$this->input->post('details'),
				'category'=>$this->input->post('category')
				);
			$this->load->model('User');
			$r = $this->User->news_ins($data);

			if ($r == true) 
			{
				redirect('Main/index');
			}
		}
			
	}
	
	
}
