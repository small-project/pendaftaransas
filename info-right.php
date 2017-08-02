<div class="panel panel-primary">
<div class="panel-heading">
	Informasi Personal
</div>
<div class="panel-body">
	<form class="form-horizontal">
	<div class="col-sm-4">
		Nomor KTP
	</div>
	<div class="col-sm-4">
		Nama Lengkap
	</div>
	<div class="col-sm-4">
		Alamat Email
	</div>
	  <div class="form-group">
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['no_ktp']); ?>" disabled>
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nama_depan']); ?> <?php print($userRow['nama_belakang']); ?>" disabled>
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['email']); ?>" disabled>
	    </div>
	  </div>

		<div class="col-sm-4">
			Nomor Handphone
		</div>
		<div class="col-sm-4">
			Nomor Telp
		</div>
		<div class="col-sm-4">
			Tempat Tanggal Lahir
		</div>

	  <div class="form-group">
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nomor_hp']); ?>" disabled>
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nomor_telp']); ?>" disabled>
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['tempat_lahir']); ?>, <?php print($userRow['tgl_lahir']); ?>" disabled>
	    </div>
	  </div>

	  <div class="col-sm-4">
		Nama Suku
	</div>
	<div class="col-sm-4">
		Agama
	</div>
	<div class="col-sm-4">
		Status Pernikahan
	</div>

	  <div class="form-group">
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nama_suku']); ?>" disabled>
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['agama']); ?>" disabled>
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['status_perkawinan']); ?>" disabled>
	    </div>
	  </div>

	  	<div class="col-sm-2">
			Tinggi
		</div>
		<div class="col-sm-2">
			Berat
		</div>
		<div class="col-sm-4">
			Nomor SIM
		</div>
		<div class="col-sm-2">
			SIM
		</div>
		<div class="col-sm-2">
			Jenis Kelamin
		</div>

	  <div class="form-group">
	    <div class="col-sm-2">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['tinggi_badan']); ?>" disabled>
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['berat_badan']); ?>" disabled>
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nomor_sim']); ?>" disabled>
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['jenis_sim']); ?>" disabled>
	    </div>
	    <div class="col-sm-2">
	    	<input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['jenis_kelamin']); ?>" disabled>
	    </div>
	  </div>
	  <hr>
	  <div class="col-sm-4">
			Status Tempat Tinggal
		</div>
		<div class="col-sm-8">
			Alamat Rumah
		</div>

	  <div class="form-group">
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['status_tempat_tinggal']); ?>" disabled>
	    </div>
	    <div class="col-sm-8">
	      <strong><?php print($userRow['alamat']); ?>, <?php print($userRow['kelurahan']); ?>, <?php print($userRow['kecamatan']); ?>, <?php print($userRow['kota']); ?></strong>
	    </div>
	    
	  </div>
	  

	  <hr>
	  <div class="col-md-12">
		  	<div class="col-sm-4">
				Nomor BPJS
			</div>
			<div class="col-sm-4">
				Nomor NPWP
			</div>
			<div class="col-sm-4">
				
			</div>
			</div>
			<div class="col-md-12">
		  <div class="form-group">
		    <div class="col-sm-4">
		      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['no_BPJS']); ?>" disabled>
		    </div>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['no_NPWP']); ?>" disabled>
		    </div>
		    <div class="col-sm-4">
		    	
		    </div>
		  </div>
	  </div>
	  <hr>


	  <div class="col-sm-4">
		Nama Bank
	</div>
	<div class="col-sm-4">
		Cabang
	</div>
	<div class="col-sm-4">
		Nomor ATM
	</div>

	<?php 
		$stmt = "SELECT tb_kode_bank.nama_bank, tb_info_bank.no_ktp, tb_info_bank.cabang, tb_info_bank.nomor_rek FROM tb_info_bank
LEFT JOIN tb_kode_bank ON tb_kode_bank.kd_bank=tb_info_bank.kd_bank WHERE tb_info_bank.no_ktp = :id";
		$stmt = $auth_user->runQuery($stmt);
		$stmt->execute(array(
			':id'	=> $user_id));
		$show = $stmt->fetch(PDO::FETCH_LAZY);
	?>
	  <div class="form-group">
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php echo($show['nama_bank']); ?>" disabled>
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php echo($show['cabang']); ?>" disabled>
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php echo($show['nomor_rek']); ?>" disabled>
	    </div>
	  </div>
	  
	</form>
</div>
</div>