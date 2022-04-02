<?php
require "fpdf.php";
require "../Config.php";
require "../OpenDB.php";

class PDF extends FPDF
{
  var $y0;
  var $col=0;
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
	  $this->y0=$this->GetY();
     }

  function Footer()
    {
      $this->SetY(-15);
	  $this->SetFont('Arial','I',8);
	  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

    }

  function SetCol($col) {
    //Set position at a given column
    $this->col=$col;
    $x=10+$col*100;
    $this->SetLeftMargin($x);
    $this->SetX($x);
  }
  
  function AcceptPageBreak() {
    //Method accepting or not automatic page break
    if($this->col<1)
    {
        //Go to next column
        $this->SetCol($this->col+1);
        //Set ordinate to top
        $this->SetY($this->y0);
        //Keep on page
        return false;
    }
    else
    {
        //Go back to first column
        $this->SetCol(0);
        //Page break
        return true;
    }
  }
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetDisplayMode(real,'default');
$i=0;
$result=mysql_query("SELECT * FROM ROOM, ROOM_TYPE WHERE ROOM.ROOM_TYPE=ROOM_TYPE.TYPE_ID ORDER BY ROOM_ID");
while($roominfo=mysql_fetch_array($result)) {
	$pdf->SetFont('Times','B',15);
    $pdf->Cell(0,10,'Room ID No. '.$roominfo['ROOM_ID'],0);
	$pdf->Ln(5);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(0,10,'Room Name: '.$roominfo['ROOM_NAME'],0);
	$pdf->Ln(5);
	$pdf->Cell(0,10,'Room Type: '.$roominfo['TYPE_NAME'],0);
	$pdf->Ln(5);
	if($roominfo['ROOM_STATUS']==1) {
		$status="OCCUPIED";
	}
	else {
		$status="VACANT";
	}
	if($roominfo['ROOM_STATUS']==0) {
		$guestname="N/A";
		$checkin="N/A";	
	}
	else {
		$result2=mysql_query("SELECT * FROM USER,RESERVATION,ROOM_ASSIGNMENT WHERE USER.USER_ID=RESERVATION.GUEST_ID AND RESERVATION.RESERVATION_ID=ROOM_ASSIGNMENT.RESERVATION_ID AND ROOM_ASSIGNMENT.ROOM_ID='".$roominfo['ROOM_ID']."'");
		if($assigninfo=mysql_fetch_array($result2)) {
			$guestname=$assigninfo['USER_LNAME'];
			$checkin=$assigninfo['R_CHECKIN'];
		}
	}
	$pdf->Cell(0,10,'Room Status: '.$status,0);
	$pdf->Ln(7);
	$pdf->SetFont('Times','B',15);
	$pdf->Cell(0,10,'Guest Name: '.$guestname,0);
	$pdf->Ln(5);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(0,10,'Check-in Date: '.$checkin,0);
	
	$i++;
	if($i%5==0) {
		$pdf->Ln(50);
	}
	else {
		$pdf->Ln(15);
	}
}
require "../OpenDB.php";
$pdf->Output('occupancy.pdf','I');
?>
