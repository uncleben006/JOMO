<?php
include('link.php');
session_start();
$no=$_GET['no'];

//要是 DB room 不存在，則建立之
$mysql = "
CREATE TABLE IF NOT EXISTS `room".$no."`(
	`people` int(2) NOT NULL,
	`name` text NOT NULL,
	`account` varchar(20) NOT NULL,
	`photo` varchar(100) NOT NULL,
	PRIMARY KEY(`account`)
)DEFAULT CHARSET = UTF8;";
mysql_query($mysql);

//抓取 DB room 裡指定no的資料並指定至相應變數
$mysql1 = "SELECT * FROM `room` WHERE `no` ='$no'";
mysql_query("SET NAMES'UTF8'");
mysql_query("SET CHARACTER SET UTF8");
mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
$result1 = mysql_query($mysql1);
$row1 = mysql_fetch_assoc($result1);
$room = $row1['room'];
$host = $row1['host'];
$store = $row1['store'];

$x = $row1['x'];
$y = $row1['y'];

echo $x;
echo $y;

$game = $row1['game'];
$date = $row1['date'];
$time = $row1['time'];
$people = $row1['people'];
$spend = $row1['spend'];
$remark = $row1['remark'];

//抓取 DB room 裡的列數，指定給$number
$mysql2 = "SELECT * FROM `room".$no."`";
$result2 = mysql_query($mysql2);
$number = mysql_num_rows($result2);

//把房主資料insert入DB room，先select from user，再insert into DB room
$selectHost = "SELECT * FROM `user` WHERE `account` = '".$host."'";
$Host = mysql_query($selectHost);
$select = mysql_fetch_assoc($Host);

$insertHost = 'INSERT INTO `room'.$no.'`(`people`, `name`, `account`, `photo`) VALUES ("'.$people.'","'.$select['name'].'","'.$select['account'].'","'.$select['photo'].'")';
mysql_query($insertHost);

//如果按刪除房間，就刪除 table room 跟 DB room
if(isset($_POST['delete'])){
	$setSQL1 = "DELETE FROM `room` WHERE `no`=".$no."";
	mysql_query($setSQL1);
	$setSQL2 = "DROP TABLE room".$no."";
	mysql_query($setSQL2);
	$setSQL3 = "DELETE FROM `chat` WHERE `no`=".$no."";
	mysql_query($setSQL3);
	//echo $setSQL1."<br>";
	//echo $setSQL2."<br>";
	//echo $setSQL3;
	header("Location:group.php");
}

//如果按了刪除此人，就刪除DB room 裡面那人的資料
if(isset($_POST['deletePerson'])){
	$deletePerson = "DELETE FROM `room".$no."` WHERE `account`=".$_POST['deletePerson']."";
	mysql_query($deletePerson);
	header("Location:showRoomData.php?no=".$no);

}


//如果按加入房間，先判斷有無登入，再判斷房間人數是否足夠，最後才把session資料insert進 DB room
if(isset($_POST['join'])){
	if(empty($_SESSION['account'])){//判斷有無登入
		header("Location:../user/block.php");
	}
	else if($number>=$people){//判斷房間人數是否足夠
		?> 
		<script type="text/javascript">
			alert("抱歉人數已滿~~去加別房啦~");
		</script>
		<?php
	}
	else{//把session資料insert進 DB room
		$uno = $_SESSION['no'];
		$account = $_SESSION['account'];
		$name = $_SESSION['name'];
		$email = $_SESSION['email'];
		$introductio = $_SESSION['introduction'];
		$photo = $_SESSION['photo'];


		$mysql3 = 'INSERT INTO `room'.$no.'`(`people`, `name`, `account`, `photo`) VALUES ("'.$people.'","'.$name.'","'.$account.'","'.$photo.'")';
		mysql_query("SET NAMES'UTF8'");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
		mysql_query($mysql3);
		header("Location:showRoomData.php?no=".$no);//避免重新整理時，重複傳送表單`,故需導回原畫面。
	}
	
}

