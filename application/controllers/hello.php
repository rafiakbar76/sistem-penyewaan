<?php
    class Hello extends CI_Controller{
        public function index(){
            $this->load->model('m_travel');
          
            $data['travel']= $this->m_travel->get_data();

            $this->load->view('v_travel', $data);
        }
    }
?>