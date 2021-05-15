<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/WargaModelIuran', 'WargaModel');
		$this->load->model('admin/AspirasiModel', 'AspirasiModel');
		$this->load->model('admin/IuranModel', 'IuranModel');
		$this->load->model('admin/KeuanganModel', 'KeuanganModel');
		$this->load->model('admin/PemasukanIuranModel', 'PemasukanIuranModel');
	}

	public function index()
	{
		$data['aspirasi'] = $this->AspirasiModel->getBelumTertangani()->result();
		$data['saldo'] = $this->KeuanganModel->getTotalSaldo()->result();
		$data['pemasukan'] = $this->PemasukanIuranModel->tampilDataPemasukan()->result();
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pages/pemasukan/index', $data);
		$this->load->view('admin/layouts/footer');
		$this->generate_data_iuran();
	}

	public function detail_pemasukan($id_pemasukan)
	{
		$this->generate_data_iuran();
		$data_pemasukan['pemasukan'] = $this->PemasukanIuranModel->get_pemasukan_byID($id_pemasukan)->result();
		$this->load->view('admin/layouts/header');
		$this->load->view('admin/pages/pemasukan/bukaPemasukan', $data_pemasukan);
		$this->load->view('admin/layouts/footer');
	}

	public function tambah_pemasukan()
	{
		$this->generate_data_iuran();
		$this->load->view('admin/layouts/header');
		$this->load->view('admin/pages/pemasukan/tambahPemasukan');
		$this->load->view('admin/layouts/footer');
	}


	public function input_data_pemasukan()
	{
		$this->generate_data_iuran();
		$data_form = $this->input->post();
		$total_saldo = $this->KeuanganModel->getTotalSaldo()->result();
		$pemasukan = $total_saldo[0]->total_saldo + $data_form['jumlah_pemasukan'];

		// $bulan_convert = strtotime($data_form['tanggal_Pemasukan']);
		// $bulan = date('M',$bulan_convert);
		// echo $bulan;

		if ($pemasukan < 0) {
			$this->session->set_flashdata('error', 'Saldo Tidak Mencukupi');
			redirect('admin/pemasukan/tambah_pemasukan');
		} else {

			$config['upload_path'] = './uploads/bukti_pemasukan/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '10000';
			$config['max_height'] = '10000';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('bukti_pemasukan')) {
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			} else {
				$data = array('upload_data'	=>	$this->upload->data());
				$admin = $this->session->all_userdata();

				$data = array(
					'nama_pemasukan' => $data_form['nama_pemasukan'],
					'kategori' => $data_form['kategori'],
					'jumlah_pemasukan' => $data_form['jumlah_pemasukan'],
					'tanggal_pemasukan' => $data_form['tanggal_pemasukan'],
					'bukti_pemasukan'	=> "/uploads/bukti_pemasukan/" . $data['upload_data']['file_name'],
					'keterangan' => $data_form['keterangan'],
					'id_admin' => $admin['id']
				);
				$totalsaldo = array('total_saldo' => $pemasukan);

				$this->PemasukanIuranModel->tambahdataPemasukan($data);
				$this->KeuanganModel->updateSaldo($totalsaldo);
				redirect('admin/pemasukan/');
			}
		}
	}

	public function edit_data_pemasukan($id)
	{
		$this->generate_data_iuran();
		$data['Pemasukan'] = $this->PemasukanIuranModel->get_Pemasukan_byID($id)->result();
		$this->load->view('admin/layouts/header');
		$this->load->view('Pemasukan/editPemasukan', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function update_data_pemasukan($where)
	{
		$this->generate_data_iuran();
		$data_form = $this->input->post();
		$total_saldo = $this->KeuanganModel->getTotalSaldo()->result();
		$saldo_awal = $total_saldo[0]->total_saldo + $data_form['jumlah_pemasukan_awal'];
		$saldo = array('total_saldo' => $saldo_awal);
		$this->KeuanganModel->updateSaldo($saldo);
		$total_saldo_baru = $this->KeuanganModel->getTotalSaldo()->result();
		$pemasukan = $total_saldo_baru[0]->total_saldo - $data_form['jumlah_pemasukan'];


		if ($pemasukan < 0) {
			$this->session->set_flashdata('error', 'Saldo Tidak Mencukupi');
			redirect('Pemasukan/edit_data_Pemasukan/' . $where);
		} else {
			$admin = $this->session->all_userdata();

			if (empty($_FILES['bukti_pemasukan']['name'])) {

				$data_update = array(
					'nama_kebutuhan' 		=> $data_form['nama_kebutuhan'],
					'jumlah_pemasukan' 	=> $data_form['jumlah_pemasukan'],
					'tanggal_Pemasukan'	=> $data_form['tanggal_Pemasukan'],
					'keterangan'			=> $data_form['keterangan'],
					'id_admin'				=> $admin['id_admin']
				);
				$saldo = array('total_saldo' => $pemasukan);
				$this->PemasukanIuranModel->editDataPemasukan($data_update, $where);
				$this->KeuanganModel->updateSaldo($saldo);
				redirect('Pemasukan/');
			} else {

				$config['upload_path'] = './uploads/bukti_pemasukan_Pemasukan/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '10000';
				$config['max_width'] = '10000';
				$config['max_height'] = '10000';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('bukti_pemasukan')) {
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				} else {
					$data = array('upload_data'	=>	$this->upload->data());
					$admin = $this->session->all_userdata();

					$data = array(
						'nama_kebutuhan' => $data_form['nama_kebutuhan'],
						'jumlah_pemasukan' => $data_form['jumlah_pemasukan'],
						'tanggal_Pemasukan' => $data_form['tanggal_Pemasukan'],
						'bukti_pemasukan'	=> "/uploads/bukti_pemasukan_Pemasukan/" . $data['upload_data']['file_name'],
						'keterangan' => $data_form['keterangan'],
						'id_admin' => $admin['id_admin']
					);
					$saldo = array('total_saldo' => $pemasukan);
					$this->PemasukanIuranModel->editDataPemasukan($data, $where);
					$this->KeuanganModel->updateSaldo($saldo);
					redirect('Pemasukan/');
				}
			}
		}
	}

	public function hapus_data_pemasukan($id)
	{
		$this->generate_data_iuran();
		$data_Pemasukan = $this->PemasukanIuranModel->get_Pemasukan_byID($id)->result();
		$saldo = $this->KeuanganModel->getTotalSaldo()->result();

		$total_saldo = $data_Pemasukan[0]->jumlah_pemasukan + $saldo[0]->total_saldo;
		$saldo_baru = array('total_saldo' => $total_saldo);
		$this->KeuanganModel->updateSaldo($saldo_baru);
		$this->PemasukanIuranModel->hapusDataPemasukan($id);
		redirect('admin/pemasukan/');
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
