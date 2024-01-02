<?php

class Data_mobil extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datamobil");
    }
    public function index()
    {   
        $owner = $this->db->get_where('owner',['email' => $this->session->userdata('email')])->row_array();
        $this->session->set_userdata('selected_id_owner',$owner['id_owner']); 
        $data=[
            'dataOwner'=>$this->m_datamobil->detail()->row()
        ];
        $data['dataMobil']= $this->m_datamobil->viewMobil();
        $this->load->view("owner/sidebar");
        $this->load->view("owner/header",$data);
        $this->load->view("owner/datamobil",$data);
        

    }

    public function edit($plat) {
        
        $this->load->helper(array('database'));
        $this->load->model('m_datamobil');
        $data['dataMobil']= $this->m_datamobil->select_all();
        $data['mobil'] = $this->m_datamobil->get_by_plat($plat);
        $dataa=[
            'dataOwner'=>$this->m_datamobil->detail()->row()
        ];
        $this->load->view("owner/sidebar");
        $this->load->view("owner/header",$dataa);
        $this->load->view('owner/edit/v_editmobil', $data);
    }


    public function update() {
        $this->load->helper(array('form','url'));
        $config['upload_path'] = './assets/img/mobil/'; // Set folder untuk menyimpan gambar
        $config['allowed_types'] = 'jpg|jpeg|png'; // Tipe file gambar yang diizinkan
        $config['max_size']    = '10000';
    
        $this->load->library('upload', $config);
    
        $plat = $this->input->post('plat');
        $merk_type = $this->input->post('merk_type');
        $tahun = $this->input->post('tahun');
        $harga = $this->input->post('harga');
        $foto_lama= $this->input->post('foto');
        $id_owner = $this->input->post('id_owner');
    
        // Ambil data file yang di-upload
        // $data = $this->upload->data();
        // $foto = $data['file_name'];
        // echo "<pre>";print_r($data);die();

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
                $path_file = './assets/img/mobil' . $foto;
            move_uploaded_file($data['full_path'], $path_file );
            $this->session->set_flashdata('success', 'Foto baru di tambahkans!'.$data);
        }
        echo 'foto'.$foto;
        
        $data = array(
            'plat'=> $plat,
            'merk_type' => $merk_type,
            'tahun' => $tahun,
            'harga' => $harga,
            'foto' => $foto,
            'id_owner'=>$id_owner
        );
    
        $this->m_datamobil->update_mobil($data, $plat);
        
        
    
        redirect('data_mobil');
    }    

    public function delete($plat){
        $this->load->model('m_datamobil');
        $plat_escaped = str_replace("%20", " ", $plat);

        // Hapus file foto
        $data_mobil = $this->m_datamobil->get_by_plat($plat_escaped);
        $foto = $data_mobil['foto'];
        if ($foto != '') {
            unlink('./assets/img/mobil/' . $foto);
        }        
        
        $this->m_datamobil->delete_by_plat($plat_escaped);
        $this->session->set_flashdata('success', 'Data mobil berhasil dihapus!');
        redirect('data_mobil');
    }

    public function insert(){
        $this->load->helper(array('form','url'));
        $config['upload_path'] = './assets/img/mobil/'; // Set folder untuk menyimpan gambar
        $config['allowed_types'] = 'jpg|jpeg|png'; // Tipe file gambar yang diizinkan
        $config['max_size']     = '10000';
        
        $this->load->library('upload',$config);                
        
        $plat = $this->input->post('plat');
        $merk_type = $this->input->post('merk_type');
        $tahun = $this->input->post('tahun');
        $harga = $this->input->post('harga');
        $id_owner = $this->input->post('id_owner');
       // $foto = $this->input  ->post('foto');

        

            if (!$this->upload->do_upload('foto')) {
                echo "gagal";
                $foto = "";
            } else {
                // Ambil data file yang di-upload
                $data = $this->upload->data();
               
                $foto = $data['file_name'];

                // Simpan file dalam folder tujuan
                $path_file = './assets/img/mobil' . $foto;
                move_uploaded_file($data['full_path'], $path_file);
               // echo "<pre>";print_r($data);die();
                
            }
            $data = array(
                'plat'=> $plat,
                'merk_type'=>$merk_type,
                'tahun'=>$tahun,
                'harga'=>$harga,
                'id_owner'=>$id_owner,
                'foto' => $foto
            );
    
            $this->m_datamobil->insert_to_mobil($data);   
            
            redirect('data_mobil');
            
    }
}
?>