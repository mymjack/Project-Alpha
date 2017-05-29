<?php
	require ("utils.php");
	configSession();
	loginRequired('请先登陆再访问航班信息', 'flight_detail.php');

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>登记航班 - Otto带物</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="../assets/css/styles.css" />
	<link rel="icon" type="image/x-icon" href="../../images/favicon-32x32.png" />

	<!-- Select2 datalist files -->
	<link href="../assets/select2/css/select2.css" rel="stylesheet" />
</head>
<body>

	<!-- Navigation -->
	<?php $title="登记航班"; $active="登记航班"; include("nav.php"); ?>

	<section class="wrapper container">

		<header class="major">
			<h2>登记航班</h2>
			<!-- <button class="wide badge hidden" id="edit">修改</button> -->
		</header>
		<div class="divider"></div>

		<div id="noti" class="notify-container">
			<div class="notify-red"></div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-5 vert-divider-right">
				<form id="flyer-info">
					<h3>联系方式</h3>
					<div class="input-with-label">
						<span>姓名/昵称</span>
						<input type="text" name="name" id="name" required class="required" maxlength="80"/>
					</div>
					<div class="input-with-label">
						<span>电话</span>
						<input type="tel" name="cell" id="cell" required class="required" maxlength="25"/>
					</div>
					<div class="input-with-label">
						<span>电子邮箱</span>
						<input type="email" name="email" id="email" maxlength="100"/>  
					</div>
				</form>
			</div>

			<div class="col-xs-12 col-md-7">
				<form id="flight-info">
					<h3>航班信息</h3>
					<div class="input-with-label">
						<span>出发地</span>
						<select name="dep" id="dep" class="dep">
							<option disabled selected value>出发地</option>
							<?php $country="Canada";include("locSpinner.php"); ?>
						</select>
					</div>
					<div class="input-with-label">
						<span>目的地</span>
						<select name="arri" id="arri" class="arri">
							<option disabled selected value>目的地</option>
							<?php $country="China";include("locSpinner.php"); ?>
						</select>
					</div>

					<div class="input-with-label">
						<span>日期</span>
						<input name="datepicker" id="datepicker" placeholder="(yyyy-mm-dd)" type="text" required class="required"/>
					</div>
					<!-- <input name="flightNum" id="flightNum" placeholder="航班号" type="text" required class="required"/> -->

					<div class="input-with-label">
						<span>备注</span>
						<textarea name="description" id="description" placeholder="请输入航班，联系方式，微信号，可用空间，价位等信息。" rows="6" maxlength="1000"></textarea>
					</div>
					<?php echo isset($_GET['id'])? '<input class="hidden" name="id" value="'.$_GET['id'].'"/>' :'' ?>
				</form>
			</div>
		</div>

		<div class="col-xs-12 col-md-3 badge">
			<button class="button special fit" id="submit">提交</button>
		</div>
			
	</section>

	<!-- Footer -->
	<?php include("footer.php"); ?>

	<!-- Scripts -->
	<!-- <script src="../assets/js/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="../assets/js/skel.min.js"></script>
		<script src="../assets/js/util.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="../assets/select2/js/select2.js"></script>
	<script src="../assets/js/scripts.js"></script>
	<script>
		$('#submit').click(function(){submitFlight()});
		$('#edit').click(function(){toggleFlight()});
	</script>
	<script>
	    // var j = jQuery.noConflict();
	    $( function() {
	        $( "#datepicker" ).datepicker({dateFormat: "yy-m-d"});
	    } );
	</script>


</body>
</html>
