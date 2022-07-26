<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function index(){
        $peserta['peserta'] = $this->db->get('peserta', 40)->result();
        // var_dump($peserta['peserta']);die;
        $this->load->view('admin', $peserta);
    }

    public function simpan(){
        $id = $this->input->post('id_peserta');
        // var_dump(count($id));die;
        // var_dump($id);die;
        $this->db->query("UPDATE peserta SET  pemenang_keberapa = ?", array(null));        
        for ($i=0; $i < count($id); $i++) { 
            $this->db->query("UPDATE peserta SET  pemenang_keberapa = ? WHERE id =? ", array($i+1, $id[$i]));
        }        
        redirect('/admin', 'refresh');
    }
}