<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') == FALSE){
            redirect ("login");
        }
    }


    public function index () {
        $this->dashboard();
    }

    public function dashboard () {
        $data['page'] = $this->load->view('page_dashboard', array(),true);
        $this->load->view('dast_admin', $data);
    }

    public function vehicle () {
        $data['page'] = $this->load->view('page_vehicle', array(),true);
        $this->load->view('dast_admin', $data);
    }

  
    public function tampilkan_session(){
        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $logged_in = $this->session->userdata('logged_in');
        
        echo $username. '|'. $email. '|'. $logged_in;
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    } 
}

