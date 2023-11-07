<?php

class M_travel extends CI_Model{
    public function get_data()
    {
       return $this->db->get('mobil')->result_array();
    }
}