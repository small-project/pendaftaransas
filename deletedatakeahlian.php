<?php
include"db.php";

$idkeahlian=$_POST['idkeahlian'];

$query="DELETE FROM tb_info_keahlian WHERE id=:idkeahlian";
$stmt=$db->prepare($query);
$stmt->execute(array(
		':idkeahlian'=>$idkeahlian
	));

if($stmt == false){
	echo "Data keahlian gagal dihapus";
}
else{
	echo "Data keahlian berhasil dihapus";
}

?>