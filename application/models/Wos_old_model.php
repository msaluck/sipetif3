<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wos_model extends CI_Model
{

    public $table = 'wos';
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
        $this->db->or_like('user_id', $q);
        $this->db->or_like('title', $q);
        $this->db->or_like('first_author', $q);
        $this->db->or_like('last_author', $q);
        $this->db->or_like('authors', $q);
        $this->db->or_like('publish_date', $q);
        $this->db->or_like('journal_name', $q);
        $this->db->or_like('citation', $q);
        $this->db->or_like('abstract', $q);
        $this->db->or_like('publish_type', $q);
        $this->db->or_like('publish_year', $q);
        $this->db->or_like('page_begin', $q);
        $this->db->or_like('page_end', $q);
        $this->db->or_like('issn', $q);
        $this->db->or_like('eissn', $q);
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
        $this->db->or_like('first_author', $q);
        $this->db->or_like('last_author', $q);
        $this->db->or_like('authors', $q);
        $this->db->or_like('publish_date', $q);
        $this->db->or_like('journal_name', $q);
        $this->db->or_like('citation', $q);
        $this->db->or_like('abstract', $q);
        $this->db->or_like('publish_type', $q);
        $this->db->or_like('publish_year', $q);
        $this->db->or_like('page_begin', $q);
        $this->db->or_like('page_end', $q);
        $this->db->or_like('issn', $q);
        $this->db->or_like('eissn', $q);
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

/* End of file Wos_model.php */
/* Location: ./application/models/Wos_model.php */
/* Created at 2023-12-25 14:51:44 */
/* Please DO NOT modify this information : */