<?php
   include("utils.php");
   configSession();
   
   if(session_destroy()) {
      header("Location: usr-login.php");
   }
?>