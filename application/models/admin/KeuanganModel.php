
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KeuanganModel extends CI_Model
{

	public function getKeuangan()
	{
		$this->db->select('bulan, tahun,jumlah_warga, jumlah_sudah_bayar, 
 						jumlah_belum_bayar,saldo,cek_pengeluaran(bulan,tahun) as pengeluaran,cek_pemasukan(bulan,tahun) as pemasukan,total_saldo');
		$this->db->from('data_keuangan_iuran');
		$this->db->where_not_in('tahun', '0000');
		return $this->db->get();
	}

	public function getTotalSaldo()
	{
		$this->db->select('total_saldo');
		$this->db->from('data_keuangan_iuran');
		$this->db->where('tahun', '0000');
		return $this->db->get();
	}

	public function get_rekap_info($bulan, $tahun)
	{
		$this->db->where('bulan_iuran', $bulan);
		$this->db->where('tahun_iuran', $tahun);
		return $this->db->get('data_iuran_warga');
	}

	public function updateSaldo($data)
	{
		$this->db->update('data_keuangan_iuran', $data);
	}
}
