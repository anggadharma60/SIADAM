<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model STO_model
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

class STO_model extends CI_Model {

  // ------------------------------------------------------------------------
  public function getDataSTO($id = null){
    $this->db->select('*');
    // $this->db->select('sto.idSTO, sto.kodeSTO, sto.namaSTO, sto.keterangan, sto.idDatel, datel.namaDatel');
    $this->db->from('sto');
    $this->db->join('datel', 'sto.idDatel=datel.idDatel');
    $this->db->order_by('sto.idSTO');
    if($id != null) {
      $this->db->where('idSTO', $id);
      }
    $query = $this->db->get();
    return $query;
  }

  public function getDataSTOByRegional($idRegional=''){
    $this->db->select('sto.idSTO, sto.namaSTO');
    $this->db->from('regional');
    $this->db->join('witel', 'regional.idRegional =witel.idRegional');
    $this->db->join('datel', 'witel.idWitel = datel.idWitel');
    $this->db->join('sto', 'datel.idDatel = sto.idDatel');
    $this->db->where('regional.idRegional', $idRegional);
    $this->db->order_by('sto.idSTO', 'ASC');
    $query = $this->db->get();
    return $query;

  }

  public function getIDSTOByKode($kode){
    $this->db->select('idSTO');
    $this->db->from('sto');
    $this->db->where('idSTO=', $kode);
    $query = $this->db->get();
    return $query->row();
  }

  public function getIDSTOByName($kode){
    $this->db->select('idSTO');
    $this->db->from('sto');
    $this->db->where('namaSTO=', $kode);
    $query = $this->db->get();
    return $query->row();
  }

  public function getDataSTOSelect($id){
    $this->db->from('sto');
    $this->db->where('idSTO!=', $id);
    $query = $this->db->get();
    return $query;
  }
  

  public function addDataSTO($post)
    {
        $params['idSTO'] = html_escape(strtoupper($post['idSTO']));
        $params['namaSTO'] = html_escape($post['namaSTO']);
        $params['keterangan'] = html_escape($post['keterangan']);
        $params['idDatel']= html_escape($post['datel']);
        $this->db->insert('sto', $params);
    }

    public function editDataSTO($post)
    {
      $this->db->select('idSTO');
      $this->db->from('sto');
      $this->db->where('idSTO', $post['idSTO']);
      $query = $this->db->get();
      if(($post['idSTO']) != $query ) {
        $params['idSTO'] = html_escape(strtoupper($post['idSTO']));
      }
      $params['namaSTO'] = html_escape($post['namaSTO']);
      $params['keterangan'] = html_escape($post['keterangan']);
      if(!empty($post['datel'])) {
        $params['idDatel'] = html_escape($post['datel']);
      }
        $this->db->where('idSTO', $post['idSTO']);
        $this->db->update('sto', $params);
    }
  
   public function foreignKey($id)
  {
    $query = $this->db->get_where('rekap_data_olt', array('idSTO' => $id));
    return $query->result();
  }

  public function deleteDataSTO($id)
	{
    $temp = $this->STO_model->foreignKey($id);
    if($temp != null){
      $this->session->set_flashdata('danger', 'Data gagal dihapus karena terkait dengan data lain');
    }else{
      $this->db->where('idSTO', $id);
		  $this->db->delete('sto');
      $this->session->set_flashdata('danger', 'Data berhasil dihapus');
    } 
		
	}

  
  // ------------------------------------------------------------------------

}

/* End of file STO_model.php */
/* Location: ./application/models/STO_model.php */