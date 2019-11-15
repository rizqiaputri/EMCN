<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembelianController extends CI_Controller {

    public function getDetail()
    {
        $kd = $this->uri->segment(3);
		$index['data'] = $this->PembelianModel->getDetail($kd);
		$index['nav']  = 'Pembelian';
        $index['sub']  = 'Detail Pembelian';
        $index['content'] = 'pembelian/detail_view';   
		$this->load->view('Template', $index);
    }

    public function lihatData()
    {
        $index['pembelian'] = $this->PembelianModel->getData();
        $index['nav']  = 'Pembelian';
        $index['sub']  = 'Data Pembelian';
        $index['content'] = 'pembelian/lihat_view';   
		$this->load->view('Template', $index);
    }

    public function simpanPembelian()
    {
        if(!empty($this->cart->contents()))
        {
          $beli = $this->PembelianModel->simpanPembelian();
          if($beli)
          {
            $this->cart->destroy();
            $this->session->set_flashdata('beli_text', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Pembelian Berhasil Disimpan
            </div>');
            redirect('PembelianController/pilihBahan');
          }else{
            $this->session->set_flashdata('beli_text', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-window-close"></i> Gagal!</h4>
            Data Pembelian Gagal Disimpan
            </div>');
            redirect('PembelianController/pilihBahan');
          }
        }
    }

    public function tambahPembelian()
    {
        $id_pesanan = $this->session->userdata('pesanan');
        $id_pakaian = $this->session->userdata('pakaian');
        $bahan  = $this->input->post('bahan');
        $harga  = $this->input->post('harga');
        $jumlah = $this->PembelianModel->getJumlah($id_pakaian,$bahan);
        $jumlah_pesan = $this->PembelianModel->getJumlahPes($id_pakaian,$id_pesanan);

        $data = array('id'=>$bahan,
                      'name'=>"none",
                      'qty'=>$jumlah['jumlah']*$jumlah_pesan['jumlah'],
                      'price'=>$harga
                    );
        $this->cart->insert($data);
        redirect('PembelianController/pilihBahan');
    }

    public function hapus()
	{
		$data = array('rowid'=>$this->uri->segment(3),
					   'qty'=>0);
		$this->cart->update($data);
		redirect('PembelianController/pilihBahan');
  }

	public function index()
	{
		$index['pesanan'] = $this->PesananModel->getData();
        $index['nav']  = 'Pembelian';
        $index['sub']  = 'Tambah Pembelian';
        $index['content'] = 'pembelian/Fpilih_view';   
		$this->load->view('Template', $index);
    }

    public function pilihPesanan()
    {
        $pesanan = $this->input->get('pesanan');
        $this->session->set_userdata('pesanan',$pesanan);
        $id = $this->session->userdata('pesanan');
        $index['pakaian'] = $this->PembelianModel->getPakaian($id);
        $index['nav']  = 'Pembelian';
        $index['sub']  = 'Tambah Pembelian';
        $index['content'] = 'pembelian/tambah_view';   
		$this->load->view('Template', $index);
    }

    public function pilihBahan()
    {
        $id_pesanan = $this->session->userdata('pesanan');
        $pakaian = $this->input->get('pakaian');
        $this->session->set_userdata('pakaian',$pakaian);
        $id_pakaian = $this->session->userdata('pakaian');
        $index['pakaian'] = $this->PembelianModel->getPakaian($id_pesanan);
        $index['bahan'] = $this->PembelianModel->getBahan($id_pakaian);
        $index['nav']  = 'Pembelian';
        $index['sub']  = 'Tambah Pembelian';
        $index['content'] = 'pembelian/tambah_view';   
		$this->load->view('Template', $index);
    }
    
}
