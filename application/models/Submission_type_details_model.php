<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submission_type_details_model extends CI_Model
{

    public $table = 'submission_type_details';
    public $id = 'id';
    public $submission_type_id = 'submission_type_id';
    public $type = 'type';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id,submission_type_id,name,type,description');
        $this->datatables->from('submission_type_details');
        //add this line for join
        //$this->datatables->join('table2', 'submission_type_details.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('submission_type_details/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data')) . " 
            " . anchor(site_url('submission_type_details/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data')) . " 
                " . anchor(site_url('submission_type_details/delete/$1'), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger hapus" title="Hapus Data"'), 'id');
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

    // get data by submission type id and type
    function get_by_submission_type_id($submission_type_id, $type)
    {
        $this->db->where($this->submission_type_id, $submission_type_id);
        $this->db->where($this->type, $type);
        return $this->db->get($this->table)->row_array();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('submission_type_id', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('type', $q);
        $this->db->or_like('description', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('submission_type_id', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('type', $q);
        $this->db->or_like('description', $q);
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

/* End of file Submission_type_details_model.php */
/* Location: ./application/models/Submission_type_details_model.php */
/* Created at 2023-03-08 04:07:04 */
/* Please DO NOT modify this information : */