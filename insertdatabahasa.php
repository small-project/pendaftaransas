<?php
require_once("session.php");
include"db.php";

$no_ktp=$_SESSION['user_session'];

$query="INSERT INTO tb_info_bahasa (no_ktp,nama_bahasa,writing,listening,speaking) VALUES (:no_ktp,:nama_bahasa,:writing,:listening,:speaking)";
$stmt=$db->prepare($query);
$stmt->bindParam(':no_ktp',$no_ktp);
$stmt->bindParam(':nama_bahasa',$_POST['nama_bahasa']);
$stmt->bindParam(':writing',$_POST['writing']);
$stmt->bindParam(':listening',$_POST['listening']);
$stmt->bindParam(':speaking',$_POST['speaking']);
$stmt->execute();

if($stmt==false){
	echo"Data bahasa gagal disimpan";
}
else{
	echo "Silakan isi data bahasa jika masih ada yang lainnya";
}

?>