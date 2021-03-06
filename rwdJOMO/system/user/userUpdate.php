<!DOCTYPE html>
<html>
<head>
	<title>桌遊資訊平台 - 桌末狂歡 JOMOR</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<meta charset="utf-8">
	<link rel="icon" href="../../jomor_html/img/jomorparty_logo.png" type="image/ico" />
</head>
	<body id="body0">
		<?php
			include('../../include/link.php');
			include('../../include/userHeader.php');
			session_start();
			$no = $_SESSION["no"];	
			$pri = $_SESSION["pri"];
			$account = $_SESSION["account"];
			$pass = $_SESSION["pass"];
			$name = $_SESSION["name"];
			$email = $_SESSION["email"];
			$introduction = $_SESSION["introduction"];
			$photo = $_SESSION["photo"];

			$setSQL = 'INSERT INTO `user`(`no`, `pri`, `account`, `password`, `name`, `email`, `introduction`,`photo`) VALUES ("'.$no.'","'.$pri.'","'.$account.'","'.$pass.'","'.$name.'","'.$email.'","'.$introduction.'","'.$photo.'")';
			mysql_query("SET NAMES'UTF8'");
			mysql_query("SET CHARACTER SET UTF8");
			mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
			mysql_query($setSQL);
		?>
		<section>
			<div class="receive_div">
				<div class="receive_bg">
					<div class="receive_white">
						<div class="receive_p_div">
							<h1 class="receive_p">快完成了！</h1>
						</div>
						<hr color="#A0920D" size="3" width="95%">
						<div class="receive_p3">
							<p>您已完成第一階段的註冊，</p>
							<p>請去<font style="color: #EA6363">信箱收信驗證</font>完成帳號開通。</p>
						</div>
						<div class="receive_text_img"><!--注意圖-->
							<img src="../../jomor_html/img/attention.png" class="attention_img">
						</div>
						<div class="receive_p3">
							<p>若未完成註冊將只有一個空頭帳號，</p>
							<p>雖無法使用揪團與留言，但仍有剛填寫的這些基本資料，</p>
							<p>信箱驗證後將會幫您開通更多功能。</p>
						</div>
						<div class="receive_bt_div">
							<a href="../../index.php" class="receive_bt">確認</a>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer_css_foget">
				<div class="footer_white"></div>
				<div class="index_yellow"> 
					<div class="index_yellow_pp">｜桌遊資訊平台｜桌末狂歡｜</div>
				</div>
				<div class="footer_bt_div">
					<span class="footer_span">
						<a href="https://www.facebook.com/jomor.party/?fref=nf" class="footer_a"  target=_blank>
							<span class="footer_hover">
								<img src="../../jomor_html/img/fb2.png" class="index_footer_bt">
								<img src="../../jomor_html/img/fb.png" class="index_footer_bt">
							</span>
						</a>
					</span>
					<span class="footer_span">
						<a href="mailto:ics.jomorparty@gmail.com" class="footer_a">
							<span class="footer_hover">
								<img src="../../jomor_html/img/mailus2.png" class="index_footer_bt">
								<img src="../../jomor_html/img/mailus.png" class="index_footer_bt">
							</span>
						</a>
					</span>
					<span class="footer_span">
						<a href="http://www.swanpanasia.com/" class="footer_a" target=_blank>
							<span class="footer_hover">
								<img src="../../jomor_html/img/heaven2.png" class="index_footer_bt">
								<img src="../../jomor_html/img/heaven.png" class="index_footer_bt">
							</span>
						</a>
					</span>
				</div>
		</footer>
		</section>
	</body>