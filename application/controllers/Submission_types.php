<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submission_types extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Submission_types_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('layout/master','submission_types/submission_types_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Submission_types_model->json();
    }

    public function read($id) 
    {
        $row = $this->Submission_types_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'name' => $row->name,
				'description' => $row->description,
			);
            $this->template->load('layout/master','submission_types/submission_types_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submission_types'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('submission_types/create_action'),
			'id' => set_value('id'),
			'name' => set_value('name'),
			'description' => set_value('description'),
		);
        $this->template->load('layout/master','submission_types/submission_types_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'name' => $this->input->post('name',TRUE),
				'description' => $this->input->post('description',TRUE),
			);

            $this->Submission_types_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('submission_types'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Submission_types_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('submission_types/update_action'),
				'id' => set_value('id', $row->id),
				'name' => set_value('name', $row->name),
				'description' => set_value('description', $row->description),
			);
            $this->template->load('layout/master','submission_types/submission_types_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submission_types'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'name' => $this->input->post('name',TRUE),
				'description' => $this->input->post('description',TRUE),
			);

            $this->Submission_types_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('submission_types'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Submission_types_model->get_by_id($id);

        if ($row) {
            $this->Submission_types_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('submission_types'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submission_types'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Submission_types.php */
/* Location: ./application/controllers/Submission_types.php */
/* Created at 2023-03-08 03:58:52 */
/* Please DO NOT modify this information : */