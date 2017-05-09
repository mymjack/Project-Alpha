<?php
   include("../utils.php");
   configSession();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $un = mysqli_real_escape_string($db,$_POST['username']);
      $pw = mysqli_real_escape_string($db,$_POST['password']); 
      // $cpw = mysqli_real_escape_string($db,$_POST['cpassword']); 
      
      $sql = "INSERT INTO admin (username, password) VALUES ('$un', '$pw')";
      $result = mysqli_query($db,$sql);

      if($result){
         $_SESSION['login_user'] = $un;
         echo '{"status":"success", "redirect" : "member.php"}';
      } else {
         echo '{"status":"error", "errorMsg" : "Username taken. Please try another one"}';
      }
   }
?>