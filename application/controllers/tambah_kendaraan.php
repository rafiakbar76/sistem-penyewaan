<?php

class Tambah_kendaraan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datamobil");
        $this->load->model("m_profil");
    }

    public function index()
    {
        $data['dataMobil']= $this->m_datamobil->select_all_join();
        $data=[
            'dataOwner'=>$this->m_profil->detail()->row()
        ];

        $this->load->model("m_datamobil");
        $this->load->model("m_profil");
        
        $this->load->view("owner/sidebar");
        $this->load->view("owner/header",$data);
       
// echo "<pre>";
// print_r($data['dataOwner']);
// echo "</pre>";
        $this->load->view("owner/tambah_kendaraan",$data);

    }
}
?>