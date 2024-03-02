<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Google_documents_by_all extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Google_documents_model');
        $this->load->library('form_validation');
        $this->db2 = $this->load->database('sinelitabmas', TRUE);
    }

    public function index()
    {
        $data = array(
            'google_documents_data' => $this->Google_documents_model->get_all(),
        );
        $this->template->load('layout/master', 'google_documents/google_documents_by_all_list', $data);
    }

    public function sync()
    {
        $google_documents = $this->db2->get('sinta.google_documents')->result();
        if ($google_documents) {
            $this->Google_documents_model->truncate();
            foreach ($google_documents as $row) {
                $data = array(
                    'abstract' => $row->abstract,
                    'authors' => $row->authors,
                    'authors_id' => $row->authors_id,
                    'citation' => $row->citation,
                    'id' => $row->id,
                    'idsubmission' => $row->idsubmission,
                    'journal_name' => $row->journal_name,
                    'publish_year' => $row->publish_year,
                    'title' => $row->title,
                    'url' => $row->url,
                );
                $this->Google_documents_model->insert($data);
                $this->session->set_flashdata('toastr-success', 'Sinkronisasi Berhasil');
            }
            redirect(site_url('google_documents_by_all'));
        } else {
            $this->session->set_flashdata('toastr-error', 'Sinkronisasi Gagal');
        }
    }
}

/* End of file Google_documents.php */
/* Location: ./application/controllers/Google_documents.php */
/* Created at 2024-01-03 03:12:37 */
/* Please DO NOT modify this information : */