<?php include "../lib/inc.session.php"; ?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Kejuruan <small>SMK Ma'arif 2 Gombong</small></h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Tambah <small> Kejuruan</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="container">
                <div class="row">
                  <form enctype="multipart/form-data" action="?page=save-jurusan" method="post">
                    <div class='col-sm-6'>
                      Nama Program Kejuruan
                        <div class="form-group">
                          <input type='text' name="nama" placeholder="Masukan nama" class="form-control" required/>
                        </div>
                    </div>
                    <div class='col-sm-6'>
                        Nilai Minimal calon siswa diterima
                        <div class="form-group">
                          <input type='number' name="nilai" placeholder="Masukan Jumlah Minimal Nilai" class="form-control" required/>
                        </div>
                    </div>
                    <div class="col-sm-12">
                      <center><button class="btn btn-primary" type="reset">Reset</button>
                      <button type="submit" class="btn btn-success">Submit</button></center>
                    </div>
                  </form>
                </div>
            </div>
        </div>
      </div>
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Kejuruan<small>SMK Ma'arif 2 Gombong</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Kejuruanl</th>
                <th>Batas Nilai Minimal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php

              include "../conf/koneksi.php";
              include "../format_tanggal.php";

              $query = mysqli_query($connect, "SELECT * FROM `jurusan` ");
              $no = 1;
              while ($a = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td><?= $no ;?></td>
                <td><?= $a['nama_jurusan'] ?></td>
                <td><?= $a['nilai_min'] ?></td>
                <td>
                  <input type="button" class="btn btn-primary" name="submit" value="Edit" onclick="window.location='?page=edit-jurusan&tid=<?php echo $a['id_jurusan']; ?>' ">
									<input type="button" class="btn btn-warning" name="reset" value="Hapus" onclick="window.location='?page=delete-jurusan&tid=<?php echo $a['id_jurusan']; ?>' ">
                </td>
              </tr>
              <?php $no++ ; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
