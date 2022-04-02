<?php
	require "header.php";
	require "functions.php";
	require "../Config.php";
	require "../OpenDB.php";
?>

<div id="nav">
<div id="menu">
<ul>
<li><a href="admin.php"><div id="current">Home</div></a></li>
<li><a href="../about.php">About Us</a></li>
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
					printtable("admin");
				?>
            </div>
   
            	
		</div>
	 </div>
	<!-- end #content -->
	<div id="sidebar">
 <?php
	if(isset($_POST['submit'])) {
	
	$roomtype=$_POST['roomtype'];
	$roomname=$_POST['roomname'];
	//$roomtype=$_POST['typename'];
	//$roomname=floatval($_POST['typerate']);
	
	//check to prevent bug on refreshing page
	//remove comments for real testing 
	//insert into database
		
			$result = mysql_query("INSERT INTO ROOM(ROOM_NAME,ROOM_TYPE)
			VALUES('$roomname','$roomtype')");
			if($result) {
			print"<p>Room successfully created.
			</p>";
			print "<a href='addRooms.php'> Back </a>";
			}
			else {
			print "There seems to be an error.<br>
			Click <a href='addRooms.php> here </a> to go back to Add Rooms page.";
			}
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
