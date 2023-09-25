<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Auth extends CI_Controller { 
    function __construct(){ 
        parent::__construct();  
        $this->load->library('form_validation'); 
        $this->load->model('m_model');  
        $this->load->helper('my_helper');  
    }  
 
     
    public function register() {
        // Tampilkan halaman register
        $this->load->view('auth/register');
    }
     
    public function index()  
    {  
     $this->load->view('auth/login');  
    }  
 
    public function process_login() { 
        $email = $this->input->post('email', true);  
        $password = $this->input->post('password', true);  
        $data = [ 'email' => $email, ];  
        $query = $this->m_model->getwhere('admin', $data);  
        $result = $query->row_array();  
         
        if (!empty($result) && md5($password) === $result['password']) {  
        $data = [  
            'logged_in' => TRUE,  
            'email' => $result['email'],  
            'username' => $result['username'],  
            'role' => $result['role'],  
            'id' => $result['id'],  
        ];  
        $this->session->set_userdata($data);  
        if ($this->session->userdata('role') == 'admin') {  
            redirect(base_url()."admin");  
        } else {  
            redirect(base_url()."auth");  
        }  
        } else {  
        redirect(base_url()."auth");  
        }  
    } 
     
    public function process_register() {  
        $email    = $this->input->post('email', true);  
        $username = $this->input->post('username', true);  
        $password = $this->input->post('password', true); 
       
        // Check if the password length is at least 8 characters 
        if (strlen($password) < 8) { 
            // Password is too short, redirect back to registration 
            redirect(base_url() . "auth/register"); 
        } 
       
        // Hash the password 
        $hashed_password = md5($password); 
       
        $data = [  
            'email'    => $email,  
            'username' => $username,  
            'password' => $hashed_password,  
            'role'     => 'admin',  
        ];  
       
        $table = 'admin';  
       
        $this->db->insert($table, $data);  
       
        if ($this->db->affected_rows() > 0) {  
            // Registration successful  
            $this->session->set_userdata([  
                'logged_in' => TRUE,  
                'email' => $email,  
                'username' => $username,  
                'role' => 'admin'  
            ]);  
       
            redirect(base_url() . "auth");  
        } else {  
            // Registration failed  
            redirect(base_url() . "auth/register");  
        }  
      }


    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }

        
}
