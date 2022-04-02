<?php

function printrooms($id) {
	$reservation=mysql_query("SELECT * FROM RESERVATION WHERE RESERVATION_ID='".$id."'");
	$resinfo=mysql_fetch_array($reservation);
	$checkin=strtotime($resinfo['R_CHECKIN']);
	$checkout=strtotime($resinfo['R_CHECKOUT']);
	$result = mysql_query("SELECT * FROM ROOM,ROOM_TYPE WHERE ROOM.ROOM_TYPE='".$resinfo['R_ROOM_TYPE']."' AND ROOM.ROOM_TYPE=ROOM_TYPE.TYPE_ID AND ROOM.ROOM_STATUS='0' ORDER BY ROOM_ID");
	$ctr=0;
	echo "<form id='assignroom' name='assignroom' action='assignRoomResult.php' method='post' onSubmit=\"return validate_form(this,'assignroom');\" >";
	echo "<table width='650' height='142' border='0'>";
	echo "<input type='hidden' name='norooms' value='".$resinfo['R_NO_ROOM']."'></input>";
	while($rooms=mysql_fetch_array($result)){
	
		$result2 = mysql_query("SELECT * FROM ROOM,ROOM_TYPE,ROOM_ASSIGNMENT,RESERVATION WHERE ROOM.ROOM_TYPE=ROOM_TYPE.TYPE_ID AND ROOM_ASSIGNMENT.ROOM_ID='".$rooms['ROOM_ID']."' AND RESERVATION.RESERVATION_ID=ROOM_ASSIGNMENT.RESERVATION_ID");
		$rminfo=mysql_fetch_array($result2);
		$rmcheckin=strtotime($rminfo['R_CHECKIN']);
		$rmcheckout=strtotime($rminfo['R_CHECKOUT']);

		
		//if the room is not assigned
		if((($checkin>=$rmcheckin)&&($checkin<=$rmcheckout))||(($checkout>=$rmcheckin)&&($checkout<=$rmcheckout))) {
			//echo "pasok";
		}
		else {
			if($ctr%5==0)
			echo "<tr>";
			echo "<td align='center'><img src='../images/room.jpg'></img>
				<br><input type='checkbox' name='room[]' value='".$rooms['ROOM_ID']."'></input>".$rooms['ROOM_NAME'].": ".$rooms['TYPE_NAME']."
				<input type='hidden' name='resid' value='".$id."'></input>
				</td>";
			if($ctr%5==4)
			echo "</tr>";
				$ctr++;
			if(ctr%6!=0){
				echo "</tr>";
			}
		}
		
	}
	echo "</table>";
	echo "<TR></TR>
                    <br />
                      <TR>
                      <TD width='120'></TD>
                      <TD width='350'><input type='reset' name='reset' value='Clear'> 
                      <input type='submit' name='submit' value='Submit'> 
					</TD><TD></TD>
                     </TR>
			</form>";
}

function printchangerooms($id) {
	$reservation=mysql_query("SELECT * FROM RESERVATION WHERE RESERVATION_ID='".$id."'");
	$resinfo=mysql_fetch_array($reservation);
	$checkin=strtotime($resinfo['R_CHECKIN']);
	$checkout=strtotime($resinfo['R_CHECKOUT']);
	$result = mysql_query("SELECT * FROM ROOM,ROOM_TYPE WHERE ROOM.ROOM_TYPE='".$resinfo['R_ROOM_TYPE']."' AND ROOM.ROOM_TYPE=ROOM_TYPE.TYPE_ID  ORDER BY ROOM_ID");
	$ctr=0;
	echo "<form id='changeroom' name='changeroom' action='changeRoom.php' method='post' onSubmit=\"return validate_form(this,'assignroom');\" >";
	echo "<table width='650' height='142' border='0'>";
	echo "<input type='hidden' name='norooms' value='".$resinfo['R_NO_ROOM']."'></input>";
	while($rooms=mysql_fetch_array($result)){
	
		$result2 = mysql_query("SELECT * FROM ROOM,ROOM_TYPE,ROOM_ASSIGNMENT,RESERVATION WHERE ROOM.ROOM_TYPE=ROOM_TYPE.TYPE_ID AND ROOM_ASSIGNMENT.ROOM_ID='".$rooms['ROOM_ID']."' AND RESERVATION.RESERVATION_ID=ROOM_ASSIGNMENT.RESERVATION_ID");
		$rminfo=mysql_fetch_array($result2);
		$rmcheckin=strtotime($rminfo['R_CHECKIN']);
		$rmcheckout=strtotime($rminfo['R_CHECKOUT']);

		
		//if the room is not assigned
		if((($checkin>=$rmcheckin)&&($checkin<=$rmcheckout))||(($checkout>=$rmcheckin)&&($checkout<=$rmcheckout))) {
			//echo "pasok";
		}
		else {
			if($ctr%5==0)
			echo "<tr>";
			echo "<td align='center'><img src='../images/room.jpg'></img>
				<br><input type='checkbox' name='room[]' value='".$rooms['ROOM_ID']."'></input>".$rooms['ROOM_NAME'].": ".$rooms['TYPE_NAME']."
				<input type='hidden' name='resid' value='".$id."'></input></td>";
			if($ctr%5==4)
			echo "</tr>";
				$ctr++;
			if(ctr%6!=0){
				echo "</tr>";
			}
		}
		
	}
	echo "</table>";
	echo "<TR></TR>
                    <br />
                      <TR>
                      <TD width='120'></TD>
                      <TD width='350'><input type='reset' name='reset' value='Clear'> 
                      <input type='submit' name='submit' value='Submit'> 
					</TD><TD></TD>
                     </TR>
			</form>";
}

