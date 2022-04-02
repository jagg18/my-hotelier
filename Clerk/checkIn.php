<?php
	require "header.php";
	require "functions.php";
	require "../Config.php";
	require "../OpenDB.php";
?>
<script type="text/javascript" language="javascript">
	function confirmDelete() {
    	return confirm("Are you sure you wish to check-in this guest?");
	} 
</script>
<body>

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
    <li></li>
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
			$resid=$_GET['id'];
			if(isset($resid)) {
				$result=mysql_query("SELECT * FROM RESERVATION,ROOM_ASSIGNMENT WHERE RESERVATION.RESERVATION_ID='".$resid."' AND ROOM_ASSIGNMENT.RESERVATION_ID=RESERVATION.RESERVATION_ID");
				while($resinfo=mysql_fetch_array($result)) {
					$updateroom=mysql_query("UPDATE ROOM
					SET ROOM_STATUS=1 WHERE ROOM_ID='".$resinfo['ROOM_ID']."'") or die("Checkin failed");
					$updateroom=mysql_query("UPDATE ROOM_ASSIGNMENT
					SET ROOM_ASSIGNMENT_STATUS=3 WHERE ROOM_ASSIGNMENT_ID='".$resinfo['ROOM_ASSIGNMENT_ID']."'") or die("Checkin failed");
				}
				print "Guest successfully checked in.";
				print "<br><a href='checkIn.php'> Back </a>";
			}
			else {
				//pagination
				$result2=mysql_query("SELECT * from ROOM,RESERVATION,ROOM_ASSIGNMENT WHERE ROOM.ROOM_ID=ROOM_ASSIGNMENT.ROOM_ID AND ROOM.ROOM_STATUS=0 AND RESERVATION.RESERVATION_ID=ROOM_ASSIGNMENT.RESERVATION_ID AND ROOM_ASSIGNMENT.ROOM_ASSIGNMENT_STATUS=1 AND RESERVATION.R_CHECKIN=(SELECT CURDATE())");
				$totalitems=mysql_num_rows($result2);
				$limit		= $_GET['limit'];
				$page		= $_GET['page'];
				if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {
					 $limit = 7; //default
				 } 
				
				if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $totalitems)) {
					  $page = 1; //default
				 } 
				 $total_pages 	= ceil($totalitems / $limit);
				 $set_limit 	= $page * $limit - ($limit);
				 $result2=mysql_query("SELECT * from ROOM,RESERVATION,ROOM_ASSIGNMENT WHERE ROOM.ROOM_ID=ROOM_ASSIGNMENT.ROOM_ID AND ROOM.ROOM_STATUS=0 AND RESERVATION.RESERVATION_ID=ROOM_ASSIGNMENT.RESERVATION_ID AND ROOM_ASSIGNMENT.ROOM_ASSIGNMENT_STATUS=1 AND RESERVATION.R_CHECKIN=(SELECT CURDATE()) LIMIT $set_limit, $limit");
		
				echo "<table width= '600' height='100' BORDER=1 RULES=ROWS FRAME=BOX align='left'>";

				echo "<h3>Processed Reservation Requests</h3><br>";
				echo "<tr align='center'>";
				echo "<td width='200'>Request Date</td><td width='200'>Check-in Date</td><td width='200'>Checkout Date</td><td width='200'>Room Type</td><td width='200'>Occupancy</td><td width='200'>No. of Rooms</td></tr>";
				while($row2=mysql_fetch_array($result2)) {
					$result=mysql_query("SELECT * from ROOM_TYPE WHERE TYPE_ID='".$row2['R_ROOM_TYPE']."'");
					$row=mysql_fetch_array($result);
					echo "<tr align='center'>";
					echo "<td>".$row2['R_REQUEST']."</td><td>".$row2['R_CHECKIN']."</td><td>".$row2['R_CHECKOUT']."</td><td>".$row['TYPE_NAME']."</td><td>".$row2['R_OCCUPANCY']."</td><td>".$row2['R_NO_ROOM']."</td><td></td>";
					echo "<td><a href='checkIn.php?id=".$row2['RESERVATION_ID']."' onClick='return confirmDelete();'><img src='../images/door.jpg'></img></a></td>";
					echo "</tr>";
				}
				
				//pagination
				echo "<tr ><td colspan=10 align=center>";
				$prev_page = $page - 1;
				if($prev_page >= 1) { 
  				echo("<b><<</b> <a href=checkIn.php?limit=$limit&page=$prev_page><b>Prev.</b></a>"); 
				}
				for($a = 1; $a <= $total_pages; $a++) {
				   if($a == $page) {
					  echo("<b> $a</b> | "); //no link
				   }
				   else {
				  		echo("  <a href=checkIn.php?limit=$limit&page=$a> $a </a> | ");
				   } 
				} 
				$next_page = $page + 1;
				if($next_page <= $total_pages) {
				   echo("<a href=checkIn.php?limit=$limit&page=$next_page><b>Next</b></a> > >"); 
				} 
				echo "</td></tr>";
				
				echo "</table>";
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