<?php
	include "conf/koneksi.php";


			/*---------------------------- ANTI XSS & SQL INJECTION ----------------------*/
			function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
			}
			/*-------------------------------------------------------------------*/
			// baca current date

			$id_daftar = antiinjection($_POST['id_daftar']);
			$no = antiinjection($_POST['nodaftar']);
      $nisn = antiinjection($_POST['nisn']);
      $nama = antiinjection($_POST['nama']);
      $jk = antiinjection($_POST['jk']);
      $alamat = antiinjection($_POST['alamat']);
	  	$tmpt = antiinjection($_POST['tempat_lahir']);
			$tgl = antiinjection($_POST['tgl_lahir']);
			$agama = antiinjection($_POST['agama']);
			$tinggi = antiinjection($_POST['tinggi']);
			$berat = antiinjection($_POST['berat']);
			$anak_ke = antiinjection($_POST['anak_ke']);
			$jml_saudara = antiinjection($_POST['jml_saudara']);
			$notelp = antiinjection($_POST['notelp']);
			$cita = antiinjection($_POST['cita']);
			$hobi = antiinjection($_POST['hobi']);
			$jarak = antiinjection($_POST['jarak']);
			$trans = antiinjection($_POST['trans']);
			$sek = antiinjection($_POST['sek']);
			$noskhu = antiinjection($_POST['no_skhu']);
      $noijasah = antiinjection($_POST['no_ijasah']);
			$indo = antiinjection($_POST['indo']);
			$inggris = antiinjection($_POST['inggris']);
			$mtk = antiinjection($_POST['mtk']);
			$ipa = antiinjection($_POST['ipa']);
      $pres = antiinjection($_POST['prestasi']);
      $jur = antiinjection($_POST['jurusan']);
			$namaayah = antiinjection($_POST['ayah']);
			$namaibu = antiinjection($_POST['ibu']);
			$kerjaayah = antiinjection($_POST['kerja_ayah']);
			$kerjaibu = antiinjection($_POST['kerja_ibu']);
			$alamatortu = antiinjection($_POST['alamat_ortu']);
			$penghasilanortu = antiinjection($_POST['penghasilan_ortu']);
			$notelportu = antiinjection($_POST['notelp_ortu']);
      $ket = "Belum Terverifikasi";
			$tgldaftar = date('Ymd');
			$arsip = "Tidak";

      if(isset($_REQUEST['submit'])){

				$target_dir = "uploads/foto/";
				$target_dir2 = "uploads/skhu/";
				$target_dir3 = "uploads/ijasah/";
		    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
		    $target_file2 = $target_dir2 . basename($_FILES["skhu"]["name"]);
		    $target_file3 = $target_dir3 . basename($_FILES["ijasah"]["name"]);
				$fotobaru = $_FILES["foto"]["name"];
		    $skhubaru = $_FILES["skhu"]["name"];
		    $ijasahbaru = $_FILES["ijasah"]["name"];

		    $uploadOk = 1;
		    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
		    $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));

				// gambar 1
		    $check = getimagesize($_FILES["foto"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
					echo "<script>alert('File bukan gambar!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }

		    // Check file size
		    if ($_FILES["foto"]["size"] > 2000000) {
					echo "<script>alert('Gambar tidak boleh lebih dari 2MB');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Allow certain file formats
		    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
					echo "<script>alert('Gambar hanya boleh berupa JPG, PNG atau JPEG');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Check if $uploadOk is set to 0 by an error
		    if ($uploadOk == 0) {
					echo "<script>alert('Gambar gagal diupload');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		    // if everything is ok, try to upload file
		    } else {
		        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
		        } else {
							echo "<script>alert('Gambar gagal diupload');</script>";
						 echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        }
		    }

		    // gambar 2
				$check2 = getimagesize($_FILES["skhu"]["tmp_name"]);
		    if($check2 !== false) {
		        $uploadOk = 1;
		    } else {
					echo "<script>alert('File bukan gambar!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }

		    // Check file size
		    if ($_FILES["skhu"]["size"] > 2000000) {
					echo "<script>alert('Gambar tidak boleh lebih dari 2MB');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Allow certain file formats
		    if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") {
					echo "<script>alert('Gambar hanya boleh berupa JPG, PNG atau JPEG');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Check if $uploadOk is set to 0 by an error
		    if ($uploadOk == 0) {
					echo "<script>alert('Gambar gagal diupload');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		    // if everything is ok, try to upload file
		    } else {
		        if (move_uploaded_file($_FILES["skhu"]["tmp_name"], $target_file2)) {
		        } else {
							echo "<script>alert('Gambar gagal diupload');</script>";
						 echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        }
		    }

		     // gambar 3
				 $check3 = getimagesize($_FILES["ijasah"]["tmp_name"]);
 		    if($check3 !== false) {
 		        $uploadOk = 1;
 		    } else {
 					echo "<script>alert('File bukan gambar!');</script>";
 					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
 		        $uploadOk = 0;
 		    }

 		    // Check file size
 		    if ($_FILES["ijasah"]["size"] > 2000000) {
 					echo "<script>alert('Gambar tidak boleh lebih dari 2MB');</script>";
 					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
 		        $uploadOk = 0;
 		    }
 		    // Allow certain file formats
 		    if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg") {
 					echo "<script>alert('Gambar hanya boleh berupa JPG, PNG atau JPEG');</script>";
 					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
 		        $uploadOk = 0;
 		    }
 		    // Check if $uploadOk is set to 0 by an error
 		    if ($uploadOk == 0) {
 					echo "<script>alert('Gambar gagal diupload');</script>";
 					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
 		    // if everything is ok, try to upload file
 		    } else {
 		        if (move_uploaded_file($_FILES["ijasah"]["tmp_name"], $target_file3)) {
 		        } else {
 							echo "<script>alert('Gambar gagal diupload');</script>";
 						 echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
 		        }
 		    }


			$qpres = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM prestasi WHERE id_prestasi = '$pres'"));
			$nilaipres = $qpres['nilai'];
	    $cek_user=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM pendaftar_siswa WHERE nis='$nisn'"));
				if ($cek_user > 0) {
				        echo "<script>alert('NISN Sudah Terdaftar!');</script>";
      					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
			} else {

				$result = mysqli_query($connect, "INSERT INTO pendaftar_siswa VALUES ('$no',
					'$nisn',
					'$nama',
					'$jk',
					'$alamat',
					'$tmpt',
					'$tgl',
					'$agama',
					'$tinggi',
					'$berat',
					'$anak_ke',
					'$jml_saudara',
					'$notelp',
					'$cita',
					'$hobi',
					'$jarak',
					'$trans',
					'$sek',
					'$noskhu',
					'$noijasah',
					'$indo',
					'$inggris',
					'$mtk',
					'$ipa',
					'$nilaipres',
					'$pres',
					'$jur',
					'$namaayah',
					'$namaibu',
					'$kerjaayah',
					'$kerjaibu',
					'$alamatortu',
					'$penghasilanortu',
					'$notelportu',
					'$fotobaru',
					'$skhubaru',
					'$ijasahbaru',
					'$tgldaftar',
					'$ket',
					'$arsip',
					'$id_daftar')");
					if (!$result) {
							 die('Query Error : '.mysqli_errno($connect).
							 ' - '.mysqli_error($connect));
						}
								echo "<script>alert('Data Pendaftaran sudah tersimpan.');</script>";
								echo "<meta http-equiv='refresh' content='0; url=dashboard-siswa'>";

			}
    }else{  // Jika gambar gagal diupload, Lakukan :
      echo "<script>alert('Data Pendaftaran gagal tersimpan');</script>";
      echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
    }

?>
