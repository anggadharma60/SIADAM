<?php
// Penduduk.php
class Penduduk extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
 
	public function graph()
	{
		$data = $this->db->query("SELECT * from datapenduduk");
		return $data->result();
	}
 
}