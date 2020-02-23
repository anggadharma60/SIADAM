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

  public function login()
  {
    $post=$this->input->post(null,TRUE);
    if(isset($post['btnlogin'])){
      $this->load->model('pegawai_model');
      $query = $this->pegawai_model->getLogin($post);
      if($query->num_rows() > 0){
        $row = $query->row();
        $params = array(
          'idPegawai' => $row->idPegawai,
          'status' => $row->status
        );
        //set session userdata
        $this->session->set_userdata($params); 

        if ($params['status'] == 'Admin') {
          redirect(site_url('Admin'));
        } else if ($params['status'] == 'Daman') {
          redirect(site_url('Daman'));
        } else if ($params['status'] == 'HD Daman') {
          redirect(site_url('HDDaman'));
        } else if ($params['status'] == 'Dava') {
          redirect(site_url('Dava'));
        } else if ($params['status'] == 'Ondesk') {
          redirect(site_url('Ondesk'));
        } else if ($params['status'] == 'Onsite') {
          redirect(site_url('Onsite'));
        } else if ($params['status'] == 'SDI') {
          redirect(site_url('SDI'));
        }
        // echo "<script>
  			// 	alert('Selamat, Login Berhasil');
  			// 	window.location='".site_url('Admin')."';
        // </script>";
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

  public function logout()
  {
    $params = array('idPegawai', 'status');
    $this->session->unset_userdata($params);
    redirect('Autentikasi');
  }
}


/* End of file Autentikasi.php */
/* Location: ./application/controllers/Autentikasi.php */
