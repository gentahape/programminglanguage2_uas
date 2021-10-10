<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

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
		$data['view'] = 'peminjaman_index';
		$data['data'] = $this->db->order_by('id_peminjaman','DESC')
		->from('peminjaman')
		->join('buku', 'buku.id_buku = peminjaman.id_buku')
		->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota')
		->get()->result();
		$this->load->view('template',$data);
	}

	public function add()
	{
		$data['view'] = 'peminjaman_form';
		$data['buku'] = $this->db->order_by('id_buku','DESC')->get('buku')->result();
		$data['anggota'] = $this->db->order_by('id_anggota','DESC')->get('anggota')->result();
		$this->load->view('template',$data);
	}

	public function insert()
	{
		$data = array(
			'id_buku' => $this->input->post('id_buku'), 
			'id_anggota' => $this->input->post('id_anggota'), 
			'tanggal_peminjaman' => $this->input->post('tanggal_peminjaman'), 
		);
		$proses = $this->db->insert('peminjaman', $data);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Berhasil');
			redirect('peminjaman');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('peminjaman/add');
		}
	}

	public function edit($id)
	{
		$data['view'] = 'peminjaman_form';
		$data['data'] = $this->db
		->from('peminjaman')
		->join('buku', 'buku.id_buku = peminjaman.id_buku')
		->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota')
		->where('id_peminjaman', $id)
		->get()->row();
		$data['buku'] = $this->db->order_by('id_buku','DESC')->get('buku')->result();
		$data['anggota'] = $this->db->order_by('id_anggota','DESC')->get('anggota')->result();
		$this->load->view('template',$data);
	}

	public function update($id)
	{
		$where = array('id_peminjaman' => $id);
		$data = array(
			'id_buku' => $this->input->post('id_buku'), 
			'id_anggota' => $this->input->post('id_anggota'), 
			'tanggal_peminjaman' => $this->input->post('tanggal_peminjaman'),
		);
		$proses = $this->db->update('peminjaman', $data, $where);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Berhasil');
			redirect('peminjaman');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('peminjaman/edit/'.$id);
		}
	}

	public function delete($id)
	{
		$where = array('id_peminjaman' => $id);
		$proses = $this->db->delete('peminjaman', $where);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Berhasil');
			redirect('peminjaman');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('peminjaman');
		}
	}

}
