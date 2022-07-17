<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
    public function index(){
        $peserta['peserta'] = $this->db->get('peserta', 40)->result();
        $this->load->view('admin', $peserta);
    }

    public function simpan(){
        // var_dump($this->input->post('id_peserta'));die;
        $this->db->update("peserta", ['pemenang_keberapa' => null]);
        $this->db->where('id', $this->input->post('id_peserta'));
        $this->db->update("peserta", ['pemenang_keberapa' => 1]);
        redirect('/admin', 'refresh');
    }
}