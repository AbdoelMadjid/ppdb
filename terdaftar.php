<?php
include"header.php";
include "conf/koneksi.php";
?>
  <link rel="stylesheet" href="js/datatables/dataTables.bootstrap.css">

     <!-- Modal1 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<div class="signin-form profile">

						<div class="login-m_page_img">

							<img src="images/baru.jpg" alt=" " class="img-responsive" />

						</div>
						<div class="login-m_page">
							<h3 class="sign">Sign In</h3>
							<div class="login-form-wthree-agile">
								<form action="log_validate.php" method="post">
									<input type="text" name="nisn" placeholder="Masukan NISN" required="">
									<input type="password" name="pass" placeholder="Password" required="">
									<div class="tp">
										<input type="submit" value="Sign In">
									</div>
								</form>
							</div>
							<div class="login-social-grids">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-rss"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal1 -->
	<div class="header inner_banner" id="home">
		<!--/top-bar-->
		<div class="top-bar">
			<div class="header-nav-agileits">

				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
						<h1><a class="navbar-brand" href="index.php"><img src="images/logo-maarif.png" width="200"></a></h1>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="top_nav">
								<?php if (isset($_SESSION['nisn'])) { ?>
								<li><a href="dashboard-siswa">Dashboard</a></li>
								<li><a href="ubah-password.html">Ubah Password</a></li>

								<?php } ?>
				                <li><a href="persyaratan.html" >Persyaratan</a></li>
				                <li><a href="terdaftar.html" class="active">Terdaftar</a></li>
				                <li><a href="pengumuman.html">Pengumuman</a></li>
							</ul>
						</nav>
					</div>
				</nav>

			</div>
		</div>
		<!--//top-bar-->
		<!--/ banner-text -->
		<!--// banner-text -->
	</div>

	<!--/banner_bottom-->
	<div class="banner_bottom">
		<div class="banner_bottom_in">
			<h3 class="headerw3">Persyaratan PPDB</h3>
			<hr>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>NISN</th>
						<th>Nama Lengkap</th>
          				<th>Asal Sekolah</th>
          				<th>Alamat</th>
          			</tr>
				</thead>
				<tbody>
					<?php

						$sql = mysqli_query($connect, "SELECT * from pendaftar_siswa WHERE arsip = 'Tidak' AND keterangan = 'Belum Terverifikasi' ");
						$no = 1;
						while ($b = mysqli_fetch_array($sql)){
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $b['nis'] ?></td>
						<td><?php echo $b['nama_siswa'] ?></td>
						<td><?php echo $b['asal_sekolah'] ?></td>
						<td><?php echo $b['alamat'] ?></td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
	<!--//banner_bottom-->


	<!--footer-->
	<div class="contact-footer-w3layouts-agile">

		<?php include "media.php" ?>
