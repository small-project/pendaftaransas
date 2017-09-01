<?php

require_once 'class.user.php';

$id = $_GET['id'];

$data = new USER();
$query = "DELETE FROM tb_list_perkerjaan_perusahaan WHERE id = :data";
$stmt = $data->runQuery($query);
$stmt->execute(array(
	':data' => $id ));

if (!$stmt) {
 	# code...
 	echo "data tidak berhasil di hapus";
 } else {
 	 header("Location: pengajuan.php?p=mpo");
 }
?>