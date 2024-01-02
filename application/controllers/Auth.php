<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Registration_model','RM');
        $this->load->model('Registration_customer_model','RCM');
    }

    public function index(){

        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('telpon','Telpon','trim|required');

        if($this->form_validation->run() == false){
            $data['title'] = 'User Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }else{
            $this->_login();
        }
    }

    private function _login(){

        //variable untuk input
        $email = $this->input->post('email');
        $telpon = $this->input->post('telpon');

        //variable yang bertugas memanggil data dari database
        $owner = $this->db->get_where('owner',['email' => $email])->row_array();
        $penyewa = $this->db->get_where('penyewa',['email' => $email])->row_array();

        if($email == $owner['email']){
            if ($telpon == $owner['telpon']) {
                $data = [
                    'email' => $owner['email']
                ];
                $this->session->set_userdata($data);
                redirect('beranda');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                Wrong telpon number !
                </div>');
                redirect('auth');
            }
        }elseif ($email == $penyewa['email']) {
                if($telpon == $penyewa['telpon']){
                    $data = [
                        'email' => $penyewa['email'],
                        'id_penyewa' => $penyewa['id_penyewa']
                    ];
                    $this->session->set_userdata($data);
                    // echo '<pre>';
                    // print_r($this->session->all_userdata());
                    // echo '</pre>';
                    redirect('penyewa/PHome');
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                    Wrong telpon number !
                    </div>');
                    redirect('auth');   
                }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Email not registered yet!
            </div>');
            redirect('auth');
        }
    }


    public function registration(){

        //untuk mewajibkan semua field terisi
        $this->form_validation->set_rules('namePt','Name_Pt','required|trim');
        $this->form_validation->set_rules('address','Address','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('telpon','Call_Number','required|trim');
        $this->form_validation->set_rules('foto','foto','required|trim');

        //bagian untuk logika insert data
        if( $this->form_validation->run() == false) {
            
            $data['title'] = 'Owner Registration Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
            
        } else {
            $data = [
                'nama_pt' => htmlspecialchars($this->input->post('namePt',true)),
                'alamat' => htmlspecialchars($this->input->post('address',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'telpon' => htmlspecialchars($this->input->post('telpon',true)),
                'foto' => htmlspecialchars($this->input->post('foto',true))
            ];

            $this->RM->insert($data);
            // Setelah data dimasukkan ke database, lanjut redirect..
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Congratulation ! your account has been created !
            </div>');
            redirect('auth');
        }

    }
    public function registration_customer(){
        
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('address','Address','trim|required'); 
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('telpon','Telpon','trim|required');
        $this->form_validation->set_rules('nik','NIK','trim|required');
        $this->form_validation->set_rules('foto','Foto','trim|required');

        if($this->form_validation->run() == false){
            $data['title'] = 'Customer Registration Page';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/registration_customer');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name',true)),
                'alamat' => htmlspecialchars($this->input->post('address',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'telpon' => htmlspecialchars($this->input->post('telpon',true)),
                'nik' => htmlspecialchars($this->input->post('nik',true)),
                'foto' => htmlspecialchars($this->input->post('foto',true))
            ];

            $this->RCM->insert($data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Congratulation ! your account has been created ! </div>');
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> You have been logged out ! </div>');
        redirect('auth');
    }
}
?>