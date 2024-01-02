<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model {

    public function insert($data){
        $this->db->insert('owner', $data);
        return $this->db->affected_rows();
    }

    // public function select_all(){
    //     $this->db->get("owner");
    //     return $data->result();
    // }
}