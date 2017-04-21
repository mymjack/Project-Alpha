<?php
	// check if logged in, if not redirect
	$title="登记航班";
	include('session.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>登记航班 - Otto带物</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main-cleaned.css" />	
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">	
		<!-- Select2 datalist files -->
		<link href="../select2/css/select2.css" rel="stylesheet" />

		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
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
		<div class="checkout-page">
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major special">
						<h2>登记航班</h2>
					</header>

					<form method="post" action="register_form.php">
						<div class="row uniform row-vertpadding">

								<!-- Line 1 -->
							<div class="col-xs-4 col-sm-2 align-right required-red-star">联系人:</div>
							<div class="col-xs-8 col-sm-5">
								<input type="text" name="name" id="name" placeholder="" required/>
							</div>

							<div class="col-xs-4 col-sm-2 clear-both align-right required-red-star">出发地 / 目的地:</div>
							<div class="col-xs-8 col-sm-5 row-nopadding">
								<div class="col-xs-12 col-sm-6">
									<select name="dep" id="dep" required>
										<option disababled selected value>- 出发地 -</option>
										<option value="toronto">多伦多 Toronto</option>
										<option value="markham">万锦 Markham</option>
										<option value="mississauga">密市 Mississauga</option>
										<option value="northyork">北约克 North York</option>
									</select>
								</div>

								<!-- <div class="0.5u 12$(xsmall)"><p>-&gt;</p></div> -->
								<div class="col-xs-12 col-sm-6">
									<select name="ari" id="arri" required>
										<option disabled selected value>- 目的地 -</option>
										<option value="北京">北京 Beijing</option>
										<option value="上海">上海 Shanghai</option>
										<option value="广州">广州 Guangzhou</option>
										<option value="深圳">深圳 Shenzhen</option>
										<option value="香港">香港 Hong Kong</option>
										<option value="重庆">重庆 Chongqin</option>
										<option value="天津">天津 Tianjin</option>
										<option value="澳门">澳门 Macau</option>
										<option disabled>- 拼音排序 -</option>
										<option value="安徽">安徽 Anhui</option>
										<option value="福建">福建 Fujian</option>
										<option value="贵州">贵州 Guizhou</option>
										<option value="河北">河北 Hebei</option>
										<option value="黑龙江">黑龙江 Heilongjiang</option>
										<option value="河南">河南 Henan</option>
										<option value="湖北">湖北 Hubei</option>
										<option value="湖南">湖南 Hunan</option>
										<option value="海南">海南 Hainan</option>
										<option value="广东">广东 Guangdong</option>
										<option value="广西">广西 Guangxi</option>
										<option value="甘肃">甘肃 Gansu</option>
										<option value="吉林">吉林 Jilin</option>
										<option value="江苏">江苏 Jiangsu</option>
										<option value="江西">江西 Jiangxi</option>
										<option value="辽宁">辽宁 Liaoning</option>
										<option value="内蒙古">内蒙古 Neimenggu</option>
										<option value="宁夏">宁夏 Ningxia</option>
										<option value="青海">青海 Qinghai</option>
										<option value="陕西">陕西 Shanxi</option>
										<option value="山西">山西 Shanxi</option>
										<option value="山东">山东 Shandong</option>
										<option value="四川">四川 Sichuan</option>
										<option value="西藏">西藏 Xizang</option>
										<option value="新疆">新疆 Xinjiang</option>
										<option value="云南">云南 Yunnan</option>
										<option value="浙江">浙江 Zhejiang</option>
									</select>
								</div>
							</div>

							<!-- Line 2 -->
							<div class="col-xs-4 col-sm-2 align-right required-red-star">日期:</div>
							
							<div class="col-xs-8 col-sm-3">
								<div class="select-wrapper">
									<input name="datepicker" id="datepicker" type="text" required/>
								</div>
							</div>

							<div class="col-xs-4 col-sm-2 align-right clear-both">电话:</div>

							<div class="col-xs-8 col-sm-4">
								<input type="text" name="cell" id="cell" placeholder="" />
							</div>

							<div class="col-xs-4 col-sm-2 align-right">邮箱:</div>

							<div class="col-xs-8 col-sm-4">
								<input type="text" name="email" id="email" placeholder="" />
							</div>


							<div class="col-xs-4 col-sm-2 align-right">介绍:</div>
							<div class="col-xs-12 col-sm-10">
								<textarea name="description" id="description" placeholder="请输入航班，联系方式，微信号，可用空间，价位等信息。" rows="6"></textarea>
							</div>

							<div class="col-xs-12 col-sm-2"></div>
							<div class="col-xs-6 col-sm-3">
							<input class="button special wide" type="submit" value="提交">
							</div>
						</div>
						<!-- <div class="col-xs-6 col-sm-3">
						<a href="../index.php"><button>回到首页</button></a>
						</div> -->

						<!--
						<div class="checkout-button">
							<div class="row uniform 50%">
								<div class="12u$">
									<ul class="actions">
										<li><input class="button special" type="submit"></li>
									</ul>
								</div>
							</div>
						</div> -->
					</form>


				</div>
			</section>
		</div>

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
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-97380931-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<script src="../select2/js/select2.js"></script>
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
