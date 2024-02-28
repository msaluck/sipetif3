<?php
defined('BASEPATH') or exit('No direct script access allowed');

class surat_pengantar_dekan_model extends CI_Model
{

    public $table = 'surat_pengantar_dekan';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id,submission_id,nomor_surat,hal,nama_jurnal,tanggal_surat,createdate');
        $this->datatables->from('surat_pengantar_dekan');
        //add this line for join
        //$this->datatables->join('table2', 'surat_pengantar_dekan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('surat_pengantar_dekan/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data')) . " 
            " . anchor(site_url('surat_pengantar_dekan/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data')) . " 
                " . anchor(site_url('surat_pengantar_dekan/delete/$1'), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger hapus" title="Hapus Data"'), 'id');
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
        print_r($id);
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('submission_id', $q);
        $this->db->or_like('nomor_surat', $q);
        $this->db->or_like('hal', $q);
        $this->db->or_like('nama_jurnal', $q);
        $this->db->or_like('tanggal_surat', $q);
        $this->db->or_like('createdate', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('submission_id', $q);
        $this->db->or_like('nomor_surat', $q);
        $this->db->or_like('hal', $q);
        $this->db->or_like('nama_jurnal', $q);
        $this->db->or_like('tanggal_surat', $q);
        $this->db->or_like('createdate', $q);
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

/* End of file surat_pengantar_dekan_model.php */
/* Location: ./application/models/surat_pengantar_dekan_model.php */
/* Created at 2023-12-26 02:21:16 */
/* Please DO NOT modify this information : */