<?php

                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                 $page=$_GET["p"];        
                switch ($page){
                    
                    case"mpo":
                        include "MPO.php";
                        break;
                    case"bpo":
                        include "BPO.php";
                        break;
                    case"default":
                        include "kebutuhan.php";
                        break;
                    default:
                        include ('kebutuhan.php');
                        break;
                        
                }
