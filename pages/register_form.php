<?php
   // PHP code - Andrew
   include ("session.php");

   if (! hasEmpty([$_POST['name'], $_POST['ari'], $_POST['dep'], $_POST['datepicker']])) {
      $name = htmlspecialchars_decode($_POST['name']);	
      $ari = htmlspecialchars_decode($_POST['ari']);
      $dep = htmlspecialchars_decode($_POST['dep']);
      $cell = htmlspecialchars_decode($_POST['cell']?: '');
      $travel = htmlspecialchars_decode($_POST['datepicker']);
      $description = htmlspecialchars_decode($_POST['description'] ?: '');

      date_default_timezone_set('America/Toronto');
      $date = getdate();
      $publishdate = date('Y-n-j H:i:s');

      //Add table entry
      if($name!=""){
      	$query = "INSERT INTO usr_regis (username, name,arrivals,publishdate,traveldate,departures,cell,description) VALUES ('$un', '$name','$ari','$publishdate','$travel','$dep','$cell','$description');";
         // $query = "INSERT INTO usr_regis (name,arrivals,publishdate,traveldate,departures,cell,description) VALUES ('$name','$ari','$publishdate','$travel','$dep','$cell','$description');";
   		if (mysqli_query($db,$query)) {
            header("location: welcome.php");
         }
      }
   }
?>