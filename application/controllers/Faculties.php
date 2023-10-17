<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculties extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Faculties_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'faculties_data' => $this->Faculties_model->get_all(),
        );
        $this->template->load('layout/master','faculties/faculties_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Faculties_model->get_by_id($id);
        if ($row) {
            $data = array(
				'description' => $row->description,
				'id' => $row->id,
				'name' => $row->name,
			);
            $this->template->load('layout/master','faculties/faculties_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('faculties'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('faculties/create_action'),
			'description' => set_value('description'),
			'id' => set_value('id'),
			'name' => set_value('name'),
		);
        $this->template->load('layout/master','faculties/faculties_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'description' => $this->input->post('description',TRUE),
				'name' => $this->input->post('name',TRUE),
			);

            $this->Faculties_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('faculties'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Faculties_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('faculties/update_action'),
				'description' => set_value('description', $row->description),
				'id' => set_value('id', $row->id),
				'name' => set_value('name', $row->name),
			);
            $this->template->load('layout/master','faculties/faculties_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('faculties'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'description' => $this->input->post('description',TRUE),
				'name' => $this->input->post('name',TRUE),
			);

            $this->Faculties_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('faculties'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Faculties_model->get_by_id($id);

        if ($row) {
            $this->Faculties_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('faculties'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('faculties'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('description', 'description', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Faculties.php */
/* Location: ./application/controllers/Faculties.php */
/* Created at 2023-05-07 08:10:35 */
/* Please DO NOT modify this information : */