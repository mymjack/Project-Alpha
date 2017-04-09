<!-- PHP code - Andrew -->
<?php

   $name = htmlspecialchars_decode($_POST['name']);	
   $ari = htmlspecialchars_decode($_POST['ari']);
   $dep = htmlspecialchars_decode($_POST['dep']);
   $cell = htmlspecialchars_decode($_POST['cell']);
   $space = htmlspecialchars_decode($_POST['space']);
   $description = htmlspecialchars_decode($_POST['description']);
   $month = htmlspecialchars_decode($_POST['month']);
   $day = htmlspecialchars_decode($_POST['day']);
   $year = htmlspecialchars_decode($_POST['year']);
             
   $con = mysqli_connect("127.0.0.1","root","Shgl123.","otto_db1");
   
   if (!$con) {
   	// Database could not be opened
   	echo "<b>Database could not be opened</b>";
   }
   else
   {	 
   
   			if (empty($name) || empty($ari) || empty($dep) ||
   				empty($year) || empty($day) || empty($month))
   			{
      			;; //No mandatory fields filled, bail
      			echo "<b>Manadatory fields not filled</b>";
      		}
      		else
      		{
      			$traveldate = "$year-$month-$day";
      			
      			$date = getdate();
      			$publishdate = sprintf("%s-%s-%s",$date["year"],$date["mon"],$date["mday"]);
      			
      			//Add table entry   				
   				$query = "INSERT INTO `requests` (`name`,`arrivals`,`publishdate`,`traveldate`,`departures`,`cell`,`space`,`description`) VALUES ('$name','$ari','$publishdate','$traveldate','$dep','$cell','$space','$description');";
					mysqli_query($con,$query);
				   		mysqli_commit($con);
			}
			
   		mysqli_close($con);
   	} 		
?>