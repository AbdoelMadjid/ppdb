<?php include "../lib/inc.session.php"; ?>

<?php
	include "../conf/koneksi.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

				$nama = antiinjection($_POST['nama']);
				$nilai = antiinjection($_POST['nilai']);

				/*--------------------------------------------------------------------------------------*/
				mysqli_query($connect, "INSERT INTO jurusan(nama_jurusan, nilai_min) VALUES ('$nama','$nilai')");

							echo "<script>alert('Data Kejuruan sudah tersimpan.');</script>";
							echo "<meta http-equiv='refresh' content='0;url=?page=jurusan'>";
?>
