<?php
require_once("session.php");
include"db.php";

$no_ktp=$_SESSION['user_session'];

$query = "INSERT INTO tb_info_pendidikan (no_ktp,tingkat,nama_bapen,jurusan,tahun_masuk,tahun_lulus,nilai) VALUES (:no_ktp,:tingkat,:nama_bapen,:jurusan,:tahun_masuk,:tahun_keluar,:nilai_rata)";
$stmt= $db->prepare($query);
$stmt->bindParam(':no_ktp',$no_ktp);
$stmt->bindParam(':tingkat',$_POST['tingkat']);
$stmt->bindParam(':nama_bapen',$_POST['nama_bapen']);
$stmt->bindParam(':jurusan',$_POST['jurusan']);
$stmt->bindParam(':tahun_masuk',$_POST['tahun_masuk']);
$stmt->bindParam(':tahun_keluar',$_POST['tahun_keluar']);
$stmt->bindParam(':nilai_rata',$_POST['nilai_rata']);
$stmt->execute();

if($stmt == false){
	echo"Data pendidikan gagal disimpan";
}
else{
	echo "Silakan isi data pendidikan jika masih ada yang lainnya";
}


?>