//如果按OK，則把session名字、房名、留言記錄至 DB ，
if (isset($_POST['OK'])){ 
	error_reporting(0); 
    $name=$_SESSION['name'];
    $chat=$_POST['chat'];     
    $sql1="INSERT INTO `chat`(`no`,`name`,`chat`)values('$no','$name','$chat')";
    mysql_query("SET NAMES'UTF8'");
	mysql_query("SET CHARACTER SET UTF8");
	mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
    mysql_query($sql1);
    header("Location:showRoomData.php?no=".$no);//避免重新整理時，重複傳送表單`,故需導回原畫面。
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>showRoomData</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="group.css">
	<script>
	//定位google地圖，宣告變數並把php資料指定給它
	var x = <?php echo $x; ?>;
	var y = <?php echo $y; ?>;
	function myMap() {
	  var myCenter = new google.maps.LatLng(x,y);
	  var mapCanvas = document.getElementById("map");
	  var mapOptions = {center: myCenter, zoom: 10};
	  var map = new google.maps.Map(mapCanvas, mapOptions);
	  var marker = new google.maps.Marker({position:myCenter});
	  marker.setMap(map);

	  // do the function when clicking on marker
	  google.maps.event.addListener(marker,'click',function() {
	    map.setCenter(marker.getPosition());
	  });
	}
	</script>

	
</head>
<body>
	<div class="frame">
		
		<!--******************房間*******************-->	
		<h1>這是<?php echo $no."號房間"  ?></h1>
		<div style="float:right">
			<a href="group.php">
				<button>回揪團頁</button>
			</a>
		</div>
		<form method="post">
			<div class="room2">
					<div class="room_banner">
						<div class="room_banner1"><?php echo $row1['no'] ?></div>
						<div class="room_banner2"><?php echo $row1['room'] ?></div>
					</div>
					<div class="room_padding">
						<div class="room_content">

							<!--***************google地圖****************-->
							<div id="map" style="width:40%;height:259px;float:right;"></div>
							<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkdUEj22vge5aavRXejbNNk8sn6HWEmO8&callback=myMap"></script>

							<!--***************房間資訊******************-->
							<div class="room_title">
								<div class="room_title1">房主</div>
								<div class="room_title3"><?php echo $host ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">日期</div>
								<div class="room_title3"><?php echo $row1['date'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">時間</div>
								<div class="room_title3"><?php echo $row1['time'] ?></div>
							</div>
							<div class="room_title">
									<div class="room_title1">地點</div>
								<div class="room_title3"><?php echo $row1['store'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">人數</div>
								<div class="room_title3"><?php echo $row1['people'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">遊戲</div>
								<div class="room_title3"><?php echo $row1['game'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">計費方式</div>
								<div class="room_title3"><?php echo $row1['spend'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">備註</div>
								<div class="room_title3"><?php echo $row1['remark'] ?></div>
							</div>

							<!--***************留言板****************-->
							<?php
							error_reporting(0); 
						    $mysql4 = "SELECT * FROM `chat` WHERE `no`=".$no."";
						    $result4 = mysql_query($mysql4);
						    $mysql5 = "SELECT * FROM `room".$no."` WHERE `account`=".$_SESSION['account']."";
						    $result5 = mysql_query($mysql5);
						    $row5 = mysql_num_rows($result5);
						   	if($row5==0){
						   		?>
						    	<div style="width:100%;height:200px;background-color:#dad2d2;">
						    		<div style="text-align:center;padding-top:80px;">你要加入這間房間才能使用聊天室</div>
					    		</div>
					    		<?php
						   	}
						   	else{
						   		?>
							    <div style="width:100%;height:250px;background-color:#fff;overflow:scroll;">
								<?php
							    while($row4=mysql_fetch_row($result4)){
							        echo "$row4[1]"."說：&nbsp"."$row4[2]<br>";
							    }
							    ?>
							    </div>
							    <?php
						   	}	
						   	?>  

							<!--***************留言欄***************-->													    
							<form method="post">
								<input type="text" name="chat" style="width:95%;display:inline-block">
								<input type="submit" name="OK" value="OK">								
							</form>

						</div>
					</div>	
					<div class="room_footer">
						<div class="room_footer_redline"></div>
						<div class="room_footer1">
							<button class="room_footer_bottom" type="submit" name="join">加入房間</button>
							<?php if(isset($_SESSION['account'])&&$_SESSION['account']==$host){
								?>
								<button class="room_footer_bottom" type="submit" name="delete">刪除房間</button>
								<?php
							}
							?>
						</div>
							
							

					</div>						
			</div>
		</form>

		<!--****************成員資料***************-->
		<div>
			<h2>成員</h2>
		</div>
		<?php
			$mysql3 = "SELECT * FROM `room".$no."`";
			$result3 = mysql_query($mysql3);

			while ($row3 = mysql_fetch_assoc($result3)) {
				?>
				<div class="member">
					<div class="room_banner">
					<?php
					if($host==$row3['account']){
						echo '<div class="member_banner1">房主</div>';
					}
					
					else{			
						echo '<div class="member_banner1">帳號</div>';
					}
					?>	
						<div class="member_banner2"><?php echo $row3['account'] ?></div>
					</div>
					<div class="room_padding">
						<div class="room_content">
							<div class="member_title">
								<div class="member_title2">
									<img src="../user/photo/<?php echo $row3['photo'] ?>" width="180px" />
								</div>
							</div>
							<div class="room_title">
								<div class="room_title1">暱稱</div>
								<div class="room_title4"><?php echo $row3['name'] ?></div>
							</div>
						</div>
					</div>	
					<div class="room_footer">
						<div class="room_footer_redline"></div>
						<div class="room_footer1">
							<a style="display:inline-block" href="userData.php?account=<?php echo $row3['account']?>">
								<button class="room_footer_bottom" type="submit" name="see">查看此人</button>
							</a>
							<form method="post" style="display:inline-block">
								<?php if(isset($_SESSION['account'])&&$_SESSION['account']==$host&&$row3['account']!=$host){
									?>
									<button class="room_footer_bottom" type="submit" name="deletePerson" value="<?php echo $row3['account'] ?>">刪除此人</button>
									<?php
								}
								?>
							</form>								
						</div>
							
					</div>				
				</div>
				<?php
			}
			?>
	</div>
	
</body>
</html>
