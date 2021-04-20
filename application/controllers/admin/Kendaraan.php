<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/KendaraanModel', 'KendaraanModel');
	}

	public function index($id_warga)
	{
		if (!$this->session->username) {
			redirect(base_url('admin'));
		} else {
			$query = $this->KendaraanModel->get_all_kendaraan($id_warga)->result();
			$data['info_kendaraan'] = $query;
			$data['title'] = 'Kendaraan';
			$data['id'] = $id_warga;
			$this->load->view('admin/layouts/header', $data);
			$this->load->view('admin/pages/info-kendaraan', $data);
			$this->load->view('admin/layouts/footer');
		}
	}
	public function proses_tambah_kendaraan()
	{
		$id_warga = $this->input->post('id_warga');
		$this->form_validation->set_rules('no_polisi', 'No Rumah', 'required|min_length[2]|numeric', [
			'min_length' => 'No rumah yang anda masukan terlalu pendek!'
		]);

		if (empty($_FILES['foto_kendaraan']['name'])) {
			$this->form_validation->set_rules('foto_kendaraan', 'Foto Profil', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->index($id_warga);
			}
		} else {
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 4000;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto_kendaraan')) {
				$this->session->set_flashdata('status', 'File gagal diupload.');
				$this->index($id_warga);
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
				redirect(base_url('admin/kendaraan/index/' . $id_warga));
			}
		}
	}
	public function hapus_kendaraan($id_kendaraan)
	{
		$id_kendaraan = $this->delete->id_kendaraan;
	}
}
