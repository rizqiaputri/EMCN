<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BomController extends CI_Controller {

	public function FTambahBom()
	{
        $index['nav']  = 'BOM';
        $index['data'] = $this->ProdukModel->getData();
        $index['bahan'] = $this->BahanModel->getData();
        $index['sub']  = 'Data BOM';
        $index['content'] = 'bom/tambah_view';   
		    $this->load->view('Template', $index);
  }

  public function TambahBom()
  {
      $produk   = $this->input->post('kd_produk');
      $bahan  = $this->input->post('bahan');
      $jumlah = $this->input->post('jumlah');
      
      $bom    = array(
        'id'=>$bahan,
        'qty'=>$jumlah,
        'price'=>1,
        'name'=>"none",
        'kd_produk'=>$produk
      );

      $this->cart->insert($bom);
      redirect('BomController/FTambahBom');

  }

  public function hapus()
	{
		$data = array('rowid'=>$this->uri->segment(3),
					   'qty'=>0);
		$this->cart->update($data);
		redirect('BomController/FTambahBom');
  }
  
  public function SimpanBom()
  {
    if(!empty($this->cart->contents()))
    {
      $bom = $this->BomModel->SimpanBom();
      if($bom)
      {
        $this->cart->destroy();
        $this->session->set_flashdata('notif_text', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Sukses!</h4>
        Data BOM Berhasil Disimpan
        </div>');
        redirect('BomController/FTambahBom');
      }else{
        $this->session->set_flashdata('notif_text', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Sukses!</h4>
        Data BOM Gagal Disimpan
        </div>');
        redirect('BomController/FTambahBom');
      }
    }
  }

  public function FLihatBom()
	{
        $index['nav']  = 'BOM';
        $index['data'] = $this->ProdukModel->getData();
        $index['bom']  = NULL;
        $index['sub']  = 'Data BOM';
        $index['content'] = 'bom/bom_view';   
		    $this->load->view('Template', $index);
  }

  public function LihatBom()
  {
    $produk = $this->input->post('kd_produk');
    $index['nav']  = 'BOM';
    $index['data'] = $this->ProdukModel->getData();
    $index['bom'] = $this->BomModel->getData($produk);
    $index['sub']  = 'Data BOM';
    $index['content'] = 'bom/bom_view';   
    $this->load->view('Template', $index);

  }
}
