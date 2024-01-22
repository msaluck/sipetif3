<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_permohonan_rektor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_permohonan_rektor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'surat_permohonan_rektor_data' => $this->Surat_permohonan_rektor_model->get_all(),
        );
        $this->template->load('layout/master','surat_permohonan_rektor/surat_permohonan_rektor_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Surat_permohonan_rektor_model->get_by_id($id);
        if ($row) {
            $data = array(
				'acc_rektor' => $row->acc_rektor,
				'created_date' => $row->created_date,
				'id' => $row->id,
				'submission_id' => $row->submission_id,
			);
            $this->template->load('layout/master','surat_permohonan_rektor/surat_permohonan_rektor_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('surat_permohonan_rektor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('surat_permohonan_rektor/create_action'),
			'acc_rektor' => set_value('acc_rektor'),
			'created_date' => set_value('created_date'),
			'id' => set_value('id'),
			'submission_id' => set_value('submission_id'),
		);
        $this->template->load('layout/master','surat_permohonan_rektor/surat_permohonan_rektor_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'acc_rektor' => $this->input->post('acc_rektor',TRUE),
				'created_date' => $this->input->post('created_date',TRUE),
				'submission_id' => $this->input->post('submission_id',TRUE),
			);

            $this->Surat_permohonan_rektor_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('surat_permohonan_rektor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Surat_permohonan_rektor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('surat_permohonan_rektor/update_action'),
				'acc_rektor' => set_value('acc_rektor', $row->acc_rektor),
				'created_date' => set_value('created_date', $row->created_date),
				'id' => set_value('id', $row->id),
				'submission_id' => set_value('submission_id', $row->submission_id),
			);
            $this->template->load('layout/master','surat_permohonan_rektor/surat_permohonan_rektor_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('surat_permohonan_rektor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'acc_rektor' => $this->input->post('acc_rektor',TRUE),
				'created_date' => $this->input->post('created_date',TRUE),
				'submission_id' => $this->input->post('submission_id',TRUE),
			);

            $this->Surat_permohonan_rektor_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('surat_permohonan_rektor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Surat_permohonan_rektor_model->get_by_id($id);

        if ($row) {
            $this->Surat_permohonan_rektor_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('surat_permohonan_rektor'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('surat_permohonan_rektor'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('acc_rektor', 'acc rektor', 'trim|required');
		$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
		$this->form_validation->set_rules('submission_id', 'submission id', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Surat_permohonan_rektor.php */
/* Location: ./application/controllers/Surat_permohonan_rektor.php */
/* Created at 2024-01-19 17:11:08 */
/* Please DO NOT modify this information : */