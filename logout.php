<?php
	session_start();
  unset($_SESSION['nisn']);
	echo "<script>alert('Anda menuju halaman login'); window.location = 'beranda'</script>";
	exit;
?>
