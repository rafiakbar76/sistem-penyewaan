<?php

class Data_mobil extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datamobil");
    }
    public function index()
    {
        $data['dataMobil']= $this->m_datamobil->select_all();
        $this->load->view("owner/sidebar");
        $this->load->view("owner/header");
        $this->load->view("owner/datamobil",$data);

    }
}
?>