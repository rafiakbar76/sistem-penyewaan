<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datamobil extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("mobil");
		return $data->result_array();
	}
	
	public function select_all_owner() {		
		$data = $this->db->get("owner");
		return $data->result_array();
	}
	public function get_by_plat($plat) {
		$plat_escaped = str_replace("%20", " ", $plat);
		$data = $this->db->get_where('mobil', ['plat' => $plat_escaped])->row_array();
		return $data;
		// echo "<pre>";
        // print_r($data);
        // echo "</pre>";
    }
	public function update_mobil($data, $plat) {
		$this->db->where('plat', $plat);
		$this->db->update('mobil', $data);
	}
		// public function update($data, $plat) {
		//     $this->db->update('mobil', $data, ['plat' => $plat]);
		//     return $this->db->affected_rows();
		// }
	
	public function delete_by_plat($plat_escaped){
		$this->db->where('plat', $plat_escaped);
		$this->db->delete('mobil');
	}

	public function insert_to_mobil($data){
		$this->db->insert('mobil',$data);
		
	}
	public function detail(){
        return $this->db->get_where('owner',['id_owner'=>'1']);
    }
	// public function detail_mobil(){
    //     return $this->db->get_where('mobil',['plat'=>$plat_escaped]);
    // }

	public function select_all_join()
	{
		$this->db->select('*');
		$this->db->from('mobil');
		$this->db->join('owner', 'owner.id_owner = mobil.id_owner');
	
	$data = $this->db->get();
	return $data->result();
	}
	
}