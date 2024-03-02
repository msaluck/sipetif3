<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scopus_documents_by_all extends CI_Controller
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
		$get_data = $this->db->get_where('scopus_documents')->result();
		$data = array(
			'scopus_documents_data' => $get_data
		);
		$this->template->load('layout/master', 'scopus_documents/scopus_documents_by_all_list', $data);
	}

	public function sync()
	{
		$scopus_documents = $this->db2->get('sinta.scopus_documents')->result();
		if ($scopus_documents) {
			$this->Scopus_documents_model->truncate();
			foreach ($scopus_documents as $row) {
				$data = array(
					'id' => $row->id,
					'quartile' => $row->quartile,
					'title' => $row->title,
					'publication_name' => $row->publication_name,
					'creator' => $row->creator,
					'PAGE' => $row->page,
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
				$this->session->set_flashdata('toastr-success', 'Sinkronisasi Berhasil');
			}
			redirect(site_url('scopus_documents_by_all'));
		} else {
			$this->session->set_flashdata('toastr-error', 'Sinkronisasi Gagal');
		}
	}
}

/* End of file Scopus_documents.php */
/* Location: ./application/controllers/Scopus_documents.php */
/* Created at 2024-01-01 19:38:39 */
/* Please DO NOT modify this information : */