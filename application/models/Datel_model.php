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

    public function deleteDataDatel($id)
	{
		$this->db->where('idDatel', $id);
		$this->db->delete('datel');
	}

  // ------------------------------------------------------------------------

}

/* End of file Datel_model.php */
/* Location: ./application/models/Datel_model.php */