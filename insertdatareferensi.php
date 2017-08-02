<?php
require_once("session.php");
include"db.php";

$no_ktp=$_SESSION['user_session'];

$query="INSERT INTO tb_info_referensi (no_ktp,nama_lengkap,jabatan,nomor_hp,hubungan) VALUES (:no_ktp,:nama_lengkap,:jabatan,:nomor_hp,:hubungan)";
$stmt=$db->prepare($query);
$stmt->bindParam(':no_ktp',$no_ktp);
$stmt->bindParam(':nama_lengkap',$_POST['nama_lengkap']);
$stmt->bindParam(':jabatan',$_POST['jabatan']);
$stmt->bindParam(':nomor_hp',$_POST['nomor_hp']);
$stmt->bindParam(':hubungan',$_POST['hubungan']);
$stmt->execute();

if($stmt==false){
	echo"Data referensi gagal disimpan";
}
else{
	echo "Silakan isi data referensi jika masih ada yang lainnya";
}

?>