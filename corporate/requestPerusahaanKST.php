<div class="signin-form">

	<div class="container form-signin">
     
        
       <form class="" method="post" action = "act.php" id="login-form">
      
        <h2 class="form-signin-heading">Request Perusahaan</h2><hr />
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
			        <input type="hidden" name="txt_kodePerusahaan" value="<?=$info['kode_perusahaan']?>">
			        <span id="check-e"></span>
	        </div>
        	
	        <div class="form-group">
			        <input type="text" class="form-control" name="txt_nama" value="<?=$info['nama_perusahaan']?>" readonly="readonly" />
			        <span id="check-e"></span>
	        </div>
	        <div class="form-group">
			        <input type="text" class="form-control" name="txt_cp" value="<?=$info['contact_person']?>" required />
			        <span id="check-e"></span>
	        </div>
	        <div class="form-group">
			        <input type="number" class="form-control" name="txt_phone" value="<?=$info['nomor_hp']?>" required />
			        <span id="check-e"></span>
	        </div>
	        <div class="form-group">
			        <input type="email" class="form-control" name="txt_email" value="<?=$info['email']?>" required />
			        <span id="check-e"></span>
	        </div>
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" name="kst" class="btn btn-success">
                	<i class="glyphicon glyphicon-send	"></i> &nbsp; Ajukan Kebutuhan
            </button>
        </div>  
        <hr>
      	<br />
            
      </form>
    </div>
    
</div>