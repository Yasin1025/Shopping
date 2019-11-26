<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends CI_Controller {
	
	/**
	 * Index method. It loads Buy Product Form [Cart]
	 */
	public function index()
	{	
        $id = $this->uri->segment(3);
        $this->load->model('AdminModel');
        $data['picture']= $this->AdminModel->ret_pic($id);
		$data['title']='Buy Your Product';
        $data['success']= $this->session->flashdata('success');
        $data['error']= $this->session->flashdata('error');
		$this->load->view('include/header',$data);
		$this->load->view('include/navbar');
		$this->load->view('cart');
		$this->load->view('include/footer');

	}
	public function cart_validation()
	{
		$this->form_validation->set_rules('buy_username', 'Name', 'required');
		$this->form_validation->set_rules('buy_contact', 'Contact', 'required');
		$this->form_validation->set_rules('buy_location', 'Location', 'required');
		$this->form_validation->set_rules('buy_code', 'Code', 'required');
		
		if ($this->form_validation->run() == false) 
		{
			$this->index();
		}
		else
		{
			    	
      		$data = array(
				'buy_username' => $this->input->post('buy_username'),
				'buy_contact'=> $this->input->post('buy_contact'),
				'buy_location' => $this->input->post('buy_location'),
				'buy_size' => $this->input->post('buy_size'),
				'buy_contity' => $this->input->post('buy_contity'),
				'buy_code' => $this->input->post('buy_code')
				
			);
            $this->load->model('User');
            if($this->User->buy_ins($data) == true)
            {
                $this->session->set_flashdata('success', 'Thanks for Order this Product. You Will Get A Call Soon'); 
                redirect('Main/index');
            }
            else 
            {
                $this->session->set_flashdata('error', '!Something problem . Please try again'); 
                $this->index();
            }

        }		
	}
	// its load shop
	public function shop()
	{	
       
		$data['title']='Add to cart';
		$this->load->model('AdminModel');
		$data['result'] = $this->AdminModel->p_retrive();
        $data['success']= $this->session->flashdata('success');
        $data['error']= $this->session->flashdata('error');
		$this->load->view('include/header',$data);
		$this->load->view('include/navbar');
		$this->load->view('shop');
		$this->load->view('include/footer');

	}
	// Product delete

	 public function delete_product()
    {
    	if (!$this->session->userdata('logged_in')) 
        {
            redirect(base_url().'Main/index');
        }
        $id = $this->uri->segment(3);

        $this->load->model('AdminModel');
        $r = $this->AdminModel->product_delete($id);
        if($r == true)
        {
            $this->session->set_flashdata("success","deleted successfully");
            redirect('Buy/shop');
        }
        else
        {
            $this->session->set_flashdata("error","delete failed");
            redirect('Buy/shop');
        }
    }
    // product search with category
	public function search()
	{
		$key = $this->input->post('search');
		$this->load->model('AdminModel');
		$data['search_result']=$this->AdminModel->search_result($key);
		$data['title']='Search | Category';
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('shop');
		$this->load->view('include/footer');
	}

   
}
