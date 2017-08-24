<?php

                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                 $page=$_GET["p"];        
                switch ($page){
                    
                    case"info":
                        include "informasi.php";
                    break;
                    case"default":
                        include "kebutuhan.php";
                        break;
                    default:
                        include ('default.php');
                        break;
                        
                }
?>