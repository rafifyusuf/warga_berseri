<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('tgl_indo');
		$this->load->model('user/SuratModel', 'SuratModel');
	}
	public function index()
	{
		if ($this->session->id_warga) {
			$nama = $this->SuratModel->get_nama_warga()->result();
			$pengajuan = $this->SuratModel->get_pengajuan_surat()->result();
			$data['nama']  = $nama;
			$data['pengajuan']  = $pengajuan;
			$this->load->view('user/layouts/header');
			$this->load->view('user/pages/pengajuan-surat', $data);
			$this->load->view('user/layouts/footer');
		} else {
			redirect('user/auth');
		}
	}
	public function tambah_pengajuan()
	{
		$id_pengajuan_surat = $this->SuratModel->id_pengajuan_surat();
		$id_detail_warga    = $this->input->post('id_detail_warga');
		$pengajuan    		= $this->input->post('pengajuan', true);
		$tanggal_pengajuan  = date("Y-m-d");

		$data = [
			'id_pengajuan_surat' => $id_pengajuan_surat,
			'id_detail_warga'    => $id_detail_warga,
			'pengajuan'    	 	 => $pengajuan,
			'tanggal_pengajuan'  => $tanggal_pengajuan,
			'verifikasi_rt'  => "Diproses",
			'verifikasi_rw'  => "Diproses",
		];
		$this->SuratModel->tambah_pengajuan_surat($data);
		$this->session->set_flashdata('flash', 'Pengajuan Surat Berhasil Ditambah');
		redirect(base_url('user/surat'));
	}
	public function download_surat($id_pengajuan_surat)
	{
		$data_surat = $this->SuratModel->download_surat($id_pengajuan_surat)->row();
		$data['data']  = $data_surat;
		$this->load->view('user/pages/download-surat', $data);
	}

	public function download_template($id_surat)
	{
		$this->load->helper('download');
		$fileinfo = $this->SuratModel->get_template_surat($id_surat)->row_array();
		$file = 'uploads/' . $fileinfo['file_surat'];
		force_download($file, NULL);
	}

	public function template_surat()
	{
		if ($this->session->id_warga) {
			$template_surat = $this->SuratModel->get_all_template()->result();
			$data['template_surat']  = $template_surat;
			$this->load->view('user/layouts/header');
			$this->load->view('user/pages/template-surat', $data);
			$this->load->view('user/layouts/footer');
		} else {
			redirect('user/auth');
		}
	}
}
