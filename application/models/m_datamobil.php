<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datamobil extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("mobil");
		return $data->result_array();
	}
	
	public function get_by_plat($plat) {
		$plat_escaped = str_replace("%20", " ", $plat);
		$data = $this->db->get_where('mobil', ['plat' => $plat_escaped])->row_array();
		return $data;
    }
	
	public function selectByOwner(){
		$id_owner = $this->session->userdata('selected_id_owner');
		$this->db->where('id_owner',$id_owner);
		$data = $this->db->get('mobil');
		return $data->result_array();
	}

	public function viewMobil(){
		$data['owner'] = $this->db->get_where('owner',['email' => $this->session->userdata('email')])->row_array();
		return $this->db->get_where('mobil',['id_owner'=> $this->session->userdata('selected_id_owner')])->result_array();
	}

	public function update_mobil($data, $plat) {
		$this->db->where('plat', $plat);
		$this->db->update('mobil', $data);
	}
	
	public function delete_by_plat($plat_escaped){
		$this->db->where('plat', $plat_escaped);
		$this->db->delete('mobil');
	}

	public function insert_to_mobil($data){
		$this->db->insert('mobil',$data);
		
	}
	public function detail(){
		$id_owner = $this->session->userdata('selected_id_owner');
        return $this->db->get_where('owner',['id_owner'=>$id_owner]);
    }

	public function select_all_join()
	{
		$this->db->select('*');
		$this->db->from('mobil');
		$this->db->join('owner', 'owner.id_owner = mobil.id_owner');
	
	$data = $this->db->get();
	return $data->result();
	}
	
}