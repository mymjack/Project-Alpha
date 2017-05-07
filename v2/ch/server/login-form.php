<?php
   include("utils.php");
   configSession();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // $active = $row['active'];

      // If result matched $myusername and $mypassword, table row must be 1 row
      if(mysqli_num_rows($result) == 1) {
         $_SESSION['login_user'] = $myusername;
         if (isset( $_SESSION['urlAfterLogin']) && !empty($_SESSION['urlAfterLogin'] )){
            $forward = $_SESSION['urlAfterLogin'];
            session_unset($_SESSION['urlAfterLogin']);
         } else {
            $forward = 'welcome.php';
         }
         echo '{"status":"success", "redirect" : "'.$forward.'"}';
      } else {
         echo '{"status":"error", "errorMsg" : "Your Login Name or Password is invalid"}';
      }
   }
?>