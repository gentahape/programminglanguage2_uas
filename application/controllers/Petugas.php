<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == 0) {
			$this->session->set_flashdata('gagal', 'Anda harus login');
			redirect('login');
		}
	}

	public function index()
	{
		$data['view'] = 'petugas_index';
		$data['data'] = $this->db->order_by('id_petugas','DESC')->get('petugas')->result();
		$this->load->view('template',$data);
	}

	public function add()
	{
		$data['view'] = 'petugas_form';
		$this->load->view('template',$data);
	}

	public function insert()
	{
		$data = array(
			'nama_petugas' => $this->input->post('nama_petugas'), 
			'notelp_petugas' => $this->input->post('notelp_petugas'), 
			'alamat_petugas' => $this->input->post('alamat_petugas'), 
			'username' => $this->input->post('username'), 
			'password' => sha1($this->input->post('password')), 
		);
		$proses = $this->db->insert('petugas', $data);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Berhasil');
			redirect('petugas');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('petugas/add');
		}
	}

	public function edit($id)
	{
		$data['view'] = 'petugas_form';
		$data['data'] = $this->db->get_where('petugas', array('id_petugas' => $id))->row();
		$this->load->view('template',$data);
	}

	public function update($id)
	{
		$where = array('id_petugas' => $id);
		
		if (empty($this->input->post('password'))) {
			$data = array(
				'nama_petugas' => $this->input->post('nama_petugas'), 
				'notelp_petugas' => $this->input->post('notelp_petugas'), 
				'alamat_petugas' => $this->input->post('alamat_petugas'), 
				'username' => $this->input->post('username'), 
			);
		} else {
			$data = array(
				'nama_petugas' => $this->input->post('nama_petugas'), 
				'notelp_petugas' => $this->input->post('notelp_petugas'), 
				'alamat_petugas' => $this->input->post('alamat_petugas'), 
				'username' => $this->input->post('username'), 
				'password' => sha1($this->input->post('password')), 
			);
		}

		$proses = $this->db->update('petugas', $data, $where);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Berhasil');
			redirect('petugas');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('petugas/edit/'.$id);
		}
	}

	public function delete($id)
	{
		$where = array('id_petugas' => $id);
		$proses = $this->db->delete('petugas', $where);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Berhasil');
			redirect('petugas');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('petugas');
		}
	}

}
