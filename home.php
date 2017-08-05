<?php

	require_once("session.php");

	require_once("class.user.php");
	$auth_user = new USER();


	$user_id = $_SESSION['user_session'];

	$cek = $auth_user->runQuery("SELECT (no_ktp) FROM tb_karyawan WHERE no_ktp = :id");
  $cek->execute(array(
    ':id'  => $user_id));
  if ($cek->rowCount() == 1) {
    # code...
    header('Location: profile.php');
  } else {
    $stmt = $auth_user->runQuery("SELECT * FROM tb_login_karyawan WHERE no_ktp=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));


  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" id="bootstrap-css">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
  <!-- Bootstrap Datepicker -->
  <link rel="stylesheet" type="text/css" href="bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
  <!-- Bootstrap Tables -->
  <link rel="stylesheet" href="bootstrap-table/dist/bootstrap-table.min.css">
  <!-- Bootstrap Theme -->
  <link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">

<title>Welcome - <?php print($userRow['email']); ?></title>

  <style type="text/css" media="screen">

  body {
  margin-top:50px;
  margin-bottom: 50px;
  }
  .stepwizard-step p {
    margin-top: 12px;
  }
  .stepwizard-row {
    display: table-row;
  }
  .stepwizard {
    display: table;
    width: 50%;
    position: relative;
    margin-top: 65px;
    font-weight: bold;
  }
  .stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
  }
  .stepwizard-row:before {
    top: 19px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
  }
  .stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
  }
  .btn-circle {
    width: 40px;
    height: 40px;
    text-align: center;
    padding: 6px 0;
    font-size: 18px;
    line-height: 1.428571429;
    border-radius: 19px;
  }
  #output{
  padding: 5px;
  font-size: 12px;
  }

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
/*  .btn-primary {
    color: #fff;
    background-color: #7b8289;
    border-color: #7b8289;
  }
   .btn-primary:hover {
    color: #fff;
    background-color: #5b5f66;
    border-color: #5b5f66;
  }*/
  .navbar-brand{
  font-family: 'Open Sans', sans-serif;
  }
  </style>

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">SINERGIADHIKARYA</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="clearfix"></div>


<div class="container-fluid" style="margin-top:80px;">



<div class="col-md-8 col-md-offset-2 well">
  <h1 align="center">
  <strong>Registrasi Form <i class="fa fa-user-circle-o" aria-hidden="true"></i>
</strong>
    </h1>
    </div>

    <div class="stepwizard col-md-offset-3">
      <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
          <a href="#step-1" type="button" class="btn btn-primary btn-circle"><strong>I</strong></a>
          <p>Personal</p>
        </div>
            <div class="stepwizard-step">
          <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><strong>II</strong></a>
          <p>Keluarga</p>
        </div>
            <div class="stepwizard-step">
          <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><strong>III</strong></a>
          <p>Pendidikan</p>
        </div>
           <div class="stepwizard-step">
          <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled"><strong>IV</strong></a>
          <p>Referensi</p>
        </div>
           <div class="stepwizard-step">
          <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled"><strong>V</strong></a>
          <p>Upload</p>
        </div>
          </div>
    </div>
    <br>


    <?php

    include "steppersonal.php";
    include "stepkeluarga.php";
    include "steppendidikan.php";
    include "stepreferensi.php";
    include "stepuploadfile.php";

    ?>

