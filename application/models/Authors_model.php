<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authors_model extends CI_Model
{

    public $table = 'authors';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id,nidn,fullname,country,academic_grade_raw,academic_grade,gelar_depan,gelar_belakang,last_education,sinta_score_v2_overall,sinta_score_v2_3year,sinta_score_v3_overall,sinta_score_v3_3year,affiliation_score_v3_overall,affiliation_score_v3_3year,affiliation_id,waktu_update,waktu_update_wos,waktu_update_garuda,waktu_update_google,waktu_update_ipr,waktu_update_book,waktu_update_research,waktu_update_service,waktu_update_profile,keterangan_cek_profile');
        $this->datatables->from('authors');
        //add this line for join
        //$this->datatables->join('table2', 'authors.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('authors/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data')) . " 
            " . anchor(site_url('authors/update/$1'), '<i class="fa fa-edit" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data')) . " 
                " . anchor(site_url('authors/delete/$1'), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger hapus" title="Hapus Data"'), 'id');
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
        $this->db->like('id', $q);
        $this->db->or_like('nidn', $q);
        $this->db->or_like('fullname', $q);
        $this->db->or_like('country', $q);
        $this->db->or_like('academic_grade_raw', $q);
        $this->db->or_like('academic_grade', $q);
        $this->db->or_like('gelar_depan', $q);
        $this->db->or_like('gelar_belakang', $q);
        $this->db->or_like('last_education', $q);
        $this->db->or_like('sinta_score_v2_overall', $q);
        $this->db->or_like('sinta_score_v2_3year', $q);
        $this->db->or_like('sinta_score_v3_overall', $q);
        $this->db->or_like('sinta_score_v3_3year', $q);
        $this->db->or_like('affiliation_score_v3_overall', $q);
        $this->db->or_like('affiliation_score_v3_3year', $q);
        $this->db->or_like('affiliation_id', $q);
        $this->db->or_like('waktu_update', $q);
        $this->db->or_like('waktu_update_wos', $q);
        $this->db->or_like('waktu_update_garuda', $q);
        $this->db->or_like('waktu_update_google', $q);
        $this->db->or_like('waktu_update_ipr', $q);
        $this->db->or_like('waktu_update_book', $q);
        $this->db->or_like('waktu_update_research', $q);
        $this->db->or_like('waktu_update_service', $q);
        $this->db->or_like('waktu_update_profile', $q);
        $this->db->or_like('keterangan_cek_profile', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('nidn', $q);
        $this->db->or_like('fullname', $q);
        $this->db->or_like('country', $q);
        $this->db->or_like('academic_grade_raw', $q);
        $this->db->or_like('academic_grade', $q);
        $this->db->or_like('gelar_depan', $q);
        $this->db->or_like('gelar_belakang', $q);
        $this->db->or_like('last_education', $q);
        $this->db->or_like('sinta_score_v2_overall', $q);
        $this->db->or_like('sinta_score_v2_3year', $q);
        $this->db->or_like('sinta_score_v3_overall', $q);
        $this->db->or_like('sinta_score_v3_3year', $q);
        $this->db->or_like('affiliation_score_v3_overall', $q);
        $this->db->or_like('affiliation_score_v3_3year', $q);
        $this->db->or_like('affiliation_id', $q);
        $this->db->or_like('waktu_update', $q);
        $this->db->or_like('waktu_update_wos', $q);
        $this->db->or_like('waktu_update_garuda', $q);
        $this->db->or_like('waktu_update_google', $q);
        $this->db->or_like('waktu_update_ipr', $q);
        $this->db->or_like('waktu_update_book', $q);
        $this->db->or_like('waktu_update_research', $q);
        $this->db->or_like('waktu_update_service', $q);
        $this->db->or_like('waktu_update_profile', $q);
        $this->db->or_like('keterangan_cek_profile', $q);
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

    function truncate()
    {
        $this->db->truncate($this->table);
    }
}

/* End of file Authors_model.php */
/* Location: ./application/models/Authors_model.php */
/* Created at 2023-12-31 18:49:18 */
/* Please DO NOT modify this information : */