<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_m extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	public function get()
	{
		$this->db->select('*');
		$this->db->from('tb_vehicle');
		$res = $this->db->get()->result_array();		

		return $res;
	}

	public function simpan($data)
	{
		return $this->db->insert('tb_vehicle',$data);
	}

	public function hapus($id)
	{
		$this->db->where('id_vehicle',$id);
		return $this->db->delete('tb_vehicle');
	}

	public function edit($id)
	{
		$this->db->where('id_vehicle', $id);
		return $this->db->update('tb_vehicle');
	}
}