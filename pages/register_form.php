<!-- PHP code - Andrew -->
<?php
   $name = htmlspecialchars_decode($_POST['name']);	
   $ari = htmlspecialchars_decode($_POST['ari']);
   $dep = htmlspecialchars_decode($_POST['dep']);
   $cell = htmlspecialchars_decode($_POST['cell']);
   $description = htmlspecialchars_decode($_POST['description']);
   $travel = htmlspecialchars_decode($_POST['datepicker']);

   $con = mysqli_connect("127.0.0.1","root","Shgl123.","otto_db1");
   if (!$con) {
   	// Database could not be opened
   	echo "<b>Database could not be opened</b>";
   }
   else
   {	 
      date_default_timezone_set('America/Toronto');
      $date = getdate();
      $publishdate = date('Y-n-j H:i:s');

      //Add table entry
      if($name!=""){
   	$query = "INSERT INTO usr_regis (name,arrivals,publishdate,traveldate,departures,cell,description) VALUES ('$name','$ari','$publishdate','$travel','$dep','$cell','$description');";
		$result = mysqli_query($con,$query);
   }
					//mysqli_commit($con);
      
      //NEED TO REMOVE WHEN FINIALIZED
      //if ($result) {
      //      echo "yes";      
      //} else {
      //     echo "no";
      //}
	//}
			
      //mysqli_close($con);
   } 		
?>