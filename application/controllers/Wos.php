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
				'authors_id' => $row->authors_id,
				'total_document' => $row->total_document,
				'total_citation' => $row->total_citation,
				'total_cited_doc' => $row->total_cited_doc,
				'h_index' => $row->h_index,
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
			'authors_id' => set_value('authors_id'),
			'total_document' => set_value('total_document'),
			'total_citation' => set_value('total_citation'),
			'total_cited_doc' => set_value('total_cited_doc'),
			'h_index' => set_value('h_index'),
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
				'authors_id' => $this->input->post('authors_id',TRUE),
				'total_document' => $this->input->post('total_document',TRUE),
				'total_citation' => $this->input->post('total_citation',TRUE),
				'total_cited_doc' => $this->input->post('total_cited_doc',TRUE),
				'h_index' => $this->input->post('h_index',TRUE),
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
				'authors_id' => set_value('authors_id', $row->authors_id),
				'total_document' => set_value('total_document', $row->total_document),
				'total_citation' => set_value('total_citation', $row->total_citation),
				'total_cited_doc' => set_value('total_cited_doc', $row->total_cited_doc),
				'h_index' => set_value('h_index', $row->h_index),
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
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
				'authors_id' => $this->input->post('authors_id',TRUE),
				'total_document' => $this->input->post('total_document',TRUE),
				'total_citation' => $this->input->post('total_citation',TRUE),
				'total_cited_doc' => $this->input->post('total_cited_doc',TRUE),
				'h_index' => $this->input->post('h_index',TRUE),
			);

            $this->Wos_model->update($this->input->post('', TRUE), $data);
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
		$this->form_validation->set_rules('authors_id', 'authors id', 'trim|required');
		$this->form_validation->set_rules('total_document', 'total document', 'trim|required');
		$this->form_validation->set_rules('total_citation', 'total citation', 'trim|required');
		$this->form_validation->set_rules('total_cited_doc', 'total cited doc', 'trim|required');
		$this->form_validation->set_rules('h_index', 'h index', 'trim|required');

		$this->form_validation->set_rules('', '', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Wos.php */
/* Location: ./application/controllers/Wos.php */
/* Created at 2024-01-01 21:06:54 */
/* Please DO NOT modify this information : */