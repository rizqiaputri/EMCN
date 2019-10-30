<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'required',array('required'=> 'Username Tidak Boleh Kosong'));
 		$this->form_validation->set_rules('password', 'password', 'required',array('required'=> 'Password Tidak Boleh Kosong'));

         if($this->form_validation->run())
         {
            $user = $this->input->post('username');
            $pass = $this->input->post('password');

            $this->LoginModel->cekLogin($user,$pass);
         }
         else
         {
            $this->load->view('Login');
         }
    }
}
?>