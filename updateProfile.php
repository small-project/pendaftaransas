<?php
	
	if (isset($_POST['addUpdate'])) {
		# code...
		$ktp = $_POST['txt_ktp'];
		$nama = $_POST['txt_nama'];
		$nama = explode(' ', $nama);
		$nama_depan = $nama[0];
		$nama_belakang = $nama[1];

		$hp = $_POST['txt_hp'];
		$telp = $_POST['txt_telp'];
		$suku = $_POST['txt_suku'];
		$agama = $_POST['txt_agama'];
		$status = $_POST['txt_status'];
		$tinggi = $_POST['txt_tinggi'];
		$berat = $_POST['txt_berat'];
		$nomor_sim = $_POST['txt_sim'];
		$jenis = $_POST['txt_jenis'];
		$tmpt = $_POST['txt_tmpt'];

		$bpjs = $_POST['txt_bpjs'];
		$npwp = $_POST['txt_npwp'];
		
		$alamat = $_POST['txt_alamat'];
		$kelurahan = $_POST['txt_kelurahan'];
		$kecamatan = $_POST['txt_kecamatan'];
		$kota = $_POST['txt_kota'];

		// $type_bank = $_POST['txt_bank'];
		// $cabang = $_POST['txt_cabang'];
		// $norek = $_POST['txt_rek'];

	$sql = "UPDATE tb_karyawan SET nama_depan = :depan, nama_belakang = :belakang, nomor_hp = :hp, nomor_telp = :telp, nama_suku = :suku, agama = :agama, status_perkawinan = :status, tinggi_badan = :tinggi, berat_badan = :berat, no_NPWP = :npwp, no_BPJS = :bpjs ,nomor_sim = :nomorSim, jenis_sim = :jenisSim, status_tempat_tinggal = :tmpt, alamat = :alamat, kelurahan = :kel, kecamatan = :kec, kota = :kota WHERE no_ktp = :ktp";
	$stmt = $auth_user->runQuery($sql);
	$stmt->execute(array(
		':depan'	=> $nama_depan,
		':belakang'	=> $nama_belakang,
		':hp'		=> $hp,
		':telp'		=> $telp,
		':suku'		=> $suku,
		':agama'	=> $agama,
		':status'	=> $status,
		':tinggi'	=> $tinggi,
		':berat'	=> $berat,
		':npwp'		=> $npwp,
		':bpjs'		=> $bpjs,
		':nomorSim'	=> $nomor_sim,
		':jenisSim'	=> $jenis,
		':tmpt'		=> $tmpt,
		':alamat'	=> $alamat,
		':kel'		=> $kelurahan,
		':kec'		=> $kecamatan,
		':kota'		=> $kota,
		':ktp'		=> $ktp
		));
	if ($stmt) {
		# code...
		echo "<script>
alert('Update Success!');
window.location.href='/SAS/pendaftaran/';
</script>";
	} else{
		echo "Gagal";
	}

	}

?>
<div class="panel panel-primary">
<div class="panel-heading">
	Informasi Personal
</div>
<div class="panel-body">
	<form class="form-horizontal" method="post" action="">
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
	      <input type="text" class="form-control" id="inputEmail3" name="txt_ktp" value="<?php print($userRow['no_ktp']); ?>" readonly>
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nama_depan']); ?> <?php print($userRow['nama_belakang']); ?>" name="txt_nama" >
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['email']); ?>" readonly>
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
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nomor_hp']); ?>" name="txt_hp">
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nomor_telp']); ?>" name="txt_telp">
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['tempat_lahir']); ?>, <?php print($userRow['tgl_lahir']); ?>" readonly>
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
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nama_suku']); ?>" name="txt_suku">
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['agama']); ?>" name="txt_agama">
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['status_perkawinan']); ?>" name="txt_status">
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
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['tinggi_badan']); ?>" name="txt_tinggi">
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['berat_badan']); ?>" name="txt_berat">
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nomor_sim']); ?>" name="txt_sim">
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['jenis_sim']); ?>" name="txt_jenis">
	    </div>
	    <div class="col-sm-2">
	    	<input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['jenis_kelamin']); ?>" readonly>
	    </div>
	  </div>
	  <hr>
	  <div class="col-sm-4">
			Status Tempat Tinggal
		</div>
		<div class="col-sm-4">
			Alamat Rumah <small><strong></strong></small>
		</div>
		<div class="col-sm-4">
			Kelurahan <small><strong></strong></small>
		</div>

	  <div class="form-group">
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['status_tempat_tinggal']); ?>" name="txt_tmpt">
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['alamat']); ?>" name="txt_alamat">
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['kelurahan']); ?>" name="txt_kelurahan">
	    </div>
	    
	  </div>

	  <div class="col-sm-4">
			Kecamatan
		</div>
		<div class="col-sm-4">
			Kota <small><strong></strong></small>
		</div>
		<div class="col-sm-4">
			.
		</div>
		<div class="form-group">

	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['kecamatan']); ?>" name="txt_kecamatan">
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['kota']); ?>" name="txt_kota">
	    </div>
	    <div class="col-sm-4">
	      
	    </div>
	    
	  </div>
	  <hr>
	  <div class="col-md-12">
	  	<div class="col-sm-4">Nomor BPJS</div>
	  	<div class="col-sm-4">Nomor NPWP</div>
	  	<div class="col-sm-4"></div>
	  </div>
	  
	  <div class="col-md-12">
	  	<div class="form-group">

	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['no_BPJS']); ?>" name="txt_bpjs">
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['no_NPWP']); ?>" name="txt_npwp">
	    </div>
	    <div class="col-sm-4">
	    	<button class="btn btn-block btn-primary" type="submit" name="addUpdate">
	  		Update
	  	</button>
	    </div>
	  </div>
<!-- 
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
	      <input type="text" class="form-control" id="inputEmail3" value="<?php echo($show['nama_bank']); ?>" name="txt_bank">
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php echo($show['cabang']); ?>" name="txt_cabang">
	    </div>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="inputEmail3" value="<?php echo($show['nomor_rek']); ?>" name="txt_rek">
	    </div>
	  </div> -->
	  
	  
	</form>

	<br>
</div>
</div>
<br>