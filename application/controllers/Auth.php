<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	/**
	 * Index method. It loads profile
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
		$data['result']=$this->User->profile_retrive($user_id);
		
		$this->load->view('include/header', $data);
		$this->load->view('include/navbar');
		$this->load->view('profile');
		$this->load->view('include/footer');
	}
    // profile delete

	public function delete_account()
    {
        $id = $this->uri->segment(3);

        $this->load->model('User');
        $r = $this->User->profile_delete($id);
        if($r == true)
        {
            $this->session->set_flashdata("success","Account deleted successfully");
            session_destroy();
            redirect('Main/index');
        }
        else
        {
            $this->session->set_flashdata("error","Account delete failed");
            redirect('Auth/profile');
        }
    }
    // profile update

    public function updateprofile()
    {
        $id = $this->uri->segment(3);
        $data['title'] = "Profile | Update";
        $data['error'] = $this->session->flashdata('error');
        $data['success'] = $this->session->flashdata('success');
        $data['update_profile'] = 'ok';
        $this->load->model('User');
        $data['profile_id'] = $this->User->profile_id($id);
        $this->load->view('include/header',$data);
        $this->load->view('include/navbar');
        $this->load->view('home');
        $this->load->view('include/footer');
    }

    public function profile_up_validation()
    {
         $this->form_validation->set_rules('new_username', 'username', 'required');
        $this->form_validation->set_rules('new_email', 'email', 'required');
        $this->form_validation->set_rules('new_password', 'password', 'required');
        $this->form_validation->set_rules('new_contact', 'contact', 'required');
		$this->form_validation->set_rules('new_address', 'address', 'required');
        
        if ($this->form_validation->run() == false) 
        {
            redirect('Auth/profile');
        }
        else
        {
             if (!empty($_FILES['photo']['name'])) 
            {

                $path = $_FILES['photo']['name'];
                $image_name = 'image-'.time().'.'.pathinfo($path, PATHINFO_EXTENSION); 
                $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 1600;
                $config['max_height']           = 1200;
                $config['file_name']            = $image_name;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo'))
                {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('Auth/profile');
                }
                else
                {
               
                    $data = array(
                        'username' => $this->input->post('new_username'),
						'email'=> $this->input->post('new_email'),
						'contact' => $this->input->post('new_contact'),
						'address' => $this->input->post('new_address'),
						'password' =>md5($this->input->post('new_password')),
						//you forgot to assign image property here
						'photo' => $image_name
                    );


                    $id = $this->input->post('id');
                    $this->load->model('User');
                    if($this->User->update_profile($data, $id) == true)
                    {
                        $this->session->set_flashdata('success', 'Updated successfully'); 
                        redirect('Auth/profile');
                    }
                    else 
                    {
                        $this->session->set_flashdata('error', 'Update failed'); 
                        redirect('Auth/profile');
                    }
                }
            }
            else
            {          
                $this->session->set_flashdata('error', 'Please select an image.'); 
                redirect('Auth/profile');
            }   
        }       
    }

}
