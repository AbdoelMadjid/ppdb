<?php include "header.php" ?>
<style type="text/css">


	.count_down{
		padding: 5px;
		font-size:50px;
		font-weight:bold;
		color:#222;
	}

	.count_down div{
		width:75px;
		height:50px;
		display:inline-block;
	}
	.count_down span{
		color:rgba(0,0,0,.8);
	}
	.count_down sup{
		color:rgba(0,0,0,.8);
		font-size:20px;
	}
</style>
	<script type="text/javascript" src="js/count/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/count/js/countdown.js"></script>
	<script type="text/javascript" src="js/count/js/script.js"></script>
	<!-- <link rel="stylesheet" href="js/count/font/Bebas/stylesheet.css" type="text/css" /> -->

	<div class="header" id="home">

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
								<?php if(isset($_SESSION['nisn'])){ ?>
								<li><a href="dashboard-siswa">Dashboard</a></li>
								<?php } ?>
								<li><a href="persyaratan.html">Persyaratan</a></li>
								<li><a href="terdaftar.html">Terdaftar</a></li>
								<li><a href="pengumuman.html">Pengumuman</a></li>
							</ul>
						</nav>
					</div>
				</nav>

			</div>
		</div>
		<!--//top-bar-->
		<!-- banner-text -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides callbacks callbacks1" id="slider4">
					<li>
						<div class="banner-top">
							<div class="banner-info-w3ls-agileinfo">
								<h3>SMK MA'ARIF 2 GOMBONG </h3>
								<p style="font-size: 20px">Selamat Datang di Website Pendaftaran Peserta Didik Baru Online</p>
								<?php if(isset($_SESSION['nisn'])){ ?>
								<a href="logout.html" data-toggle="modal" data-target="#myModal3"> <i class="fa fa-edit" aria-hidden="true"></i> Daftar Sekarang</a>
							<?php }else{ ?>
								<a href="#" data-toggle="modal" data-target="#myModal3"> <i class="fa fa-edit" aria-hidden="true"></i> Daftar Sekarang</a>
							<?php } ?>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>

			<!--banner Slider starts Here-->
		</div>
		<!--//Slider-->
	</div>
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
	<!-- Modal2 -->
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<div class="signin-form profile">

						<div class="login-m_page_img">

							<img src="images/baru.jpg" alt=" " class="img-responsive" width="20px" />

						</div>
						<div class="login-m_page">
							<h3 class="sign">Daftar Akun</h3>
							<div class="login-form-wthree-agile">
								<form action="save_siswa.php" method="post">
									<input type="text" name="nisn" placeholder="NISN" required="">
									<input type="text" name="nama" placeholder="Nama" required="">
									<input type="email" name="email" placeholder="Email" required="">
									<input type="password" name="pass" placeholder="Password" required="">
									<input type="submit" value="Sign Up">
								</form>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal2 -->

	<!--//Header-->
	<!--/banner_bottom-->
	<div class="banner_bottom">
		<div class="banner_bottom_in">
			<?php
			include "conf/koneksi.php";
			include "format_tanggal.php";

			$sql = mysqli_query($connect, "SELECT * FROM pendaftaran WHERE aktif = 'Ya'");
			$s = mysqli_fetch_array($sql);
			$tgl = date('YMD');
			$wkt = $s['tgl_selesai'];

		 ?>

			<h3>Jadwal Pendaftaran PPDB Online SMK Ma'arif 2 Gombong</h3>
			<hr>
			<div class="about-sub-gd">
				<?php
				$start_date = $s['tgl_mulai'];
				$end_date = $s['tgl_selesai'];
				$todays_date = date("Y-m-d");
				if ($todays_date >= $start_date && $todays_date <= $end_date) { ?>
			  <h1>Sisa waktu pendaftaran</h1><br>
				<h4 style="color: #000">Pendaftaran dibuka mulai <?= indonesian_date($s['tgl_mulai']); ?> s/d <?= indonesian_date($s['tgl_selesai']); ?></h4>
				<div align="center" class="col-md-12">
								<div id="count-down-container"></div>
								<script type="text/javascript">
								var currentyear=new Date().getFullYear()
								var target_date=new cdtime("count-down-container", "<?= $wkt ;?>")
								target_date.displaycountdown("days", displayCountDown)
								</script>
					    <?php } else {
					        if($todays_date < $start_date) { ?>
										<br>
					            <h2><span class="label label-primary">Pendaftaran Belum dibuka</span></h2>
					        <?php } else { ?>
										<br> <h2><span class="label label-warning">Pendaftaran Sudah ditutup</span></h2>
					       <?php }
					    }
					?>
			</div>
			</div>
		</div><br><br>
		<div class="banner_bottom_in">
			<?php
			$sql1 = mysqli_query($connect, "SELECT *, count(pendaftar_siswa.nis) as jml from pendaftar_siswa WHERE arsip = 'Tidak' AND keterangan = 'Belum Terverifikasi' ");
			$r = mysqli_fetch_array($sql1);
			$jml = $r['jml'];

			$sql1 = mysqli_query($connect, "SELECT *, count(pendaftar_siswa.nis) as jml_cowo from pendaftar_siswa WHERE jk = 'Laki - laki' AND arsip = 'Tidak' AND keterangan = 'Belum Terverifikasi'");
			$r = mysqli_fetch_array($sql1);
			$jmlcowo = $r['jml_cowo'];

			$sql1 = mysqli_query($connect, "SELECT *, count(pendaftar_siswa.nis) as jml_cewe from pendaftar_siswa WHERE jk = 'Perempuan' AND arsip = 'Tidak' AND keterangan = 'Belum Terverifikasi'");
			$r = mysqli_fetch_array($sql1);
			$jmlcewe = $r['jml_cewe'];
			?>

			<?php
				$start_date = $s['tgl_mulai'];
				$end_date = $s['tgl_selesai'];
				$todays_date = date("Y-m-d");
				if ($todays_date >= $start_date && $todays_date <= $end_date) { ?>
					<h1>Jumlah Pendaftar saat ini : </h1>
					<hr>
					<div class="col-md-8">
						<h3>Jumlah Pendaftar hari ini : </h3>
						<h1 style="color: red"><?= $jml; ?></h1>
					</div>
					<div class="col-md-4" style="text-align: left;">
						<h2><?= $jmlcowo; ?> <small>Laki - laki</small></h2>
						<h2><?= $jmlcewe; ?> <small>Perempuan</small></h2>
					</div><br><br>

				<?php } ?>

		</div>
	</div>
	<!--//banner_bottom-->
	<div class="services">
		<div class="container">
			<div class="about-main about1">
				<div class="col-md-12 about-gd">
					<div class="about-sub-gd">
						<h4 style="color: #fff">Visi</h4>
						<p style="color: #fff">Sekolah unggul dalam prestasi, Berpijak pada Ilmu Pengetahuan, Teknologi, Seni (IPTEKS), Iman dan taqwa (IMTAQ)</p>
					</div>
					<div class="about-sub-gd">
						<h4 style="color: #fff">Misi</h4>

                    <p style="color: #fff"><span class="fa fa-check" aria-hidden="true">Menciptakan lingkungan pembelajaran dalam upaya peningkatan prestasi.</p>
                    <p style="color: #fff"><span class="fa fa-check" aria-hidden="true">Menumbuhkan semangat keunggulan dan daya nalar pada seluruh warga sekolah.</p>
                    <p style="color: #fff"><span class="fa fa-check" aria-hidden="true">Mendorong dan membantu peserta didik mengenali potensi diri untuk pengembangan bakat.</p>
                    <p style="color: #fff"><span class="fa fa-check" aria-hidden="true">Menumbuhkan dan mendorong keunggulan dalam penerapan ilmu pengetahuan, teknologi, dan seni serta berakhlak mulia.</p>
                    <p style="color: #fff"><span class="fa fa-check" aria-hidden="true">Mengaplikasikan teknologi informasi dan komunikasi dalam pembelajaran dan administrasi sekolah.</p>
                    <p style="color: #fff"><span class="fa fa-check" aria-hidden="true">Meningkatkan komitemen tenaga kependidikan terhadap tugas pokok dan fungsinya.</p>

					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--/video-->
	<!--/what-wedo-->
	<div class="top_spl_courses">
		<div class="container">
			<h3 class="headerw3">Sambutan Kepala Sekolah</h3>
			<div class="inner_sec_w3_agileinfo">
				<div class="col-md-3 edu_img">
					<img src="images/kepalasekolah.jpg" alt=" " class="img-responsive">
				</div>
				<div class="col-md-9 edu-left">
					<h4 class="sub-hdng two">Ngadino, S.Kom <small>Kepala Sekolah</small></h4>
					<p class="paragraph">Bismillahirrahmaanirrahiim.
					Assalamu'alaikum Warahmatullahi Wabarakatuhu.</p>
					<p class="paragraph two">Selamat datang di situs RESMI SMK Ma'arif 2 Gombong,
					Alhamdulillah, segala puji dan syukur kami panjatkan kehadirat Allah SWT, karena berkat rahmat-Nya Website dan Blog ini dapat online dan diakses oleh seluruh pengunjung dunia maya. SMK Ma'arif 2 Gombong adalah Sekolah Menengah Kejuruan (SMK) kelompok Teknologi dan Industri yang berbasis Pondok Pesantren. SMK Ma'arif 2 Gombong yang membuka 3 (tiga) Program Keahlian yaitu: Teknik Elektro (Teknik Audio Video), Teknik Otomotif (Teknik Kendaraan Ringan) dan Teknik Pendingin dan Tata Udara.</p>
					<p class="paragraph two">Dengan sarana dan prasaran yang ada dan didukung SDM yang handal dalam bidang teknologi. Kami akan terus berusaha agar SMK Ma'arif 2 Gombong menjadi ujung tombak dalam usaha pengembangan Iptek dan Imtaq di Kabupaten Kebumen. Untuk mendapatkan informasi lebih detail tentang SMK Ma'arif 2 Gombong Kabupaten Kebumen,

					Silahkan kunjungi Situs Resmi kami di Website:  www.smkmaarif2gombong.com</p>

				</div>
			</div>
		</div>
	</div>
	<!--/what-wedo-->

	<!--/what-wedo-->
	<div class="services">
		<div class="container">
			<h3 class="headerw3 two">Program Kejuruan</h3>
			<div class="inner_sec_w3_agileinfo">
				<div class="wedo-main">
					<div class="wedo-right">

					</div>
					<div class="wedo-left">
						<p class="paragraph" style="color: #fff;">Untuk memenuhi kebutuhan SDM Indonesia yang semakin dibutuhkan dengan memiliki kemampuan khusus, kami membuka 3 program kejuruan dengan tujuan membangun SDM yang berkompeten untuk Indonesia</p>
						<h4 class="sub-hdng">Program Kejuruan : </h4>
						<p class="paragraph" style="color: #fff;"><span class="fa fa-check" aria-hidden="true" style="color: #fff;"></span>Teknik Audio Video</p>
						<p class="paragraph" style="color: #fff;"><span class="fa fa-check" aria-hidden="true" style="color: #fff;"></span>Teknik Kendaraan Ringan</p>
						<p class="paragraph" style="color: #fff;"><span class="fa fa-check" aria-hidden="true" style="color: #fff;"></span>Teknik Pendinginan dan Tata Udara</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/what-wedo-->

	<!--footer-->
	<div class="contact-footer-w3layouts-agile">
		<div class="bottom-social-agileits-w3ls">
			<div class="container">
				<div class="col-md-8 botttom-nav-w3ls-agileits">

					</ul>
					<ul class="f_links thrd col-md-8">
						<li style="color: #fff; ">
							 <span class="fa fa-location-arrow"></span> Jl. Kemukus No. 96 B, Gombong, Kemukus, Gombong, Kabupaten Kebumen, Jawa Tengah 54416
						</li>
						<li style="color: #fff; ">
							 <span class="fa fa-envelope-o"></span> Email : smkmadugo@yahoo.com
						</li>
						<li style="color: #fff; ">
							 <span class="fa fa-phone"></span> Telp : (0287) 472843
						</li>
						<li style="color: #fff; ">
							 <span class="fa fa-fax"></span> Fax : 0287472843
						</li>
					</ul>
				</div>
				<div class="col-md-4 social-icons-wthree">
					<h6>Connect with us</h6>
					<a class="facebook" href="https://www.facebook.com/smkmadugo/"><span class="fa fa-facebook"></span></a>
					<a class="twitter" href="https://twitter.com/madufm_"><span class="fa fa-twitter"></span></a>
					<a class="google" href="http://ppdb.smkmaarif2gombong.com/google.com/+AntonSofyan"><span class="fa fa-google-plus"></span></a>
					<a class="linkedin" href="https://www.linkedin.com/in/anton-sofyan-1428937a/"><span class="fa fa-linkedin"></span></a>
					<a class="youtube" href="https://www.youtube.com/watch?v=K5P0Og9tFKk"><span class="fa fa-youtube"></span></a>
					<a class="instagram" href="https://www.instagram.com/smkmadugo_"><span class="fa fa-instagram"></span></a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php include "media.php"; ?>
