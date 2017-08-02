<?php
require_once("session.php");
include"db.php";

$no_ktp=$_SESSION['user_session'];

$query="INSERT INTO tb_info_kursus (no_ktp,nama_bidang,nama_penyelenggara,tahun_masuk,tahun_lulus) VALUES (:no_ktp,:nama_bidang,:nama_penyelenggara,:tahun_masuk,:tahun_lulus)";
$stmt=$db->prepare($query);
$stmt->bindParam(':no_ktp',$no_ktp);
$stmt->bindParam(':nama_bidang',$_POST['nama_bidang']);
$stmt->bindParam(':nama_penyelenggara',$_POST['nama_penyelenggara']);
$stmt->bindParam(':tahun_masuk',$_POST['tahun_masuk']);
$stmt->bindParam(':tahun_lulus',$_POST['tahun_lulus']);
$stmt->execute();


if($stmt==false){
	echo"Data khursus gagal disimpan";
}
else{
	echo "Silakan isi data khursus jika masih ada yang lainnya";
}

?>