function printallrooms() {
	//pagination
	$result = mysql_query("SELECT * FROM ROOM ORDER BY ROOM_NAME");
	$totalitems=mysql_num_rows($result);
	$limit		= $_GET['limit'];
	$page		= $_GET['page'];
	if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {
		 $limit = 24; //default
	 } 
	
	if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $totalitems)) {
		  $page = 1; //default
	 } 
	 $total_pages 	= ceil($totalitems / $limit);
	 $set_limit 	= $page * $limit - ($limit);
	 $result=mysql_query("SELECT * FROM ROOM ORDER BY ROOM_NAME LIMIT $set_limit, $limit");
	
	$ctr=0;
	echo "<table width='650' height='142' border='0'>";
	while($row=mysql_fetch_array($result)){
		if($ctr%6==0)
			echo "<tr>";
		//if the room is occupied
		if($row['ROOM_STATUS']==1){
			echo "<td align='center'><a href='viewRooms.php?id=".$row['ROOM_ID']."'><img src='../images/occupied.jpg'></img></a>
				<br>".$row['ROOM_NAME']."</td>";
		}
		//if the room is vacant
		else{
			echo "<td align='center'><a href='viewRooms.php?id=".$row['ROOM_ID']."'><img src='../images/vacant.jpg'></img></a>
				<br>".$row['ROOM_NAME']."</td>";
		}
		if($ctr%6==5)
			echo "</tr>";
		$ctr++;
	}
	if(ctr%6!=0){
		echo "</tr>";
	}
	
	//pagination
	echo "<tr ><td colspan=10 align=center>";
	$prev_page = $page - 1;
	if($prev_page >= 1) { 
	echo("<b><<</b> <a href=viewRooms.php?limit=$limit&page=$prev_page><b>Prev.</b></a>"); 
	}
	for($a = 1; $a <= $total_pages; $a++) {
	   if($a == $page) {
		  echo("<b> $a</b> | "); //no link
	   }
	   else {
			echo("  <a href=viewRooms.php?limit=$limit&page=$a> $a </a> | ");
	   } 
	} 
	$next_page = $page + 1;
	if($next_page <= $total_pages) {
	   echo("<a href=viewRooms.php?limit=$limit&page=$next_page><b>Next</b></a> > >"); 
	} 
	echo "</td></tr>";
	
	echo "</table>";
}
function printroomsreport() {
	//pagination
	$result = mysql_query("SELECT * FROM ROOM ORDER BY ROOM_NAME");
	$totalitems=mysql_num_rows($result);
	$limit		= $_GET['limit'];
	$page		= $_GET['page'];
	if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {
		 $limit = 24; //default
	 } 
	
	if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $totalitems)) {
		  $page = 1; //default
	 } 
	 $total_pages 	= ceil($totalitems / $limit);
	 $set_limit 	= $page * $limit - ($limit);
	 $result=mysql_query("SELECT * FROM ROOM ORDER BY ROOM_NAME LIMIT $set_limit, $limit");

	
	$ctr=0;
	echo "<table width='650' height='142' border='0'>";
	while($row=mysql_fetch_array($result)){
		if($ctr%6==0)
			echo "<tr>";
		//if the room is occupied
		if($row['ROOM_STATUS']==1){
			echo "<td align='center'><a href='generateBill.php?id=".$row['ROOM_ID']."'><img src='../images/occupied.jpg'></img></a>
				<br>".$row['ROOM_NAME']."</td>";
		}
		//if the room is vacant
		else{
			echo "<td align='center'><img src='../images/vacant.jpg'></img>
				<br>".$row['ROOM_NAME']."</td>";
		}
		if($ctr%6==5)
			echo "</tr>";
		$ctr++;
	}
	if(ctr%6!=0){
		echo "</tr>";
	}
	
	//pagination
	echo "<tr ><td colspan=10 align=center>";
	$prev_page = $page - 1;
	if($prev_page >= 1) { 
	echo("<b><<</b> <a href=generateBilling.php?limit=$limit&page=$prev_page><b>Prev.</b></a>"); 
	}
	for($a = 1; $a <= $total_pages; $a++) {
	   if($a == $page) {
		  echo("<b> $a</b> | "); //no link
	   }
	   else {
			echo("  <a href=generateBilling.php?limit=$limit&page=$a> $a </a> | ");
	   } 
	} 
	$next_page = $page + 1;
	if($next_page <= $total_pages) {
	   echo("<a href=generateBilling.php?limit=$limit&page=$next_page><b>Next</b></a> > >"); 
	} 
	echo "</td></tr>";
	echo "</table>";
}

function printtable($usertype) {
	if($usertype==="clerk") {
		echo "<table width='300' height='142' border='0'>
			<tr>
			<td>>> Reservations</td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='viewReservations.php'> View Pending Reservations</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='viewProcessedReservations.php'> View Processed Reservations</a></td>
			</tr>
			<tr>
			<td>>> Rooms</td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='viewRooms.php'> View Rooms</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='checkIn.php'> Check-in Guests</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='checkOut.php'> Checkout Guests</a></td>
			</tr>
			<tr>
			<td>>> Reports</td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='generateOccupancy.php'> Occupancy Report</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='generateBilling.php'> Guest Billing Report</a></td>
			</tr>
			</table>";
	}
}


?>
