<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scopus_model extends CI_Model
{

    public $table = 'scopus';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,user_id,title,publication_name,quartile,issn,citeby_count,creator,page,volume,cover_date,cover_display_date,doi,aggregation_type,url,author,file,is_submitted');
        $this->datatables->from('scopus');
        //add this line for join
        //$this->datatables->join('table2', 'scopus.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('scopus/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data'))." 
            ".anchor(site_url('scopus/update/$1'),'<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data'))." 
                ".anchor(site_url('scopus/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger hapus" title="Hapus Data"'), 'id');
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
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
		$this->db->or_like('user_id', $q);
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
		$this->db->or_like('is_submitted', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
		$this->db->or_like('user_id', $q);
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
		$this->db->or_like('is_submitted', $q);
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
/* Created at 2023-12-27 07:34:46 */
/* Please DO NOT modify this information : */