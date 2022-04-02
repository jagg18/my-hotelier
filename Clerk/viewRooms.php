<?php
	require "header.php";
	require "functions.php";
	require "../Config.php";
	require "../OpenDB.php";
?>
<script type="text/javascript" language="javascript">
	function confirmAssign() {
    	return confirm("Are you sure you wish to assign this room?");
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
			$rmid=$_GET['id'];
			if(isset($rmid)) {
				$result=mysql_query("SELECT * FROM ROOM,ROOM_TYPE WHERE ROOM.ROOM_ID='".$rmid."' AND ROOM.ROOM_TYPE=ROOM_TYPE.TYPE_ID");
				while($rminfo=mysql_fetch_array($result)) {
					echo "<table width= '500' height='100' align='left' BORDER=1 RULES=ROWS FRAME=BOX>";
					echo "<th>Room Info</th>";			
					echo "<tr align='center'>";
					echo "<td width='150'>Room ID</td><td width='300'>".$rminfo['ROOM_ID']."</td>";
					echo "</tr>";
					echo "<tr align='center'>";
					echo "<td width=''>Room Name</td><td width='300'>".$rminfo['ROOM_NAME']."</td>";
					echo "</tr>";
					echo "<tr align='center'>";
					echo "<td width=''>Room Type</td><td width='300'>".$rminfo['TYPE_NAME']."</td>";
					echo "</tr>";
					echo "<tr align='center'>";
					echo "<td width=''>Capacity</td><td width='300'>".$rminfo['TYPE_CAPACITY']."</td>";
					echo "</tr>";
					echo "<tr align='center'>";
					echo "<td width=''>Rate</td><td width='300'>".$rminfo['TYPE_RATE']."</td>";
					echo "</tr>";
					echo "<tr align='center'>";
					echo "<td width=''>Extra Person</td><td width='300'>".$rminfo['TYPE_EXTRA']."</td>";
					echo "</tr>";
					echo "</table>";
					
					echo "<table  width='500' height='100' align='left' BORDER=1 RULES=ROWS FRAME=BOX>";
					
					if($rminfo['ROOM_STATUS']==0) {
						echo "<th>VACANT</th>";
					}
					else {
						echo "<th>Occupancy Information</th>";
						$result=mysql_query("SELECT * FROM USER,RESERVATION,ROOM_ASSIGNMENT WHERE ROOM_ASSIGNMENT.ROOM_ID='".$rmid."' AND RESERVATION.RESERVATION_ID=ROOM_ASSIGNMENT.RESERVATION_ID AND ROOM_ASSIGNMENT.GUEST_ID=USER.USER_ID");
						while($guestinfo=mysql_fetch_array($result)) {
							echo "<tr align='center'>";
							echo "<td width='150'>Guest Name</td><td width='250'>".$guestinfo['USER_FNAME']." ".$guestinfo['USER_MNAME']." ".$guestinfo['USER_LNAME']."</td>";
							echo "</tr>";
							echo "<tr align='center'>";
							echo "<td>Check-in Date</td><td>".date("M d, Y", strtotime($guestinfo['R_CHECKIN']))."</td>";
							echo "</tr>";
							echo "<tr align='center'>";
							echo "<td>Checkout Date</td><td>".date("M d, Y", strtotime($guestinfo['R_CHECKOUT']))."</td>";
							echo "</tr>";
						}
					}
					
					echo "</table>";
				}
			}
			else {
				printallrooms();
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