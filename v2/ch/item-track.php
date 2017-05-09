<?php
	require ("utils.php");
	configSession();
	loginRequired("请先登录再查询运单追踪信息", "item-track.php");
	
		$company_code = "OT";
		$product_id = 1;
		$province = 3;
		$city = 2;
		$flyer_id = 1001;
	
	function generate_trackid()
	{
		/* Algorithm test */
		$track_id = "";
	
		for ($i = 0;$i < 6;$i++)
		{
			if (rand() % 2 == 0)
			{			
				$charset = "QAZWSXEDCRFVTGBYHNUJMIKOLP";
				$track_id .= $charset[rand() % 26];
			}
			else 
				$track_id .= rand() % 9;
		}
		
		return $track_id;
	/*========= END =============*/
		
	}
	
	/*
		Format string:
		    OT nn  n n nnnn xxxxxx
	*/
	printf("%s%02d%d%d%04d%s",
		$company_code,
		$product_id,
		$province,
		$city,
		$flyer_id,
		generate_trackid()
	);	
	
	if (isset($_POST['track_id']) && !empty($_POST['track_id']))
	{
		$tracknum = mysqli_real_escape_string($db, htmlspecialchars($_POST['track_id']));
	
		$sql = "SELECT * FROM tracking_regis WHERE track_id=\"$tracknum\"";
		$result = mysqli_query($db, $sql);
		
		if($result){
			$track_data = mysqli_fetch_assoc($result);
			
			/* Inline CSS */
			if (empty($track_data))
				echo "<div style=\"
					position:scroll;
					z-index:0;
					width:100%;
					top:0px;
					left:0px;
					text-align:center;
					background-color:#f44006;
					color:white;
					font-weight:bold;
					font-size:large;
					box-shadow:0 0 5px gray;
					opacity:0.75;
					\">
					No results found. Please enter another tracking #.</div>";
			else 
			{
					echo "<div style=\"
					position:scroll;
					width:100%;
					z-index:0;
					top:0px;
					left:0px;
					text-align:center;
					background-color:green;
					color:white;
					font-weight:bold;
					font-size:large;
					box-shadow:0 0 5px gray;
					opacity:0.75;
					\">
					Found x matches...</div>";
			
			}
		}
		
			
	}
	
?>
<html>
	<head>
		<title>运单追踪 - Otto带物</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/styles.css" />
	</head>
	<body>

		<!-- Header -->
		<?php $title="运单追踪";include("header.php") ?>

		<!-- Main -->
			<div class="checkout-page">
				<section id="main" class="wrapper">
					<div class="container">

					
						<header class="major special">
							<h2>Enter your Tracking #</h2>
						</header>


						<form action = "item-track.php" method = "post">
							<div class="row uniform row-nopadding row-vertpadding">
								<div class="usr-text clear-both">Your tracking number can be found on the receipt when you first shipped or alternatively use a QR code. </div>
	              			    <div class="col-xs-8 col-sm-5 col-md-4">
	              			    	<input type = "text" maxlength="16" min="16" name = "track_id" class = "box" required pattern=".{3,}"/>
	              			    </div>

               		   			<div class="col-xs-12 clear-both">
									<input style="display:none" type = "submit"/>
									<input class="button special wide-always" type="submit" value = " Get item status "/>
								</div>


               		   		</div>
               			</form>
					
					
							<?php
							/* If not logged in, show basic information */
							if (isset($track_data))
							{
							
								printf("
							    <img src=\"%s\" alt=\"parcel_img\"/><br />
									<h2>Your package: %s</h2>
										<div class=\"row uniform row-nopadding\">",
								$track_data["item"],
								$track_data["track_id"]
								);
							
								printf(
								"Status: %s		<br />
								To arrive: 		<br />
								Destination: 	<br />
								",
								$track_data["status"]
								
								//   Arrival time estimate
								//$track_data[""],
								
								//   General or specific location destination
								//$track_data["receiver_address"]
								
								);
								
							}	
								
							?>
							
              			    <?php
								
							/* If logged in, sure show the Sender/receiver info */
								
							if (isset($track_data))
							{
								echo "
								<div class=\"user-text clear-both\">			
									<h1><br />Sender Information</h1>
									<hr>
								</div>
							
              			    	<div class=\"user-text clear-both\">
								";

								printf(
								"Full name: %s	<br />
								Phone: %s		<br />
								E-mail: %s		<br />
								",
								$track_data["sender_name"],
								$track_data["sender_phone"],
								$track_data["sender_email"]
								);
								echo "</div>
                  					
              			    	<div class=\"user-text clear-both\">			
									<h1><br />Receiver Information</h1>
									<hr>
								</div>
							
              			    <div class=\"user-text clear-both\">
								";
							
							printf(
								"Full name: %s	<br />
								Address: %s		<br />
								Phone: %s 		<br /> 
								E-mail: %s		<br />
								<br />
								Description: %s <br />
								Qty: %s 		<br />
								Price: %s 		<br />
								Weight: %s %s 	<br />
								Order ID: %s 	<br />
							</div>
								",
								$track_data["receiver_name"],
								$track_data["receiver_address"],
								$track_data["receiver_phone"],
								$track_data["receiver_email"],
								$track_data["description"],
								$track_data["quantity"],
								$track_data["price"],
								$track_data["weight"], $track_data["unit"],
								$track_data["order_id"]
								);
							}
							?>
							
								
               		   			<div class="col-xs-12 clear-both">
								</div>
						
               		   		</div>
					<!-- <a href="#" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					</div>
				</section>
			</div>
		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="copyright">
						<li>&copy; Otto Group</li>
						<!-- <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a></li> -->
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/scripts.js"></script>
	</body>
</html>