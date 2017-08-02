<?php
require_once("session.php");
include"db.php";

$no_ktp=$_SESSION['user_session'];

$query="INSERT INTO tb_info_pekerjaan (no_ktp,nama_perusahaan,tahun_masuk,tahun_keluar,jabatan,gaji,alasan_berhenti,keterangan) VALUES (:no_ktp,:nama_perusahaan,:tahun_masuk,:tahun_keluar,:jabatan,:gaji,:alasan_berhenti,:keterangan)";
$stmt=$db->prepare($query);
$stmt->bindParam(':no_ktp',$no_ktp);
$stmt->bindParam(':nama_perusahaan',$_POST['nama_perusahaan']);
$stmt->bindParam(':tahun_masuk',$_POST['tahun_masuk']);
$stmt->bindParam(':tahun_keluar',$_POST['tahun_keluar']);
$stmt->bindParam(':jabatan',$_POST['jabatan']);
$stmt->bindParam(':gaji',$_POST['gaji']);
$stmt->bindParam(':alasan_berhenti',$_POST['alasan_berhenti']);
$stmt->bindParam(':keterangan',$_POST['keterangan']);
$stmt->execute();

if($stmt==false){
	echo"Data pekerjaan gagal disimpan";
}
else{
	echo "Silakan isi data pekerjaan jika masih ada yang lainnya";
}

?>