<?php
  
	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM tb_karyawan  WHERE no_ktp=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_LAZY);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="assets/jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="assets/style.css" type="text/css"  />
<title>Welcome - <?php print($userRow['email']); ?></title>
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
         <a class="navbar-brand" href="#">SINERGIADHIKARYA</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
            <li ><a href="/pendaftaran">home</a></li>
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




	<div class="container">
      <div class="content">
        <?php
            require 'page.php';
          ?>
      </div>
      </div>
    
    </div>

</div>




<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>