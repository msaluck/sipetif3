<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

	public $table = 'users';
	public $id = 'id';
	public $order = 'DESC';
	public $username = 'username';

	function __construct()
	{
		parent::__construct();
	}

	// datatables
	function json()
	{
		$this->datatables->select('id,user_type_id,faculty_id,department_id,email,name,username,password');
		$this->datatables->from('users');
		//add this line for join
		//$this->datatables->join('table2', 'users.field = table2.field');
		$this->datatables->add_column('action', anchor(site_url('users/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data')) . " 
            " . anchor(site_url('users/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data')) . " 
                " . anchor(site_url('users/delete/$1'), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger hapus" title="Hapus Data"'), 'id');
		return $this->datatables->generate();
	}

	function get_by_username($username)
	{
		$this->db->where($this->username, $username);
		return $this->db->get($this->table)->row_array();
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
		$this->db->or_like('user_type_id', $q);
		$this->db->or_like('faculty_id', $q);
		$this->db->or_like('department_id', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('name', $q);
		$this->db->or_like('username', $q);
		$this->db->or_like('password', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// get data with limit and search
	function get_limit_data($limit, $start = 0, $q = NULL)
	{
		$this->db->order_by($this->id, $this->order);
		$this->db->like('id', $q);
		$this->db->or_like('user_type_id', $q);
		$this->db->or_like('faculty_id', $q);
		$this->db->or_like('department_id', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('name', $q);
		$this->db->or_like('username', $q);
		$this->db->or_like('password', $q);
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

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
/* Created at 2023-05-24 07:01:10 */
/* Please DO NOT modify this information : */