</div>



  <!-- Jquery Min -->
  <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Bootstrap Datepciker -->
  <script src="bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Jquery Form -->
  <script type="text/javascript" src="assets/js/jquery.form.min.js"></script>
  <!-- Bootstrap Tables -->
  <script src="bootstrap-table/dist/bootstrap-table.min.js"></script>
  <!-- Bootstrap Validation -->
  <script type="text/javascript" src="dist/js/formValidation.js"></script>
  <script type="text/javascript" src="dist/js/framework/bootstrap.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- Bootstrap Notif -->
  <script src="bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>

  <script>

  // Nav list Page Register

      $(document).ready(function () {
      var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

      allWells.hide();

      navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
        }
      });


      allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
          isValid = true;

        // $(".form-group").removeClass("has-error");
        // for(var i=0; i<curInputs.length; i++){
        //   if (!curInputs[i].validity.valid){
        //     isValid = false;
        //     $(curInputs[i]).closest(".form-group").addClass("has-error");
        //   }
        // }

        if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
      });

      $('div.setup-panel div a.btn-primary').trigger('click');
    });

      // Datepicker Personal

          $('#tanggal_lahir').datetimepicker({
              format: 'dd-mm-yyyy',
              autoclose: true,
              todayBtn: true,
               minView: 2
           });

      // Datepicker Keluarga

         $('#tanggal_lahirkeluarga').datetimepicker({
              format: 'yyyy-mm-dd',
              autoclose: true,
              todayBtn: true,
               minView: 2
           });

          $(window).bind('beforeunload', function(){
              return "Are u sure";
          })

         $(document).ready(function(){
            $("#onesteps").click(function(){

                var nama_depan = $('#nama_depan').val();
                var nama_belakang = $('#nama_belakang').val();
                var foto=$('#img').val();
                var alamat = $('#alamat_lengkap').val();
                var kecamatan = $('#kecamatan').val();
                var kelurahan =$('#kelurahan').val();
                var kota = $('#kota').val();
                var nomor_hp =$('#nomor_hp').val();
                var nomor_telp =$('#nomor_telp').val();
                var status_tempat_tinggal= $('#status_tempat_tinggal').val();
                var tempat_lahir = $('#tempat_lahir').val();
                var tgl_lahir = $('#tanggal_lahir').val();
                var nama_suku =$('#nama_suku').val();
                var agama =$('#agama').val();
                var tinggi_badan=$('#tinggi_badan').val();
                var berat_badan=$('#berat_badan').val();
                var nomor_sim=$('#nomor_sim').val();
                var jenis_sim=$('#type_sim:checked').val();
                var status_perkawinan=$('#statuspersonal:checked').val();
                var jenis_kelamin=$('#jenis_kelamin:checked').val();
                var hobi=$('#hobi').val();

                $.ajax
                      ({
                        url:'insertdatapersonal.php',
                        type:"POST",
                        dataType:'text',
                        data:{
                          nama_depan:nama_depan,
                          nama_belakang:nama_belakang,
                          alamat:alamat,
                          jenis_kelamin:jenis_kelamin,
                          nomor_hp:nomor_hp,
                          nomor_telp:nomor_telp,
                          tempat_lahir:tempat_lahir,
                          tgl_lahir:tgl_lahir,
                          nama_suku:nama_suku,
                          agama:agama,
                          tinggi_badan:tinggi_badan,
                          berat_badan:berat_badan,
                          nomor_sim:nomor_sim,
                          jenis_sim:jenis_sim,
                          status_perkawinan:status_perkawinan,
                          status_tempat_tinggal:status_tempat_tinggal,
                          foto:localStorage.foto,
                          hobi:hobi,
                          alamat:alamat,
                          kelurahan:kelurahan,
                          kecamatan:kecamatan,
                          kota:kota
                        },
                      success:function(data){
                        //alert('' + data + '');
                        localStorage.clear();
                      }
                      })

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

    $(document).ready(function(){
      $('#datapekerjaan').click(function(){

          var nama_perusahaan = $('#nama_perusahaan').val();
          var tahun_masuk =$('#tahun_masukkerja').val();
          var tahun_keluar = $('#tahun_keluarkerja').val();
          var jabatan =$('#jabatan').val();
          var gaji = $('#gaji').val();
          var alasan_berhenti =$('#alasan_berhenti').val();
          var keterangan = $('#keterangan_pekerjaan').val();

          if(nama_perusahaan == ''){
            $.notify({
                title:"<strong>Danger!!!</strong>",
                message:"Nama Perusahaan Tidak Boleh Kosong"
              },
              {
                // settings
                type: 'danger',
                placement: {
                from: "bottom",
                align: "right"
              }
              })
                $('#nama_perusahaan').focus();
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
                $('#tahun_masukkerja').focus();
          }
          else if(tahun_keluar ==''){
           $.notify({
                title:"<strong>Danger!!!</strong>",
                message:"Tahun keluar Tidak Boleh Kosong"
              },
              {
                // settings
                type: 'danger',
                placement: {
                from: "bottom",
                align: "right"
              }
              })
                $('#tahun_keluarkerja').focus();
          }
          else if(jabatan == ''){
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
                $('#jabatan').focus();
          }
          else if(gaji ==''){
               $.notify({
                title:"<strong>Danger!!!</strong>",
                message:"Gaji Tidak Boleh Kosong"
              },
              {
                // settings
                type: 'danger',
                placement: {
                from: "bottom",
                align: "right"
              }
              })
                $('#gaji').focus();
          }
          else if(alasan_berhenti ==''){
            $.notify({
                title:"<strong>Danger!!!</strong>",
                message:"Alasan Berenti Tidak Boleh Kosong"
              },
              {
                // settings
                type: 'danger',
                placement: {
                from: "bottom",
                align: "right"
              }
              })
                $('#alasan_berhenti').focus();
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
                $('#keterangan_pekerjaan').focus();
          }
          else{
            $.ajax
              ({
                  url:'insertdatapekerjaan.php',
                  dataType:'text',
                  type:'POST',
                  data:{
                    nama_perusahaan:nama_perusahaan,
                    tahun_masuk:tahun_masuk,
                    tahun_keluar:tahun_keluar,
                    jabatan:jabatan,
                    gaji:gaji,
                    alasan_berhenti:alasan_berhenti,
                    keterangan:keterangan
                  },
                  success:function(data){
                    // alert('' + data + '');
                      $("#tablepekerjaan").bootstrapTable('refresh');
                      $('#nama_perusahaan').val('');
                      $('#tahun_masukkerja').val('');
                      $('#tahun_keluarkerja').val('');
                      $('#jabatan').val('');
                      $('#gaji').val('');
                      $('#alasan_berhenti').val('');
                      $('#keterangan_pekerjaan').val('');
                  }
              })
          }

        });
      });

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


      function readURL(input) {

          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                $('#img').show().attr('src', e.target.result);
                $('#uploadfile').fadeOut('fast');
                localStorage.foto = e.target.result
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

      function clearImage(){
        $("#uploadfile").show();
        $("#clear").hide();
        $("#defaultimg").show();
        $("#img").hide();
        localStorage.clear();
      }


      $(document).ready(function(){
        $("#imgInp").on('change', function(){
          readURL(this);
        $("#defaultimg").hide();
        $("#img").show();
        $("#clear").show();
        });
      });

      // Upload File

      $(document).ready(function() {
        var options = {
            target:   '#output',   // target element(s) to be updated with server response
            beforeSubmit:  beforeSubmit,  // pre-submit callback
            success:       afterSuccess,  // post-submit callback
            uploadProgress: OnProgress, //upload progress callback
            resetForm: true        // reset the form after successful submit
          };

         $('#MyUploadForm').submit(function() {
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

      $(document).ready(function(){
        $('#finish').click(function(){

            var keperibadian = $('#keperibadian').val();
            var menghire = $('#menghire').val();
            var persetujuan =$('#persetujuan:checked').val();

            if(keperibadian ==''){
              $.notify({
                title:"<strong>Danger!!!</strong>",
                message:"Data keperibadian tidak boleh kosong"
              },
              {
                // settings
                type: 'danger',
                placement: {
                from: "bottom",
                align: "right"
              }
              })
              $('#keperibadian').focus();
            }
            else if(menghire == ''){
            $.notify({
                title:"<strong>Danger!!!</strong>",
                message:"Data Menghire tidak boleh kosong"
              },
              {
                // settings
                type: 'danger',
                placement: {
                from: "bottom",
                align: "right"
              }
              })
              $('#menghire').focus();
            }
            else if(persetujuan == undefined){
                $.notify({
                title:"<strong>Danger!!!</strong>",
                message:"Mohon checklist"
              },
              {
                // settings
                type: 'danger',
                placement: {
                from: "bottom",
                align: "right"
              }
              })
            }
            else{
            $.ajax
                ({
                    url:'insertdatapersonal2.php',
                    type:'POST',
                    dataType:'text',
                    data:{
                      keperibadian:keperibadian,
                      menghire:menghire
                    },
                    success:function(data){
                       // alert('' + data + '');
                       window.location.href = 'profile.php';
                    }
                })
              }
        });
      });

      /*Validasi*/

$(document).ready(function() {
    $('#FormPersonal')
        .formValidation({
            message: 'This value is not valid',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields:{
              nama_depan: {
                    message: 'Nama depan tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'Nama Depan Tidak Boleh Kosong'
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'Min 3 karakter dan Max 30 karakter'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'Nama Depan Harus Huruf'
                        }
                    }
              },
              nama_belakang: {
                    message: 'Nama Belakang tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'Nama Belakang Tidak Boleh Kosong'
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'Min 3 karakter dan Max 30 karakter'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'Nama Belakang Harus Huruf'
                        }
                    }
              },
              kecamatan: {
                    message: 'Kecamatan tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'Kecamatan Tidak Boleh Kosong'
                        },
                        stringLength: {
                            max: 30,
                            message: 'Max 30 karakter'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'Kecamatan Harus Huruf'
                        }
                    }
              },
              kelurahan: {
                    message: 'Kelurahan tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'Kelurahan Tidak Boleh Kosong'
                        },
                        stringLength: {
                            max: 30,
                            message: 'Max 30 karakter'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'Kelurahan Harus Huruf'
                        }
                    }
                },
                kota: {
                    message: 'Kota tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'Kota Tidak Boleh Kosong'
                        },
                        stringLength: {
                            max: 30,
                            message: 'Max 30 karakter'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'Kota Harus Huruf'
                        }
                    }
              },
              nomor_hp: {
                    message: 'No.Hp tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'No.hp Tidak Boleh Kosong'
                        },
                        stringLength: {
                            max: 15,
                            message: 'Max 15 karakter'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'No.hp Harus Angka'
                        }
                    }
              },
              status_tempat_tinggal: {
                    message: 'Status tempat tinggal tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'Status tempat tinggal Tidak Boleh Kosong'
                        },
                        stringLength: {
                            max: 30,
                            message: 'Max 30 karakter'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'Status tempat tinggal Harus Huruf'
                        }
                    }
              },
              tempat_lahir: {
                    message: 'Tempat lahir tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'Tempat lahir Tidak Boleh Kosong'
                        },
                        stringLength: {
                            max: 30,
                            message: 'Max 30 karakter'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'Tempat Lahir Harus Huruf'
                        }
                    }
              },
                 nama_suku: {
                    message: 'Nama suku tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'Nama suku Tidak Boleh Kosong'
                        },
                        stringLength: {
                            max: 30,
                            message: 'Max 30 karakter'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'Nama suku Harus Huruf'
                        }
                    }
              },
              agama: {
                    message: 'Agama tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'Agama Tidak Boleh Kosong'
                        },
                        stringLength: {
                            max: 15,
                            message: 'Max 15 karakter'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'Agama Harus Huruf'
                        }
                    }
              },
              tinggi_badan: {
                    message: 'Tinggi badan tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'Tinggi badan Tidak Boleh Kosong'
                        },
                        stringLength: {
                            max: 10,
                            message: 'Max 10 karakter'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Tinggi badan Harus Angka'
                        }
                    }
              },
              berat_badan: {
                    message: 'Berat badam tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'Berat badan Tidak Boleh Kosong'
                        },
                        stringLength: {
                            max: 10,
                            message: 'Max 10 karakter'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Berat berat Harus Angka'
                        }
                    }
              },
                nomor_sim: {
                    message: 'Nomor Sim tidak sesuai ketentuan',
                    validators: {
                        notEmpty: {
                            message: 'Nomor Sim Tidak Boleh Kosong'
                        },
                        stringLength: {
                            max: 18,
                            message: 'Max 18 karakter'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Nomor Sim Harus Angka'
                        }
                    }
              }

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


  function deletedatapekerjaan(id){
      var idpekerjaan =id;

      $.ajax
        ({
            url:'deletedatapekerjaan.php',
            dataType:'text',
            type:'POST',
            data:{
              idpekerjaan:idpekerjaan
            },
            success:function(data){
              alert('' + data + '');
              $("#tablepekerjaan").bootstrapTable('refresh');
            }

        })
  }

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

  </script>

</body>
</html>
<?php

  } ?>