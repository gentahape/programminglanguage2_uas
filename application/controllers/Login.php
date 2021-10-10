<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function petugas()
	{
		$this->load->view('login');
	}

	public function cekPetugas()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->db->get_where('petugas', array(
			'username' => $username,
			'password' => sha1($password),
		));
		if ($cek->num_rows() == 0) {
			$this->session->set_flashdata('gagal', 'Username atau Password Salah');
			redirect('login');
		} else {
			
			$session = array(
				'login' => 1, 
				'akses' => 'petugas', 
				'name' => $cek->row()->nama_petugas, 
			);
			$this->session->set_userdata($session);
			redirect('buku');

		}
		
	}

	public function anggota()
	{
		$this->load->view('login');
	}

	public function cekAnggota()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->db->get_where('anggota', array(
			'username' => $username,
			'password' => sha1($password),
		));
		if ($cek->num_rows() == 0) {
			$this->session->set_flashdata('gagal', 'Username atau Password Salah');
			redirect('login');
		} else {
			
			$session = array(
				'login' => 1, 
				'akses' => 'anggota', 
				'name' => $cek->row()->nama_anggota, 
			);
			$this->session->set_userdata($session);
			redirect('buku');

		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('sukses', 'Berhasil Logout');
		redirect(site_url());
	}

}
