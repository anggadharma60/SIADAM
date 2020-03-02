<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Pegawai_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Pegawai_model extends CI_Model
{

  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getLogin($post)
  {
    $this->db->select('*');
    $this->db->from('pegawai');
    $this->db->where('username', $post['username']);
    $this->db->where('password', $post['password']);
    $query = $this->db->get();
    return $query;
  }

  public function getDataPegawaiStatus($status = null){
    $this->db->select('idPegawai, namaPegawai, status');
    $this->db->from('pegawai');
    if ($status != null) {
      $this->db->where('status', $status);
    }
    $query = $this->db->get();
    return $query;
  }
  
  public function getDataHDDaman($searchTerm=""){
    $this->db->select('idPegawai, namaPegawai, status');
    $this->db->from('pegawai');
    $this->db->where('status', 'HD Daman');
    if ($searchTerm != null) {
      
      $this->db->where("namaPegawai like '%".$searchTerm."%' ");
    }
    $query = $this->db->get();
    return $query;
  }

  public function getDataDava($searchTerm=""){
    $this->db->select('idPegawai, namaPegawai, status');
    $this->db->from('pegawai');
    $this->db->where('status', 'Dava');
    if ($searchTerm != null) {
      
      $this->db->where("namaPegawai like '%".$searchTerm."%' ");
    }
    $query = $this->db->get();
    return $query;
  }

  public function getDataPegawai($id = null)
  {
    $this->db->from('pegawai');
    if ($id != null) {
      $this->db->where('idPegawai', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function addDataPegawai($post)
  {
    $params['namaPegawai'] = html_escape($post['namaPegawai']);
    $params['username'] = html_escape($post['username']);
    $params['password'] = html_escape($post['password']);
    $params['status'] = html_escape($post['status']);
    $this->db->insert('pegawai', $params);
  }

  public function editDataPegawai($post)
  {
    $params['namaPegawai'] = html_escape($post['namaPegawai']);
    $params['username'] = html_escape($post['username']);
    if (!empty($post['password'])) {
      $params['password'] = html_escape($post['password']);
    }
    $params['status'] = html_escape($post['status']);
    $this->db->where('idPegawai', $post['idPegawai']);
    $this->db->update('pegawai', $params);
  }
  public function detailDataPegawai($id = null)
  {
    $query = $this->db->get_where('pegawai', array('idPegawai' => $id))->row();
    return $query;
  }

  public function deleteDataPegawai($id)
  {
    $this->db->where('idPegawai', $id);
    $this->db->delete('pegawai');
  }
  // ------------------------------------------------------------------------

}

/* End of file Pegawai_model.php */
/* Location: ./application/models/Pegawai_model.php */
