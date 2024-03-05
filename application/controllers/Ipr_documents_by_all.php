<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ipr_documents_by_all extends CI_Controller
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
		$data = array(
			'ipr_documents_data' => $this->Ipr_documents_model->get_all()
		);
		$this->template->load('layout/master', 'ipr_documents/ipr_documents_by_all_list', $data);
	}

	public function sync()
	{
		$ipr_documents = $this->db2->get('sinta.google_documents')->result();
		if ($ipr_documents) {
			$this->Ipr_documents_model->truncate();
			foreach ($ipr_documents as $row) {
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
				$this->Ipr_documents_model->insert($data);
				$this->session->set_flashdata('toastr-success', 'Sinkronisasi Berhasil');
			}
			redirect(site_url('ipr_documents_by_all'));
		} else {
			$this->session->set_flashdata('toastr-error', 'Sinkronisasi Gagal');
		}
	}
}

/* End of file Ipr_documents.php */
/* Location: ./application/controllers/Ipr_documents.php */
/* Created at 2024-01-03 03:12:30 */
/* Please DO NOT modify this information : */