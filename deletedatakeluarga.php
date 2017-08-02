<?php
include"db.php";

$idkeluarga=$_POST['idkeluarga'];

$query="DELETE FROM tb_info_keluarga WHERE id=:idkeluarga";
$stmt=$db->prepare($query);
$stmt->execute(array(
		':idkeluarga'=>$idkeluarga
	));

if($stmt == false){
	echo "Data keluarga gagal dihapus";
}
else{
	echo "Data keluarga berhasil dihapus";
}

?>