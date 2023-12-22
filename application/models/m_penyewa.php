<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penyewa extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("penyewa");
		return $data->result_array();
	}

	public function detail(){
        	return $this->db->get_where('owner',['id_owner'=>'1']);
    	}

}
