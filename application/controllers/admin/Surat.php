<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('tgl_indo');
		$this->load->model('admin/SuratModel', 'SuratModel');
		$this->load->model('admin/WargaModel', 'WargaModel');
	}

	// ----------------------Start Pengajuan Surat----------------------

	public function index()
	{
		$query = $this->WargaModel->get_all_warga()->result();
		$pengajuan_surat = $this->SuratModel->get_pengajuan()->result();
		$data['pendataan_warga'] = $query;
		$data['pengajuan_surat'] = $pengajuan_surat;
		$data['title'] = 'Pengajuan Surat';
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/pengajuan-surat', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function verifikasi_surat()
	{
		$id_pengajuan_surat = $this->input->post('id_pengajuan_surat');
		$rt 				= $this->input->post('rt');
		$rw 				= $this->input->post('rw');
		$tanggal_disetujui  = date("Y-m-d");

		$data = [
			'tanggal_disetujui' => $tanggal_disetujui,
			'kode_surat'        => "091201212",
			'no_surat'          => "121 / 213 / 5541XII",
			'rt'                => $rt,
			'rw' 		        => $rw,
			'status_verifikasi' => "Disetujui"
		];
		$this->SuratModel->update_verifikasi_surat($id_pengajuan_surat, $data);
		redirect(base_url('admin/surat'));
	}

	// ------------------------End Pengajuan Surat------------------------


	public function template_surat()
	{
		$data['title'] = 'Template Surat';
		$template_surat = $this->SuratModel->get_all_template_surat()->result();
		$data['template_surat'] = $template_surat;
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/template-surat', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function view_tambah_template_surat()
	{
		$data['title'] = 'Tambah Template Surat';
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/tambah-template-surat', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function tambah_template_surat()
	{
		if (empty($_FILES['file_surat']['name'])) {
			$this->form_validation->set_rules('file_surat', 'file surat', 'required');
		}
		$config['upload_path']    = './uploads/';
		$config['allowed_types']  = 'pdf|docx|doc';
		$config['max_size']       = 5000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_surat')) {
			$this->session->set_flashdata('status', 'File gagal diupload.');
			redirect(base_url('admin/surat/template_surat'));
		} else {
			$id_admin         = $this->session->id_admin;
			$id_template 	  = $this->SuratModel->id_template_surat();
			$judul            = $this->input->post('judul');
			$keterangan_surat = $this->input->post('keterangan_surat');
			$file_surat       = $this->upload->data('file_name');

			$data = array(
				'id_admin' => $id_admin,
				'id_surat' => $id_template,
				'judul'            => $judul,
				'keterangan_surat' => $keterangan_surat,
				'file_surat'       => $file_surat
			);

			$this->SuratModel->tambah_template_surat($data);
			$this->session->set_flashdata('file', 'File berhasil diupload');
			redirect(base_url('admin/surat/template_surat'));
		}
	}
	public function download_template_surat($id_pengajuan_surat)
	{
		$this->load->helper('download');
		$fileinfo = $this->WargaModel->download_surat($id_pengajuan_surat)->row_array();
		$file = 'uploads/' . $fileinfo['file_surat'];
		force_download($file, NULL);
	}
}
