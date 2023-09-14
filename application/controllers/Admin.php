<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller 
{

	function __construct()
    {
		parent:: __construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
        if ($this->session->userdata('logged_in')!=true) {  
            redirect(base_ur1().'auth');    
        }
	}

	public function index()
	{
	     $this->load->view('admin/index');
	}
}
?>