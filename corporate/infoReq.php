<?php 

$q = "SELECT tb_temporary_perusahaan.no_pendaftaran, tb_temporary_perusahaan.kebutuhan, tb_temporary_perusahaan.create_date, tb_temporary_perusahaan.kode_pekerjaan, tb_temporary_perusahaan.nama_project, tb_temporary_perusahaan.kd_status, tb_temporary_perusahaan.tanggal, tb_temporary_perusahaan.status, tb_kategori_pekerjaan.nama_kategori, tb_status_request.nama_status, tb_status_request.flag FROM tb_temporary_perusahaan INNER JOIN tb_kategori_pekerjaan ON tb_kategori_pekerjaan.kode_kategori=tb_temporary_perusahaan.kebutuhan LEFT JOIN tb_status_request ON tb_status_request.kd_stat = tb_temporary_perusahaan.kd_status WHERE tb_temporary_perusahaan.kode_perusahaan = :kode ORDER BY tb_temporary_perusahaan.tanggal DESC";
$dt = $config->runQuery($q);
$dt->execute(array(
	':kode' => $kode));
	
?>
<br/>
<div class="contain">
	<h3 class="page-header">Info Request Karyawan</h3>

<table class="table table-hover table-bordered">
	<thead>
		<th>Nomor</th>
		<th>Kode Project</th>
		<th>Jenis</th>
		<th>Tanggal Pengajuan</th>
		<th>Status</th>
		<th>Tanggal Status</th>
	</thead>
	<?php
	$i = 1; 
while ($mv = $dt->fetch(PDO::FETCH_LAZY)) {
	# code...
	
	if ($mv['kd_status'] != "") {
		# code...
		$flag = '<label class="label label-lg '.$mv['flag'].'">'.$mv['nama_status'].'</label>';
	} else {
		$flag = '<label class="label label-lg label-default">not set</label>';
	}
	?>
	<tr>
		<td><?=$i++?></td>
		<td><a href="?p=detail&kode=<?=$mv['no_pendaftaran']?>"><?=$mv['no_pendaftaran']?></a></td>
		<td><?=$mv['nama_kategori']?></td>
		<td><?=$mv['create_date']?></td>
		<td><?=$flag?></td>
		<td><?=$mv['tanggal']?></td>
	</tr>

	<?php 
}
	?>
</table>
</div>