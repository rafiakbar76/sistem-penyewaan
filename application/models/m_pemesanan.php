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
	
}