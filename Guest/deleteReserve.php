<?php
	require "header.php";
	require "functions.php";
	require "../Config.php";
	require "../OpenDB.php";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
?>

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
	function getDeleteEmailBody($name, $occupancy, $no_room, $no_days, $checkin_date, $type_name, $type_rate) {
		return "<p>Club Manila East<br />
			Manila East Sports (MESPORTS) Corporation KM. 24 Manila East Road  Taytay, Rizal<br />
			Tel. Nos.: (02)  660-28-01/ 658-20-65/ 658-04-58 loc. 303<br />
			<a href='http://www.clubmanilaeast.com/'>www.clubmanilaeast.com</a> <br />
			<a href='mailto:info@clubmanilaeast.com'>info@clubmanilaeast.com</a><br />
			&ldquo;Take a moment to relax and enjoy.&rdquo;</p>
		<p>".date("M d, Y")."</p>
		<p>Hi, ".$name." ;</p>
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
				<td width='79' valign='top'><p align='center'>".$occupancy."</p></td>
				<td width='96' valign='top'><p align='center'>".$no_room."</p></td>
				<td width='96' valign='top'><p align='center'>".$no_days."</p></td>
				<td width='108' valign='top'><p align='center'>".$checkin_date."</p></td>
				<td width='120' valign='top'><p align='center'>".$type_name."</p></td>
				<td width='91' valign='top'><p align='center'>".$type_rate."</p></td>
			</tr>

			</table>
		</div>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<br/><br/><br/>
		<p>You have cancelled your reservation forty-eight (48) hours prior to check-in date. </p>
		<p>When booking is cancelled forty-eight (48) hours prior to check-in date, an amount equal to one day of booking will be <br />
			charged to  the guest&rsquo;s credit card account.</p>
		<p>We hope the  foregoing is in order. Should you have further queries you may call us at  telephone nos. +632-660 2802 or +632-284 4740 <br />
		and we will  be glad to assist you.</p>
		<p>Thank you  very much for your interest and we look forward to being of service to you and  your guests. <br />
		It&rsquo;s an  honor to have you at <strong>Club Manila East</strong>.</p>";	//HTML Body
	}

	function createEmail($email, $name, $occupancy, $no_room, $no_days, $checkin_date, $type_name, $type_rate) {
		$mail = new PHPMailer(true);
	
		//Server settings
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'cme.reservations@gmail.com';                     //SMTP username
		$mail->Password   = 'cmeadmin';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('cme.reservations@gmail.com', 'CME myHotelier Admin');
		$mail->addAddress($email, $name);     //Add a recipient
		$mail->addReplyTo('cme.reservations@gmail.com', 'Webmaster');

		//Attachments
		// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'CME myHotelier';
		$mail->Body    = getDeleteEmailBody($name, $occupancy, $no_room, $no_days, $checkin_date, $type_name, $type_rate);
		$mail->AltBody = 'CME myHotelier. Contact CME at telephone nos. +632-660 2802 or +632-284 4740';

		return $mail;
	}

	if(isset($_GET['id'])) {
		$id=$_GET['id'];
		$result2=mysql_query("SELECT * FROM RESERVATION,ROOM_ASSIGNMENT WHERE RESERVATION.RESERVATION_ID='".$id."' AND RESERVATION.ROOM_ASSIGNMENT_ID=ROOM_ASSIGNMENT.ROOM_ASSIGNMENT_ID");
		//if delete processed reservation
		if($row=mysql_fetch_array($result2)) {		
			$result3=mysql_query("SELECT * FROM ROOM,ROOM_TYPE WHERE ROOM.ROOM_ID='".$row['ROOM_ID']."' AND ROOM_TYPE.TYPE_ID=ROOM.ROOM_TYPE");
			$row3=mysql_fetch_array($result3);
			//$cost=$row3['TYPE_RATE']*$row['R_NO_ROOM'];
			
			$checkin=date("Y-m-d", strtotime($row['R_CHECKIN']));
			$checkout=date("Y-m-d", strtotime($row['R_CHECKOUT']));
			$now=date("Y-m-d");
			$date_diff = round(((strtotime($checkin) - strtotime($now)) / 86400));
			if($date_diff<=2) {
				$diff = round(((strtotime($checkout) - strtotime($checkin)) / 86400));
				$result2=mysql_query("SELECT * FROM USER,GUEST WHERE USER_ID='".$userid."' AND GUEST_ID=USER_ID;");
				$row2=mysql_fetch_array($result2);
				
				$email = $row2['GUEST_EMAIL']; // Recipients email ID
				$name = $row2['USER_FNAME']." ".$row2['USER_MNAME']." ".$row2['USER_LNAME']; // Recipient's name

				$occupancy = $row['R_OCCUPANCY'];
				$no_room = $row['R_NO_ROOM'];
				$checkin = $row['R_CHECKIN'];
				$type_name = $row3['TYPE_NAME'];
				$type_rate = $row3['TYPE_RATE'];

				

				try {
					$mail=createEmail($email, $name, $occupancy, $no_room, $diff, $checkin, $type_name, $type_rate);
					$mail->send();

					$delresult = mysql_query("UPDATE ROOM_ASSIGNMENT SET ROOM_ASSIGNMENT_STATUS='0', ROOM_ASSIGNMENT_TOTAL_COST='".$row3['TYPE_RATE']."' WHERE ROOM_ASSIGNMENT_ID='".$row['ROOM_ASSIGNMENT_ID']."'") or die("Cancellation failed.");
					echo "You have successfully cancelled your reservation.";
				} catch (Exception $e) {
					print "Message was not sent. <br>
					Click <a href='viewProcessedReservations.php'> here </a> to go back to the View Processed Reservations page.";
				}
			}
			else {
				$delresult = mysql_query("DELETE from RESERVATION WHERE RESERVATION_ID='".$id."'") or die("Cancellation failed.");
				echo "You have successfully cancelled your reservation.";
			}
		}
		else {
			$delresult = mysql_query("DELETE from RESERVATION WHERE RESERVATION_ID='".$id."'") or die("Cancellation failed.");
			echo "You have successfully cancelled your reservation.";
		}
	}
	else {
		echo "Reservation cannot be cancelled.";
	}
	// print "<a href='viewReservations.php'> Back </a>";
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
