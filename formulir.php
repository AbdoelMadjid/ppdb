<?php
include "header.php";
include "lib/inc.session.php";
include "conf/koneksi.php";
$sql  = mysqli_query($connect, "select * from pengguna where nisn = '$_SESSION[nisn]'");
$r    = mysqli_fetch_array($sql);

$sql = mysqli_query($connect, "SELECT * FROM pendaftaran WHERE aktif = 'Ya'");
$s = mysqli_fetch_array($sql);
?>
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  $("#propinsi").change(function(){
    var propinsi = $("#propinsi").val();

    $.ajax({
        url: "ambilkota.php",
        data: "propinsi="+propinsi,
        cache: false,
        success: function(msg){
            $("#kota").html(msg);

        }
    });
  });
  $("#kota").change(function(){
    var kota = $("#kota").val();
    $.ajax({
		url: "ambilkecamatan.php",
        data: "kota="+kota,
        cache: false,
        success: function(msg){
            $("#kec").html(msg);
        }
    });
  });
    $("#kec").change(function(){
    var kota = $("#kec").val();
    $.ajax({
		url: "ambilsekolah.php",
        data: "kec="+kota,
        cache: false,
        success: function(msg){
            $("#sek").html(msg);
        }
    });
  });
});
</script>
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
		<!--//top-bar-->
		<!--/ banner-text -->
		<!--// banner-text -->
	</div>
	<!--//inner_banner-->
	<!--/short-->
	<div class="services-breadcrumb-w3ls-agile">
		<div class="inner_breadcrumb">

			<ul class="short">
				<li><a href="dashboard-siswa">Dashboard</a><span>|</span></li>
				<li>Formulir Pendaftaran</li>
			</ul>
		</div>
	</div>
