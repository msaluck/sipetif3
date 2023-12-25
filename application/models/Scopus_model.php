<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scopus_model extends CI_Model
{

    public $table = 'scopus';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
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
        $this->db->or_like('title', $q);
        $this->db->or_like('publication_name', $q);
        $this->db->or_like('quartile', $q);
        $this->db->or_like('issn', $q);
        $this->db->or_like('citeby_count', $q);
        $this->db->or_like('creator', $q);
        $this->db->or_like('page', $q);
        $this->db->or_like('volume', $q);
        $this->db->or_like('cover_date', $q);
        $this->db->or_like('cover_display_date', $q);
        $this->db->or_like('doi', $q);
        $this->db->or_like('aggregation_type', $q);
        $this->db->or_like('url', $q);
        $this->db->or_like('author', $q);
        $this->db->or_like('file', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('title', $q);
        $this->db->or_like('publication_name', $q);
        $this->db->or_like('quartile', $q);
        $this->db->or_like('issn', $q);
        $this->db->or_like('citeby_count', $q);
        $this->db->or_like('creator', $q);
        $this->db->or_like('page', $q);
        $this->db->or_like('volume', $q);
        $this->db->or_like('cover_date', $q);
        $this->db->or_like('cover_display_date', $q);
        $this->db->or_like('doi', $q);
        $this->db->or_like('aggregation_type', $q);
        $this->db->or_like('url', $q);
        $this->db->or_like('author', $q);
        $this->db->or_like('file', $q);
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
}

/* End of file Scopus_model.php */
/* Location: ./application/models/Scopus_model.php */
/* Created at 2023-12-25 05:14:10 */
/* Please DO NOT modify this information : */