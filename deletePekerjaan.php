<?php
require_once("class.user.php");

$data = $_GET['id'];

$dt = new USER();

$sql = "DELETE FROM tb_apply_pekerjaan WHERE id = :id ";
$stmt = $dt->runQuery($sql);
$stmt->execute(array(
	':id'	=> $data));
	if ($stmt) {
		# code...
		echo "<script>
             alert('Data Berhasil di Hapus.'); 
             window.history.go(-1);
     </script>";
	}
?>