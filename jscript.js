function validate_required(field,alerttxt) {
	with (field) {
		if (value==null||value=="") {
			alert(alerttxt);return false;
		}
		else {
			return true;
		}
	}
}

function validate_form (thisform, type) {
	with (thisform) {
		switch(type) {
			case 'newguest':
								if (validate_required(fname,"Please enter first name")==false)
						  {fname.focus();return false;}
						else if(validate_required(mname,"Please enter middle name")==false)
						  {mname.focus();return false;}
						else if(validate_required(lname,"Please enter last name")==false)
						  {lname.focus();return false;}
						else if((isNaN(txtphonenumber2.value))||(txtphonenumber2.value.length<7)||(txtphonenumber2.value=='')){alert("Please enter a valid phone number.");
								txtphonenumber2.focus();return false;}
						else if(((cardnum.value.length>0)&&(cardnum.value.length<16))||(cardnum.value == "")){alert("Invalid Card Number. If you do not have a credit card, just leave it blank.");
								cardnum.focus();return false;}
						else if(username.value.length<5) {alert("Username must be at least 5 characters in length");
								username.focus();return false;}	
						else if(validate_email(email,"Email entered is invalid")==false)
						{email.focus();return false;}
						else if(txtpass.value.length<5){alert("Password is too short. Must be 5 characters in length");
								txtpass.focus();return false;}
						else if(validate_required(txtpass,"Please enter password")==false)
								{txtpass.focus();return false;}
						else if(txtpass.value!=txtrepass.value) {alert("Passwords do not match");
								txtpass.focus();return false;}
						break;
			case 'login':    // for login		
								if (validate_required(username,"Please enter username")==false)
										  {username.focus();return false;}
								else if(validate_required(password,"Please enter password")==false)
										  {password.focus();return false;}
								 break;
			case 'addreserve':    // for addreservation	
								if (validate_required(norooms,"Please enter no. of rooms")==false)
										  {norooms.focus();return false;}
								else if(validate_required(noguests,"Please enter no. of persons")==false)
										  {noguests.focus();return false;}
								else if(validate_required(yearin,"Please enter year of check-in")==false)
										  {yearin.focus();return false;}
								else if(validate_required(yearout,"Please enter year of checkout")==false)
										  {yearout.focus();return false;}
								 break;
			case 'assignroom':    // for assignroom	
								//alert(norooms.value);
								if (validate_radio(room,"Please select a room")==false)
										  {room[0].focus();return false;}
								else if(count_check(room,norooms,"Please select the correct no. of rooms")==false)
										  {room[0].focus();return false;}
								 break;
			case 'charge':    // for chargeroom
								if (validate_radio(item,"Please select a service item")==false)
										  {item[0].focus();return false;}
								else if(validate_radio(room,"Please select room/s")==false)
										  {room[0].focus();return false;}
								else if(validate_required(qty,"Please enter qty.")==false)
										  {qty.focus();return false;}
								 break;
			case 'newuser':
								if (validate_required(fname,"Please enter first name")==false)
						  {fname.focus();return false;}
						else if(validate_required(mname,"Please enter middle name")==false)
						  {mname.focus();return false;}
						else if(validate_required(lname,"Please enter last name")==false)
						  {lname.focus();return false;}
						else if(username.value.length<5) {alert("Username must be at least 5 characters in length");
								username.focus();return false;}	
						else if(txtpass.value.length<5){alert("Password is too short. Must be 5 characters in length");
								txtpass.focus();return false;}
						else if(validate_required(txtpass,"Please enter password")==false)
								{txtpass.focus();return false;}
						else if(txtpass.value!=txtrepass.value) {alert("Passwords do not match");
								txtpass.focus();return false;}
						break;
			case 'newroom':
						if (validate_required(roomname,"Please enter room name")==false)
						  {roomname.focus();return false;}
						break;
			case 'newtype':
						if (validate_required(typename,"Please enter type name")==false)
						  {typename.focus();return false;}
					  	else if (validate_required(typerate,"Please enter type rate")==false)
						  {typerate.focus();return false;}
						  else if (validate_required(typeextra,"Please enter extra person rate")==false)
						  {typeextra.focus();return false;}
						  else if (validate_required(capacity,"Please enter capacity")==false)
						  {capacity.focus();return false;}
						break;
			case 'newservice':
						if (validate_required(servicename,"Please enter service name")==false)
						  {servicename.focus();return false;}
						var items=elements;
						var i=0;
						for(i=1;i<=itemcount.value;i++) {
							if (validate_required(items[2*i],"Please enter item name")==false)
						  	{items[2*i].focus();return false;}
						  else if(validate_required(items[2*i+1],"Please enter item price")==false)
							  {items[2*i+1].focus();return false;}
						  }					
						  
						 // else if(validate_items(Itemnames))
						break;
			}
	}
}

function validate_email(field,alerttxt) {
	with (field) {
		var apos=value.indexOf("@");
		var dotpos=value.lastIndexOf(".");
		if (apos<1||dotpos-apos<2)  {
			alert(alerttxt);return false;
		}
		else {
			return true;
		}
	}
}// end of function validate email



function validate_radio(field,alerttxt) {
	var myOption = -1;
	for (i=field.length-1; i > -1; i--) {
		if (field[i].checked) {
			myOption = i; i = -1;
		}
	}
	if (myOption == -1) {
		alert(alerttxt);
		return false;
	}

}

function count_check(field1,field2,alerttxt) {
	var count=0;
	for (i=field1.length-1; i > -1; i--) {
		if (field1[i].checked) {
			count+=1;
		}
	}
	if (count!=field2.value) {
		alert(alerttxt);
		return false;
	}

}

