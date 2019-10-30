<?php
class AkunModel extends CI_Model
{
    public function simpanData($nomor, $nama, $header)
    {
        $data = array(
            'no_akun'=>$nomor,
            'nama_akun'=>$nama,
            'header_akun'=>$header
        );
        $this->db->insert('akun', $data);
    }

    public function getData()
    {
        $this->db->order_by('no_akun', 'asc');
        return $this->db->get('akun')->result_array();
    }

    public function getDataEdit($nomor)
    {
        $this->db->where('no_akun', $nomor);
        return $this->db->get('akun')->row_array();
    }

    public function updateData($nomor, $nama)
    {
        $data = array(
            'nama_akun'=>$nama
        );
        $this->db->where('no_akun', $nomor);
        $this->db->update('akun', $data);
    }

    public function hapusData($nomor)
    {
        $this->db->where('no_akun', $nomor);
        $this->db->delete('akun');
    }
}
?>