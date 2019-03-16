<?php
include "header.php";
include "lib/inc.session.php";
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
						<h1><a class="navbar-brand" href="index.php"><img src="http://www.smkmaarif2gombong.com/wp-content/uploads/2017/08/logo-maarif.png" width="200"></a></h1>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="top_nav">
								<?php if (isset($_SESSION['nisn'])) { ?>
								<li><a href="dashboard-siswa">Dashboard</a></li>
								<li><a href="ubah-password.html" class="active">Ubah Password</a></li>
								<?php } ?>
				                <li><a href="persyaratan.html" >Persyaratan</a></li>
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
		<div class="container">
			<div class="col-md-10 col-md-offset-1">
                <div class="alert alert-info">
                  <strong>Ubah Password</strong>
                </div>
                <form enctype="multipart/form-data" class="contact-form" action="update_password.php" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Password Lama</label>
                            <input type="hidden" class="form-control" name="idu" value="<?= $_SESSION['nisn'] ?>" readonly>
                            <input type="password" class="form-control" name="pass_lama" required>
                        </div>

												<div class="col-md-4">
                            <label>Password Baru</label>
                            <input type="password" class="form-control" name="pass_baru" id="pass1" required>
                        </div>

                        <div class="col-md-4">
                            <label>Ulangi Password Baru</label>
                            <input type="password" class="form-control" name="konfirmasi_pass" id="pass2" onkeyup="checkPass(); return false;" required>
														<span id="confirmMessage" class="confirmMessage"></span>
                        </div>
                    </div><br>

                    <div class="row" align="center">
                      <div class="edu_button">
                        <input type="submit" name="submit" class="btn btn-primary hvr-underline-from-center" value="Ubah Password">
                     	</div>
                    </div><br>
                </form>
            </div>
		</div>
	</div>
	<!--//banner_bottom-->
<script type="text/javascript">
function checkPass()
{
	//Store the password field objects into variables ...
	var pass1 = document.getElementById('pass1');
	var pass2 = document.getElementById('pass2');
	//Store the Confimation Message Object ...
	var message = document.getElementById('confirmMessage');
	//Set the colors we will be using ...
	var goodColor = "#66cc66";
	var badColor = "#ff6666";
	//Compare the values in the password field
	//and the confirmation field
	if(pass1.value == pass2.value){
			//The passwords match.
			//Set the color to the good color and inform
			//the user that they have entered the correct password
			pass2.style.backgroundColor = goodColor;
			message.style.color = goodColor;
			message.innerHTML = "Passwords Match!"
	}else{
			//The passwords do not match.
			//Set the color to the bad color and
			//notify the user.
			pass2.style.backgroundColor = badColor;
			message.style.color = badColor;
			message.innerHTML = "Passwords Do Not Match!"
	}
}
</script>

	<!--footer-->
	<div class="contact-footer-w3layouts-agile">

		<?php include "media.php" ?>
