<?php

if (isset($_POST['addInterviews'])) {
  # code...
  $status = $_POST['txt_jam'];
  $id_interview = $_POST['txt_interviews'];
  if ($status == '1') {
    # code...
    $kode_status = "10:00 am";
  } elseif($status == '2'){
    $kode_status = "14:00 pm";
  } elseif ($status == '3') {
    # code...
    $kode_status = "menghubungi admin";
  }

  $sql = "UPDATE tb_info_interview SET status = :status WHERE id = :kd";

  $stmt = $auth_user->runQuery($sql);
  $stmt->execute(array(
    ':status' => $kode_status,
    ':kd'		=> $id_interview));

  if ($stmt) {
    # code...
    echo "<script>
alert('Update Success!');
window.location.href='/SAS/pendaftaran/';
</script>";
  } else{
    echo "Gagal";
  }

  }

if (isset($_POST['addPsikotes'])) {
  # code...
	$id_test = $_POST['txt_id'];
  $status = $_POST['txt_jam'];
  if ($status == '1') {
    # code...
    $kode_status = "10:00 am";
  } elseif($status == '2'){
    $kode_status = "14:00 pm";
  } elseif ($status == '3') {
    # code...
    $kode_status = "menghubungi admin";
  }

  $sql = "UPDATE tb_info_test SET status = :status WHERE id = :kode";

  $stmt = $auth_user->runQuery($sql);
  $stmt->execute(array(
    ':status' => $kode_status,
    ':kode'		=> $id_test));

  if ($stmt) {
    # code...
    echo "<script>
alert('Update Success!');
window.location.href='/SAS/pendaftaran/';
</script>";
  } else{
    echo "Gagal";
  }

  }



$sql = 'SELECT * FROM tb_info_interview WHERE no_ktp = :kode AND status = ""';
      $stmt = $auth_user->runQuery($sql);
      $stmt->execute(array(
        ':kode' => $user_id));
        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
          # code...
        
      ?>
     
  

<div class="modal fade modal-interviews" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
		<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;">info interviews</h4>
		      </div>
		      <div class="modal-body">
		       
				 <blockquote>
				        <p>Jadwal INTERVIEW pada Tanggal <span class="text-primary"><?php echo $row['date_interview']; ?></span></p>
				       
				        
				        <p style="font-style: italic; color: green;">NOTE: <?php echo $row['detail']; ?></p>
				       	 <hr>
				       	<h5 class="title" style="text-transform: uppercase;" >silahkan pilih jam yang disediakan</h5>
				       	<hr>
				        <div class="well" style="">
				        	
				        <form class="form form-horizontal" method="post" action="">
				        	<input type="hidden" name="txt_interviews" value="<?php echo $col['id']; ?>">
				        	<div class="form-group">
					        	<div class="col-md-3">
								   <label for="optionsRadios2">Pilihan Jam ke-1</label>
								</div>
								<div class="radio col-md-3">
								   <label>
								   <input type="radio" name="txt_jam" id="optionsRadios2" value="1">
								   10:00 am
								   </label>
								</div>
							</div>
							<div class="form-group">
					        	<div class="col-md-3">
								   <label for="optionsRadios2">Pilihan Jam ke-2</label>
								</div>
								<div class="radio col-md-3">
								   <label>
								   <input type="radio" name="txt_jam" id="optionsRadios2" value="2">
								   14:00 pm
								   </label>
								</div>
							</div>
							<div class="form-group">
					        	<div class="col-md-3">
								   <label for="optionsRadios2">Optional</label>
								</div>
								<div class="radio col-md-3">
								   <label>
								   <input type="radio" name="txt_jam" id="optionsRadios2" value="3">
								   Hubungi Admin untuk Schedule
								   </label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-3">
								<button class="btn btn-default btn-block" type="submit" name="addInterviews" style="text-transform: uppercase;">simpan jadwal</button> </div>
							</div>
				        		
				        </form>
				        </div>


				         <footer>
				       	<small>
				       		<?php echo $row['create_date']; ?> <span class="glyphicon glyphicon-tags"></span> <cite title="Source Title"><?php echo $row['kode_admin']; ?></cite>
				       	</small>
				        </footer>
				      </blockquote>

		         <?php
  }
  ?>
		      </div>
		     
    </div>
  </div>
</div>

<?php

$sql = 'SELECT * FROM tb_info_test WHERE no_ktp = :kode AND status = ""';
      $stmt = $auth_user->runQuery($sql);
      $stmt->execute(array(
        ':kode' => $user_id));
        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
          # code...
        
      ?>
     
  

<div class="modal fade modal-psikolog" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
		<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;">info psikotes</h4>
		      </div>
		      <div class="modal-body">
		       
				 <blockquote>
				        <p>Jadwal PSIKOTES pada Tanggal <span class="text-primary"><?php echo $row['date_test']; ?></span></p>
				       
				        
				        <p style="font-style: italic; color: green;">NOTE: <?php echo $row['detail']; ?></p>
				       	 <hr>
				       	<h5 class="title" style="text-transform: uppercase;" >silahkan pilih jam yang disediakan</h5>
				       	<hr>
				        <div class="well" style="">
				        	
				        <form class="form form-horizontal" method="post" action="">
				        <input type="hidden" name="txt_id" value="<?php echo $row['id']; ?>">
				        	<div class="form-group">
					        	<div class="col-md-3">
								   <label for="optionsRadios2">Pilihan Jam ke-1</label>
								</div>
								<div class="radio col-md-3">
								   <label>
								   <input type="radio" name="txt_jam" id="optionsRadios2" value="1">
								   10:00 am
								   </label>
								</div>
							</div>
							<div class="form-group">
					        	<div class="col-md-3">
								   <label for="optionsRadios2">Pilihan Jam ke-2</label>
								</div>
								<div class="radio col-md-3">
								   <label>
								   <input type="radio" name="txt_jam" id="optionsRadios2" value="2">
								   14:00 pm
								   </label>
								</div>
							</div>
							<div class="form-group">
					        	<div class="col-md-3">
								   <label for="optionsRadios2">Optional</label>
								</div>
								<div class="radio col-md-3">
								   <label>
								   <input type="radio" name="txt_jam" id="optionsRadios2" value="3">
								   Hubungi Admin untuk Schedule
								   </label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-3">
								<button class="btn btn-default btn-block" type="submit" name="addPsikotes" style="text-transform: uppercase;">simpan jadwal</button> </div>
							</div>
				        		
				        </form>
				        </div>


				         <footer>
				       	<small>
				       		<?php echo $row['create_date']; ?> <span class="glyphicon glyphicon-tags"></span> <cite title="Source Title"><?php echo $row['kode_admin']; ?></cite>
				       	</small>
				        </footer>
				      </blockquote>

		         <?php
  }
  ?>
		      </div>
		     
    </div>
  </div>
</div>
        
