<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipr_documents_model extends CI_Model
{

    public $table = 'ipr_documents';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('authors_id,category,filing_date,id,inventor,patent_holder,publication_date,publication_number,reception_date,registration_date,registration_number,requests_number,requests_year,title');
        $this->datatables->from('ipr_documents');
        //add this line for join
        //$this->datatables->join('table2', 'ipr_documents.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('ipr_documents/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data'))." 
            ".anchor(site_url('ipr_documents/update/$1'),'<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data'))." 
                ".anchor(site_url('ipr_documents/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger hapus" title="Hapus Data"'), 'id');
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
		$this->db->or_like('authors_id', $q);
		$this->db->or_like('category', $q);
		$this->db->or_like('filing_date', $q);
		$this->db->or_like('inventor', $q);
		$this->db->or_like('patent_holder', $q);
		$this->db->or_like('publication_date', $q);
		$this->db->or_like('publication_number', $q);
		$this->db->or_like('reception_date', $q);
		$this->db->or_like('registration_date', $q);
		$this->db->or_like('registration_number', $q);
		$this->db->or_like('requests_number', $q);
		$this->db->or_like('requests_year', $q);
		$this->db->or_like('title', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
		$this->db->or_like('authors_id', $q);
		$this->db->or_like('category', $q);
		$this->db->or_like('filing_date', $q);
		$this->db->or_like('inventor', $q);
		$this->db->or_like('patent_holder', $q);
		$this->db->or_like('publication_date', $q);
		$this->db->or_like('publication_number', $q);
		$this->db->or_like('reception_date', $q);
		$this->db->or_like('registration_date', $q);
		$this->db->or_like('registration_number', $q);
		$this->db->or_like('requests_number', $q);
		$this->db->or_like('requests_year', $q);
		$this->db->or_like('title', $q);
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

/* End of file Ipr_documents_model.php */
/* Location: ./application/models/Ipr_documents_model.php */
/* Created at 2024-01-03 03:12:30 */
/* Please DO NOT modify this information : */