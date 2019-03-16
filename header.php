<?php
session_start();
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
	<title>PPDB Online - SMK Ma'arif 2 Gombong</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Stretch a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<link rel="shortcut icon" href="images/icon.jpg" type="image/x-icon" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Merriweather+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Mallanna" rel="stylesheet">

</head>

<body>
	<!--Header-->
	<div class="top-bar_sub_w3layouts_agile">
		<h6>SMK Ma'arif 2 Gombong <a href="http://www.smkmaarif2gombong.com/">Website Sekolah</a></h6>
		<div class="search">
			<?php if(isset($_SESSION['nisn']) && $_SESSION['hak'] == 'Siswa'){ ?>
				<h5><a class="sign" href="logout.html">Logout</a></h5>
			<?php }else{ ?>
			<h5><a class="sign" href="#" data-toggle="modal" data-target="#myModal2">Login</a></h5>
			<?php } ?>
			<div class="cd-main-header">
				<ul class="cd-header-buttons">
					<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
				</ul>
				<!-- cd-header-buttons -->
			</div>
			<div id="cd-search" class="cd-search">
				<form action="cari.php" method="post">
					<input name="cari" type="search" placeholder="Masukan NISN untuk mencari data pendaftar..">
				</form>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
