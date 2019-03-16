<?php include "../lib/inc.session.php"; ?>

<?php
	include "../conf/koneksi.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

				$no = antiinjection($_POST['no_daftar']);

        $cek = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM pendaftar_siswa, prestasi, jurusan WHERE pendaftar_siswa.prestasi = prestasi.id_prestasi AND pendaftar_siswa.jurusan = jurusan.id_jurusan AND pendaftar_siswa.no_daftar = '$no'"));

         $indo = $cek['nilai_indo'];
         $inggris = $cek['nilai_inggris'];
         $mtk = $cek['nilai_mtk'];
         $ipa = $cek['nilai_ipa'];
         $pres = $cek['nilai_pres'];

        if ($cek['nilai_pres'] == "0") {
         $nilai = ($indo + $inggris + $mtk + $ipa)/4;
        }elseif($cek['nilai_pres'] >= "0"){
         $nilai = ($indo + $inggris + $mtk + $ipa + $pres)/4.5;
				}

				if ($nilai >= $cek['nilai_min']) {
					$hasil = "Lulus";
				} else {
					$hasil = "Tidak Lulus";
				}

				 /*--------------------------------------------------------------------------------------*/
				mysqli_query($connect, "UPDATE `pendaftar_siswa` SET `keterangan` = '$hasil' WHERE `pendaftar_siswa`.`no_daftar` = '$no';");

							echo "<script>alert('Data Terverifikasi.');</script>";
							echo "<meta http-equiv='refresh' content='0;url=?page=total-siswa'>";
?>
