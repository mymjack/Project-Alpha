<?php
	require ("utils.php");
	configSession();
	loginRequired('请先登陆再查询航班', 'search.php');

	$autoFixMap = false;
	$autoHideNav = true;

	// parameters
	$filter = isset($_GET['filter'])? $_GET['filter'] : 'traveldate';
	$depName = isset($_GET['dep']) ? $_GET['dep'] : "";
	$arri = isset($_GET['arri']) ? $_GET['arri'] : "";
	$arriName = $arri;

	// Calculate start and end.
	$limit=8;
	$page=isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page-1) * $limit;
	$end = $page * $limit;

	// Get total number of valid rows
	$total = 0;
	$result1 = false;
	$sql_total = "SELECT COUNT(id) AS total 
		FROM flights_regis 
		WHERE DATEDIFF(traveldate, CURDATE()) BETWEEN 0 
			AND traveldate ".($depName!=""? "AND departures='$depName'":"").($arri!=""? "AND arrivals='$arri'":"")."";

	$totalRows = mysqli_query($db, $sql_total);
	if ($totalRows) {
		$total = (int) mysqli_fetch_array($totalRows)['total'];
		$total = ceil($total/$limit);

		// Get the data
		$sql1 = "SELECT flights_regis.id, name, description, traveldate, a.chnName AS departures, b.chnName AS arrivals 
			FROM flights_regis, loc_regis AS a, loc_regis AS b 
			WHERE flights_regis.departures=a.id 
				AND flights_regis.arrivals=b.id 
				AND DATEDIFF(traveldate, CURDATE()) BETWEEN 0 
				AND traveldate ".($depName!=""? "AND departures='$depName'":"").($arri!=""? "AND arrivals='$arri'":"")." ORDER BY $filter LIMIT $start, $end";

		$result1 = mysqli_query($db, $sql1);
	}

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
	<link rel="icon" type="image/x-icon" href="../../images/favicon-32x32.png" />
		
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
	<section class="wrapper">
		<div class="container">
			<header class="major special" id="before-map">
				<h2>查询航班</h2>
			</header>
		</div>

		<!-- Map -->
		<section>
			<div id="map-container">
				<div id="map"></div>
			</div>
			<div id="map-placeholder"></div>
		</section>

		<div class="container">
			<?php //echo $sql1; ?>
			<div class="row row-nopadding">

				<div class="col-xs-12 col-sm-5 col-md-4 vert-divider-right-sm">
					<form class="flight-filter" method="get">
						<div class="input-with-label">
							<span>出发地</span>
							<div class="select-wrapper">
								<select name="dep" id="dep" class="dep">
									<option disabled selected value>出发地</option>
									<?php $country="Canada";include("locSpinner.php"); ?>
								</select>
							</div>
          			    </div>
						<div class="input-with-label">
							<span>目的地</span>
							<div class="select-wrapper">
								<select name="arri" id="arri" class="arri">
									<option disabled selected value>目的地</option>
									<?php $country="China";include("locSpinner.php"); ?>
								</select>
							</div>
          			    </div>
						<div class="input-with-label">
							<span>日期</span>
							<input name="datepicker" id="datepicker" type="text" placeholder="- 日期 -" />
          			    </div>
						<div class="input-with-label">
							<span>分类</span>
							<div class="select-wrapper">
								<select name="filter">
									<option disabled selected value>- 分类 -</option>
									<option value="traveldate">出发日期</option>
									<option value="publishdate">发表日期</option>
									<!--<option value="distance">Distance</option>-->
								</select>
							</div>
						</div>
						<button class="special wide-always badge" >更新</button>
					</form>
				</div>

				<div class="col-xs-12 col-sm-7 col-md-8">
					<div class="main-group-display-content">
						<?php 
						 // echo"<span>$sql1</span>";
						if ($result1) {
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
						}
						?>
					</div>
					<ul class='page page-selector'>
						<?php
						// Handling pages
						// Prev button
						if($page > 1) {
							echo "<li><a href='search.php?page=". ($page - 1)."'><</a></li>";
						}
						// Page numbers
						for($i = 1; $i <= $total; $i++) {
							if($i==$page) { 
								echo "<li class='current'>".$i."</li>"; 
							} else { 
								echo "<li><a href='search.php?page=".$i."'>".$i."</a></li>"; 
							}
						}
						// Next button
						if($page < $total) {
							echo "<li><a href='search.php?page=". ($page + 1)."'>></a></li>";
						}

						// Handling pages
						// function str_replace_first($from, $to, $subject){
						//     $from = '/'.preg_quote($from, '/').'/';
						//     return preg_replace($from, $to, $subject, 1);
						// }
						// $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						// $new_link = str_replace_first('?page=' . $page,'', $actual_link);
					?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php include("footer.php"); ?>

	<!-- Scripts -->
	<!-- <script src="../assets/js/jquery.min.js"></script> -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDWSdCxe0Mlwiw7cvZielK6kvlt_naC9E"></script>
	<script src="../assets/js/skel.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<script src="../assets/select2/js/select2.js"></script>
	<script src="../assets/js/scripts.js"></script>
	<script type="text/javascript">
		var mapFixed = false;
		$(document).ready(function(){
			<?php 
			// Auto fix/hide handlers
			if ($autoHideNav) { echo "autoHideNav();"; }
			if ($autoFixMap) {
				echo "$(window).scroll(function(){
					mapTop = $('#before-map').offset().top + $('#before-map').outerHeight();
			        if (window.pageYOffset >= mapTop){
			        	if (!mapFixed) {
				            $('#map-container').addClass('map-fixed');
							mapFixed = true;
						}
			        }
			        else if (mapFixed) {
			            $('#map-container').removeClass('map-fixed');
						mapFixed = false;
			        }
			    });";
			}
			?>

			// initialize spinners and markers when map ready
			google.maps.event.addListenerOnce(map, 'idle', function(){

				$('#dep').change(function(){
					var clicked = $('#dep').find("option[value="+$('#dep').val()+"]");
					setMarker(clicked.attr('lat'), clicked.attr('lng'), 0, clicked.text());
				});
				$('#arri').change(function(){
					var clicked = $('#arri').find("option[value="+$('#arri').val()+"]");
					setMarker(clicked.attr('lat'), clicked.attr('lng'), 1, clicked.text());
				});

				$('select.dep').val('<?php echo $depName; ?>');
				$('select.arri').val('<?php echo $arriName; ?>');
				$('#dep').trigger('change');
				$('#arri').trigger('change');
			});
		});

		// Map related
		var myCenter = new google.maps.LatLng(43.6532, -79.3832);
		var mapOptions = {center: myCenter, zoom: 10, scrollwheel: false};
		var map = new google.maps.Map($("#map")[0], mapOptions);
	</script>
</body>
</html>