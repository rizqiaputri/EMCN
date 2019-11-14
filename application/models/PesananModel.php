<?php
class PesananModel extends CI_Model
{
    public function getDetail($kd)
    {
        $this->db->select('a.kd_produk,nama_produk,ukuran,jumlah,subtotal');
        $this->db->from('produk a');
        $this->db->join('detail_pesanan b', 'a.kd_produk=b.kd_produk');
        $this->db->where('b.kd_pesanan', $kd);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getData()
    {
        $this->db->order_by('kd_pesanan', 'asc');
        return $this->db->get('pesanan')->result_array();
    }

    public function createKode()
    {
        $this->db->select('RIGHT(pesanan.kd_pesanan,5) as kode', FALSE);
        $this->db->order_by('kd_pesanan','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('pesanan'); //<-----cek dulu apakah ada sudah ada kode di tabel.    
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
        $kodejadi = "PSN-".$kodemax;     
        return $kodejadi;  
    }

    public function simpanPesanan($nama,$selesai)
    {
        $kode = $this->createKode();

        $this->db->trans_begin();
        $total = $this->cart->total();
        $pesanan = array('kd_pesanan'=>$kode,
                        'nama_pemesan'=>$nama,
                        'tanggal_pesan'=>date('Y-m-d'),
                        'tanggal_selesai'=>$selesai,
                        'total'=>$total
                        );
        $this->db->insert('pesanan',$pesanan);

        foreach($this->cart->contents() as $ps)
        {
            $detail = array('kd_produk'=>$ps['id'],
                            'kd_pesanan'=>$kode,
                            'subtotal'=>$ps['subtotal'],
                            'jumlah'=>$ps['qty']
                            );
            $this->db->insert('detail_pesanan',$detail);
        }
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