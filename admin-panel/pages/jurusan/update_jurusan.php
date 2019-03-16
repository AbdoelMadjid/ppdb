
<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

    $id = antiinjection($_POST['tid']);
    $nama = antiinjection($_POST['nama']);
    $nilai = antiinjection($_POST['nilai']);
	/*--------------------------------------------------------------------------------------*/
		mysqli_query($connect, "UPDATE `jurusan` SET
			`nama_jurusan`='$nama',
			`nilai_min`='$nilai'
		WHERE `id_jurusan` = '$id'");
    echo "<script>alert('Data sudah di update.');</script>";
    echo "<meta http-equiv='refresh' content='0;url=?page=jurusan'>";
?>
