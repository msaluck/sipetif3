<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Book_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'book_data' => $this->Book_model->get_all(),
        );
        $this->template->load('layout/master','book/book_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Book_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'user_id' => $row->user_id,
				'title' => $row->title,
				'category' => $row->category,
				'isbn' => $row->isbn,
				'authors' => $row->authors,
				'place' => $row->place,
				'publisher' => $row->publisher,
				'year' => $row->year,
				'is_submitted' => $row->is_submitted,
			);
            $this->template->load('layout/master','book/book_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('book'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('book/create_action'),
			'id' => set_value('id'),
			'user_id' => set_value('user_id'),
			'title' => set_value('title'),
			'category' => set_value('category'),
			'isbn' => set_value('isbn'),
			'authors' => set_value('authors'),
			'place' => set_value('place'),
			'publisher' => set_value('publisher'),
			'year' => set_value('year'),
			'is_submitted' => set_value('is_submitted'),
		);
        $this->template->load('layout/master','book/book_form', $data);
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
				'isbn' => $this->input->post('isbn',TRUE),
				'authors' => $this->input->post('authors',TRUE),
				'place' => $this->input->post('place',TRUE),
				'publisher' => $this->input->post('publisher',TRUE),
				'year' => $this->input->post('year',TRUE),
				'is_submitted' => $this->input->post('is_submitted',TRUE),
			);

            $this->Book_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('book'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Book_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('book/update_action'),
				'id' => set_value('id', $row->id),
				'user_id' => set_value('user_id', $row->user_id),
				'title' => set_value('title', $row->title),
				'category' => set_value('category', $row->category),
				'isbn' => set_value('isbn', $row->isbn),
				'authors' => set_value('authors', $row->authors),
				'place' => set_value('place', $row->place),
				'publisher' => set_value('publisher', $row->publisher),
				'year' => set_value('year', $row->year),
				'is_submitted' => set_value('is_submitted', $row->is_submitted),
			);
            $this->template->load('layout/master','book/book_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('book'));
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
				'isbn' => $this->input->post('isbn',TRUE),
				'authors' => $this->input->post('authors',TRUE),
				'place' => $this->input->post('place',TRUE),
				'publisher' => $this->input->post('publisher',TRUE),
				'year' => $this->input->post('year',TRUE),
				'is_submitted' => $this->input->post('is_submitted',TRUE),
			);

            $this->Book_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('book'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Book_model->get_by_id($id);

        if ($row) {
            $this->Book_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('book'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('book'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('category', 'category', 'trim|required');
		$this->form_validation->set_rules('isbn', 'isbn', 'trim|required');
		$this->form_validation->set_rules('authors', 'authors', 'trim|required');
		$this->form_validation->set_rules('place', 'place', 'trim|required');
		$this->form_validation->set_rules('publisher', 'publisher', 'trim|required');
		$this->form_validation->set_rules('year', 'year', 'trim|required');
		$this->form_validation->set_rules('is_submitted', 'is submitted', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Book.php */
/* Location: ./application/controllers/Book.php */
/* Created at 2023-12-27 08:16:35 */
/* Please DO NOT modify this information : */