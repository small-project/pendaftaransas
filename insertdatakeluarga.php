<?php
require_once("session.php");
include"db.php";

$no_ktp=$_SESSION['user_session'];

$query = "INSERT INTO tb_info_keluarga (no_ktp,nama_lengkap,status_keluarga,jenis_kelamin,tempat_lahir,tanggal_lahir,pendidikan,pekerjaan,nomor_handphone,hub_urgent) VALUES (:no_ktp,:nama_lengkap,:status_keluarga,:jenis_kelamin,:tempat_lahir,:tanggal_lahir,:pendidikan,:pekerjaan,:nomor_handphone,:hub_urgent)";
$stmt = $db->prepare($query);
$stmt->bindParam(':no_ktp',$no_ktp);
$stmt->bindParam(':nama_lengkap',$_POST['nama_lengkap']);
$stmt->bindParam(':status_keluarga',$_POST['statuskeluarga']);
$stmt->bindParam(':jenis_kelamin',$_POST['jenis_kelamin']);
$stmt->bindParam(':tempat_lahir',$_POST['tempat_lahir']);
$stmt->bindParam(':tanggal_lahir',$_POST['tanggal_lahir']);
$stmt->bindparam(':pendidikan',$_POST['pendidikan']);
$stmt->bindParam(':pekerjaan',$_POST['pekerjaan']);
$stmt->bindParam(':nomor_handphone',$_POST['nomor_handphone']);
$stmt->bindParam(':hub_urgent',$_POST['huburgent']);
$stmt->execute();


	if($stmt == FALSE)
		{
			echo "Data keluarga gagal disimpan";
		}
		else
		{
			echo "Silakan isi kembali data keluarga jika masih ada list keluarga yang belum ditambahkan";
		}


?>