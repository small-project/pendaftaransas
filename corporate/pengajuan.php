<?php 
    include_once 'header.php';
    require_once 'class.user.php';

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
    	}
    }   
    require_once 'page.user.php';
    include_once 'footer.php'

?>

