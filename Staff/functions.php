<?php
function printtable($usertype) {
	if($usertype==="staff") {
		$result = mysql_query("SELECT STAFF_ID,SERVICE_NAME FROM SERVICE_STAFF,SERVICE WHERE SERVICE_STAFF.STAFF_ID='".$_SESSION['userid']."' AND SERVICE_STAFF.SERVICE_ID=SERVICE.SERVICE_ID");
		if($row=mysql_fetch_array($result)){
			echo "<table width='300' height='142' border='0'>
				<tr>
				<td colspan=2>>> ".$row['SERVICE_NAME']."<input type='hidden' name='staff' value='".$row['STAFF_ID']."'></td>
				</tr>";
		}
			
		$result = mysql_query("SELECT ITEM_ID,ITEM_NAME,ITEM_PRICE FROM SERVICE_STAFF,SERVICE_ITEM WHERE SERVICE_STAFF.STAFF_ID='".$_SESSION['userid']."' AND SERVICE_ITEM.SERVICE_ID=SERVICE_STAFF.SERVICE_ID");
		$ctr=0;
		while($row=mysql_fetch_array($result)){
			echo "<tr>
			<td><img src='../images/spacer.gif'></img><label for='item".$ctr."'><input type='radio' name='item' id='item".$ctr."' value='".$row['ITEM_ID']."'> ".$row['ITEM_NAME']."</input><label></td>
			<td>".$row['ITEM_PRICE']."</td>
			</tr>";
			$ctr++;
		}
		echo "<tr>
			<td><img src='../images/spacer.gif'></img>Qty: <input type='text' size=2 name='qty'></input></td>
			<td><input type='submit' name='submit' value='Charge'></input></td>
			</tr>
			</table>";
	}
}

function printrooms() {
	$result = mysql_query("SELECT * FROM ROOM,ROOM_DESIGNATION WHERE ROOM_DESIGNATION.ROOM_ID=ROOM.ROOM_ID AND ROOM_DESIGNATION.STAFF_ID='".$_SESSION['userid']."' ORDER BY ROOM_NAME");
	$ctr=0;
	echo "<table width='650' height='142' border='0'>";
	while($row=mysql_fetch_array($result)){
		if($ctr%6==0)
			echo "<tr>";
		//if the room is occupied
		if($row['ROOM_STATUS']==1){
			echo "<td align='center'><a href='viewRoom.php?roomid=".$row['ROOM_ID']."'><img src='../images/occupied.jpg'></img></a>
				<br><input type='checkbox' id='room' name='room[]' value='".$row['ROOM_ID']."'></input>".$row['ROOM_NAME']."</td>";
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
	echo "</table>";
}
?>
