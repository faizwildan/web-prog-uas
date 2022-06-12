<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();        
    }

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['konten'] = "dashboard";
		$data['email'] = $this->session->userdata('email');
		$this->load->view('template/header', $data);
	}
}
