<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_documents extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Google_documents_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'google_documents_data' => $this->Google_documents_model->get_all(),
        );
        $this->template->load('layout/master','google_documents/google_documents_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Google_documents_model->get_by_id($id);
        if ($row) {
            $data = array(
				'abstract' => $row->abstract,
				'authors' => $row->authors,
				'authors_id' => $row->authors_id,
				'citation' => $row->citation,
				'id' => $row->id,
				'idsubmission' => $row->idsubmission,
				'journal_name' => $row->journal_name,
				'publish_year' => $row->publish_year,
				'title' => $row->title,
				'url' => $row->url,
			);
            $this->template->load('layout/master','google_documents/google_documents_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('google_documents'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('google_documents/create_action'),
			'abstract' => set_value('abstract'),
			'authors' => set_value('authors'),
			'authors_id' => set_value('authors_id'),
			'citation' => set_value('citation'),
			'id' => set_value('id'),
			'idsubmission' => set_value('idsubmission'),
			'journal_name' => set_value('journal_name'),
			'publish_year' => set_value('publish_year'),
			'title' => set_value('title'),
			'url' => set_value('url'),
		);
        $this->template->load('layout/master','google_documents/google_documents_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'abstract' => $this->input->post('abstract',TRUE),
				'authors' => $this->input->post('authors',TRUE),
				'authors_id' => $this->input->post('authors_id',TRUE),
				'citation' => $this->input->post('citation',TRUE),
				'idsubmission' => $this->input->post('idsubmission',TRUE),
				'journal_name' => $this->input->post('journal_name',TRUE),
				'publish_year' => $this->input->post('publish_year',TRUE),
				'title' => $this->input->post('title',TRUE),
				'url' => $this->input->post('url',TRUE),
			);

            $this->Google_documents_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('google_documents'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Google_documents_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('google_documents/update_action'),
				'abstract' => set_value('abstract', $row->abstract),
				'authors' => set_value('authors', $row->authors),
				'authors_id' => set_value('authors_id', $row->authors_id),
				'citation' => set_value('citation', $row->citation),
				'id' => set_value('id', $row->id),
				'idsubmission' => set_value('idsubmission', $row->idsubmission),
				'journal_name' => set_value('journal_name', $row->journal_name),
				'publish_year' => set_value('publish_year', $row->publish_year),
				'title' => set_value('title', $row->title),
				'url' => set_value('url', $row->url),
			);
            $this->template->load('layout/master','google_documents/google_documents_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('google_documents'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'abstract' => $this->input->post('abstract',TRUE),
				'authors' => $this->input->post('authors',TRUE),
				'authors_id' => $this->input->post('authors_id',TRUE),
				'citation' => $this->input->post('citation',TRUE),
				'idsubmission' => $this->input->post('idsubmission',TRUE),
				'journal_name' => $this->input->post('journal_name',TRUE),
				'publish_year' => $this->input->post('publish_year',TRUE),
				'title' => $this->input->post('title',TRUE),
				'url' => $this->input->post('url',TRUE),
			);

            $this->Google_documents_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('google_documents'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Google_documents_model->get_by_id($id);

        if ($row) {
            $this->Google_documents_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('google_documents'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('google_documents'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('abstract', 'abstract', 'trim|required');
		$this->form_validation->set_rules('authors', 'authors', 'trim|required');
		$this->form_validation->set_rules('authors_id', 'authors id', 'trim|required');
		$this->form_validation->set_rules('citation', 'citation', 'trim|required');
		$this->form_validation->set_rules('idsubmission', 'idsubmission', 'trim|required');
		$this->form_validation->set_rules('journal_name', 'journal name', 'trim|required');
		$this->form_validation->set_rules('publish_year', 'publish year', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('url', 'url', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Google_documents.php */
/* Location: ./application/controllers/Google_documents.php */
/* Created at 2024-01-03 03:12:37 */
/* Please DO NOT modify this information : */