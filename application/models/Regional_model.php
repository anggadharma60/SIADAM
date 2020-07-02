<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Regional_model
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

class Regional_model extends CI_Model {

  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------
  public function getDataRegional($id = null){
    $this->db->from('regional');
        if($id != null) {
            $this->db->where('idRegional', $id);
        }
        $query = $this->db->get();
        return $query;
  }

  public function getDataRegionalSelect($id){

    $this->db->from('regional');
    $this->db->where('idRegional!=', $id);
    $query = $this->db->get();
    return $query;
  }
  
  public function addDataRegional($post)
    {
      $params['idRegional'] = html_escape(strtoupper($post['idRegional']));
      $params['namaRegional'] = html_escape($post['namaRegional']);
      $params['keterangan'] = html_escape($post['keterangan']);
      $this->db->insert('regional', $params);
    }

    public function editDataRegional($post)
    {
      $params['namaRegional'] = html_escape($post['namaRegional']);
      $params['keterangan'] = html_escape($post['keterangan']);
      $this->db->where('idRegional', $post['idRegional']);
      $this->db->update('regional', $params);
    }


    public function foreignKey($id)
    {
      $query = $this->db->get_where('witel', array('idRegional' => $id));
      return $query->result();

    }

    public function deleteDataRegional($id)
    { 
      $temp = $this->Regional_model->foreignKey($id);
      if($temp != null){
        $this->session->set_flashdata('danger', 'Data gagal dihapus karena terkait dengan data lain');
      }else{
        $this->db->where('idRegional', $id);
        $this->db->delete('regional');
        $this->session->set_flashdata('danger', 'Data berhasil dihapus');
      }      
    }
  // ------------------------------------------------------------------------

}

/* End of file Regional_model.php */
/* Location: ./application/models/Regional_model.php */