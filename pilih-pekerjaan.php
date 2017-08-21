<?php
	if (isset($_POST['addPekerjaan'])) {
		# code...
		$kode = $_POST['pekerjaan'];

		$query = "INSERT INTO tb_apply_pekerjaan (no_ktp, kd_pekerjaan) VALUES (:id, :kode)";
		$stmt = $auth_user->runQuery($query);
		$stmt->execute(array(
			':id'	=> $user_id,
			':kode'	=> $kode));
		if (!$stmt) {
			# code...
			echo "data tidak masuk";
		} else{
			echo "<script>
alert('Update Success!');
window.location.href='/SAS/pendaftaran/';
</script>";
		}
	}
?>
<div class="row">
	<div class="col-md-2"></div>
  <div class="col-md-8">
  	<div class="jumbotron">
  	<h3 class="text-center">Pilih Jenis Pekerjaan</h3> <hr>
	  		<div class="text-center">
		  	<form class="form-inline" method="post" action="">
			  <div class="form-group">
			    <select name="pekerjaan" class="form-control">
					  <option value="0" selected>-- pilih pekerjaan --</option>
					  <?php
					  	$sql = "SELECT * FROM tb_jenis_pekerjaan";
					  	$pilih = $auth_user->runQuery($sql);
					  	$pilih->execute();

					  	while ($row = $pilih->fetch(PDO::FETCH_LAZY)) {
					  		# code...
					  	
					  ?>
					  <option value="<?php echo $row['kd_pekerjaan']; ?>"> <?php echo $row['nama_pekerjaan']; ?></option>
					  <?php }?>
					  </select>
			  </div>
			  
			  <button type="submit" class="btn btn-default" name="addPekerjaan">Simpan</button>
			</form>
		</div>
  	</div>
  </div>
  <div class="col-md-2"></div>
</div>



