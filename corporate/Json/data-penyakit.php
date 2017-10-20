<?php

include'../../db.php';

$ktp=$_GET['no_ktp'];

$query = "SELECT * FROM tb_info_penyakit WHERE NO_KTP= :no_ktp";

$stmt = $db->prepare($query);
$stmt->bindParam(':no_ktp',$ktp);
$stmt->execute();

$datapenyakit = array();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

    $row["action"]='&nbsp;&nbsp;&nbsp;&nbsp;
  					<a onclick="deletedatapenyakit(id='.$row['id'].')" <i class="fa fa-trash" aria-hidden="true" data-placement="top" title="Hapus !"></i>
				  </a>
				';

    array_push($datapenyakit,$row);

}

echo json_encode($datapenyakit);

?>