<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('parser');
				
		if($this->session->userdata('logged_in') == FALSE){
			redirect("login");
		}
	}

	public function index()
	{
		$data = array(			
			'breadcrumb' => 'Vehicle'
		);
		$data['page'] = $this->load->view('page/pengemudi/list',array(),true);
		$this->parser->parse('template/dast_admin',$data);				        
	}

}