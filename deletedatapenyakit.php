<?php
include"db.php";

$idpenyakit=$_POST['idpenyakit'];

$query="DELETE FROM tb_info_penyakit WHERE id=:idpenyakit";
$stmt=$db->prepare($query);
$stmt->execute(array(
		':idpenyakit'=>$idpenyakit
	));

if($stmt == false){
	echo "Data penyakit gagal dihapus";
}
else{
	echo "Data penyakit berhasil dihapus";
}

?>