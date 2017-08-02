<table class="table table-hover">
	<thead>
		<th>#</th>
		<th>Nama Pekerjaan</th>
		<th>Keterangan</th>
		<th>Action</th>
	</thead>
	<tbody>
	<?php 

		$sql = "SELECT tb_job.no_nip, tb_job.kode_detail_job, tb_list_job.id, tb_list_job.nama_job, tb_list_job.deskripsi_job, tb_list_job.keterangan, tb_list_job.start_at, tb_list_job.finish_at FROM tb_job
LEFT JOIN tb_list_job ON tb_list_job.kode_detail_job=tb_job.kode_detail_job WHERE tb_job.no_nip = :nomor";
		$stmt = $auth_user->runQuery($sql);
		$stmt->execute(array(
			':nomor'	=> $user_id));

		if ($stmt->rowCount() == 0) {
			# code...
			echo "<tr>
			<td colspan='4'>Data belum ada.</td>
			</tr>";
		}else{
			$i = 0;
			while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
				# code...
				$i++;
			if ($row['start_at'] == '') {
				# code...
				$label = "Start";
				$btn = "btn btn-xs btn-primary";
				$icon = "glyphicon glyphicon-play-circle";
			}elseif (empty($row['finish_at'])) {
				# code...
				$label = "Finish";
				$btn = "btn btn-xs btn-danger";
				$icon = "glyphicon glyphicon-ok";
			}else{
				$label = "Done";
				$btn = "btn btn-xs btn-success";
				$icon = "glyphicon glyphicon-ok";
			}
	?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['nama_job']; ?></td>
		<td><?php echo $row['keterangan']; ?></td>
		<td>
			<a href="change.php?kode=<?php echo $row['id']; ?>">
				<button class="<?php echo $btn; ?>">
					<span class="<?php echo $icon; ?>"></span> <?php echo $label; ?>
				</button>
			</a>
		</td>
		</tr>
		<?php }}?>
	</tbody>
</table>