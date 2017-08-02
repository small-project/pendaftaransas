<?php
include"db.php";

$iduploadfile=$_POST['iduploadfile'];

$query="DELETE FROM tb_uploadfile_karyawan WHERE id_upload=:iduploadfile";
$stmt=$db->prepare($query);
$stmt->execute(array(
		':iduploadfile'=>$iduploadfile
	));

if($stmt == false){
	echo "Data upload file gagal dihapus";
}
else{
	echo "Data upload file berhasil dihapus";
}

?>