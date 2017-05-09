<?php
   include("../utils.php");
   configSession();

   if (! hasEmpty([$_POST['dname'], $_POST['cname'], $_POST['caddress'], $_POST['ccell']])) {
      $dname = htmlspecialchars_decode($_POST['dname']);	
      $dcell = htmlspecialchars_decode($_POST['dcell']?: '');
      $demail = htmlspecialchars_decode($_POST['demail']?: '');
      $cname = htmlspecialchars_decode($_POST['cname']); 
      $ccell = htmlspecialchars_decode($_POST['ccell']);
      $caddress = htmlspecialchars_decode($_POST['caddress']);
      $tweight = htmlspecialchars_decode($_POST['tweight']);
      $tvalue = htmlspecialchars_decode($_POST['tvalue']);
      $pickup = htmlspecialchars_decode($_POST['pickup']);
      $items = json_decode(htmlspecialchars_decode($_POST['items']), true);

      // $id = htmlspecialchars_decode($_POST['id'] ?: '');

      date_default_timezone_set('America/Toronto');
      $date = getdate();
      $publishdate = date('Y-n-j H:i:s');

      $query = $db->prepare("INSERT INTO order_regis (username, sellerName, sellerCell, sellerEMail, buyerName, buyerCell, buyerAddress, totalWeight, totalValue, ottoPickUp, publishdate) VALUES('".$_SESSION['login_user']."', ?,?,?,?,?,?,?,?,?,?);");
      $query->bind_param ('ssssssssds', $dname, $dcell, $demail, $cname, $ccell, $caddress, $tweight, $tvalue, $pickup, $publishdate);
      if (!$query->execute()) {
         echo '{"status":"error", "errorMsg" : "服务器暂时无法创建订单，请稍后再试"}';
         exit;
      }
      $orderID = mysqli_insert_id($db);

      // Start inserting items.
      $db->begin_transaction();
      $query2 = $db->prepare("INSERT INTO item_regis (itemName, quantity, weight, price, publishDate, username, orderID) VALUES(?,?,?,?,'".$publishdate."','".$_SESSION['login_user']."', '".$orderID."');");

      foreach ($items as $item) {
         $query2->bind_param ( 'ssss', $item['itemName'], $item['quantity'], $item['weight'], $item['value']);
         if (!$query2->execute()) {
            echo '{"status":"error", "errorMsg" : "服务器暂时无法存储物品数据，请稍后再试"}';
            mysqli_query($db, "DELETE FROM order_regis WHERE orderID='".$orderID."');");
            $db->rollback();
            exit;
         }
      }
      $db->commit();
      echo '{"status":"success", "orderID": "'.$orderID.'"}';
   } else {
      echo '{"status":"error", "errorMsg" : "卖家名，买家名，买家联系方式及运输选项不能为空"}';
   }
?>