<?php
include ('conf/koneksi.php');

//------ANTI XSS & SQL INJECTION-------//
function antiinjection($data){
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  	return $filter_sql;
}


$uname = antiinjection($_POST['nisn']);
$pass = antiinjection($_POST['pass']);

$salt ='vieyama';
$hash = md5($salt . $pass);

//------ANTI XSS & SQL INJECTION-------//

$sql=mysqli_query($connect, "SELECT * FROM pengguna WHERE nisn='$uname' AND password='$hash' AND hak_akses='Siswa'");

$r=mysqli_fetch_array($sql);
if ($r['nisn']==$uname and $r['password']==$hash)

{
  session_start();
  $_SESSION['nisn']=$r['nisn'];
  $_SESSION['password']=$r['password'];
  $_SESSION['hak']=$r['hak_akses'];

  echo "<script>alert('Anda berhasil login, silahkan masuk.');
  window.location = 'dashboard-siswa'</script>";
}
else
{
  echo "<script>alert('Maaf! Login gagal. Silahkan cek lagi username dan password anda!.');
  window.location = 'beranda'</script>";
}
?>
