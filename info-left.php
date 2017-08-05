<?php
	$sql = "SELECT tb_jenis_pekerjaan.kd_pekerjaan, tb_jenis_pekerjaan.nama_pekerjaan, tb_apply_pekerjaan.id, tb_apply_pekerjaan.no_ktp, tb_apply_pekerjaan.status FROM tb_jenis_pekerjaan
INNER JOIN tb_apply_pekerjaan ON tb_apply_pekerjaan.kd_pekerjaan=tb_jenis_pekerjaan.kd_pekerjaan WHERE tb_apply_pekerjaan.no_ktp=:id";
	$cek = $auth_user->runQuery($sql);
	$cek->execute(array(
		':id'	=> $user_id));

	if(isset($_POST['updateimages'])){

		require_once("session.php");
		include"db.php";

		$no_ktp=$_SESSION['user_session'];
		$updateimages = $_POST['foto'];

		$sql="UPDATE tb_karyawan set foto=:foto where no_ktp=:no_ktp";
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':no_ktp',$no_ktp);
		$stmt->bindParam(':foto',$updateimages);
		$stmt->execute();

		if($stmt==false){
			echo"Data bahasa gagal disimpan";
		}
		else{
			header("Refresh:0; url=profile.php?p=profile");
		}

	}
	
?>
<div class="row">

	       <div class="col-md-12" align="center">
          <div class="form-group">
          
          <div>
          <img  src="<?php echo $userRow['foto']; ?>" id='defaultimg' width="250" height="240" class="img-circle">
          <img id='img' width="200" height="190" class="img-circle" style=display:none;><br><br>
          </div>

          <div id=uploadfile align="center">
            <label class="btn btn-primary">
                Choose File <input type="file" id="imgInp" accept="image/*" capture="camera" class="form-control" style="display: none;">
            </label>
          </div>

		  <div class="col-sm-12">
		<form method="post" action="">
		<input type="hidden" name="foto" id="updatefoto">
        <button type="button" class="btn btn-danger" onclick="clearImage()" style=display:none; id="clear"><strong>Clear Image</strong></button>
		<button type="submit" class="btn btn-success" name="updateimages" style=display:none; id="updateimages"><strong>Update Image</strong></button>

		 </form>

		  </div>

		  </div>
          </div> 

</div>
<br/>
<hr>
<strong>Pekerjaan yang dipilih:</strong>
<br/>
<p>
	<a href="?p=pilihPekerjaan" >pilih pekerjaan</a>
</p>
<br/>
	<table class="table table-bordered table-responsive">
		<thead>
			<th>Nama Pekerjaan</th>
			<th>#</th>
		</thead>
		<tbody>
		<?php 
			while ($row = $cek->fetch(PDO::FETCH_LAZY)) {
				# code...
			
		?>
			<tr>
				<td><?php echo $row['nama_pekerjaan']; ?></td>
				<td>
					<a href="deletePekerjaan.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus Pekerjaan ini ?');">
						<button class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
					</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

