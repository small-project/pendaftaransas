<?php
include"db.php";

$idriwayatkhursus=$_POST['idriwayatkhursus'];

$query="DELETE FROM tb_info_kursus WHERE id=:idriwayatkhursus";
$stmt=$db->prepare($query);
$stmt->execute(array(
		':idriwayatkhursus'=>$idriwayatkhursus
	));

if($stmt == false){
	echo "Data khursus gagal dihapus";
}
else{
	echo "Data khursus berhasil dihapus";
}

?>