<?php defined('BASEPATH') or exit('no direct access');


function detail_cpmk($idkomponen)
{
	$CI = &get_instance();
	$row = $CI->db->query("select a.*,b.keterangan_cpmk,b.nama_cpmk from komponen_cpmk a,cpmk b where a.idcpmk = b.idcpmk and a.idkomponen ='$idkomponen'")->result();
	return $row;
}

function detail_cpmk_nilai($id, $id2)
{
	$CI = &get_instance();
	$row = $CI->db->query("select a.* from nilai_detail a,cpmk b where a.id_nilai ='$id' and a.idcpmk = b.idcpmk and a.idkomponen = $id2")->result();
	return $row;
}

function jml_detail_cpmk($idkomponen)
{
	$CI = &get_instance();
	$row = $CI->db->query("select count(idcpmk) as j from komponen_cpmk where idkomponen ='$idkomponen'")->row();
	if ($row->j > 0) {
		return $row->j + 2;
	} else {
		return 0 + 2;
	}
}

function jml_detail_cpmk_nilai($id, $id2)
{
	$CI = &get_instance();
	$row = $CI->db->query("select count(idcpmk) as j from nilai_detail where id_nilai ='$id' and idkomponen ='$id2'")->row();
	if ($row->j > 0) {
		# code..
		return $row->j + 2;
	} else {
		return 0 + 2;
	}
}

function display_nilai($id, $kom, $cpmk)
{

	$CI = &get_instance();
	$CI->db->select("id,nilai,bobot");

	$CI->db->where('id_nilai', $id);
	$CI->db->where('idcpmk', $cpmk);
	$CI->db->where('idkomponen', $kom);
	$x = $CI->db->get("nilai_detail")->row();
	if (empty($x)) {
		$x = new stdClass();
		$x->bobot = 0;
		$x->id = 0;
		$x->nilai = 0;
		return $x;
	} else {
		if ($x->nilai == null) {
			$x->nilai = 0;
		}
		if ($x->bobot == null) {
			$x->bobot = 0;
		}
		return $x;
	}
}

function cek_nilai_detail($id_nilai, $idkomponen, $idcpmk)
{
	$CI = &get_instance();
	$CI->load->model('Nilai_model');
	$CI->load->model('Nilai_detail_model');
	$where = array(
		'id_nilai' => $id_nilai,
		'idcpmk' => $idcpmk,
		'idkomponen' => $idkomponen,
	);

	$get_nilai = $CI->db->query("select * from nilai where id='$id_nilai'")->row();
	$kode_mata_kuliah = $get_nilai->kode_mata_kuliah;

	$CI->db->trans_start(); # Starting Transaction
	$CI->db->trans_strict(FALSE); # See Note 01. 


	$cek = $CI->Nilai_detail_model->cek_data($where);
	$bobot = $CI->Cpmk_model->get_by_id($idcpmk);
	$get_cpmk_komponen = $CI->db->get_where('komponen_cpmk', ['idcpmk' => $idcpmk, 'idkomponen' => $idkomponen])->row();
	// print_r($cek);die();

	if (empty($cek) and $get_cpmk_komponen) {
		//jika blm ada nilai detail
		$komponen = $CI->db->query("select * from komponen_penilaian a where a.idkomponen ='" . $idkomponen . "'")->row();
		$nilai_bobot = round(0 * ($get_cpmk_komponen->bobot_komponen_cpmk / 100), 1);
		$bobotnya = $get_cpmk_komponen->bobot_komponen_cpmk;
		$data = array(
			'id_nilai' => $id_nilai,
			'idcpmk' => $idcpmk,
			'idkomponen' => $idkomponen,
			'nilai' => 0,
			'bobot' => $nilai_bobot,
			'nama_komponen' => $komponen->nama_komponen,
			'bobot_komponen' => $komponen->bobot_komponen,
			'bobot_komponen_cpmk'	=> $bobotnya,
			'keterangan_cpmk'	=> $bobot->keterangan_cpmk,
			'nama_cpmk'			=> $bobot->nama_cpmk
		);
		$CI->Nilai_detail_model->insert($data);
		$insert_id = $CI->db->insert_id();
		$cek_cpl = $CI->Cpl_model->get_by_cpmk($idcpmk);
		foreach ($cek_cpl as $cpl) {
			$id_master_cpl = $cpl->idcpl;
			$get_final_cpl_mk = $CI->db->get_where('final_cpl_mk', ['id_master_cpl' => $id_master_cpl, 'kode_mata_kuliah' => $kode_mata_kuliah])->row();
			if ($get_final_cpl_mk) {
				$nx = doubleDigit($nilai_bobot * ($cpl->bobot_cpmk_cpl / 100));
				$datacpl = array(
					'id_detail' => $insert_id,
					'nilai' => $nx,
					'id_master_cpl' => $id_master_cpl,
					'sumbangan_cpmk_cpl' => $cpl->bobot_cpmk_cpl,
					'final_cpl'			=> $get_final_cpl_mk->final_cpl,
				);

				if ($cpl->bobot_cpmk_cpl == 0 || $bobotnya == 0 || $komponen->bobot_komponen == 0) {
					$datacpl['sumbangan'] = 0;
				} else {
					$datacpl['sumbangan'] = doubleDigit((0 * ($bobotnya / 100) * ($cpl->bobot_cpmk_cpl / 100) * ($komponen->bobot_komponen / 100)) / $cpl->bobot_cpmk_cpl * $get_final_cpl_mk->final_cpl);
				}
				$CI->Nilai_detail_cpl_model->insert($datacpl);
			}
		}
		//die();


		if ($CI->db->trans_status() === FALSE) {
			$CI->db->trans_rollback();
			return FALSE;
		} else {
			$CI->db->trans_commit();
		}
		// print_r($cek_cpl);

	} else {
		//jika sudah ada datanya


	}
}
