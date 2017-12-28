<?php
include"db.php";

$iduploadfile=$_POST['iduploadfile'];

	$queryshow = "SELECT * FROM tb_uploadfile_karyawan WHERE id_upload=:iduploadfile";
	$stmt=$db->prepare($queryshow);
	$stmt->execute(array(
		':iduploadfile'=>$iduploadfile
	));
	$data = $stmt->fetch();
	$nama_file = $data['nama_file'];

	$query="DELETE FROM tb_uploadfile_karyawan WHERE nama_file=:nama_file";
	$stmt=$db->prepare($query);
	$stmt->execute(array(
		':nama_file'=>$nama_file
	));

	$target ="Upload/".$nama_file;
	if(file_exists($target)){
		unlink($target);
	}

if($stmt == false){
	echo "Data upload file gagal dihapus";
}
else{
	echo "Data upload file berhasil dihapus";
}

?>