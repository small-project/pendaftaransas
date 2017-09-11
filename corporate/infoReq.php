<?php 

$q = "SELECT tb_temporary_perusahaan.no_pendaftaran, tb_temporary_perusahaan.kebutuhan, tb_temporary_perusahaan.create_date, tb_temporary_perusahaan.kode_pekerjaan, tb_temporary_perusahaan.nama_project, tb_temporary_perusahaan.kd_status, tb_temporary_perusahaan.tanggal, tb_temporary_perusahaan.status, tb_kategori_pekerjaan.nama_kategori FROM tb_temporary_perusahaan INNER JOIN tb_kategori_pekerjaan ON tb_kategori_pekerjaan.kode_kategori=tb_temporary_perusahaan.kebutuhan WHERE tb_temporary_perusahaan.kode_perusahaan = :kode";
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
		<td><a href="?p=detail&kode=<?=$mv['no_pendaftaran']?>"><?=$mv['no_pendaftaran']?></a></td>
		<td><?=$mv['nama_kategori']?></td>
		<td><?=$mv['status']?></td>
		<td><?=$mv['create_date']?></td>
	</tr>

	<?php 
}
	?>
</table>
</div>