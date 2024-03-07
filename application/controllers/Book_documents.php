<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book_documents extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Book_documents_model');
        $this->load->library('form_validation');
        $this->db2 = $this->load->database('sinelitabmas', TRUE);
    }

    public function index()
    {
        $id_user = $this->session->id_user;
        $get_user = $this->db->get_where('users', ['id' => $id_user])->row();
        $get_data = $this->db->get_where('book_documents', ['authors_id' => $get_user->idauthors])->result();
        $data = array(
            'book_documents_data' => $get_data
        );
        $this->template->load('layout/master', 'book_documents/book_documents_list', $data);
    }

    public function read($id)
    {
        $row = $this->Book_documents_model->get_by_id($id);
        if ($row) {
            $data = array(
                'authors' => $row->authors,
                'authors_id' => $row->authors_id,
                'category' => $row->category,
                'id' => $row->id,
                'isbn' => $row->isbn,
                'place' => $row->place,
                'publisher' => $row->publisher,
                'title' => $row->title,
                'year' => $row->year,
            );
            $this->template->load('layout/master', 'book_documents/book_documents_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('book_documents'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('book_documents/create_action'),
            'authors' => set_value('authors'),
            'authors_id' => set_value('authors_id'),
            'category' => set_value('category'),
            'id' => set_value('id'),
            'isbn' => set_value('isbn'),
            'place' => set_value('place'),
            'publisher' => set_value('publisher'),
            'title' => set_value('title'),
            'year' => set_value('year'),
        );
        $this->template->load('layout/master', 'book_documents/book_documents_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'authors' => $this->input->post('authors', TRUE),
                'authors_id' => $this->input->post('authors_id', TRUE),
                'category' => $this->input->post('category', TRUE),
                'isbn' => $this->input->post('isbn', TRUE),
                'place' => $this->input->post('place', TRUE),
                'publisher' => $this->input->post('publisher', TRUE),
                'title' => $this->input->post('title', TRUE),
                'year' => $this->input->post('year', TRUE),
            );

            $this->Book_documents_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('book_documents'));
        }
    }

    public function update($id)
    {
        $row = $this->Book_documents_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('book_documents/update_action'),
                'authors' => set_value('authors', $row->authors),
                'authors_id' => set_value('authors_id', $row->authors_id),
                'category' => set_value('category', $row->category),
                'id' => set_value('id', $row->id),
                'isbn' => set_value('isbn', $row->isbn),
                'place' => set_value('place', $row->place),
                'publisher' => set_value('publisher', $row->publisher),
                'title' => set_value('title', $row->title),
                'year' => set_value('year', $row->year),
            );
            $this->template->load('layout/master', 'book_documents/book_documents_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('book_documents'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'authors' => $this->input->post('authors', TRUE),
                'authors_id' => $this->input->post('authors_id', TRUE),
                'category' => $this->input->post('category', TRUE),
                'isbn' => $this->input->post('isbn', TRUE),
                'place' => $this->input->post('place', TRUE),
                'publisher' => $this->input->post('publisher', TRUE),
                'title' => $this->input->post('title', TRUE),
                'year' => $this->input->post('year', TRUE),
            );

            $this->Book_documents_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('book_documents'));
        }
    }

    public function delete($id)
    {
        $row = $this->Book_documents_model->get_by_id($id);

        if ($row) {
            $this->Book_documents_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('book_documents'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('book_documents'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('authors', 'authors', 'trim|required');
        $this->form_validation->set_rules('authors_id', 'authors id', 'trim|required');
        $this->form_validation->set_rules('category', 'category', 'trim|required');
        $this->form_validation->set_rules('isbn', 'isbn', 'trim|required');
        $this->form_validation->set_rules('place', 'place', 'trim|required');
        $this->form_validation->set_rules('publisher', 'publisher', 'trim|required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('year', 'year', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Book_documents.php */
/* Location: ./application/controllers/Book_documents.php */
/* Created at 2024-01-03 03:12:22 */
/* Please DO NOT modify this information : */