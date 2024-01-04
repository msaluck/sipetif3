<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scopus_documents extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Scopus_documents_model');
		$this->load->library('form_validation');
		$this->db2 = $this->load->database('sinelitabmas', TRUE);
	}

	public function index()
	{
		$this->sync_scopus();
		$id_user = $this->session->id_user;
		$get_user = $this->db->get_where('users', ['id' => $id_user])->row();
		$get_data = $this->db->get_where('scopus_documents',['authors_id'=>$get_user->idauthors])->result();
		$data = array(
			'scopus_documents_data' => $get_data,
		);
		$this->template->load('layout/master', 'scopus_documents/scopus_documents_list', $data);
	}


	private function sync_scopus()
	{
		$id_user = $this->session->id_user;
		$get_user = $this->db->get_where('users', ['id' => $id_user])->row();
		$cek_data = $this->db2->get_where('sinta.scopus_documents', ['authors_id' => $get_user->idauthors])->result();
		foreach ($cek_data as $value) {
			$jml_data = $this->db->query("select id from scopus_documents where id='$value->id'")->num_rows();
			if ($jml_data == 0) {
				$insert = $this->db->insert('scopus_documents', $value);
			}
		}
	}

	public function read($id)
	{
		$row = $this->Scopus_documents_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id' => $row->id,
				'quartile' => $row->quartile,
				'title' => $row->title,
				'publication_name' => $row->publication_name,
				'creator' => $row->creator,
				'page' => $row->PAGE,
				'issn' => $row->issn,
				'volume' => $row->volume,
				'cover_date' => $row->cover_date,
				'cover_display_date' => $row->cover_display_date,
				'doi' => $row->doi,
				'citedby_count' => $row->citedby_count,
				'aggregation_type' => $row->aggregation_type,
				'url' => $row->url,
				'authors_id' => $row->authors_id,
			);
			$this->template->load('layout/master', 'scopus_documents/scopus_documents_read', $data);
		} else {
			$this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
			redirect(site_url('scopus_documents'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Tambah',
			'action' => site_url('scopus_documents/create_action'),
			'id' => set_value('id'),
			'quartile' => set_value('quartile'),
			'title' => set_value('title'),
			'publication_name' => set_value('publication_name'),
			'creator' => set_value('creator'),
			'PAGE' => set_value('PAGE'),
			'issn' => set_value('issn'),
			'volume' => set_value('volume'),
			'cover_date' => set_value('cover_date'),
			'cover_display_date' => set_value('cover_display_date'),
			'doi' => set_value('doi'),
			'citedby_count' => set_value('citedby_count'),
			'aggregation_type' => set_value('aggregation_type'),
			'url' => set_value('url'),
			'authors_id' => set_value('authors_id'),
		);
		$this->template->load('layout/master', 'scopus_documents/scopus_documents_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'id' => $this->input->post('id', TRUE),
				'quartile' => $this->input->post('quartile', TRUE),
				'title' => $this->input->post('title', TRUE),
				'publication_name' => $this->input->post('publication_name', TRUE),
				'creator' => $this->input->post('creator', TRUE),
				'PAGE' => $this->input->post('PAGE', TRUE),
				'issn' => $this->input->post('issn', TRUE),
				'volume' => $this->input->post('volume', TRUE),
				'cover_date' => $this->input->post('cover_date', TRUE),
				'cover_display_date' => $this->input->post('cover_display_date', TRUE),
				'doi' => $this->input->post('doi', TRUE),
				'citedby_count' => $this->input->post('citedby_count', TRUE),
				'aggregation_type' => $this->input->post('aggregation_type', TRUE),
				'url' => $this->input->post('url', TRUE),
				'authors_id' => $this->input->post('authors_id', TRUE),
			);

			$this->Scopus_documents_model->insert($data);
			$this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
			redirect(site_url('scopus_documents'));
		}
	}

	public function update($id)
	{
		$row = $this->Scopus_documents_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Ubah',
				'action' => site_url('scopus_documents/update_action'),
				'id' => set_value('id', $row->id),
				'quartile' => set_value('quartile', $row->quartile),
				'title' => set_value('title', $row->title),
				'publication_name' => set_value('publication_name', $row->publication_name),
				'creator' => set_value('creator', $row->creator),
				'PAGE' => set_value('PAGE', $row->PAGE),
				'issn' => set_value('issn', $row->issn),
				'volume' => set_value('volume', $row->volume),
				'cover_date' => set_value('cover_date', $row->cover_date),
				'cover_display_date' => set_value('cover_display_date', $row->cover_display_date),
				'doi' => set_value('doi', $row->doi),
				'citedby_count' => set_value('citedby_count', $row->citedby_count),
				'aggregation_type' => set_value('aggregation_type', $row->aggregation_type),
				'url' => set_value('url', $row->url),
				'authors_id' => set_value('authors_id', $row->authors_id),
			);
			$this->template->load('layout/master', 'scopus_documents/scopus_documents_form', $data);
		} else {
			$this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
			redirect(site_url('scopus_documents'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('', TRUE));
		} else {
			$data = array(
				'id' => $this->input->post('id', TRUE),
				'quartile' => $this->input->post('quartile', TRUE),
				'title' => $this->input->post('title', TRUE),
				'publication_name' => $this->input->post('publication_name', TRUE),
				'creator' => $this->input->post('creator', TRUE),
				'PAGE' => $this->input->post('PAGE', TRUE),
				'issn' => $this->input->post('issn', TRUE),
				'volume' => $this->input->post('volume', TRUE),
				'cover_date' => $this->input->post('cover_date', TRUE),
				'cover_display_date' => $this->input->post('cover_display_date', TRUE),
				'doi' => $this->input->post('doi', TRUE),
				'citedby_count' => $this->input->post('citedby_count', TRUE),
				'aggregation_type' => $this->input->post('aggregation_type', TRUE),
				'url' => $this->input->post('url', TRUE),
				'authors_id' => $this->input->post('authors_id', TRUE),
			);

			$this->Scopus_documents_model->update($this->input->post('', TRUE), $data);
			$this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
			redirect(site_url('scopus_documents'));
		}
	}

	public function delete($id)
	{
		$row = $this->Scopus_documents_model->get_by_id($id);

		if ($row) {
			$this->Scopus_documents_model->delete($id);
			$this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
			redirect(site_url('scopus_documents'));
		} else {
			$this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
			redirect(site_url('scopus_documents'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		$this->form_validation->set_rules('quartile', 'quartile', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('publication_name', 'publication name', 'trim|required');
		$this->form_validation->set_rules('creator', 'creator', 'trim|required');
		$this->form_validation->set_rules('PAGE', 'page', 'trim|required');
		$this->form_validation->set_rules('issn', 'issn', 'trim|required');
		$this->form_validation->set_rules('volume', 'volume', 'trim|required');
		$this->form_validation->set_rules('cover_date', 'cover date', 'trim|required');
		$this->form_validation->set_rules('cover_display_date', 'cover display date', 'trim|required');
		$this->form_validation->set_rules('doi', 'doi', 'trim|required');
		$this->form_validation->set_rules('citedby_count', 'citedby count', 'trim|required');
		$this->form_validation->set_rules('aggregation_type', 'aggregation type', 'trim|required');
		$this->form_validation->set_rules('url', 'url', 'trim|required');
		$this->form_validation->set_rules('authors_id', 'authors id', 'trim|required');

		$this->form_validation->set_rules('', '', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function synchronize()
	{
		$scopus_documents = $this->db2->query("select * from sinta.scopus_documents")->result();
		if ($scopus_documents) {
			$this->Scopus_documents_model->truncate();
			foreach ($scopus_documents as $row) {
				$data = array(
					'id' => $row->id,
					'quartile' => $row->quartile,
					'title' => $row->title,
					'publication_name' => $row->publication_name,
					'creator' => $row->creator,
					'PAGE' => $row->PAGE,
					'issn' => $row->issn,
					'volume' => $row->volume,
					'cover_date' => $row->cover_date,
					'cover_display_date' => $row->cover_display_date,
					'doi' => $row->doi,
					'citedby_count' => $row->citedby_count,
					'aggregation_type' => $row->aggregation_type,
					'url' => $row->url,
					'authors_id' => $row->authors_id,
				);
				$this->Scopus_documents_model->insert($data);
			}
			$this->session->set_flashdata('toastr-success', 'Sinkronisasi Berhasil');
			redirect(site_url('scopus_documents'));
		}
	}
}

/* End of file Scopus_documents.php */
/* Location: ./application/controllers/Scopus_documents.php */
/* Created at 2024-01-01 19:38:39 */
/* Please DO NOT modify this information : */