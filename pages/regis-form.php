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
         echo "<h4>User exists</h4>";
      }
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      //$count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      //if($count == 1) {
         //session_register("myusername");
      //   $_SESSION['login_user'] = $myusername;
      //   header("location: welcome.php");
      //} else {
      //   //$error = "Your Login Name or Password is invalid";
      //   echo "Your Login Name or Password is invalid";
      //}
   }
?>