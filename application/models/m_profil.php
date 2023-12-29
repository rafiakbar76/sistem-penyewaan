<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

	public function select_all() {		
		return $this->db->get('owner');
	}

    public function detail(){
        return $this->db->get_where('owner',['id_owner'=>'5']);
    }
    public function update_profil($data, $id_owner) {
		$this->db->where('id_owner', $id_owner);
		$this->db->update('owner', $data);
	}

    public function get_by_id($id_owner) {
		$data = $this->db->get_where('owner', ['id_owner' => $id_owner])->row_array();
		return $data;
    }

}