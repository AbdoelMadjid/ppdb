<?php

/* include autoloader */

require_once 'dompdf/autoload.inc.php';


/* reference the Dompdf namespace */

use Dompdf\Dompdf;


/* instantiate and use the dompdf class */

$dompdf = new Dompdf();
include "format_tanggal.php";
include "conf/koneksi.php";

	$query1 = mysqli_query($connect, "SELECT * FROM pendaftar_siswa, prestasi, jurusan WHERE pendaftar_siswa.prestasi = prestasi.id_prestasi AND pendaftar_siswa.jurusan = jurusan.id_jurusan AND pendaftar_siswa.nis = '$_POST[tid]'");
	$p = mysqli_fetch_array($query1);


$html = '
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h4 align="center">PENERIMAAN PESERTA DIDIK BARU 2018/2019<br>SMK MA'."'".'ARIF 2 GOMBONG<br>Jl. Kemukus No. 96 B, Gombong, Kemukus, Gombong, Kabupaten Kebumen, Jawa Tengah 54416</h4>
<p align="center">____________________________________________________________________________________</p>

<div class="col-md-12">
	<h4 align="center"><b>BUKTI PENDAFTARAN</b><BR> CALON PESERTA DIDIK BARU SMK 2 MARIF GOMBONG</h4><br>
	<table class="table table-condensed">
		<tr>
			<td width="25">1</td>
			<th width="200">Nomor Pendaftaran</th>
			<td>'. $p['no_daftar'].'</td>
		</tr>
		<tr>
			<td>2</td>
			<th >Nomor Induk Siswa</th>
			<td>'. $p['nis'].'</td>
		</tr>
		<tr>
			<td>3</td>
			<th >Nama Siswa</th>
			<td>'. $p['nama_siswa'].'</td>
		</tr>
		<tr>
			<td>4</td>
			<th >Jenis Kelamin</th>
			<td>'. $p['jk'].'</td>
		</tr>
		<tr>
			<td>5</td>
			<th >Alamat</th>
			<td>'. $p['alamat'].'</td>
		</tr>
		<tr>
			<td>6</td>
			<th >Tempat, Tanggal Lahir</th>
			<td>'. $p['tempat_lahir'].', '. indonesian_date($p['tgl_lahir']).'</td>
		</tr>
		<tr>
			<td>7</td>
			<th >Agama</th>
			<td>'. $p['agama'].'</td>
		</tr>
		<tr>
			<td>8</td>
			<th >TInggi Badan</th>
			<td>'. $p['tinggi'].' CM</td>
		</tr>
		<tr>
			<td>9</td>
			<th >Berat Badan</th>
			<td>'. $p['berat'].' KG</td>
		</tr>
		<tr>
			<td>10</td>
			<th >Anak Ke - </th>
			<td>'. $p['anak_ke'].' dari '. $p['jml_saudara'].' bersaudara</td>
		</tr>
		<tr>
			<td>11</td>
			<th >Cita - cita</th>
			<td>'. $p['cita'].'</td>
		</tr>
		<tr>
			<td>12</td>
			<th >Hobi</th>
			<td>'. $p['hobi'].'</td>
		</tr>
		<tr>
			<td>13</td>
			<th >Jarak Rumah ke Sekolah</th>
			<td>'. $p['jarak'].'</td>
		</tr>
		<tr>
			<td>14</td>
			<th >Transportasi</th>
			<td>'. $p['transport'].'</td>
		</tr>
		<tr>
			<td>15</td>
			<th >Asal Sekolah</th>
			<td>'. $p['asal_sekolah'].'</td>
		</tr>
		<tr>
			<td>16</td>
			<th >Nilai Bahasa Indonesia</th>
			<td>'. $p['nilai_indo'].'</td>
		</tr>
		<tr>
			<td>17</td>
			<th >Nilai Bahasa Inggris</th>
			<td>'. $p['nilai_inggris'].'</td>
		</tr>
		<tr>
			<td>18</td>
			<th >Nilai Matematika</th>
			<td>'. $p['nilai_mtk'].'</td>
		</tr>
		<tr>
			<td>19</td>
			<th >Nilai IPA</th>
			<td>'. $p['nilai_ipa'].'</td>
		</tr>
		<tr>
			<td>20</td>
			<th >Prestasi</th>
			<td>'. $p['tingkat'].'</td>
		</tr>
		<tr>
			<td>21</td>
			<th >Program Kejuruan yang Diambil</th>
			<td>'. $p['nama_jurusan'].'</td>
		</tr>
		<tr>
			<td>22</td>
			<th >Nama Ayah</th>
			<td>'. $p['nama_ayah'].'</td>
		</tr>
		<tr>
			<td>23</td>
			<th >Nama Ibu</th>
			<td>'. $p['nama_ibu'].'</td>
		</tr>
		<tr>
			<td>24</td>
			<th >Kerja Ayah</th>
			<td>'. $p['kerja_ayah'].'</td>
		</tr>
		<tr>
			<td>25</td>
			<th >Kerja Ibu</th>
			<td>'. $p['kerja_ibu'].'</td>
		</tr>
		<tr>
			<td>26</td>
			<th >Alamat Orang Tua</th>
			<td>'. $p['alamat_ortu'].'</td>
		</tr>
		<tr>
			<td>27</td>
			<th >Nomor Telp/HP Orang Tua</th>
			<td>'. $p['notelp_ortu'].'</td>
		</tr>
		<tr>
			<td>28</td>
			<th >Nomor Seri Ijasah</th>
			<td>'. $p['noseriijasah'].'</td>
		</tr>
		<tr>
			<td>29</td>
			<th >Nomor Seri SKHU</th>
			<td>'. $p['noseriskhu'].'</td>
		</tr>

		<tr>
			<td>30</td>
			<th >Status</th>
			<td> <h3><span class="label label-info">'. $p['keterangan'].'</span></h3> </td>
		</tr>
		<tr>
			<td></td>
			<td align="center" style="padding-right:10px;"><br><br><img src="uploads/foto/'. $p['foto'].'" width="85px"></td>
			<td><br><br><p>_______________,_____________ </p>
					Nama Pendaftar
					<br><br><br><br>
					'. $p['nama_siswa'].'</td>
		</tr>
	</table>
	</div>
</body>
</html>
';

$dompdf->loadHtml($html);


/* Render the HTML as PDF */

$dompdf->render();


/* Output the generated PDF to Browser */

$dompdf->stream();

?>
