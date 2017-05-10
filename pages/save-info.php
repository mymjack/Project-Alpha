<?php
   include("utils.php");
   configSession();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $name = mysqli_real_escape_string($db,$_POST['name']);
      $cell = mysqli_real_escape_string($db,$_POST['cell']); 
      $email = mysqli_real_escape_string($db,$_POST['email']); 
      
      $sql = $db->prepare('REPLACE INTO usr_info (username, name, cell, email) VALUES ("'.$_SESSION['login_user'].'", ?, ?, ?);');
      $sql->bind_param("sss", $name, $cell, $email);
      $result = $sql->execute();

      echo $result? '{"status":"success"}' : '{"status":"error", "errorMsg" : "服务器繁忙，请稍后再试"}';
   }
?>