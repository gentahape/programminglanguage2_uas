<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpus extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('gagal', 'Anda harus login');
			redirect('login/anggota');
		}
	}

	public function index()
	{
		$data['view'] = 'perpus';
		$data['data'] = $this->db->order_by('id_buku','DESC')->get('buku')->result();
		$this->load->view('template',$data);
	}

	public function insertPesanan()
	{
		$data = array(
			'id_buku' => $this->input->post('id_buku'), 
			'id_anggota' => $this->input->post('id_anggota'), 
			'tanggal_peminjaman' => date('Y-m-d'), 
		);
		$proses = $this->db->insert('peminjaman', $data);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Peminjaman Berhasil');
			redirect('perpus');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('perpus');
		}
	}

}
