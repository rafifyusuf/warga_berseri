<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('tgl_indo');
		$this->load->model('admin/WargaModelIuran', 'WargaModel');
		$this->load->model('admin/AspirasiModel', 'AspirasiModel');
		$this->load->model('admin/IuranModel', 'IuranModel');
		$this->load->model('admin/KeuanganModel', 'KeuanganModel');
	}

	public function index()
	{
		$this->generate_data_iuran();
		$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
		$data['keuangan'] = $this->KeuanganModel->getKeuangan()->result();
		$data['totalsaldo'] = $this->KeuanganModel->getTotalSaldo()->result();

		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/keuangan/index', $data);
		$this->load->view('admin/layouts/footer');
	}


	public function detail_rekap($bulan, $tahun)
	{
		$this->generate_data_iuran();
		//$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
		$rekapIuran['iuran'] = $this->KeuanganModel->get_rekap_info($bulan, $tahun)->result();

		// var_dump($rekapIuran['iuran']);
		$this->load->view('admin/layouts/header');
		$this->load->view('admin/pages/keuangan/detail_rekap_keuangan', $rekapIuran);
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
