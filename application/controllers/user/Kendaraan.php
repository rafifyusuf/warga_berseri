<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/KendaraanModel', 'KendaraanModel');
	}

	public function proses_tambah_kendaraan()
	{
		$id_warga = $this->session->id_warga;
		$this->form_validation->set_rules('no_polisi', 'No Rumah', 'required|min_length[2]|numeric', [
			'min_length' => 'No rumah yang anda masukan terlalu pendek!'
		]);

		if (empty($_FILES['foto_kendaraan']['name'])) {
			$this->form_validation->set_rules('foto_kendaraan', 'Foto Profil', 'required');
			if ($this->form_validation->run() == FALSE) {
				redirect(base_url('user/warga'));
			}
		} else {
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 4000;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto_kendaraan')) {
				$this->session->set_flashdata('status', 'File gagal diupload.');
				redirect(base_url('user/warga'));
			} else {
				$id_kendaraan 	 = $this->KendaraanModel->id_kendaraan();
				$tipe_kendaraan  = $this->input->post('tipe_kendaraan');
				$merk_kendaraan  = $this->input->post('merk_kendaraan');
				$nama_stnk       = $this->input->post('nama_stnk');
				$no_polisi  	 = $this->input->post('no_polisi');
				$foto_kendaraan  = $this->upload->data('file_name');

				$data_kendaraan = [
					'id_kendaraan'   => $id_kendaraan,
					'id_warga'       => $id_warga,
					'tipe_kendaraan' => $tipe_kendaraan,
					'merk_kendaraan' => $merk_kendaraan,
					'nama_stnk'      => $nama_stnk,
					'no_polisi'      => $no_polisi,
					'foto_kendaraan' => $foto_kendaraan,
				];
				$this->KendaraanModel->tambah_kendaraan($data_kendaraan);
				$this->session->set_flashdata('flash', 'Ditambah');
				redirect(base_url('user/warga'));
			}
		}
	}
}
