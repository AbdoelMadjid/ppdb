<?php
include"header.php";
include "conf/koneksi.php";
?>
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
						<h1><a class="navbar-brand" href="index.php"><img src="http://www.smkmaarif2gombong.com/wp-content/uploads/2017/08/logo-maarif.png" width="200"></a></h1>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="top_nav">
								<?php if (isset($_SESSION['nisn'])) { ?>
								<li><a href="dashboard-siswa">Dashboard</a></li>
								<li><a href="ubah-password.html">Ubah Password</a></li>

								<?php } ?>
				                <li><a href="persyaratan.html" class="active">Persyaratan</a></li>
				                <li><a href="terdaftar.html">Terdaftar</a></li>
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
			<h3 class="headerw3">Panduan PPBD Online</h3>
			<hr>
			<div class="about-sub-gd">
			  <h4 style="color: #000">Tata Cara Pendaftaran : </h4>
				<table class="table" style="text-align: left;">
					<tr>
						<td><span class="fa fa-check" aria-hidden="true"></td>
						<td>Siswa mendaftarkan di halaman utama untuk mendapatkan akun dengan memasukan NISN, Nama serta Password. Perlu diperhatikan NISN dan Password bersifat rahasia</td>
					</tr>
					<tr>
						<td><span class="fa fa-check" aria-hidden="true"></td>
						<td>Setelah mendaftar, siswa melakukan login dengan NISN dan password yang telah terdaftar sebelumnya</td>
					</tr>
					<tr>
						<td><span class="fa fa-check" aria-hidden="true"></td>
						<td>Setelah login berhasil kemudian siswa dapat langsung mengisi formulir pendaftaran PPBD Online. diwajibkan untuk mengisi semua data dengan data yang valid dan dapat dipertanggung jawabkan</td>
					</tr>
					<tr>
						<td><span class="fa fa-check" aria-hidden="true"></td>
						<td>Saat proses pengisian formulir berhasil, maka data diri akan muncul. kemudian apa bila ingin merubah data diri dapat dilakukan melalui tombol edit yang ada dibawah</td>
					</tr>
					<tr>
						<td><span class="fa fa-check" aria-hidden="true"></td>
						<td>Tunggu sampai waktu pengumuman tiba, maka hasil akan diumumkan di halaman pengumuman yang dapat di akses di dashboard siswa</td>
					</tr>
					<tr>
						<td><span class="fa fa-check" aria-hidden="true"></td>
						<td>Untuk calon siswa yang diterima melakukan pendaftaran ulang ke sekolah dengan membawa berkas/dokumen asli yang terlampir pada persyaratan</td>
					</tr>
					<tr>
						<td><span class="fa fa-check" aria-hidden="true"></td>
						<td>Verifikasi data oleh pihak sekolah</td>
					</tr>
					<tr>
						<td><span class="fa fa-check" aria-hidden="true"></td>
						<td>Pihak sekolah menyatakan calon siswa lolos seleksi / tidak (pengesahan).</td>
					</tr>
					<tr>
						<td><span class="fa fa-check" aria-hidden="true"></td>
						<td>Calon siswa membayar biaya masuk sekolah.</td>
					</tr>
				</table>
			</div>
			<h3 class="headerw3">Persyaratan PPDB</h3>
			<hr>
			<div class="about-sub-gd">
				<p>Setelah mendaftar di PSB Online, calon siswa menyerahkan hasil print out formulir online ke Sekretariat Panitia PPDB :</p>
				<table class="table" style="text-align: left;">
					<tr>
						<td><span class="fa fa-check" aria-hidden="true"></td>
						<td>Bagi Calon Siswa yang masih aktif di sekolah SMP/MTS harap melampirkan :</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<ol type="a">
								<li>Foto copy NISN (Nomor Induk Siswa Nasional) : 1 lembar</li>
								<li>Foto copy raport minimal kelas 4, 5 dan 6 (semester gasal) : 1 lembar (dilegalisir)</li>
								<li>Foto copy Akta kelahiran dan Kartu Keluarga : 1 lembar</li>
								<li>pas photo berwarna ukuran 3 x 4 cm sebanyak 3 lembar</li>
								<li>Surat Pernyataan Orang Tua/Wali (disediakan Panitia)</li>
							</ol>
							(Calon siswa menunjukkan Buku Raport asli)
						</td>
					</tr>
					<!-- <tr>
						<td><span class="fa fa-check" aria-hidden="true"></td>
						<td>Bagi Calon Siswa yang sudah LULUS SD/MI harap melampirkan :</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<ol type="a">
								<li>Foto copy Ijazah SMP/MTS yang telah dilegalisir : 1 lembar</li>
								<li>Foto copy SKH-UASBN/SKHUN yang telah dilegalisir : 1 lembar</li>
								<li>Foto copy NISN (Nomor Induk Siswa Nasional) : 1 lembar</li>
								<li>Foto copy Akta kelahiran dan Kartu Keluarga : 1 lembar</li>
								<li>Pas photo berwarna ukuran 3 x 4 cm sebanyak 3 lembar</li>
								<li>Surat Pernyataan Orang Tua/Wali (disediakan Panitia)</li>
							</ol>
							(Calon siswa menunjukkan Ijazah dan SKH-UASBN/SKHUN asli)
						</td>
					</tr> -->
				</table>


			</div>

			<!-- <div class="edu_button">
				<a class="btn btn-primary btn-lg" href="about.html" role="button">Pengumuman</a>
			</div> -->
		</div>
	</div>
	<!--//banner_bottom-->

	<!--footer-->
	<div class="contact-footer-w3layouts-agile">
		<?php include "media.php" ?>
