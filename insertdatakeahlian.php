<?php
require_once("session.php");
include"db.php";

$no_ktp=$_SESSION['user_session'];

$query="INSERT INTO tb_info_keahlian (no_ktp,nama_keahlian,nilai) VALUES (:no_ktp,:nama_keahlian,:nilai)";
$stmt=$db->prepare($query);
$stmt->bindParam(':no_ktp',$no_ktp);
$stmt->bindParam(':nama_keahlian',$_POST['nama_keahlian']);
$stmt->bindParam(':nilai',$_POST['nilai']);
$stmt->execute();

if($stmt==false){
	echo"Data keahlian gagal disimpan";
}
else{
	echo "Silakan isi data keahlian jika masih ada yang lainnya";
}

?>