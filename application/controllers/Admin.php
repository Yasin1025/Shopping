<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    /**
     * Index method For Add a new Product In Add product form
     */
    public function index()
    {
        if (!$this->session->userdata('logged_in')) 
        {
            redirect(base_url().'Main/index');
        }
        $data['title'] = "Add Product";
        $data['success']= $this->session->flashdata('success');
        $data['error']= $this->session->flashdata('error');
        $this->load->view('include/header',$data);
        $this->load->view('include/navbar');
        $this->load->view('admin/add_product');
        $this->load->view('include/footer');
    
    }
    // add product form validation
    public function product_validation()
    {

        $this->form_validation->set_rules('product_category', 'Category', 'required');
        $this->form_validation->set_rules('product_price', 'Price', 'required');
        $this->form_validation->set_rules('product_description', 'Description', 'required');
        $this->form_validation->set_rules('product_code', 'Code', 'required');
        
        
        if ($this->form_validation->run() == false) 
        {
            $this->index();
        }
        else
        {
            if (!empty($_FILES['product_photo']['name'])) 
            {

                $path = $_FILES['product_photo']['name'];
                $image_name = 'image-'.time().'.'.pathinfo($path, PATHINFO_EXTENSION); 
                $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 1600;
                $config['max_height']           = 1200;
                $config['file_name']            = $image_name;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('product_photo'))
                {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    $this->index();
                }
                else
                {
                    
                        $data = array(
                            "productCategory" => $this->input->post('product_category'),
                            "productPrice"=> $this->input->post('product_price'),
                            "productDescription" => $this->input->post('product_description'),
                            "productSize" => $this->input->post('product_size'),
                            "productCode" => $this->input->post('product_code'),
                            "productPhoto" => $image_name
                        );
                    $this->load->model('AdminModel');
                    if($this->AdminModel->product_ins($data) == true)
                    {
                        $this->session->set_flashdata('success', 'Product Added'); 
                        $this->index();
                    }
                    else 
                    {
                        $this->session->set_flashdata('error', '!Added Unsuccess'); 
                        $this->index();
                    }
                }
            }
            else
            {          
                $this->session->set_flashdata('error', 'Please Add Product Picture'); 
                $this->index();
            }   
        }       
    }
    //******* For Show Order******/
    public function order()
    {   
        if (!$this->session->userdata('logged_in')) 
        {
            redirect(base_url().'Main/index');
        }
        $data['title'] = "Show | Order";
        $this->load->model('AdminModel');
        $data['result'] = $this->AdminModel->order_retrive();

        $this->load->view('include/header',$data);
        $data['success']= $this->session->flashdata('success');
        $data['error']= $this->session->flashdata('error');
        $this->load->view('include/navbar');
        $this->load->view('admin/show_order');
        $this->load->view('include/footer');
    }
    // order delete
    public function delete_order()
    {
        $id = $this->uri->segment(3);

        $this->load->model('AdminModel');
        $r = $this->AdminModel->order_delete($id);
        if($r == true)
        {
            $this->session->set_flashdata("success","deleted successfully");
            redirect('Admin/order');
        }
        else
        {
            $this->session->set_flashdata("error","delete failed");
            redirect('Admin/order');
        }
    }
    // update product
     public function updateform()
    {
        if (!$this->session->userdata('logged_in')) 
        {
            redirect(base_url().'Main/index');
        }
        $id = $this->uri->segment(3);
        $data['title'] = "Update";
        $data['error'] = $this->session->flashdata('error');
        $data['success'] = $this->session->flashdata('success');
        $data['update'] = 'ok';
        $this->load->model('AdminModel');
        $data['singledata'] = $this->AdminModel->singledata($id);
        $this->load->view('include/header',$data);
        $this->load->view('include/navbar');
        $this->load->view('admin/add_product');
        $this->load->view('include/footer');
    }

    public function up_validation()
    {
         $this->form_validation->set_rules('product_category', 'Category', 'required');
        $this->form_validation->set_rules('product_price', 'Price', 'required');
        $this->form_validation->set_rules('product_description', 'Description', 'required');
        
        if ($this->form_validation->run() == false) 
        {
            $this->index();
        }
        else
        {
             if (!empty($_FILES['product_photo']['name'])) 
            {

                $path = $_FILES['product_photo']['name'];
                $image_name = 'image-'.time().'.'.pathinfo($path, PATHINFO_EXTENSION); 
                $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 1600;
                $config['max_height']           = 1200;
                $config['file_name']            = $image_name;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('product_photo'))
                {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    $this->index();
                }
                else
                {
               
                    $data = array(
                        "productCategory" => $this->input->post('product_category'),
                        "productPrice"=> $this->input->post('product_price'),
                        "productDescription" => $this->input->post('product_description'),
                        "productSize" => $this->input->post('product_size'),
                        //you forgot to assign image property here
                       "productPhoto" => $image_name
                    );


                    $id = $this->input->post('id');
                    $this->load->model('AdminModel');
                    if($this->AdminModel->updatedata($data, $id) == true)
                    {
                        $this->session->set_flashdata('success', 'Updated successfully'); 
                        redirect('Buy/shop');
                    }
                    else 
                    {
                        $this->session->set_flashdata('error', 'Update failed'); 
                        $this->index();
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
