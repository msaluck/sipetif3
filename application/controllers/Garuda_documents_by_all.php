<?php
defined('BASEPATH') or exit('No direct script access allowed');

class garuda_documents_by_all extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Garuda_documents_model');
		$this->load->library('form_validation');
		$this->db2 = $this->load->database('sinelitabmas', TRUE);
	}

	public function index()
	{
		$data = array(
			'garuda_documents_data' => $this->Garuda_documents_model->get_all()
		);
		$this->template->load('layout/master', 'garuda_documents/garuda_documents_by_all_list', $data);
	}

	public function sync()
	{
		$garuda_documents = $this->db2->get('sinta.garuda_documents')->result();
		if ($garuda_documents) {
			$this->Garuda_documents_model->truncate();
			foreach ($garuda_documents as $row) {
				$data = array(
					'id' => $row->id,
					'author_order' => $row->author_order,
					'accreditation' => $row->accreditation,
					'title' => $row->title,
					'abstract' => $row->abstract,
					'publisher_name' => $row->publisher_name,
					'publish_date' => $row->publish_date,
					'publish_year' => $row->publish_year,
					'doi' => $row->doi,
					'citation' => $row->citation,
					'source' => $row->source,
					'source_issue' => $row->source_issue,
					'source_page' => $row->source_page,
					'url' => $row->url,
					'authors_id' => $row->authors_id,
				);
				$this->Garuda_documents_model->insert($data);
				$this->session->set_flashdata('toastr-success', 'Sinkronisasi Berhasil');
			}
			redirect(site_url('garuda_documents_by_all'));
		} else {
			$this->session->set_flashdata('toastr-error', 'Sinkronisasi Gagal');
		}
	}
}

/* End of file Garuda_documents.php */
/* Location: ./application/controllers/Garuda_documents.php */
/* Created at 2024-01-03 08:04:43 */
/* Please DO NOT modify this information : */