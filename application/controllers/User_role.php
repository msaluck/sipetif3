<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_role_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'user_role_data' => $this->User_role_model->get_all(),
        );
        $this->template->load('layout/master','user_role/user_role_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_role_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'user_id' => $row->user_id,
				'role_id' => $row->role_id,
			);
            $this->template->load('layout/master','user_role/user_role_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('user_role'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('user_role/create_action'),
			'id' => set_value('id'),
			'user_id' => set_value('user_id'),
			'role_id' => set_value('role_id'),
		);
        $this->template->load('layout/master','user_role/user_role_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'user_id' => $this->input->post('user_id',TRUE),
				'role_id' => $this->input->post('role_id',TRUE),
			);

            $this->User_role_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('user_role'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_role_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('user_role/update_action'),
				'id' => set_value('id', $row->id),
				'user_id' => set_value('user_id', $row->user_id),
				'role_id' => set_value('role_id', $row->role_id),
			);
            $this->template->load('layout/master','user_role/user_role_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('user_role'));
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
				'role_id' => $this->input->post('role_id',TRUE),
			);

            $this->User_role_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('user_role'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_role_model->get_by_id($id);

        if ($row) {
            $this->User_role_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('user_role'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('user_role'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
		$this->form_validation->set_rules('role_id', 'role id', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User_role.php */
/* Location: ./application/controllers/User_role.php */
/* Created at 2023-12-27 09:45:16 */
/* Please DO NOT modify this information : */