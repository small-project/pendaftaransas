<?php
require_once("session.php");
include"db.php";

$no_ktp=$_SESSION['user_session'];
$keperibadian=$_POST['keperibadian'];
$menghire=$_POST['menghire'];


$query="UPDATE tb_karyawan SET keperibadian=:keperibadian, menghire=:menghire WHERE no_ktp=:no_ktp";
$stmt=$db->prepare($query);
$stmt->execute(array(
				'keperibadian'=>$keperibadian,
				'menghire'=>$menghire,
				'no_ktp'=>$no_ktp 
				)); 

if($stmt == false){
	echo"Data personal gagal disimpan";
}
else{
	echo "Terimakasih sudah mengisi form registrasi";
}

?>