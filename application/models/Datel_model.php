<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Datel_model
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

class Datel_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function getDataDatel($id = null){
    $this->db->select('datel.idDatel, datel.namaDatel, datel.keterangan, datel.keterangan, datel.idWitel, witel.namaWitel');
    $this->db->from('datel');
    $this->db->join('witel', 'datel.idWitel=witel.idWitel');
        if($id != null) {
            $this->db->where('idDatel', $id);
        }
        $query = $this->db->get();
        return $query;
  }
  
  public function getDataDatelSelect($id){

    $this->db->from('datel');
    $this->db->where('idDatel!=', $id);
    $query = $this->db->get();
    return $query;
  }

  public function addDataDatel($post)
    {
        $params['namaDatel'] = html_escape($post['namaDatel']);
        $params['keterangan'] = html_escape($post['keterangan']);
        $params['idWitel']= html_escape($post['witel']);
        $this->db->insert('datel', $params);
    }

    public function editDataDatel($post)
    {
        $params['namaDatel'] = html_escape($post['namaDatel']);
        $params['keterangan'] = html_escape($post['keterangan']);
        $params['idWitel']= html_escape($post['witel']);
        $this->db->where('idDatel', $post['idDatel']);
        $this->db->update('datel', $params);
    }

  public function foreignKey($id)
  {
    $query = $this->db->get_where('sto', array('idDatel' => $id));
    return $query->result();
  }

  public function deleteDataDatel($id)
	{
    $temp = $this->Datel_model->foreignKey($id);
    if($temp != null){
      $this->session->set_flashdata('danger', 'Data gagal dihapus karena terkait dengan data lain');
    }else{
      $this->db->where('idDatel', $id);
		  $this->db->delete('datel');
      $this->session->set_flashdata('danger', 'Data berhasil dihapus');
    } 
		
	}

  // ------------------------------------------------------------------------

}

/* End of file Datel_model.php */
/* Location: ./application/models/Datel_model.php */