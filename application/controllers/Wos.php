<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Wos_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'wos_data' => $this->Wos_model->get_all(),
        );
        $this->template->load('layout/master','wos/wos_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Wos_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'user_id' => $row->user_id,
				'publon_id' => $row->publon_id,
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
				'author' => $row->author,
				'file' => $row->file,
				'is_submitted' => $row->is_submitted,
			);
            $this->template->load('layout/master','wos/wos_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('wos'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('wos/create_action'),
			'id' => set_value('id'),
			'user_id' => set_value('user_id'),
			'publon_id' => set_value('publon_id'),
			'wos_id' => set_value('wos_id'),
			'doi' => set_value('doi'),
			'title' => set_value('title'),
			'first_author' => set_value('first_author'),
			'last_author' => set_value('last_author'),
			'authors' => set_value('authors'),
			'publish_date' => set_value('publish_date'),
			'journal_name' => set_value('journal_name'),
			'citation' => set_value('citation'),
			'abstract' => set_value('abstract'),
			'publish_type' => set_value('publish_type'),
			'publish_year' => set_value('publish_year'),
			'page_begin' => set_value('page_begin'),
			'page_end' => set_value('page_end'),
			'issn' => set_value('issn'),
			'eissn' => set_value('eissn'),
			'url' => set_value('url'),
			'author' => set_value('author'),
			'file' => set_value('file'),
			'is_submitted' => set_value('is_submitted'),
		);
        $this->template->load('layout/master','wos/wos_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'user_id' => $this->input->post('user_id',TRUE),
				'publon_id' => $this->input->post('publon_id',TRUE),
				'wos_id' => $this->input->post('wos_id',TRUE),
				'doi' => $this->input->post('doi',TRUE),
				'title' => $this->input->post('title',TRUE),
				'first_author' => $this->input->post('first_author',TRUE),
				'last_author' => $this->input->post('last_author',TRUE),
				'authors' => $this->input->post('authors',TRUE),
				'publish_date' => $this->input->post('publish_date',TRUE),
				'journal_name' => $this->input->post('journal_name',TRUE),
				'citation' => $this->input->post('citation',TRUE),
				'abstract' => $this->input->post('abstract',TRUE),
				'publish_type' => $this->input->post('publish_type',TRUE),
				'publish_year' => $this->input->post('publish_year',TRUE),
				'page_begin' => $this->input->post('page_begin',TRUE),
				'page_end' => $this->input->post('page_end',TRUE),
				'issn' => $this->input->post('issn',TRUE),
				'eissn' => $this->input->post('eissn',TRUE),
				'url' => $this->input->post('url',TRUE),
				'author' => $this->input->post('author',TRUE),
				'file' => $this->input->post('file',TRUE),
				'is_submitted' => $this->input->post('is_submitted',TRUE),
			);

            $this->Wos_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('wos'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Wos_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('wos/update_action'),
				'id' => set_value('id', $row->id),
				'user_id' => set_value('user_id', $row->user_id),
				'publon_id' => set_value('publon_id', $row->publon_id),
				'wos_id' => set_value('wos_id', $row->wos_id),
				'doi' => set_value('doi', $row->doi),
				'title' => set_value('title', $row->title),
				'first_author' => set_value('first_author', $row->first_author),
				'last_author' => set_value('last_author', $row->last_author),
				'authors' => set_value('authors', $row->authors),
				'publish_date' => set_value('publish_date', $row->publish_date),
				'journal_name' => set_value('journal_name', $row->journal_name),
				'citation' => set_value('citation', $row->citation),
				'abstract' => set_value('abstract', $row->abstract),
				'publish_type' => set_value('publish_type', $row->publish_type),
				'publish_year' => set_value('publish_year', $row->publish_year),
				'page_begin' => set_value('page_begin', $row->page_begin),
				'page_end' => set_value('page_end', $row->page_end),
				'issn' => set_value('issn', $row->issn),
				'eissn' => set_value('eissn', $row->eissn),
				'url' => set_value('url', $row->url),
				'author' => set_value('author', $row->author),
				'file' => set_value('file', $row->file),
				'is_submitted' => set_value('is_submitted', $row->is_submitted),
			);
            $this->template->load('layout/master','wos/wos_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('wos'));
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
				'publon_id' => $this->input->post('publon_id',TRUE),
				'wos_id' => $this->input->post('wos_id',TRUE),
				'doi' => $this->input->post('doi',TRUE),
				'title' => $this->input->post('title',TRUE),
				'first_author' => $this->input->post('first_author',TRUE),
				'last_author' => $this->input->post('last_author',TRUE),
				'authors' => $this->input->post('authors',TRUE),
				'publish_date' => $this->input->post('publish_date',TRUE),
				'journal_name' => $this->input->post('journal_name',TRUE),
				'citation' => $this->input->post('citation',TRUE),
				'abstract' => $this->input->post('abstract',TRUE),
				'publish_type' => $this->input->post('publish_type',TRUE),
				'publish_year' => $this->input->post('publish_year',TRUE),
				'page_begin' => $this->input->post('page_begin',TRUE),
				'page_end' => $this->input->post('page_end',TRUE),
				'issn' => $this->input->post('issn',TRUE),
				'eissn' => $this->input->post('eissn',TRUE),
				'url' => $this->input->post('url',TRUE),
				'author' => $this->input->post('author',TRUE),
				'file' => $this->input->post('file',TRUE),
				'is_submitted' => $this->input->post('is_submitted',TRUE),
			);

            $this->Wos_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('wos'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Wos_model->get_by_id($id);

        if ($row) {
            $this->Wos_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('wos'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('wos'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
		$this->form_validation->set_rules('publon_id', 'publon id', 'trim|required');
		$this->form_validation->set_rules('wos_id', 'wos id', 'trim|required');
		$this->form_validation->set_rules('doi', 'doi', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('first_author', 'first author', 'trim|required');
		$this->form_validation->set_rules('last_author', 'last author', 'trim|required');
		$this->form_validation->set_rules('authors', 'authors', 'trim|required');
		$this->form_validation->set_rules('publish_date', 'publish date', 'trim|required');
		$this->form_validation->set_rules('journal_name', 'journal name', 'trim|required');
		$this->form_validation->set_rules('citation', 'citation', 'trim|required');
		$this->form_validation->set_rules('abstract', 'abstract', 'trim|required');
		$this->form_validation->set_rules('publish_type', 'publish type', 'trim|required');
		$this->form_validation->set_rules('publish_year', 'publish year', 'trim|required');
		$this->form_validation->set_rules('page_begin', 'page begin', 'trim|required');
		$this->form_validation->set_rules('page_end', 'page end', 'trim|required');
		$this->form_validation->set_rules('issn', 'issn', 'trim|required');
		$this->form_validation->set_rules('eissn', 'eissn', 'trim|required');
		$this->form_validation->set_rules('url', 'url', 'trim|required');
		$this->form_validation->set_rules('author', 'author', 'trim|required');
		$this->form_validation->set_rules('file', 'file', 'trim|required');
		$this->form_validation->set_rules('is_submitted', 'is submitted', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Wos.php */
/* Location: ./application/controllers/Wos.php */
/* Created at 2023-12-27 07:50:29 */
/* Please DO NOT modify this information : */