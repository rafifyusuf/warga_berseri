<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/WargaModel', 'WargaModel');
		$this->load->model('admin/KendaraanModel', 'KendaraanModel');
		$this->load->model('admin/SuratModel', 'SuratModel');
		$this->load->model('admin/AspirasiModel', 'AspirasiModel');
	}
	public function index()
	{

		if ($this->session->email) {
			$role = $this->session->userdata('role_id');
			$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
			if ($role == 1 || $role == 6 || $role == 7) {
				$chart_pendidikan = $this->WargaModel->get_chart_pendidikan()->result();
				$data['chart_pendidikan'] = $chart_pendidikan;
				$chart_hunian = $this->WargaModel->get_chart_hunian()->result();
				$data['chart_hunian'] = $chart_hunian;
				$chart_kendaraan = $this->KendaraanModel->get_chart_kendaraan()->result();
				$data['chart_kendaraan'] = $chart_kendaraan;

				$total_warga = $this->WargaModel->get_all_warga()->num_rows();
				$data['total_warga'] = $total_warga;

				$total_hunian = $this->WargaModel->get_all_penduduk()->num_rows();
				$data['total_hunian'] = $total_hunian;

				$total_kendaraan = $this->KendaraanModel->get_kendaraan()->num_rows();
				$data['total_kendaraan'] = $total_kendaraan;

				$total_pengajuan = $this->SuratModel->get_all_pengajuan()->num_rows();
				$data['total_pengajuan'] = $total_pengajuan;
				$data['title'] = 'Dashboard';

				$this->load->view('admin/layouts/header', $data);
				$this->load->view('admin/pages/index', $data);
				$this->load->view('admin/layouts/footer');
			} else {
				redirect(base_url('admin/user'));
			}
		} else {
			redirect(base_url('admin/auth'));
		}
	}
}
