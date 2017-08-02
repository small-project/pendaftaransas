<?php
if (isset($_POST['simpanNPWP'])) {
	# code...
	$input = new USER();

	$id = $_POST['no_ktp'];
	$npwp = $_POST['no_npwp'];
	$bpjs = $_POST['no_bpjs'];


	try {
		$sql = "UPDATE tb_karyawan SET no_NPWP=:nomor, no_BPJS=:bpjs WHERE no_ktp=:id";
	$stmt = $input->runQuery($sql);
	$stmt->execute(array(
		':nomor'=> $npwp,
		':bpjs'=> $bpjs,
		':id'=> $id));
	if (!$stmt) {
			# code...
			echo "data tidak masuk";
		} else{
			header('Location: profile.php');
		}
		
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}

?>
	
  <div class="row">
  	<div class="col-md-2"></div>
  <div class="col-md-8">
  	<div class="text-center">
	  	<div class="well">
	  	<h3 class="text-center">INPUT NOMOR NPWP && BPJS</h3>
  <hr>
	  		<form class="form-inline" method="post" action="">
			  <div class="form-group">
			    <input type="text" class="form-control" name="no_npwp" placeholder="npwp"/ required>
			    <input type="text" class="form-control" name="no_bpjs" placeholder="bpjs"/ required>
			    <input type="hidden" class="form-control" name="no_ktp" value="<?php echo $user_id; ?>" />

			  </div>
			  
			  <button type="submit" name="simpanNPWP" class="btn btn-danger">Simpan</button>
			</form>
	  	</div>
	</div>
  </div>
  <div class="col-md-2"></div>
  </div>
