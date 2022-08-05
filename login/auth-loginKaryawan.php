<?php

// Mengaktifkan session
session_start();
?>
<?php

// Menghubungkan koneksi dengan database
include_once('../koneksi.php');

$db = dbConnect();
if($db->connect_errno == 0){
  if(isset($_POST['login'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM karyawan WHERE nik='$nik' AND password='$password'";
    $res = $db->query($sql);
    if($res){
      $count = $res->num_rows;
      if($count == 1){
        $data = $res->fetch_assoc();
        $_SESSION['nik'] = $data['nik'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['nama'] = $data['nama'];
        header("location:../karyawan/index.php");
      } else {
        header("location:../index.php?pesan=gagal");
      }
    }
  } else {
    echo "Access Denied";
  }
} else {
  echo "Error : ".$db->conncet_error;
}

?>