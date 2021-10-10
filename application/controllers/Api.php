<?php

class Api extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                header("Access-Control-Allow-Methods: GET");
            }

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
            }

            exit(0);
        }

        $this->checkToken();
    }

    public function returnJson($data, $httpCode = null)
    {
        $code = ($httpCode != null) ? $httpCode : 201;
        header('Content-Type: application/json');
        echo json_encode($data, $code);
        die();
    }

    public function checkToken()
    {
        $headers = $this->input->request_headers();
        if (isset($headers['authorization']) OR isset($headers['Authorization'])) {
            $header = (isset($headers['Authorization']) ? $headers['Authorization'] : $headers['authorization']);
    
            $header = explode(" ", $header);
            $this->userAuth = $header[1];
        } else {
            $status = array('status' => array('response' => 403, 'message' => 'Forbidden'));
            $this->returnJson($status, 403);
        }

        $username = 'genta';
        $password = 'haetamiputra';
        $localAuth = base64_encode("$username:$password");
        $auth[$localAuth] = $username;

        if (!array_key_exists($this->userAuth, $auth)) {
            $status = array('status' => array('response' => 401, 'message' => 'Unauthorized'));
            $this->returnJson($status, 401);
        } else {
            $this->userId = $auth[$this->userAuth];
            return true;
        }
    }
	
	public function getBuku()
	{
		$query = $this->db->order_by('id_buku','DESC')->get('buku')->result();
		
		$status = array('response' => 200, 'message' => 'Data Buku');
		$data = array(
		    'status' => $status, 
		    'data' => $query
		);
		$this->returnJson($data);
	}

	public function getAnggota()
	{
		$query = $this->db->order_by('id_anggota','DESC')->get('anggota')->result();

		$status = array('response' => 200, 'message' => 'Daftar Anggota');
		$data = array(
		    'status' => $status, 
		    'data' => $query
		);
		$this->returnJson($data);
	}

	public function insertAnggota()
	{
		$data = array(
			'nama_anggota' => $this->input->post('nama_anggota'), 
			'jk_anggota' => $this->input->post('jk_anggota'), 
			'notelp_anggota' => $this->input->post('notelp_anggota'), 
			'alamat_anggota' => $this->input->post('alamat_anggota'), 
		);
		$proses = $this->db->insert('anggota', $data);
		if ($proses) {
			$status = array('status' => array('response' => 200, 'message' => 'Proses berhasil'));
            $this->returnJson($status);
		} else {
			$status = array('status' => array('response' => 400, 'message' => 'Proses gagal'));
            $this->returnJson($status);
		}
	}

	public function getPeminjaman()
	{
		$query = $this->db->order_by('id_peminjaman','DESC')
		->from('peminjaman')
		->join('buku', 'buku.id_buku = peminjaman.id_buku')
		->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota')
		->get()->result();

		$status = array('response' => 200, 'message' => 'Data Peminjaman');
		$data = array(
		    'status' => $status, 
		    'data' => $query
		);
		$this->returnJson($data);
	}

	public function insertPeminjaman()
	{
		$data = array(
			'id_buku' => $this->input->post('id_buku'), 
			'id_anggota' => $this->input->post('id_anggota'), 
			'tanggal_peminjaman' => $this->input->post('tanggal_peminjaman'), 
		);
		$proses = $this->db->insert('peminjaman', $data);
		if ($proses) {
			$status = array('status' => array('response' => 200, 'message' => 'Proses berhasil'));
            $this->returnJson($status);
		} else {
			$status = array('status' => array('response' => 400, 'message' => 'Proses gagal'));
            $this->returnJson($status);
		}
	}

}