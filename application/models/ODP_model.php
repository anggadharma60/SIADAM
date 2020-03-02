<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model ODP_model
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

class ODP_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function getDataODP($id = null)
  {
    $this->db->select('rekap_data_odp.*, sto.kodeSTO,  sto.namaSTO, sto.idDatel, datel.namaDatel, datel.idWitel, witel.namaWitel, witel.idRegional, regional.namaRegional');
    $this->db->from('rekap_data_odp');
    $this->db->join('sto', 'rekap_data_odp.idSTO = sto.idSTO');
    $this->db->join('datel', 'sto.idDatel=datel.idDatel', 'left');
    $this->db->join('witel', 'datel.idWitel=witel.idWitel');
    $this->db->join('regional', 'witel.idRegional = regional.idRegional');
    $this->db->order_by('idODP ASC');
    if ($id != null) {
      $this->db->where('idODP', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  

public function filter($search, $limit, $start, $order_field, $order_ascdesc){
  $this->db->like('idODP', $search); // Untuk menambahkan query where LIKE
  $this->db->or_like('idNOSS', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('indexODP', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('namaODP', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('ftp', $search); // Untuk menambahkan query where LIKE
  $this->db->or_like('latitude', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('longitude', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('clusterName', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('clusterStatus', $search); // Untuk menambahkan query where LIKE
  $this->db->or_like('avai', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('used', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('rsv', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('rsk', $search); // Untuk menambahkan query where LIKE
  $this->db->or_like('namaRegional', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('namaWitel', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('namaDatel', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('namaSTO', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('infoODP', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('updateDate', $search); // Untuk menambahkan query where OR LIKE
  $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
  $this->db->select('*');
  $this->db->from('rekap_data_odp');
  $this->db->join('sto', 'rekap_data_odp.idSTO = sto.idSTO');
  $this->db->join('datel', 'sto.idDatel=datel.idDatel', 'left');
  $this->db->join('witel', 'witel.idWitel=datel.idWitel');
  $this->db->join('regional', 'regional.idRegional = witel.idRegional ');
  $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

  return $this->db->get()->result_array(); // Eksekusi query sql sesuai kondisi diatas
}

public function count_all(){
  $this->db->from('rekap_data_odp');
  $this->db->join('sto', 'rekap_data_odp.idSTO = sto.idSTO');
  $this->db->join('datel', 'sto.idDatel=datel.idDatel', 'left');
  $this->db->join('witel', 'witel.idWitel=datel.idWitel');
  $this->db->join('regional', 'regional.idRegional = witel.idRegional ');
  return $this->db->count_all('rekap_data_odp'); // Untuk menghitung semua data siswa
}

public function count_filter($search){
  $this->db->like('idODP', $search); // Untuk menambahkan query where LIKE
  $this->db->or_like('idNOSS', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('indexODP', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('namaODP', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('ftp', $search); // Untuk menambahkan query where LIKE
  $this->db->or_like('latitude', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('longitude', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('clusterName', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('clusterStatus', $search); // Untuk menambahkan query where LIKE
  $this->db->or_like('avai', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('used', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('rsv', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('rsk', $search); // Untuk menambahkan query where LIKE
  $this->db->or_like('namaRegional', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('namaWitel', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('namaDatel', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('namaSTO', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('infoODP', $search); // Untuk menambahkan query where OR LIKE
  $this->db->or_like('updateDate', $search); // Untuk menambahkan query where OR LIKE
  $this->db->select('*');
  $this->db->from('rekap_data_odp');
  $this->db->join('sto', 'rekap_data_odp.idSTO = sto.idSTO');
  $this->db->join('datel', 'sto.idDatel=datel.idDatel', 'left');
  $this->db->join('witel', 'witel.idWitel=datel.idWitel');
  $this->db->join('regional', 'regional.idRegional = witel.idRegional ');
  return $this->db->get()->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
}
  public function addDataODP($post)
  {
    $params['idNOSS'] = html_escape($post['idNOSS']);
    $params['indexODP'] = html_escape($post['indexODP']);
    $params['namaODP'] = html_escape($post['namaODP']);
    $params['ftp'] = html_escape($post['ftp']);
    $params['latitude'] = html_escape($post['latitude']);
    $params['longitude'] = html_escape($post['longitude']);
    $params['clusterName'] = html_escape($post['clusterName']);
    $params['clusterStatus'] = html_escape($post['clusterStatus']);
    $params['avai'] = html_escape($post['avai']);
    $params['used'] = html_escape($post['used']);
    $params['rsv'] = html_escape($post['rsv']);
    $params['rsk'] = html_escape($post['rsk']);
    $total = $params['avai'] + $params['used'] + $params['rsv'] + $params['rsk'];
    $params['total'] = html_escape($total);
    $params['idSTO'] = html_escape($post['STO']);
    $params['infoODP'] = html_escape($post['infoODP']);
    $format = "%Y-%m-%d %h:%i %A";
    $datetime = mdate($format);
    $params['updateDate'] = html_escape($datetime);
    $this->db->insert('rekap_data_odp', $params);
  }

  public function editDataODP($post)
  {
    // $params['idNOSS'] = html_escape($post['idNOSS']);
    // $params['indexODP'] = html_escape($post['indexODP']);
    // $params['namaODP'] = html_escape($post['namaODP']);
    $params['ftp'] = html_escape($post['ftp']);
    $params['latitude'] = html_escape($post['latitude']);
    $params['longitude'] = html_escape($post['longitude']);
    $params['clusterName'] = html_escape($post['clusterName']);
    $params['clusterStatus'] = html_escape($post['clusterStatus']);
    $params['avai'] = html_escape($post['avai']);
    $params['used'] = html_escape($post['used']);
    $params['rsv'] = html_escape($post['rsv']);
    $params['rsk'] = html_escape($post['rsk']);
    $params['avai'] = html_escape($post['avai']);
    $params['used'] = html_escape($post['used']);
    $params['rsv'] = html_escape($post['rsv']);
    $params['rsk'] = html_escape($post['rsk']);
    $total = $params['avai'] + $params['used'] + $params['rsv'] + $params['rsk'];
    $params['total'] = html_escape($total);
    // $params['idSTO'] = html_escape($post['idSTO']);
    $params['infoODP'] = html_escape($post['infoODP']);
    $format = "%Y-%m-%d %h:%i %A";
    $datetime = mdate($format);
    $params['updateDate'] = html_escape($datetime);
    $this->db->where('idODP', $post['idODP']);
    $this->db->update('rekap_data_odp', $params);
  }

  public function deleteDataODP($id)
  {
    $this->db->where('idODP', $id);
    $this->db->delete('rekap_data_odp');
  }

  public function deleteAllDataODP()
  {
    $this->db->empty_table('rekap_data_odp');
  }

  

  //Import Excel via phpSpreadsheet
  private $varBatchImportODP;
  public function setBatchImportODP($batchImportODP)
  {
    $this->varBatchImportODP = $batchImportODP;
  }

  //import data to database
  public function importDataODP()
  {
    $data = $this->varBatchImportODP;
    $this->db->insert_batch('rekap_data_odp', $data);
  }

  public function jumlahRekapODP(){
    $this->db->select('s.idSTO, s.kodeSTO, s.namaSTO, COUNT(r.idSTO) as grand_total');
    $this->db->from('rekap_data_odp as r');
    $this->db->join('sto as s', 's.idSTO = r.idSTO');
    $this->db->group_by('s.idSTO');
    $this->db->order_by('s.idSTO');
    $query = $this->db->get();
    return $query;
  }

  public function getNamaODP($searchTerm=""){
    $this->db->select('namaODP');
    $this->db->distinct('namaODP');
    $this->db->from('rekap_data_odp');
    if ($searchTerm != null) {
      
      $this->db->where("namaODP like '%".$searchTerm."%' ");
    }
    $this->db->limit(100,0); 
    $query = $this->db->get();
    return $query;
  }





  // 
  /* End of file ODP_model.php */
  /* Location: ./application/models/ODP_model.php */
}
