<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iuran extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/PenggunaanIuranModel', 'PenggunaanIuranModel');
		$this->load->model('user/IuranModel', 'IuranModel');
		$this->load->model('user/WargaModelIuran', 'WargaModel');
	}

	public function index()
	{
		if ($this->session->no_hp) {
			$this->generate_data_iuran();
			$warga = $this->session->all_userdata();
			$data_iuran['iuran'] = $this->IuranModel->get_IuranWarga($warga['id_detail_warga'])->result();
			$this->load->view('user/layouts/header');
			$this->load->view('user/pages/iuran/dataIuranWarga', $data_iuran);
			$this->load->view('user/layouts/footer');
		} else {
			redirect('user/auth');
		}
	}

	//==================Penggunaan Iuran=====================//
	public function data_penggunaan()
	{
		if ($this->session->no_hp) {
			$this->generate_data_iuran();
			$dataPenggunaan['penggunaan'] = $this->PenggunaanIuranModel->tampilDataPenggunaan()->result();
			$this->load->view('user/layouts/header');
			$this->load->view('user/pages/iuran/dataPenggunaan', $dataPenggunaan);
			$this->load->view('user/layouts/footer');
		} else {
			redirect('user/auth');
		}
	}

	public function infoPenggunaanIuran($id)
	{
		$this->generate_data_iuran();
		$dataPenggunaan['penggunaan'] = $this->PenggunaanIuranModel->cari_id_penggunaan($id)->result();
		$dataPenggunaan['admin'] = $this->IuranModel->get_nama_admin($dataPenggunaan['penggunaan'][0]->id_admin)->result();
		$this->load->view('user/layouts/header');
		$this->load->view('user/pages/iuran/infoPenggunaan', $dataPenggunaan);
		$this->load->view('user/layouts/footer');
	}

	public function riwayat_iuran()
	{
		if ($this->session->no_hp) {
			$this->generate_data_iuran();
			$warga = $this->session->all_userdata();
			$riwayatIuran['iuran'] = $this->IuranModel->get_IuranWarga_lunas($warga['id_detail_warga'])->result();
			$this->load->view('user/layouts/header');
			$this->load->view('user/pages/iuran/riwayatIuran', $riwayatIuran);
			$this->load->view('user/layouts/footer');
		} else {
			redirect('user/auth');
		}
	}

	public function tambah_data_pembayaran($id)
	{
		$this->generate_data_iuran();
		$data_iuran['iuran'] = $this->IuranModel->get_tagihanIuran($id)->result();
		$this->load->view('user/layouts/header');
		$this->load->view('user/pages/iuran/inputIuran', $data_iuran);
		$this->load->view('user/layouts/footer');
	}

	public function input_data_pembayaran()
	{
		$this->generate_data_iuran();
		$nama_warga = $this->input->post('nama_warga');
		$tgl     	= $this->input->post('tanggal_pembayaran');
		$pem 		= $this->input->post('pembayaran');
		$id 		= $this->input->post('id_detail_warga');
		$no_tagihan = $this->input->post('no_tagihan');


		$config['upload_path'] = './uploads/bukti_pembayaran_iuran/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '10000';
		$config['max_width'] = '10000';
		$config['max_height'] = '10000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('bukti_pembayaran')) {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		} else {
			$data = array('upload_data'	=>	$this->upload->data());
			$data_iuran = array(
				'tanggal_pembayaran' => $tgl,
				'bukti_pembayaran'	=> "/uploads/bukti_pembayaran_iuran/" . $data['upload_data']['file_name'],
				'status_iuran' => 'Belum Diverifikasi'
			);
			var_dump($data_iuran);
			$this->IuranModel->tambahDataPembayaran($data_iuran, $no_tagihan);
			redirect('user/iuran');
		}
	}
	public function edit_data_penggunaan($id)
	{
		$this->generate_data_iuran();

		$data_penggunaan['data_penggunaan'] = $this->PenggunaanIuranModel->cari_id_penggunaan($id)->result();

		$this->load->view('theme/atas');
		$this->load->view('AdminIuran/editdataPenggunaan', $data_penggunaan);
		$this->load->view('layouts/footer');
	}

	public function update_data_penggunaan($id)
	{
		$this->generate_data_iuran();
		$nama = $this->input->post('nama_kebutuhan');
		$jml = $this->input->post('jumlah_pengeluaran');
		$tgl = $this->input->post('tanggal_penggunaan');

		$ket = $this->input->post('keterangan');

		$data = array(
			'nama_kebutuhan' => $nama,
			'jumlah_pengeluaran' => $jml,
			'tanggal_penggunaan' => $tgl,
			'keterangan' => $ket
		);

		$this->PenggunaanIuranModel->editdataPenggunaan($data, $id);
		redirect('AdminIuranController/data_penggunaan');
	}
	public function hapus_data_penggunaan($id)
	{

		$this->PenggunaanIuranModel->hapusdataPenggunaan($id);
		redirect('AdminIuranController/data_penggunaan');
	}
	//===============Data Iuran==================//

	public function view_upload()
	{
		$this->load->view('upload');
	}

	public function upload_bukti_pembayaran()
	{
		$this->generate_data_iuran();

		$config['upload_path'] = './bukti_pembayaran_iuran/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '10000';
		$config['max_width'] = '10000';
		$config['max_height'] = '10000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('bukti_pembayaran')) {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		} else {
			$data = array('upload_data'	=>	$this->upload->data());
			echo $data['upload_data']['file_name'];
		}
	}


	/// ============================ REKAP IURAN =====================//

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
				'bulan'         => $bulan,
				'tahun'         => $tahun,
				'jumlah_warga'      => $jumlah_warga_iuran,
				'jumlah_sudah_bayar'  => $warga_sudah_bayar,
				'jumlah_belum_bayar'  => $warga_belum_bayar,
				'saldo'         => $uang_iuran
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
