<?php

	require_once("session.php");

	require_once("class.user.php");
	$auth_user = new USER();


	$user_id = $_SESSION['user_session'];

	$stmt = $auth_user->runQuery("SELECT * FROM tb_karyawan  WHERE no_ktp=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
    $userRow=$stmt->fetch(PDO::FETCH_LAZY);
    
    $manage = $auth_user->runQuery("SELECT tb_push.kd_push, tb_push.dari, tb_push.kepada, tb_detail_push.kd_detail, tb_detail_push.read_date FROM tb_push INNER JOIN tb_detail_push ON tb_detail_push.kd_push = tb_push.kd_push WHERE tb_push.kepada = :user_id AND tb_detail_push.read_date IS NULL");
    $manage->execute(array(":user_id"=>$user_id));
    $count = $manage->rowCount();
  $pj = "SELECT * FROM tb_apply_pekerjaan WHERE no_ktp = :id";
  $mg = $auth_user->runQuery($pj);
  $mg->execute(array(':id' => $user_id));
  if ($n = $mg->rowCount() <= 0 ) {
    # code...
    $g = '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Danger!</strong> anda belum memilih salah satu jenis pekerjaan. <a href="?p=pilihPekerjaan">pilih</a> minimal satu pekerjaan.
</div>';
  }
  $base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/style.css" type="text/css"  />
    <!-- Bootstrap Tables -->
    <link rel="stylesheet" href="bootstrap-table/dist/bootstrap-table.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
    <title>Welcome - <?php print($userRow['email']); ?></title>
    <style type="text/css" media="screen">
      /* prograss bar */
  #progressbox {
    border: 1px solid #CAF2FF;
    padding: 1px;
    position:relative;
    width:400px;
    border-radius: 3px;
    margin: 10px;
    display:none;
    text-align:left;
  }
  #progressbar {
    height:20px;
    border-radius: 3px;
    background-color: #CAF2FF;
    width:1%;
  }
  #statustxt {
    top:3px;
    left:50%;
    position:absolute;
    display:inline-block;
    color: #FFFFFF;
  }
    </style>
</head>

<body>
  <div class="container">
  <nav class="navbar navbar-default">
   <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="<?=$base_url?>">SINERGIADHIKARYA</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
            <li ><a href="<?=$base_url?>">home</a></li>
            <li><a href="?p=profile">profile</a></li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">corporate  <span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="?p=update">informasi</a></li>
                  <?php if ($userRow['status'] == 1) {?>
                  <li><a href="?p=list">list job</a></li>
                  <li><a href="#">form leave</a></li>
                  <li><a href="#">form complain</a></li>
                  <?php }  ?>
               </ul>
            </li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
             <li><a href="?p=pesan"><button class="btn btn-sm">
                    Pesan <span class="badge badge-secondary"><?=$count?></span>
                    </button></a></li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">&nbsp;Hi' <?php echo $userRow['email']; ?>&nbsp; <span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="?p=update">Setting</a></li>
                  <li><a href="logout.php?logout=true">Logout</a></li>
               </ul>
            </li>
         </ul>
      </div>
      <!-- /.navbar-collapse -->
   </div>
   <!-- /.container-fluid -->
