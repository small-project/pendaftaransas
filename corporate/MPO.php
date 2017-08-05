<?php 
    if(isset($_POST['ajukanMPO'])){
        $jenisPekerjaan = array();
        $jenisData = $_POST['pekerjaan'];
        if(empty($jenisData)){
            $error = "data kosong";
        }else{
            foreach ($jenisData as $jenis){
                array_push($jenisPekerjaan, $jenis);
            }
            // $kategori = serialize($jenisPekerjaan);
            print_r($jenisPekerjaan);
        }
    }
?>
<div class="signin-form">

	<div class="container form-signin">
     
        
       <form class="" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Pendaftaran Perusahaan</h2><hr />
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
                    <select id="pekerjaan" name="pekerjaan[]" class="form-control" multiple="multiple" required>
                        <option value=""></option>
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

