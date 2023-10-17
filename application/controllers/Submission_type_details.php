<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submission_type_details extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Submission_type_details_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'submission_type_details_data' => $this->Submission_type_details_model->get_all(),
        );
        $this->template->load('layout/master','submission_type_details/submission_type_details_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Submission_type_details_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'submission_type_id' => $row->submission_type_id,
				'name' => $row->name,
				'type' => $row->type,
				'description' => $row->description,
			);
            $this->template->load('layout/master','submission_type_details/submission_type_details_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submission_type_details'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('submission_type_details/create_action'),
			'id' => set_value('id'),
			'submission_type_id' => set_value('submission_type_id'),
			'name' => set_value('name'),
			'type' => set_value('type'),
			'description' => set_value('description'),
		);
        $this->template->load('layout/master','submission_type_details/submission_type_details_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'submission_type_id' => $this->input->post('submission_type_id',TRUE),
				'name' => $this->input->post('name',TRUE),
				'type' => $this->input->post('type',TRUE),
				'description' => $this->input->post('description',TRUE),
			);

            $this->Submission_type_details_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('submission_type_details'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Submission_type_details_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('submission_type_details/update_action'),
				'id' => set_value('id', $row->id),
				'submission_type_id' => set_value('submission_type_id', $row->submission_type_id),
				'name' => set_value('name', $row->name),
				'type' => set_value('type', $row->type),
				'description' => set_value('description', $row->description),
			);
            $this->template->load('layout/master','submission_type_details/submission_type_details_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submission_type_details'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'submission_type_id' => $this->input->post('submission_type_id',TRUE),
				'name' => $this->input->post('name',TRUE),
				'type' => $this->input->post('type',TRUE),
				'description' => $this->input->post('description',TRUE),
			);

            $this->Submission_type_details_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('submission_type_details'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Submission_type_details_model->get_by_id($id);

        if ($row) {
            $this->Submission_type_details_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('submission_type_details'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submission_type_details'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('submission_type_id', 'submission type id', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('type', 'type', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Submission_type_details.php */
/* Location: ./application/controllers/Submission_type_details.php */
/* Created at 2023-03-08 04:07:04 */
/* Please DO NOT modify this information : */