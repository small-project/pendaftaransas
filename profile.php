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
          <!-- <ul class="nav navbar-nav">
            <li class="active"><a href="">Back to Article</a></li>
            <li><a href="">jQuery</a></li>
            <li><a href="">PHP</a></li>
          </ul> -->
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
	
    <div class="container">
    
    	<label class="h5">welcome : <?php print($userRow['nama_depan']); ?> <?php print($userRow['nama_belakang']); ?></label>
        <hr />
      <div class="row">
        <div class="col-md-2">
          <div class="list-group">
            <a href="/SAS/pendaftaran/" class="list-group-item active"> List Menu</a>
            <a href="?p=profile" class="list-group-item"> Profile</a>
            <a href="?p=update" class="list-group-item"> Update Profile</a>
            <a href="?p=list" class="list-group-item"> LIST JOB</a>
          </div>
        </div>
        <div class="col-md-10">
          <?php
            require 'page.php';
          ?>
        </div>
      </div>
    </div>
    
    </div>

</div>




<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>