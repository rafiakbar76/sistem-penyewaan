<?php

class Profil_pt extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_profil");
    }

    public function index()
    {
        $data=[
            'dataOwner'=>$this->m_profil->detail()->row()
        ];
        $this->load->view("owner/sidebar");
        $this->load->view("owner/header",$data);
        $this->load->view("owner/profilpt",$data);

    }
    public function edit($id_owner) {
        
        $this->load->helper('database');
        $this->load->model('m_profil');
        // $data['Owner']= $this->m_profil->select_all();
        $data['owner'] = $this->m_profil->get_by_id($id_owner);
        $dataa=[
            'dataOwner'=>$this->m_profil->detail()->row()
        ];
        $this->load->view("owner/sidebar");
        $this->load->view("owner/header",$dataa);
        $this->load->view('owner/edit/v_profil', $data);
    }
    public function update(){
        $this->load->helper(array('form','url'));
        $config['upload_path'] = './assets/img/profil/'; // Set folder untuk menyimpan gambar
        $config['allowed_types'] = 'jpg|jpeg|png'; // Tipe file gambar yang diizinkan
        $config['max_size']    = '10000';
    
        $this->load->library('upload', $config);
        $nama_pt= $this->input->post('nama_pt');
        $alamat= $this->input->post('alamat');
        $email= $this->input->post('email');
        $telpon= $this->input->post('telpon');
        $foto_lama= $this->input->post('foto');
        $id_owner = $this->input->post('id_owner');

        // Jika tidak ada foto baru yang diunggah
        if (!$this->upload->do_upload('foto')) {

            // Jika tidak ada foto baru yang diunggah, gunakan foto lama
            $foto = $foto_lama;
            $this->session->set_flashdata('success', 'Gambar menggunakan yang lama!');
            // echo "<pre>";print_r($data);die();
        } else {

            // Ambil nama file foto baru
            $data = $this->upload->data();
            $foto = $data['file_name'];

            // Hapus foto lama jika ada
            if ($foto_lama != '') {
                $this->session->set_flashdata('success', 'Foto lama di hapus!');
                unlink($config['upload_path'] . $foto_lama);
            }

            // Simpan file baru
                $path_file = './assets/img/profil' . $foto;
            move_uploaded_file($data['full_path'], $path_file );
            $this->session->set_flashdata('success', 'Foto baru di tambahkans!'.$data);
        }
        echo 'foto'.$foto;
        
        $data = array(
            'nama_pt' => $nama_pt,
            'alamat' => $alamat,
            'email' => $email,
            'telpon' => $telpon,
            'foto' => $foto
        );
    
        $this->m_profil->update_profil($data, $id_owner);
        
        
    
        redirect('profil_pt');
    }
    
}
?>