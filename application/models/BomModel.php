<?php
class BomModel extends CI_Model
{
    public function SimpanBom()
    {
        foreach($this->cart->contents() as $bom)
        {
            $insertBom = array('kd_produk'=>$bom['kd_produk'],'kd_bahan'=>$bom['id'],'jumlah'=>$bom['qty']);
            $cek = $this->db->insert('bom',$insertBom);
        }
        if($cek)
        {
            return true;
        }else{
            return false;
        }
    }

    public function getData($produk)
    {
        $this->db->select('a.nama_bahan,b.jumlah,a.satuan');
        $this->db->from('bahan a');
        $this->db->join('bom b','a.kd_bahan=b.kd_bahan');
        $this->db->where('b.kd_produk', $produk);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>