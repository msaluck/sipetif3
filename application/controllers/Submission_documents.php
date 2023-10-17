<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submission_documents extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Submission_documents_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'submission_documents_data' => $this->Submission_documents_model->get_all(),
        );
        $this->template->load('layout/master','submission_documents/submission_documents_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Submission_documents_model->get_by_id($id);
        if ($row) {
            $data = array(
				'file_name' => $row->file_name,
				'file_path' => $row->file_path,
				'file_size' => $row->file_size,
				'file_type' => $row->file_type,
				'id' => $row->id,
				'original_name' => $row->original_name,
				'status' => $row->status,
				'submission_id' => $row->submission_id,
				'submission_type_detail_id' => $row->submission_type_detail_id,
				'uploaded_at' => $row->uploaded_at,
			);
            $this->template->load('layout/master','submission_documents/submission_documents_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submission_documents'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('submission_documents/create_action'),
			'file_name' => set_value('file_name'),
			'file_path' => set_value('file_path'),
			'file_size' => set_value('file_size'),
			'file_type' => set_value('file_type'),
			'id' => set_value('id'),
			'original_name' => set_value('original_name'),
			'status' => set_value('status'),
			'submission_id' => set_value('submission_id'),
			'submission_type_detail_id' => set_value('submission_type_detail_id'),
			'uploaded_at' => set_value('uploaded_at'),
		);
        $this->template->load('layout/master','submission_documents/submission_documents_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'file_name' => $this->input->post('file_name',TRUE),
				'file_path' => $this->input->post('file_path',TRUE),
				'file_size' => $this->input->post('file_size',TRUE),
				'file_type' => $this->input->post('file_type',TRUE),
				'original_name' => $this->input->post('original_name',TRUE),
				'status' => $this->input->post('status',TRUE),
				'submission_id' => $this->input->post('submission_id',TRUE),
				'submission_type_detail_id' => $this->input->post('submission_type_detail_id',TRUE),
				'uploaded_at' => $this->input->post('uploaded_at',TRUE),
			);

            $this->Submission_documents_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('submission_documents'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Submission_documents_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('submission_documents/update_action'),
				'file_name' => set_value('file_name', $row->file_name),
				'file_path' => set_value('file_path', $row->file_path),
				'file_size' => set_value('file_size', $row->file_size),
				'file_type' => set_value('file_type', $row->file_type),
				'id' => set_value('id', $row->id),
				'original_name' => set_value('original_name', $row->original_name),
				'status' => set_value('status', $row->status),
				'submission_id' => set_value('submission_id', $row->submission_id),
				'submission_type_detail_id' => set_value('submission_type_detail_id', $row->submission_type_detail_id),
				'uploaded_at' => set_value('uploaded_at', $row->uploaded_at),
			);
            $this->template->load('layout/master','submission_documents/submission_documents_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submission_documents'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'file_name' => $this->input->post('file_name',TRUE),
				'file_path' => $this->input->post('file_path',TRUE),
				'file_size' => $this->input->post('file_size',TRUE),
				'file_type' => $this->input->post('file_type',TRUE),
				'original_name' => $this->input->post('original_name',TRUE),
				'status' => $this->input->post('status',TRUE),
				'submission_id' => $this->input->post('submission_id',TRUE),
				'submission_type_detail_id' => $this->input->post('submission_type_detail_id',TRUE),
				'uploaded_at' => $this->input->post('uploaded_at',TRUE),
			);

            $this->Submission_documents_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('submission_documents'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Submission_documents_model->get_by_id($id);

        if ($row) {
            $this->Submission_documents_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('submission_documents'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submission_documents'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('file_name', 'file name', 'trim|required');
		$this->form_validation->set_rules('file_path', 'file path', 'trim|required');
		$this->form_validation->set_rules('file_size', 'file size', 'trim|required');
		$this->form_validation->set_rules('file_type', 'file type', 'trim|required');
		$this->form_validation->set_rules('original_name', 'original name', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
		$this->form_validation->set_rules('submission_id', 'submission id', 'trim|required');
		$this->form_validation->set_rules('submission_type_detail_id', 'submission type detail id', 'trim|required');
		$this->form_validation->set_rules('uploaded_at', 'uploaded at', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Submission_documents.php */
/* Location: ./application/controllers/Submission_documents.php */
/* Created at 2023-05-27 07:33:45 */
/* Please DO NOT modify this information : */