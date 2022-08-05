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
$nik = mysqli_real_escape_string($koneksi, $nik);
$password = mysqli_real_escape_string($koneksi, $password);

// Mencocokan data yang diinput dengan data di database
$login = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik' AND password='$password'");

// Menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// Cek apakah username dan password di temukan pada database
if ($cek > 0) {
  $data = mysqli_fetch_assoc($login);
  $_SESSION['nik'] = $data['nik'];
  $_SESSION['password'] = $data['password'];
  $_SESSION['nama'] = $data['nama'];
  header("location:../karyawan/index.php");
} else {
  header("location:../index.php?pesan=gagal");
}