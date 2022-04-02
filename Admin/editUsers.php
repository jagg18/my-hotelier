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
	

				$fname=$_POST['fname'];
				$mname=$_POST['mname'];
				$lname=$_POST['lname'];
				
				$pass=$_POST['txtpass'];
				$pass2=$_POST['txtrepass'];
				$username=$_POST['username'];
				$userid=$_POST['userid'];
				$usertype=$_POST['usertype'];
			
				//insert into database	
						$result2 = mysql_query("UPDATE USER
						SET
						USER_LNAME='".$lname."',
						USER_FNAME='".$fname."',
						USER_MNAME='".$mname."',
						USER_LOGIN='".$username."',
						USER_PASS='".$pass."'
						WHERE USER_ID='".$userid."'");
						if($result2) {
							if($usertype==4) {
								$room=$_POST['room'];
								$result=mysql_query("DELETE FROM ROOM_DESIGNATION WHERE STAFF_ID='".$userid."'");
								foreach($room as $rooms) {
								//echo $rooms."asd <br />";
								$result3=mysql_query("INSERT INTO `room_designation`(STAFF_ID,ROOM_ID) VALUES('$userid','$rooms')");
									if($result) {
										print "Staff has been successfully redesignated to the room with id# $rooms.<br>";
									}
								}
							  	$servicename=$_POST['servicename'];
							   
								$result3 = mysql_query("UPDATE SERVICE_STAFF
								SET 
								SERVICE_ID='".$servicename."'
								WHERE STAFF_ID='".$userid."'");
								if($result3) {
								print "Staff has been successfully re-assigned to the service.<br>";
								}
							}
						
						print"<p>User account successfully updated.
						</p>";
						print "<a href='viewUsers.php'> Back </a>";
						}
						else {
						print "There seems to be an error.<br>";
						print "<a href='viewUsers.php'> Back </a>";
						
						}
				
				}
				else {
						
						$id=$_GET['id'];
						if(isset($id)) {
							printedituserform("$id");
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