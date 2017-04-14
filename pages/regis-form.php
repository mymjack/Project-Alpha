<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "INSERT INTO admin (username, password) VALUES ('$myusername', '$mypassword')";
      $result = mysqli_query($db,$sql);

      if($result){
         $_SESSION['login_user'] = $myusername;
         header("location: welcome.php");
      } else {
         echo "User exists";
      }
   }
?>