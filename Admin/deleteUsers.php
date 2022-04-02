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
			$id=$_GET['id'];
			if(isset($id)) {
				$result=mysql_query("SELECT USER_TYPE FROM USER WHERE USER_ID='".$id."'");
				$row=mysql_fetch_array($result);
				$usertype=$row['USER_TYPE'];
				if($usertype==1) {
					$result = mysql_query("DELETE from GUEST WHERE GUEST_ID='".$id."'") or die("User deletion failed.") or die("Guest deletion failed.");
				}
				$result = mysql_query("DELETE from USER WHERE USER_ID='".$id."'") or die("User deletion failed.");
				if($result) {
					print"<p>User successfully deleted.
					</p>";
				}
				else {
					print "There seems to be an error.<br>";
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