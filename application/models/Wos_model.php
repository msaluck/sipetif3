<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wos_model extends CI_Model
{

    public $table = 'wos';
    public $id = 'authors_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('authors_id,total_document,total_citation,total_cited_doc,h_index');
        $this->datatables->from('wos');
        //add this line for join
        //$this->datatables->join('table2', 'wos.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('wos/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data')) . " 
            " . anchor(site_url('wos/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data')) . " 
                " . anchor(site_url('wos/delete/$1'), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger hapus" title="Hapus Data"'), '');
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
        $this->db->or_like('authors_id', $q);
        $this->db->or_like('total_document', $q);
        $this->db->or_like('total_citation', $q);
        $this->db->or_like('total_cited_doc', $q);
        $this->db->or_like('h_index', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('', $q);
        $this->db->or_like('authors_id', $q);
        $this->db->or_like('total_document', $q);
        $this->db->or_like('total_citation', $q);
        $this->db->or_like('total_cited_doc', $q);
        $this->db->or_like('h_index', $q);
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
/* Created at 2024-01-01 21:06:54 */
/* Please DO NOT modify this information : */