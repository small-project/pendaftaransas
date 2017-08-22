<?php
    if(isset($_POST['sendMsg'])){
        $kd = $_POST['txt_kodePush'];
        $dari = $_POST['txt_kepada'];
        $msg = $_POST['txt_pesan'];
        
        // $d = array($kd, $dari, $msg);
        // print_r($d);
        $id = "kd_detail";
        $kode = "PUSHDT";
        $tbName = "tb_detail_push";
        $kdDetail = $auth_user->Kode($id, $kode, $tbName);

        $sql = "INSERT INTO tb_detail_push (kd_detail, kd_push, inisial, pesan) VALUES (:detail, :push, :id, :msg)";
        $st = $auth_user->runQuery($sql);
        $st->execute(array(
            ':detail' => $kdDetail,
            ':push'   => $kd,
            ':id'     => $dari,
            ':msg'    => $msg
        ));

        if(!st){
            echo "data tidak masuk db";
        }else{
            echo "<script>
            alert('Pesan Berhasil Dikirim!');
            window.location.href='?p=pesan';
            </script>";
        }

    }
    $id = $_GET['data'];
    $query = "SELECT tb_subject_push.kd_subject, tb_subject_push.nama_subject, tb_push.kd_push, tb_push.kepada FROM tb_subject_push 
    INNER JOIN tb_push ON tb_push.subject=tb_subject_push.kd_subject
    WHERE tb_subject_push.kd_subject = :kode";
    $stmt = $auth_user->runQuery($query);
    $stmt->execute(array(
        ':kode' => $id
    ));
    $row = $stmt->fetch(PDO::FETCH_LAZY);
?>
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-primary">
    <div class="panel-body">
    <form class="form-horizontal" method="post" action="">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Kepada :</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Admin SAS" readonly>
      <input type="hidden" class="form-control" name="txt_kodePush" id="d" value="<?=$row['kd_push']?>" >
      <input type="hidden" class="form-control" name="txt_kepada" id="s" value="<?=$user_id?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Subject :</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" name="txt_subject" placeholder="<?=$row['nama_subject']?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pesan">Pesan :</label>
    <div class="col-sm-10"> 
    <textarea class="form-control" rows="5" name="txt_pesan" id="pesan" placeholder="isi pesan" required></textarea>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="sendMsg" class="btn btn-default">.:Reply:.</button>
    </div>
  </div>
</form>
    </div>
</div>
</div>