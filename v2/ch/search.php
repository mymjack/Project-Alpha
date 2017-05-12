<?php
	require ("utils.php");
	configSession();
	loginRequired('请先登陆再查询航班', 'search.php');

	$start=0;
	$limit=8;

	$page=isset($_GET['page']) ? $_GET['page'] : 1;
	$start=($page-1)*$limit;
	$depName = isset($_GET['dep']) ? $_GET['dep'] : "";
	$arri = isset($_GET['arri']) ? $_GET['arri'] : "";
	$arriName = $arri;

	$filter = isset($_GET['filter'])? $_GET['filter'] : 'traveldate';

	$sql1 = "SELECT id, name, departures, arrivals, traveldate, description FROM usr_regis ".($arri!=""? "WHERE arrivals='$arri'":"")." ORDER BY $filter LIMIT $start, $limit";
	$result1 = mysqli_query($db, $sql1);

	$id = array();
	if (! $result1) 
	    echo mysqli_error();

	$rows=mysqli_num_rows(mysqli_query($db, "SELECT * FROM usr_regis"));
	$total=ceil($rows/$limit);

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>查询航班 - Otto带物</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../assets/css/styles.css" />
	<!-- Select2 datalist files -->
	<link href="../assets/select2/css/select2.css" rel="stylesheet" />
		
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">	

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
	    // var j = jQuery.noConflict();
	    $( function() {
	        $( "#datepicker" ).datepicker({dateFormat: "yy-m-d"});
	    } );
	</script>
</head>
<body>

	<!-- Header -->
	<?php $title="查询航班"; $active="查询航班"; include("nav.php"); ?>
	<!-- Main -->
	<section id="main" class="wrapper">
		<div class="container">
			
			<header class="major special">
				<h2>查询航班</h2>
				<!--<p>Returns Search Results</p>-->
			</header>
			<p></p>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<form class="flight-filter" method="get"> <!-- Implement keep input after submit -->

						<div class="row-nopadding uniform row-vertpadding">
							<div class="col-xs-12 col-sm-5">
								<?php include("locSpinnerCA.xml"); ?>
							</div>

							<div class="col-xs-2 align-center">-></div>

							<div class="col-xs-12 col-sm-5">
								<?php include("locSpinnerCH.xml"); ?>
							</div>
							
							<div class="col-xs-12 col-sm-4">
								<div class="select-wrapper">
									<input name="datepicker" id="datepicker" type="text" placeholder="- 日期 -" />
								</div>
							</div>
									
							<span class="col-xs-12 col-sm-1"></span>
							<div class="col-xs-12 col-sm-3">
								<div class="select-wrapper">
									<select name="filter">
										<option disabled selected value>- 分类 -</option>
										<option value="traveldate">出发日期</option>
										<option value="publishdate">发表日期</option>
										<!--<option value="distance">Distance</option>-->
									</select>
								</div>
							</div>
							<input type="hidden" name="page" value="1">

							<div class="col-xs-2 col-sm-4 align-right">
								<button class="special wide-always" >更新</button>
							</div>
								
						</div>
					</form>

					<div class="clear-both">
					<br>
						<div class="main-group-display-content">
							<?php 
							 // echo"<span>$sql1</span>";
								while($row = mysqli_fetch_array($result1)) {
									$id = $row['id'];
									$name = $row['name'];
									$dep = $row['departures'];
									$date = $row['traveldate'];
									$arri = $row['arrivals'];
									$des = $row['description'];
									echo "<a href='flight.php?id=$id' class='display-content' style='text-decoration:none;'>
											<div class='name-date'>
												<div class='col-xs-12 col-sm-7'>
													<strong>$name</strong> - $date
												</div>
												<div class='col-xs-12 col-sm-5 align-right'>
													<strong>$dep -> $arri</strong>
												</div>
											</div>
											<div class='oneline-desc'>$des</div></a>";
								}
							?>
						</div>
					</div>

							<?php 
								// Handling pages
								function str_replace_first($from, $to, $subject){
								    $from = '/'.preg_quote($from, '/').'/';

								    return preg_replace($from, $to, $subject, 1);
								}
								$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
								$new_link = str_replace_first('?page=' . $page,'', $actual_link);
								if($page>1)
								{
									echo "<a href='$new_link?page=". ($page-1)."' class='button'>PREVIOUS</a>";
								}
								// If page is 1, change page to 2
								if($page!=$total) {
									echo "<a href='$new_link?page=". ($page+1)."' class='button'>NEXT</a>";
								}
								echo "<ul class='page  page-selector'>";
								for($i=1;$i<=$total;$i++)
								{
								if($i==$page) { echo "<li class='current'>".$i."</li>"; }

								//else { echo "<li><a href='?page=".$i."'>".$i."</a></li>"; }
								else { echo "<li><a href='$new_link?page=".$i."'>".$i."</a></li>"; }
								}
								echo "</ul>";
							?>

				</div>

			<!-- Right Col -->	
			<div class="col-xs-12 col-md-6">
				<!-- Map -->
				<div id="map" style="width:100%;height:800px;"></div>
					<script>
						function myMap() {
						  var myCenter = new google.maps.LatLng(43.6532, -79.3832);
						  var mapCanvas = document.getElementById("map");
						  var mapOptions = {center: myCenter, zoom: 10};
						  var map = new google.maps.Map(mapCanvas, mapOptions);
						  var marker = new google.maps.Marker({position:myCenter});
						  marker.setMap(map);

						  // New marker
						  var newPoint = new google.maps.LatLng(43.75,-79.21);
						  var marker2 = new google.maps.Marker({position:newPoint, 
						  	icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=12|FF0000|000000',});
						  marker2.setMap(map);
						}

						var myLatlng = new google.maps.LatLng(44.75,-79.21);  
						var marker3 = new google.maps.Marker({  
					        position: myLatlng,   
					        map: map,  
					        icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=123123|FF0000|000000'  
					    })
					    marker3.setMap(map);
					</script>

					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDWSdCxe0Mlwiw7cvZielK6kvlt_naC9E&callback=myMap"></script>
			</div>
		</section>

	<!-- Footer -->
	<?php include("footer.php"); ?>

	<!-- Scripts -->
	<!-- <script src="../assets/js/jquery.min.js"></script> -->
	<script type="text/javascript">
		$('select.dep option[value="<?php echo $depName; ?>"]').attr('selected','selected');
		$('select.arri option[value="<?php echo $arriName; ?>"]').attr('selected','selected');
	</script>
		<script src="../assets/js/skel.min.js"></script>
		<script src="../assets/js/util.js"></script>
	<script src="../assets/select2/js/select2.js"></script>
	<script src="../assets/js/scripts.js"></script>
</body>
</html>