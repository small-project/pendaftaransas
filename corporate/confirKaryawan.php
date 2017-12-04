<?php 
require_once 'class.user.php';
$config = new USER();

$update = $_GET['add'];

$delete = $_GET['del'];

$kode = $_GET['pendaftaran'];


if (!empty($update)) {

	$id = "1";
	$sql = "UPDATE tb_list_karyawan SET status_karyawan = :status WHERE no_nip = :nip";
	$stmt = $config->runQuery($sql);
	$stmt->execute(array(':status' => $id, ':nip' => $update));

	if ($stmt) {
		echo "<script>
            alert('Karyawan Berhasil di tambahkan!');
            window.location.href='home.php?p=detail&kode=".$kode."';
            </script>";
	}else{
		echo "<script>
            alert('Karyawan tidak berhasil di tambahkan!');
            window.location.href='home.php?p=detail&kode=".$kode."';
            </script>";
	}
}elseif(!empty($delete)){
	$id = "2";
	$sql = "UPDATE tb_list_karyawan SET status_karyawan = :status WHERE no_nip = :nip";
	$stmt = $config->runQuery($sql);
	$stmt->execute(array(':status' => $id, ':nip' => $delete));

	if ($stmt) {
		echo "<script>
            alert('Karyawan Berhasil di Remove!');
            window.location.href='home.php?p=detail&kode=".$kode."';
            </script>";
	}else{
		echo "<script>
            alert('Karyawan tidak berhasil di Remove!');
            window.location.href='home.php?p=detail&kode=".$kode."';
            </script>";
	}
}
?>