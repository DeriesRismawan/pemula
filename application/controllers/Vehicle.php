<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('Vehicle_m','mVehicle');
		
		if($this->session->userdata('logged_in') == FALSE){
			redirect("login");
		}
	}

	public function index()
	{
		$data = array(			
			'breadcrumb' => 'Vehicle'
		);
		$res = $this->mVehicle->get();
		
		$data['page'] = $this->load->view('page/kendaraan/list',array('data_vehicle'=>$res),true);
		$this->parser->parse('template/dast_admin',$data);				        
	}

	public function tambah()
	{
		$data = array(			
			'breadcrumb' => 'Vehicle / Tambah',
	        'dropdown_master' => ''
		);
		$data['page'] = $this->load->view('page/kendaraan/form',array(),true);
		$this->parser->parse('template/dast_admin',$data);	
	}

	public function doSimpan()
	{
		$flat_no = $this->input->post('txtFlatNo');
		$jk = $this->input->post('txtJK');
		$no_mesin = $this->input->post('txtNoMesin');

		$data = array(
			'flat_no'=>$flat_no,
			'jenis'=>$jk,
			'no_mesin'=>$no_mesin
		);

		$res = $this->mVehicle->simpan($data);

		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', 'Alhamdulillah...');
			redirect('vehicle');
		}else{
			echo "Teu Eucreug";
		}
	}

	public function doEdit($id)
	{
		$res = $this->mVehicle->edit($id);
		if($res > 0) {
			$res = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $res
			);
			$this->template->load('vehicle', $data);
		} else {
			echo "<script>alert('Data Tidak ditemukan');";
			echo "window.location='".site_url('vehicle')."';</script>";
		}
	}

	public function doHapus($id)
	{
		$res = $this->mVehicle->hapus($id);
		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', 'Alhamdulillah... Hapus data berhasil');
			redirect('vehicle');
		}else{
			echo "gagal";
		}
	}

}
