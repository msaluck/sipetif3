<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Garuda_documents extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Garuda_documents_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'garuda_documents_data' => $this->Garuda_documents_model->get_all(),
        );
        $this->template->load('layout/master','garuda_documents/garuda_documents_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Garuda_documents_model->get_by_id($id);
        if ($row) {
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
            $this->template->load('layout/master','garuda_documents/garuda_documents_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('garuda_documents'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('garuda_documents/create_action'),
			'id' => set_value('id'),
			'author_order' => set_value('author_order'),
			'accreditation' => set_value('accreditation'),
			'title' => set_value('title'),
			'abstract' => set_value('abstract'),
			'publisher_name' => set_value('publisher_name'),
			'publish_date' => set_value('publish_date'),
			'publish_year' => set_value('publish_year'),
			'doi' => set_value('doi'),
			'citation' => set_value('citation'),
			'source' => set_value('source'),
			'source_issue' => set_value('source_issue'),
			'source_page' => set_value('source_page'),
			'url' => set_value('url'),
			'authors_id' => set_value('authors_id'),
		);
        $this->template->load('layout/master','garuda_documents/garuda_documents_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'author_order' => $this->input->post('author_order',TRUE),
				'accreditation' => $this->input->post('accreditation',TRUE),
				'title' => $this->input->post('title',TRUE),
				'abstract' => $this->input->post('abstract',TRUE),
				'publisher_name' => $this->input->post('publisher_name',TRUE),
				'publish_date' => $this->input->post('publish_date',TRUE),
				'publish_year' => $this->input->post('publish_year',TRUE),
				'doi' => $this->input->post('doi',TRUE),
				'citation' => $this->input->post('citation',TRUE),
				'source' => $this->input->post('source',TRUE),
				'source_issue' => $this->input->post('source_issue',TRUE),
				'source_page' => $this->input->post('source_page',TRUE),
				'url' => $this->input->post('url',TRUE),
				'authors_id' => $this->input->post('authors_id',TRUE),
			);

            $this->Garuda_documents_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('garuda_documents'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Garuda_documents_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('garuda_documents/update_action'),
				'id' => set_value('id', $row->id),
				'author_order' => set_value('author_order', $row->author_order),
				'accreditation' => set_value('accreditation', $row->accreditation),
				'title' => set_value('title', $row->title),
				'abstract' => set_value('abstract', $row->abstract),
				'publisher_name' => set_value('publisher_name', $row->publisher_name),
				'publish_date' => set_value('publish_date', $row->publish_date),
				'publish_year' => set_value('publish_year', $row->publish_year),
				'doi' => set_value('doi', $row->doi),
				'citation' => set_value('citation', $row->citation),
				'source' => set_value('source', $row->source),
				'source_issue' => set_value('source_issue', $row->source_issue),
				'source_page' => set_value('source_page', $row->source_page),
				'url' => set_value('url', $row->url),
				'authors_id' => set_value('authors_id', $row->authors_id),
			);
            $this->template->load('layout/master','garuda_documents/garuda_documents_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('garuda_documents'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'author_order' => $this->input->post('author_order',TRUE),
				'accreditation' => $this->input->post('accreditation',TRUE),
				'title' => $this->input->post('title',TRUE),
				'abstract' => $this->input->post('abstract',TRUE),
				'publisher_name' => $this->input->post('publisher_name',TRUE),
				'publish_date' => $this->input->post('publish_date',TRUE),
				'publish_year' => $this->input->post('publish_year',TRUE),
				'doi' => $this->input->post('doi',TRUE),
				'citation' => $this->input->post('citation',TRUE),
				'source' => $this->input->post('source',TRUE),
				'source_issue' => $this->input->post('source_issue',TRUE),
				'source_page' => $this->input->post('source_page',TRUE),
				'url' => $this->input->post('url',TRUE),
				'authors_id' => $this->input->post('authors_id',TRUE),
			);

            $this->Garuda_documents_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('garuda_documents'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Garuda_documents_model->get_by_id($id);

        if ($row) {
            $this->Garuda_documents_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('garuda_documents'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('garuda_documents'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('author_order', 'author order', 'trim|required');
		$this->form_validation->set_rules('accreditation', 'accreditation', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('abstract', 'abstract', 'trim|required');
		$this->form_validation->set_rules('publisher_name', 'publisher name', 'trim|required');
		$this->form_validation->set_rules('publish_date', 'publish date', 'trim|required');
		$this->form_validation->set_rules('publish_year', 'publish year', 'trim|required');
		$this->form_validation->set_rules('doi', 'doi', 'trim|required');
		$this->form_validation->set_rules('citation', 'citation', 'trim|required');
		$this->form_validation->set_rules('source', 'source', 'trim|required');
		$this->form_validation->set_rules('source_issue', 'source issue', 'trim|required');
		$this->form_validation->set_rules('source_page', 'source page', 'trim|required');
		$this->form_validation->set_rules('url', 'url', 'trim|required');
		$this->form_validation->set_rules('authors_id', 'authors id', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Garuda_documents.php */
/* Location: ./application/controllers/Garuda_documents.php */
/* Created at 2024-01-03 08:04:43 */
/* Please DO NOT modify this information : */