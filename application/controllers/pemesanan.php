<?php

class Pemesanan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_pemesanan");
    }
    public function index()
    {

        $data=[
            'dataOwner'=>$this->m_penyewa->detail()->row()
        ];
        $data['dataPemesanan']= $this->m_pemesanan->select_all_join();
        $data['dataPenyewa']= $this->m_penyewa->select_all();
        $this->load->view("owner/sidebar");
        $this->load->view("owner/header",$data);
        $this->load->view("owner/pemesanan",$data);

    }
    
    public function delete($id_pemesanan){
        $this->load->model('m_pemesanan');
        $this->m_pemesanan->delete_by_id($id_pemesanan);

        $this->session->set_flashdata('success', 'Data mobil berhasil dihapus!');
        redirect('data_mobil');
    }
}
?>