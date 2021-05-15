<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iuran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('tgl_indo');
		$this->load->model('admin/WargaModelIuran', 'WargaModel');
		$this->load->model('admin/AspirasiModel', 'AspirasiModel');
		$this->load->model('admin/IuranModel', 'IuranModel');
		$this->load->model('admin/KeuanganModel', 'KeuanganModel');
		// $this->load->model('PenggunaanIuranModel');
		// $this->load->model('PemasukanIuranModel');
	}

	public function index()
	{
		$this->generate_data_iuran();
		redirect('dashboard/');
	}

	//==================Penggunaan Iuran=====================//

	public function data_penggunaan_iuran()
	{
		$this->generate_data_iuran();
		$dataPenggunaan['penggunaan'] = $this->PenggunaanIuranModel->tampilDataPenggunaan()->result();
		$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('penggunaan/dataPenggunaan', $dataPenggunaan);
		$this->load->view('admin/layouts/footer');
	}


	public function tambah_penggunaan()
	{
		$this->generate_data_iuran();
		$this->load->view('admin/layouts/header');
		$this->load->view('penggunaan/tambahPenggunaan');
		$this->load->view('admin/layouts/footer');
	}
	public function input_data_penggunaan()
	{
		$this->generate_data_iuran();
		$data_form = $this->input->post();



		$config['upload_path'] = './bukti_pengeluaran_penggunaan/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '10000';
		$config['max_width'] = '10000';
		$config['max_height'] = '10000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('bukti_penggunaan')) {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		} else {
			$data = array('upload_data'	=>	$this->upload->data());
			$admin = $this->session->all_userdata();

			$data = array(
				'nama_kebutuhan' => $data_form['nama_kebutuhan'],
				'jumlah_pengeluaran' => $data_form['jumlah_pengeluaran'],
				'tanggal_penggunaan' => $data_form['tanggal_penggunaan'],
				'bukti_pengeluaran'	=> "/admin/bukti_pengeluaran_penggunaan/" . $data['upload_data']['file_name'],
				'keterangan' => $data_form['keterangan'],
				'id_admin' => $admin['id_admin']
			);

			$this->PenggunaanIuranModel->tambahdataPenggunaan($data);
			redirect('IuranController/data_penggunaan_iuran');
		}
	}
	public function edit_data_penggunaan($id)
	{
		$this->generate_data_iuran();

		$data_penggunaan['data_penggunaan'] = $this->PenggunaanIuranModel->cari_id_penggunaan($id)->result();
		$this->load->view('admin/layouts/header');
		$this->load->view('penggunaan/editPenggunaan', $data_penggunaan);
		$this->load->view('admin/layouts/footer');
	}

	public function update_data_penggunaan($id)
	{
		$this->generate_data_iuran();
		$data_edit = $this->input->post();

		$data = array(
			'nama_kebutuhan' => $data_edit['nama_kebutuhan'],
			'jumlah_pengeluaran' => $data_edit['jumlah_pengeluaran'],
			'tanggal_penggunaan' => $data_edit['tanggal_penggunaan'],
			'keterangan' => $data_edit['keterangan']
		);

		$this->PenggunaanIuranModel->editdataPenggunaan($data, $id);
		redirect('IuranController/data_penggunaan_iuran');
	}
	public function hapus_data_penggunaan($id)
	{


		$this->PenggunaanIuranModel->hapusdataPenggunaan($id);
		redirect('IuranController/data_penggunaan_iuran');
	}
	//===============Data Iuran==================//

	public function view_dataIuran()
	{
		$this->generate_data_iuran();
		$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
		$dataIuran['iuran'] = $this->IuranModel->tampilDataPembayaran()->result();
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/iuran/dataIuran', $dataIuran);
		$this->load->view('admin/layouts/footer');
	}

	public function riwayat_iuran()
	{
		$this->generate_data_iuran();
		$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
		$dataRiwayat['iuran'] = $this->IuranModel->tampilRiwayatPembayaran()->result();
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/iuran/riwayatIuran', $dataRiwayat);
		$this->load->view('admin/layouts/footer');
	}

	public function bayar_iuran_langsung($id)
	{
		$this->generate_data_iuran();
		$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
		$data['iuran'] = $this->IuranModel->get_iuran_bytagihan($id)->result();
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/iuran/bayarLangsung', $data);
		$this->load->view('admin/layouts/footer');
	}


	public function tambah_iuran()
	{
		$this->generate_data_iuran();
		$data['warga'] = $this->WargaModel->getwarga();
		$this->load->view('admin/layouts/header');
		$this->load->view('admin/pages/iuran/tambahIuran', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function input_data_iuran()
	{
		$this->generate_data_iuran();
		$data_form = $this->input->post();
		$data_warga = $this->WargaModel->getwarga_by_id($data_form['id_detail_warga']);

		$config['upload_path'] = './uploads/bukti_iuran_warga/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '10000';
		$config['max_width'] = '10000';
		$config['max_height'] = '10000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		//KARENA BAYAR DI ADMIN//
		//if(! $this->upload->do_upload('bukti_pembayaran')){
		//$error = array('error' => $this->upload->display_errors());
		//print_r($error);
		//}else{
		$data = array('upload_data'	=>	$this->upload->data());

		$data_pembayaran = array(
			'nama' 					=> $data_warga->nama_warga,
			'tanggal_pembayaran' 	=> $data_form['tanggal_pembayaran'],
			'id_detail_warga' 		=> $data_warga->id_detail_warga,
			'bukti_pembayaran' 		=> 'Pembayaran Tunai', //'/admin/bukti_iuran_warga/'.$data['upload_data']['file_name'],
			'status_iuran'			=> 'Lunas'
		);

		$this->IuranModel->tambahDataPembayaran($data_pembayaran, $data_form['no_tagihan']);
		$saldo = $this->KeuanganModel->getTotalSaldo()->result();
		$total_saldo = $saldo[0]->total_saldo + 100000;
		$data_saldo = array('total_saldo' => $total_saldo);
		$this->KeuanganModel->updateSaldo($data_saldo);
		redirect('admin/iuran/view_dataIuran');
	}


	public function verifikasi_iuran($tagihan)
	{
		$this->generate_data_iuran();
		$this->IuranModel->verifikasi_iuran($tagihan);
		redirect('IuranController/view_dataIuran');
	}


	//===============Upload==================//
	public function view_upload()
	{
		$this->load->view('upload');
	}

	public function upload_bukti_pengeluaran()
	{

		$config['upload_path'] = './bukti_pengeluaran_penggunaan/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '10000';
		$config['max_width'] = '10000';
		$config['max_height'] = '10000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('bukti_penggunaan')) {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		} else {
			$data = array('upload_data'	=>	$this->upload->data());
			echo $data['upload_data']['file_name'];
		}
	}

	// ================================ GENERATE ===============// 

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
