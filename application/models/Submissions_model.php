<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submissions_model extends CI_Model
{

    public $table = 'submissions';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id,submission_type_id,submission_status_id,user_id,submission_date');
        $this->datatables->from('submissions');
        $this->datatables->join('submission_types', 'submissions.submission_type_id = submission_types.id');
        $this->datatables->select('description');
        //$this->datatables->join('submission_types', 'submissions.submission_status_id = submission_statuses.id');
        //$this->datatables->select('description');
        $this->datatables->add_column('action', anchor(site_url('submissions/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data')) . " 
            " . anchor(site_url('submissions/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data')) . " 
                " . anchor(site_url('submissions/delete/$1'), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger hapus" title="Hapus Data"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('submissions.id', 'ASC');
        $this->db->select('submissions.id, submissions.submission_type_id, types.description as type_desc, submissions.submission_status_id, status.description as status_desc, users.name, submission_date');
        $this->db->from('submissions');
        $this->db->join('submission_types types', 'submissions.submission_type_id = types.id');
        $this->db->join('submission_statuses status', 'submissions.submission_status_id = status.id');
        $this->db->join('users', 'submissions.user_id = users.id');
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get detail data by id
    function get_detail_by_id($id)
    {
        $this->db->select('submission_type_details.name as name, submission_type_details.description as desc, submission_details.value as value');
        $this->db->from('submission_details');
        $this->db->join('submission_type_details', 'submission_details.submission_type_detail_id = submission_type_details.id');
        $this->db->where('submission_details.submission_id', $id);
        return $this->db->get()->result();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('submission_type_id', $q);
        $this->db->or_like('submission_status_id', $q);
        $this->db->or_like('user_id', $q);
        $this->db->or_like('submission_date', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('submission_type_id', $q);
        $this->db->or_like('submission_status_id', $q);
        $this->db->or_like('user_id', $q);
        $this->db->or_like('submission_date', $q);
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

/* End of file Submissions_model.php */
/* Location: ./application/models/Submissions_model.php */
/* Created at 2023-03-15 13:03:15 */
/* Please DO NOT modify this information : */