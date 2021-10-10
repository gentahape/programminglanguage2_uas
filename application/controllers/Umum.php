<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umum extends CI_Controller {

	public function index()
	{
		$data['view'] = 'umum_index';
		$data['data'] = $this->db->order_by('id_buku','DESC')->get('buku')->result();
		$this->load->view('template',$data);
	}

	public function daftar()
	{
		$data['view'] = 'umum_daftar';
		$this->load->view('template',$data);
	}

	public function insertAnggota()
	{
		$data = array(
			'nama_anggota' => $this->input->post('nama_anggota'), 
			'jk_anggota' => $this->input->post('jk_anggota'), 
			'notelp_anggota' => $this->input->post('notelp_anggota'), 
			'alamat_anggota' => $this->input->post('alamat_anggota'), 
			'username' => $this->input->post('username'), 
			'password' => sha1($this->input->post('password')), 
		);
		$proses = $this->db->insert('anggota', $data);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Pendaftaran Berhasil');
			redirect('umum');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('umum/daftar');
		}
	}

}
