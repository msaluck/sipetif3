<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_pengantar_dekan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_pengantar_dekan_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('layout/master','surat_pengantar_dekan/surat_pengantar_dekan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Surat_pengantar_dekan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Surat_pengantar_dekan_model->get_by_id($id);
        if ($row) {
            $data = array(
				'acc_dekan' => $row->acc_dekan,
				'createdate' => $row->createdate,
				'hal' => $row->hal,
				'id' => $row->id,
				'nama_jurnal' => $row->nama_jurnal,
				'nomor_surat' => $row->nomor_surat,
				'submission_id' => $row->submission_id,
				'tanggal_surat' => $row->tanggal_surat,
			);
            $this->template->load('layout/master','surat_pengantar_dekan/surat_pengantar_dekan_read', $data);
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
			'acc_dekan' => set_value('acc_dekan'),
			'createdate' => set_value('createdate'),
			'hal' => set_value('hal'),
			'id' => set_value('id'),
			'nama_jurnal' => set_value('nama_jurnal'),
			'nomor_surat' => set_value('nomor_surat'),
			'submission_id' => set_value('submission_id'),
			'tanggal_surat' => set_value('tanggal_surat'),
		);
        $this->template->load('layout/master','surat_pengantar_dekan/surat_pengantar_dekan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'acc_dekan' => $this->input->post('acc_dekan',TRUE),
				'createdate' => $this->input->post('createdate',TRUE),
				'hal' => $this->input->post('hal',TRUE),
				'nama_jurnal' => $this->input->post('nama_jurnal',TRUE),
				'nomor_surat' => $this->input->post('nomor_surat',TRUE),
				'submission_id' => $this->input->post('submission_id',TRUE),
				'tanggal_surat' => $this->input->post('tanggal_surat',TRUE),
			);

            $this->Surat_pengantar_dekan_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('surat_pengantar_dekan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Surat_pengantar_dekan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('surat_pengantar_dekan/update_action'),
				'acc_dekan' => set_value('acc_dekan', $row->acc_dekan),
				'createdate' => set_value('createdate', $row->createdate),
				'hal' => set_value('hal', $row->hal),
				'id' => set_value('id', $row->id),
				'nama_jurnal' => set_value('nama_jurnal', $row->nama_jurnal),
				'nomor_surat' => set_value('nomor_surat', $row->nomor_surat),
				'submission_id' => set_value('submission_id', $row->submission_id),
				'tanggal_surat' => set_value('tanggal_surat', $row->tanggal_surat),
			);
            $this->template->load('layout/master','surat_pengantar_dekan/surat_pengantar_dekan_form', $data);
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
				'acc_dekan' => $this->input->post('acc_dekan',TRUE),
				'createdate' => $this->input->post('createdate',TRUE),
				'hal' => $this->input->post('hal',TRUE),
				'nama_jurnal' => $this->input->post('nama_jurnal',TRUE),
				'nomor_surat' => $this->input->post('nomor_surat',TRUE),
				'submission_id' => $this->input->post('submission_id',TRUE),
				'tanggal_surat' => $this->input->post('tanggal_surat',TRUE),
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
		$this->form_validation->set_rules('acc_dekan', 'acc dekan', 'trim|required');
		$this->form_validation->set_rules('createdate', 'createdate', 'trim|required');
		$this->form_validation->set_rules('hal', 'hal', 'trim|required');
		$this->form_validation->set_rules('nama_jurnal', 'nama jurnal', 'trim|required');
		$this->form_validation->set_rules('nomor_surat', 'nomor surat', 'trim|required');
		$this->form_validation->set_rules('submission_id', 'submission id', 'trim|required');
		$this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Surat_pengantar_dekan.php */
/* Location: ./application/controllers/Surat_pengantar_dekan.php */
/* Created at 2023-12-28 09:42:58 */
/* Please DO NOT modify this information : */