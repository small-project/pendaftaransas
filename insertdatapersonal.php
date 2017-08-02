<?php
include"dbconfig.php";
include"class.user.php";
require_once("session.php");



$pendaftaran= new PENDAFTARAN();

$no_ktp=$_SESSION['user_session'];
$no_NIK='';
$nama_depan=$_POST['nama_depan'];
$nama_belakang=$_POST['nama_belakang'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$email=$_SESSION['email_session'];
$nomor_hp=$_POST['nomor_hp'];
$nomor_telp=$_POST['nomor_telp'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$nama_suku=$_POST['nama_suku'];
$agama=$_POST['agama'];
$tinggi_badan=$_POST['tinggi_badan'];
$berat_badan=$_POST['berat_badan'];
$nomor_sim=$_POST['nomor_sim'];
$jenis_sim=$_POST['jenis_sim'];
$status_perkawinan=$_POST['status_perkawinan'];
$status_tempat_tinggal=$_POST['status_tempat_tinggal'];
$foto=$_POST['foto'];
$hobi=$_POST['hobi'];
$alamat=$_POST['alamat'];
$kelurahan=$_POST['kelurahan'];
$kecamatan=$_POST['kecamatan'];
$kota=$_POST['kota'];



$pendaftaran->personal($no_ktp, $no_NIK, $nama_depan, $nama_belakang, $jenis_kelamin, $email, $nomor_hp, $nomor_telp, $tempat_lahir, $tgl_lahir, $nama_suku, $agama, $tinggi_badan, $berat_badan, $nomor_sim, $jenis_sim, $status_perkawinan, $status_tempat_tinggal, $foto, $hobi, $alamat, $kelurahan, $kecamatan, $kota)

?>