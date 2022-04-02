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
	

	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	
	$pass=$_POST['txtpass'];
	$pass2=$_POST['txtrepass'];
	$username=$_POST['username'];
	$userType=$_POST['type'];
	
	
	//check to prevent bug on refreshing page
	//remove comments for real testing 
	$result = mysql_query("SELECT * FROM USER WHERE USER_LOGIN='$username'");
	if(mysql_num_rows($result)){
	print "There seems to be an error. The username is already used.<br>This error appears if you have refreshed this page.<br>
	Click <a href='addUsers.php?type=".$userType."> here </a> to go back to Add Users page.";
	}
	else
	{

	//insert into database	
			$result2 = mysql_query("INSERT INTO USER(USER_LNAME,USER_FNAME,USER_MNAME,USER_TYPE,USER_LOGIN, USER_PASS)
			VALUES('$lname','$fname','$mname','$userType','$username','$pass')");
			$current_id=mysql_insert_id();
			if($result2) {
				if($userType==4) {
					$room=$_POST['room'];
					
					foreach($room as $rooms) {
						//echo $rooms."asd <br />";
						$result3=mysql_query("INSERT INTO ROOM_DESIGNATION(STAFF_ID,ROOM_ID) VALUES('$current_id','$rooms')");
						if($result3) {
							print "Staff has been successfully designated to the room with id# $rooms.<br>";
						}
					}
					$servicename=$_POST['servicename'];
					$result3 = mysql_query("INSERT INTO SERVICE_STAFF(STAFF_ID,SERVICE_ID) VALUES('$current_id','$servicename')");
					if($result3) {
						print "Staff has been successfully assigned to the service.<br>";
					}
				}
			
			print"<p>User account successfully created.
			</p>";
			print "<a href='addUsers.php'> Back </a>";
			}
			else {
			print "There seems to be an error.<br>
			Click <a href='addUsers.php?type=".$userType."> here </a> to go back to Add Users page.";
			
			}
	}//end of else
	
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
