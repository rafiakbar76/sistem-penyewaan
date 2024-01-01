<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_owner extends CI_Model {

    public function select_all(){
        $data = $this->db->get('owner');
        return $data->result();
    }

    public function select_all_with_mobil(){
        $this->db->select('owner.id_owner,owner.nama_pt,owner.foto,mobil.merk_type');
        $this->db->from('owner');
        $this->db->join('mobil','owner.id_owner = mobil.id_owner','left');
        $data = $this->db->get();
        // echo $this->db->last_query();

        $result = array();

        foreach ($data->result() as $row){
            $owner_id = $row->id_owner;

            //jika pemilik belum ditambahkan ke hasil, maka tambahkan sekarang juga
            if(!isset($result[$owner_id])){
                $result[$owner_id] = new stdClass();
                $result[$owner_id]->id_owner = $row->id_owner;
                $result[$owner_id]->nama_pt = $row->nama_pt;
                $result[$owner_id]->foto = $row->foto;
                $result[$owner_id]->vehicles = array(); 
            }

            //tambah kendaraan ke pemilik
            if (!empty($row->merk_type)){
                $result[$owner_id]->vehicles[] = $row->merk_type;
            }
        }
        return $result;
    }
}