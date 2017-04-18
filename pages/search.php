<?php
	$title="航班表";
	include('session.php');

	$start=0;
	$limit=5;

	$page=isset($_GET['page']) ? $_GET['page'] : 1;
	$start=($page-1)*$limit;
	$depName = isset($_GET['dep']) ? $_GET['dep'] : "";
	$arri = isset($_GET['arri']) ? $_GET['arri'] : "";
	$arriName = $arri;

	$sql = "SELECT id, name, departures, arrivals, traveldate, description FROM usr_regis ORDER BY traveldate LIMIT $start, $limit";

	if(isset($_GET['filter'])){
		$filter = $_GET['filter'];
		if($arri!=""){
			$sql = "SELECT id, name, departures, arrivals, traveldate, description FROM usr_regis WHERE arrivals='$arri' ORDER BY $filter DESC LIMIT $start, $limit";
		} else {
			$sql = "SELECT id, name, departures, arrivals, traveldate, description FROM usr_regis ORDER BY $filter DESC LIMIT $start, $limit";
		}
	} else if (!isset($_GET['filter'])) {
		if($arri!=""){
			$sql = "SELECT id, name, departures, arrivals, traveldate, description FROM usr_regis WHERE arrivals='$arri' ORDER BY traveldate LIMIT $start, $limit";
		} else {
			$sql = "SELECT id, name, departures, arrivals, traveldate, description FROM usr_regis ORDER BY traveldate LIMIT $start, $limit";
		}
	}

	$result = mysqli_query($db, $sql);
	$id = array();
	if (! $result) {
	    echo mysqli_error();
	}

	$rows=mysqli_num_rows(mysqli_query($db, "SELECT * FROM usr_regis"));
	$total=ceil($rows/$limit);

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>航班表 - Otto带物</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../assets/css/main-cleaned.css" />
	<!-- Select2 datalist files -->
	<link href="../select2/css/select2.css" rel="stylesheet" />
		
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">	

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
	    var j = jQuery.noConflict();
	    j( function() {
	        j( "#datepicker" ).datepicker({dateFormat: "yy-m-d"});
	    } );
	</script>
</head>
<body>

	<!-- Header -->
	<?php include("header.php") ?>
	<!-- Main -->
	<section id="main" class="wrapper">
		<div class="container">
			
			<header class="major special">
				<h2>搜索结果：</h2>
				<!--<p>Returns Search Results</p>-->
			</header>
			<p></p>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<form class="flight-filter" method="get"> <!-- Implement keep input after submit -->

						<div class="row-nopadding uniform row-vertpadding">
							<div class="col-xs-12 col-sm-5">
								<select name="dep" id="dep">
									<option disababled selected value>- 出发地 -</option>
									<option value="toronto">多伦多 Toronto</option>
									<option value="markham">万锦 Markham</option>
									<option value="mississauga">密市 Mississauga</option>
									<option value="northyork">北约克 North York</option>
								</select>
							</div>

							<div class="col-xs-2 align-center">-></div>

							<div class="col-xs-12 col-sm-5">
								<select name="arri" id="arri">
									<option disabled selected value>- 目的地 -</option>
									<option value="北京">北京</option>
									<option value="上海">上海</option>
									<option value="广东">广东</option>
									<option value="香港">香港</option>
									<option value="重庆">重庆</option>
									<option value="天津">天津</option>
									<option value="澳门">澳门</option>
									<option disabled>- 拼音排序 -</option>
									<option value="安徽">安徽</option>
									<option value="福建">福建</option>
									<option value="贵州">贵州</option>
									<option value="河北">河北</option>
									<option value="黑龙江">黑龙江</option>
									<option value="河南">河南</option>
									<option value="湖北">湖北</option>
									<option value="湖南">湖南</option>
									<option value="海南">海南</option>
									<option value="广西">广西</option>
									<option value="甘肃">甘肃</option>
									<option value="吉林">吉林</option>
									<option value="江苏">江苏</option>
									<option value="江西">江西</option>
									<option value="辽宁">辽宁</option>
									<option value="内蒙古">内蒙古</option>
									<option value="宁夏">宁夏</option>
									<option value="青海">青海</option>
									<option value="陕西">陕西</option>
									<option value="山西">山西</option>
									<option value="山东">山东</option>
									<option value="四川">四川</option>
									<option value="西藏">西藏</option>
									<option value="新疆">新疆</option>
									<option value="云南">云南</option>
									<option value="浙江">浙江</option>
								</select>
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
								//if($result){
								while($row = mysqli_fetch_array($result)) {
									$id = $row['id'];
									$name = $row['name'];
									$dep = $row['departures'];
									$date = $row['traveldate'];
									$arri = $row['arrivals'];
									$des = $row['description'];
									//echo "<a href='single.php?id_key=$id' class='display-content' style='text-decoration:none;'><br>$name<br>$dep -> $arri<br>$des</a>";
									echo "<a href='single.php?id_key=$id' class='display-content' style='text-decoration:none;'>
											<div class='name-date'>
												<div class='col-xs-12 col-sm-7'>
													<strong>$name</strong> - $date
												</div>
												<h4 class='col-xs-12 col-sm-5'>$dep -> $arri</h4>
											</div>
											<div class='oneline-desc'>$des</div></a>";
									}
								//}
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
								$new_link = str_replace_first('&page=' . $page,'', $actual_link);
								if($page>1)
								{
									echo "<a href='$new_link&page=". ($page-1)."' class='button'>PREVIOUS</a>";
								}
								// If page is 1, change page to 2
								if($page!=$total) {
									echo "<a href='$new_link&page=". ($page+1)."' class='button'>NEXT</a>";
								}
								echo "<ul class='page  page-selector'>";
								for($i=1;$i<=$total;$i++)
								{
								if($i==$page) { echo "<li class='current'>".$i."</li>"; }

								//else { echo "<li><a href='?page=".$i."'>".$i."</a></li>"; }
								else { echo "<li><a href='$new_link&page=".$i."'>".$i."</a></li>"; }
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
	<footer id="footer">
		<div class="container">
			<ul class="copyright">
				<li>&copy; Otto Group</li>
			</ul>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/skel.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<script src="../assets/js/main.js"></script>
	<script src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
	<script src="../select2/js/select2.js"></script>
	<script type="text/javascript">
		// Gets the parameter from url by key
		function getParam(key) {
			var regExp = new RegExp("[?&]"+key+"=[^&=]*[^&]");
			return decodeURIComponent((regExp.exec($(location).attr('href'))[0]).split('=')[1]);
		}

		$('#dep option[value="<?php echo $depName; ?>"]').attr('selected','selected');
		$('#dep').select2({
			placeholder: "- 出发地 -",
		  	allowClear: true
		});
		$('#arri option[value="<?php echo $arriName; ?>"]').attr('selected','selected');
		$('#arri').select2({
			placeholder: "- 目的地 -",
		  allowClear: true
		});
	</script>
</body>
</html>