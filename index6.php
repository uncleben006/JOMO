<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="flexslider.css" />
	<!--輪播圖的javascript-->
	<script src="http://libs.useso.com/js/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.flexslider-min.js"></script>
	<script type="text/javascript">
		$(function() {
		    $(".flexslider").flexslider({
				slideshowSpeed: 2000, //展示时间间隔ms
				animationSpeed: 400, //滚动时间ms
				touch: true //是否支持触屏滑动
			});
		});

	</script>
	<?php
		include('system/user/linkdb.php');
	?>
<meta charset="utf-8">
</head>
	<body id="body0">
		<header class="header_bg">
			<!--頂部圖案-->
			<div id="top">
				<table border="0">
				<tr>
				 	<td rowspan="2" class="table-bg" width="175px" align="center" valign="center">
								<img src="jomor_html/img/00.png" alt="logo" title="logo" width="90x" height="85x">
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
								<img src="jomor_html/img/01.png" alt="吉祥物圖一" title="二手拍賣" width="110x" height="85x">
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
								<img src="jomor_html/img/02.png" alt="吉祥物圖二" title="店家資訊" width="110x" height="85x">
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
					<a href="system/game/game.php">
								<img src="jomor_html/img/03.png" alt="吉祥物圖三" title="熱門桌遊" width="110x" height="85x">
					</a>
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
								<img src="jomor_html/img/04.png" alt="吉祥物圖四" title="討論版" width="110x" height="85x">
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
								<img src="jomor_html/img/05.png" alt="吉祥物圖五" title="聯絡我們" width="110x" height="85x">
					</td>
					<td class="input0" width="0" align="center" valign="center">
						<a href="#" class="lognin">收藏桌遊</a>
					</td>
					<?php
						if($pri==0){
							?>
							<td class="input0" width="50px" align="center" valign="center">
								<a href="system/user/signup.php" class="lognin">註冊</a>
							</td>
							<td class="input0" width="50px" align="left" valign="center">
								<a href="system/user/login.html" class="lognin">登入</a>
							</td>
							<?php
						}
						else if($pri==1){
							?>
							<td class="input0" width="50px" align="center" valign="center">
								<a href="system/user/userdata.php" class="lognin">會員</a>
							</td>
							<td class="input0" width="50px" align="left" valign="center">
								<a href="system/user/logout.php" class="lognin">登出</a>
							</td>
							<?php
						}
						else{
							?>
							<td class="input0" width="50px" align="center" valign="center">
								<a href="system/user/userdata.php" class="lognin">管理</a>
							</td>
							<td class="input0" width="50px" align="left" valign="center">
								<a href="system/user/logout.php" class="lognin">登出</a>
							</td>
							<?php
						}
					?>
				</tr>
				<!--搜尋列-->
				<tr>
					<td class="table-bg" align="center" valign="center">
						<input type="text" name="search" size="15" style="border-radius:10px;">
					</td>
					<td class="table-bg" valign="center">
							<input class="button" name="submit" type="image" value="ee" src="jomor_html/img/button.png">
					</td>
				</tr>
				</table>
			</div>
	</header>
		<!--導覽列-->
		<nav>
			<div class="navdiv">
			    <ul>
			        <li class="nav1"><a href="sell.html">二手拍賣</a></li>
			        <li class="nav0"><a href="#">店家資訊</a></li>
			        <li class="nav0"><a href="#">熱門桌遊</a></li>
			        <li class="nav0"><a href="#">討論版</a></li>
			        <li class="nav0"><a href="#">聯絡我們</a></li>
			    </ul>
			</div>
		</nav>
			<!--大富翁-->
			<div class="Monopoly">
				<img src="jomor_html/img/11.png" class="img-monopoly">
			</div>
			<!--<div class="monopoly_button01">    測試大富翁按鍵
				<img src="jomor_html/img/button01.png" width="140" height="115">
			</div>
			-->
			<!--輪播圖-->
			<div class="flexslider">
		  		<ul class="slides">
		        	<li><img src="images/s1.jpg" /></li>
		        	<li><img src="images/s2.jpg" /></li>
		            <li><img src="images/s3.jpg" /></li>
		            <li><img src="images/s4.jpg" /></li>
		  		</ul>
	   		</div>
	   		<!--輪播圖右下方圖片-->
	   		<div><img src="jomor_html/img/12.png" class="img_flexslider"></div>
   		<!--公告區-->
   		<div class="news">

   			

   			<table>
   				<tr>
   					<td class="border_bottom"><img class="triangle_css"src="jomor_html/img/triangle.png" /></td>
   					<td width="800px" class="border_bottom">最新公告</td>
   					<td class="border_bottom"><a href="#" class="myButton">MORE</a></td>
   					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   					<td><img class="triangle_css"src="jomor_html/img/triangle.png" /></td>
   					<td width="800px" class="border_bottom">討論版</td>
   					<td><a href="#" class="myButton2">MORE</a></td>
   				</tr>
   				<tr>
   					<td class="date_bg">2016/7/28</td>
   					<td colspan="2" class="rows">好康大放送11111111111111111</td>
   					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   					<td class="date_bg_2">2016/7/28</td>
   					<td colspan="2" class="rows">好康大放送11111111111111111-2</td>
   				</tr>
   				<tr>
   					<td class="date_bg">2016/7/29</td>
   					<td colspan="2" class="rows">好康大放送2222222222222222</td>
   					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   					<td class="date_bg_2">2016/7/28</td>
   					<td colspan="2" class="rows">好康大放送222222222222222-2</td>
   				</tr>
   				<tr>
   					<td class="date_bg">2016/8/08</td>
   					<td colspan="2" class="rows">好康大放送33333333333333333</td>
   					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   					<td class="date_bg_2">2016/7/28</td>
   					<td colspan="2" class="rows">好康大放送333333333333333-2</td>
   				</tr>
   				<tr>
   					<td class="date_bg">2016/8/08</td>
   					<td colspan="2" class="rows">好康大放送44444444444444</td>
   					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   					<td class="date_bg_2">2016/7/28</td>
   					<td colspan="2" class="rows">好康大放送444444444444444-2</td>
   				</tr>
   			</table>
   		</div>
   		<!--底圖-->
   		<div class="footer_bg">
   			<img src="jomor_html/img/footerbg.png" width="1280">
   		</div>
   		<!--底下導覽列-->
   		<footer>
   			<div class="footer_nav">
			    <ul>
			        <li class="fnav0"><a href="sell.html">合作廠商</a></li>
			        <li class="fnav1">│</li>
			        <li class="fnav0"><a href="#">粉絲專頁</a></li>
			        <li class="fnav1">│</li>
			        <li class="fnav0"><a href="#">連絡我們</a></li>
			        <li class="fnav1">│</li>
			        <li class="fnav0"><a href="#">解析度建議1280*760</a></li>
			    </ul>
			</div>
   		</footer>
</body>
</html>