<?php
class BahanModel extends CI_Model
{
    public function createKode()
    {
        $this->db->select('RIGHT(bahan.kd_bahan,5) as kode', FALSE);
        $this->db->order_by('kd_bahan','DESC');    
        $this->db->limit(1);     
        $query = $this->db->get('bahan'); //<-----cek dulu apakah ada sudah ada kode di tabel.    
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
        $kodejadi = "BHN-".$kodemax;     
        return $kodejadi;  
    }

    public function simpanData($nama, $satuan, $jenis)
    {
        $id = $this->createKode();
        $data = array(
            'kd_bahan'=>$id,
            'nama_bahan'=>$nama,
            'stok'=>0,
            'satuan'=>$satuan,
            'jenis'=>$jenis
        );
        $this->db->insert('bahan', $data);
    }

    public function getData()
    {
        $this->db->order_by('kd_bahan', 'asc');
        return $this->db->get('bahan')->result_array();
    }

    public function getDataEdit($id)
    {
        $this->db->where('kd_bahan', $id);
        return $this->db->get('bahan')->row_array();
    }

    public function updateData($id, $nama, $satuan, $jenis)
    {
        $data = array(
            'nama_bahan'=>$nama,
            'stok'=>0,
            'satuan'=>$satuan,
            'jenis'=>$jenis
        );
        $this->db->where('kd_bahan', $id);
        $this->db->update('bahan', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('kd_bahan', $id);
        $this->db->delete('bahan');
    }
}
?>