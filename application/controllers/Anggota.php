<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function index()
	{
		$data['view'] = 'anggota_index';
		$data['data'] = $this->db->order_by('id_anggota','DESC')->get('anggota')->result();
		$this->load->view('template',$data);
	}

	public function add()
	{
		$data['view'] = 'anggota_form';
		$this->load->view('template',$data);
	}

	public function insert()
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
			$this->session->set_flashdata('sukses', 'Proses Berhasil');
			redirect('anggota');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('anggota/add');
		}
	}

	public function edit($id)
	{
		$data['view'] = 'anggota_form';
		$data['data'] = $this->db->get_where('anggota', array('id_anggota' => $id))->row();
		$this->load->view('template',$data);
	}

	public function update($id)
	{
		$where = array('id_anggota' => $id);
		$data = array(
			'nama_anggota' => $this->input->post('nama_anggota'), 
			'jk_anggota' => $this->input->post('jk_anggota'), 
			'notelp_anggota' => $this->input->post('notelp_anggota'), 
			'alamat_anggota' => $this->input->post('alamat_anggota'), 
			'username' => $this->input->post('username'), 
			'password' => sha1($this->input->post('password')),
		);
		$proses = $this->db->update('anggota', $data, $where);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Berhasil');
			redirect('anggota');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('anggota/edit/'.$id);
		}
	}

	public function delete($id)
	{
		$where = array('id_anggota' => $id);
		$proses = $this->db->delete('anggota', $where);
		if ($proses) {
			$this->session->set_flashdata('sukses', 'Proses Berhasil');
			redirect('anggota');
		} else {
			$this->session->set_flashdata('gagal', 'Proses Gagal');
			redirect('anggota');
		}
	}

}
