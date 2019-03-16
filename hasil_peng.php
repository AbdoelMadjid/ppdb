<?php
include("header.php");

include "conf/koneksi.php";
include "lib/inc.session.php";
include "format_tanggal.php";

    $sql  = mysqli_query($connect, "select * from pengguna where nisn = '$_SESSION[nisn]'");
    $r    = mysqli_fetch_array($sql);

    $query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa`, prestasi WHERE pendaftar_siswa.prestasi = prestasi.id_prestasi AND pendaftar_siswa.nis = '$_SESSION[nisn]'");
    $cek = mysqli_num_rows($query);
    $p = mysqli_fetch_array($query);
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
								<li><a href="persyaratan.html">Persyaratan</a></li>
                                <li><a href="terdaftar.html">Terdaftar</a></li>
                                <li><a href="pengumuman.html">Pengumuman</a></li>
							</ul>
						</nav>
					</div>
				</nav>

			</div>
		</div>
	</div>

	<div class="banner_bottom">
		<div class="banner_bottom_in">
                <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                    <?php
                    if ($cek > 0) {
                     ?>
                    <div class="panel panel-primary">
                     <div class="panel-heading" align="center">Pengumuman Kelulusan SIPSBO 2018</div>
                     <div class="panel-body">
                     <table class="table">
                     <tr>
                     <td>Nomor Pendaftaran </td>
                     <td> :</td>
                     <td><?php echo $p['no_daftar'];?></td>
                     </tr>
                     <tr>
                     <td>NISN </td>
                     <td> :</td>
                     <td><?php echo $p['nis'];?></td>
                     </tr>
                     <tr>
                     <td>Nama </td>
                     <td> :</td>
                     <td><?php echo $p['nama_siswa'];?></td>
                     </tr>
                     <tr>
                     <td>Asal Sekolah </td>
                     <td> :</td>
                     <td><?php echo $p['asal_sekolah'];?></td>
                     </tr>
                     </table>
                     <?php if ($p['keterangan'] == "Lulus"){ ?>
                     <h3 align="center"><span class="label label-success">Anda dinyatakan Lulus seleksi penerimaan siswa baru</span></h3><br>
                     <?php }elseif ($p['keterangan'] == "Tidak Lulus") { ?>
                     <h3 align="center"><span class="label label-danger">Anda dinyatakan Tidak Lulus seleksi penerimaan siswa baru</span></h3>
                     <?php }else{ ?>
                     <h3 align="center"><span class="label label-warning">Belum ada pengumuman</span></h3><br>
                     <?php } ?>
                     </div>
                   </div>
                   <?php }else{ ?>
                   <div class="tab-pane text-center" id="following">
                    <h3>Belum ada data !</h3>
                    <div class="avatar">
                    <img src="images/file_empty.png" alt="Thumbnail Image" class="img-thumbnail img-responsive" style="width:100%">
                    </div>
                   </div>
                  <?php } ?>
                  </div>
                </div>
                <br><br><br><br><br>
      <?php if ($p['keterangan'] == "Lulus") { ?>
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
             <div class="panel-heading" align="center">Persyaratan Daftar Ulang :</div>
             <div class="panel-body" align="left" style="padding-left:100px;padding-right:100px;">
               <ul>
                 <li>Membawa bukti daftar dengan mencetak formulir persyaratan <small> <i>link ada dibawah</i> </small> </li>
                 <li>Membawa Kartu NISN</li>
                 <li>Membawa Ijasah Asli</li>
                 <li>Membawa SKHUN Asli</li>
                 <li>Foto copy Akta kelahiran dan Kartu Keluarga : 1 lembar</li>
                 <!-- <li>Surat Pernyataan Orang Tua/Wali (disediakan Panitia)</li> -->
               </ul>
             </div>
           </div>
          </div>
        </div>


			<div class="edu_button">
        <form action="pdf_formulir.php" method="post" name="postform">
					<input type="hidden" name="tid" value="<?php echo $p['nis']; ?>">
					<input type="submit" class="btn btn-primary btn-lg hvr-underline-from-left" name="getPdf" value="Cetak Formulir">
				</form>
			</div>
      <?php } ?>
		</div>
	</div>
	<!--//banner_bottom-->
	<!--footer-->
	<div class="contact-footer-w3layouts-agile">
		<?php include "media.php" ?>
