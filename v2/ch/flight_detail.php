<?php
	require ("utils.php");
	configSession();
	// loginRequired();

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Otto带物 - 登记航班</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="../assets/css/styles.css" />

	<!-- Select2 datalist files -->
	<link href="../assets/select2/css/select2.css" rel="stylesheet" />
</head>
<body>

	<!-- Navigation -->
	<?php include("nav.php"); ?>

	<section class="wrapper container">

		<header class="major">
			<h2>登记航班</h2>
		</header>
		<div class="divider"></div>

		<div id="noti" class="notify-container">
			<div class="notify-red"></div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-5 vert-divider-right">
				<form id="flyer-info">
					<h3>联系方式</h3>
					<input type="text" name="name" id="name" placeholder="姓名/昵称" required class="required" maxlength="80"/>
					<input type="tel" name="cell" id="cell" placeholder="电话" required class="required" maxlength="25"/>
					<input type="email" name="email" id="email" placeholder="电子邮箱" maxlength="100"/>  
				</form>
			</div>

			<div class="col-xs-12 col-md-7">
				<form id="flight-info">
					<h3>航班信息</h3>
					<?php include("locSpinnerCA.xml"); ?>
					<?php include("locSpinnerCH.xml"); ?>
					<input name="datepicker" id="datepicker" placeholder="日期 (yyyy-mm-dd)" type="text" required class="required"/>
					<!-- <input name="flightNum" id="flightNum" placeholder="航班号" type="text" required class="required"/> -->
					<textarea name="description" id="description" placeholder="请输入航班，联系方式，微信号，可用空间，价位等信息。" rows="6" maxlength="1000"></textarea>
				</form>
			</div>
		</div>

		<div class="col-xs-12 col-md-3 badge">
			<button class="button special fit" >提交</button>
		</div>
			
	</section>

	<!-- Footer -->
	<?php include("footer.php"); ?>

	<!-- Scripts -->
	<!-- <script src="../assets/js/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="../assets/select2/js/select2.js"></script>
	<script src="../assets/js/scripts.js"></script>
	<script>
	    var j = jQuery.noConflict();
	    j( function() {
	        j( "#datepicker" ).datepicker({dateFormat: "yy-m-d"});
	    } );
	</script>


</body>
</html>
