<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AspirasiModel extends CI_Model
{

	public function getHariIni()
	{
		return $this->db->query("SELECT curdate() as 'tanggal_sekarang' ");
	}

	public function input_aspirasi($data)
	{
		$this->db->insert('data_aspirasi_warga', $data);
	}

	public function daftar_aspirasi($id_detail_warga)
	{
		$this->db->where('id_detail_warga', $id_detail_warga);
		return $this->db->get('data_aspirasi_warga');
	}

	public function infoAspirasi($id)
	{
		$this->db->where('no_tiket', $id);
		return $this->db->get('data_aspirasi_warga');
	}

	public function hapusAspirasi($id)
	{
		$this->db->where('no_tiket', $id);
		$this->db->delete('data_aspirasi_warga');
	}
}
