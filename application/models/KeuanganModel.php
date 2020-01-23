<?php 
class KeuanganModel extends CI_Model
{
    public function getDataProduksi($pesanan, $produk)
    {
        $this->db->select('a.kd_pesanan, a.tanggal_pesan, e.tanggal, a.nama_pemesan, c.jumlah, d.harga, e.bbb, e.btkl, e.bop, e.total');
        $this->db->from('pesanan a');
        $this->db->join('detail_pesanan c', 'a.kd_pesanan=c.kd_pesanan');
        $this->db->join('produk d', 'c.kd_produk=d.kd_produk');
        $this->db->join('produksi e', 'a.kd_pesanan=e.kd_pesanan and c.kd_produk=e.kd_produk');
        $this->db->where('a.kd_pesanan', $pesanan);
        $this->db->where('d.kd_produk', $produk);
        return $this->db->get()->row_array();
    }

    public function getPesanan()
    {
        $this->db->select('a.kd_pesanan, b.kd_produk');
        $this->db->from('pesanan a');
        $this->db->join('produksi b', 'a.kd_pesanan=b.kd_pesanan');
        return $this->db->get()->result_array();
    }

    public function getBOP($tahun)
    {
        $this->db->select_sum('bop');
		$this->db->from('produksi');
		$this->db->where('YEAR(tanggal)', $tahun);
		$bop = $this->db->get()->row_array();
		
		return $bop;
    }

    public function getBTKL($tahun)
    {
        $this->db->select_sum('btkl');
		$this->db->from('produksi');
		$this->db->where('YEAR(tanggal)', $tahun);
		$btkl = $this->db->get()->row_array();
		
		return $btkl;
    }

    public function getPembelian($tahun)
    {
        $this->db->select_sum('subtotal');
		$this->db->from('bahan');
		$this->db->join('detail_pembelian', 'bahan.kd_bahan=detail_pembelian.kd_bahan');
		$this->db->join('pembelian', 'detail_pembelian.no_transaksi=pembelian.no_transaksi');
		$this->db->like('jenis', 'utama');
		$this->db->where('YEAR(pembelian.tanggal)', $tahun);
		$saldo_pembelian = $this->db->get()->row_array();
		
		return $saldo_pembelian;
    }

    public function getBukuBesar($akun, $bulan, $tahun)
	{
		$this->db->select('akun.no_akun, header_akun, tanggal, nama_akun, posisi_dr_cr, nominal');
		$this->db->from('jurnal');
		$this->db->join('akun', 'jurnal.no_akun=akun.no_akun');
		$this->db->where('akun.no_akun', $akun);
		$this->db->where('MONTH(tanggal)', $bulan);
		$this->db->where('YEAR(tanggal)', $tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

    public function getSaldo($akun, $bulan, $tahun)
	{
		$query = "SELECT DISTINCT ((SELECT SUM(nominal) FROM jurnal WHERE no_akun = '$akun' AND posisi_dr_cr = 'D' AND MONTH(tanggal) != '$bulan' AND MONTH(`tanggal`) < '$bulan' AND YEAR(`tanggal`) <= '$tahun') - (SELECT SUM(nominal) FROM jurnal WHERE no_akun = '$akun' AND posisi_dr_cr = 'K' AND MONTH(tanggal) != '$bulan' AND MONTH(`tanggal`) < '$bulan' AND YEAR(`tanggal`) <= '$tahun')) AS selisih";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}

    public function getAkun()
    {
        return $this->db->get('akun')->result_array();
    }

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