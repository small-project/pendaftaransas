<?php 

$id = $_GET['kode'];

$q = "SELECT tb_temporary_perusahaan.no_pendaftaran, tb_temporary_perusahaan.nama_perusahaan, tb_temporary_perusahaan.kode_perusahaan, tb_kerjasama_perusahan.nomor_kontrak, tb_kerjasama_perusahan.kode_list_karyawan, tb_list_karyawan.kode_list_karyawan, tb_list_karyawan.no_nip, tb_karyawan.nama_depan, tb_karyawan.nama_belakang, tb_karyawan.jenis_kelamin FROM tb_temporary_perusahaan INNER JOIN tb_kerjasama_perusahan ON tb_kerjasama_perusahan.kode_perusahaan = tb_temporary_perusahaan.kode_perusahaan INNER JOIN tb_list_karyawan ON tb_list_karyawan.kode_list_karyawan=tb_kerjasama_perusahan.kode_list_karyawan INNER JOIN tb_karyawan ON tb_karyawan.no_ktp=tb_list_karyawan.no_nip
WHERE tb_temporary_perusahaan.no_pendaftaran = :kode";
$dt = $config->runQuery($q);
$dt->execute(array(
	':kode' => $id));
	
?>
<br/>
<div class="contain2">
	<h3 class="page-header">Rencana Karyawan</h3>

<table class="table table-hover table-bordered">
	<thead>
		<th>NIK</th>
		<th>Nama Lengkap</th>
		<th>Jenis</th>
		<th>Umur</th>
		<th>Jabatan Project</th>
		<th>Action</th>
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
		<td><a href="?p=detailKaryawan&nip=<?=$mv['no_nip']?>" title="Detail Karyawan"><?=$mv['no_nip']?></a></td>
		<td><?=$mv['nama_depan']?> <?=$mv['nama_belakang']?></td>
		<td><?=$mv['jenis_kelamin']?></td>
		<td><?=$mv['create_date']?></td>
		<td><?=$flag?></td>
		<td>
			<a href=""> 
				Approve
			</a>
			/
			<a href=""> 
				Decline
			</a>
		</td>
	</tr>

	<?php 
}
	?>
</table>
</div>