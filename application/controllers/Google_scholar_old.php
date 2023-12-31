<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_scholar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Google_scholar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'google_scholar_data' => $this->Google_scholar_model->get_all(),
        );
        $this->template->load('layout/master','google_scholar/google_scholar_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Google_scholar_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'user_id' => $row->user_id,
				'title' => $row->title,
				'abstract' => $row->abstract,
				'authors' => $row->authors,
				'journal_name' => $row->journal_name,
				'publish_year' => $row->publish_year,
				'citation' => $row->citation,
				'author' => $row->author,
				'file' => $row->file,
				'issn' => $row->issn,
				'url' => $row->url,
				'is_submitted' => $row->is_submitted,
			);
            $this->template->load('layout/master','google_scholar/google_scholar_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('google_scholar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('google_scholar/create_action'),
			'id' => set_value('id'),
			'user_id' => set_value('user_id'),
			'title' => set_value('title'),
			'abstract' => set_value('abstract'),
			'authors' => set_value('authors'),
			'journal_name' => set_value('journal_name'),
			'publish_year' => set_value('publish_year'),
			'citation' => set_value('citation'),
			'author' => set_value('author'),
			'file' => set_value('file'),
			'issn' => set_value('issn'),
			'url' => set_value('url'),
			'is_submitted' => set_value('is_submitted'),
		);
        $this->template->load('layout/master','google_scholar/google_scholar_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'user_id' => $this->input->post('user_id',TRUE),
				'title' => $this->input->post('title',TRUE),
				'abstract' => $this->input->post('abstract',TRUE),
				'authors' => $this->input->post('authors',TRUE),
				'journal_name' => $this->input->post('journal_name',TRUE),
				'publish_year' => $this->input->post('publish_year',TRUE),
				'citation' => $this->input->post('citation',TRUE),
				'author' => $this->input->post('author',TRUE),
				'file' => $this->input->post('file',TRUE),
				'issn' => $this->input->post('issn',TRUE),
				'url' => $this->input->post('url',TRUE),
				'is_submitted' => $this->input->post('is_submitted',TRUE),
			);

            $this->Google_scholar_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('google_scholar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Google_scholar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('google_scholar/update_action'),
				'id' => set_value('id', $row->id),
				'user_id' => set_value('user_id', $row->user_id),
				'title' => set_value('title', $row->title),
				'abstract' => set_value('abstract', $row->abstract),
				'authors' => set_value('authors', $row->authors),
				'journal_name' => set_value('journal_name', $row->journal_name),
				'publish_year' => set_value('publish_year', $row->publish_year),
				'citation' => set_value('citation', $row->citation),
				'author' => set_value('author', $row->author),
				'file' => set_value('file', $row->file),
				'issn' => set_value('issn', $row->issn),
				'url' => set_value('url', $row->url),
				'is_submitted' => set_value('is_submitted', $row->is_submitted),
			);
            $this->template->load('layout/master','google_scholar/google_scholar_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('google_scholar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'user_id' => $this->input->post('user_id',TRUE),
				'title' => $this->input->post('title',TRUE),
				'abstract' => $this->input->post('abstract',TRUE),
				'authors' => $this->input->post('authors',TRUE),
				'journal_name' => $this->input->post('journal_name',TRUE),
				'publish_year' => $this->input->post('publish_year',TRUE),
				'citation' => $this->input->post('citation',TRUE),
				'author' => $this->input->post('author',TRUE),
				'file' => $this->input->post('file',TRUE),
				'issn' => $this->input->post('issn',TRUE),
				'url' => $this->input->post('url',TRUE),
				'is_submitted' => $this->input->post('is_submitted',TRUE),
			);

            $this->Google_scholar_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('google_scholar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Google_scholar_model->get_by_id($id);

        if ($row) {
            $this->Google_scholar_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('google_scholar'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('google_scholar'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('abstract', 'abstract', 'trim|required');
		$this->form_validation->set_rules('authors', 'authors', 'trim|required');
		$this->form_validation->set_rules('journal_name', 'journal name', 'trim|required');
		$this->form_validation->set_rules('publish_year', 'publish year', 'trim|required');
		$this->form_validation->set_rules('citation', 'citation', 'trim|required');
		$this->form_validation->set_rules('author', 'author', 'trim|required');
		$this->form_validation->set_rules('file', 'file', 'trim|required');
		$this->form_validation->set_rules('issn', 'issn', 'trim|required');
		$this->form_validation->set_rules('url', 'url', 'trim|required');
		$this->form_validation->set_rules('is_submitted', 'is submitted', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Google_scholar.php */
/* Location: ./application/controllers/Google_scholar.php */
/* Created at 2023-12-27 08:00:10 */
/* Please DO NOT modify this information : */