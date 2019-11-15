<?php
class PembelianModel extends CI_Model
{
    public function getDetail($kd)
    {
        $this->db->select('a.kd_bahan,nama_bahan,jumlah,harga,subtotal');
        $this->db->from('bahan a');
        $this->db->join('detail_pembelian b', 'a.kd_bahan=b.kd_bahan');
        $this->db->where('b.no_transaksi',$kd);
        return $this->db->get()->result_array();
    }

    public function getData()
    {
        $this->db->order_by('no_transaksi', 'asc');
        return $this->db->get('pembelian')->result_array();
    }

    public function createKode()
    {
        $this->db->select('RIGHT(pembelian.no_transaksi,5) as kode', FALSE);
        $this->db->order_by('no_transaksi','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('pembelian'); //<-----cek dulu apakah ada sudah ada kode di tabel.    
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
        $kodejadi = "PBL-".$kodemax;     
        return $kodejadi;  
    }

    public function simpanPembelian()
    {
        $kode = $this->createKode();
        $this->db->trans_begin();
        $total = $this->cart->total();
        $pembelian = array('no_transaksi'=>$kode,'tanggal'=>date('Y-m-d'),'total'=>$total);
        $transaksi = array('no_transaksi'=>$kode,'tanggal'=>date('Y-m-d'),'total'=>$total);
        $this->db->insert('pembelian',$pembelian);
        $this->db->insert('transaksi',$transaksi);
        $totalU = 0;
        $totalP = 0;
        foreach($this->cart->contents() as $bl)
        {
            $insertPembelian = array('no_transaksi'=>$kode,
            'kd_bahan'=>$bl['id'],
            'jumlah'=>$bl['qty'],
            'harga'=>$bl['price'],
            'subtotal'=>$bl['subtotal']);
            $this->db->insert('detail_pembelian',$insertPembelian);

            $this->db->set("stok","stok + ".$bl['qty']."",false);
            $this->db->where('kd_bahan',$bl['id']);
            $this->db->update('bahan');

            $this->db->select('jenis');
            $this->db->from('bahan');
            $this->db->where('kd_bahan', $bl['id']);
            $jenis = $this->db->get()->row_array();

            if($jenis['jenis'] == 'Utama'){
                $totalU = $totalU + $bl['subtotal'];
            } else if($jenis['jenis'] == 'Penolong'){
                $totalP = $totalP + $bl['subtotal'];
            }
        }

        $insertJurnalDU = array('no_transaksi'=>$kode,
        'no_akun'=>'112',
        'posisi_dr_cr'=>'D',
        'tanggal'=>date('Y-m-d'),
        'nominal'=>$totalU
        );
        $this->db->insert('jurnal',$insertJurnalDU);

        $insertJurnalKU = array('no_transaksi'=>$kode,
        'no_akun'=>'111',
        'posisi_dr_cr'=>'K',
        'tanggal'=>date('Y-m-d'),
        'nominal'=>$totalU
        );
        $this->db->insert('jurnal',$insertJurnalKU);

        $insertJurnalDP = array('no_transaksi'=>$kode,
        'no_akun'=>'115',
        'posisi_dr_cr'=>'D',
        'tanggal'=>date('Y-m-d'),
        'nominal'=>$totalP);
        $this->db->insert('jurnal',$insertJurnalDP);

        $insertJurnalKP = array('no_transaksi'=>$kode,
        'no_akun'=>'111',
        'posisi_dr_cr'=>'K',
        'tanggal'=>date('Y-m-d'),
        'nominal'=>$totalP);
        $this->db->insert('jurnal',$insertJurnalKP);
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

    public function getJumlah($id_pakaian,$bahan)
    {
        $this->db->select('jumlah');
        $this->db->from('bom');
        $this->db->where('kd_bahan',$bahan);
        $this->db->where('kd_produk',$id_pakaian);
        return $this->db->get()->row_array();
    }

    public function getJumlahPes($id_pakaian,$id_pesanan)
    {
        $this->db->select('jumlah');
        $this->db->from('detail_pesanan');
        $this->db->where('kd_pesanan',$id_pesanan);
        $this->db->where('kd_produk',$id_pakaian);
        return $this->db->get()->row_array();
    }

    public function getPakaian($id)
    {
        $this->db->select('a.kd_produk,nama_produk,ukuran');
        $this->db->from('produk a');
        $this->db->join('detail_pesanan b', 'a.kd_produk=b.kd_produk');
        $this->db->where('b.kd_pesanan', $id);
        return $this->db->get()->result_array();
    }

    public function getBahan($id)
    {
        $this->db->select('a.kd_bahan,nama_bahan');
        $this->db->from('bahan a');
        $this->db->join('bom b', 'a.kd_bahan=b.kd_bahan');
        $this->db->where('b.kd_produk',$id);
        return $this->db->get()->result_array();
    }
}
?>