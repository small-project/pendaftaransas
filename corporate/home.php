<?php 
require_once 'header.php';
require_once ("session.php");
include_once 'class.user.php';
$config = new USER();
$kode = $_SESSION['kode_session'];

    $sql = "SELECT * FROM tb_perusahaan WHERE tb_perusahaan.kode_perusahaan = :kode";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array( ':kode' => $kode));

    $info = $stmt->fetch(PDO::FETCH_LAZY);


include 'navbar.php';

if (isset($_POST['addList'])) {
      $namePekerjaan = $_POST['listPekerjaan'];
      $jmlh = $_POST['total'];
        $kode = $_POST['kodeMPO'];

      $data = new USER();

      $sql = "INSERT INTO tb_list_perkerjaan_perusahaan (code, name_list, total) VALUES (:kode, :name, :total)";
      $stmt = $data->runQuery($sql);
      $stmt->execute(array(
            ':kode' => $kode,
        ':name' => $namePekerjaan,
        ':total' => $jmlh
        ));
      if (!$stmt) {
        # code...
        echo "Data tidak masuk";
      } else 
      {
        header('Location: ?p=reqMPO');
      }
    }

include 'page.php';

include 'modal.php';

require_once'footer.php';
?>