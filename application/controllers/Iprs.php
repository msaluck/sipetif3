<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iprs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Iprs_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'iprs_data' => $this->Iprs_model->get_all(),
        );
        $this->template->load('layout/master','iprs/iprs_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Iprs_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'user_id' => $row->user_id,
				'title' => $row->title,
				'category' => $row->category,
				'request_year' => $row->request_year,
				'request_number' => $row->request_number,
				'inventor' => $row->inventor,
				'patent_holder' => $row->patent_holder,
				'publication_date' => $row->publication_date,
				'is_submitted' => $row->is_submitted,
			);
            $this->template->load('layout/master','iprs/iprs_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('iprs'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('iprs/create_action'),
			'id' => set_value('id'),
			'user_id' => set_value('user_id'),
			'title' => set_value('title'),
			'category' => set_value('category'),
			'request_year' => set_value('request_year'),
			'request_number' => set_value('request_number'),
			'inventor' => set_value('inventor'),
			'patent_holder' => set_value('patent_holder'),
			'publication_date' => set_value('publication_date'),
			'is_submitted' => set_value('is_submitted'),
		);
        $this->template->load('layout/master','iprs/iprs_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'user_id' => $this->input->post('user_id',TRUE),
				'title' => $this->input->post('title',TRUE),
				'category' => $this->input->post('category',TRUE),
				'request_year' => $this->input->post('request_year',TRUE),
				'request_number' => $this->input->post('request_number',TRUE),
				'inventor' => $this->input->post('inventor',TRUE),
				'patent_holder' => $this->input->post('patent_holder',TRUE),
				'publication_date' => $this->input->post('publication_date',TRUE),
				'is_submitted' => $this->input->post('is_submitted',TRUE),
			);

            $this->Iprs_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('iprs'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Iprs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('iprs/update_action'),
				'id' => set_value('id', $row->id),
				'user_id' => set_value('user_id', $row->user_id),
				'title' => set_value('title', $row->title),
				'category' => set_value('category', $row->category),
				'request_year' => set_value('request_year', $row->request_year),
				'request_number' => set_value('request_number', $row->request_number),
				'inventor' => set_value('inventor', $row->inventor),
				'patent_holder' => set_value('patent_holder', $row->patent_holder),
				'publication_date' => set_value('publication_date', $row->publication_date),
				'is_submitted' => set_value('is_submitted', $row->is_submitted),
			);
            $this->template->load('layout/master','iprs/iprs_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('iprs'));
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
				'title' => $this->input->post('title',TRUE),
				'category' => $this->input->post('category',TRUE),
				'request_year' => $this->input->post('request_year',TRUE),
				'request_number' => $this->input->post('request_number',TRUE),
				'inventor' => $this->input->post('inventor',TRUE),
				'patent_holder' => $this->input->post('patent_holder',TRUE),
				'publication_date' => $this->input->post('publication_date',TRUE),
				'is_submitted' => $this->input->post('is_submitted',TRUE),
			);

            $this->Iprs_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('iprs'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Iprs_model->get_by_id($id);

        if ($row) {
            $this->Iprs_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('iprs'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('iprs'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('category', 'category', 'trim|required');
		$this->form_validation->set_rules('request_year', 'request year', 'trim|required');
		$this->form_validation->set_rules('request_number', 'request number', 'trim|required');
		$this->form_validation->set_rules('inventor', 'inventor', 'trim|required');
		$this->form_validation->set_rules('patent_holder', 'patent holder', 'trim|required');
		$this->form_validation->set_rules('publication_date', 'publication date', 'trim|required');
		$this->form_validation->set_rules('is_submitted', 'is submitted', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Iprs.php */
/* Location: ./application/controllers/Iprs.php */
/* Created at 2023-12-27 08:04:40 */
/* Please DO NOT modify this information : */