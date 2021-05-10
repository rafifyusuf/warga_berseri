<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/KendaraanModel', 'KendaraanModel');
	}

	// public function index()
	// {
	// 	if (!$this->session->email) {
	// 		redirect(base_url('admin'));
	// 	} else {
	// 		$query = $this->KendaraanModel->get_kendaraan()->result();
	// 		$data['data'] = $query;
	// 		$data['title'] = 'Kendaraan';
	// 		$this->load->view('admin/layouts/header', $data);
	// 		$this->load->view('admin/pages/kendaraan/info-kendaraan', $data);
	// 		$this->load->view('admin/layouts/footer');
	// 	}
	// }

	public function data($id_warga)
	{
		if (!$this->session->email) {
			redirect(base_url('admin'));
		} else {
			$query = $this->KendaraanModel->get_all_kendaraan($id_warga)->result();
			$data['info_kendaraan'] = $query;
			$data['title'] = 'Kendaraan';
			$data['id'] = $id_warga;
			$this->load->view('admin/layouts/header', $data);
			$this->load->view('admin/pages/kendaraan/info-kendaraan', $data);
			$this->load->view('admin/layouts/footer');
		}
	}

	public function tambah_kendaraan($id_warga)
	{
		if (!$this->session->email) {
			redirect(base_url('admin'));
		} else {
			$data['title'] = 'Tambah Kendaraan';
			$data['id_warga'] = $id_warga;
			$this->load->view('admin/layouts/header', $data);
			$this->load->view('admin/pages/kendaraan/tambah-kendaraan', $data);
			$this->load->view('admin/layouts/footer');
		}
	}

	public function proses_tambah_kendaraan()
	{
		$id_warga = $this->input->post('id_warga');
		if (empty($_FILES['foto_kendaraan']['name'])) {
			$this->form_validation->set_rules('no_polisi', 'Nomor Polisi', 'required|min_length[2]', [
				'min_length' => 'No polisi yang anda masukan terlalu pendek!'
			]);
			$this->form_validation->set_rules('tipe_kendaraan', 'Tipe Kendaraan', 'required');
			$this->form_validation->set_rules('merk_kendaraan', 'Merk Kendaraan', 'required');
			$this->form_validation->set_rules('nama_stnk', 'Nama Pemilik', 'required');
			$this->form_validation->set_rules('foto_kendaraan', 'Foto Kendaraan', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->tambah_kendaraan($id_warga);
			}
		} else {
			$config['upload_path']          = './uploads/kendaraan/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 4000;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto_kendaraan')) {
				$this->session->set_flashdata('status', 'File gagal diupload.');
				$this->tambah_kendaraan($id_warga);
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
				redirect(base_url('admin/kendaraan/data/' . $id_warga));
			}
		}
	}
	public function hapus_kendaraan($id_kendaraan)
	{
		$id_warga = $this->uri->segment(5);
		// $no_rumah = $this->uri->segment(6);
		$this->KendaraanModel->hapus_kendaraan($id_kendaraan);
		redirect(base_url('admin/kendaraan/data/' . $id_warga));
	}
}
