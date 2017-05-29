<?php
   // PHP code - Andrew
   // Adaptation - Jack
   include("../utils.php");
   configSession();

   if (! hasEmpty([$_POST['name'], $_POST['arri'], $_POST['dep'], $_POST['datepicker']])) {
      $name = htmlspecialchars_decode($_POST['name']);	
      $ari = htmlspecialchars_decode($_POST['arri']);
      $dep = htmlspecialchars_decode($_POST['dep']);
      $cell = htmlspecialchars_decode($_POST['cell']?: '');
      $email = htmlspecialchars_decode($_POST['email']?: '');
      $travel = htmlspecialchars_decode($_POST['datepicker']);
      $description = htmlspecialchars_decode($_POST['description'] ?: '');

      $id = htmlspecialchars_decode(isset($_POST['id']) ? $_POST['id']: '');

      date_default_timezone_set('America/Toronto');
      $date = getdate();
      $publishdate = date('Y-n-j H:i:s');

      //Add table entry
      if (empty($id)) {
      	$query = $db->prepare("INSERT INTO flights_regis (username, name,arrivals,publishdate,traveldate,departures,cell,email, description) VALUES('".$_SESSION['login_user']."', ?,?,?,?,?,?,?,?);");
      } else {
         $query = $db->prepare("UPDATE flights_regis SET name=?,arrivals=?,publishdate=?,traveldate=?,departures=?,cell=?,email=?,description=? WHERE id='$id';");
      }

      $query->bind_param ( 'ssssssss', $name, $ari, $publishdate, $travel, $dep, $cell, $email, $description);
      $res = $query->execute();
      echo $res? '{"status":"success", "id":"'.mysqli_insert_id($db).'"}' : '{"status":"error", "errorMsg" : "服务器繁忙，请稍后再试"}';
   }
?>