</nav>
  

        <?php
            echo'<div class="">'.$g.'</div>';
            require 'page.php';
          ?>
          

  <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Bootstrap Datepciker -->
  <script src="bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <!-- Jquery Form -->
  <script type="text/javascript" src="assets/js/jquery.form.min.js"></script>
  <!-- Bootstrap Tables -->
  <script src="bootstrap-table/dist/bootstrap-table.min.js"></script>
  <!-- Bootstrap Validation -->
  <script type="text/javascript" src="dist/js/formValidation.js"></script>
  <script type="text/javascript" src="dist/js/framework/bootstrap.js"></script>


  <script type="text/javascript">

        function readURL(input) {

          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                $('#img').show().attr('src', e.target.result);
                $('#updatefoto').attr('value', e.target.result);
                $('#uploadfile').fadeOut('fast');
                localStorage.foto = e.target.result
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

      function clearImage(){
        $("#uploadfile").show();
        $("#clear").hide();      
        $("#updateimages").hide();
        $("#defaultimg").show();
        $("#img").hide();
        localStorage.clear();
      }


      $(document).ready(function(){
        $("#imgInp").on('change', function(){
          readURL(this);
        $("#defaultimg").hide();
        $("#img").show();        
        $("#updateimages").show();
        $("#clear").show();
        });
      });

      $(document).ready(function(){
          $("#datapenyakit").click(function(){

              var nama_penyakit = $('#nama_penyakit').val();
              var status = $('#status_penyakit').val();

              if(nama_penyakit ==''){
                  $.notify({
                          title: "<strong>Danger!!!</strong>",
                          message: "Nama Penyakit tidak boleh kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#nama_penyakit').focus();
              }
              else if(status ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Status penyakit tidak boleh kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#status_penyakit').focus();
              }
              else{

                  $.ajax
                  ({
                      url:"insertdatapenyakit.php",
                      dataType:"text",
                      type:"POST",
                      data:{
                          nama_penyakit:nama_penyakit,
                          status:status
                      },
                      success:function(data){
                          // alert('' + data + '');
                          $("#tablepenyakit").bootstrapTable('refresh');
                          $('#nama_penyakit').val('');
                          $('#status_penyakit').val('');
                      }

                  })

              }

          });
      });

      function deletedatapenyakit(id){
          var idpenyakit =id;

          $.ajax
          ({
              url:'deletedatapenyakit.php',
              dataType:'text',
              type:'POST',
              data:{
                  idpenyakit:idpenyakit
              },
              success:function(data){
                  alert('' + data + '');
                  $("#tablepenyakit").bootstrapTable('refresh');
              }

          })
      }

      function editpenyakit(){

          var nama = $(this).closest('div[id^=accord]').find("i").attr('data-namapenyakit');
          $('#status').val($(this).attr('data-status'));
          $('#modalpenyakit').modal('show');
      }


      function updatepenyakit(){

          var id = $(this).attr('data-id');
          var nama_penyakit = $('#edit_namapenyakit').val();
          var status = $('#edit_status').val();

          $.ajax
          ({
              url:'updatepenyakit.php',
              type:'POST',
              dataType:'text',
              data:{
                  id:id,
                  nama_penyakit:nama_penyakit,
                  status:status
              },
              success:function(data){
                  alert(data);
                  $("#tablepenyakit").bootstrapTable('refresh');
                  $('#modalpenyakit').modal('hide');

              }
          })

      }

      $(document).ready(function(){
          $("#datakeluarga").click(function(){

              var nama_lengkap = $('#nama_lengkap').val();
              var statuskeluarga = $('#statuskeluarga').val();
              var jenis_kelamin = $('#jenis_kelamin:checked').val();
              var tempat_lahir = $('#tempat_lahirkeluarga').val();
              var tanggal_lahir = $('#tanggal_lahirkeluarga').val();
              var pendidikan =$('#pendidikan').val();
              var pekerjaan = $('#pekerjaan').val();
              var nomor_handphone = $('#nomor_handphone').val();
              var hub_urgent =$('#hub_urgent:checked').val();

              if(hub_urgent == undefined){
                  var huburgent = 0;
              }
              else{
                  var huburgent =1;
              }


              if(nama_lengkap ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Nama Lengkap Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#nama_lengkap').focus();
              }
              else if(statuskeluarga ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Status Keluarga Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#statuskeluarga').focus();
              }
              else if(tempat_lahir==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Tempat Lahir Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#tempat_lahirkeluarga').focus();
              }
              else if(pendidikan ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Pendidikan Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#pendidikan').focus();
              }
              else if(pekerjaan == ''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Pekerjaan Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#pekerjaan').focus();
              }
              else{

                  $.ajax
                  ({
                      url:'insertdatakeluarga.php',
                      type:"POST",
                      dataType:'text',
                      data:{
                          nama_lengkap:nama_lengkap,
                          statuskeluarga:statuskeluarga,
                          jenis_kelamin:jenis_kelamin,
                          tempat_lahir:tempat_lahir,
                          tanggal_lahir:tanggal_lahir,
                          pendidikan:pendidikan,
                          pekerjaan:pekerjaan,
                          nomor_handphone:nomor_handphone,
                          huburgent:huburgent
                      },
                      success:function(data){
                          // alert('' + data + '');
                          $("#tablekeluarga").bootstrapTable('refresh');
                          $('#nama_lengkap').val('');
                          $('#statuskeluarga').val('');
                          $('#jenis_kelamin:checked').val('');
                          $('#tempat_lahirkeluarga').val('');
                          $('#tanggal_lahirkeluarga').val('');
                          $('#pendidikan').val('');
                          $('#pekerjaan').val('');
                          $('#nomor_handphone').val('');
                      }
                  })

              }
          });
      });

      function deletedatakeluarga(id){
          var idkeluarga =id;

          $.ajax
          ({
              url:'deletedatakeluarga.php',
              dataType:'text',
              type:'POST',
              data:{
                  idkeluarga:idkeluarga
              },
              success:function(data){
                  alert('' + data + '');
                  $("#tablekeluarga").bootstrapTable('refresh');
              }

          })
      }

      function editkeluarga(){

          $('#modalkeluarga').modal('show');

      }

      function updatekeluarga(){

          var nama_penyakit = $('#edit_namalengkap').val();
          var status_keluarga = $('#edit_statuskeluarga').val();
          var no_handphone = $('#edit_nohandphone').val();
          var tempat_lahir = $('#edit_tempatlahir').val();
          var tanggal_lahir = $('#edit_tanggallahir').val();
          var pendidikan_terakhir =$('#edit_pendidikanterakhir').val();
          var pekerjaan = $('#edit_pekerjaan').val();
          var jenis_kelamin = $('#edit_jeniskelamin:checked').val();

          $.ajax
          ({
              url:'updatekeluarga.php',
              type:'POST',
              dataType:'text',
              data:{
                  nama_penyakit:nama_penyakit,
                  status_keluarga:status_keluarga,
                  no_handphone:no_handphone,
                  tempat_lahir:tempat_lahir,
                  tanggal_lahir:tanggal_lahir,
                  pendidikan_terakhir:pendidikan_terakhir,
                  pekerjaan:pekerjaan,
                  jenis_kelamin:jenis_kelamin
              },
              success:function(data){

              }
          })

      }


      $(document).ready(function(){
          $('#datapendidikan').click(function(){

              var tingkat = $('#tingkat_pendidikan').find("option:selected").text();
              var nama_bapen  =$('#nama_pendidikan').val();
              var jurusan =$('#jurusan').val();
              var tahun_masuk = $('#tahun_masuk').val();
              var tahun_keluar =$('#tahun_keluar').val();
              var nilai_rata = $('#nilai_rata').val();

              if(tingkat ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Tingkat Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#tingkat_pendidikan').focus();
              }
              else if(nama_bapen ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Nama Bapen Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#nama_pendidikan').focus();
              }
              else if(tahun_masuk ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Tahun masuk Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#tahun_masuk').focus();
              }
              else if(tahun_keluar ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Tahun Keluar Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#tahun_keluar').focus();
              }
              else if(nilai_rata ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Nilai Rata2 Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#nilai_rata').focus();
              }
              else{

                  $.ajax
                  ({
                      url:'insertdatapendidikan.php',
                      dataType:'text',
                      type:"POST",
                      data:{
                          tingkat:tingkat,
                          nama_bapen:nama_bapen,
                          jurusan:jurusan,
                          tahun_masuk:tahun_masuk,
                          tahun_keluar:tahun_keluar,
                          nilai_rata:nilai_rata
                      },
                      success:function(data){
                          // alert('' + data + '');
                          $("#tablependidikan").bootstrapTable('refresh');
                          $('#tingkat').val('');
                          $('#jurusan').val('');
                          $('#tahun_masuk').val('');
                          $('#tahun_keluar').val('');
                      }
                  })
              }

          });
      });


      function deletedatapendidikan(id){
          var idpendidikan =id;

          $.ajax
          ({
              url:'deletedatapendidikan.php',
              dataType:'text',
              type:'POST',
              data:{
                  idpendidikan:idpendidikan
              },
              success:function(data){
                  alert('' + data + '');
                  $("#tablependidikan").bootstrapTable('refresh');
              }

          })
      }

      $(document).ready(function(){
          $('#datakhursus').click(function(){

              var nama_bidang = $('#nama_bidang').val();
              var bidan_penyelenggara =$('#bidan_penyelenggara').val();
              var tahun_masuk = $('#tahun_masukkhursus').val();
              var tahun_lulus = $('#tahun_luluskhursus').val();

              if(nama_bidang ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Nama bidang Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#nama_bidang').focus();
              }
              else if(bidan_penyelenggara ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Bidan Penyelenggara Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#bidan_penyelenggara').focus();
              }
              else if(tahun_masuk ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Tahun masuk Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#tahun_masukkhursus').focus();
              }
              else if(tahun_lulus ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Tahun lulus Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#tahun_luluskhursus').focus();
              }
              else{

                  $.ajax
                  ({
                      url:'insertdatakhursus.php',
                      dataType:'text',
                      type:'POST',
                      data:{
                          nama_bidang:nama_bidang,
                          nama_penyelenggara:bidan_penyelenggara,
                          tahun_masuk:tahun_masuk,
                          tahun_lulus:tahun_lulus
                      },
                      success:function(data){
                          // alert('' + data + '');
                          $("#tablekhursus").bootstrapTable('refresh');
                          $('#nama_bidang').val('');
                          $('#nama_penyelenggara').val('');
                          $('#tahun_masukkhursus').val('');
                          $('#tahun_luluskhursus').val('');
                      }

                  })

              }

          });
      });


      function deletedatakhursus(id){
          var idriwayatkhursus =id;

          $.ajax
          ({
              url:'deletedatakhursus.php',
              dataType:'text',
              type:'POST',
              data:{
                  idriwayatkhursus:idriwayatkhursus
              },
              success:function(data){
                  alert('' + data + '');
                  $("#tablekhursus").bootstrapTable('refresh');
              }

          })
      }

      $(document).ready(function(){
          $('#databahasa').click(function(){

              var nama_bahasa = $('#nama_bahasa').val();
              var writing =$('#writing').val();
              var listening = $('#listening').val();
              var speaking =$('#speaking').val();

              if(nama_bahasa ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Nama Bahasa Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#nama_bahasa').focus();
              }
              else if(writing ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Writing Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#writing').focus();
              }
              else if(listening ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Listening Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#listening').focus();
              }
              else if(speaking == ''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Speaking Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#speaking').focus();
              }
              else{
                  $.ajax
                  ({
                      url:'insertdatabahasa.php',
                      dataType:'text',
                      type:'POST',
                      data:{
                          nama_bahasa:nama_bahasa,
                          writing:writing,
                          listening:listening,
                          speaking:speaking
                      },
                      success:function(data){
                          // alert('' + data + '');
                          $("#tablebahasa").bootstrapTable('refresh');
                          $('#nama_bahasa').val('');
                          $('#writing').val('');
                          $('#listening').val('');
                          $('#speaking').val('');
                      }
                  })
              }

          });
      });

      function deletedatabahasa(id){
          var idbahasa =id;

          $.ajax
          ({
              url:'deletedatabahasa.php',
              dataType:'text',
              type:'POST',
              data:{
                  idbahasa:idbahasa
              },
              success:function(data){
                  alert('' + data + '');
                  $("#tablebahasa").bootstrapTable('refresh');
              }

          })
      }

      $(document).ready(function(){
          $('#datapenghargaan').click(function(){

              var nama_penghargaan= $('#nama_penghargaan').val();
              var keterangan = $('#keterangan').val();

              if(nama_penghargaan ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Nama Penghargaan Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#nama_penghargaan').focus();
              }
              else if(keterangan ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Keterangan Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#keterangan').focus();
              }
              else{
                  $.ajax
                  ({
                      url:'insertdatapenghargaan.php',
                      dataType:'text',
                      type:'POST',
                      data:{
                          nama_penghargaan:nama_penghargaan,
                          keterangan:keterangan
                      },
                      success:function(data){
                          // alert('' + data + '');
                          $("#tablepenghargaan").bootstrapTable('refresh');
                          $('#nama_penghargaan').val('');
                          $('#keterangan').val('');
                      }
                  })
              }

          });
      });

      function deletedatapenghargaan(id){
          var idpenghargaan =id;

          $.ajax
          ({
              url:'deletedatapenghargaan.php',
              dataType:'text',
              type:'POST',
              data:{
                  idpenghargaan:idpenghargaan
              },
              success:function(data){
                  alert('' + data + '');
                  $("#tablepenghargaan").bootstrapTable('refresh');
              }

          })
      }
      function deletedatauploadfile(id){
      var iduploadfile =id;

      $.ajax
        ({
            url:'deletedatauploadfile.php',
            dataType:'text',
            type:'POST',
            data:{
              iduploadfile:iduploadfile
            },
            success:function(data){
              alert('' + data + '');
              $("#tableuploadfile").bootstrapTable('refresh');
            }

        })
  }


      $(document).ready(function(){
          $('#datakeahlian').click(function(){

              var nama_keahlian = $('#nama_keahlian').val();
              var nilai =$('#nilai_keahlian').val();

              if(nama_keahlian ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Keahlian Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#nama_keahlian').focus();
              }
              else if(nilai ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Nilai Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#nilai_keahlian').focus();
              }
              else{
                  $.ajax
                  ({
                      url:'insertdatakeahlian.php',
                      dataType:'text',
                      type:'POST',
                      data:{
                          nama_keahlian:nama_keahlian,
                          nilai:nilai
                      },
                      success:function(data){
                          // alert('' + data + '');
                          $("#tablekeahlian").bootstrapTable('refresh');
                          $('#nama_keahlian').val('');
                          $('#nilai_keahlian').val('');
                      }
                  })
              }

          });
      });

      function deletedatakeahlian(id){
          var idkeahlian =id;

          $.ajax
          ({
              url:'deletedatakeahlian.php',
              dataType:'text',
              type:'POST',
              data:{
                  idkeahlian:idkeahlian
              },
              success:function(data){
                  alert('' + data + '');
                  $("#tablekeahlian").bootstrapTable('refresh');
              }

          })
      }

      $(document).ready(function(){
          $('#datareferensi').click(function(){

              var nama_lengkap_referensi = $('#nama_lengkap_referensi').val();
              var jabatan =$('#jabatan_referensi').val();
              var nomor_hp = $('#nomor_hpreferensi').val();
              var hubungan =$('#hubungan_referensi').val();

              if(nama_lengkap_referensi ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Nama Lengkap Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#nama_lengkap_referensi').focus();
              }
              else if(jabatan ==''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Jabatan Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#jabatan_referensi').focus();
              }
              else if(nomor_hp == ''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Nomor Hp Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#nomor_hpreferensi').focus();
              }
              else if(hubungan == ''){
                  $.notify({
                          title:"<strong>Danger!!!</strong>",
                          message:"Hubungan Tidak Boleh Kosong"
                      },
                      {
                          // settings
                          type: 'danger',
                          placement: {
                              from: "bottom",
                              align: "right"
                          }
                      })
                  $('#hubungan_referensi').focus();
              }
              else{
                  $.ajax
                  ({
                      url:'insertdatareferensi.php',
                      dataType:'text',
                      type:'POST',
                      data:{
                          nama_lengkap:nama_lengkap_referensi,
                          jabatan:jabatan,
                          nomor_hp:nomor_hp,
                          hubungan:hubungan
                      },
                      success:function(data){
                          // alert('' + data + '');
                          $("#tablereferensi").bootstrapTable('refresh');
                          $('#nama_lengkap_referensi').val('');
                          $('#jabatan_referensi').val('');
                          $('#nomor_hpreferensi').val('');
                          $('#hubungan_referensi').val('');
                      }
                  })
              }

          });
      });

      function deletedatareferensi(id){
          var idreferensi =id;

          $.ajax
          ({
              url:'deletedatareferensi.php',
              dataType:'text',
              type:'POST',
              data:{
                  idreferensi:idreferensi
              },
              success:function(data){
                  alert('' + data + '');
                  $("#tablereferensi").bootstrapTable('refresh');
              }

          })
      }

       // Upload File

      $(document).ready(function() {
        var options = {
            target:   '#output',   // target element(s) to be updated with server response
            beforeSubmit:  beforeSubmit,  // pre-submit callback
            success:       afterSuccess,  // post-submit callback
            uploadProgress: OnProgress, //upload progress callback
            resetForm: true        // reset the form after successful submit
          };

         $('#MyUpdateFileForm').submit(function() {
            $(this).ajaxSubmit(options);
            // always return false to prevent standard browser submit and page navigation
            return false;
          });


      //function after succesful file upload (when server response)
      function afterSuccess()
      {
        $('#submit-btn').show(); //hide submit button
        $('#loading-img').hide(); //hide submit button
        $('#progressbox').delay( 1000 ).fadeOut(); //hide progress bar
        $("#tableuploadfile").bootstrapTable('refresh');
      }

      //function to check file size before uploading.
      function beforeSubmit(){
          //check whether browser fully supports all File API
         if (window.File && window.FileReader && window.FileList && window.Blob)
        {

          if( !$('#FileInput').val()) //check empty input filed
          {
            $("#output").html("Are you kidding me?");
            return false
          }

          var fsize = $('#FileInput')[0].files[0].size; //get file size
          var ftype = $('#FileInput')[0].files[0].type; // get file type


          //allow file types
          switch(ftype)
              {
            case 'image/png':
            // case 'image/gif':
            case 'image/jpeg':
            // case 'image/pjpeg':
            // case 'text/plain':
            // case 'text/html':
            // case 'application/x-zip-compressed':
            case 'application/pdf':
            case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
            case 'application/msword':
            // case 'application/vnd.ms-excel':
            // case 'video/mp4':
                      break;
                  default:
                      $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
              return false
              }

          //Allowed file size is less than 5 MB (1048576)
          if(fsize>2242880)
          {
            $("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big file! <br />File is too big, it should be less than 5 MB.");
            return false
          }

          $('#submit-btn').hide(); //hide submit button
          $('#loading-img').show(); //hide submit button
          $("#output").html("");
        }
        else
        {
          //Output error to older unsupported browsers that doesn't support HTML5 File API
          $("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
          return false;
        }
      }

      //progress bar function
      function OnProgress(event, position, total, percentComplete)
      {
          //Progress bar
        $('#progressbox').show();
          $('#progressbar').width(percentComplete + '%') //update progressbar percent complete
          $('#statustxt').html(percentComplete + '%'); //update status text
          if(percentComplete>50)
              {
                  $('#statustxt').css('color','#000'); //change status text to white after 50%
              }
      }

      //function to format bites bit.ly/19yoIPO
      function bytesToSize(bytes) {
         var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
         if (bytes == 0) return '0 Bytes';
         var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
         return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
      }

      });

      // Finish


  </script>

</body>
</html>