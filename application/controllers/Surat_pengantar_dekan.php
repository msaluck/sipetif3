<?php
defined('BASEPATH') or exit('No direct script access allowed');

class surat_pengantar_dekan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_pengantar_dekan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'surat_pengantar_dekan_data' => $this->Surat_pengantar_dekan_model->get_all(),
        );
        $this->template->load('layout/master', 'surat_pengantar_dekan/surat_pengantar_dekan_list', $data);
    }

    public function read($id)
    {
        $row = $this->Surat_pengantar_dekan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'submission_id' => $row->submission_id,
                'nomor_surat' => $row->nomor_surat,
                'hal' => $row->hal,
                'nama_jurnal' => $row->nama_jurnal,
                'tanggal_surat' => $row->tanggal_surat,
                'createdate' => $row->createdate,
            );
            $this->template->load('layout/master', 'surat_pengantar_dekan/surat_pengantar_dekan_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('surat_pengantar_dekan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('surat_pengantar_dekan/create_action'),
            'id' => set_value('id'),
            'submission_id' => set_value('submission_id'),
            'nomor_surat' => set_value('nomor_surat'),
            'hal' => 'Surat Pengantar Permohonan Pengajuan Insentif Karya Ilmiah',
            'nama_jurnal' => set_value('nama_jurnal'),
            'tanggal_surat' => set_value('tanggal_surat'),
            'createdate' => set_value('createdate'),
        );
        $this->template->load('layout/master', 'surat_pengantar_dekan/surat_pengantar_dekan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'submission_id' => $this->input->post('submission_id', TRUE),
                'nomor_surat' => '-',
                'hal' => $this->input->post('hal', TRUE),
                'nama_jurnal' => $this->input->post('nama_jurnal', TRUE),
                'tanggal_surat' => $this->input->post('tanggal_surat', TRUE),
                'createdate' => date('Y-m-d H:i:s'),
                'acc_dekan' => NULL
            );
            $this->Surat_pengantar_dekan_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Membuat Surat Pengantar Dekan');
            redirect(site_url('submissions/read/' . $this->input->post('submission_id', TRUE)));
        }
    }

    public function update($id)
    {
        $row = $this->Surat_pengantar_dekan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('surat_pengantar_dekan/update_action'),
                'id' => set_value('id', $row->id),
                'submission_id' => set_value('submission_id', $row->submission_id),
                'nomor_surat' => set_value('nomor_surat', $row->nomor_surat),
                'hal' => set_value('hal', $row->hal),
                'nama_jurnal' => set_value('nama_jurnal', $row->nama_jurnal),
                'tanggal_surat' => set_value('tanggal_surat', $row->tanggal_surat),
                'createdate' => set_value('createdate', $row->createdate),
            );
            $this->template->load('layout/master', 'surat_pengantar_dekan/surat_pengantar_dekan_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('surat_pengantar_dekan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'submission_id' => $this->input->post('submission_id', TRUE),
                'nomor_surat' => $this->input->post('nomor_surat', TRUE),
                'hal' => $this->input->post('hal', TRUE),
                'nama_jurnal' => $this->input->post('nama_jurnal', TRUE),
                'tanggal_surat' => $this->input->post('tanggal_surat', TRUE),
                'createdate' => $this->input->post('createdate', TRUE),
            );

            $this->Surat_pengantar_dekan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('surat_pengantar_dekan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Surat_pengantar_dekan_model->get_by_id($id);

        if ($row) {
            $this->Surat_pengantar_dekan_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('surat_pengantar_dekan'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('surat_pengantar_dekan'));
        }
    }

    public function _rules()
    {
        // $this->form_validation->set_rules('submission_id', 'submission id', 'trim|required');
        // $this->form_validation->set_rules('nomor_surat', 'nomor surat', 'trim|required');
        // $this->form_validation->set_rules('hal', 'hal', 'trim|required');
        // $this->form_validation->set_rules('nama_jurnal', 'nama jurnal', 'trim|required');
        // $this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'trim|required');
        // $this->form_validation->set_rules('createdate', 'createdate', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file surat_pengantar_dekan.php */
/* Location: ./application/controllers/surat_pengantar_dekan.php */
/* Created at 2023-12-26 02:21:16 */
/* Please DO NOT modify this information : */