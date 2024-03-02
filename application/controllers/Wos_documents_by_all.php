<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wos_documents_by_all extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Wos_documents_model');
		$this->load->library('form_validation');
		$this->db2 = $this->load->database('sinelitabmas', TRUE);
	}

	public function index()
	{
		$get_data = $this->db->get('wos_documents')->result();
		$data = array(
			'wos_documents_data' => $get_data
		);
		$this->template->load('layout/master', 'wos_documents/wos_documents_by_all_list', $data);
	}

	public function sync()
	{
		$wos_documents = $this->db2->get('sinta.wos_documents')->result();
		if ($wos_documents) {
			$this->Wos_documents_model->truncate();
			foreach ($wos_documents as $row) {
				$data = array(
					'id' => $row->id,
					'publons_id' => $row->publons_id,
					'wos_id' => $row->wos_id,
					'doi' => $row->doi,
					'title' => $row->title,
					'first_author' => $row->first_author,
					'last_author' => $row->last_author,
					'authors' => $row->authors,
					'publish_date' => $row->publish_date,
					'journal_name' => $row->journal_name,
					'citation' => $row->citation,
					'abstract' => $row->abstract,
					'publish_type' => $row->publish_type,
					'publish_year' => $row->publish_year,
					'page_begin' => $row->page_begin,
					'page_end' => $row->page_end,
					'issn' => $row->issn,
					'eissn' => $row->eissn,
					'url' => $row->url,
					'authors_id' => $row->authors_id,
				);
				$this->Wos_documents_model->insert($data);
				$this->session->set_flashdata('toastr-success', 'Sinkronisasi Berhasil');
			}
			redirect(site_url('wos_documents_by_all'));
		} else {
			$this->session->set_flashdata('toastr-error', 'Sinkronisasi Gagal');
		}
	}
}

/* End of file Wos_documents.php */
/* Location: ./application/controllers/Wos_documents.php */
/* Created at 2024-01-01 21:07:01 */
/* Please DO NOT modify this information : */