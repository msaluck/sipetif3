<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_pernyataan_lppm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_pernyataan_lppm_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'surat_pernyataan_lppm_data' => $this->Surat_pernyataan_lppm_model->get_all(),
        );
        $this->template->load('layout/master', 'surat_pernyataan_lppm/surat_pernyataan_lppm_list', $data);
    }

    public function read($id)
    {
        $row = $this->Surat_pernyataan_lppm_model->get_by_id($id);
        if ($row) {
            $data = array(
                'acc_lppm' => $row->acc_lppm,
                'created_date' => $row->created_date,
                'id' => $row->id,
                'nomor_surat' => $row->nomor_surat,
                'submission_id' => $row->submission_id,
                'tanggal_surat' => $row->tanggal_surat,
            );
            $this->template->load('layout/master', 'surat_pernyataan_lppm/surat_pernyataan_lppm_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('surat_pernyataan_lppm'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('surat_pernyataan_lppm/create_action'),
            'acc_lppm' => set_value('acc_lppm'),
            'created_date' => set_value('created_date'),
            'id' => set_value('id'),
            'nomor_surat' => set_value('nomor_surat'),
            'submission_id' => set_value('submission_id'),
            'tanggal_surat' => set_value('tanggal_surat'),
        );
        $this->template->load('layout/master', 'surat_pernyataan_lppm/surat_pernyataan_lppm_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'acc_lppm' => $this->input->post('acc_lppm', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'nomor_surat' => $this->input->post('nomor_surat', TRUE),
                'submission_id' => $this->input->post('submission_id', TRUE),
                'tanggal_surat' => $this->input->post('tanggal_surat', TRUE),
            );

            $this->Surat_pernyataan_lppm_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('surat_pernyataan_lppm'));
        }
    }

    public function update($id)
    {
        $row = $this->Surat_pernyataan_lppm_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('surat_pernyataan_lppm/update_action'),
                'acc_lppm' => set_value('acc_lppm', $row->acc_lppm),
                'created_date' => set_value('created_date', $row->created_date),
                'id' => set_value('id', $row->id),
                'nomor_surat' => set_value('nomor_surat', $row->nomor_surat),
                'submission_id' => set_value('submission_id', $row->submission_id),
                'tanggal_surat' => set_value('tanggal_surat', $row->tanggal_surat),
            );
            $this->template->load('layout/master', 'surat_pernyataan_lppm/surat_pernyataan_lppm_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('surat_pernyataan_lppm'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'acc_lppm' => $this->input->post('acc_lppm', TRUE),
                'created_date' => $this->input->post('created_date', TRUE),
                'nomor_surat' => $this->input->post('nomor_surat', TRUE),
                'submission_id' => $this->input->post('submission_id', TRUE),
                'tanggal_surat' => $this->input->post('tanggal_surat', TRUE),
            );

            $this->Surat_pernyataan_lppm_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('surat_pernyataan_lppm'));
        }
    }

    public function delete($id)
    {
        $row = $this->Surat_pernyataan_lppm_model->get_by_id($id);

        if ($row) {
            $this->Surat_pernyataan_lppm_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('surat_pernyataan_lppm'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('surat_pernyataan_lppm'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('acc_lppm', 'acc lppm', 'trim|required');
        $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        $this->form_validation->set_rules('nomor_surat', 'nomer surat', 'trim|required');
        $this->form_validation->set_rules('submission_id', 'submission id', 'trim|required');
        $this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Surat_pernyataan_lppm.php */
/* Location: ./application/controllers/Surat_pernyataan_lppm.php */
/* Created at 2024-01-19 17:11:00 */
/* Please DO NOT modify this information : */