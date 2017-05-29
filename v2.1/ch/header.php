<?php 
	$nav = array(
		"首页"     => "index.php",
		"登记航班" => "register_flight.php",
		"登记订单" => "register_order.php",
		"查询航班"   => "search.php",
		"运单追踪" => "tracking.php",
		// "FAQ"     => ""
		// member anchor is mandatory and is added later
	);
	if (!isset($active) || empty($active)) {
		$active = "首页";
	}
?>
<header id="header" <?php if(isset($navAlt)){echo "class='alt'";} ?>>
	<h1><strong><a href="../index.php">Otto</a></strong><?php echo (isset($title)? $title:"") ?>&nbsp;<span class="small">ALPHA 2.1</span></h1>
	<nav id="nav">
		<ul>
			<?php 
			foreach ($nav as $name => $url) {
					echo "<li><a href='$url'". ($name==$active ? " class='nav-active'" : "") .">$name</a></li>";
				} 
			if (isset($_SESSION['login_user']) && !empty($_SESSION['login_user']))
				echo "<li><a href=\"member.php\"". ('用户'==$active ? " class='nav-active'" : "") .">".$_SESSION['login_user'];
			else
				echo "<li><a href=\"login.php\"". ('用户'==$active ? " class='nav-active'" : "") .">"."会员登录";
			?>
			</a></li>
		</ul>
	</nav>
</header>
<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>