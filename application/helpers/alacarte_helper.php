<?php defined('BASEPATH') or exit('no direct access');

function kunci_rahasia()
{
	$kunci = 'Yhn7j3k';
	return $kunci;
}

function call_datatable($table)
{
	$dt = "
	<script type=\"text/javascript\">
	\$(document).ready(function () {
		\$('" . $table . "').DataTable({
			responsive: true,
			pageLength: 10
			});
			});
			</script>";
	return $dt;
}

function google_oauth_key()
{
	$data['client_id'] = "633182327253-oq7htahbbc3pkq4p17rq41neqmepp7q5.apps.googleusercontent.com";
	$data['client_secret'] = "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";
	$data['url'] = "http://localhost/sipetif3/login";
	return $data;
}


function call_datatable_old($table)
{
	$dt = "
	<script type=\"text/javascript\">
	\$(document).ready(function () {
		\$('" . $table . "').DataTable({
			pageLength: 50
			});
			});
			</script>";
	return $dt;
}

function get_tahun_ajar()
{
	$CI = &get_instance();
	$data = $CI->db->get_where('tahun_ajar', ['is_active' => 1])->row();
	return $data;
}

function akses_role($nama_role)
{
	$CI = &get_instance();
	$get_id_user = $CI->db->get_where('role');
	$id_user = $CI->session->id_user;
	$data = $CI->db->query("select a.*,b.name from user_role a,role b where a.role_id = b.id and a.user_id ='$id_user' and b.name ='$nama_role'")->num_rows();

	return $data;
}

function insert_bobot_komponen_penilaian_subcpmk($idcpmk, $idjenis_komponen, $kode_mata_kuliah, $kodetahunakadkul, $bobot_komponen_penilaian_subcpmk)
{
	$CI = &get_instance();
	$delete = $CI->db->query("delete from bobot_komponen_penilaian_subcpmk where idcpmk='$idcpmk' and idjenis_komponen='$idjenis_komponen' and kode_mata_kuliah='$kode_mata_kuliah' and kodetahunakadkul='$kodetahunakadkul'");
	$data = [
		'idcpmk'			=> $idcpmk,
		'idjenis_komponen'	=> $idjenis_komponen,
		'kode_mata_kuliah'	=> $kode_mata_kuliah,
		'kodetahunakadkul'	=> $kodetahunakadkul,
		'bobot_komponen_penilaian_subcpmk'	=> $bobot_komponen_penilaian_subcpmk
	];

	$CI->db->insert('bobot_komponen_penilaian_subcpmk', $data);
}

function insert_bobot_komponen_penilaian($idjenis_komponen, $kode_mata_kuliah, $kodetahunakadkul, $bobot_komponen_penilaian)
{
	$CI = &get_instance();
	$delete = $CI->db->query("delete from bobot_komponen_penilaian where idjenis_komponen='$idjenis_komponen' and kode_mata_kuliah='$kode_mata_kuliah' and kodetahunakadkul='$kodetahunakadkul'");
	$data = [
		'idjenis_komponen'	=> $idjenis_komponen,
		'kode_mata_kuliah'	=> $kode_mata_kuliah,
		'kodetahunakadkul'	=> $kodetahunakadkul,
		'bobot_komponen_penilaian'	=> $bobot_komponen_penilaian
	];

	$CI->db->insert('bobot_komponen_penilaian', $data);
}



