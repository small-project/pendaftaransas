<?php 

$q = "SELECT tb_temporary_perusahaan.no_pendaftaran, tb_temporary_perusahaan.kebutuhan, tb_temporary_perusahaan.create_date, tb_temporary_perusahaan.kode_pekerjaan, tb_temporary_perusahaan.nama_project, tb_temporary_perusahaan.kd_status, tb_temporary_perusahaan.tanggal, tb_temporary_perusahaan.status FROM tb_temporary_perusahaan WHERE tb_temporary_perusahaan.kode_perusahaan = :kode";
$dt = $config->runQuery($q);
$dt->execute(array(
	':kode' => $kode));
	
?>
<br/>
<h3 class="page-header">Info Request Karyawan</h3>

<table class="table table-hover">
	<thead>
		<th>Nomor</th>
		<th>Nama Project</th>
		<th>Jenis</th>
		<th>Kebutuhan</th>
		<th>Status</th>
		<th>Tanggal Pengajuan</th>
	</thead>
	<?php
	$i = 1; 
while ($mv = $dt->fetch(PDO::FETCH_LAZY)) {
	# code...

	?>
	<tr>
		<td><?=$i++?></td>
		<td><?=$mv['no_pendaftaran']?></td>
		<td><?=$mv['kebutuhan']?></td>
		<td><?=$mv['kode_pekerjaan']?></td>
		<td><?=$mv['status']?></td>
		<td><?=$mv['create_date']?></td>
	</tr>

	<?php 
}
	?>
</table>