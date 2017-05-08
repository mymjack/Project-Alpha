<?php
	require ("utils.php");
	configSession();
	// loginRequired();
	$_SESSION['login_user'] = 'mymjack';

	// User information
	$sql = "SELECT name, cell, email, avatar FROM usr_info WHERE username='".$_SESSION['login_user']."';";
	$row = mysqli_fetch_array(mysqli_query($db, $sql));
	$name = $row['name'] ?: $_SESSION['login_user'];

	// Registered flights
	$sqlf = "SELECT id, name, departures, arrivals, traveldate, description FROM usr_regis WHERE username='".$_SESSION['login_user']."' ORDER BY traveldate;";
	$resultf = mysqli_query($db, $sqlf);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Otto带物 - 用户中心</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
	<link rel="stylesheet" href="../assets/css/styles.css" />

	<!-- Select2 datalist files -->
	<!-- <link href="../assets/select2/css/select2.css" rel="stylesheet" /> -->
</head>
<body>

	<!-- Navigation -->
	<?php include("nav.php"); ?>

	<section class="wrapper container">

		<header class="major">
			<h2><?php echo $_SESSION['login_user']; ?></h2>
		</header>
		<div class="divider"></div>

		<div id="noti" class="notify-container">
			<div class="notify-yellow"></div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-5 col-md-4 vert-divider-right">
				<header class="minor">
					<h3>基本信息</h3>
					<div id="user-info-btn" class="badge">
						<button id="save-info" class="small hidden special">保存</button>
						<button id="edit-info" class="small">编辑</button>
					</div>
				</header>

				<form id="user-info" class="display">
					<div id='large-avatar' style='background-image:url("../img/avatars/<?php echo $row['avatar']; ?>")'>
						<div class="drop-zone" ></div>
						<input type="file" name="upl" />
					</div>
					<div class="input-with-label">
						<span>姓名/昵称</span>
						<input type="text" name="name" id="name" required class="required" maxlength="80" value="<?php echo $row['name']; ?>" />
					</div>
					<div class="input-with-label">
						<span>电话</span>
						<input type="tel" name="cell" id="cell" required class="required" maxlength="25" value="<?php echo $row['cell']; ?>"/>
					</div>
					<div class="input-with-label">
						<span>电子邮箱</span>
						<input type="email" name="email" id="email" maxlength="100" value="<?php echo $row['email']; ?>"/>  
					</div>
				</form>
				<a href="server/logout.php" class="button alt fit">注销</a>
			</div>

			<div class="col-xs-12 col-sm-7 col-md-8">
				<div id="flight-info">
					<h3>登记的航班</h3>
				</div>
			</div>
		</div>
			
	</section>

	<!-- Footer -->
	<?php include("footer.php"); ?>

	<!-- Scripts -->
	<!-- <script src="../assets/js/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
	<!-- <script src="../assets/select2/js/select2.js"></script> -->
	<script src="../assets/js/scripts.js"></script>
<!-- 	<script>
	    var j = jQuery.noConflict();
	    j( function() {
	        j( "#datepicker" ).datepicker({dateFormat: "yy-m-d"});
	    } );
	</script> -->

	<!-- jQuery File Upload Dependencies -->
	<script src="../assets/fileUploader/js/jquery.ui.widget.js"></script>
	<script src="../assets/fileUploader/js/jquery.iframe-transport.js"></script>
	<script src="../assets/fileUploader/js/jquery.fileupload.js"></script>

	<script type="text/javascript">
		$('#edit-info').click(function(){toggleInfo()});
		$('#save-info').click(function(){saveInfo()});
		$('form').each(function(){formDisplayAdjust($(this))});
	</script>

</body>
</html>
