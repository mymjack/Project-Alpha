<?php
   $sql = "SELECT name FROM usr_regis WHERE id=18";
   $result = mysql_query($sql);
   while($row = mysql_fetch_array($result)) {
      echo $row['name'];
   }
?>





