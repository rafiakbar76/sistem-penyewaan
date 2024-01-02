<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_customer_model extends CI_Model {

    public function insert($data){
        $this->db->insert('penyewa', $data);
        return $this->db->affected_rows();
    }

    // public function select_all(){
    //     $this->db->get("penyewa");
    //     return $data->result();
    // }
}