<?php
require_once("session.php");
include"db.php";

$no_ktp=$_SESSION['user_session'];

$query = "INSERT INTO tb_info_penyakit (no_ktp,nama_penyakit,status) VALUES (:no_ktp,:nama_penyakit,:status)";
$stmt=$db->prepare($query);
$stmt->bindParam(':no_ktp',$no_ktp);
$stmt->bindParam(':nama_penyakit',$_POST['nama_penyakit']);
$stmt->bindParam(':status',$_POST['status']);
$stmt->execute();


if($stmt == false){
	echo"Data penyakit gagal disimpan";
}
else{
	echo "Silakan isi data penyakit ada jenis penyakit lainnya";
}

?>