<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submissions extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Submissions_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = site_url() . 'submissions/?q=' . urlencode($q);
            $config['first_url'] = site_url() . 'submissions/?q=' . urlencode($q);
        } else {
            $config['base_url'] = site_url() . 'submissions';
            $config['first_url'] = site_url() . 'submissions';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Submissions_model->total_rows($q);
        $submissions = $this->Submissions_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'submissions_data' => $submissions,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('layout/master', 'submissions/submissions_list', $data);
    }

    function surat_pengantar_dekan($id)
    {
        $id_user = $this->session->id_user;
        $cek_profile = $this->db->get_where("users", ['id' => $id_user])->row();
        if ($cek_profile) {
            $row = $this->db->query("select a.*, b.name as status_name, c.email from submissions a,submission_statuses b,users c where a.submission_status = b.id and a.id = '$id' and a.user_id = c.id")->row();
            if ($row) {
                if ($cek_profile->faculty_id == null || $cek_profile->department_id == null) {
                    $this->session->set_flashdata('swal-error', 'Lengkapi Biodata Anda');
                    redirect(site_url('submissions/read/' . $id));
                } else {
                    $cek_data = $this->db->get_where('surat_pengantar_dekan', ['submission_id' => $id])->row();
                    $row_submission = $this->db->query("select a.*,b.name as status_name,c.email from submissions a,submission_statuses b,users c where a.submission_status = b.id and a.id = '$id' and a.user_id = c.id")->row();
                    $namatabel = $row_submission->portfolio_database;
                    $get_title = $this->db->query("select title from $namatabel where id ='$row_submission->portfolio_id'")->row();
                    if ($get_title) {
                        $title = $get_title->title;
                    } else {
                        $title = '';
                    }
                    if ($cek_data) {
                        $data_surat = array(
                            'id' => $cek_data->id,
                            'submission_id' => $cek_data->submission_id,
                            'nomor_surat' => $cek_data->nomor_surat,
                            'hal' => $cek_data->hal,
                            'nama_jurnal' => $cek_data->nama_jurnal,
                            'tanggal_surat' => $cek_data->tanggal_surat,
                            'createdate' => $cek_data->createdate,
                            'acc_dekan' => $cek_data->acc_dekan,
                        );
                        $this->template->load('layout/master', 'surat_pengantar_dekan/surat_pengantar_dekan_read', $data_surat);
                    } else {
                        $data_surat = array(
                            'button' => 'Tambah',
                            'action' => site_url('surat_pengatar_dekan/create_action'),
                            'id' => set_value('id'),
                            'submission_id' => $id,
                            'nomor_surat' => set_value('nomor_surat'),
                            'hal' => 'Surat Pengantar Permohonan Pengajuan Insentif Karya Ilmiah ' . str_replace('_', ' ', $namatabel),
                            'nama_jurnal' => $title,
                            'tanggal_surat' => date('Y-m-d'),
                        );
                        $this->template->load('layout/master', 'surat_pengantar_dekan/surat_pengantar_dekan_form', $data_surat);
                    }
                }
            }
        }
    }

    function surat_pernyataan_lppm($id)
    {
        $id_user = $this->session->id_user;
        $cek_profile = $this->db->get_where("users", ['id' => $id_user])->row();
        if ($cek_profile) {
            $row = $this->db->query("select a.*,b.name as status_name,c.email from submissions a,submission_statuses b,users c where a.submission_status = b.id and a.id = '$id' and a.user_id = c.id")->row();
            if ($row) {
                if ($cek_profile->faculty_id == null || $cek_profile->department_id == null) {
                    $this->session->set_flashdata('swal-error', 'Lengkapi Biodata Anda');
                    redirect(site_url('submissions/read/' . $id));
                } else {
                    $cek_data = $this->db->get_where('surat_pernyataan_lppm', ['submission_id' => $id])->row();
                    $row_submission = $this->db->query("select a.*,b.name as status_name,c.email from submissions a,submission_statuses b,users c where a.submission_status = b.id and a.id = '$id' and a.user_id = c.id")->row();
                    $namatabel = $row_submission->portfolio_database;
                    $get_title = $this->db->query("select title from $namatabel where id ='$row_submission->portfolio_id'")->row();
                    if ($get_title) {
                        $title = $get_title->title;
                    } else {
                        $title = '';
                    }
                    if ($cek_data) {
                        $data_surat = array(
                            'id' => $cek_data->id,
                            'submission_id' => $cek_data->submission_id,
                            'nomor_surat' => $cek_data->nomor_surat,
                            'hal' => $cek_data->hal,
                            'nama_jurnal' => $cek_data->nama_jurnal,
                            'tanggal_surat' => $cek_data->tanggal_surat,
                            'createdate' => $cek_data->createdate,
                            'acc_lppm' => $cek_data->acc_lppm,
                        );
                        $this->template->load('layout/master', 'surat_pernyataan_lppm/surat_pernyataan_lppm_read', $data_surat);
                    } else {
                        $data_surat = array(
                            'button' => 'Tambah',
                            'action' => site_url('surat_pernyataan_lppm/create_action'),
                            'id' => set_value('id'),
                            'submission_id' => $id,
                            'nomor_surat' => set_value('nomor_surat'),
                            'hal' => 'Surat Pengantar Permohonan Pengajuan Insentif Karya Ilmiah ' . str_replace('_', ' ', $namatabel),
                            'nama_jurnal' => $title,
                            'tanggal_surat' => date('Y-m-d'),
                        );
                        $this->template->load('layout/master', 'surat_pernyataan_lppm/surat_pernyataan_lppm_form', $data_surat);
                    }
                }
            }
        }
    }

    function surat_permohonan_rektor($id)
    {
        $id_user = $this->session->id_user;
        $cek_profile = $this->db->get_where("users", ['id' => $id_user])->row();
        if ($cek_profile) {
            $row = $this->db->query("select a.*,b.name as status_name,c.email from submissions a,submission_statuses b,users c where a.submission_status = b.id and a.id = '$id' and a.user_id = c.id")->row();
            if ($row) {
                if ($cek_profile->faculty_id == null || $cek_profile->department_id == null) {
                    $this->session->set_flashdata('swal-error', 'Lengkapi Biodata Anda');
                    redirect(site_url('submissions/read/' . $id));
                } else {
                    $cek_data = $this->db->get_where('surat_pengantar_dekan', ['submission_id' => $id])->row();
                    $row_submission = $this->db->query("select a.*,b.name as status_name,c.email from submissions a,submission_statuses b,users c where a.submission_status = b.id and a.id = '$id' and a.user_id = c.id")->row();
                    $namatabel = $row_submission->portfolio_database;
                    $get_title = $this->db->query("select title from $namatabel where id ='$row_submission->portfolio_id'")->row();
                    if ($get_title) {
                        $title = $get_title->title;
                    } else {
                        $title = '';
                    }
                    if ($cek_data) {
                        $data_surat = array(
                            'id' => $cek_data->id,
                            'submission_id' => $cek_data->submission_id,
                            'nomor_surat' => $cek_data->nomor_surat,
                            'hal' => $cek_data->hal,
                            'nama_jurnal' => $cek_data->nama_jurnal,
                            'tanggal_surat' => $cek_data->tanggal_surat,
                            'createdate' => $cek_data->createdate,
                            'acc_dekan' => $cek_data->acc_dekan,
                        );
                        $this->template->load('layout/master', 'surat_pengatar_dekan/surat_pengatar_dekan_read', $data_surat);
                    } else {
                        $data_surat = array(
                            'button' => 'Tambah',
                            'action' => site_url('surat_pengatar_dekan/create_action'),
                            'id' => set_value('id'),
                            'submission_id' => $id,
                            'nomor_surat' => set_value('nomor_surat'),
                            'hal' => 'Surat Pengantar Permohonan Pengajuan Insentif Karya Ilmiah ' . str_replace('_', ' ', $namatabel),
                            'nama_jurnal' => $title,
                            'tanggal_surat' => date('Y-m-d'),
                        );
                        $this->template->load('layout/master', 'surat_pengatar_dekan/surat_pengatar_dekan_form', $data_surat);
                    }
                }
            }
        }
    }

    public function by_users()
    {
        $id_user = $this->session->id_user;
        $get_sub_user = $this->db->query("select a.*,b.name as status_name from submissions a,submission_statuses b where a.submission_status = b.id and a.user_id = '$id_user'")->result();
        $data = ['submissions_data' => $get_sub_user];
        $this->template->load('layout/master', 'submissions/submissions_by_user', $data);
    }

    public function by_all()
    {
        $this->index();
    }

    public function read($id)
    {
        // $row = $this->Submissions_model->get_by_id($id);
        $row = $this->db->query("select a.*, b.name as status_name, c.email from submissions a, submission_statuses b, users c where a.submission_status = b.id and a.id = '$id' and a.user_id = c.id")->row();
        if ($row) {
            $namatabel = $row->portfolio_database;
            $get_title = $this->db->query("select title from $namatabel where id ='$row->portfolio_id'")->row();
            if ($get_title) {
                $title = $get_title->title;
            } else {
                $title = '';
            }
            $cek_status_dekan = $this->db->query("select id,acc_dekan from surat_pengantar_dekan where submission_id='$id'")->row();
            if ($cek_status_dekan) {
                if ($cek_status_dekan->acc_dekan != null) {
                    $status_dekan = 'SELESAI';
                } else {
                    $status_dekan = 'PROSES';
                }
            } else {
                $status_dekan = 'BELUM';
            }
            $cek_status_lppm = $this->db->query("select id, acc_lppm from surat_pernyataan_lppm where submission_id = '$id'")->row();
            if ($cek_status_lppm) {
                if ($cek_status_lppm->acc_lppm != null) {
                    $status_lppm = 'SELESAI';
                } else {
                    $status_lppm = 'PROSES';
                }
            } else {
                $status_lppm = 'BELUM';
            }
            $cek_status_rektor = $this->db->query("select id, acc_lppm from surat_pernyataan_lppm where submission_id = '$id'")->row();
            if ($cek_status_rektor) {
                if ($cek_status_rektor->acc_rektor != null) {
                    $status_rektor = 'SELESAI';
                } else {
                    $status_rektor = 'PROSES';
                }
            } else {
                $status_rektor = 'BELUM';
            }
            $data = array(
                'id' => $row->id,
                'portfolio_database' => $row->portfolio_database,
                'portfolio_id' => $row->id,
                'portofolio_title' => $title,
                'submission_status' => $row->status_name,
                'user_id' => $row->email,
                'status_dekan'  => $status_dekan,
                'status_lppm' => $status_lppm,
                'status_rektor' => $status_rektor
            );
            $this->template->load('layout/master', 'submissions/submissions_read', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submissions'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('submissions/create_action'),
            'id' => set_value('id'),
            'portfolio_database' => set_value('portfolio_database'),
            'portfolio_id' => set_value('portfolio_id'),
            'submission_status' => set_value('submission_status'),
            'user_id' => set_value('user_id'),
        );
        $this->template->load('layout/master', 'submissions/submissions_form', $data);
    }

    public function create_action()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->create();
        // } else {
        //     $data = array(
        //         'portfolio_database' => $this->input->post('portfolio_database', TRUE),
        //         'portfolio_id' => $this->input->post('portfolio_id', TRUE),
        //         'submission_status' => $this->input->post('submission_status', TRUE),
        //         'user_id' => $this->input->post('user_id', TRUE),
        //     );

        //     $this->Submissions_model->insert($data);
        //     $this->session->set_flashdata('toastr-success', 'Berhasil Tambah Data');
        //     redirect(site_url('submissions'));
        //  }
    }

    public function submit($id, $table)
    {
        $cek_data = $this->db->get_where(
            'submissions',
            [
                'portfolio_id' => $id,
                'user_id' => $this->session->id_user
            ]
        )->num_rows();
        if ($cek_data == 0) {
            $data = array(
                'portfolio_database' => $table,
                'portfolio_id' => $id,
                'submission_status' => 1,
                'user_id' => $this->session->id_user,
                'created_at'    => date('Y-m-d H:i:s')
            );
            $this->db->insert('submissions', $data);
            $latest_id = $this->db->insert_id();
            $update = $this->db->query("update $table set idsubmission ='$latest_id' where id='$id'");
        }

        $this->session->set_flashdata('toastr-success', 'Portofolio Berhasil diajukan');
        redirect(site_url('submissions/by_users'));
    }

    public function update($id)
    {
        $row = $this->Submissions_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('submissions/update_action'),
                'id' => set_value('id', $row->id),
                'portfolio_database' => set_value('portfolio_database', $row->portfolio_database),
                'portfolio_id' => set_value('portfolio_id', $row->portfolio_id),
                'submission_status' => set_value('submission_status', $row->submission_status),
                'user_id' => set_value('user_id', $row->user_id),
            );
            $this->template->load('layout/master', 'submissions/submissions_form', $data);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect(site_url('submissions'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'portfolio_database' => $this->input->post('portfolio_database', TRUE),
                'portfolio_id' => $this->input->post('portfolio_id', TRUE),
                'submission_status' => $this->input->post('submission_status', TRUE),
                'user_id' => $this->input->post('user_id', TRUE),
            );

            $this->Submissions_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('toastr-success', 'Berhasil Ubah Data');
            redirect(site_url('submissions'));
        }
    }

    public function delete($id)
    {
        $row = $this->Submissions_model->get_by_id($id);

        if ($row) {
            $table = $row->portfolio_database;
            $update = $this->db->query("update $table set idsubmission = null where idsubmission='$row->id'");
            $this->Submissions_model->delete($id);
            $this->session->set_flashdata('toastr-success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('toastr-error', 'Data Tidak Ditemukan');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('portfolio_database', 'portfolio database', 'trim|required');
        $this->form_validation->set_rules('portfolio_id', 'portfolio id', 'trim|required');
        $this->form_validation->set_rules('submission_status', 'submission status', 'trim|required');
        $this->form_validation->set_rules('user_id', 'user id', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Submissions.php */
/* Location: ./application/controllers/Submissions.php */
/* Created at 2023-12-25 23:10:51 */
/* Please DO NOT modify this information : */