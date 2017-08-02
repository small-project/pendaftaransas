<?php
	if (isset($_POST['addBank'])) {
		# code...
		$kode = $_POST['no_akun'];
		$cabang = $_POST['txt_cabang'];
		$ktp = $_POST['no_ktp'];
		$bank = $_POST['txt_bank'];

		$query = "INSERT INTO tb_info_bank (no_ktp, kd_bank, cabang, nomor_rek) VALUES (:ktp, :kd, :cabang, :akun)";
		$stmt = $auth_user->runQuery($query);
		$stmt->execute(array(
			':ktp'	=> $ktp,
			':kd'	=> $bank,
			':cabang'=> $cabang,
			':akun'	=> $kode));
		if (!$stmt) {
			# code...
			echo "data tidak masuk";
		} else{
			header('Location: profile.php');
		}
	}
?>
<div class="row">
  	<div class="col-md-2"></div>
  <div class="col-md-8">
  	<div class="text-center">
	  	<div class="well">
	  	<h3 class="text-center">INPUT NOMOR BANK</h3>
  <hr>
	  		<form class="form-inline" method="post" action="">
			  <div class="form-group">
			    <input type="text" class="form-control" name="no_akun" placeholder="nomor akun" required />
			    <input type="text" class="form-control" name="txt_cabang" placeholder="cabang" required />
			    <input type="hidden" class="form-control" name="no_ktp" value="<?php echo $user_id; ?>" />
			    <select name="txt_bank" class="form-control">
					  <option value="0" selected>-- pilih Bank --</option>
					  <?php
					  	$sql = "SELECT * FROM tb_kode_bank";
					  	$pilih = $auth_user->runQuery($sql);
					  	$pilih->execute();

					  	while ($row = $pilih->fetch(PDO::FETCH_LAZY)) {
					  		# code...
					  	
					  ?>
					  <option value="<?php echo $row['kd_bank']; ?>"> <?php echo $row['nama_bank']; ?></option>
					  <?php }?>
					  </select>

			  </div>
			  
			  <button type="submit" name="addBank" class="btn btn-danger">Simpan</button>
			</form>
	  	</div>
	</div>
  </div>
  <div class="col-md-2"></div>
  </div>