<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Admin
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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		//check admin buat fungsi_helper
		check_admin();
		$this->load->model('ODP_model');
		$this->load->model('OLT_model');
		$this->load->model('Pegawai_model');
		$this->load->model('Regional_model');
		$this->load->model('STO_model');
		$this->load->model('Datel_model');
		$this->load->model('Witel_model');
		$this->load->model('SpecOLT_model');
		$this->load->model("Import_ODP_model");
		$this->load->library('form_validation');
		$this->load->library("PHPExcel");
	}

	// Halaman Awal Admin
	public function index()
	{
		check_not_login();
		$this->template->load('template/template_Admin', 'dashboard_home');
	}

	// Start Menu Pegawai 
	public function getPegawai()
	{
		$data['row'] = $this->Pegawai_model->getDataPegawai();
		$this->template->load('template/template_Admin', 'pegawai/pegawai_data', $data);
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
			$this->template->load('template/template_Admin', 'pegawai/pegawai_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Pegawai_model->addDataPegawai($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getPegawai');
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
				$this->template->load('template/template_Admin', 'pegawai/pegawai_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Admin/getPegawai');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Pegawai_model->editDataPegawai($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getPegawai');
		}
	}

	public function detailPegawai($id)
	{
		$detailPegawai = $this->Pegawai_model->detailDataPegawai($id);
		$data['detailPegawai'] = $detailPegawai;
		$this->template->load('template/template_Admin', 'pegawai/pegawai_form_detail', $data);
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
		redirect('Admin/getPegawai');
	}
	// End Menu Pegawai

	// Start Menu Regional
	public function getRegional()
	{
		$data['row'] = $this->Regional_model->getDataRegional();
		$this->template->load('template/template_Admin', 'regional/regional_data', $data);
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
			$this->template->load('template/template_Admin', 'regional/regional_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Regional_model->addDataRegional($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getRegional');
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
				$this->template->load('template/template_Admin', 'regional/regional_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Admin/getRegional');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Regional_model->editDataRegional($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getRegional');
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
		redirect('Admin/getRegional');
	}
	// End Menu Regional

	// Start Menu Witel 
	public function getWitel()
	{
		$data['row'] = $this->Witel_model->getDataWitel();
		$this->template->load('template/template_Admin', 'witel/witel_data', $data);
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
			$this->template->load('template/template_Admin', 'witel/witel_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Witel_model->addDataWitel($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getWitel');
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
				$this->template->load('template/template_Admin', 'witel/witel_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Admin/getWitel');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Witel_model->editDataWitel($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getWitel');
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
		redirect('Admin/getWitel');
	}
	// End Menu Witel

	// Start Menu Datel
	public function getDatel()
	{
		$data['row'] = $this->Datel_model->getDataDatel();
		$this->template->load('template/template_Admin', 'datel/datel_data', $data);
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
			$this->template->load('template/template_Admin', 'datel/datel_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Datel_model->addDataDatel($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getDatel');
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
				$this->template->load('template/template_Admin', 'datel/datel_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Admin/getDatel');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Datel_model->editDataDatel($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getDatel');
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
		redirect('Admin/getDatel');
	}
	// End Menu Datel

	// Start Menu STO
	public function getSTO()
	{
		$data['row'] = $this->STO_model->getDataSTO();
		$this->template->load('template/template_Admin', 'sto/sto_data', $data);
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
			$this->template->load('template/template_Admin', 'sto/sto_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->STO_model->addDataSTO($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');;
			}
			redirect('Admin/getSTO');
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
				$this->template->load('template/template_Admin', 'sto/sto_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Admin/getSTO');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->STO_model->editDataSTO($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getSTO');
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
		redirect('Admin/getSTO');
	}
	// End Menu STO

	// Start Menu Specification OLT 
	public function getSpecOLT()
	{
		$data['row'] = $this->SpecOLT_model->getDataSpecOLT();
		$this->template->load('template/template_Admin', 'specolt/specolt_data', $data);
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
			$this->template->load('template/template_Admin', 'specolt/specolt_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->SpecOLT_model->addDataSpecOLT($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getSpecOLT');
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
				$this->template->load('template/template_Admin', 'specolt/specolt_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Admin/getSpecOLT');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->SpecOLT_model->editDataSpecOLT($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getSpecOLT');
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
		redirect('Admin/getSpecOLT');
	}
	//End Spek OLT

	// START ODP
	public function getODP()
	{
		$data['row'] = $this->ODP_model->getDataODP();
		$this->template->load('template/template_Admin', 'odp/odp_data', $data);
	}

	public function uploadODP()
	{
		$this->template->load('template/template_Admin', 'odp/odp_form_import');
	}

	//Fungsi file upload
	public function importODP() {
        $data = array();
         // Load form validation library
        
         $this->form_validation->set_rules('fileURL', 'Upload File ODP', 'callback_checkFileValidation');
			// If file uploaded
			
            if(!empty($_FILES['fileURL']['name'])) { 
				
                // get file extension
                $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);
 
                if($extension == 'csv'){
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }
                // file path
                $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            
                // array Count
				$arrayCount = count($allDataInSheet);
				$sample =$spreadsheet->getActiveSheet();
				print_r($sample->getHighesRow());

                $flag = 0;
                $createArray = array('NIS', 'Nama_Siswa', 'Kelas', 'Biaya_SPP');
                $makeArray = array('NIS' => 'NIS', 'Nama_Siswa' => 'Nama_Siswa', 'Kelas' => 'Kelas', 'Biaya_SPP' => 'Biaya_SPP');
                $SheetDataKey = array();
                foreach ($allDataInSheet as $dataInSheet) {
                    foreach ($dataInSheet as $key => $value) {
                        if (in_array(trim($value), $createArray)) {
                            $value = preg_replace('/\s+/', '', $value);
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
                        $addresses = array();
                        $NIS = $SheetDataKey['NIS'];
                        $nama_siswa = $SheetDataKey['Nama_Siswa'];
                        $kelas = $SheetDataKey['Kelas'];
                        $biaya_spp = $SheetDataKey['Biaya_SPP'];
                        
                        $NIS = filter_var(trim($allDataInSheet[$i][$NIS]), FILTER_SANITIZE_STRING);
                        $nama_siswa = filter_var(trim($allDataInSheet[$i][$nama_siswa]), FILTER_SANITIZE_STRING);
                        $kelas = filter_var(trim($allDataInSheet[$i][$kelas]), FILTER_SANITIZE_EMAIL);
                        $biaya_spp = filter_var(trim($allDataInSheet[$i][$biaya_spp]), FILTER_SANITIZE_STRING);
                        $fetchData[] = array('NIS' => $NIS, 'nama_siswa' => $nama_siswa, 'kelas' => $kelas, 'biaya_spp' => $biaya_spp);
                    }
                    $data['data_siswa'] = $fetchData;
                    $this->siswa_model->setBatchImport($fetchData);
                    $this->siswa_model->importData();
                } else {
                    echo "Please import correct file, did not match excel sheet column";
                }
                $this->load->view('Admin/getODP', $data);
            }            
        
    }
	

	public function checkFileValidation($string) {
		$file_mimes = array('text/x-comma-separated-values', 
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
		if(isset($_FILES['fileURL']['name'])) {
			  $arr_file = explode('.', $_FILES['fileURL']['name']);
			  $extension = end($arr_file);
			  if(($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)){
				  return true;
			  }else{
				  $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
				  return false;
			  }
		  }else{
			  $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
			  return false;
		  }
	  }
	// function import()
	// {
	// 	if (isset($_FILES["file"]["name"])) {
	// 		$path = $_FILES["file"]["tmp_name"];
	// 		$object = PHPExcel_IOFactory::load($path);
	// 		foreach ($object->getWorksheetIterator() as $worksheet) {
	// 			$highestRow = $worksheet->getHighestRow();
	// 			$highestColumn = $worksheet->getHighestColumn();
	// 			for ($row = 2; $row <= $highestRow; $row++) {
	// 				$idNOSS = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
	// 				$indexODP = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
	// 				$idODP = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
	// 				$ftp = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
	// 				$latitude = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
	// 				$longitude = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
	// 				$clusterName = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
	// 				$clusterStatus = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
	// 				$avai = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
	// 				$used = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
	// 				$rsv = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
	// 				$rsk = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
	// 				$total = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
	// 				$idSTO = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
	// 				$infoODP = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
	// 				$updateDate = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
	// 				$data[] = array(
	// 					'idNOSS'            =>  $idNOSS,
	// 					'indexODP'          =>  $indexODP,
	// 					'idODP'             =>  $idODP,
	// 					'ftp'               =>  $ftp,
	// 					'latitude'          =>  $latitude,
	// 					'longitude'         =>  $longitude,
	// 					'clusterName'       =>  $clusterName,
	// 					'clusterStatus'     =>  $clusterStatus,
	// 					'avai'              =>  $avai,
	// 					'used'              =>  $used,
	// 					'rsv'               =>  $rsv,
	// 					'rsk'               =>  $rsk,
	// 					'total'             =>  $total,
	// 					'idSTO'             =>  $idSTO,
	// 					'infoODP'           =>  $infoODP,
	// 					'updateDate'        =>  $updateDate
	// 				);
	// 			}
	// 		}
	// 		$this->excel_import_model->insert($data);
	// 		echo 'Data Imported successfully';
	// 	}
	// }

	public function addODP()
	{
		$data['row'] = $this->STO_model->getDataSTO();
		$this->form_validation->set_rules('idNOSS', 'ID NOSS', 'required|is_unique[rekap_data_odp.idNOSS]|max_length[16]|trim');
		$this->form_validation->set_rules('indexODP', 'Index ODP', 'required|is_unique[rekap_data_odp.indexODP]|max_length[20]|trim');
		$this->form_validation->set_rules('namaODP', 'Nama ODP', 'required|is_unique[rekap_data_odp.namaODP]|max_length[20]|trim');
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
			$this->template->load('template/template_Admin', 'odp/odp_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->ODP_model->addDataODP($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getODP');
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
				$this->template->load('template/template_Admin', 'odp/odp_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Admin/getODP');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->ODP_model->editDataODP($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getODP');
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

	public function deleteODP()
	{
		$id = $this->input->post('idODP');
		$this->ODP_model->deleteDataODP($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('Admin/getODP');
	}

	public function exportODP($id)
    {
        $this->load->library('mypdf.php');
        $data['data_responden'] = $this->db->query("select * from data_responden where ID=$id")->result();
        $data['jawaban'] = $this->db->query("select * from jawaban where ID=$id")->result();
        $this->mypdf->generate_detail_responden('export_detail_responden', $data);
    }

	// END ODP

	// START OLT
	public function getOLT()
	{
		$data['row'] = $this->OLT_model->getDataOLT();
		$this->template->load('template/template_Admin', 'olt/olt_data', $data);
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
			$this->template->load('template/template_Admin', 'olt/olt_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->OLT_model->addDataOLT($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getOLT');
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
				$this->template->load('template/template_Admin', 'olt/olt_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Admin/getOLT');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->OLT_model->editDataOLT($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getOLT');
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
		redirect('Admin/getOLT');
	}


	// END OLT

	// Start Menu Kelola Validasi
	public function getKelValidasi()
	{
		$data['row'] = $this->KelValidasi_model->getDataKelValidasi();
		$this->template->load('template/template_Admin', 'kelvalidasi/kelvalidasi_data', $data);
	}

	public function addKelValidasi()
	{
		$this->form_validation->set_rules('namaKelValidasi', 'Nama Specification OLT', 'required|max_length[50]|is_unique[specification_olt.namaKelValidasi]|trim');
		$this->form_validation->set_rules('merekOLT', 'Merek OLT', 'max_length[20]|trim');
		$this->form_validation->set_rules('typeOLT', 'Type OLT', 'max_length[20]|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template/template_Admin', 'specolt/specolt_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->KelValidasi_model->addDataKelValidasi($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getKelValidasi');
		}
	}

	public function editKelValidasi($id)
	{
		$this->form_validation->set_rules('namaKelValidasi', 'Nama Specification OLT', 'required|max_length[50]|callback_spek_check|trim');
		$this->form_validation->set_rules('merekOLT', 'Merek OLT', 'max_length[20]|trim');
		$this->form_validation->set_rules('typeOLT', 'Type OLT', 'max_length[20]|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter');
		$this->form_validation->set_message('max_length', '%s maksimal %s karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->KelValidasi_model->getDataKelValidasi($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template/template_Admin', 'specolt/specolt_form_edit', $data);
			} else {
				$this->session->set_flashdata('danger', 'Data tidak ditemukan');
				redirect('Admin/getKelValidasi');
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->KelValidasi_model->editDataKelValidasi($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil disimpan');
			}
			redirect('Admin/getKelValidasi');
		}
	}

	// function spek_check()
	// {
	// 	$post = $this->input->post(null, TRUE);
	// 	$query = $this->db->query("SELECT * FROM specification_olt WHERE namaKelValidasi = '$post[namaKelValidasi]' AND idKelValidasi != '$post[idKelValidasi]'");
	// 	if ($query->num_rows() > 0) {
	// 		$this->form_validation->set_message('spek_check', '{field} ini sudah dipakai, silahkan ganti');
	// 		return FALSE;
	// 	} else {
	// 		return TRUE;
	// 	}
	// }

	public function deleteKelValidasi()
	{
		$id = $this->input->post('idKelValidasi');
		$this->KelValidasi_model->deleteDataKelValidasi($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('Admin/getKelValidasi');
	}
	//End Kelola Validasi

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
