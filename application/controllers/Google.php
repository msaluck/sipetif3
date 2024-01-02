<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Google_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'google_data' => $this->Google_model->get_all(),
        );
        $this->template->load('layout/master','google/google_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Google_model->get_by_id($id);
        if ($row) {
            $data = array(
				'authors_id' => $row->authors_id,
				'total_document' => $row->total_document,
				'total_citation' => $row->total_citation,
				'total_cited_doc' => $row->total_cited_doc,
				'h_index' => $row->h_index,
				'i10_index' => $row->i10_index,
				'g_index' => $row->g_index,
			);
            $this->template->load('layout/master','google/google_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('google'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('google/create_action'),
			'authors_id' => set_value('authors_id'),
			'total_document' => set_value('total_document'),
			'total_citation' => set_value('total_citation'),
			'total_cited_doc' => set_value('total_cited_doc'),
			'h_index' => set_value('h_index'),
			'i10_index' => set_value('i10_index'),
			'g_index' => set_value('g_index'),
		);
        $this->template->load('layout/master','google/google_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'total_document' => $this->input->post('total_document',TRUE),
				'total_citation' => $this->input->post('total_citation',TRUE),
				'total_cited_doc' => $this->input->post('total_cited_doc',TRUE),
				'h_index' => $this->input->post('h_index',TRUE),
				'i10_index' => $this->input->post('i10_index',TRUE),
				'g_index' => $this->input->post('g_index',TRUE),
			);

            $this->Google_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('google'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Google_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('google/update_action'),
				'authors_id' => set_value('authors_id', $row->authors_id),
				'total_document' => set_value('total_document', $row->total_document),
				'total_citation' => set_value('total_citation', $row->total_citation),
				'total_cited_doc' => set_value('total_cited_doc', $row->total_cited_doc),
				'h_index' => set_value('h_index', $row->h_index),
				'i10_index' => set_value('i10_index', $row->i10_index),
				'g_index' => set_value('g_index', $row->g_index),
			);
            $this->template->load('layout/master','google/google_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('google'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('authors_id', TRUE));
        } else {
            $data = array(
				'total_document' => $this->input->post('total_document',TRUE),
				'total_citation' => $this->input->post('total_citation',TRUE),
				'total_cited_doc' => $this->input->post('total_cited_doc',TRUE),
				'h_index' => $this->input->post('h_index',TRUE),
				'i10_index' => $this->input->post('i10_index',TRUE),
				'g_index' => $this->input->post('g_index',TRUE),
			);

            $this->Google_model->update($this->input->post('authors_id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('google'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Google_model->get_by_id($id);

        if ($row) {
            $this->Google_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('google'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('google'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('total_document', 'total document', 'trim|required');
		$this->form_validation->set_rules('total_citation', 'total citation', 'trim|required');
		$this->form_validation->set_rules('total_cited_doc', 'total cited doc', 'trim|required');
		$this->form_validation->set_rules('h_index', 'h index', 'trim|required');
		$this->form_validation->set_rules('i10_index', 'i10 index', 'trim|required');
		$this->form_validation->set_rules('g_index', 'g index', 'trim|required');

		$this->form_validation->set_rules('authors_id', 'authors_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Google.php */
/* Location: ./application/controllers/Google.php */
/* Created at 2024-01-02 06:16:06 */
/* Please DO NOT modify this information : */