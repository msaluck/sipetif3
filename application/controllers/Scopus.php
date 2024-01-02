<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scopus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Scopus_model');
        $this->load->library('form_validation');
        $this->db2 = $this->load->database('sinelitabmas', TRUE);
    }

    public function index()
    {
        $data = array(
            'scopus_data' => $this->Scopus_model->get_all(),
        );
        $this->template->load('layout/master', 'scopus/scopus_list', $data);
    }

    public function read($id)
    {
        $row = $this->Scopus_model->get_by_id($id);
        if ($row) {
            $data = array(
                'authors_id' => $row->authors_id,
                'total_document' => $row->total_document,
                'total_citation' => $row->total_citation,
                'total_cited_doc' => $row->total_cited_doc,
                'h_index' => $row->h_index,
                'i10_index' => $row->i10_index,
                'g_index' => $row->g_index,
                'g_index_3year' => $row->g_index_3year,
                'waktu_update' => $row->waktu_update,
            );
            $this->template->load('layout/master', 'scopus/scopus_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('scopus'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('scopus/create_action'),
            'authors_id' => set_value('authors_id'),
            'total_document' => set_value('total_document'),
            'total_citation' => set_value('total_citation'),
            'total_cited_doc' => set_value('total_cited_doc'),
            'h_index' => set_value('h_index'),
            'i10_index' => set_value('i10_index'),
            'g_index' => set_value('g_index'),
            'g_index_3year' => set_value('g_index_3year'),
            'waktu_update' => set_value('waktu_update'),
        );
        $this->template->load('layout/master', 'scopus/scopus_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'authors_id' => $this->input->post('authors_id', TRUE),
                'total_document' => $this->input->post('total_document', TRUE),
                'total_citation' => $this->input->post('total_citation', TRUE),
                'total_cited_doc' => $this->input->post('total_cited_doc', TRUE),
                'h_index' => $this->input->post('h_index', TRUE),
                'i10_index' => $this->input->post('i10_index', TRUE),
                'g_index' => $this->input->post('g_index', TRUE),
                'g_index_3year' => $this->input->post('g_index_3year', TRUE),
                'waktu_update' => $this->input->post('waktu_update', TRUE),
            );

            $this->Scopus_model->insert($data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
            redirect(site_url('scopus'));
        }
    }

    public function update($id)
    {
        $row = $this->Scopus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('scopus/update_action'),
                'authors_id' => set_value('authors_id', $row->authors_id),
                'total_document' => set_value('total_document', $row->total_document),
                'total_citation' => set_value('total_citation', $row->total_citation),
                'total_cited_doc' => set_value('total_cited_doc', $row->total_cited_doc),
                'h_index' => set_value('h_index', $row->h_index),
                'i10_index' => set_value('i10_index', $row->i10_index),
                'g_index' => set_value('g_index', $row->g_index),
                'g_index_3year' => set_value('g_index_3year', $row->g_index_3year),
                'waktu_update' => set_value('waktu_update', $row->waktu_update),
            );
            $this->template->load('layout/master', 'scopus/scopus_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('scopus'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
                'authors_id' => $this->input->post('authors_id', TRUE),
                'total_document' => $this->input->post('total_document', TRUE),
                'total_citation' => $this->input->post('total_citation', TRUE),
                'total_cited_doc' => $this->input->post('total_cited_doc', TRUE),
                'h_index' => $this->input->post('h_index', TRUE),
                'i10_index' => $this->input->post('i10_index', TRUE),
                'g_index' => $this->input->post('g_index', TRUE),
                'g_index_3year' => $this->input->post('g_index_3year', TRUE),
                'waktu_update' => $this->input->post('waktu_update', TRUE),
            );

            $this->Scopus_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('scopus'));
        }
    }

    public function delete($id)
    {
        $row = $this->Scopus_model->get_by_id($id);

        if ($row) {
            $this->Scopus_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect(site_url('scopus'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('scopus'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('authors_id', 'authors id', 'trim|required');
        $this->form_validation->set_rules('total_document', 'total document', 'trim|required');
        $this->form_validation->set_rules('total_citation', 'total citation', 'trim|required');
        $this->form_validation->set_rules('total_cited_doc', 'total cited doc', 'trim|required');
        $this->form_validation->set_rules('h_index', 'h index', 'trim|required');
        $this->form_validation->set_rules('i10_index', 'i10 index', 'trim|required');
        $this->form_validation->set_rules('g_index', 'g index', 'trim|required');
        $this->form_validation->set_rules('g_index_3year', 'g index 3year', 'trim|required');
        $this->form_validation->set_rules('waktu_update', 'waktu update', 'trim|required');

        $this->form_validation->set_rules('', '', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function synchronize()
    {
        $scopus = $this->db2->query("select * from sinta.scopus")->result();
        if ($scopus) {
            $this->Scopus_model->truncate();
            foreach ($scopus as $row) {
                $data = array(
                    'authors_id' => $row->authors_id,
                    'total_document' => $row->total_document,
                    'total_citation' => $row->total_citation,
                    'total_cited_doc' => $row->total_cited_doc,
                    'h_index' => $row->h_index,
                    'i10_index' => $row->i10_index,
                    'g_index' => $row->g_index,
                    'g_index_3year' => $row->g_index_3year,
                    'waktu_update' => $row->waktu_update,
                );
                $this->Scopus_model->insert($data);
            }
            $this->session->set_flashdata('toastr-success', 'Sinkronisasi Berhasil');
            redirect(site_url('scopus'));
        }
    }
}

/* End of file Scopus.php */
/* Location: ./application/controllers/Scopus.php */
/* Created at 2024-01-01 19:38:29 */
/* Please DO NOT modify this information : */