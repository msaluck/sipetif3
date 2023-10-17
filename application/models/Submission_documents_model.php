<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submission_documents_model extends CI_Model
{

    public $table = 'submission_documents';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('file_name,file_path,file_size,file_type,id,original_name,status,submission_id,submission_type_detail_id,uploaded_at');
        $this->datatables->from('submission_documents');
        //add this line for join
        //$this->datatables->join('table2', 'submission_documents.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('submission_documents/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data'))." 
            ".anchor(site_url('submission_documents/update/$1'),'<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data'))." 
                ".anchor(site_url('submission_documents/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger hapus" title="Hapus Data"'), 'id');
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
		$this->db->or_like('file_name', $q);
		$this->db->or_like('file_path', $q);
		$this->db->or_like('file_size', $q);
		$this->db->or_like('file_type', $q);
		$this->db->or_like('original_name', $q);
		$this->db->or_like('status', $q);
		$this->db->or_like('submission_id', $q);
		$this->db->or_like('submission_type_detail_id', $q);
		$this->db->or_like('uploaded_at', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
		$this->db->or_like('file_name', $q);
		$this->db->or_like('file_path', $q);
		$this->db->or_like('file_size', $q);
		$this->db->or_like('file_type', $q);
		$this->db->or_like('original_name', $q);
		$this->db->or_like('status', $q);
		$this->db->or_like('submission_id', $q);
		$this->db->or_like('submission_type_detail_id', $q);
		$this->db->or_like('uploaded_at', $q);
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

/* End of file Submission_documents_model.php */
/* Location: ./application/models/Submission_documents_model.php */
/* Created at 2023-05-27 07:33:45 */
/* Please DO NOT modify this information : */