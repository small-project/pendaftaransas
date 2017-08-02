<?php
include"db.php";

$idreferensi=$_POST['idreferensi'];

$query="DELETE FROM tb_info_referensi WHERE id=:idreferensi";
$stmt=$db->prepare($query);
$stmt->execute(array(
		':idreferensi'=>$idreferensi
	));

if($stmt == false){
	echo "Data referensi gagal dihapus";
}
else{
	echo "Data referensi berhasil dihapus";
}

?>