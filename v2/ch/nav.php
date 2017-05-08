<?php 
	$nav = array(
		"首页"     => "",
		"登记航班" => "flight_detail.php",
		"登记订单" => "order_detail.php",
		"航班表"   => "",
		"FAQ"     => ""
		// member anchor is mandatory and is added later
	);
	if (!isset($active) || empty($active)) {
		$active = "首页";
	}
?>

<header id="header">
	<!-- <h1><strong><a href="../index.php">Otto首页</a></strong></h1> -->
	<a href="index.php"><img id="header-logo" src="../img/website/logo-full.png"/></a>
	<nav id="nav">
		<ul>
			<?php 
			foreach ($nav as $name => $url) {
					echo "<li><a href='$url'". ($name==$active ? " class='nav-active'" : "") .">$name</a></li>";
				} 
			if (isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])) {
				$sql = "SELECT avatar FROM usr_info WHERE username='".$_SESSION['login_user']."';";
				$avatarSrc = mysqli_fetch_array(mysqli_query($db, $sql))['avatar'];
				echo "<li><a href=\"member.php\">".$_SESSION['login_user']."<div id='header-avatar' style='background-image:url(\"../img/avatars/".$avatarSrc."\")'></div>";
			} else {
				echo "<li><a href=\"login.php\">"."会员登录"."<div id='header-avatar' style='background-image:url(\"../img/avatars/1.png\")'></div>";
			}
			?>
			</a></li>
		</ul>
	</nav>
</header>
<div id="header-placeholder"></div>
<!-- <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a> -->