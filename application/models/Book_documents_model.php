<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_documents_model extends CI_Model
{

    public $table = 'book_documents';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('authors,authors_id,category,id,isbn,place,publisher,title,year');
        $this->datatables->from('book_documents');
        //add this line for join
        //$this->datatables->join('table2', 'book_documents.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('book_documents/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data'))." 
            ".anchor(site_url('book_documents/update/$1'),'<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data'))." 
                ".anchor(site_url('book_documents/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger hapus" title="Hapus Data"'), 'id');
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
		$this->db->or_like('authors', $q);
		$this->db->or_like('authors_id', $q);
		$this->db->or_like('category', $q);
		$this->db->or_like('isbn', $q);
		$this->db->or_like('place', $q);
		$this->db->or_like('publisher', $q);
		$this->db->or_like('title', $q);
		$this->db->or_like('year', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
		$this->db->or_like('authors', $q);
		$this->db->or_like('authors_id', $q);
		$this->db->or_like('category', $q);
		$this->db->or_like('isbn', $q);
		$this->db->or_like('place', $q);
		$this->db->or_like('publisher', $q);
		$this->db->or_like('title', $q);
		$this->db->or_like('year', $q);
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

/* End of file Book_documents_model.php */
/* Location: ./application/models/Book_documents_model.php */
/* Created at 2024-01-03 03:12:22 */
/* Please DO NOT modify this information : */