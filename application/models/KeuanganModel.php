<?php 
class KeuanganModel extends CI_Model
{
    public function getJurnal()
    {
        $this->db->select('a.no_akun,nama_akun,no_transaksi,posisi_dr_cr,tanggal,nominal');
        $this->db->from('jurnal a');
        $this->db->join('akun b', 'a.no_akun=b.no_akun');
        return $this->db->get()->result_array();
    }

    public function getJurnalPer($periode)
    {
        $this->db->select('a.no_akun,nama_akun,no_transaksi,posisi_dr_cr,tanggal,nominal');
        $this->db->from('jurnal a');
        $this->db->join('akun b', 'a.no_akun=b.no_akun');
        $this->db->like('tanggal', $periode, 'after');
        return $this->db->get()->result_array();
    }
}
?>