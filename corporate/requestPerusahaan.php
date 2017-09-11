<?php 
$set = new USER();


$set = new USER();
$kodeMPO = $set->generateRandomString(24);

if (isset($_POST['cekKebutuhan'])) {
	# code...
	$kode = $_POST['txt_kode'];
	if ($kode == '0') {
		# code...
		$error = "Pilih salah satu jenis Kebutuhan";
	}elseif($_POST['check'] == ""){
        $error = "Please Checkbox Persetujuan";
        }else{
        
        $jenis = $_POST['txt_kode'];
        echo $jenis;
        
        switch ($jenis){
            case "BPO01":
            header('Location: ?p=reqBPO');
            break;
            case "MPO01":
            header('Location: ?p=reqMPO');
            session_start();
            $_SESSION['kode'] = $kodeMPO;
            break;
            case "SYG01":
            header('Location: ?p=reqSYS');
            break;
            case "KST01":
            header('Location: ?p=KST');
            break;
            default:
            header('Location: ?p=reqDefault');
        }

	}
}
?>

<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Pilih Jenis Kebutuhan</h2><hr />
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <i class="glyphicon glyphicon-warning-sign"></i><strong> &nbsp; <?php echo $error; ?> !</strong>
                </div>
                <?php
			}elseif (isset($pesan)) {
				# code...?>
				<div class="alert alert-success">
                   <i class="glyphicon glyphicon-warning-sign"></i><strong> &nbsp; <?php echo $pesan; ?> !</strong>
                </div>
				<?php
			}
		?>
        </div>
        <div class="form-group">
        	<select class="form-control" name="txt_kode">
        		<option value="0" selected>-- Kebutuhan --</option>
        <?php
        	$stmt = $set->runQuery("SELECT * FROM tb_kategori_pekerjaan");
        	$stmt->execute();
        	while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
        		# code...
        	
        ?>
        	<option value="<?php echo $row['kode_kategori']; ?>"><?php echo $row['nama_kategori']; ?> | <?php echo $row['keterangan']; ?></option>
        	<?php }?>
        	</select>
        <span id="check-e"></span>
        </div>
       <div class="checkbox">
                <label>
                    <input type="checkbox" name="check" value="1"> Anda setuju dengan pilihan kebutuhan anda.
                </label>
            </div>
         <hr />        
        <div class="form-group">
            <button type="submit" name="cekKebutuhan" class="btn btn-danger">
                	<i class="glyphicon glyphicon-send	"></i> &nbsp; Pilih Kebutuhan
            </button>
        </div>  
      	
      </form>

    </div>
    
</div>
<br>