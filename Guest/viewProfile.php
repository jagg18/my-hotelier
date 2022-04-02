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
					printtable("guest");
				?>
            </div>   
	 	</div>
	 </div>
	<!-- end #content -->
	<div id="sidebar" class="sidebar">
		<?php
			$result=mysql_query("SELECT * from USER WHERE USER_ID='".$_SESSION['userid']."'");
			$row=mysql_fetch_array($result);
			$result2=mysql_query("SELECT * from GUEST WHERE GUEST_ID='".$_SESSION['userid']."'");
			$row2=mysql_fetch_array($result2);
			echo "<table width= '500' height='100' align='left' BORDER=1 RULES=ROWS FRAME=BOX>";
			echo "<tr><th colspan=2 align='left'>&nbsp;&nbsp;Personal Info</th></tr>";			
			echo "<tr align='center'>";
			echo "<td width='100' >Name</td><td width='300'>".$row['USER_LNAME'].", ".$row['USER_FNAME']." ".$row['USER_MNAME']."</td>";
			echo "</tr>";
			echo "<tr align='center'>";
			echo "<td width='100'>Landline No.</td><td width='300'>".$row2['GUEST_PHONE']."</td>";
			echo "</tr>";
			echo "<tr align='center'>";
			echo "<td width='100'>Mobile No.</td><td width='300'>".$row2['GUEST_MOBILE']."</td>";
			echo "</tr>";
			echo "</table>";
			echo "<table  width='500' height='100' align='left' BORDER=1 RULES=ROWS FRAME=BOX>";
			echo "<tr ><th colspan='2' align='left'>&nbsp;&nbsp;Account Information</th></tr>";
			
			echo "<tr align='center'>";
			echo "<td width='100'>Username</td><td width='250'>".$row['USER_LOGIN']."</td>";
			echo "</tr>";
			echo "<tr align='center'>";
			echo "<td>Password</td><td>".$row['USER_PASS']."</td>";
			echo "</tr>";
			echo "<tr align='center'>";
			echo "<td>Email</td><td>".$row2['GUEST_EMAIL']."</td>";
			echo "</tr>";
			echo "<tr align='center'>";
			echo "<td>CC Number</td><td>".$row2['GUEST_CC']."</td>";
			echo "</tr>";
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