<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	/**
	 * Index method. It loads Homepage
	 */
	public function index()
	{	
		// if ($this->session->userdata('logged_in')!='') 
		// {
		// 	redirect(base_url().'Main/index');
		// }
		$data['title']='Online Store';
		$data['success']= $this->session->flashdata('success');
		$data['error']= $this->session->flashdata('error');
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('home');
		$this->load->view('include/footer');
	}
	//***********login**************/
	public function nav_signin_validation()
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
			$result = $this->User->nav_val($user);

			foreach ($result as $data) 
			{
				$password = $data->password;
			}

			if ($pass === $password) 
			{
				$data = array(
					'logged_in' => true,
					'role' => $role
				);
				$this->session->set_flashdata('success','Login Successfully');
				$this->index();

				$this->session->set_userdata($data);
				redirect('main/index');

				
			}

			else 
			{
				$this->session->set_flashdata('error','!Please try again');
				$this->index();
			}
		}
	}

	//****** Logout  *******/

	public function logout()
	{
		session_destroy();
		redirect("Main/index");

	}

	//****** new account validation*******/

	public function nav_signup_validation()
	{
		$this->form_validation->set_rules('new_username', 'username', 'required');
		$this->form_validation->set_rules('new_email', 'email', 'required');
		$this->form_validation->set_rules('new_password', 'password', 'required');
		$this->form_validation->set_rules('new_contact', 'contact', 'required');
		$this->form_validation->set_rules('new_address', 'address', 'required');
		
		if ($this->form_validation->run() == false) 
		{
			$this->index();
		}
		else
		{
			if (!empty($_FILES['photo']['name'])) 
            {   
                $path = $_FILES['photo']['name'];
                $image_name = 'image-'.time().'.'.pathinfo($path, PATHINFO_EXTENSION); 
                $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 1024;
                $config['max_width']            = 1600;
                $config['max_height']           = 1200;
                $config['file_name']            = $image_name;  
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo'))
                {                	
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);  
                   $this->index();
                }
                else
                {
                	
                  		$data = array(
							'username' => $this->input->post('new_username'),
							'email'=> $this->input->post('new_email'),
							'contact' => $this->input->post('new_contact'),
							'address' => $this->input->post('new_address'),
							'password' =>md5($this->input->post('new_password'))
						);
                    $this->load->model('User');
                    if($this->User->account_ins($data) == true)
                    {
                        $this->session->set_flashdata('success', 'Account Created'); 
                        $this->index();
                    }
                    else 
                    {
                        $this->session->set_flashdata('error', '!please try again'); 
                        redirect('main/nav_signin_validation');
                    }
                }
            }
            else
            {          
                $this->session->set_flashdata('error', 'Please select an image.'); 
                $this->index();
            }   
        }		
	}
}
