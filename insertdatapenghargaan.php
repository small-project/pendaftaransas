<?php
require_once("session.php");
include"db.php";

$no_ktp=$_SESSION['user_session'];
$tingkat='not data';

$query="INSERT INTO tb_info_penghargaan (no_ktp,nama_penghargaan,tingkat,keterangan) VALUES (:no_ktp,:nama_penghargaan,:tingkat,:keterangan)";
$stmt=$db->prepare($query);
$stmt->bindParam(':no_ktp',$no_ktp);
$stmt->bindParam(':nama_penghargaan',$_POST['nama_penghargaan']);
$stmt->bindParam(':tingkat',$tingkat);
$stmt->bindParam(':keterangan',$_POST['keterangan']);
$stmt->execute();

if($stmt==false){
	echo"Data penghargaan gagal disimpan";
}
else{
	echo "Silakan isi data penghargaan jika masih ada yang lainnya";
}

?>