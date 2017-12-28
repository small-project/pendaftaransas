<?php 

$id = $_GET['kode'];

$q = "SELECT tb_temporary_perusahaan.no_pendaftaran, tb_temporary_perusahaan.nama_perusahaan, tb_temporary_perusahaan.kode_perusahaan, 
tb_kerjasama_perusahan.nomor_kontrak, tb_kerjasama_perusahan.kode_list_karyawan, tb_list_karyawan.kode_list_karyawan, 
tb_list_karyawan.no_nip, tb_karyawan.nama_depan, tb_karyawan.nama_belakang, tb_karyawan.jenis_kelamin, 
year(curdate()) - year(str_to_date(tb_karyawan.tgl_lahir,'%d-%m-%Y')) as Age, tb_list_karyawan.status_karyawan
FROM tb_temporary_perusahaan 
INNER JOIN tb_kerjasama_perusahan ON tb_kerjasama_perusahan.kode_perusahaan = tb_temporary_perusahaan.kode_perusahaan
INNER JOIN tb_list_karyawan ON tb_list_karyawan.kode_list_karyawan=tb_kerjasama_perusahan.kode_list_karyawan
INNER JOIN tb_karyawan ON tb_karyawan.no_ktp=tb_list_karyawan.no_nip
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
		<th>Status</th>
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
	if ($mv['status_karyawan'] == '1') {
		$flag2 = '<label class="label label-lg label-success">Dalam List Project</label>';
	}elseif(empty($mv['status_karyawan'])){
		$flag2 = '<label class="label label-lg label-default">Not Set</label>';
	}else{
		$flag2 = '<label class="label label-lg label-danger">Remove from Project</label>';
	}
	?>
	<tr>
		<td><a href="?p=detailKaryawan&nip=<?=$mv['no_nip']?>" title="Detail Karyawan"><?=$mv['no_nip']?></a></td>
		<td><?=$mv['nama_depan']?> <?=$mv['nama_belakang']?></td>
		<td><?=$mv['jenis_kelamin']?></td>
		<td><?=$mv['Age']?></td>
		<td><?=$flag?></td>
		<td><?=$flag2?></td>
		<td>
			<?php if(empty($mv['status_karyawan'])){ ?>

			<a href="confirKaryawan.php?add=<?=$mv['no_nip']?>&pendaftaran=<?=$mv['no_pendaftaran']?>" onclick="return confirm('Ready to add this Karyawan?');"> 
				Approve
			</a>
			/
			<a href="confirKaryawan.php?del=<?=$mv['no_nip']?>&pendaftaran=<?=$mv['no_pendaftaran']?>" onclick="return confirm('Are you sure about this?');"> 
				Decline
			</a>

			<?php }elseif($mv['status_karyawan'] == '1'){ ?>

			<a href="confirKaryawan.php?del=<?=$mv['no_nip']?>&pendaftaran=<?=$mv['no_pendaftaran']?>" onclick="return confirm('Are you sure about this?');"> 
				Decline
			</a>

			<?php	}else{ ?>

			<a href="confirKaryawan.php?add=<?=$mv['no_nip']?>&pendaftaran=<?=$mv['no_pendaftaran']?>" onclick="return confirm('Ready to add this Karyawan?');"> 
				Approve
			</a>

			<?php	}
			?>
			
		</td>
	</tr>

	<?php 
}
	?>
</table>
</div>