function sinkron_cpl()
{
	// $CI = &get_instance();
	// $datas = $CI->db->query("select * from cpl where nilai_cpl !=0")->result();
	// foreach ($datas as $value) {
	// 	$id = $value->id;
	// 	$idcpmk = $value->idcpmk;
	// 	$get_cpmk = $CI->db->query("select kode_mata_kuliah from cpmk where idcpmk='$idcpmk'")->row();
	// 	if ($get_cpmk) {
	// 		$kode_mata_kuliah = $get_cpmk->kode_mata_kuliah;
	// 		$get_mata_kuliah = $CI->db->query("select * from mata_kuliah where kode_mata_kuliah='$kode_mata_kuliah'")->row();
	// 		if ($get_mata_kuliah) {
	// 			$sks = $get_mata_kuliah->sks;
	// 			$jenis = $get_mata_kuliah->jenis;
	// 			if ($jenis == 'wajib') {
	// 				$id_master_cpl = $value->id_master_cpl;
	// 				$nilai_cpl = $value->nilai_cpl;
	// 				$cek_total = $CI->db->query("select sum(nilai_cpl) as total_nilai_cpl from cpl where id_master_cpl='$id_master_cpl'")->row();
	// 				if ($cek_total) {
	// 					$total_nilai_cpl = $cek_total->total_nilai_cpl;
	// 				} else {
	// 					$total_nilai_cpl = 0;
	// 				}
	// 				$cplnya = $nilai_cpl / $total_nilai_cpl;
	// 				//hitung total sks
	// 				$cek_total_sks = $CI->db->query("select sum(a.sks)as total_sks from mata_kuliah a,cpmk b,cpl c where a.kode_mata_kuliah=b.kode_mata_kuliah and b.idcpmk=c.idcpmk and c.id_master_cpl='$id_master_cpl' and nilai_cpl !=0")->row();
	// 				if ($cek_total_sks) {
	// 					$total_sks = $cek_total_sks->total_sks;
	// 				} else {
	// 					$total_sks = $sks;
	// 				}
	// 				$sks_cpl = $sks / $total_sks;

	// 				//hitung koreksi
	// 				$koreksi = $cplnya / $sks_cpl;

	// 				//hitung final
	// 				$cek_koreksi_cpl = $CI->db->query("select sum(a.koreksi_cpl)as total_koreksi from cpl a where a.id_master_cpl='$id_master_cpl' and id!='$id'")->row();
	// 				if ($cek_koreksi_cpl) {
	// 					$total_koreksi = $cek_koreksi_cpl->total_koreksi + $koreksi;
	// 				} else {
	// 					$total_koreksi = $koreksi;
	// 				}

	// 				$final = $koreksi / $total_koreksi;

	// 				$data_edit = array(
	// 					'idcpmk' => $idcpmk,
	// 					'id_master_cpl' => $id_master_cpl,
	// 					'nilai_cpl' => str_replace(',','.',$nilai_cpl),
	// 					'cplnya' => str_replace(',','.',$cplnya),
	// 					'sks_cpl'   => str_replace(',','.',$sks_cpl),
	// 					'koreksi_cpl'   => str_replace(',','.',$koreksi),
	// 					'final_cpl' => str_replace(',','.',round($final,2))
	// 				);
	// 				// print_r($data);
	// 				//$CI->Cpl_model->update($id, $data);

	//     $CI->db->where('id', $id);
	//     $CI->db->update('cpl', $data_edit);
	// 			}
	// 		}
	// 	}
	// }
}

function swal_delete($table, $button)
{
	$delete =
		"<script>
			\$(document).ready(function () {
				\$('" . $table . "').on('click', '" . $button . "', function(e){
					e.preventDefault();
					const remove = \$(this).attr('href');
					Swal.fire({
						title: 'Konfirmasi',
						text: 'Apakah anda yakin menghapus data ini?',
						type: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Ya, Hapus!',
						cancelButtonText: 'Batal'
						}).then((result) => {
							if (result.value) {
								document.location.href = remove;
							}
							})
							});
							});
							</script>";
	return $delete;
}
function huruf($i)
{
	$huruf = array("", " satu", " dua", " tiga", " empat", " lima", " enam", " tujuh", " delapan", " sembilan", " sepuluh", " sebelas");

	if ($i < 12) return "" . $huruf[$i];
	elseif ($i < 20) return huruf($i - 10) . " belas";
	elseif ($i < 100) return huruf($i / 10) . " puluh" . huruf($i % 10);
	elseif ($i < 200) return " seratus" . huruf($i - 100);
	elseif ($i < 1000) return huruf($i / 100) . " ratus" . huruf($i % 100);
	elseif ($i < 2000) return " seribu" . huruf($i - 1000);
	elseif ($i < 1000000) return huruf($i / 1000) . " ribu" . huruf($i % 1000);
	elseif ($i < 1000000000) return huruf($i / 1000000) . " juta" . huruf($i % 1000000);
}

function rupiah($angka)
{

	$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
	return $hasil_rupiah;
}

function penyebut($nilai)
{
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " " . $huruf[$nilai];
	} else if ($nilai < 20) {
		$temp = penyebut($nilai - 10) . " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
	}
	return $temp;
}

function terbilang($nilai)
{
	if ($nilai < 0) {
		$hasil = "minus " . trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}
	return $hasil;
}
function doubleDigit($var)
{
	//return number_format($var, 2, '.', '.');
	return round($var, 2);
}

function time_elapsed($datetime, $full = false)
{
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'tahun',
		'm' => 'bulan',
		'w' => 'minggu',
		'd' => 'hari',
		'h' => 'jam',
		'i' => 'menit',
		's' => 'detik',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' yang lalu' : 'sekarang';
}
