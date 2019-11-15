<?php
class ProduksiModel extends CI_Model
{
    public function getPesanan()
    {
        return $this->db->get('pesanan')->result_array();
    }

    public function getPakaian($pesanan)
    {
        $this->db->select('a.kd_produk,nama_produk,ukuran');
        $this->db->from('produk a');
        $this->db->join('detail_pesanan b', 'a.kd_produk=b.kd_produk');
        $this->db->where('b.kd_pesanan',$pesanan);
        return $this->db->get()->result_array();
    }

    public function getJumlah($pesanan,$pk)
    {
        $this->db->select('jumlah');
        $this->db->from('detail_pesanan');
        $this->db->where('kd_pesanan', $pesanan);
        $this->db->where('kd_produk', $pk);
        return $this->db->get()->row_array();
    }

    public function getBBB($pk)
    {
        $this->db->select('subtotal');
        $this->db->from('bom a');
        $this->db->join('bahan b', 'a.kd_bahan=b.kd_bahan');
        $this->db->join('detail_pembelian c', 'b.kd_bahan=c.kd_bahan');
        $this->db->where('a.kd_produk',$pk);
        $this->db->where('b.jenis', 'Utama');
        $this->db->order_by('no_transaksi', 'desc');
        return $this->db->get()->row_array();
    }

    public function createKode()
    {
        $this->db->select('RIGHT(produksi.no_transaksi,5) as kode', FALSE);
        $this->db->order_by('no_transaksi','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('produksi'); //<-----cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){       
        //jika kode ternyata sudah ada.      
        $data = $query->row();      
        $kode = intval($data->kode) + 1;     
        }
        else{       
        //jika kode belum ada      
        $kode = 1;     
        }
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodejadi = "PRD-".$kodemax;     
        return $kodejadi;  
    }

    public function konfProduksi()
    {
        $kode = $this->createKode();
        $pakaian = $this->session->userdata('pakaian');
        $pesanan = $this->session->userdata('pesanan');
        $total = $this->session->userdata('total');
        $bbb   = $this->session->userdata('bbb');
        $btkl  = $this->session->userdata('btkl');
        $bop   = $this->session->userdata('bopF');
        $harga = $total + ($total * 5/100);
        $this->db->trans_begin();

        $this->db->select('a.kd_bahan,(a.jumlah*b.jumlah) pakai');
        $this->db->from('bom a');
        $this->db->join('detail_pesanan b', 'a.kd_produk=b.kd_produk');
        $this->db->where('a.kd_produk',$pakaian);
        $this->db->where('b.kd_pesanan',$pesanan);
        $pemakaian = $this->db->get()->result_array();

        foreach($pemakaian as $pm){
            $this->db->set("stok","stok - ".$pm['pakai']."",false);
            $this->db->where('kd_bahan',$pm['kd_bahan']);
            $this->db->update('bahan');
        }

        $this->db->set("harga",$harga);
        $this->db->where('kd_produk',$kopi);
        $this->db->update('produk');

        $produksi = array('no_transaksi'=>$kode,
                          'kd_produk'=>$pakaian,
                          'kd_pesanan'=>$pesanan,
                          'tanggal'=>date('Y-m-d'),
                          'total'=>$total,
                          'bbb'=>$bbb,
                          'btkl'=>$btkl,
                          'bop'=>$bop
                        );  
        $this->db->insert('produksi',$produksi);

        $transaksi = array('no_transaksi'=>$kode,
                          'tanggal'=>date('Y-m-d'),
                          'total'=>$total
                        );
        $this->db->insert('transaksi',$transaksi);
        

        $jurnalD = array('no_transaksi'=>$kode,
                         'no_akun'=>'114',
                         'posisi_dr_cr'=>'D',
                         'tanggal'=>date('Y-m-d'),
                         'nominal'=>$total
                        );
        $this->db->insert('jurnal',$jurnalD);

        $jurnalKB = array('no_transaksi'=>$kode,
                         'no_akun'=>'603',
                         'posisi_dr_cr'=>'K',
                         'tanggal'=>date('Y-m-d'),
                         'nominal'=>$bbb
                        );
        $this->db->insert('jurnal',$jurnalKB);

        $jurnalKT = array('no_transaksi'=>$kode,
                         'no_akun'=>'604',
                         'posisi_dr_cr'=>'K',
                         'tanggal'=>date('Y-m-d'),
                         'nominal'=>$btkl
                        );
        $this->db->insert('jurnal',$jurnalKT);

        $jurnalKO = array('no_transaksi'=>$kode,
                         'no_akun'=>'605',
                         'posisi_dr_cr'=>'K',
                         'tanggal'=>date('Y-m-d'),
                         'nominal'=>$bop
                        );
        $this->db->insert('jurnal',$jurnalKO);
        if($this->db->trans_status() == FALSE)
        {
            $this->db->trans_rollback();
            return false;
        }
        else
        {
            $this->db->trans_commit();
            return true;
        }      
    }
}
?>