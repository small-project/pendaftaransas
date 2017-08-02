<?php

                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                 $page=$_GET["p"];        
                switch ($page){
                    
                    case"profile":
                        include"viewsProfile.php";
                        break;
                    case"update":
                        include"updateProfile.php";
                        break;
                    case"list":
                        include"listJob.php";
                        break;
                    default:
                        include('default.php');
                        break;
                        
                }
