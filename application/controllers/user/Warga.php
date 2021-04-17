<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('tgl_indo');
		$this->load->model('user/WargaModel', 'WargaModel');
		$this->load->model('user/SuratModel', 'SuratModel');
		$this->load->model('user/KendaraanModel', 'KendaraanModel');
	}
	public function index()
	{
		if ($this->session->id_warga) {
			$id_warga = $this->session->id_warga;
			$detail_warga = $this->WargaModel->get_warga($id_warga)->row();
			$pendataan_warga = $this->WargaModel->get_detail_warga($id_warga)->result();
			$kendaraan = $this->KendaraanModel->get_all_kendaraan($id_warga)->result();
			$jumlah_hunian = $this->WargaModel->get_detail_warga($id_warga)->num_rows();
			$data['info_kendaraan']  = $kendaraan;
			$data['pendataan_warga']  = $pendataan_warga;
			$data['warga']  = $detail_warga;
			$data['jumlah_hunian']  = $jumlah_hunian;
			$this->load->view('user/layouts/header');
			$this->load->view('user/pages/pendataan-warga', $data);
			$this->load->view('user/layouts/footer');
		} else {
			redirect('user/auth');
		}
	}
	
	public function validasi_tambah_hunian()
	{
		$this->form_validation->set_rules('nama_warga', 'Nama Warga', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required|exact_length[16]|numeric');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('no_hp', 'No Hp', 'required|min_length[10]|numeric|is_unique[detail_warga.no_hp]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|alpha');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('hubungan_keluarga', 'Hubungan Keluarga', 'required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');
		$this->form_validation->set_rules('status_hunian', 'Status Hunian', 'required');
	}

	public function proses_tambah_anggota_warga()
	{
		// Memanggil function untuk validasi
		$this->validasi_tambah_hunian();

		if (empty($_FILES['file_ktp']['name'])) {
			$this->form_validation->set_rules('file_ktp', 'File Identitas', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->index();
			}
		} else {
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 4000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file_ktp')) {
				$this->session->set_flashdata('status', 'File gagal diupload.');
				$this->index();
			} else {
				$id_warga          = $this->session->id_warga;
				$id_detail_warga   = $this->WargaModel->id_detail_warga();
				$nama_warga        = $this->input->post('nama_warga');
				$nik  			   = $this->input->post('nik', true);
				$no_hp  		   = $this->input->post('no_hp', true);
				$tempat_lahir  	   = $this->input->post('tempat_lahir', true);
				$tanggal_lahir     = $this->input->post('tanggal_lahir', true);
				$agama  		   = $this->input->post('agama', true);
				$jenis_kelamin     = $this->input->post('jenis_kelamin', true);
				$status_perkawinan = $this->input->post('status_perkawinan', true);
				$hubungan_keluarga = $this->input->post('hubungan_keluarga', true);
				$status  		   = $this->input->post('status', true);
				$pekerjaan  	   = $this->input->post('pekerjaan', true);
				$pendidikan  	   = $this->input->post('pendidikan', true);
				$status_hunian     = $this->input->post('status_hunian', true);
				$file_ktp    	   = $this->upload->data('file_name');

				$data = [
					'id_warga'  	    => $id_warga,
					'id_detail_warga'   => $id_detail_warga,
					'nama_warga'   	    => $nama_warga,
					'nik'   		    => $nik,
					'no_hp'   		    => $no_hp,
					'tempat_lahir'      => $tempat_lahir,
					'tanggal_lahir'     => $tanggal_lahir,
					'agama'   			=> $agama,
					'status_perkawinan' => $status_perkawinan,
					'jenis_kelamin'     => $jenis_kelamin,
					'hubungan_keluarga' => $hubungan_keluarga,
					'status'   		    => $status,
					'pekerjaan'   		=> $pekerjaan,
					'pendidikan'        => $pendidikan,
					'status_hunian'     => $status_hunian,
					'status_verifikasi' => 1,
					'file_ktp' 		    => $file_ktp
				];
				$this->WargaModel->tambah_anggota_warga($data);
				$this->session->set_flashdata('flash', 'Ditambah');
				redirect(base_url('user/warga'));
			}
		}
	}
	// ----------------------End Data Hunian Warga------------------------
}