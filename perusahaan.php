<?php 

require_once'header.php';
require_once("class.user.php");

$set = new USER();

if (isset($_POST['cekKebutuhan'])) {
	# code...
	$kode = $_POST['txt_kode'];
	if ($kode == '0') {
		# code...
		$error = "Pilih salah satu jenis Kebutuhan";
	}else{
		session_start();
		$_SESSION['kode'] = $_POST['txt_kode'];
		header('Location: pengajuan.php');

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
                <div class="alert alert-danger">
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
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" name="cekKebutuhan" class="btn btn-danger">
                	<i class="glyphicon glyphicon-send	"></i> &nbsp; Pilih Kebutuhan
            </button>
        </div>  
      	
      </form>

    </div>
    
</div>

</body>
</html>