<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model SpecOLT_model
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

class SpecOLT_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function getDataSpecOLT($id = null){
    $this->db->from('specification_olt');
        if($id != null) {
            $this->db->where('idSpecOLT', $id);
        }
        $query = $this->db->get();
        return $query;
  }

  public function getDataSpecOLTSelect($id){

    $this->db->from('specification_olt');
    $this->db->where('idSpecOLT!=', $id);
    $query = $this->db->get();
    return $query;
  }

  public function getIDSpecOLTByName($namaSpecOLT){
    $this->db->select('idSpecOLT');
    $this->db->from('specification_olt');
    $this->db->where('namaSpecOLT=', $namaSpecOLT);
    $query = $this->db->get();
    return $query->row();
  }

  public function addDataSpecOLT($post)
    {
        $params['namaSpecOLT'] = html_escape($post['namaSpecOLT']);
        $params['merekOLT'] = html_escape($post['merekOLT']);
        $params['typeOLT'] = html_escape($post['typeOLT']);
        $params['keterangan'] = html_escape($post['keterangan']);
        $this->db->insert('specification_olt', $params);
    }

    public function editDataSpecOLT($post)
    {
        $params['namaSpecOLT'] = html_escape($post['namaSpecOLT']);
        $params['merekOLT'] = html_escape($post['merekOLT']);
        $params['typeOLT'] = html_escape($post['typeOLT']);
        $params['keterangan'] = html_escape($post['keterangan']);
        $this->db->where('idSpecOLT', $post['idSpecOLT']);
        $this->db->update('specification_olt', $params);
    }
    public function foreignKey($id)
    {
      $query = $this->db->get_where('rekap_data_olt', array('idSpecOLT' => $id));
      return $query->result();
    }

    public function deleteDataSpecOLT($id)
	{
    $temp = $this->SpecOLT_model->foreignKey($id);
    if($temp != null){
      $this->session->set_flashdata('danger', 'Data gagal dihapus karena terkait dengan data lain');
    }else{
      $this->db->where('idSpecOLT', $id);
		  $this->db->delete('specification_olt');
      $this->session->set_flashdata('danger', 'Data berhasil dihapus');
    } 
		
	}

  // ------------------------------------------------------------------------

}

/* End of file SpecOLT_model.php */
/* Location: ./application/models/SpecOLT_model.php */