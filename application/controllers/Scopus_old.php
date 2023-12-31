<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scopus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Scopus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'scopus_data' => $this->Scopus_model->get_all(),
        );
        $this->template->load('layout/master','scopus/scopus_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Scopus_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'user_id' => $row->user_id,
				'title' => $row->title,
				'publication_name' => $row->publication_name,
				'quartile' => $row->quartile,
				'issn' => $row->issn,
				'citeby_count' => $row->citeby_count,
				'creator' => $row->creator,
				'page' => $row->page,
				'volume' => $row->volume,
				'cover_date' => $row->cover_date,
				'cover_display_date' => $row->cover_display_date,
				'doi' => $row->doi,
				'aggregation_type' => $row->aggregation_type,
				'url' => $row->url,
				'author' => $row->author,
				'file' => $row->file,
				'is_submitted' => $row->is_submitted,
			);
            $this->template->load('layout/master','scopus/scopus_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('scopus'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('scopus/create_action'),
			'id' => set_value('id'),
			'user_id' => set_value('user_id'),
			'title' => set_value('title'),
			'publication_name' => set_value('publication_name'),
			'quartile' => set_value('quartile'),
			'issn' => set_value('issn'),
			'citeby_count' => set_value('citeby_count'),
			'creator' => set_value('creator'),
			'page' => set_value('page'),
			'volume' => set_value('volume'),
			'cover_date' => set_value('cover_date'),
			'cover_display_date' => set_value('cover_display_date'),
			'doi' => set_value('doi'),
			'aggregation_type' => set_value('aggregation_type'),
			'url' => set_value('url'),
			'author' => set_value('author'),
			'file' => set_value('file'),
			'is_submitted' => set_value('is_submitted'),
		);
        $this->template->load('layout/master','scopus/scopus_form', $data);
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
				'publication_name' => $this->input->post('publication_name',TRUE),
				'quartile' => $this->input->post('quartile',TRUE),
				'issn' => $this->input->post('issn',TRUE),
				'citeby_count' => $this->input->post('citeby_count',TRUE),
				'creator' => $this->input->post('creator',TRUE),
				'page' => $this->input->post('page',TRUE),
				'volume' => $this->input->post('volume',TRUE),
				'cover_date' => $this->input->post('cover_date',TRUE),
				'cover_display_date' => $this->input->post('cover_display_date',TRUE),
				'doi' => $this->input->post('doi',TRUE),
				'aggregation_type' => $this->input->post('aggregation_type',TRUE),
				'url' => $this->input->post('url',TRUE),
				'author' => $this->input->post('author',TRUE),
				'file' => $this->input->post('file',TRUE),
				'is_submitted' => $this->input->post('is_submitted',TRUE),
			);

            $this->Scopus_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('scopus'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Scopus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('scopus/update_action'),
				'id' => set_value('id', $row->id),
				'user_id' => set_value('user_id', $row->user_id),
				'title' => set_value('title', $row->title),
				'publication_name' => set_value('publication_name', $row->publication_name),
				'quartile' => set_value('quartile', $row->quartile),
				'issn' => set_value('issn', $row->issn),
				'citeby_count' => set_value('citeby_count', $row->citeby_count),
				'creator' => set_value('creator', $row->creator),
				'page' => set_value('page', $row->page),
				'volume' => set_value('volume', $row->volume),
				'cover_date' => set_value('cover_date', $row->cover_date),
				'cover_display_date' => set_value('cover_display_date', $row->cover_display_date),
				'doi' => set_value('doi', $row->doi),
				'aggregation_type' => set_value('aggregation_type', $row->aggregation_type),
				'url' => set_value('url', $row->url),
				'author' => set_value('author', $row->author),
				'file' => set_value('file', $row->file),
				'is_submitted' => set_value('is_submitted', $row->is_submitted),
			);
            $this->template->load('layout/master','scopus/scopus_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('scopus'));
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
				'publication_name' => $this->input->post('publication_name',TRUE),
				'quartile' => $this->input->post('quartile',TRUE),
				'issn' => $this->input->post('issn',TRUE),
				'citeby_count' => $this->input->post('citeby_count',TRUE),
				'creator' => $this->input->post('creator',TRUE),
				'page' => $this->input->post('page',TRUE),
				'volume' => $this->input->post('volume',TRUE),
				'cover_date' => $this->input->post('cover_date',TRUE),
				'cover_display_date' => $this->input->post('cover_display_date',TRUE),
				'doi' => $this->input->post('doi',TRUE),
				'aggregation_type' => $this->input->post('aggregation_type',TRUE),
				'url' => $this->input->post('url',TRUE),
				'author' => $this->input->post('author',TRUE),
				'file' => $this->input->post('file',TRUE),
				'is_submitted' => $this->input->post('is_submitted',TRUE),
			);

            $this->Scopus_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('scopus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Scopus_model->get_by_id($id);

        if ($row) {
            $this->Scopus_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('scopus'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('scopus'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('publication_name', 'publication name', 'trim|required');
		$this->form_validation->set_rules('quartile', 'quartile', 'trim|required');
		$this->form_validation->set_rules('issn', 'issn', 'trim|required');
		$this->form_validation->set_rules('citeby_count', 'citeby count', 'trim|required');
		$this->form_validation->set_rules('creator', 'creator', 'trim|required');
		$this->form_validation->set_rules('page', 'page', 'trim|required');
		$this->form_validation->set_rules('volume', 'volume', 'trim|required');
		$this->form_validation->set_rules('cover_date', 'cover date', 'trim|required');
		$this->form_validation->set_rules('cover_display_date', 'cover display date', 'trim|required');
		$this->form_validation->set_rules('doi', 'doi', 'trim|required');
		$this->form_validation->set_rules('aggregation_type', 'aggregation type', 'trim|required');
		$this->form_validation->set_rules('url', 'url', 'trim|required');
		$this->form_validation->set_rules('author', 'author', 'trim|required');
		$this->form_validation->set_rules('file', 'file', 'trim|required');
		$this->form_validation->set_rules('is_submitted', 'is submitted', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Scopus.php */
/* Location: ./application/controllers/Scopus.php */
/* Created at 2023-12-27 07:34:46 */
/* Please DO NOT modify this information : */