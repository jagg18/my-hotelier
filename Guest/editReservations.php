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
<li><a href="guest.php"><div id="current">Home</div></a></li>
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
					printtable("guest");
				?>
            </div>   
	 	</div>
	 </div>
	<!-- end #content -->
	<div id="sidebar">
		<?php
			if(isset($_POST['submit'])) {
				$resid=$_POST['resid'];
				$roomtype=$_POST['roomtype'];
				$norooms=$_POST['norooms'];
				$noguests=$_POST['noguests'];
				$roomspecs=$_POST['roomspecs'];
				$monthin=$_POST['monthin'];
				$dayin=$_POST['dayin'];
				$yearin=$_POST['yearin'];
				$monthout=$_POST['monthout'];
				$dayout=$_POST['dayout'];
				$yearout=$_POST['yearout'];
				date_default_timezone_set("Asia/Manila");
				$checkin=date("Y-m-d", mktime(0, 0, 0, $monthin, $dayin, $yearin));
				$checkout=date("Y-m-d", mktime(0, 0, 0, $monthout, $dayout, $yearout));
				$now=date("Y-m-d");
				$cmpnow=strtotime($now);
				$cmpcheckin=strtotime($checkin,$cmpnow);
				$cmpcheckout=strtotime($checkout,$cmpnow);
				
				if(($cmpcheckin<$cmpnow)||($cmpcheckout<$cmpnow)) {
					echo "Error: Check-in and checkout dates must be after the date today.";
				}
				else {				
					if($cmpcheckin>$cmpcheckout) {
						echo "Error: Check-in date must be before checkout date.";
						echo "<a href='addReservation.php'> Back </a>";
					}
					else {
						$result = mysql_query("UPDATE RESERVATION
						SET 
						GUEST_ID='".$userid."',
						R_ROOM_TYPE='".$roomtype."',
						R_NO_ROOM='".$norooms."',
						R_OCCUPANCY='".$noguests."',
						R_SPECS='".$roomspecs."',
						R_CHECKIN='".$checkin."',
						R_CHECKOUT='".$checkout."'
						WHERE RESERVATION_ID='".$resid."'");
						if($result) {
						print"<p>Congratulations! You have successfully updated your reservation request.
						</p>
						<p> Click <a href='viewReservations.php'> here </a> to view your reservations.";
						}
						else {
							print "There seems to be an error. Please contact the administrator <br>
							Click <a href='viewReservation.php'> here </a> to go back to the View Reservations page.";
						}
					}
				}
			}
			else {
				$id=$_GET['id'];
				if(isset($id)) {
					printeditreserveform("$id");
				}
			}
		?>
  	</div>
<!-- end #sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->
<?php
	require "../CloseDB.php";
	require "footer.php";
?>
</body>
</html>