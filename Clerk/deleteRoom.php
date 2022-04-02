<?php
	require "header.php";
	require "functions.php";
	require "../Config.php";
	require "../OpenDB.php";
?>

<div id="nav">
<div id="menu">
<ul>
<li><a href="clerk.php"><div id="current">Home</div></a></li>
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
					printtable("clerk");
				?>
            </div>
   
            	
		</div>
	 </div>
	<!-- end #content -->
	<div id="sidebar">
 <?php
	if(isset($_GET['id'])) {
		$id=$_GET['id'];
		$result2=mysql_query("SELECT * FROM RESERVATION,ROOM_ASSIGNMENT WHERE RESERVATION.RESERVATION_ID='".$id."' AND RESERVATION.RESERVATION_ID=ROOM_ASSIGNMENT.RESERVATION_ID");
		//if processed reservation
		while($row=mysql_fetch_array($result2)) {		
			//$result3=mysql_query("SELECT * FROM ROOM,ROOM_TYPE WHERE ROOM.ROOM_ID='".$row['ROOM_ID']."' AND ROOM_TYPE.TYPE_ID=ROOM.ROOM_TYPE");
			//$row3=mysql_fetch_array($result3);
			//$cost=$row3['TYPE_RATE']*$row['R_NO_ROOM'];
			//$updateroom=mysql_query("UPDATE ROOM SET ROOM_STATUS='0' WHERE ROOM_ID='".$row['ROOM_ID']."'");
			
			$delresult = mysql_query("DELETE from ROOM_ASSIGNMENT WHERE ROOM_ASSIGNMENT_ID='".$row['ROOM_ASSIGNMENT_ID']."'") or die("Cancellation failed.");
			//$delresult = mysql_query("DELETE from RESERVATION WHERE ROOM_ASSIGNMENT_ID='".$id."'") or die("Cancellation failed.");
			//$delresult = mysql_query("UPDATE ROOM_ASSIGNMENT SET ROOM_ASSIGNMENT_STATUS='0', ROOM_ASSIGNMENT_TOTAL_COST='".$cost."' WHERE ROOM_ASSIGNMENT_ID='".$row['ROOM_ASSIGNMENT_ID']."'") or die("Cancellation failed.");
		}
			$delresult = mysql_query("DELETE from RESERVATION WHERE RESERVATION_ID='".$id."'") or die("Cancellation failed.");
			echo "You have successfully cancelled your reservation.";
			print "<a href='viewReservations.php'> Back </a>";
	}
	else {
		echo "Reservation cannot be cancelled.";
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
