<?php
include"db.php";

$idbahasa=$_POST['idbahasa'];

$query="DELETE FROM tb_info_bahasa WHERE id=:idbahasa";
$stmt=$db->prepare($query);
$stmt->execute(array(
		':idbahasa'=>$idbahasa
	));

if($stmt == false){
	echo "Data bahasa gagal dihapus";
}
else{
	echo "Data bahasa berhasil dihapus";
}

?>