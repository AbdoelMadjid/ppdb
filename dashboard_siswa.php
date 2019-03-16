<?php
include "header.php";
include "conf/koneksi.php";
include "lib/inc.session.php";
include "format_tanggal.php";

    $sql  = mysqli_query($connect, "select * from pengguna where nisn = '$_SESSION[nisn]' and hak_akses = 'Siswa'");
    $r    = mysqli_fetch_array($sql);

    $query = mysqli_query($connect, "SELECT * FROM pendaftar_siswa, prestasi, jurusan WHERE pendaftar_siswa.prestasi = prestasi.id_prestasi AND pendaftar_siswa.jurusan = jurusan.id_jurusan AND pendaftar_siswa.nis = '$_SESSION[nisn]'");
    $cek = mysqli_num_rows($query);
    $p = mysqli_fetch_array($query);

		$sql = mysqli_query($connect, "SELECT * FROM pendaftaran WHERE aktif = 'Ya'");
		$s = mysqli_fetch_array($sql);
		$tgl = date('YMD');
		$wkt = $s['tgl_selesai'];
     ?>
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
								<li><a href="dashboard-siswa" class="active">Dashboard</a></li>
								<li><a href="ubah-password.html">Ubah Password</a></li>
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
		<!--/ banner-text -->
		<!--// banner-text -->
	</div>
	<!--/banner_bottom-->
	<div class="banner_bottom">
		<div class="banner_bottom_in">
			<h3 class="headerw3">Selamat datang, <i><?php echo $r['nama_pengguna'] ?></i> </h3>

			<p>Pada halaman ini anda dapat melakukan pengisian formulir, melihat data diri, merubah data diri apabila ada kesalahan, kemudian melihat hasil pengumuman setelah dilakukan verifikasi oleh panitia penerimaan peserta didik baru SMK Ma'arif 2 Gombong</p>
			<?php
					 $start_date = $s['tgl_mulai'];
					 $end_date = $s['tgl_selesai'];
					 $todays_date = date("Y-m-d");
					if ($todays_date >= $start_date && $todays_date <= $end_date) { ?>
						<div class="edu_button">
							<?php if ($p['keterangan'] == "") { ?>
							<a class="btn btn-primary btn-lg hvr-underline-from-left" href="formulir.html" role="button">Isi Formulir</a>
							<?php } else { ?>
							<a class="btn btn-primary btn-lg hvr-underline-from-left" href="hasil-pengumuman.html" role="button">Pengumuman</a>
							<?php } ?>
						</div>
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
	<!--//banner_bottom-->
	<hr>
	<!--what-we-do-->
	<div class="top_spl_courses">
		<div class="container"><br>
			<?php
		    if ($cek > 0) {
		     ?>
            <div class="row owner">
                <div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center">
                    <div class="avatar">
                        <img src="uploads/foto/<?php echo $p['foto'];?>" alt="Thumbnail Image" class="img-thumbnail img-responsive">
                    </div><br>
                </div>
            </div>
            <div class="profile-tabs">
              <div id="my-tab-content" class="tab-content">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <table class="table">
                      <tr>
                        <td width="250">Nomor Pendaftaran</td>
                        <td><?php echo $p['no_daftar'];?></td>
                      </tr>
											<tr>
												<td width="150">Nomor Induk Siswa</td>
												<td><?php echo $p['nis'];?></td>
											</tr>
											<tr>
                        <td width="250">Nama Siswa</td>
                        <td><?php echo $p['nama_siswa'];?></td>
                      </tr>
                      <tr>
                        <td width="150">Jenis Kelamin</td>
                        <td><?php echo $p['jk'];?></td>
                      </tr>
											<tr>
												<td width="150">Alamat</td>
												<td><?php echo $p['alamat'];?></td>
											</tr>
											<tr>
												<td width="150">Tempat, Tanggal Lahir</td>
												<td><?php echo $p['tempat_lahir'];?>, <?php echo indonesian_date($p['tgl_lahir']);?></td>
											</tr>
                      <tr>
                        <td width="150">Agama</td>
                        <td><?php echo $p['agama'];?></td>
                      </tr>
											<tr>
                        <td width="150">TInggi Badan</td>
                        <td><?php echo $p['tinggi'];?> CM</td>
                      </tr>
											<tr>
												<td width="150">Berat Badan</td>
												<td><?php echo $p['berat'];?> KG</td>
											</tr>
											<tr>
                        <td width="150">Anak Ke - </td>
                        <td><?php echo $p['anak_ke'];?> dari <?php echo $p['jml_saudara'];?> bersaudara</td>
                      </tr>
											<tr>
                        <td width="150">Cita - cita</td>
                        <td><?php echo $p['cita'];?></td>
                      </tr>
											<tr>
                        <td width="150">Hobi</td>
                        <td><?php echo $p['hobi'];?></td>
                      </tr>
											<tr>
                        <td width="150">Jarak Rumah ke Sekolah</td>
                        <td><?php echo $p['jarak'];?></td>
                      </tr>
											<tr>
                        <td width="150">Transportasi</td>
                        <td><?php echo $p['transport'];?></td>
                      </tr>
                      <tr>
                        <td width="150">Asal Sekolah</td>
                        <td><?php echo $p['asal_sekolah'];?></td>
                      </tr>
                      <tr>
                        <td width="150">Nilai Bahasa Indonesia</td>
                        <td><?php echo $p['nilai_indo'];?></td>
                      </tr>
                      <tr>
                        <td width="150">Nilai Bahasa Inggris</td>
                        <td><?php echo $p['nilai_inggris'];?></td>
                      </tr>
                      <tr>
                        <td width="150">Nilai Matematika</td>
                        <td><?php echo $p['nilai_mtk'];?></td>
                      </tr>
                      <tr>
                        <td width="150">Nilai IPA</td>
                        <td><?php echo $p['nilai_ipa'];?></td>
                      </tr>
                      <tr>
                        <td width="150">Prestasi</td>
                        <td><?php echo $p['tingkat'];?></td>
                      </tr>
                      <tr>
                        <td width="150">Program Kejuruan yang Diambil</td>
                        <td><?php echo $p['nama_jurusan'];?></td>
                      </tr>
											<tr>
                        <td width="150">Nama Ayah</td>
                        <td><?php echo $p['nama_ayah'];?></td>
                      </tr>
											<tr>
                        <td width="150">Nama Ibu</td>
                        <td><?php echo $p['nama_ibu'];?></td>
                      </tr>
											<tr>
                        <td width="150">Kerja Ayah</td>
                        <td><?php echo $p['kerja_ayah'];?></td>
                      </tr>
											<tr>
                        <td width="150">Kerja Ibu</td>
                        <td><?php echo $p['kerja_ibu'];?></td>
                      </tr>
											<tr>
                        <td width="150">Nama Ayah</td>
                        <td><?php echo $p['nama_ayah'];?></td>
                      </tr>
											<tr>
                        <td width="150">Alamat Orang Tua</td>
                        <td><?php echo $p['alamat_ortu'];?></td>
                      </tr>
											<tr>
                        <td width="150">Nomor Telp/HP Orang Tua</td>
                        <td><?php echo $p['notelp_ortu'];?></td>
                      </tr>
											<tr>
                        <td width="150">Nomor Seri Ijasah</td>
                        <td><?php echo $p['noseriijasah'];?></td>
                      </tr>
											<tr>
                        <td width="150">Nomor Seri SKHU</td>
                        <td><?php echo $p['noseriskhu'];?></td>
                      </tr>
                      <tr>
                        <td width="150">Ijasah</td>
                        <td><img src="uploads/ijasah/<?php echo $p['ijasah'];?>" alt="Thumbnail Image" class="img-thumbnail img-responsive"></td>
                      </tr>
											<tr>
												<td width="150">SKHU</td>
												<td><img src="uploads/skhu/<?php echo $p['skhu'];?>" alt="Thumbnail Image" class="img-thumbnail img-responsive"></td>
											</tr>
                      <!-- <tr>
                        <td width="150">Status</td>
                        <td><span class="label label-info"><?php echo $p['keterangan'];?></span></td>
                      </tr> -->
                    </table>
                    <center>
                      <hr>
                      <div class="edu_button">
                      <a class="btn btn-primary btn-lg hvr-underline-from-left" href="edit-data.html" role="button">Edit</a>
                  	</div>
                    </center>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ ?>
		    <div class="tab-pane text-center" id="following">
             <h3>Belum ada data !</h3><br>
            <div class="avatar">
		        <img src="images/file_empty.png" alt="Thumbnail Image" class="img-thumbnail img-responsive" style="width:30%">
		        </div>
		    </div>
		  <?php } ?>
        </div>
	</div>
	</div>
	<!--//what-we-do-->
	<!--footer-->
	<div class="contact-footer-w3layouts-agile">
		<?php include "media.php" ?>
