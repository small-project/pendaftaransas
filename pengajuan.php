<?php
include_once 'header.php';
include_once 'class.user.php';
$data = new USER();
$cek = new USER();
$tbName = "tb_temporary_perusahaan";
$kode = "REQ";
$id = "no_pendaftaran";
$nomor = $cek->Generate($id, $kode, $tbName);


session_start();
$kode = $_SESSION['kode'];

if (isset($_POST['ajukanMPO'])) {

	$kd = $_POST['txt_kd'];
	$kode_pekerjaan = $_POST['txt_kode'];
	$nama = $_POST['txt_nama'];
	$cp = $_POST['txt_cp'];
	$telp = $_POST['txt_phone'];
	$email = $_POST['txt_email'];
	$status = "1";


	if ($kode_pekerjaan == "0") {
		# code...
		$error = "Pilih salah satu jenis Pekerjaan";
	}else{
		$sql = "INSERT INTO tb_temporary_perusahaan (no_pendaftaran, nama_perusahaan, cp, phone, email, kebutuhan, kode_pekerjaan, status) VALUES (:kode, :nama, :cp, :telp, :email, :kebutuhan, :kd, :st)";
		$stmt = $data->runQuery($sql);
		$stmt->execute(array(
			':kode'	=>$kd,
			':nama'	=>$nama,
			':cp'	=>$cp,
			':telp'	=>$telp,
			':email'=>$email,
			':kebutuhan'=>$kode,
			':kd'	=>$kode_pekerjaan,
			':st'	=>$status));
		if (!$stmt) {
			# code...
			$pesan ="DATA TIDAK MASUK KE DATABASE";
		}else{
			header('Location: perusahaan.php');
		}

	}
	

} elseif (isset($_POST['ajukanLain'])) {
	# code...
	$kd = $_POST['txt_kd'];
	$nama = $_POST['txt_nama'];
	$cp = $_POST['txt_cp'];
	$telp = $_POST['txt_phone'];
	$email = $_POST['txt_email'];
	$status = "1";

	$sql = "INSERT INTO tb_temporary_perusahaan (no_pendaftaran, nama_perusahaan, cp, phone, email, kebutuhan, status) VALUES (:kode, :nama, :cp, :telp, :email, :kebutuhan, :st)";
	$stmt = $data->runQuery($sql);
	$stmt->execute(array(
		':kode'	=>$kd,
		':nama'	=>$nama,
		':cp'	=>$cp,
		':telp'	=>$telp,
		':email'=>$email,
		':kebutuhan'=>$kode,
		':st'	=>$status));
	if (!$stmt) {
		# code...
		$pesan ="DATA TIDAK MASUK KE DATABASE";
	}else{
		header('Location: perusahaan.php');
	}
}
// kebutuhan perorangan liat di tb_jenis_pekerjaan
if ($kode == "MPO01" OR $kode == "BPO01") {
	# code...
	?>
<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
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
			<?php
			    $cek = new USER();
				$stmt = $cek->runQuery("SELECT * FROM tb_jenis_pekerjaan");
				$stmt->execute();
			?>
			<div class="form-group">
			        <select class="form-control" name="txt_kode">
			    		<option value="0" selected>-- Kebutuhan --</option>
			    		<?php 
			    		while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
			    			# code...
			    		?>
			    		<option value="<?php echo $row['kd_pekerjaan']; ?>"><?php echo $row['nama_pekerjaan']; ?></option>

			    		<?php } ?>
			    	</select>
			        <span id="check-e"></span>
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
            <label>Jika perusahaan anda telah Terdaftar, <a href="sign-up.php"><button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-log-in"></span> Masuk</button></a></label>
      </form>

    </div>
    
</div>

</body>
</html>
	<?php
}else{
?>
<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
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
            <button type="submit" name="ajukanLain" class="btn btn-success">
                	<i class="glyphicon glyphicon-send	"></i> &nbsp; Ajukan Kebutuhan
            </button>
        </div>  
        <hr>
      	<br />
            <label>Jika perusahaan anda telah Terdaftar, <a href="sign-up.php"><button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-log-in"></span> Masuk</button></a></label>
      </form>

    </div>
    
</div>

</body>
</html>
<?php
}

?>

