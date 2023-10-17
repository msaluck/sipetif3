<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . '/enums/SubmissionTypes.php';
require_once APPPATH . '/enums/SubmissionStatuses.php';

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
        $data = array(
            'submissions_data' => $this->Submissions_model->get_all(),
        );
        $this->template->load('layout/master', 'submissions/submissions_list', $data);
    }

    public function view($submission_type_id, $id)
    {
        $submission_details = $this->Submissions_model->get_detail_by_id($id);

        if ($submission_details) {
            foreach ($submission_details as $submission_detail) {
                $submission_details[$submission_detail->name] = $submission_detail->value;
            }
            $data = array(
                'submission_details' => $submission_details,
                'submission_id' => $id,
                'submission_status' => SubmissionStatuses::DRAFT,
            );
            switch ($submission_type_id) {
                case SubmissionTypes::PROCEEDING:
                    $this->template->load('layout/master', 'submission/proceeding/view', $data);
                    break;
                case SubmissionTypes::NATIONAL_JOURNAL:
                    $this->template->load('layout/master', 'submission/national_journal/view', $data);
                    break;
                case SubmissionTypes::INTELLECTUAL_PROPERTY:
                    $this->template->load('layout/master', 'submission/intellectual_property/view', $data);
                    break;
                case SubmissionTypes::INTERNATIONAL_JOURNAL:
                    $this->template->load('layout/master', 'submission/international_journal/view', $data);
                    break;
                case SubmissionTypes::BOOK:
                    $this->template->load('layout/master', 'submission/book/view', $data);
                    break;
                default:
                    break;
            }
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submissions'));
        }
    }

    public function edit($submission_type_id, $id)
    {
        $submission_details = $this->Submissions_model->get_detail_by_id($id);

        if ($submission_details) {
            foreach ($submission_details as $submission_detail) {
                $submission_details[$submission_detail->name] = $submission_detail->value;
            }
            $data = array(
                'submission_details' => $submission_details,
                'submission_id' => $id,
                'submission_status' => SubmissionStatuses::DRAFT,
            );
            switch ($submission_type_id) {
                case SubmissionTypes::PROCEEDING:
                    $this->template->load('layout/master', 'submission/proceeding/edit', $data);
                    break;
                case SubmissionTypes::NATIONAL_JOURNAL:
                    $this->template->load('layout/master', 'submission/national_journal/edit', $data);
                    break;
                case SubmissionTypes::INTELLECTUAL_PROPERTY:
                    $this->template->load('layout/master', 'submission/intellectual_property/edit', $data);
                    break;
                case SubmissionTypes::INTERNATIONAL_JOURNAL:
                    $this->template->load('layout/master', 'submission/international_journal/edit', $data);
                    break;
                case SubmissionTypes::BOOK:
                    $this->template->load('layout/master', 'submission/book/edit', $data);
                    break;
                default:
                    break;
            }
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
            'submission_type_id' => set_value('submission_type_id'),
            'submission_status_id' => set_value('submission_status_id'),
            'user_id' => set_value('user_id'),
            'submission_date' => set_value('submission_date'),
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
                'submission_type_id' => $this->input->post('submission_type_id', TRUE),
                'submission_status_id' => $this->input->post('submission_status_id', TRUE),
                'user_id' => $this->input->post('user_id', TRUE),
                'submission_date' => $this->input->post('submission_date', TRUE),
            );

            $this->Submissions_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('submissions'));
        }
    }

    public function update($id)
    {
        $row = $this->Submissions_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('submissions/update_action'),
                'id' => set_value('id', $row->id),
                'submission_type_id' => set_value('submission_type_id', $row->submission_type_id),
                'submission_status_id' => set_value('submission_status_id', $row->submission_status_id),
                'user_id' => set_value('user_id', $row->user_id),
                'submission_date' => set_value('submission_date', $row->submission_date),
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
                'submission_type_id' => $this->input->post('submission_type_id', TRUE),
                'submission_status_id' => $this->input->post('submission_status_id', TRUE),
                'user_id' => $this->input->post('user_id', TRUE),
                'submission_date' => $this->input->post('submission_date', TRUE),
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
        $this->form_validation->set_rules('submission_type_id', 'submission type id', 'trim|required');
        $this->form_validation->set_rules('submission_status_id', 'submission status id', 'trim|required');
        $this->form_validation->set_rules('user_id', 'user id', 'trim|required');
        $this->form_validation->set_rules('submission_date', 'submission date', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Submissions.php */
/* Location: ./application/controllers/Submissions.php */
/* Created at 2023-03-15 13:03:15 */
/* Please DO NOT modify this information : */