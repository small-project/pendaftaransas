<?php
require_once'header.php';
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_email']);
	$upass = strip_tags($_POST['txt_upass']);
		
	if($login->corLogin($uname, $upass))
	{
		$login->redirect('home.php');
	}
	else
	{
		$error = "kode or password wrong !";
	}	
}

$upass = "admin123";

$new_password = password_hash($upass, PASSWORD_DEFAULT);
//echo $new_password;
?>


<div class="signin-form">

<div class="container">
    	
        <form method="post" class="form-signin" action="">
            <h2 class="form-signin-heading">Sign up Corporate</h2><hr />
            <?php
			if(isset($error))
			{
					 ?>
                     <div div class="alert alert-danger alert-dismissible" role="alert">
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="glyphicon glyphicon-danger-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
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
            <input type="text" class="form-control" name="txt_email" placeholder="kode perusahanan" required />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_upass" placeholder="enter password" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-login">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
        </form>
       </div>
</div>

</div>
<?php include_once 'footer.php'; ?>