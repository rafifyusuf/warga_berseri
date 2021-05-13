<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aspirasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/AspirasiModel', 'AspirasiModel');
	}

	//============================== TIKETING ASPIRASI ========================//

	public function index()
	{
		$data_warga['data_warga'] = $this->AspirasiModel->getHariIni()->result();
		$this->load->view('user/layouts/header');
		$this->load->view('user/pages/aspirasi/input_aspirasi', $data_warga);
		$this->load->view('user/layouts/footer');
	}

	public function input_data_aspirasi()
	{
		$data = $this->input->post();
		$aspirasi = array(
			'no_tiket' 			=> $data['no_tiket'],
			'tanggal_aspirasi' 	=> $data['tanggal_aspirasi'],
			'jenis_aspirasi'	=> $data['jenis_aspirasi'],
			'aspirasi'			=> $data['aspirasi'],
			'id_detail_warga'	=> $data['id_detail_warga'],
			'status_aspirasi'	=> 'BELUM TERTANGANI'
		);

		$this->AspirasiModel->input_aspirasi($aspirasi);
		redirect('user/aspirasi/data_aspirasi_warga');
	}

	public function data_aspirasi_warga()
	{
		$data_warga = $this->session->all_userdata();
		$data_aspirasi['aspirasi'] = $this->AspirasiModel->daftar_aspirasi($data_warga['id_detail_warga'])->result();
		$this->load->view('user/layouts/header');
		$this->load->view('user/pages/aspirasi/data_aspirasi', $data_aspirasi);
		$this->load->view('user/layouts/footer');
	}

	public function infoAspirasi($id)
	{
		$data['aspirasi'] = $this->AspirasiModel->infoAspirasi($id)->result();
		$this->load->view('user/layouts/header');
		$this->load->view('user/pages/aspirasi/detail_aspirasi', $data);
		$this->load->view('user/layouts/footer');
	}

	public function hapusAspirasi($id)
	{
		$this->AspirasiModel->hapusAspirasi($id);
		redirect('user/aspirasi/data_aspirasi_warga');
	}
}
