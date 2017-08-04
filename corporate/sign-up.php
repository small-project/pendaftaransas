<?php
require_once 'header.php';
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('index.php');
}

if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	
	if($uname=="")	{
		$error[] = "KTP NOT EMPTY";	
	}
	else if(!is_numeric($uname))
	{
		$error[] = "KTP ONLY NUMBER";
	}
	elseif (strlen($uname) <= 15) {
		# code...
		$error[] = "KTP ONLY 16 DIGIT";
	}
	else if($umail=="")	{
		$error[] = "EMAIL NOT EMPTY";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'ENTER VALID EMAIL';
	}
	else if($upass=="")	{
		$error[] = "PASSWORD NOT EMPTY";
	}
	else if(strlen($upass) < 6){
		$error[] = "MINIMUM PASSWORD 6";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT no_ktp, email FROM tb_login_karyawan WHERE no_ktp=:uname OR email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['no_ktp']==$uname) {
				$error[] = "sorry KTP already taken !";
			}
			else if($row['email']==$umail) {
				$error[] = "sorry EMAIL id already taken !";
			}
			else
			{
				if($user->register($uname,$umail,$upass)){	
					$user->redirect('sign-up.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>


<div class="signin-form">

<div class="container">
    	
        <form method="post" class="form-signin" action="home2.php">
            <h2 class="form-signin-heading">Sign up Corporate</h2><hr />
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <strong><a href='index.php'>login</a></strong> here
                 </div>
                 <?php
			}
			?>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" placeholder="kode perusahanan" />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_upass" placeholder="enter password" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
        </form>
       </div>
</div>

</div>
<?php include_once 'footer.php'; ?>