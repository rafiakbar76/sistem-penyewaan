<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datamobil extends CI_Model {

	public function select_all() {		
		$data = $this->db->get("mobil");
		return $data->result_array();
	}

	
}
