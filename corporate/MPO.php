<style type="text/css">
    .modal-sm {
    width: 500px;
}
</style>
<div class="signin-form">

	<div class="container form-signin">
     
        <h2 class="form-signin-heading">Pendaftaran Perusahaan</h2><hr />
        <p>
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addMPO">+ add</button>
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

        $sql = "SELECT * FROM tb_list_perkerjaan_perusahaan";
        $stmt = $data->runQuery($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
            ?>
                <tr>
                    <td><?=$row['name_list']?></td>
                    <td><?=$row['total']?></td>
                    <td>
                    <a href="deleteList.php?id=<?=$row['id']?>" onClick="return confirm('Are you sure delete?')">
                        <button class="btn btn-xs btn-danger">
                            <span class="fa fa-fw fa-trash"></span>
                        </button>
                    </a>            
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
       <form class="" method="post" action = "request.php" id="login-form">
      
        
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

        	<div class="form-group">
			        <input type="hidden" class="form-control" name="txt_kd" value="<?php echo $nomor; ?>" />
			        <span id="check-e"></span>
	        </div>

	        <div class="form-group">
			        <input type="text" class="form-control" name="txt_nama" placeholder="nama perusahaan" required />
			        <span id="check-e"></span>
	        </div>
	        <div class="form-group">
			        <input type="text" class="form-control" name="txt_cp" placeholder="nama contact person" required />
			        <span id="check-e"></span>
	        </div>
	        <div class="form-group">
			        <input type="number" class="form-control" name="txt_phone" placeholder="nomor telphone" required />
			        <span id="check-e"></span>
	        </div>
	        <div class="form-group">
			        <input type="email" class="form-control" name="txt_email" placeholder="example@domain.com" required />
			        <span id="check-e"></span>
	        </div>
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
    <label>Jika perusahaan anda telah Terdaftar, <a href="sign-up.php"><button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-log-in"></span> Masuk</button></a></label>
    </div>
    
</div>


<div class="modal fade" id="addMPO" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
<form class="form-inline" method="post" action="">
      <div class="form-group">
      <select name="listPekerjaan" class="form-control" required>
                        <option value="0">--list pekerjaan--</option>
                        <?php
                        // ambil data dari database
                        $cek = new USER();
                        $stmt = $cek->runQuery("SELECT * FROM tb_jenis_pekerjaan");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
                            ?>
                            <option value="<?php echo $row['kd_pekerjaan'] ?>"><?php echo $row['nama_pekerjaan'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" name="total" placeholder="total" required>
      </div>
      <button type="submit" name="addList" class="btn btn-default">SIMPAN</button>
    </form>          


        </div>
      </div>
    </div>
  </div>

