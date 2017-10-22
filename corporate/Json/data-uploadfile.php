<?php

include'../db.php';

$ktp=$_GET['no_ktp'];
 
 $query = "SELECT * FROM tb_uploadfile_karyawan WHERE no_ktp= :no_ktp";
 
 $stmt = $db->prepare($query);
 $stmt->bindParam(':no_ktp',$ktp);
 $stmt->execute();
 
 $datauploadfile = array();
 
 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

 	$row["action"]='&nbsp;&nbsp;&nbsp;&nbsp;
  					<a onclick="deletedatauploadfile(id='.$row['id_upload'].')" <i class="fa fa-trash" aria-hidden="true" data-placement="top" title="Hapus !"></i>
				  </a>';
  
  array_push($datauploadfile,$row);

 }
 
 echo json_encode($datauploadfile);

?>