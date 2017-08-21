<div class="jumbotron">
	<h1>Hai, <?=$userRow['nama_depan'] ?> <?=$userRow['nama_belakang'] ?></h1>
	<br/>
	<p>ini adalah halaman user admin untuk calon atau karyawan yang telah melakukan pendaftarn pada perusahaan kami. kami harapkan kesedian user untuk mengupdate informasi terbaru tentang data diri anda. CV yang baik, besar kemungkinan untuk kami proses secara cepat. untuk mengupdate profile anda, silahkan klik <a href="?p=update">profile</a> ini.</p>
	<br/>
	<p class="management-ttd"><small>Management.</small></p>
</div>

    <?php

      $sql = 'SELECT * FROM tb_info_interview WHERE no_ktp = :kode AND status = ""';
      $stmt = $auth_user->runQuery($sql);
      $stmt->execute(array(
        ':kode' => $user_id));
        if ($stmt->rowCount() >= 1) {
           # code...
         $col = $stmt->fetch(PDO::FETCH_LAZY);
      ?>
     <a href="?p=notification&itrv=<?=$col['kd_interview']?>">Anda sudah mendapatkan Jadwal Interview!</a>
    <?php
  }
      $sql = 'SELECT * FROM tb_info_test WHERE no_ktp = :kode AND status = ""';
      $stmt = $auth_user->runQuery($sql);
      $stmt->execute(array(
        ':kode' => $user_id));
        if($stmt->rowCount() >= 1) {
          # code...
          $row = $stmt->fetch(PDO::FETCH_LAZY);
        
      ?>
      <br>
      <a href="?p=notification&test=<?=$row['kode_test']?>">Anda sudah mendapatkan Jadwal Tes Psikolog!</a>

    <?php
        }
     
      if ($userRow['no_BPJS'] == "") {
        # code...
        include_once 'addNPWP.php';
      } else{

      }

      $sql = "SELECT (no_ktp) FROM tb_info_bank WHERE no_ktp = :ktp";
      $show = $auth_user->runQuery($sql);
      $show->execute(array(":ktp" =>$user_id));

      if ($show->rowCount() == 0) {
        # code...
        include_once 'addBank.php';
      } else {

      }
 include_once 'modal.php';

    ?>

