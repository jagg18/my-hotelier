<?php

if(isset($_POST['submit'])){
	require 'Config.php';
	require 'OpenDB.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysql_query("SELECT * FROM USER WHERE USER_LOGIN='$username' AND USER_PASS='$password'");

				if(mysql_num_rows($result)){
				 $arr=mysql_fetch_array($result);

				 session_set_cookie_params(1200);

	session_start();


	$_SESSION['userid'] = $arr['USER_ID'];
   $_SESSION['username'] = $arr['USER_LOGIN'];
   $_SESSION['usertype'] = $arr['USER_TYPE'];

    session_write_close();
	$usertype=$arr['USER_TYPE']=$_SESSION["usertype"];
	$userid=$arr['USER_ID']=$_SESSION["userid"];

	echo "<script>console.log(\"13454356534\")</script>";

echo "<script>console.log(\"123" . print("12345") . "\")</script>";
	print($userid + " aaaaa");

	if($usertype=='1') {
	header("Location: Guest/guest.php");
	}
	else if($usertype=='2') {
	header("Location: Admin/admin.php?id=");
	}
	else if($usertype=='3') {
	header("Location: Clerk/clerk.php");
	}
	else if($usertype=='4') {
	header("Location: Staff/staff.php");
	}
    exit();
	}

	else{
	header("Location: login.php?login=1");
	}

	mysql_close();


	}

		?>
</body>


</html>
