<?php
	$sql = "SELECT tb_jenis_pekerjaan.kd_pekerjaan, tb_jenis_pekerjaan.nama_pekerjaan, tb_apply_pekerjaan.id, tb_apply_pekerjaan.no_ktp, tb_apply_pekerjaan.status FROM tb_jenis_pekerjaan
INNER JOIN tb_apply_pekerjaan ON tb_apply_pekerjaan.kd_pekerjaan=tb_jenis_pekerjaan.kd_pekerjaan WHERE tb_apply_pekerjaan.no_ktp=:id";
	$cek = $auth_user->runQuery($sql);
	$cek->execute(array(
		':id'	=> $user_id));
	
?>
<div class="row">
	<div class="col-md-12">
		<center><img class="img-responsive img-rounded" width="250px" src="<?php echo $userRow['foto']; ?>" alt="Avatar" title="Change the avatar"></center>
	</div>
</div>
<br/>
<hr>
<strong>Pekerjaan yang dipilih:</strong>
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

