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
	
				
				$fname=$_POST['fname'];
				$mname=$_POST['mname'];
				$lname=$_POST['lname'];
				
				$pass=$_POST['txtpass'];
				$pass2=$_POST['txtrepass'];
				$username=$_POST['username'];
				// $usertype=$_POST['usertype'];
				
				$phone=$_POST['txtphonenumber2'];
				$celloper=$_POST['txtmobilenumber1'];
				$cellnumber=$_POST['txtmobilenumber2'];
				if($cellnumber=='') {
				$mobile='';
				}
				else {
				$mobile=$celloper.$cellnumber;
				}
				$email=$_POST['email'];
				$cardno=$_POST['cardnum'];
			
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
							$result3 = mysql_query("UPDATE GUEST
							SET
							GUEST_PHONE='".$phone."',
							GUEST_MOBILE='".$mobile."',
							GUEST_CC='".$cardno."',
							GUEST_EMAIL='".$email."'
							WHERE GUEST_ID='".$userid."'");
							if($result3) {
								print"<p>User profile successfully updated.
								</p>";
								print "<a href='viewProfile.php'> Back </a>";
								}
						}
						else {
						print "There seems to be an error.<br>";
						print "<a href='viewProfile.php'> Back </a>";
						
						}
			}
				
			else {
					$id=$_SESSION['userid'];
					if(isset($id)) {
						printeditprofileform();
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