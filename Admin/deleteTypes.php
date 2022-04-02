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
	if(isset($_GET['id'])) {
	$id=$_GET['id'];
		$result = mysql_query("SELECT * from ROOM WHERE ROOM_TYPE='".$id."'");
		$status = mysql_num_rows($result);
		if($status<=0) {
		
			$result = mysql_query("DELETE from ROOM_TYPE WHERE TYPE_ID='".$id."'");
			if($result) {
			print"<p>Room type successfully deleted.
			</p>";
			}
			else {
			print "There seems to be an error.<br>";
			}
		}
		else {
			echo "Room type cannot be deleted beacuse there are existing rooms.";
		}
		print "<a href='viewTypes.php'> Back </a>";
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
