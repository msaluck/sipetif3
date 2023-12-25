<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submissions extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Submissions_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = site_url() . 'submissions/?q=' . urlencode($q);
            $config['first_url'] = site_url() . 'submissions/?q=' . urlencode($q);
        } else {
            $config['base_url'] = site_url() . 'submissions';
            $config['first_url'] = site_url() . 'submissions';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Submissions_model->total_rows($q);
        $submissions = $this->Submissions_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'submissions_data' => $submissions,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('layout/master', 'submissions/submissions_list', $data);
    }

    public function read($id)
    {
        $row = $this->Submissions_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'portfolio_database' => $row->portfolio_database,
                'portfolio_id' => $row->portfolio_id,
                'submission_status' => $row->submission_status,
                'user_id' => $row->user_id,
            );
            $this->template->load('layout/master', 'submissions/submissions_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submissions'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('submissions/create_action'),
            'id' => set_value('id'),
            'portfolio_database' => set_value('portfolio_database'),
            'portfolio_id' => set_value('portfolio_id'),
            'submission_status' => set_value('submission_status'),
            'user_id' => set_value('user_id'),
        );
        $this->template->load('layout/master', 'submissions/submissions_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'portfolio_database' => $this->input->post('portfolio_database', TRUE),
                'portfolio_id' => $this->input->post('portfolio_id', TRUE),
                'submission_status' => $this->input->post('submission_status', TRUE),
                'user_id' => $this->input->post('user_id', TRUE),
            );

            $this->Submissions_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('submissions'));
        }
    }

    public function submit_scopus($id)
    {

        $data = array(
            'portfolio_database' => 'scopus',
            'portfolio_id' => $id,
            'submission_status' => 1,
            'user_id' => $this->session->id_user,
        );
        $this->Submissions_model->insert($data);
        $this->session->set_flashdata('toastr-success', 'Portofolio Berhasil diajukan');
        redirect(site_url('submissions'));
    }

    public function update($id)
    {
        $row = $this->Submissions_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('submissions/update_action'),
                'id' => set_value('id', $row->id),
                'portfolio_database' => set_value('portfolio_database', $row->portfolio_database),
                'portfolio_id' => set_value('portfolio_id', $row->portfolio_id),
                'submission_status' => set_value('submission_status', $row->submission_status),
                'user_id' => set_value('user_id', $row->user_id),
            );
            $this->template->load('layout/master', 'submissions/submissions_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submissions'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'portfolio_database' => $this->input->post('portfolio_database', TRUE),
                'portfolio_id' => $this->input->post('portfolio_id', TRUE),
                'submission_status' => $this->input->post('submission_status', TRUE),
                'user_id' => $this->input->post('user_id', TRUE),
            );

            $this->Submissions_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('submissions'));
        }
    }

    public function delete($id)
    {
        $row = $this->Submissions_model->get_by_id($id);

        if ($row) {
            $this->Submissions_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('submissions'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submissions'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('portfolio_database', 'portfolio database', 'trim|required');
        $this->form_validation->set_rules('portfolio_id', 'portfolio id', 'trim|required');
        $this->form_validation->set_rules('submission_status', 'submission status', 'trim|required');
        $this->form_validation->set_rules('user_id', 'user id', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Submissions.php */
/* Location: ./application/controllers/Submissions.php */
/* Created at 2023-12-25 23:10:51 */
/* Please DO NOT modify this information : */