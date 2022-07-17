<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->db->select('first_name AS nama,pemenang_keberapa');
		// $this->db->limit(30000);
		$peserta = $this->db->get('peserta')->result();
		$data_peserta = [];
		$data_urutanpemenang = [];
		foreach ($peserta as $row){
		    $data_peserta[] = '"'.$row->nama.'"';
			$data_urutanpemenang[] = $row->pemenang_keberapa;
		}
		$data_peserta_array = implode(',',$data_peserta);
		$data_urutanpemenang_array = implode(',',$data_urutanpemenang);
		$data = array('peserta' => $data_peserta_array, 
					'data_urutanpemenang' => $data_urutanpemenang_array,
					'peserta2' => $data_peserta );
		
		// echo implode(',', $peserta[]);
		$this->load->view('doorprize', $data);
	}

	public function simpan()
	{
		$data_pemenang = $this->db->where('first_name =', $this->input->post('nama'))->get('peserta')->row();
		// echo $data_pemenang->id;
		// $data = array('id_peserta' => $data_pemenang->id, 'pemenang_ke' => $this->input->post('ke'));
		$data = array('id_peserta' => $data_pemenang->id, 'pemenang_ke' => 1);
		$this->db->insert('data_pemenang', $data);
		$this->load->view('hasil');
	}

	public function show(){
		dd(123);
	}
}
