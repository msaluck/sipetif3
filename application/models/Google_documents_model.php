<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Google_documents_model extends CI_Model
{

    public $table = 'google_documents';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('abstract,authors,authors_id,citation,id,idsubmission,journal_name,publish_year,title,url');
        $this->datatables->from('google_documents');
        //add this line for join
        //$this->datatables->join('table2', 'google_documents.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('google_documents/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data')) . " 
            " . anchor(site_url('google_documents/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data')) . " 
                " . anchor(site_url('google_documents/delete/$1'), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger hapus" title="Hapus Data"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('abstract', $q);
        $this->db->or_like('authors', $q);
        $this->db->or_like('authors_id', $q);
        $this->db->or_like('citation', $q);
        $this->db->or_like('idsubmission', $q);
        $this->db->or_like('journal_name', $q);
        $this->db->or_like('publish_year', $q);
        $this->db->or_like('title', $q);
        $this->db->or_like('url', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('abstract', $q);
        $this->db->or_like('authors', $q);
        $this->db->or_like('authors_id', $q);
        $this->db->or_like('citation', $q);
        $this->db->or_like('idsubmission', $q);
        $this->db->or_like('journal_name', $q);
        $this->db->or_like('publish_year', $q);
        $this->db->or_like('title', $q);
        $this->db->or_like('url', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function truncate()
    {
        $this->db->truncate($this->table);
    }
}

/* End of file Google_documents_model.php */
/* Location: ./application/models/Google_documents_model.php */
/* Created at 2024-01-03 03:12:37 */
/* Please DO NOT modify this information : */