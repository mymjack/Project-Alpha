<?php
   include("../utils.php");
   configSession();
   
   if(session_destroy()) {
      header("Location: ../login.php");
   }
?>