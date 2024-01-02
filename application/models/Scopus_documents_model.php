<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scopus_documents_model extends CI_Model
{

    public $table = 'scopus_documents';
    public $id = '';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id,quartile,title,publication_name,creator,PAGE,issn,volume,cover_date,cover_display_date,doi,citedby_count,aggregation_type,url,authors_id');
        $this->datatables->from('scopus_documents');
        //add this line for join
        //$this->datatables->join('table2', 'scopus_documents.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('scopus_documents/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data')) . " 
            " . anchor(site_url('scopus_documents/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data')) . " 
                " . anchor(site_url('scopus_documents/delete/$1'), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger hapus" title="Hapus Data"'), '');
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
        $this->db->like('', $q);
        $this->db->or_like('id', $q);
        $this->db->or_like('quartile', $q);
        $this->db->or_like('title', $q);
        $this->db->or_like('publication_name', $q);
        $this->db->or_like('creator', $q);
        $this->db->or_like('PAGE', $q);
        $this->db->or_like('issn', $q);
        $this->db->or_like('volume', $q);
        $this->db->or_like('cover_date', $q);
        $this->db->or_like('cover_display_date', $q);
        $this->db->or_like('doi', $q);
        $this->db->or_like('citedby_count', $q);
        $this->db->or_like('aggregation_type', $q);
        $this->db->or_like('url', $q);
        $this->db->or_like('authors_id', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('', $q);
        $this->db->or_like('id', $q);
        $this->db->or_like('quartile', $q);
        $this->db->or_like('title', $q);
        $this->db->or_like('publication_name', $q);
        $this->db->or_like('creator', $q);
        $this->db->or_like('PAGE', $q);
        $this->db->or_like('issn', $q);
        $this->db->or_like('volume', $q);
        $this->db->or_like('cover_date', $q);
        $this->db->or_like('cover_display_date', $q);
        $this->db->or_like('doi', $q);
        $this->db->or_like('citedby_count', $q);
        $this->db->or_like('aggregation_type', $q);
        $this->db->or_like('url', $q);
        $this->db->or_like('authors_id', $q);
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

/* End of file Scopus_documents_model.php */
/* Location: ./application/models/Scopus_documents_model.php */
/* Created at 2024-01-01 19:38:39 */
/* Please DO NOT modify this information : */