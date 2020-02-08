<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Witel_model
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

class Witel_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function getDataWitel($id = null){
    $this->db->select('witel.idWitel, witel.namaWitel, witel.keterangan, witel.idRegional, regional.namaRegional');
    $this->db->from('witel');
    $this->db->join('regional', 'witel.idRegional = regional.idRegional');
        if($id != null) {
            $this->db->where('idWitel', $id);
        }
        $query = $this->db->get();
        return $query;
  }

  public function getDataWitelSelect($id){

    $this->db->from('witel');
    $this->db->where('idWitel!=', $id);
    $query = $this->db->get();
    return $query;
  }

  public function addDataWitel($post)
  {
    $params['namaWitel'] = html_escape($post['namaWitel']);
    $params['keterangan'] = html_escape($post['keterangan']);
    $params['idRegional'] = html_escape($post['regional']);
    $this->db->insert('witel', $params);
  }

    public function editDataWitel($post)
    {
        $params['namaWitel'] = html_escape($post['namaWitel']);
        $params['keterangan'] = html_escape($post['keterangan']);
        $params['idRegional'] = html_escape($post['regional']);
        $this->db->where('idWitel', $post['idWitel']);
        $this->db->update('witel', $params);
    }

    public function deleteDataWitel($id)
	{
		$this->db->where('idWitel', $id);
		$this->db->delete('witel');
	}

  // ------------------------------------------------------------------------

}

/* End of file Witel_model.php */
/* Location: ./application/models/Witel_model.php */