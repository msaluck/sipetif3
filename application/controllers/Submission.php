<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . '/enums/SubmissionTypes.php';
require_once APPPATH . '/enums/SubmissionStatuses.php';

class Submission extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Submissions_model');
        $this->load->model('Submission_details_model');
        $this->load->model('Submission_documents_model');
        $this->load->model('Submission_type_details_model');
        $this->load->model('Submission_types_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->template->load('layout/master', 'submission/submission');
    }

    public function action()
    {
        if (isset($_POST['draft'])) {
            $this->do_draft();
        } else if (isset($_POST['submit'])) {
        } else {
            $this->do_upload();
        }
    }

    public function do_upload()
    {
    }

    public function proceeding()
    {
        $data = array(
            'submissionId' => null,
            'submissionStatus' => null,
            'submission_type_id' => SubmissionTypes::PROCEEDING,
            'action' => site_url('submission/action'),
        );
        $this->template->load('layout/master', 'submission/proceeding/add', $data);
    }

    public function do_draft()
    {
        //$this->_draft_rules();

        //$submission_type = $this->input->post('submission_type', TRUE);

        // if ($this->form_validation->run() == FALSE) {
        //     switch ($submission_type) {
        //         case SubmissionTypes::PROCEEDING:
        //             $this->proceeding();
        //             break;
        //         case SubmissionTypes::NATIONAL_JOURNAL:
        //             $this->national_journal();
        //             break;
        //         case SubmissionTypes::INTERNATIONAL_JOURNAL:
        //             $this->international_journal();
        //             break;
        //         case SubmissionTypes::INTELLECTUAL_PROPERTY:
        //             $this->intellectual_property();
        //             break;
        //         case SubmissionTypes::BOOK:
        //             $this->book();
        //             break;
        //         default:
        //             break;
        //     }
        // } else {
        //     //$submission_details = $this->Submission_type_details_model->get_by_submission_type_id($submission_type_id, $type);
        //     //$data = array();
        //     $this->draft();
        // }
        $this->draft();
    }

    public function draft()
    {
        $submission = array(
            'submission_type_id' => $this->input->post('submission_type_id', TRUE),
            'submission_status_id' => SubmissionStatuses::DRAFT,
            'user_id' => 1/* $this->input->post('user_id', TRUE) */,
            'submission_date' => date("Y-m-d H:i:s"),
        );
        $this->Submissions_model->insert($submission);
        $submission_id = $this->db->insert_id();
        $submissionDetails = [
            [
                'submission_id' => $submission_id,
                'submission_type_detail_id' => 1,
                'value' => $this->input->post('proposer', TRUE),
            ], [
                'submission_id' => $submission_id,
                'submission_type_detail_id' => 2,
                'value' => $this->input->post('manuscript-title'),
            ], [
                'submission_id' => $submission_id,
                'submission_type_detail_id' => 3,
                'value' => $this->input->post('proceeding'),
            ], [
                'submission_id' => $submission_id,
                'submission_type_detail_id' => 4,
                'value' => $this->input->post('publication-year')
            ], [
                'submission_id' => $submission_id,
                'submission_type_detail_id' => 10,
                'value' => $this->input->post('doi')
            ], [
                'submission_id' => $submission_id,
                'submission_type_detail_id' => 11,
                'value' => $this->input->post('issn')
            ], [
                'submission_id' => $submission_id,
                'submission_type_detail_id' => 12,
                'value' => $this->input->post('page')
            ], [
                'submission_id' => $submission_id,
                'submission_type_detail_id' => 13,
                'value' => $this->input->post('volume')
            ], [
                'submission_id' => $submission_id,
                'submission_type_detail_id' => 14,
                'value' => $this->input->post('number')
            ]
        ];
        $this->Submission_details_model->insert_batch($submissionDetails);
        $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
        redirect(site_url('submission'));
        //$this->Submission_documents_model->insert();
    }

    public function national_journal()
    {
        $data = array(
            'submissionId' => null,
            'submissionStatus' => null
        );
        $this->template->load('layout/master', 'submission/national_journal/add', $data);
    }

    public function international_journal()
    {
        $data = array(
            'submissionId' => null,
            'submissionStatus' => null
        );
        $this->template->load('layout/master', 'submission/international_journal/add', $data);
    }

    public function intellectual_property()
    {
        $data = array(
            'submissionId' => null,
            'submissionStatus' => null
        );
        $this->template->load('layout/master', 'submission/intellectual_property/add', $data);
    }

    public function book()
    {
        $data = array(
            'submissionId' => null,
            'submissionStatus' => null
        );
        $this->template->load('layout/master', 'submission/book/add', $data);
    }

    public function read($id)
    {
        $row = $this->Submissions_model->get_detail_by_id($id);
        if ($row) {
            $data = array(
                'submission_detail_data' => $row,
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

    public function _draft_rules()
    {
        $this->form_validation->set_rules();
    }
}

/* End of file Submissions.php */
/* Location: ./application/controllers/Submissions.php */
/* Created at 2023-03-15 13:03:15 */
/* Please DO NOT modify this information : */