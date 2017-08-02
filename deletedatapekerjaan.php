<?php
include"db.php";

$idpekerjaan=$_POST['idpekerjaan'];

$query="DELETE FROM tb_info_pekerjaan WHERE id=:idpekerjaan";
$stmt=$db->prepare($query);
$stmt->execute(array(
		':idpekerjaan'=>$idpekerjaan
	));

if($stmt == false){
	echo "Data pekerjaan gagal dihapus";
}
else{
	echo "Data pekerjaan berhasil dihapus";
}

?>