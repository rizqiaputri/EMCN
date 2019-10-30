<?php
class ProdukModel extends CI_Model
{
    public function createKode()
    {
        $this->db->select('RIGHT(produk.kd_produk,5) as kode', FALSE);
        $this->db->order_by('kd_produk','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('produk'); //<-----cek dulu apakah ada sudah ada kode di tabel.    
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

    public function simpanData($nama, $ukuran)
    {
        $id = $this->createKode();
        $data = array(
            'kd_produk'=>$id,
            'nama_produk'=>$nama,
            'ukuran'=>$ukuran
        );
        $this->db->insert('produk', $data);
    }

    public function getData()
    {
        $this->db->order_by('kd_produk', 'asc');
        return $this->db->get('produk')->result_array();
    }

    public function getDataEdit($id)
    {
        $this->db->where('kd_produk', $id);
        return $this->db->get('produk')->row_array();
    }

    public function updateData($id, $nama, $ukuran)
    {
        $data = array(
            'nama_produk'=>$nama,
            'ukuran'=>$ukuran
        );
        $this->db->where('kd_produk', $id);
        $this->db->update('produk', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('kd_produk', $id);
        $this->db->delete('produk');
    }
}
?>