<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authors extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Authors_model');
		$this->load->library('form_validation');
		$this->db2 = $this->load->database('sinelitabmas', TRUE);
	}

	public function index()
	{
		$data = array(
			'authors_data' => $this->Authors_model->get_all(),
		);
		$this->template->load('layout/master', 'authors/authors_list', $data);
	}

	public function read($id)
	{
		$row = $this->Authors_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id' => $row->id,
				'nidn' => $row->nidn,
				'fullname' => $row->fullname,
				'country' => $row->country,
				'academic_grade_raw' => $row->academic_grade_raw,
				'academic_grade' => $row->academic_grade,
				'gelar_depan' => $row->gelar_depan,
				'gelar_belakang' => $row->gelar_belakang,
				'last_education' => $row->last_education,
				'sinta_score_v2_overall' => $row->sinta_score_v2_overall,
				'sinta_score_v2_3year' => $row->sinta_score_v2_3year,
				'sinta_score_v3_overall' => $row->sinta_score_v3_overall,
				'sinta_score_v3_3year' => $row->sinta_score_v3_3year,
				'affiliation_score_v3_overall' => $row->affiliation_score_v3_overall,
				'affiliation_score_v3_3year' => $row->affiliation_score_v3_3year,
				'affiliation_id' => $row->affiliation_id,
				'waktu_update' => $row->waktu_update,
				'waktu_update_wos' => $row->waktu_update_wos,
				'waktu_update_garuda' => $row->waktu_update_garuda,
				'waktu_update_google' => $row->waktu_update_google,
				'waktu_update_ipr' => $row->waktu_update_ipr,
				'waktu_update_book' => $row->waktu_update_book,
				'waktu_update_research' => $row->waktu_update_research,
				'waktu_update_service' => $row->waktu_update_service,
				'waktu_update_profile' => $row->waktu_update_profile,
				'keterangan_cek_profile' => $row->keterangan_cek_profile,
			);
			$this->template->load('layout/master', 'authors/authors_read', $data);
		} else {
			$this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
			redirect(site_url('authors'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Tambah',
			'action' => site_url('authors/create_action'),
			'id' => set_value('id'),
			'nidn' => set_value('nidn'),
			'fullname' => set_value('fullname'),
			'country' => set_value('country'),
			'academic_grade_raw' => set_value('academic_grade_raw'),
			'academic_grade' => set_value('academic_grade'),
			'gelar_depan' => set_value('gelar_depan'),
			'gelar_belakang' => set_value('gelar_belakang'),
			'last_education' => set_value('last_education'),
			'sinta_score_v2_overall' => set_value('sinta_score_v2_overall'),
			'sinta_score_v2_3year' => set_value('sinta_score_v2_3year'),
			'sinta_score_v3_overall' => set_value('sinta_score_v3_overall'),
			'sinta_score_v3_3year' => set_value('sinta_score_v3_3year'),
			'affiliation_score_v3_overall' => set_value('affiliation_score_v3_overall'),
			'affiliation_score_v3_3year' => set_value('affiliation_score_v3_3year'),
			'affiliation_id' => set_value('affiliation_id'),
			'waktu_update' => set_value('waktu_update'),
			'waktu_update_wos' => set_value('waktu_update_wos'),
			'waktu_update_garuda' => set_value('waktu_update_garuda'),
			'waktu_update_google' => set_value('waktu_update_google'),
			'waktu_update_ipr' => set_value('waktu_update_ipr'),
			'waktu_update_book' => set_value('waktu_update_book'),
			'waktu_update_research' => set_value('waktu_update_research'),
			'waktu_update_service' => set_value('waktu_update_service'),
			'waktu_update_profile' => set_value('waktu_update_profile'),
			'keterangan_cek_profile' => set_value('keterangan_cek_profile'),
		);
		$this->template->load('layout/master', 'authors/authors_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nidn' => $this->input->post('nidn', TRUE),
				'fullname' => $this->input->post('fullname', TRUE),
				'country' => $this->input->post('country', TRUE),
				'academic_grade_raw' => $this->input->post('academic_grade_raw', TRUE),
				'academic_grade' => $this->input->post('academic_grade', TRUE),
				'gelar_depan' => $this->input->post('gelar_depan', TRUE),
				'gelar_belakang' => $this->input->post('gelar_belakang', TRUE),
				'last_education' => $this->input->post('last_education', TRUE),
				'sinta_score_v2_overall' => $this->input->post('sinta_score_v2_overall', TRUE),
				'sinta_score_v2_3year' => $this->input->post('sinta_score_v2_3year', TRUE),
				'sinta_score_v3_overall' => $this->input->post('sinta_score_v3_overall', TRUE),
				'sinta_score_v3_3year' => $this->input->post('sinta_score_v3_3year', TRUE),
				'affiliation_score_v3_overall' => $this->input->post('affiliation_score_v3_overall', TRUE),
				'affiliation_score_v3_3year' => $this->input->post('affiliation_score_v3_3year', TRUE),
				'affiliation_id' => $this->input->post('affiliation_id', TRUE),
				'waktu_update' => $this->input->post('waktu_update', TRUE),
				'waktu_update_wos' => $this->input->post('waktu_update_wos', TRUE),
				'waktu_update_garuda' => $this->input->post('waktu_update_garuda', TRUE),
				'waktu_update_google' => $this->input->post('waktu_update_google', TRUE),
				'waktu_update_ipr' => $this->input->post('waktu_update_ipr', TRUE),
				'waktu_update_book' => $this->input->post('waktu_update_book', TRUE),
				'waktu_update_research' => $this->input->post('waktu_update_research', TRUE),
				'waktu_update_service' => $this->input->post('waktu_update_service', TRUE),
				'waktu_update_profile' => $this->input->post('waktu_update_profile', TRUE),
				'keterangan_cek_profile' => $this->input->post('keterangan_cek_profile', TRUE),
			);

			$this->Authors_model->insert($data);
			$this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
			redirect(site_url('authors'));
		}
	}

	public function update($id)
	{
		$row = $this->Authors_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Ubah',
				'action' => site_url('authors/update_action'),
				'id' => set_value('id', $row->id),
				'nidn' => set_value('nidn', $row->nidn),
				'fullname' => set_value('fullname', $row->fullname),
				'country' => set_value('country', $row->country),
				'academic_grade_raw' => set_value('academic_grade_raw', $row->academic_grade_raw),
				'academic_grade' => set_value('academic_grade', $row->academic_grade),
				'gelar_depan' => set_value('gelar_depan', $row->gelar_depan),
				'gelar_belakang' => set_value('gelar_belakang', $row->gelar_belakang),
				'last_education' => set_value('last_education', $row->last_education),
				'sinta_score_v2_overall' => set_value('sinta_score_v2_overall', $row->sinta_score_v2_overall),
				'sinta_score_v2_3year' => set_value('sinta_score_v2_3year', $row->sinta_score_v2_3year),
				'sinta_score_v3_overall' => set_value('sinta_score_v3_overall', $row->sinta_score_v3_overall),
				'sinta_score_v3_3year' => set_value('sinta_score_v3_3year', $row->sinta_score_v3_3year),
				'affiliation_score_v3_overall' => set_value('affiliation_score_v3_overall', $row->affiliation_score_v3_overall),
				'affiliation_score_v3_3year' => set_value('affiliation_score_v3_3year', $row->affiliation_score_v3_3year),
				'affiliation_id' => set_value('affiliation_id', $row->affiliation_id),
				'waktu_update' => set_value('waktu_update', $row->waktu_update),
				'waktu_update_wos' => set_value('waktu_update_wos', $row->waktu_update_wos),
				'waktu_update_garuda' => set_value('waktu_update_garuda', $row->waktu_update_garuda),
				'waktu_update_google' => set_value('waktu_update_google', $row->waktu_update_google),
				'waktu_update_ipr' => set_value('waktu_update_ipr', $row->waktu_update_ipr),
				'waktu_update_book' => set_value('waktu_update_book', $row->waktu_update_book),
				'waktu_update_research' => set_value('waktu_update_research', $row->waktu_update_research),
				'waktu_update_service' => set_value('waktu_update_service', $row->waktu_update_service),
				'waktu_update_profile' => set_value('waktu_update_profile', $row->waktu_update_profile),
				'keterangan_cek_profile' => set_value('keterangan_cek_profile', $row->keterangan_cek_profile),
			);
			$this->template->load('layout/master', 'authors/authors_form', $data);
		} else {
			$this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
			redirect(site_url('authors'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id', TRUE));
		} else {
			$data = array(
				'nidn' => $this->input->post('nidn', TRUE),
				'fullname' => $this->input->post('fullname', TRUE),
				'country' => $this->input->post('country', TRUE),
				'academic_grade_raw' => $this->input->post('academic_grade_raw', TRUE),
				'academic_grade' => $this->input->post('academic_grade', TRUE),
				'gelar_depan' => $this->input->post('gelar_depan', TRUE),
				'gelar_belakang' => $this->input->post('gelar_belakang', TRUE),
				'last_education' => $this->input->post('last_education', TRUE),
				'sinta_score_v2_overall' => $this->input->post('sinta_score_v2_overall', TRUE),
				'sinta_score_v2_3year' => $this->input->post('sinta_score_v2_3year', TRUE),
				'sinta_score_v3_overall' => $this->input->post('sinta_score_v3_overall', TRUE),
				'sinta_score_v3_3year' => $this->input->post('sinta_score_v3_3year', TRUE),
				'affiliation_score_v3_overall' => $this->input->post('affiliation_score_v3_overall', TRUE),
				'affiliation_score_v3_3year' => $this->input->post('affiliation_score_v3_3year', TRUE),
				'affiliation_id' => $this->input->post('affiliation_id', TRUE),
				'waktu_update' => $this->input->post('waktu_update', TRUE),
				'waktu_update_wos' => $this->input->post('waktu_update_wos', TRUE),
				'waktu_update_garuda' => $this->input->post('waktu_update_garuda', TRUE),
				'waktu_update_google' => $this->input->post('waktu_update_google', TRUE),
				'waktu_update_ipr' => $this->input->post('waktu_update_ipr', TRUE),
				'waktu_update_book' => $this->input->post('waktu_update_book', TRUE),
				'waktu_update_research' => $this->input->post('waktu_update_research', TRUE),
				'waktu_update_service' => $this->input->post('waktu_update_service', TRUE),
				'waktu_update_profile' => $this->input->post('waktu_update_profile', TRUE),
				'keterangan_cek_profile' => $this->input->post('keterangan_cek_profile', TRUE),
			);

			$this->Authors_model->update($this->input->post('id', TRUE), $data);
			$this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
			redirect(site_url('authors'));
		}
	}

	public function delete($id)
	{
		$row = $this->Authors_model->get_by_id($id);

		if ($row) {
			$this->Authors_model->delete($id);
			$this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
			redirect(site_url('authors'));
		} else {
			$this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
			redirect(site_url('authors'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nidn', 'nidn', 'trim|required');
		$this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
		$this->form_validation->set_rules('country', 'country', 'trim|required');
		$this->form_validation->set_rules('academic_grade_raw', 'academic grade raw', 'trim|required');
		$this->form_validation->set_rules('academic_grade', 'academic grade', 'trim|required');
		$this->form_validation->set_rules('gelar_depan', 'gelar depan', 'trim|required');
		$this->form_validation->set_rules('gelar_belakang', 'gelar belakang', 'trim|required');
		$this->form_validation->set_rules('last_education', 'last education', 'trim|required');
		$this->form_validation->set_rules('sinta_score_v2_overall', 'sinta score v2 overall', 'trim|required|numeric');
		$this->form_validation->set_rules('sinta_score_v2_3year', 'sinta score v2 3year', 'trim|required|numeric');
		$this->form_validation->set_rules('sinta_score_v3_overall', 'sinta score v3 overall', 'trim|required|numeric');
		$this->form_validation->set_rules('sinta_score_v3_3year', 'sinta score v3 3year', 'trim|required|numeric');
		$this->form_validation->set_rules('affiliation_score_v3_overall', 'affiliation score v3 overall', 'trim|required|numeric');
		$this->form_validation->set_rules('affiliation_score_v3_3year', 'affiliation score v3 3year', 'trim|required|numeric');
		$this->form_validation->set_rules('affiliation_id', 'affiliation id', 'trim|required');
		$this->form_validation->set_rules('waktu_update', 'waktu update', 'trim|required');
		$this->form_validation->set_rules('waktu_update_wos', 'waktu update wos', 'trim|required');
		$this->form_validation->set_rules('waktu_update_garuda', 'waktu update garuda', 'trim|required');
		$this->form_validation->set_rules('waktu_update_google', 'waktu update google', 'trim|required');
		$this->form_validation->set_rules('waktu_update_ipr', 'waktu update ipr', 'trim|required');
		$this->form_validation->set_rules('waktu_update_book', 'waktu update book', 'trim|required');
		$this->form_validation->set_rules('waktu_update_research', 'waktu update research', 'trim|required');
		$this->form_validation->set_rules('waktu_update_service', 'waktu update service', 'trim|required');
		$this->form_validation->set_rules('waktu_update_profile', 'waktu update profile', 'trim|required');
		$this->form_validation->set_rules('keterangan_cek_profile', 'keterangan cek profile', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function synchronize()
	{
		$authors = $this->db2->query("select * from sinta.authors")->result();
		if ($authors) {
			$this->Authors_model->truncate();
			foreach ($authors as $author) {
				$data = array(
					'id' => $author->id,
					'nidn' => $author->NIDN,
					'fullname' => $author->fullname,
					'country' => $author->country,
					'academic_grade_raw' => $author->academic_grade_raw,
					'academic_grade' => $author->academic_grade,
					'gelar_depan' => $author->gelar_depan,
					'gelar_belakang' => $author->gelar_belakang,
					'last_education' => $author->last_education,
					'sinta_score_v2_overall' => $author->sinta_score_v2_overall,
					'sinta_score_v2_3year' => $author->sinta_score_v2_3year,
					'sinta_score_v3_overall' => $author->sinta_score_v3_overall,
					'sinta_score_v3_3year' => $author->sinta_score_v3_3year,
					'affiliation_score_v3_overall' => $author->affiliation_score_v3_overall,
					'affiliation_score_v3_3year' => $author->affiliation_score_v3_3year,
					'affiliation_id' => $author->affiliation_id,
					'waktu_update' => $author->waktu_update,
					'waktu_update_wos' => $author->waktu_update_wos,
					'waktu_update_garuda' => $author->waktu_update_garuda,
					'waktu_update_google' => $author->waktu_update_google,
					'waktu_update_ipr' => $author->waktu_update_ipr,
					'waktu_update_book' => $author->waktu_update_book,
					'waktu_update_research' => $author->waktu_update_research,
					'waktu_update_service' => $author->waktu_update_service,
					'waktu_update_profile' => $author->waktu_update_profile,
					'keterangan_cek_profile' => $author->keterangan_cek_profile,
				);
				$this->Authors_model->insert($data);
			}
			$this->session->set_flashdata('toastr-success', 'Sinkronisasi Berhasil');
			redirect(site_url('authors'));
		} else {
			$this->session->set_flashdata('toastr-error', 'Sinkronisasi Gagal');
			redirect(site_url('authors'));
		}
	}
}

/* End of file Authors.php */
/* Location: ./application/controllers/Authors.php */
/* Created at 2023-12-31 18:49:18 */
/* Please DO NOT modify this information : */