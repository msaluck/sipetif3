<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('layout/master', 'users/users_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Users_model->json();
    }

    public function read($id)
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'user_type_id' => $row->user_type_id,
                'faculty_id' => $row->faculty_id,
                'department_id' => $row->department_id,
                'email' => $row->email,
                'name' => $row->name,
                'username' => $row->username,
                'password' => $row->password,
            );
            $this->template->load('layout/master', 'users/users_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('users'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('users/create_action'),
            'id' => set_value('id'),
            'user_type_id' => set_value('user_type_id'),
            'faculty_id' => set_value('faculty_id'),
            'department_id' => set_value('department_id'),
            'email' => set_value('email'),
            'name' => set_value('name'),
            'username' => set_value('username'),
            'password' => set_value('password'),
        );
        $this->template->load('layout/master', 'users/users_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'user_type_id' => $this->input->post('user_type_id', TRUE),
                'faculty_id' => $this->input->post('faculty_id', TRUE),
                'department_id' => $this->input->post('department_id', TRUE),
                'email' => $this->input->post('email', TRUE),
                'name' => $this->input->post('name', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => $this->input->post('password', TRUE),
            );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('users'));
        }
    }

    public function update($id)
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('users/update_action'),
                'id' => set_value('id', $row->id),
                'user_type_id' => set_value('user_type_id', $row->user_type_id),
                'faculty_id' => set_value('faculty_id', $row->faculty_id),
                'department_id' => set_value('department_id', $row->department_id),
                'email' => set_value('email', $row->email),
                'name' => set_value('name', $row->name),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
            );
            $this->template->load('layout/master', 'users/users_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('users'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'user_type_id' => $this->input->post('user_type_id', TRUE),
                'faculty_id' => $this->input->post('faculty_id', TRUE),
                'department_id' => $this->input->post('department_id', TRUE),
                'email' => $this->input->post('email', TRUE),
                'name' => $this->input->post('name', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => $this->input->post('password', TRUE),
            );

            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('users'));
        }
    }

    public function delete($id)
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('users'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('user_type_id', 'user type id', 'trim|required');
        $this->form_validation->set_rules('faculty_id', 'faculty id', 'trim|required');
        $this->form_validation->set_rules('department_id', 'department id', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Created at 2023-05-24 07:01:10 */
/* Please DO NOT modify this information : */