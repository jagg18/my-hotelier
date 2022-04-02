<?php
	require "header.php";
	require "functions.php";
	require "../Config.php";
	require "../OpenDB.php";
?>
<script type="text/javascript" language="javascript">
	function confirmDelete() {
    	return confirm("Are you sure you wish to cancel this reservation?");
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
				//pagination
			$result3=mysql_query("SELECT * from ROOM_ASSIGNMENT,RESERVATION,ROOM WHERE ROOM_ASSIGNMENT.RESERVATION_ID=RESERVATION.RESERVATION_ID AND ROOM_ASSIGNMENT.ROOM_ID=ROOM.ROOM_ID");
			$totalitems=mysql_num_rows($result3);
			$limit		= $_GET['limit'];
			$page		= $_GET['page'];
			if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {
				 $limit = 8; //default
			 } 
			
			if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $totalitems)) {
				  $page = 1; //default
			 } 
			 $total_pages 	= ceil($totalitems / $limit);
			 $set_limit 	= $page * $limit - ($limit);
			 $result3=mysql_query("SELECT * from ROOM_ASSIGNMENT,RESERVATION,ROOM WHERE ROOM_ASSIGNMENT.RESERVATION_ID=RESERVATION.RESERVATION_ID AND ROOM_ASSIGNMENT.ROOM_ID=ROOM.ROOM_ID LIMIT $set_limit, $limit");
		
				
				echo "<h3>Processed Reservation Requests</h3><br>";
				echo "<table width= '660' height='100' BORDER=1 RULES=ROWS FRAME=BOX align='left'>";				
				echo "<tr align='center'>";
				echo "<td width='200'>Reservation ID</td><td width='200'>Request Date</td><td width='200'>Check-in Date</td><td width='200'>Checkout Date</td><td width='200'>Room Type</td><td width='200'>Occupancy</td><td width='200'>No. of Rooms</td><td width='200'>Assigned Room</td><td width='200'>Assigned Room Type</td><td width='200'>Date Assigned</td><td width='200'>Status</td></tr>";
				while($row2=mysql_fetch_array($result3)) {
					$result=mysql_query("SELECT * from ROOM_TYPE WHERE TYPE_ID='".$row2['R_ROOM_TYPE']."'");
					$row=mysql_fetch_array($result);
					$result5=mysql_query("SELECT * from ROOM, ROOM_TYPE WHERE ROOM.ROOM_ID='".$row2['ROOM_ID']."' AND ROOM_TYPE.TYPE_ID=ROOM.ROOM_TYPE");
					$row5=mysql_fetch_array($result5);
					echo "<tr align='center'>";
					echo "<td>".$row2['RESERVATION_ID']."</td><td>".$row2['R_REQUEST']."</td><td>".$row2['R_CHECKIN']."</td><td>".$row2['R_CHECKOUT']."</td><td>".$row['TYPE_NAME']."</td><td>".$row2['R_OCCUPANCY']."</td><td>".$row2['R_NO_ROOM']."</td><td>".$row2['ROOM_NAME']."</td><td>".$row5['TYPE_NAME']."</td><td>".$row2['DATE_ASSIGN']."</td><td>";
					if($row2['ROOM_ASSIGNMENT_STATUS']==0) {
						echo "Cancelled";
					}
					else if($row2['ROOM_ASSIGNMENT_STATUS']==1) {
						echo "Active";
					}
					else echo "Checked-in";
					echo"</td>";
					echo "<td><a href='changeRoom.php?id=".$row2['RESERVATION_ID']."'><img src='../images/door.jpg'></img></a></td>";
					echo "<td><a href='deleteRoom.php?id=".$row2['RESERVATION_ID']."' onClick='return confirmDelete();'><img src='../images/delete.png'></img></a></td>";
					echo "</tr>";
				}
				
				//pagination
				echo "<tr ><td colspan=20 align=center>";
				$prev_page = $page - 1;
				if($prev_page >= 1) { 
  				echo("<b><<</b> <a href=viewProcessedReservations.php?limit=$limit&page=$prev_page><b>Prev.</b></a>"); 
				}
				for($a = 1; $a <= $total_pages; $a++) {
				   if($a == $page) {
					  echo("<b> $a</b> | "); //no link
				   }
				   else {
				  		echo("  <a href=viewProcessedReservations.php?limit=$limit&page=$a> $a </a> | ");
				   } 
				} 
				$next_page = $page + 1;
				if($next_page <= $total_pages) {
				   echo("<a href=viewProcessedReservations.php?limit=$limit&page=$next_page><b>Next</b></a> > >"); 
				} 
				echo "</td></tr>";
				
				echo "</table>";
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