<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu extends CI_Controller {

	public function index()
	{
		$this->load->view('tamu');
	}

	public function table()
	{
		
		if ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('gagal', 'Anda harus login');
			redirect('login/petugas');
		}else{
			$data['view'] = 'tamu_table';
			$data['data'] = $this->db->order_by('id_tamu','DESC')->get('tamu')->result();
			$this->load->view('template',$data);
		}

	}

	public function insert()
	{
		$data = array(
			'nama_tamu' => $this->input->post('nama_tamu'), 
			'tanggal_hadir' => date('Y-m-d H:i:s'), 
		);
		$proses = $this->db->insert('tamu', $data);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Selamat datang');
			redirect('umum');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('tamu');
		}
	}

}
