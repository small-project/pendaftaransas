
<h3>Info Penting</h3>
<hr>
    <?php

      $sql = 'SELECT * FROM tb_info_interview WHERE no_ktp = :kode AND status = ""';
      $stmt = $auth_user->runQuery($sql);
      $stmt->execute(array(
        ':kode' => $user_id));
        if ($stmt->rowCount() >= 1) {
           # code...
         $col = $stmt->fetch(PDO::FETCH_LAZY);
      ?>
     <button type="button" class="btn btn-link" data-toggle="modal" data-target=".modal-interviews">Anda Sudah mendapatkan JADWAL INTERVIEW !</button>
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
      <button type="button" class="btn btn-link" data-toggle="modal" data-target=".modal-psikolog">Anda Sudah mendapatkan JADWAL TES PSIKOTES !</button>

    <?php
      }
      //halaman push
      $sql = 'SELECT tb_push.kd_push, tb_push.subject, tb_push.dari, tb_push.kepada, tb_push.create_date, tb_detail_push.kd_detail, tb_detail_push.inisial, tb_detail_push.pesan, tb_detail_push.create_date
      FROM tb_push
      LEFT JOIN tb_detail_push ON tb_detail_push.kd_push=tb_push.kd_push WHERE tb_push.kepada = :nama
      ORDER BY tb_push.create_date DESC';
      $stmt = $auth_user->runQuery($sql);
      $stmt->execute(array(
        ':nama' => $user_id));
        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
          # code...
        
      ?>
      <blockquote>
        <p><?php echo $row['pesan']; ?></p>
        <footer><?php echo $row['subject']; ?> <span class="glyphicon glyphicon-tags"></span> <cite title="Source Title"><?php echo $row['dari']; ?></cite>
        <p><?php echo $row['create_date']; ?></p>
        </footer>
      </blockquote>
      <?php
    }
      
      
        include_once 'pilih-pekerjaan.php';
     
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


