<?php
	include "conf/koneksi.php";

			/*---------------------------- ANTI XSS & SQL INJECTION ----------------------*/
			function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
			}
			/*-------------------------------------------------------------------*/
			// baca current date

      $nisn = antiinjection($_POST['nisn']);
			$nama = antiinjection($_POST['nama']);
			$email = antiinjection($_POST['email']);
			$pass = antiinjection($_POST['pass']);
      $hak = "Siswa";
			$tgl = date('Y-m-d');

      $salt ='vieyama';
      $hash = md5($salt . $pass);

			$cek_user=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM pengguna WHERE nisn='$nisn'"));
				if ($cek_user > 0) {
				        echo "<script>alert('NISN Sudah Terdaftar!');</script>";
      					echo "<meta http-equiv='refresh' content='0; url=beranda'>";
			} else {

				mysqli_query($connect, "INSERT INTO pengguna
									(nisn,nama_pengguna,email, password, pass_asli, hak_akses, tgl_daftar) VALUES ('$nisn','$nama','$email','$hash','$pass','$hak','$tgl')");
								echo "<script>alert('Data Pendaftaran sudah tersimpan. Silahkan Login');</script>";
								echo "<meta http-equiv='refresh' content='0; url=beranda'>";
			}

?>
