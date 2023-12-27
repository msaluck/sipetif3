<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_scholar_model extends CI_Model
{

    public $table = 'google_scholar';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,user_id,title,abstract,authors,journal_name,publish_year,citation,author,file,issn,url,is_submitted');
        $this->datatables->from('google_scholar');
        //add this line for join
        //$this->datatables->join('table2', 'google_scholar.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('google_scholar/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data'))." 
            ".anchor(site_url('google_scholar/update/$1'),'<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data'))." 
                ".anchor(site_url('google_scholar/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger hapus" title="Hapus Data"'), 'id');
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
		$this->db->or_like('abstract', $q);
		$this->db->or_like('authors', $q);
		$this->db->or_like('journal_name', $q);
		$this->db->or_like('publish_year', $q);
		$this->db->or_like('citation', $q);
		$this->db->or_like('author', $q);
		$this->db->or_like('file', $q);
		$this->db->or_like('issn', $q);
		$this->db->or_like('url', $q);
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
		$this->db->or_like('abstract', $q);
		$this->db->or_like('authors', $q);
		$this->db->or_like('journal_name', $q);
		$this->db->or_like('publish_year', $q);
		$this->db->or_like('citation', $q);
		$this->db->or_like('author', $q);
		$this->db->or_like('file', $q);
		$this->db->or_like('issn', $q);
		$this->db->or_like('url', $q);
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

/* End of file Google_scholar_model.php */
/* Location: ./application/models/Google_scholar_model.php */
/* Created at 2023-12-27 08:00:10 */
/* Please DO NOT modify this information : */