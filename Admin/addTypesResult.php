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
	

	$typename=$_POST['typename'];
	$typerate=floatval($_POST['typerate']);
	$typeextra=floatval($_POST['typeextra']);
	$capacity=$_POST['capacity'];
	
	//check to prevent bug on refreshing page
	//remove comments for real testing 
	//insert into database	
			$result = mysql_query("INSERT INTO ROOM_TYPE(TYPE_NAME,TYPE_RATE,TYPE_EXTRA,TYPE_CAPACITY)
			VALUES('$typename','$typerate','$typeextra','$capacity')");
			if($result) {
			print"<p>Room Type successfully created.
			</p>";
			print "<a href='addTypes.php'> Back </a>";
			}
			else {
			print "There seems to be an error.<br>
			Click <a href='addTypes.php> here </a> to go back to Add Room Types page.";
			
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
