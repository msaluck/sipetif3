<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submission_details extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Submission_details_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'submission_details_data' => $this->Submission_details_model->get_all(),
        );
        $this->template->load('layout/master','submission_details/submission_details_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Submission_details_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'submission_id' => $row->submission_id,
				'submission_type_detail_id' => $row->submission_type_detail_id,
				'value' => $row->value,
			);
            $this->template->load('layout/master','submission_details/submission_details_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submission_details'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('submission_details/create_action'),
			'id' => set_value('id'),
			'submission_id' => set_value('submission_id'),
			'submission_type_detail_id' => set_value('submission_type_detail_id'),
			'value' => set_value('value'),
		);
        $this->template->load('layout/master','submission_details/submission_details_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'submission_id' => $this->input->post('submission_id',TRUE),
				'submission_type_detail_id' => $this->input->post('submission_type_detail_id',TRUE),
				'value' => $this->input->post('value',TRUE),
			);

            $this->Submission_details_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('submission_details'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Submission_details_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('submission_details/update_action'),
				'id' => set_value('id', $row->id),
				'submission_id' => set_value('submission_id', $row->submission_id),
				'submission_type_detail_id' => set_value('submission_type_detail_id', $row->submission_type_detail_id),
				'value' => set_value('value', $row->value),
			);
            $this->template->load('layout/master','submission_details/submission_details_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submission_details'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'submission_id' => $this->input->post('submission_id',TRUE),
				'submission_type_detail_id' => $this->input->post('submission_type_detail_id',TRUE),
				'value' => $this->input->post('value',TRUE),
			);

            $this->Submission_details_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('submission_details'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Submission_details_model->get_by_id($id);

        if ($row) {
            $this->Submission_details_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('submission_details'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submission_details'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('submission_id', 'submission id', 'trim|required');
		$this->form_validation->set_rules('submission_type_detail_id', 'submission type detail id', 'trim|required');
		$this->form_validation->set_rules('value', 'value', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Submission_details.php */
/* Location: ./application/controllers/Submission_details.php */
/* Created at 2023-05-27 07:32:17 */
/* Please DO NOT modify this information : */