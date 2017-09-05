<nav class="navbar navbar-default">
   
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">CORPORATE</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
            <li ><a href="/pendaftaran/corporate/home.php">home</a></li>
            <li><a href="?p=info">profile</a></li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">corporate  <span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="?p=infoReq">informasi request</a></li>
                  <li><a href="?p=req">request kebutuhan</a></li>
                  <li><a href="?p=update">complain</a></li>
                  
               </ul>
            </li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
             
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">&nbsp;Hi' <?= $info['nama_perusahaan']; ?>&nbsp; <span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="?p=update">Setting</a></li>
                  <li><a href="logout.php?logout=true">Logout</a></li>
               </ul>
            </li>
         </ul>
      </div>
      <!-- /.navbar-collapse -->
   
   <!-- /.container-fluid -->
</nav>