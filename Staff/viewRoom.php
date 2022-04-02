<?php
	require "header.php";
	require "functions.php";
	require "../Config.php";
	require "../OpenDB.php";
?>


<body>

<div id="nav">
<div id="menu">
<ul>
<li><a href="staff.php"><div id="current">Home</div></a></li>
</ul>
</div>
<!-- end #menu -->

<div id="menu-small">
	<ul>
	<li><?php 
	
	if($userid)  {
		$result=mysql_query("SELECT USER_FNAME from USER WHERE USER_ID=".$userid.";");
		if($result) {
			$arr=mysql_fetch_array($result);
			$username=$arr['USER_FNAME'];
		}
		echo "<a href='../logout.php'> Sign Out" ; 
	}
	else {
		echo "<a href='../login.php'> Login";
	}
	?></a></li>
    <li></li>
    </ul>
</div>
<!-- end #menu-small -->

<div id="page">
	<form method='post' action='addRoomServiceResult.php'>
	<div id="content">
		<div class="post">
			<h1 class="title"><a href="#"><h3><?php echo "Hello, $username!";?></h3></a></h1>
			<p class="meta"> 			
            <!-- for every page to have same width -->
            <div class="entry">
				<h2>Control Panel</h2>
                <?php
					//printtable("staff");
				?>
            </div>   
	 	</div>
	 </div>
	<!-- end #content -->
	<div id="sidebar">
<?php
	$room = $_GET['roomid'];
	$result = mysql_query("SELECT ITEM_ID,ITEM_NAME FROM SERVICE_STAFF,SERVICE_ITEM WHERE SERVICE_STAFF.STAFF_ID='".$_SESSION['userid']."' 
		AND SERVICE_STAFF.SERVICE_ID=SERVICE_ITEM.SERVICE_ID ORDER BY ITEM_NAME");
	echo "<table width='650' height='142' border='0'>
		<tr>
		<th>ITEM</th>
		<th>QTY</th>
		</tr>";
	while($row=mysql_fetch_array($result)){
		$item = $row['ITEM_ID'];
		$qty=0;
		$result2 = mysql_query("SELECT QTY FROM ROOM_SERVICE WHERE ROOM_SERVICE.ITEM_ID='$item' AND ROOM_SERVICE.ROOM_ID='$room'");
		while($row2=mysql_fetch_array($result2)){
			$qty+=$row2['QTY'];
		}
		echo "<tr>
			<td align='center'>".$row['ITEM_NAME']."</td>
			<td align='center'>".$qty."</td>
			<tr>";
	}
	echo "</table>";
	print "<br><a href='staff.php'> Back </a>";
	?>
  	</div>
	</form>
<!-- end #sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->
<?php require "../CloseDB.php"; ?>
<?php
	require "footer.php";
?>
</body>
</html>