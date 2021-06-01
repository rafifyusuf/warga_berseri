<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penggunaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('tgl_indo');
		$this->load->helper('tgl_indo');
		$this->load->model('admin/WargaModelIuran', 'WargaModel');
		$this->load->model('admin/AspirasiModel', 'AspirasiModel');
		$this->load->model('admin/IuranModel', 'IuranModel');
		$this->load->model('admin/KeuanganModel', 'KeuanganModel');
		$this->load->model('admin/PenggunaanIuranModel', 'PenggunaanIuranModel');
		// $this->load->model('Kendaraan_model');
		// $this->load->model('PemasukanIuranModel');
	}

	public function index()
	{
		$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
		$data['saldo'] = $this->KeuanganModel->getTotalSaldo()->result();
		$data['penggunaan'] = $this->PenggunaanIuranModel->tampilDataPenggunaan()->result();
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/penggunaan/index', $data);
		$this->load->view('admin/layouts/footer');
		$this->generate_data_iuran();
	}

	public function detail_penggunaan($id_penggunaan)
	{
		$this->generate_data_iuran();
		$data_penggunaan['penggunaan'] = $this->PenggunaanIuranModel->get_penggunaan_byID($id_penggunaan)->result();
		$this->load->view('admin/layouts/header');
		$this->load->view('admin/pages/penggunaan/bukaPenggunaan', $data_penggunaan);
		$this->load->view('admin/layouts/footer');
	}

	public function tambah_penggunaan()
	{
		$this->generate_data_iuran();
		$this->load->view('admin/layouts/header');
		$this->load->view('admin/pages/penggunaan/tambahPenggunaan');
		$this->load->view('admin/layouts/footer');
	}


	public function input_data_penggunaan()
	{
		$this->generate_data_iuran();
		$data_form = $this->input->post();
		$total_saldo = $this->KeuanganModel->getTotalSaldo()->result();
		$pengeluaran = $total_saldo[0]->total_saldo - $data_form['jumlah_pengeluaran'];

		// $bulan_convert = strtotime($data_form['tanggal_penggunaan']);
		// $bulan = date('M',$bulan_convert);
		// echo $bulan;

		if ($pengeluaran < 0) {
			$this->session->set_flashdata('error', 'Saldo Tidak Mencukupi');
			redirect('admin/penggunaan/tambah_penggunaan');
		} else {

			$config['upload_path'] = './uploads/bukti_pengeluaran_penggunaan/';
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
					'kategori' => $data_form['kategori'],
					'jumlah_pengeluaran' => $data_form['jumlah_pengeluaran'],
					'tanggal_penggunaan' => $data_form['tanggal_penggunaan'],
					'bukti_pengeluaran'	=> "/uploads/bukti_pengeluaran_penggunaan/" . $data['upload_data']['file_name'],
					'keterangan' => $data_form['keterangan'],
					'id_admin' => $admin['id'],
					'bulan_penggunaan' => date('M'),
					'tahun_penggunaan' => date('Y')
				);
				$totalsaldo = array('total_saldo' => $pengeluaran);

				$this->PenggunaanIuranModel->tambahdataPenggunaan($data);
				$this->KeuanganModel->updateSaldo($totalsaldo);
				redirect('admin/penggunaan');
			}
		}
	}

	public function edit_data_penggunaan($id)
	{
		$this->generate_data_iuran();
		$data['penggunaan'] = $this->PenggunaanIuranModel->get_penggunaan_byID($id)->result();
		$this->load->view('admin/layouts/header');
		$this->load->view('admin/pages/penggunaan/editPenggunaan', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function update_data_penggunaan($where)
	{
		$this->generate_data_iuran();
		$data_form = $this->input->post();
		$total_saldo = $this->KeuanganModel->getTotalSaldo()->result();
		$saldo_awal = $total_saldo[0]->total_saldo + $data_form['jumlah_pengeluaran_awal'];
		$saldo = array('total_saldo' => $saldo_awal);
		$this->KeuanganModel->updateSaldo($saldo);
		$total_saldo_baru = $this->KeuanganModel->getTotalSaldo()->result();
		$pengeluaran = $total_saldo_baru[0]->total_saldo - $data_form['jumlah_pengeluaran'];


		if ($pengeluaran < 0) {
			$this->session->set_flashdata('error', 'Saldo Tidak Mencukupi');
			redirect('admin/penggunaan/edit_data_penggunaan/' . $where);
		} else {
			$admin = $this->session->all_userdata();

			if (empty($_FILES['bukti_pengeluaran']['name'])) {

				$data_update = array(
					'nama_kebutuhan' 		=> $data_form['nama_kebutuhan'],
					'jumlah_pengeluaran' 	=> $data_form['jumlah_pengeluaran'],
					'tanggal_penggunaan'	=> $data_form['tanggal_penggunaan'],
					'keterangan'			=> $data_form['keterangan'],
					'id_admin'				=> $admin['id'],
					'bulan_penggunaan' => date('M'),
					'tahun_penggunaan' => date('Y')
				);
				$saldo = array('total_saldo' => $pengeluaran);
				$this->PenggunaanIuranModel->editDataPenggunaan($data_update, $where);
				$this->KeuanganModel->updateSaldo($saldo);
				redirect('admin/penggunaan/');
			} else {

				$config['upload_path'] = './uploads/bukti_pengeluaran_penggunaan/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '10000';
				$config['max_width'] = '10000';
				$config['max_height'] = '10000';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('bukti_pengeluaran')) {
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				} else {
					$data = array('upload_data'	=>	$this->upload->data());
					$admin = $this->session->all_userdata();

					$data = array(
						'nama_kebutuhan' => $data_form['nama_kebutuhan'],
						'jumlah_pengeluaran' => $data_form['jumlah_pengeluaran'],
						'tanggal_penggunaan' => $data_form['tanggal_penggunaan'],
						'bukti_pengeluaran'	=> "/uploads/bukti_pengeluaran_penggunaan/" . $data['upload_data']['file_name'],
						'keterangan' => $data_form['keterangan'],
						'id_admin' => $admin['id']
					);
					$saldo = array('total_saldo' => $pengeluaran);
					$this->PenggunaanIuranModel->editDataPenggunaan($data, $where);
					$this->KeuanganModel->updateSaldo($saldo);
					redirect('admin/penggunaan');
				}
			}
		}
	}

	public function hapus_data_penggunaan($id)
	{
		$this->generate_data_iuran();
		$data_penggunaan = $this->PenggunaanIuranModel->get_penggunaan_byID($id)->result();
		$saldo = $this->KeuanganModel->getTotalSaldo()->result();

		$total_saldo = $data_penggunaan[0]->jumlah_pengeluaran + $saldo[0]->total_saldo;
		$saldo_baru = array('total_saldo' => $total_saldo);
		$this->KeuanganModel->updateSaldo($saldo_baru);
		$this->PenggunaanIuranModel->hapusDataPenggunaan($id);
		redirect('admin/penggunaan/');
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
		$get_rumah = $this->WargaModel->getrumah();
		$get_warga = $this->WargaModel->getwarga();
		for ($i = 0; $i < count($get_rumah); $i++) {
			$check_tagihan_bulanan  = $this->IuranModel->check_data_iuran($tagihan_bulanan, $get_rumah[$i]->id_warga)->result();
			$sw = $this->IuranModel->check_status($get_rumah[$i]->id_warga)->result();
			$get_kepkel = $this->IuranModel->get_kepala_keluarga($get_rumah[$i]->id_warga)->result();
			$stat = $sw[0]->status_rumah;
			$kepkel = $get_kepkel[0]->nama_warga;

			if (empty($check_tagihan_bulanan)) {
				$notagihan = date('ymhis');
				$nominal = 0;
				if ($stat == "Rumah Tinggal") {
					$nominal = 100000;
				} elseif ($stat == 'Rumah Usaha') {
					$nominal = 200000;
				} elseif ($sw = 'Rumah Pribadi') {
					$nominal = 150000;
				}
				$data_iuran = array(
					'no_tagihan'      => $notagihan + $i,
					'id_warga' => $get_rumah[$i]->id_warga,
					'nama'            => $kepkel,
					//'id_detail_warga' => $get_warga[$i]->id_detail_warga,
					'jenis'			  => 'wajib',
					'nominal' 		  => $nominal,
					'bulan_iuran'     => date('M'),
					'tahun_iuran'     => date('Y')
				);
				$this->IuranModel->tambahDataIuran($data_iuran);
				//print_r($data_iuran);
			}
			//print_r($kepkel);
			//print_r($check_tagihan_bulanan);

		}
	}

	//public function generate_iuran()
	//{
	//	$tagihan_bulanan = date('ym');
	//	$get_warga = $this->WargaModel->getwarga();


	//	for ($i = 0; $i < count($get_warga); $i++) {
	//		$check_tagihan_bulanan  = $this->IuranModel->check_data_iuran($tagihan_bulanan, $get_warga[$i]->id_detail_warga)->result();

	//		if (empty($check_tagihan_bulanan)) {
	//			$notagihan = date('ymhis');
	//			$data_iuran = array(
	//				'no_tagihan'      => $notagihan + $i,
	//				'nama'            => $get_warga[$i]->nama_warga,
	//				'id_detail_warga' => $get_warga[$i]->id_detail_warga,
	//				'bulan_iuran'     => date('M'),
	//				'tahun_iuran'     => date('Y')
	//			);
	//			$this->IuranModel->tambahDataIuran($data_iuran);
	//		}
	//	}
	//}

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
