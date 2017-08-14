<?php 
$sql = "SELECT tb_push.kd_push, tb_push.subject, tb_push.dari, tb_push.kepada, tb_detail_push.kd_detail, tb_detail_push.inisial, tb_detail_push.pesan, tb_detail_push.create_date, tb_detail_push.read_date FROM tb_push 
INNER JOIN tb_detail_push ON tb_detail_push.kd_push = tb_push.kd_push WHERE tb_push.kepada  = :id";
$stmt = $auth_user->runQuery($sql);
$stmt->execute(array(
    ':id'   => $user_id
));
?>
<br/>
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="list-group">
<a href="#" class="list-group-item active">
  Message <span class="pull-right"><span class="fa fa-fw fa-envelope"></span></span>
</a>
<?php 
    while ($row = $stmt->fetch(PDO::FETCH_LAZY)){

        if($row['read_date'] == NULL){
            $st = "<span class='text-success'>Unread</span>";
        }else{
            $st = "<span class='text-default'>Read</span>";
        }
        if($row < 0){
            ?>
            <a href="#" class="list-group-item list-group-item-action">Tidak ada Pesan Masuk</a>
            <?php
        }else{
?>
<a href="?p=detailPesan&kode=<?php echo $row['kd_push']; ?>" class="list-group-item list-group-item-action"><?php echo $row['subject']; ?> <b><i><?=$st;?></i></b> <span class="pull-right"><?=$row['create_date']?></span></a>
    <?php }} ?>
</div>
</div>
<!-- <div class="col-md-8">
    <div class="well">
        <h4 class="page-header">Subject Pesan</h4>
    </div>
</div> -->
</div>