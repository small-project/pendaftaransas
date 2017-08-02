<?php
include"db.php";

$idpendidikan=$_POST['idpendidikan'];

$query="DELETE FROM tb_info_pendidikan WHERE id=:idpendidikan";
$stmt=$db->prepare($query);
$stmt->execute(array(
		':idpendidikan'=>$idpendidikan
	));

if($stmt == false){
	echo "Data pendidikan gagal dihapus";
}
else{
	echo "Data pendidikan berhasil dihapus";
}

?>