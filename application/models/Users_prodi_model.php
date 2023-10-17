<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_prodi_model extends CI_Model
{

    public $table = 'users_prodi';
    public $id = 'id_user';
    public $id2 = 'kodeprodi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id_user,kodeprodi');
        $this->datatables->from('users_prodi');
        //add this line for join
        //$this->datatables->join('table2', 'users_prodi.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('users_prodi/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data')) . " 
            " . anchor(site_url('users_prodi/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data')) . " 
                " . anchor(site_url('users_prodi/delete/$1'), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger hapus" title="Hapus Data"'), 'id_user');
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
        $this->db->like('id_user', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_user', $q);
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
    function delete($id, $id2)
    {
        $this->db->where($this->id, $id);
        $this->db->where($this->id2, $id2);
        $this->db->delete($this->table);
    }
}

/* End of file Users_prodi_model.php */
/* Location: ./application/models/Users_prodi_model.php */
/* Created at 2023-02-28 07:04:13 */
/* Please DO NOT modify this information : */