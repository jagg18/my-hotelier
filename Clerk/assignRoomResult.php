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
<li><a href="../index.php"><div id="current">Home</div></a></li>
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
					printtable("clerk");
				?>
            </div>   
	 	</div>
	 </div>
	<!-- end #content -->
	<div id="sidebar">
		<?php
			if(isset($_POST['submit'])) {
				$roomid=$_POST['room'];
				$resid=$_POST['resid'];
				$reservation=mysql_query("SELECT * FROM RESERVATION,ROOM_TYPE WHERE RESERVATION.RESERVATION_ID='".$resid."' AND RESERVATION.R_ROOM_TYPE=ROOM_TYPE.TYPE_ID");
				$row2=mysql_fetch_array($reservation);
				
				$norooms=$row2['R_NO_ROOM'];
				$totalcap=$row2['R_NO_ROOM']*$row2['TYPE_CAPACITY'];
				$cost=$row2['TYPE_RATE']*$norooms;
				//extra persons
				if($row2['R_OCCUPANCY']>$totalcap) {
					$extra=$row2['R_OCCUPANCY']-$totalcap;
					$cost=$cost+($extra*$row2['TYPE_EXTRA']);
				}

				$checkin=date("Y-m-d", strtotime($row2['R_CHECKIN']));
				$checkout=date("Y-m-d", strtotime($row2['R_CHECKOUT']));
				$date_diff = round(((strtotime($checkout) - strtotime($checkin)) / 86400)); 
				
							/*$result2=mysql_query("SELECT * FROM USER,GUEST WHERE USER_ID='".$row2['GUEST_ID']."' AND GUEST_ID=USER_ID;");
							$row4=mysql_fetch_array($result2);
							include("class.phpgmailer.php");
							$mail=new PHPGMailer();
							$mail->IsSMTP();	//send via SMTP
							$mail->SMTPAuth = true; // turn on SMTP authentication
							$mail->Username = "cme.reservations@gmail.com"; // SMTP username
							$mail->Password = "cmeadmin"; // SMTP password
							$webmaster_email = "cme.reservations@gmail.com"; //Reply to this email ID
							$mail->From = $webmaster_email;
							$mail->FromName = "CME myHotelier Admin";
							$email = $row4['GUEST_EMAIL']; // Recipients email ID
							$name = $row4['USER_FNAME']." ".$row4['USER_MNAME']." ".$row4['USER_LNAME']; // Recipient's name
							$mail->AddAddress($email,$name);
							$mail->AddReplyTo($webmaster_email,"Webmaster");
							$mail->WordWrap = 50; // set word wrap
							$mail->IsHTML(true); // send as HTML
							$mail->Subject = "CME myHotelier";
							$mail->Body = "<p>Club Manila East<br />
							  Manila East Sports (MESPORTS) Corporation KM. 24 Manila East Road  Taytay, Rizal<br />
							  Tel. Nos.: (02)  660-28-01/ 658-20-65/ 658-04-58 loc. 303<br />
							  <a href='http://www.clubmanilaeast.com/'>www.clubmanilaeast.com</a> <br />
							  <a href='mailto:info@clubmanilaeast.com'>info@clubmanilaeast.com</a><br />
							  &ldquo;Take a moment to relax and enjoy.&rdquo;</p>
							<p>".date("M d, Y")."</p>
							<p>Hi, ".$row4['USER_FNAME']."; </p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thank you for considering Club <u>Manila East Resorts and  Hotels Taytay</u> as venue for your planned stay on <u>".$checkin.".</u><br />
							We are pleased to submit the Accommodation Rate for your  reservation.</p>
							<div align='center'>
							  <table border='1' align='left' cellpadding='0' cellspacing='0'>
								<tr>
								  <td width='79' valign='top'><p align='center'><strong># of pax</strong></p></td>
								  <td width='96' valign='top'><p align='center'><strong># of Rooms</strong></p></td>
								  <td width='96' valign='top'><p align='center'><strong># of Nights</strong></p></td>
								  <td width='108' valign='top'><p align='center'><strong>Booking Date</strong></p></td>
								  <td width='120' valign='top'><p align='center'><strong>Description</strong></p></td>
								  <td width='91' valign='top'><p align='center'><strong>Amount</strong></p></td>
								</tr>
								<tr>
								  <td width='79' valign='top'><p align='center'>".$row2['R_OCCUPANCY']."</p></td>
								  <td width='96' valign='top'><p align='center'>".$norooms."</p></td>
								  <td width='96' valign='top'><p align='center'>".($date_diff)."</p></td>
								  <td width='108' valign='top'><p align='center'>".$checkin."</p></td>
								  <td width='120' valign='top'><p align='center'>".$row2['TYPE_NAME']."</p></td>
								  <td width='91' valign='top'><p align='center'>P ".$cost.".00</p></td>
								</tr>
							  </table>
							</div>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>Inclusions:</p>
							<ul>
							  <li><span dir='ltr'>Accommodation at CME Resorts and  Hotels Taytay</span></li>
							  <li><span dir='ltr'>Use of all Pool Facilities and  unlimited use of kayaks</span></li>
							</ul>
							<p>Rule: &ldquo;<u>NO  BRINGING OF FOODS &amp; DRINKS INSIDE CME PREMISES &amp; STRICTLY SWIMMING  ATTIRE IN THE POOLS</u>.&rdquo;</p>
							<p><strong><em><u>Terms  and Conditions:</u></em></strong></p>
							<ol start='1' type='1'>
							  <li><strong>Payments can be made by the       following methods:</strong></li>
							</ol>
							<ul>
							  <li><span dir='ltr'>Cash &ndash; Visit Club Manila East office at Km.  24 Manila East Road Taytay, Rizal</span></li>
							  <li><span dir='ltr'>Credit Card &ndash; Club  Manila East will use your supplied Credit Card information</span></li>
							  <li><span dir='ltr'>Bank Deposit &ndash; Please  deposit to the bank account below</span></li>
							</ul>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Metrobank &ndash; Taytay Branch<br />
							  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Manila East Road  Taytay, Rizal<br />
							  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Account  Name: Manila East Sports (MESPORTS) Corp.<br />
							  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Peso/Current  Account No.: 7-267-51222-8</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Note:  The guest should handle additional bank charges if the bank requires it.</p>
							<ol start='2' type='1'>
							  <li><strong>In case of cancellation:</strong></li>
							</ol>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;When  booking is cancelled forty-eight (48) hours prior to check-in date, an amount equal to one day of booking will be <br />
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;charged to  the guest&rsquo;s credit card account.</p>
							<p>We hope the  foregoing is in order. Should you have further queries you may call us at  telephone nos. +632-660 2802 or +632-284 4740 <br />
							and we will  be glad to assist you.</p>
							<p>Thank you  very much for your interest and we look forward to being of service to you and  your guests. <br />
							It&rsquo;s an  honor to have you at <strong>Club Manila East</strong>.</p>";	//HTML Body
							$mail->AltBody = "CME myHotelier. Contact CME at telephone nos. +632-660 2802 or +632-284 4740";	//Text Body
							if($mail->Send()){*/
							foreach($roomid as $rooms) {
								$result=mysql_query("INSERT INTO ROOM_ASSIGNMENT(RESERVATION_ID,CLERK_ID,GUEST_ID,ROOM_ID,ROOM_ASSIGNMENT_TOTAL_COST, ROOM_ASSIGNMENT_STATUS) 
					VALUES('".$resid."','".$userid."','".$row2['GUEST_ID']."','".$rooms."','".$cost."','1')") or die("Room assignment failed.");
								$current_id=mysql_insert_id();
								//$roomstatus=mysql_query("UPDATE ROOM SET ROOM_STATUS='1' WHERE ROOM_ID='".$roomid."'") or die("Check-in failed.");
								//$reservationstatus=mysql_query("UPDATE RESERVATION SET ROOM_ASSIGNMENT_ID='".$current_id."' WHERE RESERVATION_ID='".$resid."'") or die("Room assingment failed.");
							}
							if($result) {
								print "You have successfully checked in the reservation.<br>";
								print "<br><a href='viewReservations.php'> Back </a>";
							}
							else{
								echo $mail->ErrorInfo;
								echo "<br>".$row2['GUEST_ID'];
								print "Message was not sent. <br>
								Click <a href='viewReservations.php'> here </a> to go back to the View Reservations page.";
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