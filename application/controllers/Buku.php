<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('gagal', 'Anda harus login');
			redirect('login/petugas');
		}
	}

	public function index()
	{
		$data['view'] = 'buku_index';
		$data['data'] = $this->db->order_by('id_buku','DESC')->get('buku')->result();
		$this->load->view('template',$data);
	}

	public function add()
	{
		$data['view'] = 'buku_form';
		$this->load->view('template',$data);
	}

	public function insert()
	{
		$data = array(
			'kode_buku' => $this->input->post('kode_buku'), 
			'judul_buku' => $this->input->post('judul_buku'), 
			'penulis_buku' => $this->input->post('penulis_buku'), 
			'penerbit_buku' => $this->input->post('penerbit_buku'), 
		);
		$proses = $this->db->insert('buku', $data);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Berhasil');
			redirect('buku');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('buku/add');
		}
	}

	public function edit($id)
	{
		$data['view'] = 'buku_form';
		$data['data'] = $this->db->get_where('buku', array('id_buku' => $id))->row();
		$this->load->view('template',$data);
	}

	public function update($id)
	{
		$where = array('id_buku' => $id);
		$data = array(
			'kode_buku' => $this->input->post('kode_buku'), 
			'judul_buku' => $this->input->post('judul_buku'), 
			'penulis_buku' => $this->input->post('penulis_buku'), 
			'penerbit_buku' => $this->input->post('penerbit_buku'), 
		);
		$proses = $this->db->update('buku', $data, $where);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Berhasil');
			redirect('buku');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('buku/edit/'.$id);
		}
	}

	public function delete($id)
	{
		$where = array('id_buku' => $id);
		$proses = $this->db->delete('buku', $where);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Berhasil');
			redirect('buku');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('buku');
		}
	}

}
