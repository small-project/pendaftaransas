<?php

include'../db.php';

$ktp=$_GET['no_ktp'];
 
 $query = "SELECT * FROM tb_info_kursus WHERE NO_KTP= :no_ktp";
 
 $stmt = $db->prepare($query);
 $stmt->bindParam(':no_ktp',$ktp);
 $stmt->execute();
 
 $datakhursus = array();
 
 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

 	$row["action"]='&nbsp;&nbsp;&nbsp;&nbsp;
  					<a onclick="deletedatakhursus(id='.$row['id'].')" <i class="fa fa-trash" aria-hidden="true" data-placement="top" title="Hapus !"></i>
				  </a>';
  
  array_push($datakhursus,$row);

 }
 
 echo json_encode($datakhursus);

?>