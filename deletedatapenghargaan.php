<?php
include"db.php";

$idpenghargaan=$_POST['idpenghargaan'];

$query="DELETE FROM tb_info_penghargaan WHERE id=:idpenghargaan";
$stmt=$db->prepare($query);
$stmt->execute(array(
		':idpenghargaan'=>$idpenghargaan
	));

if($stmt == false){
	echo "Data penghargaan gagal dihapus";
}
else{
	echo "Data penghargaan berhasil dihapus";
}

?>