<?php

class Beranda extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_penyewa");
    }
    
    public function index()
    {
        $data['dataPenyewa']= $this->m_penyewa->select_all();
        $this->load->view("owner/sidebar");
        $this->load->view("owner/header");
        $this->load->view("owner/beranda",$data);

    }
    
}
?>