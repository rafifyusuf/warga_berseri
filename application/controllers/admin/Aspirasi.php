<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aspirasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/WargaModelIuran', 'WargaModel');
		$this->load->model('admin/AspirasiModel', 'AspirasiModel');
		$this->load->model('admin/IuranModel', 'IuranModel');
		// $this->load->model('Penduduk_model');
		// $this->load->model('Template_model');
		// $this->load->model('Fasilitas_model');
		// $this->load->model('Kendaraan_model');
		// $this->load->model('KeuanganModel');
		// $this->load->model('PenggunaanIuranModel');
	}

	public function index()
	{
		$this->generate_data_iuran();
		$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
		$data['aspirasi_masuk'] = $this->AspirasiModel->aspirasi_masuk()->result();
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/aspirasi/aspirasi_masuk', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function detail_aspirasi($id)
	{
		$this->generate_data_iuran();
		$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
		$data['aspirasi_masuk'] = $this->AspirasiModel->aspirasi_masuk()->result();
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/aspirasi/terima_aspirasi', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function detail_aspirasii($id)
	{
		$this->generate_data_iuran();
		$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
		$data['aspirasi_masuk'] = $this->AspirasiModel->detail_aspirasi($id)->result();
		$data['warga'] = $this->WargaModel->getwarga_by_id($data['aspirasi_masuk'][0]->id_detail_warga);

		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/aspirasi/detail_aspirasi', $data);
		$this->load->view('admin/layouts/footer');
	}
	public function update_status_aspirasi()
	{
		$data = $this->input->post();
		$data_admin = $this->session->all_userdata();
		$data_aspirasi = array(
			'status_aspirasi' =>  $data['status_aspirasi'],
			'respon_aspirasi' =>  $data['respon_aspirasi'],
			'id_admin'        =>  $data_admin['id_admin']
		);
		$data_tiket = $data['no_tiket'];
		$this->AspirasiModel->update_aspirasi($data_tiket, $data_aspirasi);
		redirect('admin/aspirasi/dataAspirasi');
	}

	public function dataAspirasi()
	{
		$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
		$data['aspirasi_masuk'] = $this->AspirasiModel->dataAspirasi()->result();
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/aspirasi/data_aspirasi', $data);
		$this->load->view('admin/layouts/footer');
	}


	//==================================== GENERATE IURAN ===========================//


	public function generate_data_iuran()
	{
		$this->generate_iuran();
		$this->generate_rekap_iuran();
		$this->generate_totalsaldo();
	}

	public function generate_iuran()
	{
		$tagihan_bulanan = date('ym');
		$get_warga = $this->WargaModel->getwarga();


		for ($i = 0; $i < count($get_warga); $i++) {
			$check_tagihan_bulanan  = $this->IuranModel->check_data_iuran($tagihan_bulanan, $get_warga[$i]->id_detail_warga)->result();

			if (empty($check_tagihan_bulanan)) {
				$notagihan = date('ymhis');
				$data_iuran = array(
					'no_tagihan'      => $notagihan + $i,
					'nama'            => $get_warga[$i]->nama_warga,
					'id_detail_warga' => $get_warga[$i]->id_detail_warga,
					'bulan_iuran'     => date('M'),
					'tahun_iuran'     => date('Y')
				);
				$this->IuranModel->tambahDataIuran($data_iuran);
			}
		}
	}

	public function generate_rekap_iuran()
	{
		$bulan = date('M');
		$tahun = date('Y');
		$tagihan_bulanan = date('ym');
		$jumlah_warga = $this->WargaModel->jumlah_warga()->result();
		$tagihan_lunas_bulanan = $this->IuranModel->data_iuran_lunas_bulanan($bulan, $tahun)->result();
		$jumlah_warga_iuran = count($jumlah_warga);
		$warga_sudah_bayar = count($tagihan_lunas_bulanan);
		$warga_belum_bayar = $jumlah_warga_iuran - $warga_sudah_bayar;
		$uang_iuran = count($tagihan_lunas_bulanan) * 100000;

		$check_rekap_iuran = $this->IuranModel->check_rekap_iuran_bulanan($bulan, $tahun)->result();

		if (count($check_rekap_iuran) == 0) {

			$data_keuangan = array(
				'bulan'              => $bulan,
				'tahun'              => $tahun,
				'jumlah_warga'       => $jumlah_warga_iuran,
				'jumlah_sudah_bayar' => $warga_sudah_bayar,
				'jumlah_belum_bayar' => $warga_belum_bayar,
				'saldo'              => $uang_iuran
			);

			$this->IuranModel->rekap_iuran_bulanan($data_keuangan);
		} else {

			$data_keuangan = array(
				'bulan'         => $bulan,
				'tahun'         => $tahun,
				'jumlah_warga'      => $jumlah_warga_iuran,
				'jumlah_sudah_bayar'  => $warga_sudah_bayar,
				'jumlah_belum_bayar'  => $warga_belum_bayar,
				'saldo'         => $uang_iuran
			);

			$this->IuranModel->update_rekap_iruan_bulanan($bulan, $tahun, $data_keuangan);
		}
	}

	public function generate_totalsaldo()
	{

		$check_totalsaldo = $this->IuranModel->check_totalsaldo()->result();

		if (count($check_totalsaldo) == 0) {
			$total_saldo_iuran = $this->IuranModel->getsaldo()->result();

			$this->IuranModel->tambah_totalsaldo($total_saldo_iuran[0]->total_saldo);
		}
	}
}
