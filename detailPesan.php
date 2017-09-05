<?php
$data = $_GET['kode'];
$date = date('Y-m-d H:m:s');
$sql = "UPDATE tb_detail_push SET read_date = :tanggal WHERE kd_push = :kode ";
$stmt = $auth_user->runQuery($sql);
$stmt->execute(array(
    ':tanggal'  => $date,
    ':kode' => $data
));
    $query = "SELECT tb_push.kd_push, tb_push.subject, tb_push.dari, tb_push.kepada, tb_detail_push.kd_detail, tb_detail_push.inisial, tb_detail_push.pesan, tb_detail_push.create_date, tb_detail_push.read_date, tb_subject_push.nama_subject FROM tb_push 
    INNER JOIN tb_detail_push ON tb_detail_push.kd_push = tb_push.kd_push 
    INNER JOIN tb_subject_push ON tb_subject_push.kd_subject = tb_push.subject
    WHERE tb_push.kepada = :id AND tb_push.kd_push = :data";
    $dt = $auth_user->runQuery($query);
    $dt->execute(array(
        ':id' => $user_id,
        ':data' => $data
    ));
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
               <?=$row['nama_subject'];?> 
            </div>
            <div class="panel-body">
            <?php 
                while($row = $dt->fetch(PDO::FETCH_LAZY)){
                    if($row['inisial'] == $user_id){
                        $kode = 'class="blockquote-reverse"';
                    }else{
                        $kode = '';
                    }
            ?>
            <blockquote <?=$kode?>>
                <p><?=$row['pesan'];?></p>
                <small><?=$row['inisial'];?></small>
                <i><small><?=$row['create_date'];?></small></i>
            </blockquote>
                <?php }

$sq = "SELECT tb_push.kd_push, tb_push.subject, tb_push.dari, tb_push.kepada, tb_detail_push.kd_detail, tb_detail_push.inisial, tb_detail_push.pesan, tb_detail_push.create_date, tb_detail_push.read_date, tb_subject_push.nama_subject FROM tb_push 
INNER JOIN tb_detail_push ON tb_detail_push.kd_push = tb_push.kd_push 
INNER JOIN tb_subject_push ON tb_subject_push.kd_subject = tb_push.subject
WHERE tb_push.kepada = :id AND tb_push.kd_push = :data";
$mg = $auth_user->runQuery($sq);
$mg->execute(array(
    ':id' => $user_id,
    ':data' => $data
));
$id = $mg->fetch(PDO::FETCH_LAZY);
                ?>
            </div>
            <div class="panel-footer">
            <b><i><a href="?p=reply&data=<?=$id['subject']?>">Reply</a></i></b>
            </div>
        </div>
    </div>
</div>