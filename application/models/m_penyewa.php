<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penyewa extends CI_Model {

	public function select_all() {		
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('owner', 'owner.id_owner = pemesanan.id_owner');
		$this->db->join('mobil', 'mobil.plat = pemesanan.plat');
		$this->db->join('penyewa', 'penyewa.id_penyewa = pemesanan.id_penyewa');
	
	$data = $this->db->get();
	return $data->result_array();
		// $data = $this->db->get("pemesanan");
		// return $data->result_array();
	}

	public function detail(){
		$id_owner = $this->session->userdata('selected_id_owner');
        return $this->db->get_where('owner',['id_owner'=>$id_owner]);
    }

	public function viewPemesan(){
		$id_penyewa = $this->session->userdata('id_penyewa');
		$this->db->where('id_penyewa',$id_penyewa);
		$data = $this->db->get('penyewa');
		return $data->result_array();
	}
	public function viewPesan(){
		$data['owner'] = $this->db->get_where('owner',['email' => $this->session->userdata('email')])->row_array();
		$id_owner = $this->session->userdata('selected_id_owner');

		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('penyewa','penyewa.id_penyewa = pemesanan.id_penyewa');
		$this->db->join('mobil','mobil.plat = pemesanan.plat');
		$this->db->where('pemesanan.id_owner',$id_owner);
		return $this->db->get()->result_array();

	}
}