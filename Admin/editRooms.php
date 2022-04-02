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
<li><a href="admin.php"><div id="current">Home</div></a></li>
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
				$roomid=$_POST['roomid'];

					
						$result = mysql_query("UPDATE ROOM
						SET
						ROOM_NAME='".$roomname."',
						ROOM_TYPE='".$roomtype."'
						WHERE ROOM_ID='".$roomid."'");
						if($result) {
						print"<p>Room successfully updated.
						</p>";
						print "<a href='viewRooms.php'> Back </a>";
						}
						else {
						print "There seems to be an error.<br>";
						print "<a href='viewRooms.php'> Back </a>";
						}
				}
			else {
					
					$id=$_GET['id'];
					if(isset($id)) {
						printeditroomform($id);
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