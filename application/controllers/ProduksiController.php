<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProduksiController extends CI_Controller {

    public function konfProduksi()
    {
        $produksi = $this->ProduksiModel->KonfProduksi();
        if($produksi)
        {
          $this->cart->destroy();
          $this->session->set_flashdata('notif_text', '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Sukses!</h4>
          Data Produksi Berhasil Disimpan
          </div>');
          redirect('ProduksiController/index');
        }else{
          $this->session->set_flashdata('notif_text', '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-window-close"></i> Gagal!</h4>
          Data Produksi Gagal Disimpan
          </div>');
          redirect('ProduksiController/index');
        }
    }

	public function index()
	{
		$index['pesanan'] = $this->ProduksiModel->getPesanan();
        $index['nav']  = 'Produksi';
        $index['sub']  = 'Konfirmasi Produksi';
        $index['content'] = 'produksi/konfirmasi_view';   
		$this->load->view('Template', $index);
    }

    public function pilihPakaian()
    {
        $pesanan = $this->input->get('pesanan');
        $this->session->set_userdata('pesanan',$pesanan);
        $index['pakaian'] = $this->ProduksiModel->getPakaian($pesanan);
        $index['nav']  = 'Produksi';
        $index['sub']  = 'Konfirmasi Produksi';
        $index['content'] = 'produksi/konfirmasi_view';   
		$this->load->view('Template', $index);
    }

    public function hitungProduksi()
    {
        $pesanan = $this->session->userdata('pesanan');
        $pakaian = $this->input->post('pakaian');
        $btkl = $this->input->post('btkl');
        $bop  = $this->input->post('bop');
        $jumlah = $this->input->post('jumlah');
        $pk = $this->session->userdata('pakaian');

        $this->session->set_userdata('pakaian',$pakaian);
        $this->session->set_userdata('btkl',$btkl);
        $this->session->set_userdata('bop',$bop);
        $this->session->set_userdata('jumlah',$jumlah);

        $index['jumlah'] = $this->ProduksiModel->getJumlah($pesanan,$pk);
        $index['bbb']  = $this->ProduksiModel->getBBB($pk);
        $index['btkl'] = $this->session->userdata('btkl');
        $index['nav']  = 'Produksi';
        $index['sub']  = 'Konfirmasi Produksi';
        $index['content'] = 'produksi/hitung_view';   
		$this->load->view('Template', $index);

    }
    
}