<?php
$carikode = mysqli_query($connect, "SELECT no_daftar from pendaftar_siswa") or die (mysqli_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);
  // jika $datakode
  if ($datakode) {
   // membuat variabel baru untuk mengambil kode barang mulai dari 1
   $nilaikode = substr($jumlah_data[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $jumlah_data + 1;
   // hasil untuk menambahkan kode
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
   // atau angka sebelum $kode
   $kode_otomatis = "P".date('dmY').str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "P".date('dmY')."001";
  }
?>
	<div class="banner_bottom">
		<div class="container">
			<div class="col-md-10 col-md-offset-1">
                <h3 class="text-center">Form Pendaftaran Siswa Baru</h3><br>
                <div class="alert alert-info">
                  <strong>A. DATA PESERTA DIDIK</strong>
                </div>
                <form enctype="multipart/form-data" class="contact-form" action="simpan-siswa.php" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Nomor Pendaftaran</label>
                            <input type="hidden" class="form-control" name="id_daftar" value="<?= $s['id_pendaftaran'] ?>" readonly>
                            <input type="text" class="form-control" name="nodaftar" value="<?= $kode_otomatis ?>" readonly>
                        </div>

												<div class="col-md-4">
                            <label>NISN</label>
                            <input type="text" class="form-control" name="nisn" value="<?= $r['nisn']; ?>" readonly>
                        </div>

                        <div class="col-md-4">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="<?= $r['nama_pengguna']; ?>" required>
                        </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-6">
                          <label>Jenis Kelamin</label> <br>
                          <div class="col-sm-5">
                          <label class="radio">
                            <input type="radio" name="jk" data-toggle="radio" value="Laki - laki" checked>
                            Laki - laki
                          </label>
                          </div>
                          <div class="col-sm-4">
                          <label class="radio">
                            <input type="radio" name="jk" data-toggle="radio" value="Perempuan">
                            Perempuan
                          </label>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label>Alamat</label>
                          <textarea class="form-control" placeholder="Masukkan alamat rumah" rows="3" name="alamat" required></textarea>
                      </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukan Tempat Lahir" required>
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Lahir</label>
                            <input class="datepicker form-control" type="date" name="tgl_lahir" required/>
														<input name="tgl_daftar" type="hidden" value="<?= date('mdY') ?>" required/>

                        </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-12">
                        <label>Agama</label> <br>
                          <select class="form-control" name="agama" required>
                            <option>Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                          </select>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-2">
                          <label>Tinggi Badan</label>
                            <input class="form-control" type="text" name="tinggi" placeholder="Tinggi badan" required/>
                        </div>
                        <div class="col-md-2">
                          <label>Berat Badan</label>
                            <input class="form-control" type="text" name="berat" placeholder="Berat badan" required/>
                        </div>
                        <div class="col-md-2">
                          <label>Anak Ke</label>
                            <input class="form-control" type="text" name="anak_ke" placeholder="Anak ke-" required/>
                        </div>
                        <div class="col-md-2">
                          <label>Jml Saudara</label>
                            <input class="form-control" type="text" name="jml_saudara" placeholder="Jumlah Saudara" required/>
                        </div>
                        <div class="col-md-4">
                          <label>Nomor Telp/HP</label>
                            <input class="form-control" type="text" name="notelp" placeholder="Nomor Telepon" required/>
                        </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-3">
                          <label>Cita - cita</label>
                            <select class="form-control" name="cita" required>
                            <option>Pilih Cita-cita</option>
                            <option value="PNS">PNS</option>
                            <option value="TNI/Polri">TNI/Polri</option>
                            <option value="Guru/Dosen">Guru/Dosen</option>
                            <option value="Dokter">Dokter</option>
                            <option value="Politikus">Politikus</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Artis">Artis</option>
                            <option value="Seniman">Seniman</option>
                            <option value="Lain - lain">Lain - lain</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label>Hobi</label>
                            <select class="form-control" name="hobi" required>
                            <option>Pilih Hobi</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Kesenian">Kesenian</option>
                            <option value="Membaca">Membaca</option>
                            <option value="Menulis">Menulis</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Lain - lain">Lain - lain</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label>Jarak ke sekolah</label>
                            <select class="form-control" name="jarak" required>
                            <option>Pilih Jarak</option>
                            <option value="0-1 Km">0-1 Km</option>
                            <option value="1-3 Km">1-3 Km</option>
                            <option value="3-5 Km">3-5 Km</option>
                            <option value="5-10 Km">5-10 Km</option>
                            <option value="Lebih dari 10 Km">Lebih dari 10 Km</option>
                            <option value="Lain - lain">Lain - lain</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label>Transportasi</label>
                            <select class="form-control" name="trans" required>
                            <option>Pilih Jarak</option>
                            <option value="Jalan Kaki">Jalan Kaki</option>
                            <option value="Sepeda">Sepeda</option>
                            <option value="Motor">Motor</option>
                            <option value="Mobil">Mobil</option>
                            <option value="Angkutan Desa/Kota">Angkutan Desa/Kota</option>
                            <option value="Bus">Bus</option>
                            <option value="Lain - lain">Lain - lain</option>
                          </select>
                        </div>

                    </div><br>

                    <div class="row">
                      <div class="col-md-12">
                      <label>Sekolah Asal</label> <br>
                      <div class="col-sm-3">
                        <select class="form-control" name="propinsi" id="propinsi">
                        <option value="">Pilih Provinsi</option>
                        <?php
                        //mengambil nama-nama propinsi yang ada di database
                        $propinsi = mysqli_query($connect, "SELECT * FROM provinsi ORDER BY nama_prov");
                        while($p=mysqli_fetch_array($propinsi)){
                        echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
                        }
                        ?>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control" name="kota" id="kota">
                        <option value="">Pilih Kabupaten</option>
                        <?php
                        //mengambil nama-nama propinsi yang ada di database
                        $kota = mysqli_query($connect, "SELECT * FROM kabupaten ORDER BY nama_kab");
                        while($p=mysqli_fetch_array($propinsi)){
                        echo "<option value=\"$p[id_kab]\">$p[nama_kab]</option>\n";
                        }
                        ?>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control"  name="kec" id="kec">
                        <option value="">Pilih Kecamatan</option>
                        <?php
                        //mengambil nama-nama propinsi yang ada di database
                        $kec = mysqli_query($connect, "SELECT * FROM kecamatan ORDER BY nama_kec");
                        while($p=mysqli_fetch_array($kota)){
                        echo "<option value=\"$p[id_kec]\">$p[nama_kec]</option>\n";
                        }
                        ?>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control" name="sek" id="sek" required>
                        <option value="">Pilih Nama Sekolah</option>
                      </select>
                      </div>
                      </div>
                    </div><br>

                    <div class="row">
                      <div class="col-md-12">
                        <label>Data SKHUN & Ijasah</label>
                      </div><br>
                      <div class="col-md-12">
                        <div class="col-md-6">
                          <label>No. Seri SKHUN</label>
                            <input type="text" class="form-control" name="no_skhu" placeholder="Masukan No. Seri SKHUN" required>
                        </div>
                        <div class="col-md-6">
                          <label>No. Seri Ijasah</label>
                            <input type="text" class="form-control" name="no_ijasah" placeholder="Masukan No. Seri Ijasah" required>
                        </div>
                      </div>
                      <div class="col-md-12"> <br>
                      <p> Nilai SKHUN </p>
                      <p> <i>*) Gunakan tanda titik (.) sebagai pemisah desimal, contoh 55.55</i> </p>
                      </div>
                      <div class="col-md-12">
                        <div class="col-md-3">
                          <label>Bahasa Indonesia</label>
                            <input type="text" name="indo" class="form-control" placeholder="Masukan Nilai Bahasa Indonesia" required>
                        </div>
                        <div class="col-md-3">
                          <label>Bahasa Inggris</label>
                            <input type="text" name="inggris" class="form-control" placeholder="Masukan Nilai Bahasa Inggris" required>
                        </div>
                        <div class="col-md-3">
                          <label>Matematika</label>
                            <input type="text" name="mtk" class="form-control" placeholder="Masukan Nilai Matematika" required>
                        </div>
                        <div class="col-md-3">
                          <label>IPA</label>
                            <input type="text" name="ipa" class="form-control" placeholder="Masukan Nilai IPA" required>
                        </div>
                      </div>
                      <div class="col-md-12" style="padding-top: 20px;">
                        <div class="col-md-6">
                          <label>Legalisir SKHUN</label>
                          <p style="color: red">*) Contoh </p>
                          <div class="avatar">
                            <img src="images/skhu.jpg" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
                          </div><br>
                          <input type="file" name="skhu" id="fileToUpload" accept="image/*" required><br>

                        </div>
                        <div class="col-md-6">
                          <label>Legalisir Ijasah</label>
                          <p style="color: red">*) Contoh </p>
                          <div class="avatar">
                            <img src="images/ijasah.jpg" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
                          </div><br>
                          <input type="file" name="ijasah" id="fileToUpload" accept="image/*" required><br>
                        </div>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-sm-12">
                        <label>Prestasi yg pernah diraih</label>
                        <p> <i>*) Biarkan apabila tidak memiliki prestasi</i> </p>

                      </div>
                      <div class="col-sm-12">
                        <select class="form-control" name="prestasi" required>
                          <?php
                          $query = mysqli_query($connect, "SELECT * FROM prestasi");
                          while ($pres = mysqli_fetch_array($query)) {
                          ?>
                          <option value=" <?php echo $pres['id_prestasi']; ?> "><?php echo $pres['nama_prestasi']; ?></option>
                        <?php } ?>
                        </select>
                      </div>
                    </div><br>
                    <label>Foto</label>
                    <p style="color: red">*) Contoh </p>
                    <div class="avatar">
                        <img src="images/pass.png" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="15%">
                    </div><br>
                    <input type="file" name="foto" id="fileToUpload" accept="image/*" required><br>
                    <div class="row">
                      <div class="col-md-12">
                        <label>Program Kejuruan</label> <br>
												<p> <i>*) Pilih Jurusan Yang Ingin Anda Masuki</i> </p>
                        <select class="form-control" name="jurusan">
                        <option value="">Pilih Program Kejuruan</option>
                                    <?php
                                    //mengambil nama-nama propinsi yang ada di database
                                    $jurusan = mysqli_query($connect, "SELECT * FROM jurusan ORDER BY id_jurusan");
                                    while($j=mysqli_fetch_array($jurusan)){
                                    echo "<option value=\"$j[id_jurusan]\">$j[nama_jurusan]</option>\n";
                                    }
                                    ?>
                        </select>
                      </div>
                    </div><br>
                    <div class="alert alert-info">
                      <strong>A. DATA ORANG TUA</strong>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Ayah</label>
                            <input type="text" class="form-control" name="ayah" placeholder="Masukan Nama Ayah" required="">
                        </div>

                        <div class="col-md-6">
                            <label>Nama Ibu</label>
                            <input type="text" class="form-control" name="ibu" placeholder="Masukan Nama Ibu" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Pekerjaan Ayah</label>
                            <select class="form-control" name="kerja_ayah" required>
                            <option>Pilih Pekerjaan</option>
                            <option value="PNS">PNS</option>
                            <option value="Pedagang">Pedagang</option>
                            <option value="Petani">Petani</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Nelayan">Nelayan</option>
                            <option value="Lain - lain">Lain - lain</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Pekerjaan Ibu</label>
                            <select class="form-control" name="kerja_ibu" required>
                            <option>Pilih Pekerjaan</option>
                            <option value="PNS">PNS</option>
                            <option value="Pedagang">Pedagang</option>
                            <option value="Petani">Petani</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Nelayan">Nelayan</option>
                            <option value="Lain - lain">Lain - lain</option>
                            </select>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Alamat Orang Tua</label>
                            <textarea class="form-control" placeholder="Masukkan alamat rumah" rows="3" name="alamat_ortu" required></textarea>
                        </div>

                        <div class="col-md-6">
                            <div class="col-sm-6">
                              <label>Penghasilan Orang Tua</label>
                             <select class="form-control" name="penghasilan_ortu" required>
                            <option>Pilih Penghasilan</option>
                            <option value="Kurang dari Rp.500.000,.">Kurang dari Rp.500.000,.</option>
                            <option value="Rp.500.000,. s/d Rp.1.000.000,.">Rp.500.000,. s/d Rp.1.000.000,.</option>
                            <option value="Rp.1.000.000,. s/d Rp.3.000.000,.">Rp.1.000.000,. s/d Rp.3.000.000,.</option>
                            <option value="Rp.3.000.000,. s/d Rp.5.000.000,.">Rp.3.000.000,. s/d Rp.5.000.000,.</option>
                            <option value="Diatas Rp.5000.000,.">Diatas Rp.5000.000,.</option>
                          </select>
                            </div>
                            <div class="col-sm-6">
                              <label>No Telp/HP Orang Tua</label>
                            <input type="text" class="form-control" name="notelp_ortu" placeholder="Masukan No.Telp" required>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-2">
												<label>
                        <input type="checkbox" required=""> &nbsp; Setuju
											</label>
                      </div>
                      <div class="col-md-9">
                        <ul>
                          <li>Saya telah mengisi data dengan sebenar-benarnya dan dapat dipertanggungjawabkan;</li>
                          <li>Jika data dinyatakan tidak valid dengan berkas aslinya maka peserta dapat dinyatakan gugur oleh pihak sekolah;</li>
                          <li>Saya telah mengingat atau mencatat password untuk login nanti setelah formulir dikirimkan.</li>
                        </ul>
                      </div>
                    </div><br>
                    <div class="row" align="center">
                      <div class="edu_button">
                        <input type="submit" name="submit" class="btn btn-primary hvr-underline-from-center" value="Kirimkan Formulir Saya">
                     	</div>
                    </div><br>
                </form>
            </div>
		</div>
	</div>
	<!--//inner_connectent-->
	<!--footer-->
	<div class="contact-footer-w3layouts-agile">
		<?php include "media.php" ?>
