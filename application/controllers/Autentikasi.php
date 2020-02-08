<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Autentikasi
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Autentikasi extends CI_Controller
{

  public function index()
  {
    check_already_login();
    $this->load->view('login_v');
  }

  public function login(){
    $post=$this->input->post(null,TRUE);
    if(isset($post['btnlogin'])){
      $this->load->model('Pegawai_model');
      $query = $this->Pegawai_model->getLogin($post);
      if($query->num_rows() > 0){
        $row = $query->row();
        $param = array(
          'idPegawai' => $row->idPegawai,
          'status' => $row->status
        );
        $this->session->set_userdata($param);
        echo 
        "<script>
          alert('Selamat, Login Berhasil');
        </script>";
        redirect(base_url() . 'Admin');
      }else{
        die(
          "<script>
					alert('Login Gagal, username / password salah');
					window.location='".site_url('Autentikasi')."';
        </script>"
        ) ;
        
      }
    }else{
      echo "Kosong";
    }
  }

  public function logout(){
    $params = array('idPegawai', 'status');
    $this->session->unset_userdata($params);
    redirect('Autentikasi');
  }

}


/* End of file Autentikasi.php */
/* Location: ./application/controllers/Autentikasi.php */