<?php
	include ("pages/config.php");
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	$sql = "SELECT id, name, departures, arrivals, traveldate, description FROM usr_regis ORDER BY traveldate LIMIT 5";
	$result = mysqli_query($db, $sql);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Otto带物 - 首页</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/otto.css" />

	<!-- Select2 datalist files -->
	<link href="select2/css/select2.css" rel="stylesheet" />
</head>
<body class="landing">

	<!-- Header -->
		<header id="header" class="alt">
			<h1><strong><a href="index.html">Otto</a></strong> 带物</h1>
			<nav id="nav">
				<ul>
					<li><a href="pages/register.php">登记航班</a></li>
					<li><a href="pages/search.php?filter=publishdate">航班表</a></li>
					<li><a href="pages/faq.php">FAQ</a></li>
					<li><a href="pages/welcome.php">
					<?php 
					if (isset($_SESSION['login_user']) && !empty($_SESSION['login_user']))
						echo $_SESSION['login_user'];
					else
						echo "会员登录";
					?></a></li>
				</ul>
			</nav>
		</header>

		<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>

	<!-- Banner -->
		<section id="banner">
			<p>输入您想要带物回国到哪</p>
			<form method="get" action="pages/search.php?page=1">
				<div class="index-search">
					<div class="row 100%">
						<div class="3u 12u$(xsmall)">
							<div class="select-wrapper">
								<select name="dep" id="dep">
									<option disababled selected value></option>
									<option value="toronto">多伦多 Toronto</option>
									<option value="markham">万锦 Markham</option>
									<option value="mississauga">密市 Mississauga</option>
									<option value="northyork">北约克 North York</option>
								</select>
							</div>
						</div>
						
						<div class="3u 12u$(xsmall)">
						<div class="ari-drop">
							<div class="select-wrapper">
								<select name="arri" id="arri">
								<!-- Consider using data base .... Jack -->
									<option disabled selected value></option>
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
						</div>

						<input type="hidden" name="page" value="1">
						</div>
					</div>

				</div>
				<br>
				<div class="index-search-button">

				<ul class="actions">										
					<li><input type="submit" class="button special small" value="搜索"></li>
				</ul>
				</div>
			</form>
		</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<div class="container 75%">
					<div class="row 200%">
						<div class="11u 12u$(medium)">
							<header class="major">
								<h2>最新航班：</h2>
							</header>
						</div>

						<div class="1u$ 12u$(medium)">
							<a href="pages/search.php?filter=publishdate">More</a>
						</div>

						<div class="12u$ 12u$(medium)">
							<div class="list-group-display-content">
								<?php 
								if($result){
									while($row = mysqli_fetch_array($result)) {
										$id = $row['id'];
										$name = $row['name'];
										$dep = $row['departures'];
										$date = $row['traveldate'];
										$arri = $row['arrivals'];
										$des = $row['description'];
										echo "<a href='pages/single.php?id_key=$id' class='display-content' style='text-decoration:none;'><h4>$dep -> $arri</h4>$date<br>$name<br>
										<div class='oneline-desc'>$des</div></a>";
									}
								} else {
									echo "Oops, no data right now. Please come back later.";
								}
							?>
							</div>
							
						</div>


					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Otto提醒</h2>
						<p></p>
					</header>

					<p>留心每一笔交易</p>
			</section>

		<!-- Three -->
			<section id="four" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2>敬请关注!</h2>
						<!-- <p>Feugiat sed lorem ipsum magna</p> -->
					</header>
					<ul class="actions">
						<li><a id="back-to-top" href="#" class="button special big">返回顶部</a></li>
					</ul>
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
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-97380931-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<script src="select2/js/select2.min.js"></script>
		<script type="text/javascript">
			$('#dep').select2({
				placeholder: "- 出发地 -",
			  	allowClear: true
			});
			$('#arri').select2({
				placeholder: "- 目的地 -",
			  allowClear: true
			});
		</script>


</body>
</html>
