<header id="header">
	<h1><strong><a href="../index.php">Otto首页</a></strong><?php echo ($title?:"") ?></h1>
	<nav id="nav">
		<ul>
			<li><a href="../index.php">首页</a></li>
			<li><a href="register.php">登记航班</a></li>
			<li><a href="search.php?filter=publishdate">航班表</a></li>
			<li><a href="faq.php">FAQ</a></li>
			<li>
			<?php 
			if (isset($_SESSION['login_user']) && !empty($_SESSION['login_user']))
				echo "<a href=\"welcome.php\">".$_SESSION['login_user'];
			else
				echo "<a href=\"usr-login.php\">"."会员登录";
			?>
			</a></li>
		</ul>
	</nav>
</header>
<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>