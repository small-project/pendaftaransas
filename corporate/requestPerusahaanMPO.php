<?php 

session_start();

$code = $_SESSION['kode'];

?>
<div class="signin-form">

	<div class="container form-signin">
    <h2 class="form-signin-heading">Pendaftaran Perusahaan</h2><hr />
     <p>
         <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#perusahaanMPO">+ add</button>
     </p>

     <table class="table table-hover table-bordered">
            <thead>
                <th style="width: 60%;">Jenis Kebutuhan</th>
                <th style="width: 30%;">Jumlah</th>
                <th style="width: 10%;">#</th>
            </thead>
            <tbody>
            <?php 
                $data = new USER();

        $sql = "SELECT tb_list_perkerjaan_perusahaan.id, tb_list_perkerjaan_perusahaan.name_list, tb_list_perkerjaan_perusahaan.total, tb_list_perkerjaan_perusahaan.status, tb_jenis_pekerjaan.nama_pekerjaan FROM tb_list_perkerjaan_perusahaan INNER JOIN tb_jenis_pekerjaan ON tb_jenis_pekerjaan.kd_pekerjaan = tb_list_perkerjaan_perusahaan.name_list WHERE tb_list_perkerjaan_perusahaan.status = 0";
        $stmt = $data->runQuery($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
            ?>
                <tr>
                    <td><?=$row['nama_pekerjaan']?></td>
                    <td><?=$row['total']?></td>
                    <td>
                    <a href="removeList.php?id=<?=$row['id']?>" onClick="return confirm('Are you sure delete?')">
                        <button class="btn btn-xs btn-danger">
                            <span class="fa fa-fw fa-trash"></span>
                        </button>
                    </a>            
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>  
        
       <form class="" method="post" action="act.php" id="login-form">
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i><strong> &nbsp; <?php echo $error; ?> !</strong>
                </div>
                <?php
			}
		?>
        </div>
        
            <div class="form-group">
                    <input type="hidden" class="form-control" name="txt_kd" value="<?php echo $nomor; ?>" />
                    <input type="text" name="txt_kodePerusahaan" value="<?=$info['kode_perusahaan']?>">
                    <span id="check-e"></span>
            </div>

            <div class="form-group">
                    <input type="text" class="form-control" name="txt_nama" value="<?=$info['nama_perusahaan']?>" readonly="readonly" />
                    <span id="check-e"></span>
            </div>
            <div class="form-group">
                    <input type="text" class="form-control" name="txt_cp" value="<?=$info['cp']?>" required />
                    <span id="check-e"></span>
            </div>
            <div class="form-group">
                    <input type="number" class="form-control" name="txt_phone" value="<?=$info['phone']?>" required />
                    <span id="check-e"></span>
            </div>
            <div class="form-group">
                    <input type="email" class="form-control" name="txt_email" value="<?=$info['email']?>" required />
                    <span id="check-e"></span>
            </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" name="ajukanMPO" class="btn btn-success">
                	<i class="glyphicon glyphicon-send	"></i> &nbsp; Ajukan Kebutuhan
            </button>
        </div>  
        <hr>
      	<br />
            
      </form>
    </div>
    
</div>

