<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ipr_documents extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Ipr_documents_model');
		$this->load->library('form_validation');
		$this->db2 = $this->load->database('sinelitabmas', TRUE);
	}

	public function index()
	{
		$this->sync_ipr();
		$id_user = $this->session->id_user;
		$get_user = $this->db->get_where('users', ['id' => $id_user])->row();
		$get_data = $this->db->get_where('ipr_documents', ['authors_id' => $get_user->idauthors])->result();
		$data = array(
			'ipr_documents_data' => $get_data
		);
		$this->template->load('layout/master', 'ipr_documents/ipr_documents_list', $data);
	}

	private function sync_ipr()
	{
		$id_user = $this->session->id_user;
		$get_user = $this->db->get_where('users', ['id' => $id_user])->row();
		$cek_data = $this->db2->get_where('sinta.ipr_documents', ['authors_id' => $get_user->idauthors])->result();
		foreach ($cek_data as $value) {
			$jml_data = $this->db->query("select id from ipr_documents where id = '$value->id' ")->num_rows();
			if ($jml_data == 0) {
				$insert = $this->db->insert('ipr_documents', $value);
			}
		}
	}

	public function read($id)
	{
		$row = $this->Ipr_documents_model->get_by_id($id);
		if ($row) {
			$data = array(
				'authors_id' => $row->authors_id,
				'category' => $row->category,
				'filing_date' => $row->filing_date,
				'id' => $row->id,
				'inventor' => $row->inventor,
				'patent_holder' => $row->patent_holder,
				'publication_date' => $row->publication_date,
				'publication_number' => $row->publication_number,
				'reception_date' => $row->reception_date,
				'registration_date' => $row->registration_date,
				'registration_number' => $row->registration_number,
				'requests_number' => $row->requests_number,
				'requests_year' => $row->requests_year,
				'title' => $row->title,
			);
			$this->template->load('layout/master', 'ipr_documents/ipr_documents_read', $data);
		} else {
			$this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
			redirect(site_url('ipr_documents'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Tambah',
			'action' => site_url('ipr_documents/create_action'),
			'authors_id' => set_value('authors_id'),
			'category' => set_value('category'),
			'filing_date' => set_value('filing_date'),
			'id' => set_value('id'),
			'inventor' => set_value('inventor'),
			'patent_holder' => set_value('patent_holder'),
			'publication_date' => set_value('publication_date'),
			'publication_number' => set_value('publication_number'),
			'reception_date' => set_value('reception_date'),
			'registration_date' => set_value('registration_date'),
			'registration_number' => set_value('registration_number'),
			'requests_number' => set_value('requests_number'),
			'requests_year' => set_value('requests_year'),
			'title' => set_value('title'),
		);
		$this->template->load('layout/master', 'ipr_documents/ipr_documents_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'authors_id' => $this->input->post('authors_id', TRUE),
				'category' => $this->input->post('category', TRUE),
				'filing_date' => $this->input->post('filing_date', TRUE),
				'inventor' => $this->input->post('inventor', TRUE),
				'patent_holder' => $this->input->post('patent_holder', TRUE),
				'publication_date' => $this->input->post('publication_date', TRUE),
				'publication_number' => $this->input->post('publication_number', TRUE),
				'reception_date' => $this->input->post('reception_date', TRUE),
				'registration_date' => $this->input->post('registration_date', TRUE),
				'registration_number' => $this->input->post('registration_number', TRUE),
				'requests_number' => $this->input->post('requests_number', TRUE),
				'requests_year' => $this->input->post('requests_year', TRUE),
				'title' => $this->input->post('title', TRUE),
			);

			$this->Ipr_documents_model->insert($data);
			$this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
			redirect(site_url('ipr_documents'));
		}
	}

	public function update($id)
	{
		$row = $this->Ipr_documents_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Ubah',
				'action' => site_url('ipr_documents/update_action'),
				'authors_id' => set_value('authors_id', $row->authors_id),
				'category' => set_value('category', $row->category),
				'filing_date' => set_value('filing_date', $row->filing_date),
				'id' => set_value('id', $row->id),
				'inventor' => set_value('inventor', $row->inventor),
				'patent_holder' => set_value('patent_holder', $row->patent_holder),
				'publication_date' => set_value('publication_date', $row->publication_date),
				'publication_number' => set_value('publication_number', $row->publication_number),
				'reception_date' => set_value('reception_date', $row->reception_date),
				'registration_date' => set_value('registration_date', $row->registration_date),
				'registration_number' => set_value('registration_number', $row->registration_number),
				'requests_number' => set_value('requests_number', $row->requests_number),
				'requests_year' => set_value('requests_year', $row->requests_year),
				'title' => set_value('title', $row->title),
			);
			$this->template->load('layout/master', 'ipr_documents/ipr_documents_form', $data);
		} else {
			$this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
			redirect(site_url('ipr_documents'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id', TRUE));
		} else {
			$data = array(
				'authors_id' => $this->input->post('authors_id', TRUE),
				'category' => $this->input->post('category', TRUE),
				'filing_date' => $this->input->post('filing_date', TRUE),
				'inventor' => $this->input->post('inventor', TRUE),
				'patent_holder' => $this->input->post('patent_holder', TRUE),
				'publication_date' => $this->input->post('publication_date', TRUE),
				'publication_number' => $this->input->post('publication_number', TRUE),
				'reception_date' => $this->input->post('reception_date', TRUE),
				'registration_date' => $this->input->post('registration_date', TRUE),
				'registration_number' => $this->input->post('registration_number', TRUE),
				'requests_number' => $this->input->post('requests_number', TRUE),
				'requests_year' => $this->input->post('requests_year', TRUE),
				'title' => $this->input->post('title', TRUE),
			);

			$this->Ipr_documents_model->update($this->input->post('id', TRUE), $data);
			$this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
			redirect(site_url('ipr_documents'));
		}
	}

	public function delete($id)
	{
		$row = $this->Ipr_documents_model->get_by_id($id);

		if ($row) {
			$this->Ipr_documents_model->delete($id);
			$this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
			redirect(site_url('ipr_documents'));
		} else {
			$this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
			redirect(site_url('ipr_documents'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('authors_id', 'authors id', 'trim|required');
		$this->form_validation->set_rules('category', 'category', 'trim|required');
		$this->form_validation->set_rules('filing_date', 'filing date', 'trim|required');
		$this->form_validation->set_rules('inventor', 'inventor', 'trim|required');
		$this->form_validation->set_rules('patent_holder', 'patent holder', 'trim|required');
		$this->form_validation->set_rules('publication_date', 'publication date', 'trim|required');
		$this->form_validation->set_rules('publication_number', 'publication number', 'trim|required');
		$this->form_validation->set_rules('reception_date', 'reception date', 'trim|required');
		$this->form_validation->set_rules('registration_date', 'registration date', 'trim|required');
		$this->form_validation->set_rules('registration_number', 'registration number', 'trim|required');
		$this->form_validation->set_rules('requests_number', 'requests number', 'trim|required');
		$this->form_validation->set_rules('requests_year', 'requests year', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Ipr_documents.php */
/* Location: ./application/controllers/Ipr_documents.php */
/* Created at 2024-01-03 03:12:30 */
/* Please DO NOT modify this information : */