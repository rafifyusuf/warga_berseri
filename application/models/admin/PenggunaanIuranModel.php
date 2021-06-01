<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenggunaanIuranModel extends CI_Model
{
	public function tambahDataPenggunaan($data)
	{
		$this->db->insert('data_penggunaan_iuran', $data);
	}

	public function tampilDataPenggunaan()
	{
		return $this->db->get('data_penggunaan_iuran');
	}

	public function editDataPenggunaan($data, $id)
	{
		$this->db->like('id_penggunaan', $id);
		$this->db->update('data_penggunaan_iuran', $data);
	}

	public function hapusDataPenggunaan($id)
	{
		$this->db->like('id_penggunaan', $id);
		$this->db->delete('data_penggunaan_iuran');
	}

	public function get_penggunaan_byID($id)
	{
		$this->db->where('id_penggunaan', $id);
		return $this->db->get('data_penggunaan_iuran');
	}
}