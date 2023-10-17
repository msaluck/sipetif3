<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function bulan_indo($bulan)
{
	switch ($bulan) {
		case '01':
		return 'Januari';
		break;
		case '02':
		return 'Februari';
		break;
		case '03':
		return 'Maret';
		break;
		case '04':
		return 'April';
		break;
		case '05':
		return 'Mei';
		break;
		case '06':
		return 'Juni';
		break;
		case '07':
		return 'Juli';
		break;
		case '08':
		return 'Agustus';
		break;
		case '09':
		return 'September';
		break;
		case '10':
		return 'Oktober';
		break;
		case '11':
		return 'November';
		break;
		case '12':
		return 'Desember';
		break;
		default:
		return 'Nama bulan tidak dikenali';
	}
}

function waktu_indo($tanggal)
{
	if (!empty($tanggal)) {
		$pecah = explode(' ', $tanggal);
		return substr($tanggal, 8, 2) . ' ' . bulan_indo(substr($tanggal, 5, 2)) . ' ' . substr($tanggal, 0, 4) . ' ' . $pecah[1];
	} else {
		return "";
	}
}

function hitung_umur($birthday) {

		// Convert Ke Date Time
	$biday = new DateTime($birthday);
	$today = new DateTime();
	
	$diff = $today->diff($biday);
	
		// Display
	return $diff;
}


function bulan_indo_short($bulan)
{
	switch ($bulan) {
		case '01':
		return 'Jan';
		break;
		case '02':
		return 'Feb';
		break;
		case '03':
		return 'Mar';
		break;
		case '04':
		return 'Apr';
		break;
		case '05':
		return 'Mei';
		break;
		case '06':
		return 'Jun';
		break;
		case '07':
		return 'Jul';
		break;
		case '08':
		return 'Agu';
		break;
		case '09':
		return 'Sep';
		break;
		case '10':
		return 'Okt';
		break;
		case '11':
		return 'Nov';
		break;
		case '12':
		return 'Des';
		break;
		default:
		return 'Empty';
	}
}
function tahun_a($nilai)
{
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " " . $huruf[$nilai];
	} else if ($nilai < 20) {
		$temp = tahun_a($nilai - 10) . " belas";
	} else if ($nilai < 100) {
		$temp = tahun_a($nilai / 10) . " puluh" . tahun_a($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . tahun_a($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = tahun_a($nilai / 100) . " ratus" . tahun_a($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . tahun_a($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = tahun_a($nilai / 1000) . " ribu" . tahun_a($nilai % 1000);
	}
	return $temp;
}

function tahun($nilai)
{
	if ($nilai < 0) {
		$hasil = "minus " . trim(tahun_a($nilai));
	} else {
		$hasil = trim(tahun_a($nilai));
	}
	return $hasil;
}

function tanggal_indo_short($tanggal)
{
	switch ($tanggal) {
		case '01':
		return 'satu';
		break;
		case '02':
		return 'dua';
		break;
		case '03':
		return 'tiga';
		break;
		case '04':
		return 'empat';
		break;
		case '05':
		return 'lima';
		break;
		case '06':
		return 'enam';
		break;
		case '07':
		return 'tujuh';
		break;
		case '08':
		return 'delapan';
		break;
		case '09':
		return 'sembilan';
		break;
		case '10':
		return 'sepuluh';
		break;
		case '11':
		return 'sebelas';
		break;
		case '12':
		return 'dua belas';
		break;
		case '13':
		return 'tiga belas';
		break;
		case '14':
		return 'empat belas';
		break;
		case '15':
		return 'lima belas';
		break;
		case '16':
		return 'enam belas';
		break;
		case '17':
		return 'tujuh belas';
		break;
		case '18':
		return 'delapan belas';
		break;
		case '19':
		return 'sembilan belas';
		break;
		case '20':
		return 'dua puluh';
		break;
		case '21':
		return 'dua puluh satu';
		break;
		case '22':
		return 'dua puluh dua';
		break;
		case '23':
		return 'dua puluh tiga';
		break;
		case '24':
		return 'dua puluh empat';
		break;
		case '25':
		return 'dua puluh lima';
		break;
		case '26':
		return 'dua puluh enam';
		break;
		case '27':
		return 'dua puluh tujuh';
		break;
		case '28':
		return 'dua puluh delapan';
		break;
		case '29':
		return 'dua puluh sembilan';
		break;
		case '30':
		return 'tiga puluh';
		break;
		case '31':
		return 'tiga puluh satu';
		break;
		default:
		return 'Empty';
	}
}
function hari_indo($hari)
{
	switch ($hari) {
		case 'Monday':
		return 'Senin';
		break;
		case 'Tuesday':
		return 'Selasa';
		break;
		case 'Wednesday':
		return 'Rabu';
		break;
		case 'Thursday':
		return 'Kamis';
		break;
		case 'Friday':
		return 'Jumat';
		break;
		case 'Saturday':
		return 'Sabtu';
		break;
		case 'Sunday':
		return 'Minggu';
		break;
		default:
		echo 'Nama hari tidak dikenali';
	}
}

function tgl_indo($tanggal)
{
	return substr($tanggal, 8, 2) . ' ' . bulan_indo(substr($tanggal, 5, 2)) . ' ' . substr($tanggal, 0, 4);
}

function tgl_indo_r($tanggal)
{
	return substr($tanggal, 0, 2) . ' ' . bulan_indo(substr($tanggal, 3, 2)) . ' ' . substr($tanggal, 6, 4);
}

function bln_indo($bln)
{
	return bulan_indo(substr($bln, 5, 2)) . ' ' . substr($bln, 0, 4);
}

function bln_doang($bln)
{
	return bulan_indo(substr($bln, 5, 2));
}

function tgl_indo_short($tanggal)
{
	return substr($tanggal, 0, 2);
}
function isWeekend($date)
{
	return (date('N', strtotime($date)) >= 6);
}
function isWeekendOtherwise($date)
{
	$weekDay = date('w', strtotime($date));
	return ($weekDay == 0 || $weekDay == 6);
}

function getDayIndonesia($date)
{
	if ($date != '0000-00-00') {
		$data = hari(date('D', strtotime($date)));
	} else {
		$data = '-';
	}

	return $data;
}


function hari($day)
{
	$hari = $day;

	switch ($hari) {
		case "Sun":
		$hari = "Minggu";
		break;
		case "Mon":
		$hari = "Senin";
		break;
		case "Tue":
		$hari = "Selasa";
		break;
		case "Wed":
		$hari = "Rabu";
		break;
		case "Thu":
		$hari = "Kamis";
		break;
		case "Fri":
		$hari = "Jum'at";
		break;
		case "Sat":
		$hari = "Sabtu";
		break;
	}
	return $hari;
}