<?php
include"db.php";

$id = $_POST['id'];
$nama_penyakit=$_POST['nama_penyakit'];
$status = $_POST['status'];

$query="UPDATE tb_info_penyakit SET nama_penyakit=:nama_penyakit, status=:status WHERE id=:id";
$stmt=$db->prepare($query);
$stmt->execute(array(
    ':id'=>$id,
    ':nama_penyakit'=>$nama_penyakit,
    ':status'=>$status
));

if($stmt == false){
    echo "Data penyakit gagal diubah";
}
else{
    echo "Data penyakit berhasil diubah";
}

?>