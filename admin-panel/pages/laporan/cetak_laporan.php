<?php

/* include autoloader */

require_once '../../../dompdf/autoload.inc.php';

include "../../../format_tanggal.php";
include "../../../conf/koneksi.php";
/* reference the Dompdf namespace */

use Dompdf\Dompdf;


/* instantiate and use the dompdf class */

$dompdf = new Dompdf();
$ed = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa`,pendaftaran WHERE pendaftar_siswa.id_daftar = pendaftaran.id_pendaftaran AND pendaftaran.id_pendaftaran = '$_POST[tid]'");
$r = mysqli_fetch_array($ed);

/*-------- menghitung total jumlah peserta -----------*/
$sql1 = mysqli_query($connect, "select *, count(pengguna.nisn) as jml_peserta from pengguna where hak_akses = 'Siswa' ");
$a = mysqli_fetch_array($sql1);
$jml_pendaftar = $a['jml_peserta'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql3 = mysqli_query($connect, "select *, count(pendaftar_siswa.nis) as jml_daftar from pendaftar_siswa");
$c = mysqli_fetch_array($sql3);
$jml_formulir = $c['jml_daftar'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql4 = mysqli_query($connect, "select *, count(pendaftar_siswa.nis) as jml_cewe from pendaftar_siswa where jk = 'Perempuan'");
$d = mysqli_fetch_array($sql4);
$jml_cewe = $d['jml_cewe'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql5 = mysqli_query($connect, "select *, count(pendaftar_siswa.nis) as jml_cowo from pendaftar_siswa where jk = 'Laki - laki'");
$e = mysqli_fetch_array($sql5);
$jml_cowo = $e['jml_cowo'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql6 = mysqli_query($connect, "select *, count(pendaftar_siswa.nis) as jml_diterima from pendaftar_siswa where keterangan = 'Lulus'");
$f = mysqli_fetch_array($sql6);
$jml_diterima = $f['jml_diterima'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql7 = mysqli_query($connect, "select *, count(pendaftar_siswa.nis) as jml_ditolak from pendaftar_siswa where keterangan = 'Tidak Lulus'");
$g = mysqli_fetch_array($sql7);
$jml_ditolak = $g['jml_ditolak'];

$html = '

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-9">
	<center>
	 <h4>PENERIMAAN PESERTA DIDIK BARU 2018/2019<BR><h3>SMK MA'."'".'ARIF 2 GOMBONG</h3></h4>
	 Jl. Kemukus No. 96 B, Gombong, Kemukus, Gombong, Kabupaten Kebumen, Jawa Tengah 54416 </center>
	</div>
</div>
<p align="center">======================================================================================</p>
<p align="center">Laporan Penerimaan Peserta Didi Baru (PPDB)<br>SMK Ma'."'".'arif 2 Gombong</p>

	<table class="table table-condensed">
		<tr>
			<th width="250px">Periode Pendaftaran</th>
			<td>'. $r['periode'] .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Tanggal Mulai Pendaftaran</th>
			<td>'. indonesian_date($r['tgl_mulai']) .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Tanggal Berakhir Pendaftaran</th>
			<td>'. indonesian_date($r['tgl_selesai']) .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Kuota Yang Ada</th>
			<td>'. $r['kuota'] .' Siswa</td>
			<td></td>
		</tr>
		<tr>
			<th width="300px">Jumlah akun calon siswa yang terdaftar</th>
			<td>'. $jml_pendaftar.' Siswa</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Jumlah Formulir yang terkumpul</th>
			<td>'. $jml_formulir .' Siswa</td>
			<td></td>
		</tr>
		<tr>
			<th>Calon siswa</th>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th></th>
			<td>'. $jml_cowo .' Laki - laki</td>
			<td></td>
		</tr>
		<tr>
			<th></th>
			<td>'. $jml_cewe .' Perempuan</td>
			<td></td>
		</tr>
		<tr>
			<th>Siswa diterima</th>
			<td>'. $jml_diterima .' Siswa</td>
			<td></td>
		</tr>
		<tr>
			<th>Siswa ditolak</th>
			<td>'. $jml_ditolak .' Siswa</td>
			<td></td>
		</tr>
	</table>

		<div class="col-md-6">
			<h3>Lampiran</h3>
		</div>

	<h3>Daftar Seluruh Pendaftar</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No. </th>
				<th>No Pendaftaran</th>
				<th>NISN</th>
				<th>Nama Siswa</th>
				<th>Asal Sekolah</th>
				<th>Tanggal Daftar</th>
			</tr>
		</thead>
		<tbody>';

			$query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE id_daftar = '$_POST[tid]'");
			$no = 1;
			while ($a = mysqli_fetch_array($query)) {

			$html .= '<tr>
				<td>'.$no .'</td>
				<td>'.$a['no_daftar'] .'</td>
				<td>'.$a['nis'] .'</td>
				<td>'.$a['nama_siswa'] .'</td>
				<td>'.$a['asal_sekolah'] .'</td>
				<td>'.indonesian_date($a['tgl_daftar']) .'</td>
			</tr>';
			 $no++ ; }
		$html .= '</tbody>
	</table>
	<h3>Daftar siswa diterima</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No. </th>
				<th>No Pendaftaran</th>
				<th>NISN</th>
				<th>Nama Siswa</th>
				<th>Asal Sekolah</th>
				<th>Tanggal Daftar</th>
			</tr>
		</thead>
		<tbody>';

			$query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE keterangan = 'Lulus' AND id_daftar = '$_POST[tid]'");
			$no = 1;
			while ($a = mysqli_fetch_array($query)) {

			$html .= '<tr>
				<td>'.$no .'</td>
				<td>'.$a['no_daftar'] .'</td>
				<td>'.$a['nis'] .'</td>
				<td>'.$a['nama_siswa'] .'</td>
				<td>'.$a['asal_sekolah'] .'</td>
				<td>'.indonesian_date($a['tgl_daftar']) .'</td>
			</tr>';
			$no++ ; }
		$html .= '</tbody>
	</table>
	<h3>Daftar Siswa tidak diterima</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No. </th>
				<th>No Pendaftaran</th>
				<th>NISN</th>
				<th>Nama Siswa</th>
				<th>Asal Sekolah</th>
				<th>Tanggal Daftar</th>
			</tr>
		</thead>
		<tbody>';

			$query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE keterangan = 'Tidak Lulus' AND id_daftar = '$_POST[tid]'");
			$no = 1;
			while ($a = mysqli_fetch_array($query)) {

			$html .='	<tr>
				<td>'.$no.'</td>
				<td>'.$a['no_daftar'] .'</td>
				<td>'.$a['nis'] .'</td>
				<td>'.$a['nama_siswa'] .'</td>
				<td>'.$a['asal_sekolah'] .'</td>
				<td>'.indonesian_date($a['tgl_daftar']) .'</td>
			</tr>';
			$no++ ; }
		$html .= '</tbody>
	</table>

';

$dompdf->loadHtml($html);


/* Render the HTML as PDF */

$dompdf->render();


/* Output the generated PDF to Browser */

$dompdf->stream();

?>
