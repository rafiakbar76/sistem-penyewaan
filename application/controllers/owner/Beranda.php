<?php

class Beranda extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_penyewa");
    }
    
    public function index()
    {
        $data=[
            'dataOwner'=>$this->m_penyewa->detail()->row()
        ];
        $dataa['dataPenyewa']= $this->m_penyewa->viewpesan();
        $this->load->view("owner/sidebar");
        $this->load->view("owner/header",$data);
        $this->load->view("owner/beranda",$dataa);

    }
    
}
?>