<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load library phpspreadsheet
require 'excel/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
// End load library phpspreadsheet
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Ondesk
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

class Ondesk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		//check admin buat fungsi_helper
		check_ondesk();
		// check_daman();
		// check_hddaman();
		// check_ondesk();
		// check_onsite();
		// check_dava();

		$this->load->model('Datel_model');
		$this->load->model('ODP_model');
		$this->load->model('OLT_model');
		$this->load->model('Pegawai_model');
		$this->load->model('Regional_model');
		$this->load->model('SpecOLT_model');
		$this->load->model('STO_model');
		$this->load->model('Validasi_model');
		$this->load->model('Witel_model');
		$this->load->library('form_validation');
	}

	// Halaman Awal Ondesk
	public function index()
	{
		check_not_login();
		$this->template->load('template/template_Ondesk', 'dashboard_home');
	}

	public function editProfile()
	{

		$id = $this->session->userdata['idPegawai'];
		$this->form_validation->set_rules('namaPegawai', 'Nama', 'required|regex_match[/^[a-zA-Z ]+$/]|min_length[0]|max_length[30]|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|callback_username_check|min_length[5]|max_length[20]|trim');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'alpha_numeric|min_length[5]|max_length[16]|trim');
			$this->form_validation->set_rules(
				'passconf',
				'Konfirmasi Password',
				'matches[password]|alpha_numeric|min_length[5]|max_length[16]|trim',
				array('matches' => '%s tidak sesuai dengan password')
			);
		}
		if ($this->input->post('passconf')) {
			$this->form_validation->set_rules(
				'passconf',
				'Konfirmasi Password',
				'matches[password]|alpha_numeric|min_length[5]|max_length[16]|trim',
				array('matches' => '%s tidak sesuai dengan password')
			);
		}


		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('regex_match', '{field} berisi karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
		$this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
		$this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->pegawai_model->getDataPegawai($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template/template_Ondesk', 'template/edit_profile', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Ondesk/getPegawai');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Pegawai_model->editDataPegawai($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Ondesk/getPegawai');
		}
	}

	//Start Dashboard
	public function chart()
	{
		$data['ODP'] = $this->ODP_model->jumlahRekapODP();
		$ODP = $data['ODP'];
		$data['idSTO'][] = null;
		$data['kodeSTO'] = null;
		$data['namaSTO'] = null;
		$data['grand_total'] = null;
		$data['totalODP'] = null;
		$data['total'] = null;
		$data['totalValidasi'] = null;

		if ($ODP != null) {
			foreach ($ODP->result() as $rekapODP) {

				$data['idSTO'][] = $rekapODP->idSTO;
				$data['kodeSTO'][] = $rekapODP->kodeSTO;
				$data['namaSTO'][] = $rekapODP->namaSTO;
				$data['grand_total'][] = $rekapODP->grand_total;
				$data['totalODP'] += $rekapODP->grand_total;
			}
		}

		$sto = $this->STO_model->getDataSTO();
		$totalSTO = $sto->num_rows();
		if ($totalSTO != null) {
			$data['totalSTO'] = $totalSTO;
		}
		if ($sto != null) {
			foreach ($sto->result() as $sto) {
				$data['namaSTO'][] = $sto->namaSTO;
			}
		}

		// $data['totalODP'] = array_sum($data['grand_total']);
		// $data['totalSTO'] = $ODP->num_rows();


		// print_r($data['totalODP']->row());

		$data['validasi'] = $this->Validasi_model->jumlahRekapValidasi()->result();
		$validasi = $data['validasi'];
		foreach ($validasi as $rekapValidasi) {
			$data['total'][] = $rekapValidasi->total;
			$data['totalValidasi'] += $rekapValidasi->total;
		}
		// $data['totalValidasi'] = array_sum($data['total']);
		// $data['totalValidasi'] = $this->Validasi_model->jumlahRekapValidasi();
		// print_r($data['totalValidasi']->result());
		$data['chart'] = json_encode($data);
		// print_r($data['chart']);


		$this->template->load('template/template_Ondesk', 'dashboard/chart', $data);

		// $this->template->load('template/template_Ondesk', 'dashboard/chart');
	}

	public function filtering()
	{
		$this->template->load('template/template_Ondesk', 'dashboard/filtering');
	}
	//End Dashboard

	// Start Menu Pegawai 
	public function getPegawai()
	{
		$data['row'] = $this->Pegawai_model->getDataPegawai();
		$this->template->load('template/template_Ondesk', 'pegawai/pegawai_data', $data);
	}

	public function addPegawai()
	{
		$this->form_validation->set_rules('namaPegawai', 'Nama', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[30]|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|is_unique[pegawai.username]|min_length[5]|max_length[20]|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric|min_length[5]|max_length[16]|trim');
		$this->form_validation->set_rules(
			'passconf',
			'Konfirmasi Password',
			'required|matches[password]|alpha_numeric|min_length[5]|max_length[16]|trim',
			array('matches' => '%s tidak sesuai dengan password')
		);
		$this->form_validation->set_rules('status', 'Status', 'required|trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('regex_match', '{field} berisi karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
		$this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
		$this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/template_Ondesk', 'pegawai/pegawai_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Pegawai_model->addDataPegawai($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil ditambahkan');
			}
			redirect('Ondesk/getPegawai');
		}
	}

	public function editPegawai($id)
	{
		$this->form_validation->set_rules('namaPegawai', 'Nama', 'required|regex_match[/^[a-zA-Z ]+$/]|min_length[0]|max_length[30]|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|callback_username_check|min_length[5]|max_length[20]|trim');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'alpha_numeric|min_length[5]|max_length[16]|trim');
			$this->form_validation->set_rules(
				'passconf',
				'Konfirmasi Password',
				'matches[password]|alpha_numeric|min_length[5]|max_length[16]|trim',
				array('matches' => '%s tidak sesuai dengan password')
			);
		}
		if ($this->input->post('passconf')) {
			$this->form_validation->set_rules(
				'passconf',
				'Konfirmasi Password',
				'matches[password]|alpha_numeric|min_length[5]|max_length[16]|trim',
				array('matches' => '%s tidak sesuai dengan password')
			);
		}
		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('regex_match', '{field} berisi karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
		$this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
		$this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->pegawai_model->getDataPegawai($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template/template_Ondesk', 'pegawai/pegawai_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Ondesk/getPegawai');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Pegawai_model->editDataPegawai($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Ondesk/getPegawai');
		}
	}

	public function detailPegawai($id)
	{
		$detailPegawai = $this->Pegawai_model->detailDataPegawai($id);
		$data['detailPegawai'] = $detailPegawai;
		$this->template->load('template/template_Ondesk', 'pegawai/pegawai_form_detail', $data);
	}

	function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM pegawai WHERE username = '$post[username]' AND idPegawai != '$post[idPegawai]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function deletePegawai()
	{
		$id = $this->input->post('idPegawai');
		$this->Pegawai_model->deleteDataPegawai($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('Ondesk/getPegawai');
	}
	// End Menu Pegawai

	// Start Menu Regional
	public function getRegional()
	{
		$data['row'] = $this->Regional_model->getDataRegional();
		$this->template->load('template/template_Ondesk', 'regional/regional_data', $data);
	}

	public function addRegional()
	{
		$this->form_validation->set_rules('namaRegional', 'Nama Regional', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[20]|is_unique[regional.namaRegional]|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('regex_match', '{field} berisi karakter dan numerik');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');


		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/template_Ondesk', 'regional/regional_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Regional_model->addDataRegional($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil ditambahkan');
			}
			redirect('Ondesk/getRegional');
		}
	}

	public function editRegional($id)
	{
		$this->form_validation->set_rules('namaRegional', 'Nama Regional', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[20]|callback_regional_check|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|alpha_dash');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('regex_match', '{field} berisi karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
		$this->form_validation->set_message('alpha_dash', '{field} berisi karakter, simbol dan numerik');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->Regional_model->getDataRegional($id);

			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template/template_Ondesk', 'regional/regional_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Ondesk/getRegional');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Regional_model->editDataRegional($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Ondesk/getRegional');
		}
	}

	function regional_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM regional WHERE namaRegional = '$post[namaRegional]' AND idRegional != '$post[idRegional]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('regional_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function deleteRegional()
	{
		$id = $this->input->post('idRegional');
		$this->Regional_model->deleteDataRegional($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('Ondesk/getRegional');
	}
	// End Menu Regional

	// Start Menu Witel 
	public function getWitel()
	{
		$data['row'] = $this->Witel_model->getDataWitel();
		$this->template->load('template/template_Ondesk', 'witel/witel_data', $data);
	}

	public function addWitel()
	{
		$data['row'] = $this->Regional_model->getDataRegional();
		$this->form_validation->set_rules('namaWitel', 'Nama Witel', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[20]|is_unique[witel.namaWitel]|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
		$this->form_validation->set_rules('regional', 'Regional', 'required|trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('regex_match', '{field} berisi karakter dan numerik');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');


		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/template_Ondesk', 'witel/witel_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Witel_model->addDataWitel($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil ditambahkan');
			}
			redirect('Ondesk/getWitel');
		}
	}

	public function editWitel($id)
	{
		$this->form_validation->set_rules('namaWitel', 'Nama Witel', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[20]|callback_witel_check|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
		$this->form_validation->set_rules('regional', 'Regional', 'required|trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('regex_match', '{field} berisi karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->Witel_model->getDataWitel($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$query2 = $this->Regional_model->getDataRegionalSelect($data['row']->idRegional);
				if ($query2->num_rows() > 0) {
					$data['regional'] = $query2;
				}
				$this->template->load('template/template_Ondesk', 'witel/witel_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Ondesk/getWitel');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Witel_model->editDataWitel($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Ondesk/getWitel');
		}
	}

	function witel_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM witel WHERE namaWitel = '$post[namaWitel]' AND idWitel != '$post[idWitel]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('witel_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function deleteWitel()
	{
		$id = $this->input->post('idWitel');
		$this->Witel_model->deleteDataWitel($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('Ondesk/getWitel');
	}
	// End Menu Witel

	// Start Menu Datel
	public function getDatel()
	{
		$data['row'] = $this->Datel_model->getDataDatel();
		$this->template->load('template/template_Ondesk', 'datel/datel_data', $data);
	}

	public function addDatel()
	{
		$data['row'] = $this->Witel_model->getDataWitel();
		$this->form_validation->set_rules('namaDatel', 'Nama Datel', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[20]|is_unique[datel.namaDatel]|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
		$this->form_validation->set_rules('witel', 'Witel', 'required|trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('regex_match', '{field} berisi karakter dan numerik');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/template_Ondesk', 'datel/datel_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Datel_model->addDataDatel($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil ditambahkan');
			}
			redirect('Ondesk/getDatel');
		}
	}

	public function editDatel($id)
	{
		$this->form_validation->set_rules('namaDatel', 'Nama Datel', 'required|regex_match[/^[a-zA-Z ]+$/]|callback_datel_check|max_length[20]|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
		$this->form_validation->set_rules('witel', 'Witel', 'required|trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('regex_match', '{field} berisi karakter dan numerik');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->Datel_model->getDataDatel($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$query2 = $this->Witel_model->getDataWitelSelect($data['row']->idWitel);
				if ($query2->num_rows() > 0) {
					$data['witel'] = $query2;
				}
				$this->template->load('template/template_Ondesk', 'datel/datel_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Ondesk/getDatel');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Datel_model->editDataDatel($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Ondesk/getDatel');
		}
	}

	function datel_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM datel WHERE namaDatel = '$post[namaDatel]' AND idDatel != '$post[idDatel]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('datel_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function deleteDatel()
	{
		$id = $this->input->post('idDatel');
		$this->Datel_model->deleteDataDatel($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('Ondesk/getDatel');
	}
	// End Menu Datel

	// Start Menu STO
	public function getSTO()
	{
		$data['row'] = $this->STO_model->getDataSTO();
		$this->template->load('template/template_Ondesk', 'sto/sto_data', $data);
	}

	public function addSTO()
	{
		$data['row'] = $this->Datel_model->getDataDatel();
		$this->form_validation->set_rules('kodeSTO', 'Kode STO', 'required|min_length[3]|max_length[5]|is_unique[sto.kodeSTO]|regex_match[/^[A-Za-z]+$/]|trim');
		$this->form_validation->set_rules('namaSTO', 'Nama STO', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[20]|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
		$this->form_validation->set_rules('datel', 'Datel', 'required|trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('regex_match', '{field} tidak sesuai format');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/template_Ondesk', 'sto/sto_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->STO_model->addDataSTO($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil ditambahkan');;
			}
			redirect('Ondesk/getSTO');
		}
	}

	public function editSTO($id)
	{
		$this->form_validation->set_rules('kodeSTO', 'Kode STO', 'required|min_length[3]|max_length[5]|regex_match[/^[A-Za-z]+$/]|callback_sto_check|trim');
		$this->form_validation->set_rules('namaSTO', 'Nama STO', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[20]|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
		$this->form_validation->set_rules('datel', 'Datel', 'required|trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('regex_match', '{field} tidak sesuai format');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->STO_model->getDataSTO($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$query2 = $this->Datel_model->getDataDatelSelect($data['row']->idDatel);
				if ($query2->num_rows() > 0) {
					$data['datel'] = $query2;
				}
				$this->template->load('template/template_Ondesk', 'sto/sto_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Ondesk/getSTO');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->STO_model->editDataSTO($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Ondesk/getSTO');
		}
	}

	function sto_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM sto WHERE kodeSTO = '$post[kodeSTO]' AND idSTO != '$post[idSTO]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('sto_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function deleteSTO()
	{
		$id = $this->input->post('idSTO');
		$this->STO_model->deleteDataSTO($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('Ondesk/getSTO');
	}
	// End Menu STO

	// Start Menu Specification OLT 
	public function getSpecOLT()
	{
		$data['row'] = $this->SpecOLT_model->getDataSpecOLT();
		$this->template->load('template/template_Ondesk', 'specolt/specolt_data', $data);
	}

	public function addSpecOLT()
	{
		$this->form_validation->set_rules('namaSpecOLT', 'Nama Specification OLT', 'required|max_length[50]|is_unique[specification_olt.namaSpecOLT]|trim');
		$this->form_validation->set_rules('merekOLT', 'Merek OLT', 'max_length[20]|trim');
		$this->form_validation->set_rules('typeOLT', 'Type OLT', 'max_length[20]|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/template_Ondesk', 'specolt/specolt_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->SpecOLT_model->addDataSpecOLT($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil ditambahkan');
			}
			redirect('Ondesk/getSpecOLT');
		}
	}

	public function editSpecOLT($id)
	{
		$this->form_validation->set_rules('namaSpecOLT', 'Nama Specification OLT', 'required|max_length[50]|callback_spek_check|trim');
		$this->form_validation->set_rules('merekOLT', 'Merek OLT', 'max_length[20]|trim');
		$this->form_validation->set_rules('typeOLT', 'Type OLT', 'max_length[20]|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->SpecOLT_model->getDataSpecOLT($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template/template_Ondesk', 'specolt/specolt_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Ondesk/getSpecOLT');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->SpecOLT_model->editDataSpecOLT($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Ondesk/getSpecOLT');
		}
	}

	function spek_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM specification_olt WHERE namaSpecOLT = '$post[namaSpecOLT]' AND idSpecOLT != '$post[idSpecOLT]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('spek_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function deleteSpecOLT()
	{
		$id = $this->input->post('idSpecOLT');
		$this->SpecOLT_model->deleteDataSpecOLT($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('Ondesk/getSpecOLT');
	}
	//End Spek OLT

	// START ODP
	public function getODP()
	{
		$data['row'] = $this->ODP_model->getDataODP();
		$this->template->load('template/template_Ondesk', 'odp/odp_data', $data);
	}

	public function viewListODP()
	{
		$this->template->load('template/template_Ondesk', 'odp/odp_data');
	}

	public function loadDataODP()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$sql_total = $this->ODP_model->count_all(); // Panggil fungsi count_all pada SiswaModel
		$sql_data = $this->ODP_model->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada SiswaModel
		$sql_filter = $this->ODP_model->count_filter($search); // Panggil fungsi count_filter pada SiswaModel
		
		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);
		
		header('Content-Type: application/json');
		
		echo json_encode($callback); // Convert array $callback ke json
	}

	public function uploadODP()
	{
		$this->template->load('template/template_Ondesk', 'odp/odp_form_import');
	}

	//Fungsi file upload
	public function importODP()
	{
		$data = array();
		// Load form validation library

		$this->form_validation->set_rules('fileURL', 'Upload File ODP', 'callback_checkFileValidation');
		// If file uploaded

		if (!empty($_FILES['fileURL']['name'])) {

			// get file extension
			$extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

			if ($extension == 'csv') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} elseif ($extension == 'xlsx') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}
			// file path
			$spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
			$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
			// array Count
			$arrayCount = count($allDataInSheet);

			$flag = 0;
			$createArray = array('NOSS_ID', 'ODP_INDEX', 'ODP 3 DIGIT', 'FTP', 'LATITUDE', 'LONGITUDE', 'CLUSNAME', 'CLUSTERSATATUS', 'AVAI', 'USED', 'RSV', 'RSK', 'IS_TOTAL', 'STO' , 'ODP_INFO', 'UPDATE_DATE');
			$makeArray = array('NOSS_ID' => 'NOSS_ID', 'ODP_INDEX' => 'ODP_INDEX', 'ODP 3 DIGIT' => 'ODP 3 DIGIT', 'FTP' => 'FTP', 'LATITUDE' => 'LATITUDE', 'LONGITUDE' => 'LONGITUDE', 'CLUSNAME' => 'CLUSNAME', 'CLUSTERSATATUS' => 'CLUSTERSATATUS', 'AVAI' => 'AVAI', 'USED' => 'USED', 'RSV' => 'RSV', 'RSK' => 'RSK', 'IS_TOTAL' => 'IS_TOTAL', 'STO' => 'STO' , 'ODP_INFO' => 'ODP_INFO', 'UPDATE_DATE' => 'UPDATE_DATE');
			$SheetDataKey = array();
			foreach ($allDataInSheet as $dataInSheet) {
			    foreach ($dataInSheet as $key => $value) {
			        if (in_array(trim($value), $createArray)) {
			            $SheetDataKey[trim($value)] = $key;
			        } 
			    }
			}
			$dataDiff = array_diff_key($makeArray, $SheetDataKey);
			if (empty($dataDiff)) {
			    $flag = 1;
			}
			print_r($SheetDataKey);
			// match excel sheet column
			if ($flag == 1) {
				for ($i = 2; $i <= $arrayCount; $i++) {
					$NOSS_ID = $SheetDataKey['NOSS_ID'];
					$ODP_INDEX = $SheetDataKey['ODP_INDEX'];
					$ODP_NAME = $SheetDataKey['ODP 3 DIGIT'];
					$FTP = $SheetDataKey['FTP'];
					$LATITUDE = $SheetDataKey['LATITUDE'];
					$LONGITUDE = $SheetDataKey['LONGITUDE'];
					$CLUSNAME = $SheetDataKey['CLUSNAME'];
					$CLUSTERSATATUS = $SheetDataKey['CLUSTERSATATUS'];
					$AVAI = $SheetDataKey['AVAI'];
					$USED = $SheetDataKey['USED'];
					$RSV = $SheetDataKey['RSV'];
					$RSK = $SheetDataKey['RSK'];
					$IS_TOTAL = $SheetDataKey['IS_TOTAL'];
					$STO = $SheetDataKey['STO'];
					$ODP_INFO = $SheetDataKey['ODP_INFO'];
					$UPDATE_DATE = $SheetDataKey['UPDATE_DATE'];

					$NOSS_ID = filter_var(html_escape(trim($allDataInSheet[$i][$NOSS_ID])), FILTER_SANITIZE_STRING);
					$ODP_INDEX = filter_var(html_escape(trim($allDataInSheet[$i][$ODP_INDEX])), FILTER_SANITIZE_STRING);
					$ODP_NAME  = filter_var(html_escape(trim($allDataInSheet[$i][$ODP_NAME])), FILTER_SANITIZE_STRING);
					$FTP = filter_var(html_escape(trim($allDataInSheet[$i][$FTP])), FILTER_SANITIZE_STRING);
					$LATITUDE = filter_var(html_escape(trim($allDataInSheet[$i][$LATITUDE])), FILTER_SANITIZE_STRING);
					$LONGITUDE = filter_var(html_escape(trim($allDataInSheet[$i][$LONGITUDE])), FILTER_SANITIZE_STRING);
					$CLUSNAME = filter_var(html_escape(trim($allDataInSheet[$i][$CLUSNAME])), FILTER_SANITIZE_STRING);
					$CLUSTERSATATUS = filter_var(html_escape(trim($allDataInSheet[$i][$CLUSTERSATATUS])), FILTER_SANITIZE_STRING);
					$AVAI = filter_var(html_escape(trim($allDataInSheet[$i][$AVAI])), FILTER_SANITIZE_STRING);
					$USED = filter_var(html_escape(trim($allDataInSheet[$i][$USED])), FILTER_SANITIZE_STRING);
					$RSV = filter_var(html_escape(trim($allDataInSheet[$i][$RSV])), FILTER_SANITIZE_STRING);
					$RSK = filter_var(html_escape(trim($allDataInSheet[$i][$RSK ])), FILTER_SANITIZE_STRING);
					$IS_TOTAL = filter_var(html_escape(trim($allDataInSheet[$i][$IS_TOTAL])), FILTER_SANITIZE_STRING);
					$STO = filter_var(html_escape(trim($allDataInSheet[$i][$STO])), FILTER_SANITIZE_STRING);
					$ODP_INFO = filter_var(html_escape(trim($allDataInSheet[$i][$ODP_INFO])), FILTER_SANITIZE_STRING);
					$UPDATE_DATE = filter_var(html_escape(trim($allDataInSheet[$i][$UPDATE_DATE])), FILTER_SANITIZE_STRING);

					// $NOSS_ID = filter_var(html_escape(trim($allDataInSheet[$i]['A'])), FILTER_SANITIZE_STRING);
					// $ODP_INDEX = filter_var(html_escape(trim($allDataInSheet[$i]['B'])), FILTER_SANITIZE_STRING);
					// $ODP_NAME  = filter_var(html_escape(trim($allDataInSheet[$i]['D'])), FILTER_SANITIZE_STRING);
					// $FTP = filter_var(html_escape(trim($allDataInSheet[$i]['E'])), FILTER_SANITIZE_STRING);
					// $LATITUDE = filter_var(html_escape(trim($allDataInSheet[$i]['F'])), FILTER_SANITIZE_STRING);
					// $LONGITUDE = filter_var(html_escape(trim($allDataInSheet[$i]['G'])), FILTER_SANITIZE_STRING);
					// $CLUSNAME = filter_var(html_escape(trim($allDataInSheet[$i]['H'])), FILTER_SANITIZE_STRING);
					// $CLUSTERSATATUS = filter_var(html_escape(trim($allDataInSheet[$i]['I'])), FILTER_SANITIZE_STRING);
					// $AVAI = filter_var(html_escape(trim($allDataInSheet[$i]['J'])), FILTER_SANITIZE_STRING);
					// $USED = filter_var(html_escape(trim($allDataInSheet[$i]['K'])), FILTER_SANITIZE_STRING);
					// $RSV = filter_var(html_escape(trim($allDataInSheet[$i]['L'])), FILTER_SANITIZE_STRING);
					// $RSK = filter_var(html_escape(trim($allDataInSheet[$i]['M'])), FILTER_SANITIZE_STRING);
					// $IS_TOTAL = filter_var(html_escape(trim($allDataInSheet[$i]['N'])), FILTER_SANITIZE_STRING);
					// $STO = filter_var(html_escape(trim($allDataInSheet[$i]['R'])), FILTER_SANITIZE_STRING);
					// $ODP_INFO = filter_var(html_escape(trim($allDataInSheet[$i]['T'])), FILTER_SANITIZE_STRING);
					// $UPDATE_DATE = filter_var(html_escape(trim($allDataInSheet[$i]['U'])), FILTER_SANITIZE_STRING);

					$newSTO = $this->STO_model->getIDSTOByKode($STO);
					$idSTO = $newSTO->idSTO;
					$newDate = date("Y-m-d H:i", strtotime($UPDATE_DATE));

					$fetchData[] = array('idNOSS' => $NOSS_ID, 'indexODP' => $ODP_INDEX, 'namaODP' => $ODP_NAME, 'ftp' => $FTP, 'latitude' => $LATITUDE, 'longitude' => $LONGITUDE, 'clusterName' => $CLUSNAME, 'clusterStatus' => $CLUSTERSATATUS, 'avai' => $AVAI, 'used' => $USED, 'rsv' => $RSV, 'rsk' => $RSK, 'total' => $IS_TOTAL, 'idSTO' => $idSTO, 'infoODP' => $ODP_INFO, 'updateDate' => $newDate);

					// print_r($UPDATE_DATE);

					// print_r($newDate);
				}

				// $data['data_odp'] = $fetchData;
				$this->ODP_model->setBatchImportODP($fetchData);
				$this->ODP_model->importDataODP();

				redirect('Ondesk/viewListODP');
			} else {

				$this->session->set_flashdata('danger', 'Format tidak sesuai, harap download format yang ditentukan');
			}
			redirect('Ondesk/viewListODP');
		}
	}

	public function checkFileValidation($string)
	{
		$file_mimes = array(
			'text/x-comma-separated-values',
			'text/comma-separated-values',
			'application/octet-stream',
			'application/vnd.ms-excel',
			'application/x-csv',
			'text/x-csv',
			'text/csv',
			'application/csv',
			'application/excel',
			'application/vnd.msexcel',
			'text/plain',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
		);
		if (isset($_FILES['fileURL']['name'])) {
			$arr_file = explode('.', $_FILES['fileURL']['name']);
			$extension = end($arr_file);
			if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
				return true;
			} else {
				$this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
				return false;
			}
		} else {
			$this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
			return false;
		}
	}

	public function addODP()
	{
		$data['row'] = $this->STO_model->getDataSTO();
		$this->form_validation->set_rules('idNOSS', 'ID NOSS', 'required|is_unique[rekap_data_odp.idNOSS]|max_length[16]|trim');
		$this->form_validation->set_rules('indexODP', 'Index ODP', 'required|is_unique[rekap_data_odp.indexODP]|max_length[20]|trim');
		$this->form_validation->set_rules('namaODP[]', 'Nama ODP', 'required|is_unique[rekap_data_odp.namaODP]|max_length[20]|trim');
		$this->form_validation->set_rules('ftp', 'FTP', 'required|max_length[8]|trim');
		$this->form_validation->set_rules('latitude', 'Latitude', 'required|max_length[16]|trim');
		$this->form_validation->set_rules('longitude', 'Longitude', 'required|max_length[16]|trim');
		$this->form_validation->set_rules('clusterName', 'Cluster Name', 'max_length[50]required|trim');
		$this->form_validation->set_rules('clusterStatus', 'Cluster Status', 'max_length[15]|trim');
		$this->form_validation->set_rules('avai', 'Available', 'required|max_length[4]|trim');
		$this->form_validation->set_rules('used', 'Used', 'required|max_length[4]|trim');
		$this->form_validation->set_rules('rsv', 'RSV', 'required|max_length[4]|trim');
		$this->form_validation->set_rules('rsk', 'RSK', 'required|max_length[4]|trim');
		$this->form_validation->set_rules('STO', 'STO', 'required|trim');
		$this->form_validation->set_rules('infoODP', 'Info ODP', 'trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/template_Ondesk', 'odp/odp_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->ODP_model->addDataODP($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil ditambahkan');
			}
			redirect('Ondesk/viewListODP');
		}
	}

	public function editODP($id)
	{
		$this->form_validation->set_rules('idNOSS', 'ID NOSS', 'max_length[16]|trim');
		$this->form_validation->set_rules('indexODP', 'index ODP', 'max_length[20]|trim');
		$this->form_validation->set_rules('namaODP', 'Nama ODP', 'max_length[20]|trim');
		$this->form_validation->set_rules('ftp', 'FTP', 'required|max_length[8]|trim');
		$this->form_validation->set_rules('latitude', 'Latitude', 'required|max_length[16]|trim');
		$this->form_validation->set_rules('longitude', 'Longitude', 'required|max_length[16]|trim');
		$this->form_validation->set_rules('clusterName', 'Cluster Name', 'max_length[50]required|trim');
		$this->form_validation->set_rules('clusterStatus', 'Cluster Status', 'max_length[15]|trim');
		$this->form_validation->set_rules('avai', 'Available', 'required|max_length[4]|trim');
		$this->form_validation->set_rules('used', 'Used', 'required|max_length[4]|trim');
		$this->form_validation->set_rules('rsv', 'RSV', 'required|max_length[4]|trim');
		$this->form_validation->set_rules('rsk', 'RSK', 'required|max_length[4]|trim');
		$this->form_validation->set_rules('STO', 'STO', 'trim');
		$this->form_validation->set_rules('infoODP', 'Info ODP', 'trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->ODP_model->getDataODP($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$query2 = $this->STO_model->getDataSTOSelect($data['row']->idSTO);
				if ($query2->num_rows() > 0) {
					$data['sto'] = $query2;
				}
				$this->template->load('template/template_Ondesk', 'odp/odp_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Ondesk/viewListODP');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->ODP_model->editDataODP($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Ondesk/viewListODP');
		}
	}

	function noss_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM specification_olt WHERE namaSpecOLT = '$post[namaSpecOLT]' AND idSpecOLT != '$post[idSpecOLT]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('spek_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function index_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM rekap_data_odp WHERE indexODP= '$post[indexODP]' AND idODP != '$post[idODP]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('index_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function odp_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM rekap_data_odp WHERE namaODP = '$post[namaODP]' AND idODP != '$post[idODP]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('odp_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function deleteODP($id)
	{

		$this->ODP_model->deleteDataODP($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('Ondesk/viewListODP');
	}

	public function deleteAllODP()
	{
		// $this->exportODP();

		$this->ODP_model->deleteAllDataODP();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Semua data berhasil dihapus');
		}
		redirect('Ondesk/viewListODP');
	}

	public function exportODP()
	{


		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		$Excel_writer = new Xlsx($spreadsheet);

		foreach (range('A1', 'T1') as $test) {
			$spreadsheet->getActiveSheet()->getColumnDimension($test)->setAutoSize(true);
		}

		$spreadsheet->setActiveSheetIndex(0);
		$activeSheet = $spreadsheet->getActiveSheet();
		$activeSheet->setCellValue('A1', 'NOSS_ID');
		$activeSheet->setCellValue('B1', 'ODP_INDEX');
		$activeSheet->setCellValue('C1', 'ODP_NAME');
		$activeSheet->setCellValue('D1', 'ODP 3 DIGIT');
		$activeSheet->setCellValue('E1', 'FTP');
		$activeSheet->setCellValue('F1', 'LATITUDE');
		$activeSheet->setCellValue('G1', 'LONGITUDE');
		$activeSheet->setCellValue('H1', 'CLUSNAME');
		$activeSheet->setCellValue('I1', 'CLUSTERSATATUS');
		$activeSheet->setCellValue('J1', 'AVAI');
		$activeSheet->setCellValue('K1', 'USED');
		$activeSheet->setCellValue('L1', 'RSV');
		$activeSheet->setCellValue('M1', 'RSK');
		$activeSheet->setCellValue('N1', 'IS_TOTAL');
		$activeSheet->setCellValue('O1', 'REGIONAL');
		$activeSheet->setCellValue('P1', 'WITEL');
		$activeSheet->setCellValue('Q1', 'DATEL');
		$activeSheet->setCellValue('R1', 'STO');
		$activeSheet->setCellValue('S1', 'STO_DESC');
		$activeSheet->setCellValue('T1', 'ODP_INFO');
		$activeSheet->setCellValue('U1', 'UPDATE_DATE');


		// $query = $db->query("SELECT * FROM rekap_data_odp ORDER BY idODP DESC");
		$query = $this->ODP_model->getDataODP()->result();
		$i = 2;
		foreach ($query as $row) {
			$activeSheet->setCellValue('A' . $i, $row->idNOSS);
			$activeSheet->setCellValue('B' . $i, $row->indexODP);
			$activeSheet->setCellValue('C' . $i, $row->namaODP);
			$activeSheet->setCellValue('D' . $i, $row->namaODP);
			$activeSheet->setCellValue('E' . $i, $row->ftp);
			$activeSheet->setCellValue('F' . $i, $row->latitude);
			$activeSheet->setCellValue('G' . $i, $row->longitude);
			$activeSheet->setCellValue('H' . $i, $row->clusterName);
			$activeSheet->setCellValue('I' . $i, $row->clusterStatus);
			$activeSheet->setCellValue('J' . $i, $row->avai);
			$activeSheet->setCellValue('K' . $i, $row->used);
			$activeSheet->setCellValue('L' . $i, $row->rsv);
			$activeSheet->setCellValue('M' . $i, $row->rsk);
			$activeSheet->setCellValue('N' . $i, $row->total);
			$activeSheet->setCellValue('O' . $i, $row->namaRegional);
			$activeSheet->setCellValue('P' . $i, $row->namaWitel);
			$activeSheet->setCellValue('Q' . $i, $row->namaDatel);
			$activeSheet->setCellValue('R' . $i, $row->kodeSTO);
			$activeSheet->setCellValue('S' . $i, $row->namaSTO);
			$activeSheet->setCellValue('T' . $i, $row->infoODP);

			$newDate = date("d/m/Y H:i", strtotime($row->updateDate));
			$activeSheet->setCellValue('U' . $i, $newDate);
			$i++;
		}

		$filename = 'RekapODP.xlsx';


		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename);
		header('Cache-Control: max-age=0');

		$Excel_writer->save('php://output');
	}
	// END ODP

	// START OLT
	public function getOLT()
	{
		$data['row'] = $this->OLT_model->getDataOLT();
		$this->template->load('template/template_Ondesk', 'olt/olt_data', $data);
	}

	public function uploadOLT()
	{
		$this->template->load('template/template_Ondesk', 'olt/olt_form_import');
	}

	public function addOLT()
	{
		$data['sto'] = $this->STO_model->getDataSTO();
		$data['spec'] = $this->SpecOLT_model->getDataSpecOLT();

		$this->form_validation->set_rules('hostname', 'HOSTNAME', 'required|is_unique[rekap_data_olt.hostname]|trim');
		$this->form_validation->set_rules('ipOLT', 'IP GPON', 'required|is_unique[rekap_data_olt.ipOLT]|trim');
		$this->form_validation->set_rules('idLogicalDevice', 'ID Logical Device', 'required|is_unique[rekap_data_olt.idLogicalDevice]|trim');
		$this->form_validation->set_rules('STO', 'STO', 'required|trim');
		$this->form_validation->set_rules('SpecOLT', 'Specification OLT', 'required|trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/template_Ondesk', 'olt/olt_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->OLT_model->addDataOLT($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil ditambahkan');
			}
			redirect('Ondesk/getOLT');
		}
	}

	public function editOLT($id)
	{

		$this->form_validation->set_rules('hostname', 'HOSTNAME', 'trim');
		$this->form_validation->set_rules('ipOLT', 'IP GPON', 'required|callback_ipolt_check|trim');
		$this->form_validation->set_rules('idLogicalDevice', 'ID Logical Device', 'required|callback_idlogicaldevice_check|trim');
		$this->form_validation->set_rules('STO', 'STO', 'trim');
		$this->form_validation->set_rules('SpecOLT', 'Specification OLT', 'trim');


		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->OLT_model->getDataOLT($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$query2 = $this->STO_model->getDataSTOSelect($data['row']->idSTO);
				if ($query2->num_rows() > 0) {
					$data['sto'] = $query2;
				}
				$query3 = $this->SpecOLT_model->getDataSpecOLTSelect($data['row']->idSpecOLT);
				if ($query3->num_rows() > 0) {
					$data['spec'] = $query3;
				}
				$this->template->load('template/template_Ondesk', 'olt/olt_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Ondesk/getOLT');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->OLT_model->editDataOLT($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Ondesk/getOLT');
		}
	}

	function ipolt_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM rekap_data_olt WHERE ipOLT = '$post[ipOLT]' AND idOLT != '$post[idOLT]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('ipolt_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function idlogicaldevice_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM rekap_data_olt WHERE idLogicalDevice = '$post[idLogicalDevice]' AND idOLT != '$post[idOLT]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('idlogicaldevice_check', '{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function deleteOLT()
	{
		$id = $this->input->post('idOLT');
		$this->OLT_model->deleteDataOLT($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('Ondesk/getOLT');
	}

	public function deleteAllOLT()
	{
		// $this->exportODP();

		$this->OLT_model->deleteAllDataOLT();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Semua data berhasil dihapus');
		}
		redirect('Ondesk/getOLT');
	}

	//Fungsi file upload
	public function importOLT()
	{
		$data = array();
		// Load form validation library

		$this->form_validation->set_rules('fileURL', 'Upload File OLT', 'callback_checkFileValidation');
		// If file uploaded

		if (!empty($_FILES['fileURL']['name'])) {

			// get file extension
			$extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

			if ($extension == 'csv') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} elseif ($extension == 'xlsx') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}
			// file path
			$spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
			$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
			// array Count
			$arrayCount = count($allDataInSheet);

			$flag = 0;
			$createArray = array('HOSTNAME BARU', 'IP GPON', 'STO', 'ID Logical Device', 'Specification');
			$makeArray = array('HOSTNAME BARU' => 'HOSTNAME BARU' , 'IP GPON' => 'IP GPON', 'STO' => 'STO', 'ID Logical Device' => 'ID Logical Device', 'Specification' => 'Specification' );
			$SheetDataKey = array();
			foreach ($allDataInSheet as $dataInSheet) {
			    foreach ($dataInSheet as $key => $value) {
			        if (in_array(trim($value), $createArray)) {

						$SheetDataKey[trim($value)] = $key;
						
			        } 
			    }
			}
			
			$dataDiff = array_diff_key($makeArray, $SheetDataKey);
			if (empty($dataDiff)) {
			    $flag = 1;
			}
			
			// match excel sheet column
			if ($flag == 1) {
				for ($i = 2; $i <= $arrayCount; $i++) {
					$HOSTNAMEBARU = $SheetDataKey['HOSTNAME BARU'];
					$IPGPON = $SheetDataKey['IP GPON'];
					$STO = $SheetDataKey['STO'];
					$IDLOGICALDEVICE = $SheetDataKey['ID Logical Device'];
					$SPECIFICATION = $SheetDataKey['Specification'];

					$HOSTNAMEBARU = filter_var(html_escape(trim($allDataInSheet[$i][$HOSTNAMEBARU])), FILTER_SANITIZE_STRING);
					$IPGPON = filter_var(html_escape(trim($allDataInSheet[$i][$IPGPON])), FILTER_SANITIZE_STRING);
					$STO  = filter_var(html_escape(trim($allDataInSheet[$i][$STO])), FILTER_SANITIZE_STRING);
					$IDLOGICALDEVICE = filter_var(html_escape(trim($allDataInSheet[$i][$IDLOGICALDEVICE])), FILTER_SANITIZE_STRING);
					$SPECIFICATION = filter_var(html_escape(trim($allDataInSheet[$i][$SPECIFICATION])), FILTER_SANITIZE_STRING);

					// $HOSTNAMEBARU = filter_var(html_escape(trim($allDataInSheet[$i]['B'])), FILTER_SANITIZE_STRING);
					// $IPGPON = filter_var(html_escape(trim($allDataInSheet[$i]['C'])), FILTER_SANITIZE_STRING);
					// $STO  = filter_var(html_escape(trim($allDataInSheet[$i]['D'])), FILTER_SANITIZE_STRING);
					// $IDLOGICALDEVICE = filter_var(html_escape(trim($allDataInSheet[$i]['H'])), FILTER_SANITIZE_STRING);
					// $SPECIFICATION = filter_var(html_escape(trim($allDataInSheet[$i]['I'])), FILTER_SANITIZE_STRING);

					$newSTO = $this->STO_model->getIDSTOByName($STO);
					$idSTO = $newSTO->idSTO;
					if (!empty($SPECIFICATION) or $SPECIFICATION != null) {
						$newSpecOLT = $this->SpecOLT_model->getIDSpecOLTByName($SPECIFICATION);
						$idSpecOLT = $newSpecOLT->idSpecOLT;
					}


					$fetchData[] = array('hostname' => $HOSTNAMEBARU, 'ipOLT' => $IPGPON, 'idSTO' => $idSTO, 'idLogicalDevice' => $IDLOGICALDEVICE, 'idSpecOLT' => $idSpecOLT);
				}

				$this->OLT_model->setBatchImportOLT($fetchData);
				$this->OLT_model->importDataOLT();
			} else {
				$this->session->set_flashdata('danger', 'Format tidak sesuai, harap download format yang ditentukan');
			}
			
			// $data['row'] = $this->OLT_model->getDataOLT();
			redirect('Ondesk/getOLT');
		}
	}
	public function exportOLT()
	{
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		$Excel_writer = new Xlsx($spreadsheet);

		foreach (range('A1', 'I1') as $test) {
			$spreadsheet->getActiveSheet()->getColumnDimension($test)->setAutoSize(true);
		}

		$spreadsheet->setActiveSheetIndex(0);
		$activeSheet = $spreadsheet->getActiveSheet();
		$activeSheet->setCellValue('A1', 'NO');
		$activeSheet->setCellValue('B1', 'HOSTNAME BARU');
		$activeSheet->setCellValue('C1', 'IP GPON');
		$activeSheet->setCellValue('D1', 'STO');
		$activeSheet->setCellValue('E1', 'Type OLT');
		$activeSheet->setCellValue('F1', 'MERK');
		$activeSheet->setCellValue('G1', 'ID Logical Device');
		$activeSheet->setCellValue('H1', 'Name');
		$activeSheet->setCellValue('I1', 'Specification');

		// $query = $db->query("SELECT * FROM rekap_data_odp ORDER BY idODP DESC");
		$query = $this->OLT_model->getDataOLT()->result();
		$i = 2;
		foreach ($query as $row) {
			$activeSheet->setCellValue('A' . $i, $i - 1);
			$activeSheet->setCellValue('B' . $i, $row->hostname);
			$activeSheet->setCellValue('C' . $i, $row->ipOLT);
			$activeSheet->setCellValue('D' . $i, $row->namaSTO);
			$activeSheet->setCellValue('E' . $i, $row->typeOLT);
			$activeSheet->setCellValue('F' . $i, $row->merekOLT);
			$nama = $row->hostname . "(" . $row->ipOLT . ")";
			$activeSheet->setCellValue('G' . $i, $row->idLogicalDevice);
			$activeSheet->setCellValue('H' . $i, $nama);
			$activeSheet->setCellValue('I' . $i, $row->namaSpecOLT);
			$i++;
		}

		$filename = 'RekapOLT.xlsx';

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename);
		header('Cache-Control: max-age=0');
		$Excel_writer->save('php://output');
	}
	// END OLT

	// Start Menu Kelola Validasi
	public function getValidasi()
	{
		$data['row'] = $this->Validasi_model->getDataValidasi();
		$this->template->load('template/template_Ondesk', 'validasi/validasi_data');
	}

	public function uploadValidasi()
	{
		$this->template->load('template/template_Ondesk', 'validasi/validasi_form_import');
	}

	public function viewListValidasi()
	{
		$this->template->load('template/template_Ondesk', 'validasi/validasi_data');
	}

	public function loadDataValidasi()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$sql_total = $this->Validasi_model->count_all(); // Panggil fungsi count_all pada SiswaModel
		$sql_data = $this->Validasi_model->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada SiswaModel
		$sql_filter = $this->Validasi_model->count_filter($search); // Panggil fungsi count_filter pada SiswaModel

		$callback2 = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);

		header('Content-Type: application/json');
		echo json_encode($callback2); // Convert array $callback ke json
	}

	//Fungsi file upload
	public function importValidasi()
	{
		$data = array();
		// Load form validation library

		$this->form_validation->set_rules('fileURL', 'Upload File Validasi', 'callback_checkFileValidation');
		// If file uploaded

		if (!empty($_FILES['fileURL']['name'])) {

			// get file extension
			$extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

			if ($extension == 'csv') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} elseif ($extension == 'xlsx') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}
			// file path
			$spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
			$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
			// array Count
			$arrayCount = count($allDataInSheet);

			$flag = 0;

			$createArray = array('TANGGAL PELURUSAN', 'ONDESK', 'ONSITE', 'NAMAODP', 'NOTE', 'QR ODP', 'KOORDINAT ODP', 'NAMA OLT (IP OLT)', 'PORT OLT', 'TOTAL IN ODP', 'KAPASITAS ODP', 'PORT OUT SPLITTER', 'QR OUT SPLITTER', 'PORT' , 'STATUS', 'ONU', 'SN', 'SERVICE', 'QR DROPCORE','NOTE URUT DROPCORE', 'FLAG OLT & PORT', 'CONNECTIVITY ODP TO OLT', 'ODP - ONT', 'RFS', 'TANGGAL UPDATE UIM', 'UPDATER UIM', 'UPDATER DAVA');
			$makeArray = array('TANGGAL PELURUSAN' => 'TANGGAL PELURUSAN', 'ONDESK' => 'ONDESK', 'ONSITE' => 'ONSITE', 'NAMAODP' => 'NAMAODP', 'NOTE' => 'NOTE', 'QR ODP' => 'QR ODP', 'KOORDINAT ODP' => 'KOORDINAT ODP', 'NAMA OLT (IP OLT)' => 'NAMA OLT (IP OLT)', 'PORT OLT' => 'PORT OLT', 'TOTAL IN ODP' => 'TOTAL IN ODP', 'KAPASITAS ODP' =>'KAPASITAS ODP', 'PORT OUT SPLITTER' => 'PORT OUT SPLITTER', 'QR OUT SPLITTER' => 'QR OUT SPLITTER', 'PORT' => 'PORT' , 'STATUS' => 'STATUS', 'ONU' => 'ONU', 'SN' => 'SN', 'SERVICE' => 'SERVICE', 'QR DROPCORE' => 'QR DROPCORE','NOTE URUT DROPCORE' => 'NOTE URUT DROPCORE', 'FLAG OLT & PORT' => 'FLAG OLT & PORT', 'CONNECTIVITY ODP TO OLT' => 'CONNECTIVITY ODP TO OLT', 'ODP - ONT' => 'ODP - ONT', 'RFS' => 'RFS', 'TANGGAL UPDATE UIM' => 'TANGGAL UPDATE UIM', 'UPDATER UIM' => 'UPDATER UIM', 'UPDATER DAVA' => 'UPDATER DAVA');
			$SheetDataKey = array();
			foreach ($allDataInSheet as $dataInSheet) {
				foreach ($dataInSheet as $key => $value) {
					if (in_array(trim($value), $createArray)) {
						$SheetDataKey[trim($value)] = $key;
					} 
				}
			}
			
			
			$dataDiff = array_diff_key($makeArray, $SheetDataKey);
			if (empty($dataDiff)) {
				$flag = 1;
			}
			

			// match excel sheet column
			if ($flag == 1) {
				for ($i = 4; $i <= $arrayCount; $i++) {
					$TANGGAL_PELURUSAN = $SheetDataKey['TANGGAL PELURUSAN'];
					$ONDESK = $SheetDataKey['ONDESK'];
					$ONSITE = $SheetDataKey['ONSITE'];
					$NAMA_ODP = $SheetDataKey['NAMAODP'];
					$NOTE_ODP = $SheetDataKey['NOTE'];
					$QR_ODP = $SheetDataKey['QR ODP'];
					$KOORDINAT_ODP = $SheetDataKey['KOORDINAT ODP'];
					$NAMA_OLT = $SheetDataKey['NAMA OLT (IP OLT)'];
					$PORT_OLT = $SheetDataKey['PORT OLT'];
					$TOTAL_IN_ODP = $SheetDataKey['TOTAL IN ODP'];
					$KAPASITAS = $SheetDataKey['KAPASITAS ODP'];
					$PORT_OUT_SPLITTER = $SheetDataKey['PORT OUT SPLITTER'];
					$QR_OUT_SPLITTER = $SheetDataKey['QR OUT SPLITTER'];
					$PORT_ODP= $SheetDataKey['PORT'];
					$STATUS = $SheetDataKey['STATUS'];
					$ONU = $SheetDataKey['ONU'];
					$SN = $SheetDataKey['SN'];
					$SERVICE = $SheetDataKey['SERVICE'];
					$QR_DROPCORE = $SheetDataKey['QR DROPCORE'];
					$NOTE_URUT_DROPCORE = $SheetDataKey['NOTE URUT DROPCORE'];
					$FLAG_OLT_PORT= $SheetDataKey['FLAG OLT & PORT'];
					$CONNECTIVITY_ODP_TO_OLT = $SheetDataKey['CONNECTIVITY ODP TO OLT'];
					$ODP_ONT = $SheetDataKey['ODP - ONT'];
					$RFS = $SheetDataKey['RFS'];
					// $NOTE_HD_DAMAN = $SheetDataKey['Y'];
					$TANGGAL_UPDATE_UIM = $SheetDataKey['TANGGAL UPDATE UIM'];
					$UPDATER_UIM = $SheetDataKey['UPDATER UIM'];
					// $NOTE_QR_ODP = $SheetDataKey['AB'];
					// $NOTE_QR_OUT_SPLITTER = $SheetDataKey['AC'];
					// $NOTE_QR_DROPCORE = $SheetDataKey['AD'];
					$UPDATER_DAVA = $SheetDataKey['UPDATER DAVA'];


					

					$TANGGAL_PELURUSAN = filter_var(html_escape(trim($allDataInSheet[$i][$TANGGAL_PELURUSAN])), FILTER_SANITIZE_STRING);
					$ONDESK = filter_var(html_escape(trim($allDataInSheet[$i][$ONDESK])), FILTER_SANITIZE_STRING);
					$ONSITE = filter_var(html_escape(trim($allDataInSheet[$i][$ONSITE])), FILTER_SANITIZE_STRING);
					$NAMA_ODP = filter_var(html_escape(trim($allDataInSheet[$i][$NAMA_ODP])), FILTER_SANITIZE_STRING);
					$NOTE_ODP = filter_var(html_escape(trim($allDataInSheet[$i][$NOTE_ODP])), FILTER_SANITIZE_STRING);
					$QR_ODP = filter_var(html_escape(trim($allDataInSheet[$i][$QR_ODP ])), FILTER_SANITIZE_STRING);
					$KOORDINAT_ODP  = filter_var(html_escape(trim($allDataInSheet[$i][$KOORDINAT_ODP])), FILTER_SANITIZE_STRING);
					$NAMA_OLT = filter_var(html_escape(trim($allDataInSheet[$i][$NAMA_OLT])), FILTER_SANITIZE_STRING);
					$PORT_OLT = filter_var(html_escape(trim($allDataInSheet[$i][$PORT_OLT])), FILTER_SANITIZE_STRING);
					$TOTAL_IN_ODP = filter_var(html_escape(trim($allDataInSheet[$i][$TOTAL_IN_ODP])), FILTER_SANITIZE_STRING);
					$KAPASITAS = filter_var(html_escape(trim($allDataInSheet[$i][$KAPASITAS])), FILTER_SANITIZE_STRING);
					$PORT_OUT_SPLITTER = filter_var(html_escape(trim($allDataInSheet[$i][$PORT_OUT_SPLITTER])), FILTER_SANITIZE_STRING);
					$QR_OUT_SPLITTER = filter_var(html_escape(trim($allDataInSheet[$i][$QR_OUT_SPLITTER])), FILTER_SANITIZE_STRING);
					$PORT_ODP = filter_var(html_escape(trim($allDataInSheet[$i][$PORT_ODP])), FILTER_SANITIZE_STRING);
					$STATUS = filter_var(html_escape(trim($allDataInSheet[$i][$STATUS])), FILTER_SANITIZE_STRING);
					$ONU = filter_var(html_escape(trim($allDataInSheet[$i][$ONU])), FILTER_SANITIZE_STRING);
					$SN = filter_var(html_escape(trim($allDataInSheet[$i][$SN])), FILTER_SANITIZE_STRING);
					$SERVICE = filter_var(html_escape(trim($allDataInSheet[$i][$SERVICE])), FILTER_SANITIZE_STRING);
					$QR_DROPCORE = filter_var(html_escape(trim($allDataInSheet[$i][$QR_DROPCORE])), FILTER_SANITIZE_STRING);
					$NOTE_URUT_DROPCORE = filter_var(html_escape(trim($allDataInSheet[$i][$NOTE_URUT_DROPCORE])), FILTER_SANITIZE_STRING);
					$FLAG_OLT_PORT = filter_var(html_escape(trim($allDataInSheet[$i][$FLAG_OLT_PORT])), FILTER_SANITIZE_STRING);
					$CONNECTIVITY_ODP_TO_OLT = filter_var(html_escape(trim($allDataInSheet[$i][$CONNECTIVITY_ODP_TO_OLT])), FILTER_SANITIZE_STRING);
					$ODP_ONT = filter_var(html_escape(trim($allDataInSheet[$i][$ODP_ONT])), FILTER_SANITIZE_STRING);
					$RFS = filter_var(html_escape(trim($allDataInSheet[$i][$RFS])), FILTER_SANITIZE_STRING);
					$NOTE_HD_DAMAN = filter_var(html_escape(trim($allDataInSheet[$i]['Y'])), FILTER_SANITIZE_STRING);
					$TANGGAL_UPDATE_UIM = filter_var(html_escape(trim($allDataInSheet[$i][$TANGGAL_UPDATE_UIM])), FILTER_SANITIZE_STRING);
					$UPDATER_UIM = filter_var(html_escape(trim($allDataInSheet[$i][$UPDATER_UIM])), FILTER_SANITIZE_STRING);
					$NOTE_QR_ODP = filter_var(html_escape(trim($allDataInSheet[$i]['AB'])), FILTER_SANITIZE_STRING);
					$NOTE_QR_OUT_SPLITTER = filter_var(html_escape(trim($allDataInSheet[$i]['AC'])), FILTER_SANITIZE_STRING);
					$NOTE_QR_DROPCORE = filter_var(html_escape(trim($allDataInSheet[$i]['AD'])), FILTER_SANITIZE_STRING);
					$UPDATER_DAVA = filter_var(html_escape(trim($allDataInSheet[$i][$UPDATER_DAVA])), FILTER_SANITIZE_STRING);

					// $TANGGAL_PELURUSAN = filter_var(html_escape(trim($allDataInSheet[$i]['A'])), FILTER_SANITIZE_STRING);
					// $ONDESK = filter_var(html_escape(trim($allDataInSheet[$i]['B'])), FILTER_SANITIZE_STRING);
					// $ONSITE = filter_var(html_escape(trim($allDataInSheet[$i]['C'])), FILTER_SANITIZE_STRING);
					// $NAMA_ODP = filter_var(html_escape(trim($allDataInSheet[$i]['D'])), FILTER_SANITIZE_STRING);
					// $NOTE_ODP = filter_var(html_escape(trim($allDataInSheet[$i]['E'])), FILTER_SANITIZE_STRING);
					// $QR_ODP = filter_var(html_escape(trim($allDataInSheet[$i]['F'])), FILTER_SANITIZE_STRING);
					// $KOORDINAT_ODP  = filter_var(html_escape(trim($allDataInSheet[$i]['G'])), FILTER_SANITIZE_STRING);
					// $NAMA_OLT = filter_var(html_escape(trim($allDataInSheet[$i]['H'])), FILTER_SANITIZE_STRING);
					// $PORT_OLT = filter_var(html_escape(trim($allDataInSheet[$i]['I'])), FILTER_SANITIZE_STRING);
					// $TOTAL_IN_ODP = filter_var(html_escape(trim($allDataInSheet[$i]['J'])), FILTER_SANITIZE_STRING);
					// $KAPASITAS = filter_var(html_escape(trim($allDataInSheet[$i]['K'])), FILTER_SANITIZE_STRING);
					// $PORT_OUT_SPLITTER = filter_var(html_escape(trim($allDataInSheet[$i]['L'])), FILTER_SANITIZE_STRING);
					// $QR_OUT_SPLITTER = filter_var(html_escape(trim($allDataInSheet[$i]['M'])), FILTER_SANITIZE_STRING);
					// $PORT_ODP = filter_var(html_escape(trim($allDataInSheet[$i]['N'])), FILTER_SANITIZE_STRING);
					// $STATUS = filter_var(html_escape(trim($allDataInSheet[$i]['O'])), FILTER_SANITIZE_STRING);
					// $ONU = filter_var(html_escape(trim($allDataInSheet[$i]['P'])), FILTER_SANITIZE_STRING);
					// $SN = filter_var(html_escape(trim($allDataInSheet[$i]['Q'])), FILTER_SANITIZE_STRING);
					// $SERVICE = filter_var(html_escape(trim($allDataInSheet[$i]['R'])), FILTER_SANITIZE_STRING);
					// $QR_DROPCORE = filter_var(html_escape(trim($allDataInSheet[$i]['S'])), FILTER_SANITIZE_STRING);
					// $NOTE_URUT_DROPCORE = filter_var(html_escape(trim($allDataInSheet[$i]['T'])), FILTER_SANITIZE_STRING);
					// $FLAG_OLT_PORT = filter_var(html_escape(trim($allDataInSheet[$i]['U'])), FILTER_SANITIZE_STRING);
					// $CONNECTIVITY_ODP_TO_OLT = filter_var(html_escape(trim($allDataInSheet[$i]['V'])), FILTER_SANITIZE_STRING);
					// $ODP_ONT = filter_var(html_escape(trim($allDataInSheet[$i]['W'])), FILTER_SANITIZE_STRING);
					// $RFS = filter_var(html_escape(trim($allDataInSheet[$i]['X'])), FILTER_SANITIZE_STRING);
					// $NOTE_HD_DAMAN = filter_var(html_escape(trim($allDataInSheet[$i]['Y'])), FILTER_SANITIZE_STRING);
					// $TANGGAL_UPDATE_UIM = filter_var(html_escape(trim($allDataInSheet[$i]['Z'])), FILTER_SANITIZE_STRING);
					// $UPDATER_UIM = filter_var(html_escape(trim($allDataInSheet[$i]['AA'])), FILTER_SANITIZE_STRING);
					// $NOTE_QR_ODP = filter_var(html_escape(trim($allDataInSheet[$i]['AB'])), FILTER_SANITIZE_STRING);
					// $NOTE_QR_OUT_SPLITTER = filter_var(html_escape(trim($allDataInSheet[$i]['AC'])), FILTER_SANITIZE_STRING);
					// $NOTE_QR_DROPCORE = filter_var(html_escape(trim($allDataInSheet[$i]['AD'])), FILTER_SANITIZE_STRING);
					// $UPDATER_DAVA = filter_var(html_escape(trim($allDataInSheet[$i]['AE'])), FILTER_SANITIZE_STRING);

					$newDateA = date("Y-m-d", strtotime($TANGGAL_PELURUSAN));
					if ($TANGGAL_UPDATE_UIM != "" or $TANGGAL_UPDATE_UIM != null) {
						$newDateB = date("Y-m-d", strtotime($TANGGAL_UPDATE_UIM));
					} else {
						$newDateB = "";
					}

					$ODP = explode("/",$NAMA_ODP);
					$temp = strlen($ODP[1]);
					$kode ="";
					if($temp ==1){
						$kode.= "00".$ODP[1];
					}
					if($temp ==2){
						$kode.= "0".$ODP[1];
					}
					if($temp ==3){
						$kode = $ODP[1];
					}

					$NAMA_ODP = $ODP[0]."/".$kode;
					

					$fetchData[] = array('tanggalPelurusan' => $newDateA, 'ondesk' => $ONDESK, 'onsite' => $ONSITE, 'namaODP' => $NAMA_ODP, 'noteODP' => $NOTE_ODP, 'QRODP' => $QR_ODP, 'koordinatODP' => $KOORDINAT_ODP, 'hostname' => $NAMA_OLT, 'portOLT' => $PORT_OLT, 'totalIN' => $TOTAL_IN_ODP, 'kapasitasODP' => $KAPASITAS, 'portOutSplitter' => $PORT_OUT_SPLITTER, 'QRPortOutSplitter' => $QR_OUT_SPLITTER, 'portODP' => $PORT_ODP, 'statusPortODP' => $STATUS, 'ONU' => $ONU, 'serialNumber' => $SN, 'serviceNumber' => $SERVICE, 'QRDropCore' => $QR_DROPCORE, 'noteUrut' => $NOTE_URUT_DROPCORE, 'flagOLTPort' => $FLAG_OLT_PORT, 'ODPtoOLT' => $CONNECTIVITY_ODP_TO_OLT, 'ODPtoONT' => $ODP_ONT, 'RFS' => $RFS, 'noteHDDaman' => $NOTE_HD_DAMAN, 'updateDateUIM' => $newDateB, 'updaterUIM' => $UPDATER_UIM, 'noteQRODP' => $NOTE_QR_ODP, 'noteQROutSplitter' => $NOTE_QR_OUT_SPLITTER, 'noteQRDropCore' => $NOTE_QR_DROPCORE, 'updaterDava' => $UPDATER_DAVA);
				}


				
				$this->Validasi_model->setBatchImportValidasi($fetchData);
				$this->Validasi_model->importDataValidasi();

				

				redirect('Ondesk/viewListValidasi');
			} else {

				$this->session->set_flashdata('danger', 'Format tidak sesuai, harap download format yang ditentukan');
			}
			redirect('Ondesk/viewListValidasi');
		}
	}


	public function listHDDaman()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->Pegawai_model->getDataHDDaman($searchTerm)->result();
		echo json_encode($response);
	}

	public function listDava()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->Pegawai_model->getDataDava($searchTerm)->result();
		echo json_encode($response);
	}

	public function listNamaODP()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->ODP_model->getNamaODP($searchTerm)->result();
		echo json_encode($response);
	}

	public function listNamaOLT()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->OLT_model->getNamaOLT($searchTerm)->result();
		echo json_encode($response);
	}

	public function addValidasi()
	{
		$ondesk = $this->Pegawai_model->getDataPegawai($this->session->userdata['idPegawai'])->row();
		$onsite = $this->Pegawai_model->getDataPegawaiStatus("Onsite")->result();
		$hostname = $this->OLT_model->getNamaOLT()->result();



		$data['ondesk'] = json_encode($ondesk);
		$data['onsite'] = json_encode($onsite);
		$data['hostname'] = json_encode($hostname);


		$this->form_validation->set_rules('tanggalPelurusan', 'Tanggal Pelurusan', 'required|trim');
		$this->form_validation->set_rules('ondesk', 'Ondesk', 'required|trim');
		$this->form_validation->set_rules('onsite[]', 'Onsite ', 'required|trim');
		$this->form_validation->set_rules('namaODP', 'Nama ODP', 'required|max_length[40]|trim');
		$this->form_validation->set_rules('noteODP', 'Note ODP', 'max_length[100]|trim');
		$this->form_validation->set_rules('QRODP', 'QR ODP', 'max_length[16]|trim');
		$this->form_validation->set_rules('koordinatODP', 'Koordinat ODP', 'max_length[35]|trim');
		$this->form_validation->set_rules('noteQRODP', 'QR ODP', 'max_length[100]|trim');
		$this->form_validation->set_rules('totalIN', 'Total IN', 'numeric|max_length[2]||trim');
		$this->form_validation->set_rules('kapasitasODP', 'Kapasitas', 'required|numeric|max_length[16]|trim');


		$this->form_validation->set_rules('namaOLT', 'Nama OLT', 'required|max_length[16]|trim');
		$this->form_validation->set_rules('portOLT', 'Port OLT', 'max_length[12]|trim');


		// $this->form_validation->set_rules('portOutSplitter', 'Port Out Splitter', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('QROutSplitter[]', 'QR Out Splitter', 'required|trim');
		// $this->form_validation->set_rules('portODP', 'PORT', 'trim');
		// $this->form_validation->set_rules('statusportODP', 'QR ODP', 'required|max_length[20]|trim');
		// // $this->form_validation->set_rules('status', 'STATUS', 'max_length[50]required|trim');
		// $this->form_validation->set_rules('ONU', 'ONU', 'max_length[15]|trim');
		// $this->form_validation->set_rules('serialNumber', 'SN', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('serviceNumber', 'SERVICE', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('QRDropCore', 'QR DROPCORE', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('noteDropcore', 'NOTE URUT DROPCORE', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('flagOLTPort', 'FLAG OLT & PORT', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('ODPtoOLT', 'CONNECTIVITY ODP TO OLT', 'trim');
		// $this->form_validation->set_rules('ODPtoONT', 'ODP - ONT', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('RFS', 'RFS', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('noteHDDaman', 'NOTE', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('updateDataUIM', 'TANGGAL UPDATE UIM', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('updaterUIM', 'UPDATER UIM', 'required|max_length[20]|trim');

		// $this->form_validation->set_rules('noteQROutSplitter', 'QR OUT SPLITTER', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('noteQRDropCore', 'QR DROPCORE', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('updaterDava', 'UPDATER DAVA', 'required|max_length[20]|trim');


		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('numeric', '%s berisi angka');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {

			$this->template->load('template/template_Ondesk', 'validasi/Validasi_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);

			$this->Validasi_model->addDataValidasi($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil ditambahkan');
			}
			redirect('Ondesk/viewListValidasi');
		}
	}

	// public function listValidasi(){
	// 	$searchTerm = $this->input->post('searchTerm');
	// 	$response = $this->Validasi_model->getNamaValidasi($searchTerm)->result();
	// 	echo json_encode($response);
	// }

	

	public function editValidasi($id)
	{
		
		// $this->form_validation->set_rules('tanggalPelurusan', 'Tanggal Pelurusan', 'required|trim');
		// $this->form_validation->set_rules('ondesk', 'Ondesk', 'required|trim');
		// $this->form_validation->set_rules('onsite[]', 'Onsite ', 'required|trim');
		// $this->form_validation->set_rules('namaODP', 'Nama ODP', 'required|max_length[40]|trim');
		$this->form_validation->set_rules('noteODP', 'Note ODP', 'max_length[100]|trim');
		$this->form_validation->set_rules('QRODP', 'QR ODP', 'max_length[16]|trim');
		$this->form_validation->set_rules('koordinatODP', 'Koordinat ODP', 'max_length[35]|trim');
		$this->form_validation->set_rules('noteQRODP', 'QR ODP', 'max_length[100]|trim');
		$this->form_validation->set_rules('totalIN', 'Total IN', 'numeric|max_length[2]||trim');
		$this->form_validation->set_rules('kapasitasODP', 'Kapasitas', 'required|numeric|max_length[16]|trim');


		// $this->form_validation->set_rules('namaOLT', 'Nama OLT', 'required|max_length[16]|trim');
		$this->form_validation->set_rules('portOLT', 'Port OLT', 'max_length[12]|trim');

		// $this->form_validation->set_rules('portOutSplitter', 'PORT OUT SPLITTER', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('QROutSplitter', 'QR OUT SPLITTER', 'required|trim');
		// $this->form_validation->set_rules('portODP', 'PORT', 'trim');
		// $this->form_validation->set_rules('statusportODP', 'QR ODP', 'required|max_length[20]|trim');
		// // $this->form_validation->set_rules('status', 'STATUS', 'max_length[50]required|trim');
		// $this->form_validation->set_rules('ONU', 'ONU', 'max_length[15]|trim');
		// $this->form_validation->set_rules('serialNumber', 'SN', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('serviceNumber', 'SERVICE', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('QRDropCore', 'QR DROPCORE', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('noteDropcore', 'NOTE URUT DROPCORE', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('flagOLTPort', 'FLAG OLT & PORT', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('ODPtoOLT', 'CONNECTIVITY ODP TO OLT', 'trim');
		// $this->form_validation->set_rules('ODPtoONT', 'ODP - ONT', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('RFS', 'RFS', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('noteHDDaman', 'NOTE', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('updateDataUIM', 'TANGGAL UPDATE UIM', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('updaterUIM', 'UPDATER UIM', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('noteQRODP', 'QR ODP', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('noteQROutSplitter', 'QR OUT SPLITTER', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('noteQRDropCore', 'QR DROPCORE', 'required|max_length[20]|trim');
		// $this->form_validation->set_rules('updaterDava', 'UPDATER DAVA', 'required|max_length[20]|trim');

		// $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		// $this->form_validation->set_message('min_length', '%s minimal %s karakter');
		// $this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		// $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->Validasi_model->getDataValidasiByID($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query;
				$this->template->load('template/template_Ondesk', 'validasi/validasi_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Ondesk/viewListValidasi');
			}
		} else {
			$post = $this->input->post(null, TRUE);

			$this->Validasi_model->editDataValidasi($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil ditambahkan');
			}
			redirect('Ondesk/viewListValidasi');
		}
	}

	public function deleteAllValidasi()
	{
		// $this->exportValidasi();
		$this->Validasi_model->deleteAllDataValidasi('rekap_data_validasi');

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Semua data berhasil dihapus');
		}
		redirect('Ondesk/viewListValidasi');
	}

	public function deleteValidasi($id)
	{
		$this->Validasi_model->deleteDataValidasi($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('Ondesk/viewListValidasi');
	}

	public function exportValidasi()
	{


		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		$Excel_writer = new Xlsx($spreadsheet);

		foreach (range('A1', 'T1') as $test) {
			$spreadsheet->getActiveSheet()->getColumnDimension($test)->setAutoSize(true);
		}

		$spreadsheet->setActiveSheetIndex(0);
		$activeSheet = $spreadsheet->getActiveSheet();
		$activeSheet->setCellValue('A1', '');
		$activeSheet->setCellValue('A2', 'TANGGAL PELURUSAN');
		$activeSheet->setCellValue('A3', '');
		$activeSheet->mergeCells('B1:C1');
		$activeSheet->setCellValue('B1', 'AMIJA');
		$activeSheet->setCellValue('B2', 'ONDESK');
		$activeSheet->setCellValue('C2', 'ONSITE');
		$activeSheet->setCellValue('B3', 'nama ondesk');
		$activeSheet->setCellValue('C3', 'nama tim(teknisi1-teknisi2)');
		$activeSheet->setCellValue('D1', 'ODP');
		$activeSheet->setCellValue('E1', '');
		$activeSheet->setCellValue('F1', '');
		$activeSheet->setCellValue('G1', '');
		$activeSheet->setCellValue('G2', 'KOORDINAT ODP');
		$activeSheet->setCellValue('G3', 'latitude, longitude');
		$activeSheet->setCellValue('D2', 'NAMA ODP');
		$activeSheet->setCellValue('D3', 'ODP3digit');
		$activeSheet->setCellValue('E2', 'NOTE');
		$activeSheet->setCellValue('E3', 'sumber data,note kendala,beda nama dilapangan');
		$activeSheet->setCellValue('F2', 'QR ODP');
		$activeSheet->setCellValue('F3', '');
		$activeSheet->setCellValue('H1', 'OLT');
		$activeSheet->setCellValue('H2', 'NAMA OLT (IP OLT)');
		$activeSheet->setCellValue('H3', 'nama OLT (IP OLT)');
		$activeSheet->setCellValue('I1', '');
		$activeSheet->setCellValue('I2', 'PORT OLT');
		$activeSheet->setCellValue('I3', 'PORT OLT');
		$activeSheet->mergeCells('J1:K1');
		$activeSheet->setCellValue('J1', 'ODP');
		$activeSheet->setCellValue('J2', 'TOTAL IN ODP');
		$activeSheet->setCellValue('J3', 'jumlah IN');
		$activeSheet->setCellValue('K2', 'KAPASITAS ODP');
		$activeSheet->setCellValue('K3', 'kapasitas ODP');
		$activeSheet->mergeCells('L1:M1');
		$activeSheet->setCellValue('L1', 'PORT OUT SPLITTER');
		$activeSheet->setCellValue('L2', 'PORT OUT SPLITTER');
		$activeSheet->setCellValue('L3', 'ODP');
		$activeSheet->setCellValue('M2', 'QR OUT SPLITTER');
		$activeSheet->setCellValue('M3', 'QR utk port outsplitter');
		$activeSheet->setCellValue('N1', '');
		$activeSheet->setCellValue('N2', 'PORT');
		$activeSheet->setCellValue('N3', 'isi Port ODP');
		$activeSheet->setCellValue('O1', '');
		$activeSheet->setCellValue('O2', 'STATUS');
		$activeSheet->setCellValue('O3', 'ISI/NO DETECT/IDLE/KOSONG');
		$activeSheet->setCellValue('P1', '');
		$activeSheet->setCellValue('P2', 'ONU');
		$activeSheet->setCellValue('P3', 'ONU OLT');
		$activeSheet->setCellValue('Q1', '');
		$activeSheet->setCellValue('Q2', 'SN');
		$activeSheet->setCellValue('Q3', 'SN ONT yg terdeteksi');
		$activeSheet->setCellValue('R1', '');
		$activeSheet->setCellValue('R2', 'SERVICE');
		$activeSheet->setCellValue('R3', 'SERVICE NUMBER');
		$activeSheet->setCellValue('S1', '');
		$activeSheet->setCellValue('S2', 'QR DROPCORE');
		$activeSheet->setCellValue('S3', 'QR yg menempel pada cable ties dropcore');
		$activeSheet->setCellValue('T1', '');
		$activeSheet->setCellValue('T2', 'NO URUT DROPCORE');
		$activeSheet->setCellValue('T3', 'hasil urut dropcore');
		$activeSheet->setCellValue('U1', 'DASHBOARD FF');
		$activeSheet->setCellValue('U2', 'FLAG OLT & PORT');
		$activeSheet->setCellValue('U3', 'dicek oleh ondesk pelurusan');
		$activeSheet->setCellValue('V1', 'UIM (SDI)');
		$activeSheet->setCellValue('V2', 'CONNECTIVITY ODP TO OLT');
		$activeSheet->setCellValue('V3', 'dikerjakan apabila ODP ke OLT belum lurus (lihat kolom sebelah kiri)');
		$activeSheet->mergeCells('W1:AA1');
		$activeSheet->setCellValue('W1', 'UIM NON CONNECTIVITY (HD DAMAN)');
		$activeSheet->setCellValue('W2', 'ODP - ONT');
		$activeSheet->setCellValue('W3', 'data ODP: koordinat, okupansi, fttx dropcable ke ONT');
		$activeSheet->setCellValue('X2', 'RFS');
		$activeSheet->setCellValue('X3', 'STP+port,SP+port, service trail, CPE+target,vlan');
		$activeSheet->setCellValue('Y2', 'NOTE');
		$activeSheet->setCellValue('Y3', 'diisi jika ada catatan khusus/anomali');
		$activeSheet->setCellValue('Z2', 'TANGGAL UPDATE UIM');
		$activeSheet->setCellValue('Z3', 'diisi tanggal ketika HD Daman mengupdate ke UIM');
		$activeSheet->setCellValue('AA2', 'UPDATER UIM');
		$activeSheet->setCellValue('AA3', 'nama HD daman yg mengerjakan');
		$activeSheet->mergeCells('AB1:AE1');
		$activeSheet->setCellValue('AB1', 'UPDATER DAVA');
		$activeSheet->setCellValue('AB2', 'QR ODP');
		$activeSheet->setCellValue('AB3', 'inputkan QR ODP (menu resource capture)');
		$activeSheet->setCellValue('AC2', 'QR OUT SPLITTER');
		$activeSheet->setCellValue('AC3', 'inputkan QR out splitter (menu resource capture > capture > capacity > masuk ke port nya)');
		$activeSheet->setCellValue('AD2', 'QR DROPCORE');
		$activeSheet->setCellValue('AD3', 'inputkan QR dropcore (menu service capture > masuk ke nomer service-nya)');
		$activeSheet->setCellValue('AE2', 'UPDATER DAVA');
		$activeSheet->setCellValue('AE3', 'nama yang melakukan input ketiga jenis QR di 3 kolom sebelah kiri');
		$activeSheet->setCellValue('AF1', '');
		$activeSheet->setCellValue('AF2', '');
		$activeSheet->setCellValue('AF3', '');


		// $query = $db->query("SELECT * FROM rekap_data_odp ORDER BY idODP DESC");
		$query = $this->Validasi_model->getDataValidasi()->result();
		$i = 4;
		foreach ($query as $row) {
			$newDateA = date("d/m/Y", strtotime($row->tanggalPelurusan));
			$activeSheet->setCellValue('A' . $i, $newDateA);
			$activeSheet->setCellValue('B' . $i, $row->ondesk);
			$activeSheet->setCellValue('C' . $i, $row->onsite);
			$activeSheet->setCellValue('D' . $i, $row->namaODP);
			$activeSheet->setCellValue('E' . $i, $row->noteODP);
			$activeSheet->setCellValue('F' . $i, $row->QRODP);
			$activeSheet->setCellValue('G' . $i, $row->koordinatODP);
			$activeSheet->setCellValue('H' . $i, $row->hostname);
			$activeSheet->setCellValue('I' . $i, $row->portOLT);
			$activeSheet->setCellValue('J' . $i, $row->totalIN);
			$activeSheet->setCellValue('K' . $i, $row->kapasitasODP);
			$activeSheet->setCellValue('L' . $i, $row->portOutSplitter);
			$activeSheet->setCellValue('M' . $i, $row->QRPortOutSplitter);
			$activeSheet->setCellValue('N' . $i, $row->portODP);
			$activeSheet->setCellValue('O' . $i, $row->statusPortODP);
			$activeSheet->setCellValue('P' . $i, $row->ONU);
			$activeSheet->setCellValue('Q' . $i, $row->serialNumber);
			$activeSheet->setCellValue('R' . $i, $row->serviceNumber);
			$activeSheet->setCellValue('S' . $i, $row->QRDropCore);
			$activeSheet->setCellValue('T' . $i, $row->noteUrut);
			$activeSheet->setCellValue('U' . $i, $row->flagOLTPort);
			$activeSheet->setCellValue('V' . $i, $row->ODPtoOLT);
			$activeSheet->setCellValue('W' . $i, $row->ODPtoONT);
			$activeSheet->setCellValue('X' . $i, $row->RFS);
			$activeSheet->setCellValue('Y' . $i, $row->noteHDDaman);
			$newDateB = date("d/m/Y", strtotime($row->updateDateUIM));
			$activeSheet->setCellValue('Z' . $i, $newDateB);
			$activeSheet->setCellValue('AA' . $i, $row->updaterUIM);
			$activeSheet->setCellValue('AB' . $i, $row->noteQRODP);
			$activeSheet->setCellValue('AC' . $i, $row->noteQROutSplitter);
			$activeSheet->setCellValue('AD' . $i, $row->noteQRDropCore);
			$activeSheet->setCellValue('AE' . $i, $row->updaterDava);
			$i++;
		}

		$filename = 'RekapValidasi.xlsx';


		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename);
		header('Cache-Control: max-age=0');
		$Excel_writer->save('php://output');
	}

	public function filterDate()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
		$input = $this->input->post(null, TRUE);
		$start_date = $input["start_date"];
		$end_date = $input["end_date"];
		// print_r($start_date);
		// print_r($end_date);

		$sql_total = $this->Validasi_model->count_all(); // Panggil fungsi count_all pada SiswaModel
		$sql_data = $this->Validasi_model->filterDate($search, $limit, $start, $order_field, $order_ascdesc, $start_date, $end_date); // Panggil fungsi filter pada SiswaModel
		$sql_filter = $this->Validasi_model->count_filterDate($search, $start_date, $end_date); // Panggil fungsi count_filter pada SiswaModel
		// print_r($search);
		// print_r($sql_filter);
		$callback3 = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);


		header('Content-Type: application/json');
		echo json_encode($callback3); // Convert array $callback ke json
	}
	//End Kelola Validasi

}

/* End of file Ondesk.php */
/* Location: ./application/controllers/Ondesk.php */
