<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Wos_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = site_url() . 'wos/?q=' . urlencode($q);
            $config['first_url'] = site_url() . 'wos/?q=' . urlencode($q);
        } else {
            $config['base_url'] = site_url() . 'wos';
            $config['first_url'] = site_url() . 'wos';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Wos_model->total_rows($q);
        $wos = $this->Wos_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'wos_data' => $wos,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('layout/master','wos/wos_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Wos_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'title' => $row->title,
				'author' => $row->author,
				'journal_name' => $row->journal_name,
				'issn' => $row->issn,
				'citation' => $row->citation,
			);
            $this->template->load('layout/master','wos/wos_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('wos'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('wos/create_action'),
			'id' => set_value('id'),
			'title' => set_value('title'),
			'author' => set_value('author'),
			'journal_name' => set_value('journal_name'),
			'issn' => set_value('issn'),
			'citation' => set_value('citation'),
		);
        $this->template->load('layout/master','wos/wos_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'author' => $this->input->post('author',TRUE),
				'journal_name' => $this->input->post('journal_name',TRUE),
				'issn' => $this->input->post('issn',TRUE),
				'citation' => $this->input->post('citation',TRUE),
			);

            $this->Wos_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('wos'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Wos_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('wos/update_action'),
				'id' => set_value('id', $row->id),
				'title' => set_value('title', $row->title),
				'author' => set_value('author', $row->author),
				'journal_name' => set_value('journal_name', $row->journal_name),
				'issn' => set_value('issn', $row->issn),
				'citation' => set_value('citation', $row->citation),
			);
            $this->template->load('layout/master','wos/wos_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('wos'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'title' => $this->input->post('title',TRUE),
				'author' => $this->input->post('author',TRUE),
				'journal_name' => $this->input->post('journal_name',TRUE),
				'issn' => $this->input->post('issn',TRUE),
				'citation' => $this->input->post('citation',TRUE),
			);

            $this->Wos_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('wos'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Wos_model->get_by_id($id);

        if ($row) {
            $this->Wos_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('wos'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('wos'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('author', 'author', 'trim|required');
		$this->form_validation->set_rules('journal_name', 'journal name', 'trim|required');
		$this->form_validation->set_rules('issn', 'issn', 'trim|required');
		$this->form_validation->set_rules('citation', 'citation', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Wos.php */
/* Location: ./application/controllers/Wos.php */
/* Created at 2023-12-25 05:14:23 */
/* Please DO NOT modify this information : */