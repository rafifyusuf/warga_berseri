<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemasukanIuranModel extends CI_Model
{
	public function tambahDataPemasukan($data)
	{
		$this->db->insert('data_pemasukan_iuran', $data);
	}

	public function tampilDataPemasukan()
	{
		return $this->db->get('data_pemasukan_iuran');
	}

	public function editDataPemasukan($data, $id)
	{
		$this->db->like('id_pemasukan', $id);
		$this->db->update('data_pemasukan_iuran', $data);
	}

	public function hapusDataPemasukan($id)
	{
		$this->db->like('id_pemasukan', $id);
		$this->db->delete('data_pemasukan_iuran');
	}

	public function get_Pemasukan_byID($id)
	{
		$this->db->where('id_pemasukan', $id);
		return $this->db->get('data_pemasukan_iuran');
	}
}
