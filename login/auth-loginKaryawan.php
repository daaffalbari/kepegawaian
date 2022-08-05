<?php

// Mengaktifkan session
session_start();

// Menghubungkan koneksi dengan database
include_once('../koneksi.php');

// Menangkap data yang dikirim dari form
$nik = $_POST['nik'];
$password = $_POST['password'];

// Menghindari karakter SQL injection
$nik = stripslashes($nik);
$password = stripslashes($password);
$username = mysqli_real_escape_string($koneksi, $username);
$password = mysqli_real_escape_string($koneksi, $password);

// Mencocokan data yang diinput dengan data di database
$login = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE username='$username' AND password='$password'");

// Menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// Cek apakah username dan password di temukan pada database
if ($cek > 0) {
  $data = mysqli_fetch_assoc($login);
  $_SESSION['nik'] = $data['nik'];
  $_SESSION['password'] = $data['password'];
  $_SESSION['nama'] = $data['nama'];
  header("location:../adminSeeSalary/index.php");
} else {
  header("location:../index.php?pesan=gagal");
}