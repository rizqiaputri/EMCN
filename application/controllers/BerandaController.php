<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BerandaController extends CI_Controller
{
    public function index()
	{
        $index['nav']  = 'Beranda';
        $index['sub']  = 'Beranda';
        $index['content'] = 'beranda_view';   
		$this->load->view('Template', $index);
	}
}
?>