<?php
   include("../utils.php");
   configSession();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $name = mysqli_real_escape_string($db,$_POST['name']);
      $cell = mysqli_real_escape_string($db,$_POST['cell']); 
      $email = mysqli_real_escape_string($db,$_POST['email']); 
      $wechat = mysqli_real_escape_string($db,$_POST['wechat']); 

      $sql =$db->prepare('INSERT INTO usr_info (username, name, cell, email, weChat) VALUES ("'.$_SESSION['login_user'].'", ?, ?, ?, ?) 
                        ON DUPLICATE KEY UPDATE name=VALUES(name), cell=VALUES(cell), email=VALUES(email), weChat=VALUES(weChat);');
      $sql->bind_param("ssss", $name, $cell, $email, $wechat);
      $result = $sql->execute();

      echo $result? '{"status":"success"}' : '{"status":"error", "errorMsg" : "服务器繁忙，请稍后再试"}';
   }
?>