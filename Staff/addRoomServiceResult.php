<?php
	require "header.php";
	require "functions.php";
	require "../Config.php";
	require "../OpenDB.php";
?>

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
    </ul>
</div>
<!-- end #menu-small -->

<div id="page">
	<div id="content">
		<div class="post">
			<h1 class="title"><a href="#"><h3><?php echo "Hello, $username!";?></h3></a></h1>
			<p class="meta"> 			
            <!-- for every page to have same width -->
            <div class="entry">
				<h2>Control Panel</h2>
                <?php
					printtable("staff");
				?>
            </div>
   
            	
		</div>
	 </div>
	<!-- end #content -->
	<div id="sidebar">
 <?php
	if(isset($_POST['submit'])) {
	
	$checkbox=$_POST['room'];
	$item=$_POST['item'];
	$staff=$_POST['staff'];
	$qty=$_POST['qty'];
	for($i=0;$i<count($checkbox);$i++){
		$room = $checkbox[$i];
		$result = mysql_query("INSERT INTO ROOM_SERVICE(ROOM_ID,ITEM_ID,STAFF_ID,QTY) 
			VALUES('".$room."','$item','$staff','$qty')");
		if($result){
			echo $room."<br>";
			print "$qty item(s) with id# $item has been successfully added to the room with id# $room.<br>";
		}
		else{
			print "An error occured while adding $qty item(s) with id# $item to the room with id# $room.<br>";
		}
	}
	print "<br><a href='staff.php'> Back </a>";
	}
	?>
  </div>
<!-- end #sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->
<?php
	require "footer.php";
	require "../CloseDB.php";
?>
</body>
</html>
