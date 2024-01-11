<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    
    public function index()
    {
        echo 'this is index';
    }
    public function login()
    {       
        $this->load->model('auth_model');
        
        //set rules validate
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        //post data
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        //conditions
        if ($this->form_validation->run()==true) {
            $status = $this->auth_model->check_login($email, $password);
            if ($status == true) {
                redirect('/');
            }else{
                redirect('auth/login');
            }
        }
        
        
        //load view
        $this->load->view('header');
        $this->load->view('auth/login');
        
    }
}