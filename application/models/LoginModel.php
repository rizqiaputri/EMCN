<?php
    class LoginModel extends CI_Model
    {
        public function cekLogin($user,$pass)
        {
            $this->db->where('username',$user);
            $this->db->where('password',$pass);
            $cek = $this->db->get('admin');
            $get = $cek->row_array();

            if($cek->num_rows() > 0)
            {
                $sess['log_in']   = "Login";
                $sess['username'] = $get['username'];
                $sess['posisi']   = $get['posisi'];

                $this->session->set_userdata($sess);
                header('location:'.base_url().'index.php/BerandaController');
            }
            else{
                //Jika Gagal Login
				$this->session->set_flashdata('info','<div class="alert alert-danger"><h5>Login Gagal!</h5>
                <p>Username atau Password Salah!</p></div>');

                redirect('LoginController');
            }
        }        
    }
?>