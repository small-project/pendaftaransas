<?php 
require_once 'header.php';
require_once ("session.php");
include_once 'class.user.php';
$config = new USER();
$kode = $_SESSION['kode_session'];

    $sql = "SELECT * FROM tb_perusahaan INNER JOIN tb_temporary_perusahaan ON tb_temporary_perusahaan.kode_perusahaan = tb_perusahaan.kode_perusahaan WHERE tb_perusahaan.kode_perusahaan = :kode";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array( ':kode' => $kode));

    $info = $stmt->fetch(PDO::FETCH_LAZY);

include 'navbar.php';

include 'page.php';

require_once'footer.php';
?>