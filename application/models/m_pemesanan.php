<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("pemesanan");
		return $data->result_array();
	}

	public function select_all_join()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('owner', 'owner.id_owner = pemesanan.id_owner');
		$this->db->join('mobil', 'mobil.plat = pemesanan.plat');
		$this->db->join('penyewa', 'penyewa.id_penyewa = pemesanan.id_penyewa');
	
	$data = $this->db->get();
	return $data->result();
	}
	
	public function delete_by_id($id_pemesanan){
		$this->db->where('id_pemesanan', $id_pemesanan);
		$this->db->delete('pemesanan');
	}

	public function insert($data){
		$data['tanggal'] = date('Y-m-d');
		$this->db->insert('pemesanan',$data);
		return $this->db->affected_rows();
	}

	public function viewPesan(){
		$data['owner'] = $this->db->get_where('owner',['email' => $this->session->userdata('email')])->row_array();
		$id_owner = $this->session->userdata('selected_id_owner');

		$this->db->select('pemesanan.*,penyewa.nama,mobil.merk_type');
		$this->db->from('pemesanan');
		$this->db->join('penyewa','penyewa.id_penyewa = pemesanan.id_penyewa');
		$this->db->join('mobil','mobil.plat = pemesanan.plat');
		$this->db->where('pemesanan.id_owner',$id_owner);
		return $this->db->get()->result_array();

	}
	
}