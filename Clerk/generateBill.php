<?php
require "fpdf.php";
require "../Config.php";
require "../OpenDB.php";

class PDF extends FPDF
{
  function Header()
    {
      $this->Image('../images/logo.jpg',10,8,33);
      $this->SetFont('Helvetica','B',10);
      $this->SetXY(130, 10);
      $this->Cell(10,10,'Manila East Sports (MESPORTS) Corporation Km. 24 Manila East Road Taytay Rizal',0,0,'C');
	  $this->SetXY(155, 14);
	  $this->Cell(10,10,'Tel. Nos.: (02) 660-28-21/ 658-20-65/ 658-04-58 loc. 303',0,0,'C');
	  $this->SetXY(167, 18);
	  $this->Cell(0,10,'www.clubmanilaeast.com',0,0,'C');
	  $this->SetXY(158, 22);
	  $this->Cell(0,10,'info@clubmanilaeast.com.com',0,0,'C');
	  $this->SetXY(148, 26);
	  $this->Cell(0,10,'“Take a moment to relax and enjoy.”',2,0,'C');
	  $this->Ln(30);
     }

  function Footer()
    {
      $this->SetY(-15);
	  $this->SetFont('Arial','I',8);
	  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

    }
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetDisplayMode(real,'default');

$result=mysql_query("SELECT * FROM ROOM_ASSIGNMENT,RESERVATION,USER,ROOM WHERE ROOM_ASSIGNMENT.ROOM_ID=ROOM.ROOM_ID AND RESERVATION.RESERVATION_ID=ROOM_ASSIGNMENT.RESERVATION_ID AND USER.USER_ID=RESERVATION.GUEST_ID AND ROOM.ROOM_ID='".$_GET['id']."'");
$row=mysql_fetch_array($result);

$checkin = date("Y-M-d",strtotime($row['R_CHECKIN']));
$checkout=date("Y-M-d",strtotime($row['R_CHECKOUT']));

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Guest Name: '.$row['USER_FNAME'].' '.$row['USER_MNAME'].' '.$row['USER_LNAME'],0);
$pdf->Ln(7);
$pdf->Cell(0,10,'Room: '.$row['ROOM_NAME'],0);
$pdf->Ln(7);
$pdf->Cell(0,10,'Check-in Date: '.$checkin,0);
$pdf->Ln(7);
$pdf->Cell(0,10,'Checkout Date: '.$checkout,0);
$pdf->Ln(7);

//Rental charges table
$header=array('Rental Charges','Price','Total');
$pdf->Ln(7);
//Column widths
$w=array(130,30,30);
//Header
for($i=0;$i<count($header);$i++)
	$pdf->Cell($w[$i],7,$header[$i],1,0,'C');
$pdf->Ln();

$date_diff = round(((strtotime($checkout) - strtotime($checkin)) / 86400));
//rental charges
if($date_diff>0) {
	for($i=0;$i<($date_diff);$i++) {
		$total+=$row['ROOM_ASSIGNMENT_TOTAL_COST'];
		$timestamp = strtotime($checkin) + ($i * 86400); //calculates # of days passed ($num_days) * # seconds in a day (86400)
		$checkinplus = date("Y-M-d",$timestamp);
		$pdf->Cell($w[0],6,$checkinplus,'LR');
		$pdf->Cell($w[1],6,$row['ROOM_ASSIGNMENT_TOTAL_COST'],'LR');
		$pdf->Cell($w[2],6,'','LR');
		$pdf->Ln();
	}
}
else {
	$total=$row['ROOM_ASSIGNMENT_TOTAL_COST'];
	$pdf->Cell($w[0],6,$checkin,'LR');
	$pdf->Cell($w[1],6,$row['ROOM_ASSIGNMENT_TOTAL_COST'],'LR');
	$pdf->Cell($w[2],6,'','LR');
	$pdf->Ln();
}
//total rent charge

$pdf->Cell($w[0],6,'','LR');
$pdf->Cell($w[1],6,'','LR');
$pdf->Cell($w[2],6,'P '.floatval($total),'LR');
$pdf->Ln();
$pdf->Cell(array_sum($w),0,'','T');

$pdf->Ln();



//Other charges table
$header=array('Other Charges','Qty.','Price','Total');
$pdf->Ln(7);

$result=mysql_query("SELECT SUM(QTY) AS QTY, ITEM_NAME, ITEM_PRICE FROM ROOM,ROOM_SERVICE,SERVICE_ITEM WHERE ROOM.ROOM_ID='".$_GET['id']."' AND ROOM_SERVICE.ROOM_ID=ROOM.ROOM_ID AND ROOM_SERVICE.ITEM_ID=SERVICE_ITEM.ITEM_ID GROUP BY SERVICE_ITEM.ITEM_ID");
//Column widths
$w=array(100,20,40,30);
//Header
for($i=0;$i<count($header);$i++)
	$pdf->Cell($w[$i],7,$header[$i],1,0,'C');
$pdf->Ln();
$total=0;
while($row=mysql_fetch_array($result)) {
	$pdf->Cell($w[0],6,$row['ITEM_NAME'],'LR');
	$pdf->Cell($w[1],6,$row['QTY'],'LR');
	$pdf->Cell($w[2],6,$row['ITEM_PRICE'],'LR');
	$price=($row['QTY']*$row['ITEM_PRICE']);
	$total+=$price;
	$pdf->Cell($w[3],6,'P '.$price,'LR');
	$pdf->Ln();
}

$pdf->Cell($w[0],6,'','LR');
$pdf->Cell($w[1],6,'','LR');
$pdf->Cell($w[2],6,'','LR');
$pdf->Cell($w[3],6,'P '.$total,'LR');
$pdf->Ln();
$pdf->Cell(array_sum($w),0,'','T');

require "../OpenDB.php";
$pdf->Output('bill.pdf','I');
?>
