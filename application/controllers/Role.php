<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Role_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'role_data' => $this->Role_model->get_all(),
        );
        $this->template->load('layout/master','role/role_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Role_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'name' => $row->name,
				'description' => $row->description,
			);
            $this->template->load('layout/master','role/role_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('role'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('role/create_action'),
			'id' => set_value('id'),
			'name' => set_value('name'),
			'description' => set_value('description'),
		);
        $this->template->load('layout/master','role/role_form', $data);
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

            $this->Role_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('role'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Role_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('role/update_action'),
				'id' => set_value('id', $row->id),
				'name' => set_value('name', $row->name),
				'description' => set_value('description', $row->description),
			);
            $this->template->load('layout/master','role/role_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('role'));
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

            $this->Role_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('role'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Role_model->get_by_id($id);

        if ($row) {
            $this->Role_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('role'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('role'));
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

/* End of file Role.php */
/* Location: ./application/controllers/Role.php */
/* Created at 2023-12-27 08:51:11 */
/* Please DO NOT modify this information : */